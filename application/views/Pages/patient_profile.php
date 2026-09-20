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
    grid-template-columns: repeat(4, 1fr);
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

/* ===== Visit timeline ===== */
.visit-list { padding: 8px 24px 24px; }
.visit {
    position: relative;
    padding: 20px 0 20px 32px;
    border-left: 2px solid #e8eef5;
}
.visit:last-child { padding-bottom: 0; }
.visit::before {
    content: '';
    position: absolute;
    left: -7px; top: 26px;
    width: 12px; height: 12px;
    border-radius: 50%;
    background: #1e88e5;
    border: 2px solid #fff;
    box-shadow: 0 0 0 2px #1e88e5;
}
.visit-card {
    background: #fff;
    border: 1px solid #edf2f7;
    border-radius: 12px;
    overflow: hidden;
}
.visit-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    flex-wrap: wrap;
    padding: 14px 18px;
    background: #f9fbfd;
    border-bottom: 1px solid #f0f4f8;
}
.visit-date { font-weight: 700; color: #1c2b3a; font-size: 15px; display: flex; align-items: center; gap: 8px; }
.visit-date i { color: #1e88e5; }
.visit-meta { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.tag {
    display: inline-flex; align-items: center; gap: 5px;
    height: 26px; padding: 0 10px; border-radius: 13px;
    font-size: 11.5px; font-weight: 600; white-space: nowrap;
}
.tag.type { background: #e8f4fd; color: #1565c0; text-transform: uppercase; letter-spacing: .3px; }
.tag.specialty { background: #f3effb; color: #7e57c2; }
.tag.paid { background: #e7f7f5; color: #0f8a7f; }
.tag.unpaid { background: #fff5e6; color: #d68910; }
.tag.doctor { background: #f1f5f9; color: #3d4f63; }
.visit-body { padding: 18px; }
.vitals { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 16px; }
.vital {
    display: inline-flex; align-items: baseline; gap: 6px;
    background: #f7fafd; border: 1px solid #edf2f7;
    border-radius: 8px; padding: 6px 10px;
}
.vital .k { font-size: 10.5px; font-weight: 700; color: #8a9bb0; text-transform: uppercase; letter-spacing: .4px; }
.vital .v { font-size: 13.5px; font-weight: 700; color: #1c2b3a; }
.notes { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; }
.note-block { background: #f9fbfd; border-radius: 10px; padding: 12px 14px; border-left: 3px solid #dce4ec; }
.note-block.diagnosis { border-left-color: #1e88e5; }
.note-block.treatment { border-left-color: #11998e; }
.note-block.lab { border-left-color: #7e57c2; }
.note-block.remarks { border-left-color: #f39c12; }
.note-label { font-size: 11px; font-weight: 700; color: #8a9bb0; text-transform: uppercase; letter-spacing: .5px; margin-bottom: 6px; }
.note-text { font-size: 13.5px; color: #1c2b3a; white-space: pre-line; line-height: 1.55; }
.note-text.muted { color: #b8c4d0; font-style: italic; }
.visit-actions { display: flex; justify-content: flex-end; margin-top: 14px; }
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
    .notes { grid-template-columns: 1fr; }
    .visit-list { padding: 8px 16px 16px; }
    .visit { padding-left: 22px; }
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
            <div class="detail"><div class="detail-label">Occupation</div><div class="detail-value"><?= pv(ucwords(strtolower($p->occupation))); ?></div></div>
            <div class="detail"><div class="detail-label">Contact Number</div><div class="detail-value"><?= pv($p->contact); ?></div></div>
            <div class="detail"><div class="detail-label">Email</div><div class="detail-value"><?= trim($p->email) !== '' ? '<a href="mailto:' . htmlentities($p->email) . '">' . htmlentities($p->email) . '</a>' : '<span class="muted">—</span>'; ?></div></div>
            <div class="detail"><div class="detail-label">Portal Access</div><div class="detail-value"><?= (int) $p->portal_access === 1 ? 'Enabled' : 'Disabled'; ?></div></div>
            <div class="detail"><div class="detail-label">Company / Employer</div><div class="detail-value"><?= pv(ucwords(strtolower($p->company))); ?></div></div>
            <div class="detail" style="grid-column: span 2;"><div class="detail-label">Address</div><div class="detail-value"><?= pv($address); ?></div></div>
        </div>
    </div>
</div>

<!-- Visit history -->
<div class="card info-card">
    <div class="card-header">
        <h5><span class="section-icon"><i class="ph ph-clipboard-text"></i></span>Medical History <span class="count-badge"><?= $visit_count; ?></span></h5>
        <a href="<?= base_url(); ?>Pages/ap/<?= $p->id; ?>" class="header-link"><i class="ph ph-plus"></i>New appointment</a>
    </div>
    <?php if(!empty($diag)): ?>
    <div class="visit-list">
        <?php foreach($diag as $v):
            $vdate = $v->date ?: $v->visit_date;
            $vdate_ts = $vdate ? strtotime($vdate) : false;
            $doc = trim((string) $v->doc_last);
            if ($doc !== '') {
                $doc = ucwords(strtolower($doc . ', ' . $v->doc_first)) . (trim((string) $v->doc_middle) !== '' ? ' ' . strtoupper(substr(trim($v->doc_middle), 0, 1)) . '.' : '');
            }
            $has_ob = trim((string) $v->lmp) !== '' || trim((string) $v->date_of_delivery) !== '' || (int) $v->gravida || (int) $v->parity || (int) $v->abortion || (int) $v->living;
        ?>
        <div class="visit">
            <div class="visit-card">
                <div class="visit-head">
                    <div class="visit-date"><i class="ph ph-calendar-blank"></i><?= $vdate_ts ? date('F j, Y', $vdate_ts) : 'Undated visit'; ?></div>
                    <div class="visit-meta">
                        <?php if(trim((string) $v->transaction) !== ''): ?><span class="tag type"><?= htmlentities($v->transaction); ?></span><?php endif; ?>
                        <?php if(!empty($v->specialty_name)): ?><span class="tag specialty"><i class="ph ph-first-aid-kit"></i><?= htmlentities($v->specialty_name); ?></span><?php endif; ?>
                        <?php if($doc !== ''): ?><span class="tag doctor"><i class="ph ph-user-circle"></i><?= htmlentities($doc); ?></span><?php endif; ?>
                        <span class="tag <?= (int) $v->payment_status === 1 ? 'paid' : 'unpaid'; ?>"><i class="ph <?= (int) $v->payment_status === 1 ? 'ph-check-circle' : 'ph-clock'; ?>"></i><?= (int) $v->payment_status === 1 ? 'Paid' : 'Unpaid'; ?></span>
                    </div>
                </div>
                <div class="visit-body">
                    <div class="vitals">
                        <?php if($v->visit_age): ?><span class="vital"><span class="k">Age</span><span class="v"><?= (int) $v->visit_age; ?></span></span><?php endif; ?>
                        <?php if(trim((string) $v->bp) !== ''): ?><span class="vital"><span class="k">BP</span><span class="v"><?= htmlentities($v->bp); ?></span></span><?php endif; ?>
                        <?php if(trim((string) $v->weight) !== ''): ?><span class="vital"><span class="k">Weight</span><span class="v"><?= htmlentities($v->weight); ?> kg</span></span><?php endif; ?>
                        <?php if($has_ob): ?>
                            <?php if(trim((string) $v->lmp) !== ''): ?><span class="vital"><span class="k">LMP</span><span class="v"><?= htmlentities($v->lmp); ?></span></span><?php endif; ?>
                            <?php if(trim((string) $v->date_of_delivery) !== ''): ?><span class="vital"><span class="k">EDD</span><span class="v"><?= htmlentities($v->date_of_delivery); ?></span></span><?php endif; ?>
                            <span class="vital"><span class="k">G/P/A/L</span><span class="v"><?= (int) $v->gravida; ?>/<?= (int) $v->parity; ?>/<?= (int) $v->abortion; ?>/<?= (int) $v->living; ?></span></span>
                        <?php endif; ?>
                    </div>
                    <div class="notes">
                        <div class="note-block diagnosis">
                            <div class="note-label">Diagnosis</div>
                            <div class="note-text <?= trim((string) $v->diagnosis) === '' ? 'muted' : ''; ?>"><?= trim((string) $v->diagnosis) !== '' ? htmlentities(trim($v->diagnosis)) : 'No diagnosis recorded'; ?></div>
                        </div>
                        <div class="note-block treatment">
                            <div class="note-label">Treatment</div>
                            <div class="note-text <?= trim((string) $v->treatment) === '' ? 'muted' : ''; ?>"><?= trim((string) $v->treatment) !== '' ? htmlentities(trim($v->treatment)) : 'No treatment recorded'; ?></div>
                        </div>
                        <?php if(trim((string) $v->lab) !== ''): ?>
                        <div class="note-block lab">
                            <div class="note-label">Laboratory</div>
                            <div class="note-text"><?= htmlentities(trim($v->lab)); ?></div>
                        </div>
                        <?php endif; ?>
                        <?php if(trim((string) $v->remarks) !== ''): ?>
                        <div class="note-block remarks">
                            <div class="note-label">Remarks</div>
                            <div class="note-text"><?= htmlentities(trim($v->remarks)); ?></div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="visit-actions">
                        <a href="<?= base_url(); ?>Pages/diagnose_edit/<?= $v->id; ?>" class="btn-sm-action"><i class="ph ph-pencil-simple"></i>Edit record</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="empty-state">
        <i class="ph ph-clipboard-text"></i>
        <p>No medical history yet for this patient</p>
        <a href="<?= base_url(); ?>Pages/ap/<?= $p->id; ?>" class="empty-link"><i class="ph ph-calendar-plus"></i>Create first appointment</a>
    </div>
    <?php endif; ?>
</div>

</div>

<script>
$(function () {
    $('#patientInfo')
        .on('show.bs.collapse', function () { $('[data-target="#patientInfo"] .toggle-text').text('Hide'); })
        .on('hide.bs.collapse', function () { $('[data-target="#patientInfo"] .toggle-text').text('Show'); });
});
</script>
