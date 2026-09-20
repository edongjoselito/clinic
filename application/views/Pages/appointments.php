<style>
.appointment-wrapper { padding-top: 20px; padding-bottom: 20px; }

/* ===== Hero ===== */
.ap-hero {
    position: relative;
    background: linear-gradient(120deg, #0d47a1 0%, #1565c0 45%, #1e88e5 100%);
    border-radius: 16px;
    padding: 30px 36px;
    margin-bottom: 24px;
    box-shadow: 0 12px 32px rgba(13, 71, 161, 0.28);
    color: #fff;
    overflow: hidden;
}
.ap-hero::before {
    content: '';
    position: absolute;
    top: -90px; right: -60px;
    width: 260px; height: 260px;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
}
.ap-hero .hero-inner {
    position: relative; z-index: 1;
    display: flex; align-items: center; justify-content: space-between;
    gap: 24px; flex-wrap: wrap;
}
.hero-identity { display: flex; align-items: center; gap: 18px; min-width: 0; }
.hero-avatar {
    width: 64px; height: 64px; min-width: 64px;
    border-radius: 50%;
    border: 3px solid rgba(255,255,255,0.6);
    background: rgba(255,255,255,0.18);
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; font-weight: 700; color: #fff;
}
.hero-eyebrow { font-size: 12px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; color: rgba(255,255,255,0.75); margin-bottom: 4px; }
.hero-name { font-size: 24px; font-weight: 700; color: #fff; margin: 0 0 6px; line-height: 1.2; }
.hero-chips { display: flex; gap: 8px; flex-wrap: wrap; }
.hero-chip {
    display: inline-flex; align-items: center; gap: 6px;
    height: 26px; padding: 0 11px; border-radius: 13px;
    background: rgba(255,255,255,0.16); border: 1px solid rgba(255,255,255,0.25);
    font-size: 12px; font-weight: 600; color: #fff;
}
.hero-actions { display: flex; gap: 10px; flex-wrap: wrap; }
.hero-cta {
    display: inline-flex; align-items: center; gap: 8px;
    height: 42px; padding: 0 18px; border-radius: 10px;
    font-weight: 600; font-size: 14px; text-decoration: none; transition: all .2s ease;
    border: 1px solid rgba(255,255,255,0.4); background: rgba(255,255,255,0.15); color: #fff;
}
.hero-cta:hover { background: rgba(255,255,255,0.25); color: #fff; text-decoration: none; }

/* ===== Cards ===== */
.form-card {
    border: 1px solid #e9eef5;
    border-radius: 14px;
    box-shadow: 0 1px 4px rgba(30, 58, 95, 0.03);
    margin-bottom: 22px;
    background: #fff;
}
.form-card .card-header {
    background: #fff;
    border-bottom: 1px solid #f0f4f8;
    padding: 16px 24px;
    border-radius: 14px 14px 0 0;
    display: flex; align-items: center; justify-content: space-between; gap: 12px;
}
.form-card .card-header h5 { margin: 0; font-weight: 700; color: #1c2b3a; font-size: 15px; display: flex; align-items: center; gap: 12px; }
.section-icon {
    width: 36px; height: 36px; min-width: 36px;
    background: #e8f4fd; border-radius: 10px;
    display: inline-flex; align-items: center; justify-content: center;
}
.section-icon i { color: #1e88e5; font-size: 18px; }
.section-icon.pink { background: #fce4ec; }
.section-icon.pink i { color: #ec407a; }
.form-card .card-body { padding: 24px; }
.count-badge { background: #e8f4fd; color: #1565c0; font-size: 12px; font-weight: 700; padding: 3px 10px; border-radius: 12px; }
.header-link { font-size: 13px; font-weight: 600; color: #1e88e5; text-decoration: none; display: inline-flex; align-items: center; gap: 4px; }
.header-link:hover { color: #0d47a1; text-decoration: none; }
.header-note { font-size: 12.5px; color: #8a9bb0; font-weight: 500; }

/* ===== Form controls ===== */
.form-group { margin-bottom: 20px; }
.form-row:last-child .form-group { margin-bottom: 0; }
.form-group label { font-weight: 600; color: #5a6b7d; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px; }
.form-control {
    height: 44px; border: 1px solid #dce4ec; border-radius: 10px;
    padding: 0 14px; font-size: 14px; color: #1c2b3a; transition: all 0.2s ease;
}
textarea.form-control { height: auto; padding: 12px 14px; resize: vertical; min-height: 96px; }
.form-control:focus { border-color: #1e88e5; box-shadow: 0 0 0 3px rgba(30, 136, 229, 0.1); }
.form-control[readonly] { background: #f7fafd; color: #6c7d8f; }
select.form-control { padding-right: 32px; }
.input-unit { position: relative; }
.input-unit .form-control { padding-right: 56px; }
.input-unit .unit {
    position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
    font-size: 12.5px; font-weight: 600; color: #8a9bb0; pointer-events: none;
}
.form-hint { display: flex; align-items: center; gap: 6px; font-size: 12.5px; color: #8a9bb0; margin-top: 6px; min-height: 18px; }
.hint-prev { color: #1e88e5; font-weight: 600; }
.required::after { content: ' *'; color: #e53935; }
.delta { display: none; align-items: center; gap: 3px; height: 18px; padding: 0 7px; border-radius: 9px; font-size: 11px; font-weight: 700; }
.delta.up { background: #fff3e6; color: #d6810f; }
.delta.down { background: #eaf4ff; color: #1565c0; }
.delta.same { background: #eef1f5; color: #7b8a9c; }

/* Segmented radio (Patient status) */
.segmented { display: flex; height: 44px; border: 1px solid #dce4ec; border-radius: 10px; overflow: hidden; background: #fff; }
.segmented input { position: absolute; opacity: 0; width: 0; height: 0; }
.segmented label {
    flex: 1; display: flex; align-items: center; justify-content: center; gap: 6px;
    margin: 0; font-size: 14px; font-weight: 600; color: #5a6b7d;
    text-transform: none; letter-spacing: 0; cursor: pointer; transition: all .15s;
}
.segmented label i { font-size: 16px; }
.segmented label + input + label { border-left: 1px solid #dce4ec; }
.segmented label:hover { background: #f7fafd; }
.segmented input:checked + label { background: #1e88e5; color: #fff; }

/* Quick-pick chips for the notes field */
.chip-row { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 10px; }
.chip-pick {
    height: 30px; padding: 0 12px; border-radius: 15px;
    border: 1px solid #dce4ec; background: #fff; color: #5a6b7d;
    font-size: 12.5px; font-weight: 600; cursor: pointer; transition: all .15s;
}
.chip-pick:hover { border-color: #1e88e5; color: #1565c0; background: #f5faff; }

/* Obstetric panel */
.ob-toggle {
    display: flex; align-items: center; gap: 16px;
    padding: 16px 18px; background: #fdf9fb; border: 1px solid #f6e5ec;
    border-radius: 12px; cursor: pointer; user-select: none; transition: border-color .2s;
}
.ob-toggle:hover { border-color: #f0cdd9; }
.ob-toggle .ob-icon {
    width: 40px; height: 40px; min-width: 40px; border-radius: 10px;
    background: #fce4ec; color: #ec407a;
    display: flex; align-items: center; justify-content: center; font-size: 20px;
}
.ob-toggle .ob-text { flex: 1; min-width: 0; }
.ob-toggle .ob-title { font-size: 14px; font-weight: 700; color: #1c2b3a; }
.ob-toggle .ob-desc { font-size: 12.5px; color: #8a9bb0; font-weight: 500; }
.ob-toggle .ob-caret {
    display: inline-flex; align-items: center; gap: 6px;
    height: 32px; padding: 0 12px; border-radius: 8px;
    background: #fff; border: 1px solid #f0cdd9; color: #b03a63; font-size: 12.5px; font-weight: 600;
}
.ob-toggle .ob-caret i { transition: transform .2s; }
.ob-toggle[aria-expanded="true"] .ob-caret i { transform: rotate(180deg); }
.ob-toggle[aria-expanded="true"] { border-radius: 12px 12px 0 0; border-bottom-color: transparent; }
.ob-panel { border: 1px solid #f6e5ec; border-top: none; border-radius: 0 0 12px 12px; padding: 22px 18px 18px; background: #fff; }
.ob-actions { display: flex; gap: 8px; height: 44px; align-items: center; }
.btn-ob {
    display: inline-flex; align-items: center; gap: 6px;
    height: 40px; padding: 0 16px; border-radius: 10px; border: none;
    font-size: 13.5px; font-weight: 600; cursor: pointer; transition: all .2s;
}
.btn-ob.calc { background: #1e88e5; color: #fff; }
.btn-ob.calc:hover { background: #1565c0; }
.btn-ob.clear { background: #f1f5f9; color: #3d4f63; }
.btn-ob.clear:hover { background: #e3eaf1; }
.ob-grid { display: grid; grid-template-columns: repeat(6, 1fr); gap: 12px; }
.ob-grid .form-group { margin-bottom: 0; }
.ob-grid label { font-size: 11px; }
.ob-grid label small { display: block; text-transform: none; letter-spacing: 0; font-weight: 500; color: #a5b3c2; }

/* ===== Sticky action bar ===== */
.form-actions {
    position: sticky; bottom: 16px; z-index: 5;
    display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;
    background: #fff; border: 1px solid #e9eef5; border-radius: 14px;
    padding: 14px 20px; box-shadow: 0 6px 20px rgba(30, 58, 95, 0.08);
    margin-bottom: 22px;
}
.form-actions .hint { font-size: 13px; color: #8a9bb0; }
.form-actions .hint span { color: #e53935; }
.form-actions .btns { display: flex; gap: 10px; }
.btn-cancel, .btn-submit {
    display: inline-flex; align-items: center; gap: 6px;
    height: 42px; padding: 0 20px; border-radius: 10px;
    font-weight: 600; font-size: 14px; border: none; text-decoration: none; cursor: pointer; transition: all 0.2s ease;
}
.btn-cancel { background: #f1f5f9; color: #3d4f63; }
.btn-cancel:hover { background: #e3eaf1; color: #1c2b3a; text-decoration: none; }
.btn-submit { background: #1e88e5; color: #fff; box-shadow: 0 4px 12px rgba(30,136,229,.25); }
.btn-submit:hover { background: #1565c0; color: #fff; }

/* ===== History (compact) ===== */
.table-modern { margin-bottom: 0; }
.table-modern th {
    border-top: none; border-bottom: 1px solid #f0f4f8;
    font-weight: 700; color: #8496a9; font-size: 11.5px;
    text-transform: uppercase; letter-spacing: 0.6px; padding: 14px 18px; background: #fcfdff; white-space: nowrap;
}
.table-modern td { vertical-align: top; border-color: #f2f5f8; padding: 14px 18px; font-size: 13.5px; color: #3d4f63; }
.table-modern th:first-child, .table-modern td:first-child { padding-left: 24px; }
.table-modern th:last-child, .table-modern td:last-child { padding-right: 24px; }
.table-modern tbody tr:hover { background: #fafcfe; }
.cell-date { font-weight: 700; color: #1c2b3a; white-space: nowrap; }
.cell-sub { font-size: 12px; color: #8a9bb0; margin-top: 2px; white-space: nowrap; }
.vitals { display: flex; gap: 6px; flex-wrap: wrap; }
.vital {
    display: inline-flex; align-items: baseline; gap: 5px;
    background: #f7fafd; border: 1px solid #edf2f7; border-radius: 6px; padding: 3px 8px; white-space: nowrap;
}
.vital .k { font-size: 10px; font-weight: 700; color: #8a9bb0; text-transform: uppercase; }
.vital .v { font-size: 12.5px; font-weight: 700; color: #1c2b3a; }
.note { max-width: 320px; white-space: pre-line; line-height: 1.5; }
.note .lbl { font-size: 10.5px; font-weight: 700; color: #8a9bb0; text-transform: uppercase; letter-spacing: .4px; }
.note + .note { margin-top: 8px; }
.note.muted { color: #b8c4d0; font-style: italic; }
.tag { display: inline-flex; align-items: center; gap: 4px; height: 24px; padding: 0 9px; border-radius: 12px; font-size: 11px; font-weight: 600; white-space: nowrap; }
.tag.type { background: #e8f4fd; color: #1565c0; text-transform: uppercase; }
.tag.paid { background: #e7f7f5; color: #0f8a7f; }
.tag.unpaid { background: #fff5e6; color: #d68910; }
.tag.pending { background: #fff5e6; color: #d68910; }
.tag.cancelled { background: #fdecec; color: #c62828; }
.row-open { background: #fffdf7; }
.row-open:hover { background: #fffaf0; }
.row-open.is-cancelled { background: #fdfbfb; }
.row-open.is-cancelled .cell-date { color: #8a9bb0; text-decoration: line-through; }
.btn-sm-action {
    display: inline-flex; align-items: center; gap: 6px;
    height: 32px; padding: 0 12px; border-radius: 8px;
    font-size: 12.5px; font-weight: 600; text-decoration: none;
    background: #eef4fb; color: #1565c0; transition: all .2s; white-space: nowrap;
}
.btn-sm-action:hover { background: #1e88e5; color: #fff; text-decoration: none; }
.empty-state { text-align: center; padding: 44px 20px; color: #8a9bb0; }
.empty-state > i { font-size: 40px; color: #d4dde8; display: block; margin-bottom: 10px; }
.empty-state p { margin: 0; font-size: 14px; }

@media (max-width: 991px) { .ob-grid { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 767px) {
    .ap-hero { padding: 24px 22px; }
    .hero-actions { width: 100%; }
    .hero-actions .hero-cta { flex: 1; justify-content: center; }
    .ob-grid { grid-template-columns: repeat(2, 1fr); }
    .form-row .form-group { margin-bottom: 20px; }
    .form-actions { position: static; }
    .form-actions .btns { width: 100%; }
    .form-actions .btns .btn-cancel, .form-actions .btns .btn-submit { flex: 1; justify-content: center; }
}
</style>

<?php
$p = $data;
$display_name = ucwords(strtolower(trim($p->first_name . ' ' . $p->middle_name . ' ' . $p->last_name)));
$initials = strtoupper(substr(trim($p->first_name), 0, 1) . substr(trim($p->last_name), 0, 1));
$bday_ts = $p->birthday ? strtotime($p->birthday) : false;
$age = $bday_ts ? (int) date_diff(date_create('@' . $bday_ts), date_create('today'))->y : (int) $p->age;
$gender = strtolower(trim($p->gender));
$is_male = ($gender === 'male' || $gender === 'm');
$gender_icon = $is_male ? 'ph-gender-male' : ($gender === '' ? 'ph-gender-intersex' : 'ph-gender-female');
$address_parts = array_filter(array_map('trim', array($p->sitio, $p->barangay, $p->city_mun, $p->province)));
$address = $address_parts ? ucwords(strtolower(implode(', ', $address_parts))) : '';
$history = isset($history) ? $history : array();
$last = isset($last_visit) ? $last_visit : null;

// Obstetric data only applies to female patients
$has_ob_history = false;
if (!$is_male) {
    foreach ($history as $h) {
        if (trim((string) $h->lmp) !== '' || trim((string) $h->date_of_delivery) !== '' || (int) $h->gravida || (int) $h->parity) { $has_ob_history = true; break; }
    }
}
$show_ob = !$is_male;

// Appointments with no diagnosis yet, so this card does not read as "never been here"
$pending = isset($pending) ? $pending : array();
$open_count = 0;
foreach ($pending as $a) { if (empty($a->cancelled_at)) { $open_count++; } }
$row_total = count($history) + count($pending);

$last_date_ts = false;
if ($last) {
    $ld = $last->date ?: $last->visit_date;
    $last_date_ts = $ld ? strtotime($ld) : false;
}
$last_weight = $last ? trim((string) $last->weight) : '';
?>

<div class="appointment-wrapper">

<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>
<?php if($this->session->flashdata('danger')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('danger'); ?>
    </div>
<?php endif; ?>

<!-- Hero: who is this appointment for -->
<div class="ap-hero">
    <div class="hero-inner">
        <div class="hero-identity">
            <div class="hero-avatar"><?= htmlentities($initials ?: '?'); ?></div>
            <div>
                <div class="hero-eyebrow">New Appointment</div>
                <h1 class="hero-name"><?= htmlentities($display_name); ?></h1>
                <div class="hero-chips">
                    <?php if($age): ?><span class="hero-chip"><i class="ph ph-cake"></i><?= $age; ?> yrs</span><?php endif; ?>
                    <?php if($gender): ?><span class="hero-chip"><i class="ph <?= $gender_icon; ?>"></i><?= ucfirst($gender); ?></span><?php endif; ?>
                    <?php if($bday_ts): ?><span class="hero-chip"><i class="ph ph-calendar-blank"></i><?= date('M j, Y', $bday_ts); ?></span><?php endif; ?>
                    <?php if($last_date_ts): ?><span class="hero-chip"><i class="ph ph-clock-counter-clockwise"></i>Last visit <?= date('M j, Y', $last_date_ts); ?></span><?php endif; ?>
                    <?php if($address): ?><span class="hero-chip"><i class="ph ph-map-pin"></i><?= htmlentities($address); ?></span><?php endif; ?>
                </div>
            </div>
        </div>
        <div class="hero-actions">
            <a href="<?= base_url(); ?>Pages/patient_profile/<?= $p->id; ?>" class="hero-cta"><i class="ph ph-user"></i>Profile</a>
            <a href="<?= base_url(); ?>Pages/patient_list" class="hero-cta"><i class="ph ph-arrow-left"></i>Back to Patients</a>
        </div>
    </div>
</div>

<?= validation_errors(); ?>

<?= form_open('Pages/app_add', array('class' => 'parsley-examples', 'autocomplete' => 'off')); ?>
<input type="hidden" name="p_id" value="<?= (int) $p->id; ?>">
<input type="hidden" name="age" value="<?= $age; ?>">
<input id="cyVal" type="hidden" value="28">
<input id="weekVal" type="hidden" name="no_of_weeks">
<input id="dayVal" type="hidden" name="no_of_days">

<!-- Visit details -->
<div class="card form-card">
    <div class="card-header">
        <h5><span class="section-icon"><i class="ph ph-calendar-plus"></i></span>Visit Details</h5>
        <span class="header-note">Today, <?= date('M j, Y'); ?></span>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="required">Date of Appointment</label>
                <input type="date" required class="form-control" name="visit_date" value="<?= date('Y-m-d'); ?>" />
            </div>
            <div class="form-group col-md-4">
                <label class="required">Blood Pressure</label>
                <div class="input-unit">
                    <input type="text" required class="form-control" name="bp" placeholder="120/80" pattern="\s*\d{2,3}\s*/\s*\d{2,3}\s*" title="Format: systolic/diastolic, e.g. 120/80" />
                    <span class="unit">mmHg</span>
                </div>
                <?php if($last && trim((string) $last->bp) !== ''): ?>
                    <small class="form-hint">Last visit: <span class="hint-prev"><?= htmlentities($last->bp); ?></span></small>
                <?php endif; ?>
            </div>
            <div class="form-group col-md-4">
                <label class="required">Weight</label>
                <div class="input-unit">
                    <input type="number" required class="form-control" name="weight" id="weightInput" placeholder="60" step="0.1" min="0" inputmode="decimal" data-last="<?= htmlentities($last_weight); ?>" />
                    <span class="unit">kg</span>
                </div>
                <?php if($last_weight !== ''): ?>
                    <small class="form-hint">Last visit: <span class="hint-prev"><?= htmlentities($last_weight); ?> kg</span><span class="delta" id="weightDelta"></span></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="required">Patient Status</label>
                <div class="segmented">
                    <input type="radio" onclick="refer()" id="customRadio1" name="ref" value="0" checked />
                    <label for="customRadio1"><i class="ph ph-footprints"></i>Walk In</label>
                    <input type="radio" onclick="referral()" id="customRadio2" name="ref" value="1" />
                    <label for="customRadio2"><i class="ph ph-handshake"></i>Referral</label>
                </div>
            </div>
            <div class="form-group col-md-8">
                <label>Referral Company</label>
                <select class="form-control" id="company" name="ref_id" disabled style="display:none;">
                    <option value="">Select referral company</option>
                    <?php foreach($patient as $row): ?>
                        <option value="<?= (int) $row->id; ?>"><?= htmlentities($row->company); ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="companyPlaceholder" class="form-control" style="display:flex; align-items:center; color:#a5b3c2; background:#f7fafd;">Only needed for referrals</div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Transaction / Notes</label>
                <div class="chip-row">
                    <?php
                    $quick = $is_male
                        ? array('Consultation', 'Follow-up', 'Laboratory', 'Medical Certificate')
                        : array('Consultation', 'Follow-up', 'Prenatal Check-up', 'TVS Ultrasound', 'Family Planning');
                    foreach ($quick as $q): ?>
                        <button type="button" class="chip-pick" onclick="setTransaction('<?= htmlentities($q, ENT_QUOTES); ?>')"><?= htmlentities($q); ?></button>
                    <?php endforeach; ?>
                </div>
                <textarea class="form-control" rows="4" id="example-textarea" name="transaction" placeholder="Reason for the visit, procedures done, or anything the doctor should see…"></textarea>
            </div>
        </div>
    </div>
</div>

<?php if($show_ob): ?>
<!-- Obstetric information (female patients only, collapsible) -->
<div class="card form-card">
    <div class="card-body" style="padding: 16px 24px 24px;">
        <div class="ob-toggle" id="obToggle" onclick="toggleOb()" aria-expanded="<?= $has_ob_history ? 'true' : 'false'; ?>" aria-controls="pregnancySection" role="button" tabindex="0">
            <div class="ob-icon"><i class="ph ph-baby"></i></div>
            <div class="ob-text">
                <div class="ob-title">Obstetric Information</div>
                <div class="ob-desc">LMP, estimated delivery date and G/P/T/P/A/L. <?= $has_ob_history ? 'Expanded because this patient has prior obstetric records.' : 'Optional — expand for prenatal visits.'; ?></div>
            </div>
            <span class="ob-caret"><span class="ob-caret-text"><?= $has_ob_history ? 'Hide' : 'Show'; ?></span><i class="ph ph-caret-down"></i></span>
        </div>
        <div id="pregnancySection" style="display: <?= $has_ob_history ? 'block' : 'none'; ?>;">
            <div class="ob-panel">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>LMP <small style="text-transform:none;letter-spacing:0;font-weight:500;color:#a5b3c2;">(Last Menstrual Period)</small></label>
                        <input type="date" class="form-control" name="lmp" id="datepic1" max="<?= date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Estimated Date of Delivery</label>
                        <input type="text" id="esDate" name="date_of_delivery" class="form-control" readonly placeholder="Calculated from LMP" />
                    </div>
                    <div class="form-group col-md-4">
                        <label>&nbsp;</label>
                        <div class="ob-actions">
                            <button type="button" class="btn-ob calc" onclick="calculate()"><i class="ph ph-calculator"></i>Calculate EDD</button>
                            <button type="button" class="btn-ob clear" onclick="clearOb()"><i class="ph ph-eraser"></i>Clear</button>
                        </div>
                    </div>
                </div>
                <div class="ob-grid">
                    <div class="form-group"><label>G <small>Gravida</small></label><input type="number" min="0" name="gravida" class="form-control" placeholder="0" /></div>
                    <div class="form-group"><label>P <small>Parity</small></label><input type="number" min="0" name="parity" class="form-control" placeholder="0" /></div>
                    <div class="form-group"><label>T <small>Term</small></label><input type="number" min="0" name="term" class="form-control" placeholder="0" /></div>
                    <div class="form-group"><label>P <small>Preterm</small></label><input type="number" min="0" name="preterm" class="form-control" placeholder="0" /></div>
                    <div class="form-group"><label>A <small>Abortion</small></label><input type="number" min="0" name="abortion" class="form-control" placeholder="0" /></div>
                    <div class="form-group"><label>L <small>Living</small></label><input type="number" min="0" name="living" class="form-control" placeholder="0" /></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Submit -->
<div class="form-actions">
    <div class="hint"><span>*</span> Required fields</div>
    <div class="btns">
        <a href="<?= base_url(); ?>Pages/patient_profile/<?= $p->id; ?>" class="btn-cancel"><i class="ph ph-x"></i>Cancel</a>
        <button type="submit" name="submit" class="btn-submit"><i class="ph ph-check"></i>Create Appointment</button>
    </div>
</div>

<?= form_close(); ?>

<!-- Recent history for reference -->
<div class="card form-card">
    <div class="card-header">
        <h5><span class="section-icon"><i class="ph ph-clipboard-text"></i></span>Recent Visits <span class="count-badge"><?= $row_total; ?></span>
            <?php if($open_count): ?><span class="tag pending"><i class="ph ph-clock"></i><?= $open_count; ?> awaiting diagnosis</span><?php endif; ?>
        </h5>
        <a href="<?= base_url(); ?>Pages/patient_profile/<?= $p->id; ?>" class="header-link">Full history <i class="ph ph-arrow-right"></i></a>
    </div>
    <div class="card-body" style="padding: 0;">
        <?php if($row_total): ?>
        <div class="table-responsive">
            <table class="table table-modern">
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
                    <?php foreach($pending as $a):
                        $ats = $a->visit_date ? strtotime($a->visit_date) : false;
                        $is_cancelled = !empty($a->cancelled_at);
                        $abp = trim((string) $a->bp); $awt = trim((string) $a->weight); $atype = trim((string) $a->transaction);
                    ?>
                    <tr class="row-open <?= $is_cancelled ? 'is-cancelled' : ''; ?>">
                        <td>
                            <div class="cell-date"><?= $ats ? date('M j, Y', $ats) : '—'; ?></div>
                            <?php if($atype !== ''): ?><div class="cell-sub"><span class="tag type"><?= htmlentities($atype); ?></span></div><?php endif; ?>
                        </td>
                        <td>
                            <div class="vitals">
                                <?php if($a->visit_age): ?><span class="vital"><span class="k">Age</span><span class="v"><?= (int) $a->visit_age; ?></span></span><?php endif; ?>
                                <?php if($abp !== ''): ?><span class="vital"><span class="k">BP</span><span class="v"><?= htmlentities($abp); ?></span></span><?php endif; ?>
                                <?php if($awt !== ''): ?><span class="vital"><span class="k">Wt</span><span class="v"><?= htmlentities($awt); ?> kg</span></span><?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <?php if($is_cancelled): ?>
                                <div class="note muted">Cancelled<?= trim((string) $a->cancel_reason) !== '' ? ' — ' . htmlentities($a->cancel_reason) : ''; ?></div>
                            <?php else: ?>
                                <div class="note muted">Checked in, not yet diagnosed</div>
                            <?php endif; ?>
                        </td>
                        <td><span class="tag <?= $is_cancelled ? 'cancelled' : 'pending'; ?>"><?= $is_cancelled ? 'Cancelled' : 'Pending'; ?></span></td>
                        <td class="text-right">
                            <?php if(!$is_cancelled): ?>
                            <a href="<?= base_url(); ?>Pages/diagnose/<?= (int) $a->id; ?>" class="btn-sm-action"><i class="ph ph-stethoscope"></i>Diagnose</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php foreach($history as $h):
                        $vdate = $h->date ?: $h->visit_date;
                        $vdate_ts = $vdate ? strtotime($vdate) : false;
                        $doc = trim((string) $h->doc_last);
                        if ($doc !== '') { $doc = ucwords(strtolower($doc . ', ' . $h->doc_first)); }
                        $ob = trim((string) $h->lmp) !== '' || trim((string) $h->date_of_delivery) !== '' || (int) $h->gravida || (int) $h->parity;
                        $dx = trim((string) $h->diagnosis); $tx = trim((string) $h->treatment);
                    ?>
                    <tr>
                        <td>
                            <div class="cell-date"><?= $vdate_ts ? date('M j, Y', $vdate_ts) : '—'; ?></div>
                            <?php if(trim((string) $h->transaction) !== ''): ?><div class="cell-sub"><span class="tag type"><?= htmlentities($h->transaction); ?></span></div><?php endif; ?>
                            <?php if($doc !== ''): ?><div class="cell-sub"><i class="ph ph-user-circle"></i> <?= htmlentities($doc); ?></div><?php endif; ?>
                        </td>
                        <td>
                            <div class="vitals">
                                <?php if($h->visit_age): ?><span class="vital"><span class="k">Age</span><span class="v"><?= (int) $h->visit_age; ?></span></span><?php endif; ?>
                                <?php if(trim((string) $h->bp) !== ''): ?><span class="vital"><span class="k">BP</span><span class="v"><?= htmlentities($h->bp); ?></span></span><?php endif; ?>
                                <?php if(trim((string) $h->weight) !== ''): ?><span class="vital"><span class="k">Wt</span><span class="v"><?= htmlentities($h->weight); ?> kg</span></span><?php endif; ?>
                                <?php if($ob): ?>
                                    <?php if(trim((string) $h->lmp) !== ''): ?><span class="vital"><span class="k">LMP</span><span class="v"><?= htmlentities($h->lmp); ?></span></span><?php endif; ?>
                                    <?php if(trim((string) $h->date_of_delivery) !== ''): ?><span class="vital"><span class="k">EDD</span><span class="v"><?= htmlentities($h->date_of_delivery); ?></span></span><?php endif; ?>
                                    <span class="vital"><span class="k">G/P/T/P/A/L</span><span class="v"><?= (int)$h->gravida; ?>/<?= (int)$h->parity; ?>/<?= (int)$h->term; ?>/<?= (int)$h->preterm; ?>/<?= (int)$h->abortion; ?>/<?= (int)$h->living; ?></span></span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td><?= findings_cell(
                                array('Diagnosis' => $dx, 'Treatment' => $tx, 'Laboratory' => $h->lab, 'Remarks' => $h->remarks),
                                $display_name,
                                ($vdate_ts ? date('F j, Y', $vdate_ts) : '') . ($doc !== '' ? ' · ' . $doc : '')
                            ); ?></td>
                        <td><span class="tag <?= (int) $h->payment_status === 1 ? 'paid' : 'unpaid'; ?>"><?= (int) $h->payment_status === 1 ? 'Paid' : 'Unpaid'; ?></span></td>
                        <td class="text-right">
                            <?php if($h->appointment_id): ?>
                            <a href="<?= base_url(); ?>Pages/appointment_edit/<?= $p->id; ?>/<?= (int) $h->appointment_id; ?>" class="btn-sm-action"><i class="ph ph-pencil-simple"></i>Edit</a>
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
            <p>No previous visits — this will be the patient's first appointment.</p>
        </div>
        <?php endif; ?>
    </div>
</div>

<?= findings_modal(); ?>

</div>

<script>
// Keep the referral select and its placeholder in sync with refer()/referral() from footer_ap.php
(function () {
    var sel = document.getElementById('company');
    var ph  = document.getElementById('companyPlaceholder');
    function sync() { ph.style.display = (sel.style.display === 'none') ? 'flex' : 'none'; }
    document.getElementById('customRadio1').addEventListener('click', sync);
    document.getElementById('customRadio2').addEventListener('click', sync);
    sync();
})();

// Quick-pick chips fill the notes box without wiping what is already typed
function setTransaction(text) {
    var box = document.getElementById('example-textarea');
    box.value = box.value.trim() === '' ? text : box.value.trim() + ', ' + text;
    box.focus();
}

// Live weight comparison against the previous visit
(function () {
    var input = document.getElementById('weightInput');
    var badge = document.getElementById('weightDelta');
    if (!input || !badge) { return; }
    var prev = parseFloat(input.getAttribute('data-last'));
    if (isNaN(prev)) { return; }
    function update() {
        var now = parseFloat(input.value);
        if (isNaN(now)) { badge.style.display = 'none'; return; }
        var diff = Math.round((now - prev) * 10) / 10;
        badge.className = 'delta ' + (diff > 0 ? 'up' : (diff < 0 ? 'down' : 'same'));
        badge.textContent = diff > 0 ? '+' + diff + ' kg' : (diff < 0 ? diff + ' kg' : 'no change');
        badge.style.display = 'inline-flex';
    }
    input.addEventListener('input', update);
})();

<?php if($show_ob): ?>
// Clear only the obstetric fields (the old button was type=reset and wiped the whole form)
function clearOb() {
    ['datepic1', 'esDate', 'weekVal', 'dayVal'].forEach(function (id) { var el = document.getElementById(id); if (el) el.value = ''; });
    ['gravida', 'parity', 'term', 'preterm', 'abortion', 'living'].forEach(function (n) {
        var el = document.querySelector('[name="' + n + '"]'); if (el) el.value = '';
    });
}

// Plain JS toggle keeps working regardless of which JS bundle the page footer loads
function toggleOb() {
    var panel  = document.getElementById('pregnancySection');
    var toggle = document.getElementById('obToggle');
    var open   = panel.style.display === 'none';
    panel.style.display = open ? 'block' : 'none';
    toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    toggle.querySelector('.ob-caret-text').textContent = open ? 'Hide' : 'Show';
}
document.getElementById('obToggle').addEventListener('keydown', function (e) {
    if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); toggleOb(); }
});
<?php endif; ?>
</script>
