<style>
.profile-wrapper { padding-top: 20px; }

/* ===== Hero ===== */
.profile-hero {
    position: relative;
    background: linear-gradient(120deg, #0d47a1 0%, #1565c0 45%, #1e88e5 100%);
    border-radius: 16px;
    padding: 30px 36px;
    margin-bottom: 24px;
    box-shadow: 0 12px 32px rgba(13, 71, 161, 0.28);
    color: #fff;
    overflow: hidden;
}
.profile-hero::before {
    content: '';
    position: absolute;
    top: -90px; right: -60px;
    width: 260px; height: 260px;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
}
.profile-hero .hero-inner {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    flex-wrap: wrap;
}
.hero-identity { display: flex; align-items: center; gap: 20px; min-width: 0; }
.hero-avatar {
    width: 84px;
    height: 84px;
    min-width: 84px;
    border-radius: 50%;
    border: 3px solid rgba(255,255,255,0.6);
    background: rgba(255,255,255,0.18);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    font-weight: 700;
    color: #fff;
    overflow: hidden;
    text-decoration: none;
    position: relative;
}
.hero-avatar img { width: 100%; height: 100%; object-fit: cover; }
.hero-avatar .avatar-edit {
    position: absolute;
    inset: 0;
    background: rgba(13,71,161,0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    opacity: 0;
    transition: opacity .2s;
}
.hero-avatar:hover .avatar-edit { opacity: 1; }
.hero-eyebrow {
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.75);
    margin-bottom: 4px;
}
.hero-name {
    font-size: 26px;
    font-weight: 700;
    color: #fff;
    margin: 0 0 8px;
    line-height: 1.2;
}
.hero-chips { display: flex; gap: 8px; flex-wrap: wrap; }
.hero-chip {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    height: 28px;
    padding: 0 12px;
    border-radius: 14px;
    background: rgba(255,255,255,0.16);
    border: 1px solid rgba(255,255,255,0.25);
    font-size: 12.5px;
    font-weight: 600;
    color: #fff;
}
.hero-chip i { font-size: 14px; }
.hero-chip.portal-on { background: rgba(17,153,142,0.35); border-color: rgba(17,153,142,0.6); }
.hero-actions { display: flex; gap: 10px; flex-wrap: wrap; }
.hero-cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    height: 42px;
    padding: 0 18px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
    transition: all .2s ease;
    border: 1px solid rgba(255,255,255,0.4);
    background: rgba(255,255,255,0.15);
    color: #fff;
}
.hero-cta:hover { background: rgba(255,255,255,0.25); color: #fff; text-decoration: none; }
.hero-cta.primary { background: #fff; color: #1565c0; border-color: #fff; box-shadow: 0 6px 18px rgba(0,0,0,0.15); }
.hero-cta.primary:hover { color: #0d47a1; transform: translateY(-2px); }

/* ===== Summary strip ===== */
.summary-strip {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
    gap: 16px;
    margin-bottom: 24px;
}
.summary-tile {
    background: #fff;
    border: 1px solid #edf2f7;
    border-radius: 14px;
    padding: 18px 20px;
    display: flex;
    align-items: center;
    gap: 14px;
}
.summary-icon {
    width: 44px; height: 44px; min-width: 44px;
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px;
}
.summary-icon.blue  { background: #e8f4fd; color: #1e88e5; }
.summary-icon.green { background: #e7f7f5; color: #11998e; }
.summary-icon.amber { background: #fff5e6; color: #f39c12; }
.summary-icon.purple{ background: #f3effb; color: #7e57c2; }
.summary-icon.orange{ background: #fff5e6; color: #f39c12; }
.summary-label { font-size: 12px; font-weight: 600; color: #8a9bb0; text-transform: uppercase; letter-spacing: .5px; }
.summary-value { font-size: 18px; font-weight: 700; color: #1c2b3a; line-height: 1.2; }

/* ===== Cards ===== */
.info-card {
    border: 1px solid #edf2f7;
    border-radius: 14px;
    box-shadow: 0 1px 4px rgba(30, 58, 95, 0.03);
    margin-bottom: 24px;
    background: #fff;
}
.info-card .card-header {
    background: #fff;
    border-bottom: 1px solid #f0f4f8;
    padding: 16px 24px;
    border-radius: 14px 14px 0 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
}
.info-card .card-header h5 {
    margin: 0;
    font-weight: 700;
    color: #1c2b3a;
    font-size: 15px;
    display: flex;
    align-items: center;
    gap: 12px;
}
.section-icon {
    width: 36px; height: 36px; min-width: 36px;
    background: #e8f4fd;
    border-radius: 10px;
    display: inline-flex; align-items: center; justify-content: center;
}
.section-icon i { color: #1e88e5; font-size: 18px; }
.info-card .card-body { padding: 24px; }
.header-link { font-size: 13px; font-weight: 600; color: #1e88e5; text-decoration: none; display: inline-flex; align-items: center; gap: 4px; }
.header-link:hover { color: #0d47a1; text-decoration: none; }
.count-badge { background: #e8f4fd; color: #1565c0; font-size: 12px; font-weight: 700; padding: 3px 10px; border-radius: 12px; }

/* ===== Collapsible header ===== */
.info-card .card-header.collapsible { cursor: pointer; user-select: none; transition: background .15s; }
.info-card .card-header.collapsible:hover { background: #fafcfe; }
.info-card .card-header.collapsible.collapsed { border-bottom-color: transparent; border-radius: 14px; }
.header-right { display: flex; align-items: center; gap: 18px; }
.collapse-toggle {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    height: 32px;
    padding: 0 12px;
    border-radius: 8px;
    background: #f1f5f9;
    color: #3d4f63;
    font-size: 12.5px;
    font-weight: 600;
}
.collapse-toggle i { font-size: 14px; transition: transform .2s ease; }
.card-header.collapsible:not(.collapsed) .collapse-toggle i { transform: rotate(180deg); }

/* ===== Details grid ===== */
.details-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0 32px;
}
.detail {
    padding: 14px 0;
    border-bottom: 1px solid #f2f5f8;
}
.detail-label { font-size: 11.5px; font-weight: 600; color: #8a9bb0; text-transform: uppercase; letter-spacing: .5px; margin-bottom: 4px; }
.detail-value { font-size: 14.5px; font-weight: 600; color: #1c2b3a; word-break: break-word; }
.detail-value.muted { color: #b8c4d0; font-weight: 500; }
.detail-value a { color: #1e88e5; text-decoration: none; }
.detail-value a:hover { text-decoration: underline; }

/* ===== Visit history table ===== */
.table-modern { margin-bottom: 0; }
.table-modern th {
    border-top: none; border-bottom: 1px solid #f0f4f8;
    font-weight: 700; color: #8496a9; font-size: 11.5px;
    text-transform: uppercase; letter-spacing: .6px;
    padding: 14px 18px; background: #fcfdff; white-space: nowrap;
}
.table-modern td { vertical-align: top; border-color: #f2f5f8; padding: 16px 18px; font-size: 13.5px; color: #3d4f63; }
.table-modern th:first-child, .table-modern td:first-child { padding-left: 24px; }
.table-modern th:last-child, .table-modern td:last-child { padding-right: 24px; }
.table-modern tbody tr:hover { background: #fafcfe; }
.table-modern tbody tr:last-child td { border-bottom: none; }
.cell-date { font-weight: 700; color: #1c2b3a; font-size: 14px; white-space: nowrap; }
.cell-sub { font-size: 12px; color: #8a9bb0; margin-top: 4px; display: flex; align-items: center; gap: 4px; }
.muted-dash { color: #c4cedb; }

/* Rows that have no diagnosis attached */
.row-open { background: #fffdf7; }
.row-open:hover { background: #fffaf0; }
.row-cancelled { background: #fdfbfb; }
.row-cancelled .cell-date { color: #8a9bb0; text-decoration: line-through; }

.tag {
    display: inline-flex; align-items: center; gap: 5px;
    height: 26px; padding: 0 10px; border-radius: 13px;
    font-size: 11.5px; font-weight: 600; white-space: nowrap;
}
.tag.type { background: #e8f4fd; color: #1565c0; text-transform: uppercase; letter-spacing: .3px; }
.tag.specialty { background: #f3effb; color: #7e57c2; }
.tag.paid { background: #e7f7f5; color: #0f8a7f; }
.tag.unpaid { background: #fff5e6; color: #d68910; }
.tag.pending { background: #fff5e6; color: #d68910; }
.tag.cancelled { background: #fdecec; color: #c62828; }
.header-note { font-size: 12.5px; color: #8a9bb0; font-weight: 500; }

.vitals { display: flex; gap: 6px; flex-wrap: wrap; }
.vital {
    display: inline-flex; align-items: baseline; gap: 5px;
    background: #f7fafd; border: 1px solid #edf2f7;
    border-radius: 7px; padding: 4px 9px; white-space: nowrap;
}
.vital .k { font-size: 10px; font-weight: 700; color: #8a9bb0; text-transform: uppercase; letter-spacing: .4px; }
.vital .v { font-size: 12.5px; font-weight: 700; color: #1c2b3a; }
.note.muted { color: #a8b6c6; font-style: italic; font-size: 13px; }

/* DataTables chrome, matched to the queue and billing tables */
.info-card .dataTables_wrapper { padding: 0; }
.info-card .dataTables_length, .info-card .dataTables_filter { padding: 14px 24px 0; }
.info-card .dataTables_filter { text-align: right; }
.info-card .dataTables_length label, .info-card .dataTables_filter label {
    margin: 0; color: #6c7d8f; font-size: 13px; font-weight: 500; display: inline-flex; align-items: center; gap: 8px;
}
.info-card .dataTables_length select, .info-card .dataTables_filter input {
    border: 1px solid #dce4ec; border-radius: 8px; height: 34px; padding: 0 10px;
    font-size: 13px; color: #1c2b3a; outline: none;
}
.info-card .dataTables_filter input { width: 220px; }
.info-card .dataTables_filter input:focus, .info-card .dataTables_length select:focus { border-color: #1e88e5; }
.info-card .dataTables_info { padding: 12px 24px 16px; font-size: 12.5px; color: #8a9bb0; }
.info-card .dataTables_paginate { padding: 12px 24px 16px; }
.info-card .page-link { border-radius: 8px !important; margin-left: 4px; border: 1px solid #e3eaf1; color: #3d4f63; font-weight: 600; font-size: 13px; padding: 6px 12px; }
.info-card .page-item.active .page-link { background: #1e88e5; border-color: #1e88e5; }

.btn-sm-action {
    display: inline-flex; align-items: center; gap: 6px;
    height: 32px; padding: 0 12px; border-radius: 8px;
    font-size: 12.5px; font-weight: 600; text-decoration: none;
    background: #eef4fb; color: #1565c0; transition: all .2s;
}
.btn-sm-action:hover { background: #1e88e5; color: #fff; text-decoration: none; }

.empty-state { text-align: center; padding: 50px 20px; color: #8a9bb0; }
.empty-state > i { font-size: 40px; color: #d4dde8; display: block; margin-bottom: 10px; }
.empty-state p { margin: 0 0 12px; font-size: 14px; }
.empty-link {
    display: inline-flex; align-items: center; gap: 6px;
    height: 34px; padding: 0 14px; border-radius: 8px;
    font-size: 13px; font-weight: 600; text-decoration: none;
    background: #eef4fb; color: #1e88e5; transition: all .2s;
}
.empty-link:hover { background: #1e88e5; color: #fff; text-decoration: none; }

@media (max-width: 991px) {
    .summary-strip { grid-template-columns: repeat(2, 1fr); }
    .details-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 767px) {
    .profile-hero { padding: 24px 22px; }
    .hero-name { font-size: 22px; }
    .hero-actions { width: 100%; }
    .hero-actions .hero-cta { flex: 1; justify-content: center; }
    .summary-strip { grid-template-columns: 1fr; }
    .details-grid { grid-template-columns: 1fr; }
    .table-modern th:first-child, .table-modern td:first-child { padding-left: 16px; }
    .table-modern th:last-child, .table-modern td:last-child { padding-right: 16px; }
}
</style>

<?php
$full_name = trim($p->first_name . ' ' . $p->middle_name . ' ' . $p->last_name);
$display_name = ucwords(strtolower($full_name));
$initials = strtoupper(substr(trim($p->first_name), 0, 1) . substr(trim($p->last_name), 0, 1));
$has_photo = !empty($p->image_path) && file_exists(FCPATH . 'uploads/profile/' . $p->image_path);
$address_parts = array_filter(array_map('trim', array($p->sitio, $p->barangay, $p->city_mun, $p->province)));
$address = $address_parts ? ucwords(strtolower(implode(', ', $address_parts))) : '';
$birthday_ts = $p->birthday ? strtotime($p->birthday) : false;
$birthday_fmt = $birthday_ts ? date('F j, Y', $birthday_ts) : '';
$gender = strtolower(trim($p->gender));
$unpaid_count = isset($unpaid_count) ? (int) $unpaid_count : 0;
$visit_count  = isset($visit_count) ? (int) $visit_count : count($diag);
$last_visit_ts = !empty($last_visit) ? strtotime($last_visit) : false;

// Appointments that never got a diagnosis: still waiting, or cancelled.
$pending = isset($pending) ? $pending : array();
$awaiting = array();
$cancelled = array();
foreach ($pending as $a) {
    if (!empty($a->cancelled_at)) { $cancelled[] = $a; } else { $awaiting[] = $a; }
}
$open_count = count($awaiting);

// Diagnosed visits and still-open appointments belong in one chronological list.
// Two separate timeline widgets made the same patient's history read as two
// unrelated things.
$timeline = array();
foreach ($diag as $v) {
    $d = $v->date ?: $v->visit_date;
    $timeline[] = array('kind' => 'diagnosed', 'ts' => $d ? strtotime($d) : 0, 'row' => $v);
}
foreach ($pending as $a) {
    $timeline[] = array(
        'kind' => !empty($a->cancelled_at) ? 'cancelled' : 'open',
        'ts'   => $a->visit_date ? strtotime($a->visit_date) : 0,
        'row'  => $a,
    );
}
usort($timeline, function ($x, $y) {
    if ($x['ts'] === $y['ts']) { return 0; }
    return ($x['ts'] < $y['ts']) ? 1 : -1;
});

function pv($v) { $v = trim((string) $v); return $v === '' ? '<span class="muted">—</span>' : htmlentities($v); }
?>

<div class="profile-wrapper">

<!-- Hero -->
<div class="profile-hero">
    <div class="hero-inner">
        <div class="hero-identity">
            <a href="<?= base_url(); ?>pages/capture/<?= $p->id; ?>" class="hero-avatar" title="Change photo">
                <?php if($has_photo): ?>
                    <img src="<?= base_url() . 'uploads/profile/' . $p->image_path; ?>" alt="<?= htmlentities($display_name); ?>">
                <?php else: ?>
                    <?= htmlentities($initials ?: '?'); ?>
                <?php endif; ?>
                <span class="avatar-edit"><i class="ph ph-camera"></i></span>
            </a>
            <div>
                <div class="hero-eyebrow">Patient Profile · ID <?= (int) $p->id; ?></div>
                <h1 class="hero-name"><?= htmlentities($display_name); ?></h1>
                <div class="hero-chips">
                    <?php if($p->age): ?><span class="hero-chip"><i class="ph ph-cake"></i><?= (int) $p->age; ?> yrs</span><?php endif; ?>
                    <?php if($gender): ?><span class="hero-chip"><i class="ph ph-gender-intersex"></i><?= ucfirst($gender); ?></span><?php endif; ?>
                    <?php if($p->civil_status): ?><span class="hero-chip"><i class="ph ph-heart"></i><?= htmlentities(ucfirst($p->civil_status)); ?></span><?php endif; ?>
                    <?php if((int) $p->portal_access === 1): ?><span class="hero-chip portal-on"><i class="ph ph-shield-check"></i>Portal Active</span><?php endif; ?>
                </div>
            </div>
        </div>
        <div class="hero-actions">
            <a href="<?= base_url(); ?>Pages/patient_list" class="hero-cta"><i class="ph ph-arrow-left"></i>Back</a>
            <a href="<?= base_url(); ?>Pages/patient_edit/<?= $p->id; ?>" class="hero-cta"><i class="ph ph-pencil-simple"></i>Edit</a>
            <a href="<?= base_url(); ?>Pages/ap/<?= $p->id; ?>" class="hero-cta primary"><i class="ph ph-calendar-plus"></i>New Appointment</a>
        </div>
    </div>
</div>

<!-- Summary strip -->
<div class="summary-strip">
    <div class="summary-tile">
        <div class="summary-icon blue"><i class="ph ph-stethoscope"></i></div>
        <div>
            <div class="summary-label">Total Visits</div>
            <div class="summary-value"><?= $visit_count; ?></div>
        </div>
    </div>
    <div class="summary-tile">
        <div class="summary-icon green"><i class="ph ph-calendar-check"></i></div>
        <div>
            <div class="summary-label">Last Visit</div>
            <div class="summary-value"><?= $last_visit_ts ? date('M j, Y', $last_visit_ts) : '—'; ?></div>
        </div>
    </div>
    <div class="summary-tile">
        <div class="summary-icon amber"><i class="ph ph-receipt"></i></div>
        <div>
            <div class="summary-label">Unpaid Bills</div>
            <div class="summary-value"><?= $unpaid_count; ?></div>
        </div>
    </div>
    <?php if($open_count): ?>
    <div class="summary-tile">
        <div class="summary-icon orange"><i class="ph ph-hourglass-medium"></i></div>
        <div>
            <div class="summary-label">Awaiting Diagnosis</div>
            <div class="summary-value"><?= $open_count; ?></div>
        </div>
    </div>
    <?php endif; ?>
    <div class="summary-tile">
        <div class="summary-icon purple"><i class="ph ph-phone"></i></div>
        <div>
            <div class="summary-label">Contact</div>
            <div class="summary-value"><?= trim($p->contact) !== '' ? htmlentities($p->contact) : '—'; ?></div>
        </div>
    </div>
</div>

<!-- Patient details -->
<div class="card info-card">
    <div class="card-header collapsible collapsed" data-toggle="collapse" data-target="#patientInfo" aria-expanded="false" aria-controls="patientInfo" role="button">
        <h5><span class="section-icon"><i class="ph ph-identification-card"></i></span>Patient Information</h5>
        <div class="header-right">
            <a href="<?= base_url(); ?>Pages/patient_edit/<?= $p->id; ?>" class="header-link" onclick="event.stopPropagation();"><i class="ph ph-pencil-simple"></i>Edit details</a>
            <span class="collapse-toggle"><span class="toggle-text">Show</span><i class="ph ph-caret-down"></i></span>
        </div>
    </div>
    <div class="card-body collapse" id="patientInfo">
        <div class="details-grid">
            <div class="detail"><div class="detail-label">Full Name</div><div class="detail-value"><?= htmlentities($display_name); ?></div></div>
            <div class="detail"><div class="detail-label">Birthday</div><div class="detail-value"><?= pv($birthday_fmt); ?></div></div>
            <div class="detail"><div class="detail-label">Age</div><div class="detail-value"><?= $p->age ? (int) $p->age . ' years old' : '<span class="muted">—</span>'; ?></div></div>
            <div class="detail"><div class="detail-label">Gender</div><div class="detail-value"><?= pv(ucfirst($gender)); ?></div></div>
            <div class="detail"><div class="detail-label">Civil Status</div><div class="detail-value"><?= pv($p->civil_status); ?></div></div>
            <div class="detail"><div class="detail-label">Occupation</div><div class="detail-value"><?= pv(ucwords(strtolower((string) $p->occupation))); ?></div></div>
            <div class="detail"><div class="detail-label">Contact Number</div><div class="detail-value"><?= pv($p->contact); ?></div></div>
            <div class="detail"><div class="detail-label">Email</div><div class="detail-value"><?= trim((string) $p->email) !== '' ? '<a href="mailto:' . htmlentities($p->email) . '">' . htmlentities($p->email) . '</a>' : '<span class="muted">—</span>'; ?></div></div>
            <div class="detail"><div class="detail-label">Portal Access</div><div class="detail-value"><?= (int) $p->portal_access === 1 ? 'Enabled' : 'Disabled'; ?></div></div>
            <div class="detail"><div class="detail-label">Company / Employer</div><div class="detail-value"><?= pv(ucwords(strtolower((string) $p->company))); ?></div></div>
            <div class="detail" style="grid-column: span 2;"><div class="detail-label">Address</div><div class="detail-value"><?= pv($address); ?></div></div>
        </div>
    </div>
</div>

<!-- Visit history: diagnosed visits and open appointments in one list -->
<div class="card info-card">
    <div class="card-header">
        <h5>
            <span class="section-icon"><i class="ph ph-clipboard-text"></i></span>
            Visit History <span class="count-badge"><?= count($timeline); ?></span>
            <?php if($open_count): ?><span class="tag pending"><i class="ph ph-clock"></i><?= $open_count; ?> awaiting diagnosis</span><?php endif; ?>
        </h5>
        <a href="<?= base_url(); ?>Pages/ap/<?= $p->id; ?>" class="header-link"><i class="ph ph-plus"></i>New appointment</a>
    </div>
    <div class="card-body" style="padding: 0;">
        <?php if(!empty($timeline)): ?>
        <div class="table-responsive">
            <table id="historyTable" class="table table-modern">
                <thead>
                    <tr>
                        <th>Visit</th>
                        <th>Vitals</th>
                        <th>Findings</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($timeline as $item):
                        $r    = $item['row'];
                        $kind = $item['kind'];
                        $ts   = $item['ts'];

                        $doc = trim((string) (isset($r->doc_last) ? $r->doc_last : ''));
                        if ($doc !== '') {
                            $doc = ucwords(strtolower($doc . ', ' . $r->doc_first))
                                 . (trim((string) $r->doc_middle) !== '' ? ' ' . strtoupper(substr(trim($r->doc_middle), 0, 1)) . '.' : '');
                        }

                        $bp = trim((string) $r->bp);
                        $wt = trim((string) $r->weight);
                        $type = trim((string) $r->transaction);
                        $has_ob = trim((string) $r->lmp) !== '' || trim((string) $r->date_of_delivery) !== ''
                                  || (int) $r->gravida || (int) $r->parity || (int) $r->abortion || (int) $r->living;
                    ?>
                    <tr class="row-<?= $kind; ?>">
                        <td data-order="<?= $ts; ?>">
                            <div class="cell-date"><?= $ts ? date('M j, Y', $ts) : 'Undated'; ?></div>
                            <?php if($type !== ''): ?><div class="cell-sub"><span class="tag type"><?= htmlentities($type); ?></span></div><?php endif; ?>
                            <?php if($doc !== ''): ?><div class="cell-sub"><i class="ph ph-user-circle"></i><?= htmlentities($doc); ?></div><?php endif; ?>
                            <?php if(!empty($r->specialty_name)): ?><div class="cell-sub"><span class="tag specialty"><?= htmlentities($r->specialty_name); ?></span></div><?php endif; ?>
                        </td>
                        <td>
                            <div class="vitals">
                                <?php if($r->visit_age): ?><span class="vital"><span class="k">Age</span><span class="v"><?= (int) $r->visit_age; ?></span></span><?php endif; ?>
                                <?php if($bp !== ''): ?><span class="vital"><span class="k">BP</span><span class="v"><?= htmlentities($bp); ?></span></span><?php endif; ?>
                                <?php if($wt !== ''): ?><span class="vital"><span class="k">Wt</span><span class="v"><?= htmlentities($wt); ?> kg</span></span><?php endif; ?>
                                <?php if($has_ob): ?>
                                    <?php if(trim((string) $r->lmp) !== ''): ?><span class="vital"><span class="k">LMP</span><span class="v"><?= htmlentities($r->lmp); ?></span></span><?php endif; ?>
                                    <?php if(trim((string) $r->date_of_delivery) !== ''): ?><span class="vital"><span class="k">EDD</span><span class="v"><?= htmlentities($r->date_of_delivery); ?></span></span><?php endif; ?>
                                    <span class="vital"><span class="k">G/P/A/L</span><span class="v"><?= (int) $r->gravida; ?>/<?= (int) $r->parity; ?>/<?= (int) $r->abortion; ?>/<?= (int) $r->living; ?></span></span>
                                <?php endif; ?>
                                <?php if(!$r->visit_age && $bp === '' && $wt === '' && !$has_ob): ?><span class="muted-dash">—</span><?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <?php if($kind === 'diagnosed'): ?>
                                <?= findings_cell(
                                    array('Diagnosis' => $r->diagnosis, 'Treatment' => $r->treatment, 'Laboratory' => $r->lab, 'Remarks' => $r->remarks),
                                    $display_name,
                                    ($ts ? date('F j, Y', $ts) : '') . ($doc !== '' ? ' · ' . $doc : '')
                                ); ?>
                            <?php elseif($kind === 'cancelled'): ?>
                                <div class="note muted">Cancelled<?= trim((string) $r->cancel_reason) !== '' ? ' — ' . htmlentities($r->cancel_reason) : ''; ?></div>
                            <?php else: ?>
                                <div class="note muted">Checked in, not yet diagnosed</div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($kind === 'diagnosed'): ?>
                                <span class="tag <?= (int) $r->payment_status === 1 ? 'paid' : 'unpaid'; ?>"><i class="ph <?= (int) $r->payment_status === 1 ? 'ph-check-circle' : 'ph-clock'; ?>"></i><?= (int) $r->payment_status === 1 ? 'Paid' : 'Unpaid'; ?></span>
                            <?php elseif($kind === 'cancelled'): ?>
                                <span class="tag cancelled"><i class="ph ph-x-circle"></i>Cancelled</span>
                            <?php else: ?>
                                <span class="tag pending"><i class="ph ph-clock"></i>Awaiting diagnosis</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-right">
                            <?php if($kind === 'diagnosed'): ?>
                                <a href="<?= base_url(); ?>Pages/diagnose_edit/<?= (int) $r->id; ?>" class="btn-sm-action"><i class="ph ph-pencil-simple"></i>Edit record</a>
                            <?php elseif($kind === 'open'): ?>
                                <a href="<?= base_url(); ?>Pages/diagnose/<?= (int) $r->id; ?>" class="btn-sm-action"><i class="ph ph-stethoscope"></i>Diagnose</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="empty-state">
            <i class="ph ph-clipboard-text"></i>
            <p>No visits recorded yet for this patient</p>
            <a href="<?= base_url(); ?>Pages/ap/<?= $p->id; ?>" class="empty-link"><i class="ph ph-calendar-plus"></i>Create first appointment</a>
        </div>
        <?php endif; ?>
    </div>
</div>

<?= findings_modal(); ?>

</div>

<script>
$(function () {
    $('#patientInfo')
        .on('show.bs.collapse', function () { $('[data-target="#patientInfo"] .toggle-text').text('Hide'); })
        .on('hide.bs.collapse', function () { $('[data-target="#patientInfo"] .toggle-text').text('Show'); });

    // Search and paging only earn their place once the history is long enough.
    var $history = $('#historyTable');
    if ($history.length && $history.find('tbody tr').length > 8) {
        $history.DataTable({
            responsive: false,
            pageLength: 10,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']],
            dom: '<"row"<"col-sm-6"l><"col-sm-6"f>>rt<"row"<"col-sm-6"i><"col-sm-6"p>>',
            order: [[0, 'desc']],
            columnDefs: [{ targets: [1, 2, 4], orderable: false }],
            language: {
                search: '', searchPlaceholder: 'Search visits…',
                lengthMenu: 'Show _MENU_',
                info: 'Showing _START_ to _END_ of _TOTAL_ visits',
                infoEmpty: 'Nothing to show',
                infoFiltered: '(filtered from _MAX_)',
                zeroRecords: 'No matching visits',
                paginate: { first: 'First', last: 'Last', next: 'Next', previous: 'Prev' }
            }
        });
    }
});
</script>
