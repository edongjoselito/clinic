<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('findings_cell')) {
    /**
     * Compact table cell for clinical notes.
     *
     * Diagnosis, treatment, lab and remarks are free text with no length limit,
     * so printing them in full stretches a table row to whatever the longest
     * note happens to be. This renders a single-line preview plus a trigger for
     * the shared findings modal, and keeps the full text in the DOM (visually
     * hidden) so DataTables search still matches on it.
     *
     * @param array  $parts    label => text, in display order
     * @param string $title    heading for the modal (e.g. patient name)
     * @param string $subtitle sub-heading for the modal (e.g. visit date)
     * @return string
     */
    function findings_cell(array $parts, $title = '', $subtitle = '')
    {
        $clean = array();
        foreach ($parts as $label => $text) {
            $text = trim((string) $text);
            if ($text !== '') {
                $clean[$label] = $text;
            }
        }

        if (!$clean) {
            return '<div class="note muted">No findings recorded</div>';
        }

        $first_label = key($clean);
        $first_text  = reset($clean);
        $preview     = function_exists('character_limiter')
            ? character_limiter($first_text, 52, '…')
            : (strlen($first_text) > 52 ? substr($first_text, 0, 52) . '…' : $first_text);

        $payload = array();
        foreach ($clean as $label => $text) {
            $payload[] = array('label' => $label, 'text' => $text);
        }

        $more = count($clean) - 1;
        $label_more = $more > 0 ? ' <span class="more-count">+' . $more . '</span>' : '';

        $html  = '<div class="findings-cell">';
        $html .= '<div class="peek"><span class="peek-lbl">' . htmlspecialchars($first_label, ENT_QUOTES) . '</span>'
               . htmlspecialchars($preview, ENT_QUOTES) . '</div>';
        $html .= '<button type="button" class="link-findings" data-toggle="modal" data-target="#findingsModal"'
               . ' data-title="' . htmlspecialchars($title, ENT_QUOTES) . '"'
               . ' data-subtitle="' . htmlspecialchars($subtitle, ENT_QUOTES) . '"'
               . " data-findings='" . htmlspecialchars(json_encode($payload), ENT_QUOTES) . "'>"
               . '<i class="ph ph-eye"></i>View findings' . $label_more . '</button>';
        // Keeps table search working against the text the preview hides.
        $html .= '<span class="findings-search">' . htmlspecialchars(implode(' ', $clean), ENT_QUOTES) . '</span>';
        $html .= '</div>';

        return $html;
    }
}

if (!function_exists('findings_modal')) {
    /**
     * Markup, styles and behaviour for the shared findings modal.
     * Echo once per page that uses findings_cell(). Requires jQuery + Bootstrap.
     *
     * @return string
     */
    function findings_modal()
    {
        return <<<'HTML'
<style>
.findings-cell { max-width: 320px; }
.findings-cell .peek {
    font-size: 13.5px; color: #3d4f63; line-height: 1.45;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
    overflow: hidden; word-break: break-word;
}
.findings-cell .peek-lbl {
    display: inline-block; margin-right: 6px;
    font-size: 10.5px; font-weight: 700; color: #8a9bb0;
    text-transform: uppercase; letter-spacing: .4px;
}
.findings-cell .link-findings {
    margin-top: 6px; padding: 0; border: none; background: none;
    display: inline-flex; align-items: center; gap: 5px;
    font-family: inherit; font-size: 12.5px; font-weight: 600; color: #1e88e5;
    cursor: pointer; transition: color .2s;
}
.findings-cell .link-findings:hover { color: #0d47a1; text-decoration: underline; }
.findings-cell .link-findings .more-count {
    background: #e8f4fd; color: #1565c0; border-radius: 9px;
    padding: 1px 7px; font-size: 11px; font-weight: 700;
}
.findings-cell .findings-search { position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0 0 0 0); white-space: nowrap; }

.findings-modal .modal-content { border: none; border-radius: 16px; overflow: hidden; box-shadow: 0 24px 60px rgba(13, 42, 84, 0.25); }
.findings-modal .modal-header { align-items: flex-start; padding: 18px 24px; border-bottom: 1px solid #f0f4f8; }
.findings-modal .modal-title { font-size: 16px; font-weight: 700; color: #1c2b3a; display: flex; align-items: center; gap: 12px; }
.findings-modal .modal-title .ico {
    width: 36px; height: 36px; min-width: 36px; border-radius: 10px; background: #e8f4fd; color: #1e88e5;
    display: inline-flex; align-items: center; justify-content: center; font-size: 18px;
}
.findings-modal .modal-sub { font-size: 12.5px; color: #8a9bb0; font-weight: 500; margin-top: 4px; padding-left: 48px; }
.findings-modal .modal-x {
    width: 34px; height: 34px; border: none; border-radius: 9px;
    background: #f1f5f9; color: #5a6b7d; font-size: 17px; cursor: pointer; transition: all .2s;
    display: inline-flex; align-items: center; justify-content: center;
}
.findings-modal .modal-x:hover { background: #e3eaf1; color: #1c2b3a; }
.findings-modal .modal-body { padding: 8px 24px 24px; max-height: 65vh; overflow-y: auto; }
.findings-modal .f-block { padding: 16px 0; border-bottom: 1px solid #f4f7fa; }
.findings-modal .f-block:last-child { border-bottom: none; padding-bottom: 0; }
.findings-modal .f-label {
    font-size: 10.5px; font-weight: 700; color: #8a9bb0;
    text-transform: uppercase; letter-spacing: .5px; margin-bottom: 6px;
}
.findings-modal .f-text { font-size: 14px; color: #1c2b3a; line-height: 1.6; white-space: pre-line; word-break: break-word; }
</style>

<div class="modal fade findings-modal" id="findingsModal" tabindex="-1" role="dialog" aria-labelledby="findingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title" id="findingsModalLabel">
                        <span class="ico"><i class="ph ph-clipboard-text"></i></span>
                        <span id="findingsTitle">Findings</span>
                    </h5>
                    <div class="modal-sub" id="findingsSubtitle"></div>
                </div>
                <button type="button" class="modal-x" data-dismiss="modal" aria-label="Close"><i class="ph ph-x"></i></button>
            </div>
            <div class="modal-body" id="findingsBody"></div>
        </div>
    </div>
</div>

<script>
$(function () {
    $('#findingsModal').on('show.bs.modal', function (e) {
        var btn  = $(e.relatedTarget);
        var data = btn.data('findings') || [];
        if (typeof data === 'string') { try { data = JSON.parse(data); } catch (err) { data = []; } }

        $('#findingsTitle').text(btn.data('title') || 'Findings');
        $('#findingsSubtitle').text(btn.data('subtitle') || '');

        var body = $('#findingsBody').empty();
        $.each(data, function (i, part) {
            $('<div class="f-block">')
                .append($('<div class="f-label">').text(part.label))
                .append($('<div class="f-text">').text(part.text))
                .appendTo(body);
        });
    });
});
</script>
HTML;
    }
}
