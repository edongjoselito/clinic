<?php
    $clinic_name    = trim((string) $d->clinic_name) !== '' ? $d->clinic_name : clinic_name();
    $clinic_address = trim((string) $d->clinic_address);
    $clinic_contact = trim((string) $d->clinic_contact);
    $clinic_email   = trim((string) $d->clinic_email);

    $patient_name = $p ? trim($p->first_name . ' ' . $p->middle_name . ' ' . $p->last_name) : 'Unknown Patient';
    $patient_addr = $p ? trim(implode(' ', array_filter(array_map('trim', array($p->sitio, $p->barangay, $p->city_mun, $p->province))))) : '';
    $age     = $a ? trim((string) $a->age) : '';
    $gender  = $p ? strtolower(trim((string) $p->gender)) : '';
    $rx_date = $d->date ? strtotime($d->date) : time();

    $doc_name = trim((string) $d->doc_last) !== ''
        ? ucwords(strtolower(trim($d->doc_first . ' ' . $d->doc_mid . ' ' . $d->doc_last)))
        : '';
    $doc_line2 = trim(implode(' · ', array_filter(array(
        trim((string) $d->doc_position) !== '' ? ucwords(strtolower($d->doc_position)) : '',
        trim((string) $d->doc_specialty),
    ))));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Prescription — <?= htmlentities($patient_name); ?></title>
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/fonts.css">
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
        font-family: 'DM Sans', 'Segoe UI', Arial, sans-serif;
        background: #eef2f6; color: #1c2b3a;
        -webkit-print-color-adjust: exact; print-color-adjust: exact;
    }

    /* On-screen toolbar (hidden when printing) */
    .toolbar {
        display: flex; justify-content: center; gap: 10px;
        padding: 16px; position: sticky; top: 0; z-index: 10;
        background: #eef2f6; border-bottom: 1px solid #dde5ee;
    }
    .toolbar button {
        font-family: inherit; font-size: 14px; font-weight: 600;
        height: 40px; padding: 0 20px; border-radius: 10px; border: none; cursor: pointer;
    }
    .toolbar .b-print { background: #1565c0; color: #fff; }
    .toolbar .b-close { background: #fff; color: #3d4f63; border: 1px solid #d5dee8; }

    /* The sheet */
    .sheet {
        width: 148mm; min-height: 210mm;
        margin: 24px auto; padding: 16mm 16mm 14mm;
        background: #fff; box-shadow: 0 6px 30px rgba(15, 40, 80, 0.15);
        display: flex; flex-direction: column; position: relative;
    }

    /* Letterhead */
    .letterhead {
        display: flex; align-items: center; gap: 14px;
        padding-bottom: 14px;
        border-bottom: 3px double #1565c0;
    }
    .clinic-mark {
        width: 52px; height: 52px; border-radius: 12px; flex-shrink: 0;
        background: linear-gradient(135deg, #1e88e5, #0d47a1);
        color: #fff; display: flex; align-items: center; justify-content: center;
        font-size: 22px; font-weight: 800;
    }
    .clinic-name { font-size: 24px; font-weight: 800; color: #0d47a1; letter-spacing: .3px; }
    .clinic-meta { font-size: 12px; color: #54677c; margin-top: 3px; }
    .doc-type {
        margin-left: auto; text-align: right;
        font-size: 11px; font-weight: 700; letter-spacing: 1.5px;
        text-transform: uppercase; color: #1565c0;
    }
    .doc-type .no { display: block; margin-top: 4px; font-size: 12px; font-weight: 600; letter-spacing: 0; color: #8a9bb0; text-transform: none; }

    /* Patient strip */
    .patient-strip {
        display: flex; flex-wrap: wrap; gap: 6px 26px;
        padding: 12px 2px; border-bottom: 1px solid #dbe4ee;
        font-size: 13.5px;
    }
    .patient-strip .f { display: flex; gap: 6px; }
    .patient-strip .k { font-size: 10.5px; font-weight: 700; color: #8a9bb0; text-transform: uppercase; letter-spacing: .5px; padding-top: 2px; }
    .patient-strip .v { font-weight: 700; color: #1c2b3a; }

    /* Rx body */
    .rx-body { flex: 1; display: flex; gap: 16px; padding: 20px 2px 0; }
    .rx-symbol {
        font-size: 52px; font-weight: 800; color: #1565c0; line-height: 1;
        font-family: 'Times New Roman', serif;
    }
    .rx-content { flex: 1; min-width: 0; }
    .rx-section { margin-bottom: 20px; }
    .rx-label {
        font-size: 10.5px; font-weight: 700; color: #8a9bb0;
        text-transform: uppercase; letter-spacing: .8px; margin-bottom: 6px;
    }
    .rx-text { font-size: 15px; line-height: 1.65; white-space: pre-line; word-break: break-word; }
    .rx-text.treatment { font-size: 16px; }
    .rx-text.empty { color: #b8c4d0; font-style: italic; }

    /* Signature */
    .signature { margin-top: auto; padding-top: 30px; display: flex; justify-content: flex-end; }
    .sig-block { text-align: center; min-width: 230px; }
    .sig-name { font-size: 15px; font-weight: 800; color: #1c2b3a; border-top: 1.5px solid #1c2b3a; padding-top: 8px; }
    .sig-sub { font-size: 12px; color: #54677c; margin-top: 3px; }
    .sig-line { height: 44px; } /* space for wet signature */

    .doc-footer {
        margin-top: 26px; padding-top: 10px;
        border-top: 1px solid #e5ecf3;
        font-size: 10.5px; color: #9aa8b8; text-align: center;
    }

    @media print {
        body { background: #fff; }
        .toolbar { display: none !important; }
        .sheet { margin: 0; box-shadow: none; width: auto; min-height: auto; }
        @page { size: A5 portrait; margin: 0; }
    }
    @media (max-width: 640px) { .sheet { width: 100%; margin: 0; } }
</style>
</head>
<body>

<div class="toolbar">
    <button class="b-print" onclick="window.print()">Print Prescription</button>
    <button class="b-close" onclick="window.close()">Close</button>
</div>

<div class="sheet">

    <!-- Letterhead -->
    <div class="letterhead">
        <div class="clinic-mark"><?= htmlentities(strtoupper(substr(trim($clinic_name), 0, 1) ?: 'C')); ?></div>
        <div>
            <div class="clinic-name"><?= htmlentities($clinic_name); ?></div>
            <div class="clinic-meta">
                <?= htmlentities($clinic_address); ?><?= $clinic_contact !== '' ? ' &nbsp;·&nbsp; ' . htmlentities($clinic_contact) : ''; ?><?= $clinic_email !== '' ? ' &nbsp;·&nbsp; ' . htmlentities($clinic_email) : ''; ?>
            </div>
        </div>
        <div class="doc-type">
            Medical Prescription
            <span class="no">Rx #<?= (int) $d->id; ?> · <?= date('M j, Y', $rx_date); ?></span>
        </div>
    </div>

    <!-- Patient strip -->
    <div class="patient-strip">
        <div class="f"><span class="k">Patient</span><span class="v"><?= htmlentities(ucwords(strtolower($patient_name))); ?></span></div>
        <?php if($age !== ''): ?><div class="f"><span class="k">Age</span><span class="v"><?= htmlentities($age); ?></span></div><?php endif; ?>
        <?php if($gender !== ''): ?><div class="f"><span class="k">Sex</span><span class="v"><?= ucfirst($gender); ?></span></div><?php endif; ?>
        <?php if($patient_addr !== ''): ?><div class="f"><span class="k">Address</span><span class="v" style="font-weight:600;"><?= htmlentities(ucwords(strtolower($patient_addr))); ?></span></div><?php endif; ?>
    </div>

    <!-- Rx body -->
    <div class="rx-body">
        <div class="rx-symbol">&#8478;</div>
        <div class="rx-content">

            <?php if(trim((string) $d->diagnosis) !== ''): ?>
            <div class="rx-section">
                <div class="rx-label">Diagnosis</div>
                <div class="rx-text"><?= htmlentities($d->diagnosis); ?></div>
            </div>
            <?php endif; ?>

            <div class="rx-section">
                <div class="rx-label">Treatment / Medications</div>
                <div class="rx-text treatment <?= trim((string) $d->treatment) === '' ? 'empty' : ''; ?>"><?= trim((string) $d->treatment) !== '' ? htmlentities($d->treatment) : 'No treatment recorded'; ?></div>
            </div>

            <?php if(trim((string) $d->lab) !== ''): ?>
            <div class="rx-section">
                <div class="rx-label">Laboratory</div>
                <div class="rx-text"><?= htmlentities($d->lab); ?></div>
            </div>
            <?php endif; ?>

            <?php if(trim((string) $d->remarks) !== ''): ?>
            <div class="rx-section">
                <div class="rx-label">Remarks / Instructions</div>
                <div class="rx-text"><?= htmlentities($d->remarks); ?></div>
            </div>
            <?php endif; ?>

        </div>
    </div>

    <!-- Signature -->
    <div class="signature">
        <div class="sig-block">
            <div class="sig-line"></div>
            <div class="sig-name"><?= $doc_name !== '' ? htmlentities($doc_name) . ', M.D.' : 'Attending Physician'; ?></div>
            <?php if($doc_line2 !== ''): ?><div class="sig-sub"><?= htmlentities($doc_line2); ?></div><?php endif; ?>
        </div>
    </div>

    <div class="doc-footer">
        This prescription is issued by <?= htmlentities($clinic_name); ?> and is valid only with the attending physician's signature.
    </div>

</div>

<script>
// Open the print dialog automatically; close the tab afterwards if the user cancels
window.addEventListener('load', function () { window.print(); });
</script>
</body>
</html>
