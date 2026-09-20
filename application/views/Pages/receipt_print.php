<?php
    $clinic_name    = trim((string) $d->clinic_name) !== '' ? $d->clinic_name : clinic_name();
    $clinic_address = trim((string) $d->clinic_address);
    $clinic_contact = trim((string) $d->clinic_contact);
    $clinic_email   = trim((string) $d->clinic_email);

    $patient_name = $p ? trim($p->first_name . ' ' . $p->middle_name . ' ' . $p->last_name) : 'Unknown Patient';
    $patient_addr = $p ? trim(implode(' ', array_filter(array_map('trim', array($p->sitio, $p->barangay, $p->city_mun, $p->province))))) : '';

    $paid      = $summary !== null || (int) $d->payment_status === 1;
    $doc_title = $paid ? 'Official Receipt' : 'Statement of Charges';
    $receipt_no = !empty($sales) ? $sales[0]->reciept_code : '—';

    $subtotal  = 0;
    foreach ($sales as $s) { $subtotal += (float) $s->total; }
    $discount  = $summary ? (float) $summary->discount : 0;
    $amount_due = $summary ? (float) $summary->amount_due : ($subtotal - $discount);

    $doc_date  = $summary && $summary->date ? strtotime($summary->date . ' ' . $summary->time) : ($d->date ? strtotime($d->date) : time());
    $visit_ts  = ($a && $a->visit_date) ? strtotime($a->visit_date) : false;

    $doc_name = trim((string) $d->doc_last) !== ''
        ? ucwords(strtolower(trim($d->doc_first . ' ' . $d->doc_mid . ' ' . $d->doc_last)))
        : '';
    $cashier_name = $cashier ? ucwords(strtolower(trim($cashier->first_name . ' ' . $cashier->last_name))) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $doc_title; ?> — <?= htmlentities($patient_name); ?></title>
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

    /* Letterhead — same treatment as the prescription */
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

    /* Status ribbon for unpaid bills */
    .status-flag {
        position: absolute; top: 120px; right: -34px;
        transform: rotate(38deg);
        background: #fff3e0; color: #d68910;
        border: 1.5px dashed #d68910;
        font-size: 12px; font-weight: 800; letter-spacing: 2px;
        padding: 4px 42px; text-transform: uppercase;
    }
    .status-flag.paid { background: #e7f7f5; color: #0f8a7f; border-color: #0f8a7f; }

    /* Patient strip */
    .patient-strip {
        display: flex; flex-wrap: wrap; gap: 6px 26px;
        padding: 12px 2px; border-bottom: 1px solid #dbe4ee;
        font-size: 13.5px;
    }
    .patient-strip .f { display: flex; gap: 6px; }
    .patient-strip .k { font-size: 10.5px; font-weight: 700; color: #8a9bb0; text-transform: uppercase; letter-spacing: .5px; padding-top: 2px; }
    .patient-strip .v { font-weight: 700; color: #1c2b3a; }

    /* Charges table */
    .charges { width: 100%; border-collapse: collapse; margin-top: 16px; }
    .charges th {
        font-size: 10.5px; font-weight: 700; color: #54677c;
        text-transform: uppercase; letter-spacing: .7px;
        text-align: left; padding: 8px 10px;
        border-top: 1.5px solid #1c2b3a; border-bottom: 1.5px solid #1c2b3a;
    }
    .charges td { padding: 8px 10px; font-size: 13.5px; border-bottom: 1px dashed #dbe4ee; }
    .charges .num { text-align: right; font-variant-numeric: tabular-nums; white-space: nowrap; }
    .charges .empty { text-align: center; color: #8a9bb0; font-style: italic; padding: 18px; }

    /* Totals */
    .totals { margin-left: auto; width: 62mm; margin-top: 14px; }
    .totals .r { display: flex; justify-content: space-between; padding: 5px 10px; font-size: 13.5px; }
    .totals .r .k { color: #54677c; }
    .totals .r .v { font-weight: 600; font-variant-numeric: tabular-nums; }
    .totals .r.grand {
        border-top: 1.5px solid #1c2b3a; margin-top: 6px; padding-top: 9px;
        font-size: 16px; font-weight: 800; color: #0d47a1;
    }
    .totals .r.grand .v { font-size: 18px; }
    .comment-line { font-size: 12px; color: #54677c; margin-top: 10px; font-style: italic; }

    /* Signatures */
    .signatures { margin-top: auto; padding-top: 34px; display: flex; justify-content: space-between; gap: 20px; }
    .sig-block { text-align: center; min-width: 190px; }
    .sig-line { height: 40px; }
    .sig-name { font-size: 14px; font-weight: 800; color: #1c2b3a; border-top: 1.5px solid #1c2b3a; padding-top: 7px; }
    .sig-sub { font-size: 11.5px; color: #54677c; margin-top: 3px; }

    .doc-footer {
        margin-top: 24px; padding-top: 10px;
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
    <button class="b-print" onclick="window.print()">Print <?= $paid ? 'Receipt' : 'Statement'; ?></button>
    <button class="b-close" onclick="window.close()">Close</button>
</div>

<div class="sheet">

    <?php if(!$paid): ?><div class="status-flag">Unpaid</div><?php endif; ?>

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
            <?= $doc_title; ?>
            <span class="no"><?= htmlentities($receipt_no); ?> · <?= date('M j, Y g:i a', $doc_date); ?></span>
        </div>
    </div>

    <!-- Patient strip -->
    <div class="patient-strip">
        <div class="f"><span class="k">Received from</span><span class="v"><?= htmlentities(ucwords(strtolower($patient_name))); ?></span></div>
        <?php if($patient_addr !== ''): ?><div class="f"><span class="k">Address</span><span class="v" style="font-weight:600;"><?= htmlentities(ucwords(strtolower($patient_addr))); ?></span></div><?php endif; ?>
        <?php if($visit_ts): ?><div class="f"><span class="k">Visit date</span><span class="v"><?= date('M j, Y', $visit_ts); ?></span></div><?php endif; ?>
        <?php if($a && trim((string) $a->transaction) !== ''): ?><div class="f"><span class="k">Type</span><span class="v"><?= htmlentities($a->transaction); ?></span></div><?php endif; ?>
        <?php if($doc_name !== ''): ?><div class="f"><span class="k">Physician</span><span class="v"><?= htmlentities($doc_name); ?></span></div><?php endif; ?>
    </div>

    <!-- Charges -->
    <table class="charges">
        <thead>
            <tr>
                <th style="width: 34px;">#</th>
                <th>Service / Item</th>
                <th class="num" style="width: 60px;">Qty</th>
                <th class="num" style="width: 90px;">Price</th>
                <th class="num" style="width: 100px;">Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($sales)): $n = 1; foreach($sales as $s): ?>
            <tr>
                <td><?= $n++; ?></td>
                <td><?= htmlentities((string) $s->description); ?></td>
                <td class="num"><?= (int) $s->quantity; ?></td>
                <td class="num">₱<?= number_format((float) $s->price, 2); ?></td>
                <td class="num">₱<?= number_format((float) $s->total, 2); ?></td>
            </tr>
            <?php endforeach; else: ?>
            <tr><td colspan="5" class="empty">No charges recorded for this bill.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Totals -->
    <div class="totals">
        <div class="r"><span class="k">Subtotal</span><span class="v">₱<?= number_format($subtotal, 2); ?></span></div>
        <div class="r"><span class="k">Discount</span><span class="v">− ₱<?= number_format($discount, 2); ?></span></div>
        <div class="r grand"><span class="k"><?= $paid ? 'Amount Paid' : 'Amount Due'; ?></span><span class="v">₱<?= number_format($amount_due, 2); ?></span></div>
        <?php if($summary && trim((string) $summary->comment) !== ''): ?>
        <div class="comment-line">Note: <?= htmlentities($summary->comment); ?></div>
        <?php endif; ?>
    </div>

    <!-- Signatures -->
    <div class="signatures">
        <div class="sig-block">
            <div class="sig-line"></div>
            <div class="sig-name"><?= $cashier_name !== '' ? htmlentities($cashier_name) : 'Cashier'; ?></div>
            <div class="sig-sub">Received by</div>
        </div>
        <div class="sig-block">
            <div class="sig-line"></div>
            <div class="sig-name">&nbsp;</div>
            <div class="sig-sub">Patient / Representative signature</div>
        </div>
    </div>

    <div class="doc-footer">
        <?= htmlentities($clinic_name); ?> · This document is <?= $paid ? 'an official receipt' : 'a statement of charges — not an official receipt'; ?>.
    </div>

</div>

<script>
window.addEventListener('load', function () { window.print(); });
</script>
</body>
</html>
