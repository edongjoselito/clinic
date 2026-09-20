<style>
.dashboard-wrapper { padding-top: 20px; }

/* ===== Hero ===== */
.dashboard-hero {
    position: relative;
    background: linear-gradient(120deg, #0d47a1 0%, #1565c0 45%, #1e88e5 100%);
    border: none;
    border-radius: 16px;
    padding: 34px 36px;
    margin-bottom: 24px;
    box-shadow: 0 12px 32px rgba(13, 71, 161, 0.28);
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
    overflow: hidden;
}
.dashboard-hero::before {
    content: '';
    position: absolute;
    top: -80px; right: -80px;
    width: 260px; height: 260px;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
}
.dashboard-hero::after {
    content: '';
    position: absolute;
    bottom: -70px; right: 160px;
    width: 170px; height: 170px;
    border-radius: 50%;
    background: rgba(255,255,255,0.05);
}
.dashboard-hero > div { position: relative; z-index: 1; }
.dashboard-hero .hero-title {
    font-size: 26px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 4px;
    line-height: 1.2;
}
.dashboard-hero .hero-clinic {
    color: rgba(255,255,255,0.85);
    font-weight: 600;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-bottom: 6px;
}
.dashboard-hero .hero-sub {
    color: rgba(255,255,255,0.85);
    font-size: 14px;
    margin: 0;
}
.hero-right { text-align: right; }
.hero-date {
    font-weight: 600;
    color: #fff;
    font-size: 15px;
    margin-bottom: 4px;
}
.hero-day { color: rgba(255,255,255,0.75); font-size: 13px; }
@media (max-width: 767px) {
    .dashboard-hero { padding: 26px 22px; }
    .hero-right { text-align: left; width: 100%; }
}

/* ===== KPI cards ===== */
.stat-card {
    border: 1px solid #edf2f7;
    border-radius: 14px;
    box-shadow: 0 1px 4px rgba(30, 58, 95, 0.03);
    transition: all 0.2s ease;
    background: #fff;
    height: 100%;
}
.stat-card:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(30, 58, 95, 0.08); }
.stat-card .card-body { padding: 20px; display: flex; align-items: center; gap: 15px; }
.stat-icon {
    width: 48px;
    height: 48px;
    min-width: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}
.stat-icon.queue    { background: #e8f4fd; color: #1e88e5; }
.stat-icon.seen     { background: #e7f7f5; color: #11998e; }
.stat-icon.billing  { background: #fff5e6; color: #f39c12; }
.stat-icon.patients { background: #f3effb; color: #7e57c2; }
.stat-info { min-width: 0; }
.stat-number { font-size: 25px; font-weight: 700; color: #1c2b3a; line-height: 1.1; }
.stat-label { color: #8a9bb0; font-size: 12.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 3px; }
.stat-link { color: inherit; }
.stat-link:hover { color: #1e88e5; text-decoration: none; }

/* ===== Widget cards ===== */
.widget-card {
    border: 1px solid #edf2f7;
    border-radius: 14px;
    box-shadow: 0 1px 4px rgba(30, 58, 95, 0.03);
    margin-bottom: 24px;
    background: #fff;
}
.widget-card .card-header {
    background: #fff;
    border-bottom: 1px solid #f0f4f8;
    padding: 18px 24px;
    border-radius: 14px 14px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.widget-card .card-header h5 { margin: 0; font-weight: 700; color: #1c2b3a; font-size: 15px; }
.widget-card .card-header h5 i { color: #1e88e5; margin-right: 8px; }
.widget-card .card-body { padding: 0; }
.widget-card .card-body.padded { padding: 22px 24px; }
.header-link { font-size: 13px; font-weight: 600; color: #1e88e5; text-decoration: none; }
.header-link:hover { color: #0d47a1; text-decoration: none; }

/* ===== Tables ===== */
.table-modern { margin-bottom: 0; }
.table-modern th {
    border-top: none;
    border-bottom: 1px solid #f0f4f8;
    font-weight: 700;
    color: #8a9bb0;
    font-size: 11.5px;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    padding: 14px 18px;
    background: #fcfdff;
}
.table-modern td {
    vertical-align: middle;
    border-color: #f2f5f8;
    padding: 14px 18px;
    font-size: 14px;
    color: #3d4f63;
}
.table-modern tbody tr { transition: background .12s ease; }
.table-modern tbody tr:hover { background: #fafcfe; }
.cell-patient { font-weight: 600; color: #1c2b3a; }
.cell-sub { font-size: 12px; color: #8a9bb0; }
.diag-preview, .treatment-preview {
    max-width: 260px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.badge-soft {
    padding: 5px 11px;
    border-radius: 20px;
    font-size: 11.5px;
    font-weight: 600;
    display: inline-block;
}
.badge-soft-success { background: #e7f7f5; color: #0f8a7f; }
.badge-soft-warning { background: #fff5e6; color: #d68910; }

/* ===== Queue table avatar ===== */
.queue-avatar {
    width: 38px;
    height: 38px;
    min-width: 38px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 13px;
    color: #fff;
    background: linear-gradient(135deg, #64b5f6, #1e88e5);
    margin-right: 12px;
    vertical-align: middle;
}
.queue-avatar.female { background: linear-gradient(135deg, #f48fb1, #ec407a); }
.queue-avatar.male   { background: linear-gradient(135deg, #4fc3f7, #0288d1); }
.vital-chip {
    background: #f1f5f9;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    color: #5a6b7d;
    padding: 3px 8px;
    margin-right: 4px;
    white-space: nowrap;
}
.visit-type {
    background: #e8f4fd;
    color: #1565c0;
    font-size: 11.5px;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 20px;
    text-transform: uppercase;
    letter-spacing: 0.4px;
    white-space: nowrap;
}
.btn-queue {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 110px;
    height: 34px;
    border-radius: 7px;
    font-size: 12.5px;
    font-weight: 600;
    text-decoration: none;
    transition: all .2s;
    padding: 0 14px;
}
.btn-queue.diagnose { background: #1e88e5; color: #fff; }
.btn-queue.diagnose:hover { background: #1565c0; color: #fff; text-decoration: none; }
.btn-queue.view { background: #eef4fb; color: #1e88e5; }
.btn-queue.view:hover { background: #dceafa; color: #0d47a1; text-decoration: none; }
.empty-state {
    text-align: center;
    padding: 50px 20px;
    color: #8a9bb0;
}
.empty-state i { font-size: 40px; color: #d4dde8; display: block; margin-bottom: 10px; }
.empty-state p { margin: 0; font-size: 14px; }

/* ===== Calendar ===== */
.calendar-card .card-body { padding: 20px 24px 24px; }
.cal-nav { display: flex; align-items: center; gap: 6px; }
.cal-nav a {
    color: #1e88e5;
    background: #eef4fb;
    width: 30px; height: 30px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all .2s;
    font-size: 14px;
}
.cal-nav a:hover { background: #1e88e5; color: white; }
.cal-nav .cal-title { font-weight: 700; color: #1c2b3a; min-width: 130px; text-align: center; font-size: 15px; }
.cal-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 8px;
}
.cal-dow {
    text-align: center;
    font-size: 12px;
    font-weight: 700;
    color: #8a9bb0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 10px 0;
}
.cal-day {
    min-height: 72px;
    border-radius: 10px;
    background: #f7fafd;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start;
    position: relative;
    color: #3d4f63;
    font-weight: 500;
    font-size: 14px;
    text-decoration: none;
    border: 1px solid transparent;
    transition: all .15s;
    padding: 10px;
}
.cal-day:hover { background: #e3f2fd; color: #0d47a1; text-decoration: none; }
.cal-day.empty { background: transparent; pointer-events: none; }
.cal-day.today { border-color: #1e88e5; background: #fff; color: #1e88e5; font-weight: 700; }
.cal-day.has-apts { background: #1e88e5; color: white; }
.cal-day.has-apts:hover { background: #1565c0; color: white; }
.cal-day .cal-count {
    position: absolute;
    top: 8px;
    right: 8px;
    background: #fff;
    color: #1e88e5;
    font-size: 11px;
    font-weight: 700;
    border-radius: 10px;
    padding: 2px 7px;
    min-width: 20px;
    text-align: center;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}
.cal-day.today .cal-count { background: #1e88e5; color: #fff; }
.cal-legend {
    display: flex;
    gap: 16px;
    margin-top: 18px;
    font-size: 12px;
    color: #8a9bb0;
    flex-wrap: wrap;
}
.cal-legend .dot {
    display: inline-block;
    width: 12px; height: 12px;
    border-radius: 3px;
    margin-right: 6px;
    vertical-align: middle;
}
.cal-reset { color: #1e88e5; font-weight: 600; }

/* ===== Today's Summary ===== */
.summary-row { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.summary-item {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 18px;
    border-radius: 12px;
    background: #f9fbfd;
    border: 1px solid #edf2f7;
}
.summary-icon {
    width: 46px; height: 46px;
    border-radius: 11px;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px;
}
.summary-icon.blue  { background: #e8f4fd; color: #1e88e5; }
.summary-icon.green { background: #e7f7f5; color: #11998e; }
.summary-icon.amber { background: #fff5e6; color: #f39c12; }
.summary-label { font-size: 13px; color: #8a9bb0; font-weight: 500; margin-bottom: 2px; }
.summary-value { font-size: 20px; font-weight: 700; color: #1c2b3a; }

@media (max-width: 767px) {
    .summary-row { grid-template-columns: 1fr; }
    .diag-preview, .treatment-preview { max-width: 160px; }
}
</style>

<?php
$current_clinic = get_current_clinic();
$hour = (int) date('G');
$greeting = $hour < 12 ? 'Good morning' : ($hour < 18 ? 'Good afternoon' : 'Good evening');
$display_name = $this->session->username ?: 'there';
if (isset($current_user) && $current_user && !empty($current_user->first_name)) {
    $display_name = $current_user->first_name;
}
$waiting = $app->num_rows();
?>

<div class="dashboard-wrapper">

<!-- Hero -->
<div class="dashboard-hero">
    <div>
        <div class="hero-clinic"><?= $current_clinic ? htmlentities($current_clinic->name) : 'Clinic Management System'; ?></div>
        <h1 class="hero-title"><?= $greeting; ?>, <?= htmlentities(ucwords($display_name)); ?></h1>
        <p class="hero-sub">You have <strong><?= $waiting; ?></strong> patient<?= $waiting == 1 ? '' : 's'; ?> waiting in the queue today.</p>
    </div>
    <div class="hero-right">
        <div class="hero-date"><?= date('F j, Y'); ?></div>
        <div class="hero-day"><?= date('l'); ?></div>
    </div>
</div>

<!-- KPI Cards -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-icon queue"><i class="ph ph-queue"></i></div>
                <div class="stat-info">
                    <div class="stat-number" data-plugin="counterup"><?= $waiting; ?></div>
                    <div class="stat-label"><a href="<?= base_url(); ?>Pages/patient_queue" class="stat-link">In Queue</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-icon seen"><i class="ph ph-stethoscope"></i></div>
                <div class="stat-info">
                    <div class="stat-number" data-plugin="counterup"><?= isset($seen_today) ? $seen_today : 0; ?></div>
                    <div class="stat-label"><a href="<?= base_url(); ?>Pages/patient_queue" class="stat-link">Seen Today</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-icon billing"><i class="ph ph-receipt"></i></div>
                <div class="stat-info">
                    <div class="stat-number" data-plugin="counterup"><?= isset($pending_bills) ? $pending_bills : 0; ?></div>
                    <div class="stat-label"><a href="<?= base_url(); ?>Pages/pay" class="stat-link">Pending Bills</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-icon patients"><i class="ph ph-users-three"></i></div>
                <div class="stat-info">
                    <div class="stat-number" data-plugin="counterup"><?= isset($total_patients) ? $total_patients : 0; ?></div>
                    <div class="stat-label"><a href="<?= base_url(); ?>Pages/patient_list" class="stat-link">Total Patients</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Calendar -->
<?php
    $cal_month = isset($cal_month) ? (int) $cal_month : (int) date('n');
    $cal_year  = isset($cal_year)  ? (int) $cal_year  : (int) date('Y');
    $appointment_counts = isset($appointment_counts) ? $appointment_counts : array();
    $first_ts    = mktime(0,0,0,$cal_month,1,$cal_year);
    $days_in_mo  = (int) date('t', $first_ts);
    $first_dow   = (int) date('w', $first_ts);
    $month_name  = date('F Y', $first_ts);
    $prev_m = $cal_month - 1; $prev_y = $cal_year; if($prev_m < 1){ $prev_m = 12; $prev_y--; }
    $next_m = $cal_month + 1; $next_y = $cal_year; if($next_m > 12){ $next_m = 1; $next_y++; }
    $today_str = date('Y-m-d');
?>
<div class="card widget-card calendar-card">
    <div class="card-header">
        <h5><i class="ph ph-calendar-dots"></i>Appointments Calendar</h5>
        <div class="cal-nav">
            <a href="?m=<?= $prev_m; ?>&y=<?= $prev_y; ?>" title="Previous Month"><i class="ph ph-caret-left"></i></a>
            <span class="cal-title"><?= $month_name; ?></span>
            <a href="?m=<?= $next_m; ?>&y=<?= $next_y; ?>" title="Next Month"><i class="ph ph-caret-right"></i></a>
        </div>
    </div>
    <div class="card-body">
        <div class="cal-grid">
            <div class="cal-dow">Sunday</div>
            <div class="cal-dow">Monday</div>
            <div class="cal-dow">Tuesday</div>
            <div class="cal-dow">Wednesday</div>
            <div class="cal-dow">Thursday</div>
            <div class="cal-dow">Friday</div>
            <div class="cal-dow">Saturday</div>
            <?php for($i = 0; $i < $first_dow; $i++): ?>
                <div class="cal-day empty"></div>
            <?php endfor; ?>
            <?php for($day = 1; $day <= $days_in_mo; $day++):
                $date_str = sprintf('%04d-%02d-%02d', $cal_year, $cal_month, $day);
                $count    = isset($appointment_counts[$date_str]) ? $appointment_counts[$date_str] : 0;
                $classes  = 'cal-day';
                if($count > 0){ $classes .= ' has-apts'; }
                if($date_str === $today_str){ $classes .= ' today'; }
            ?>
                <a href="<?= base_url(); ?>Pages/patient_queue?date=<?= $date_str; ?>" class="<?= $classes; ?>" title="<?= $count; ?> appointment<?= $count==1?'':'s'; ?>">
                    <span><?= $day; ?></span>
                    <?php if($count > 0): ?>
                        <span class="cal-count"><?= $count; ?></span>
                    <?php endif; ?>
                </a>
            <?php endfor; ?>
        </div>
        <div class="cal-legend">
            <span><span class="dot" style="background: #1e88e5;"></span>Has Appointments</span>
            <span><span class="dot" style="background:#fff; border:2px solid #1e88e5;"></span>Today</span>
            <a href="<?= base_url(); ?>" class="cal-reset">Back to current month</a>
        </div>
    </div>
</div>

<!-- Patient Queue -->
<div class="card widget-card">
    <div class="card-header">
        <h5><i class="ph ph-queue"></i>Patient Queue</h5>
        <a href="<?= base_url(); ?>Pages/patient_queue" class="header-link">View full queue <i class="ph ph-arrow-right" style="font-size:11px;"></i></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Patient</th>
                        <th>Age / Gender</th>
                        <th>Visit Date</th>
                        <th>Type</th>
                        <th>Vitals</th>
                        <th style="width: 160px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($queue_list)): ?>
                        <?php $pos = 1; foreach($queue_list as $q):
                            $fname = (string) ($q->first_name ?? '');
                            $lname = (string) ($q->last_name ?? '');
                            $mname = (string) ($q->middle_name ?? '');
                            $initials = strtoupper(substr(trim($fname), 0, 1) . substr(trim($lname), 0, 1));
                            if ($initials === '') { $initials = '?'; }
                            $gender = strtolower((string) ($q->gender ?? ''));
                            $avatar_class = in_array($gender, ['female','male']) ? $gender : '';
                            $full_name = trim($lname . ', ' . $fname . ' ' . $mname);
                            $bp = trim((string) ($q->bp ?? ''));
                            $wt = trim((string) ($q->weight ?? ''));
                            $type = trim((string) ($q->transaction ?? ''));
                            $visit = trim((string) ($q->visit_date ?? ''));
                        ?>
                        <tr>
                            <td><span style="font-weight:700; color:#8a9bb0;"><?= $pos++; ?></span></td>
                            <td class="cell-patient"><?= htmlentities(ucwords(strtolower($full_name))); ?></td>
                            <td><?= $q->age ? $q->age . ' yrs' : '—'; ?> <?= $gender ? '<span class="cell-sub">· ' . ucwords($gender) . '</span>' : ''; ?></td>
                            <td><?= $visit ? date('M d, Y', strtotime($visit)) : '—'; ?></td>
                            <td><?= $type ? '<span class="visit-type">' . htmlentities($type) . '</span>' : '—'; ?></td>
                            <td>
                                <?php if($bp !== ''): ?><span class="vital-chip">BP <?= htmlentities($bp); ?></span><?php endif; ?>
                                <?php if($wt !== ''): ?><span class="vital-chip"><?= htmlentities($wt); ?> kg</span><?php endif; ?>
                                <?php if($bp === '' && $wt === ''): ?>—<?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url(); ?>Pages/diagnose/<?= $q->id; ?>" class="btn-queue diagnose"><i class="ph ph-stethoscope mr-1"></i>Diagnose</a>
                                <a href="<?= base_url(); ?>Pages/patient_profile/<?= $q->patient_id; ?>" class="btn-queue view" title="View patient"><i class="ph ph-user"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7"><div class="empty-state"><i class="ph ph-check-circle"></i><p>No patients waiting in queue</p></div></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Recently Diagnosed -->
<div class="card widget-card">
    <div class="card-header">
        <h5><i class="ph ph-clipboard-text"></i>Recently Diagnosed</h5>
        <a href="<?= base_url(); ?>Pages/patient_queue" class="header-link">View all <i class="ph ph-arrow-right" style="font-size:11px;"></i></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Diagnosis</th>
                        <th>Treatment</th>
                        <th>Attended By</th>
                        <th>Date</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($recent_diagnoses)): ?>
                        <?php foreach($recent_diagnoses as $d):
                            $d_fname = (string) ($d->first_name ?? '');
                            $d_lname = (string) ($d->last_name ?? '');
                            $diag_text = trim((string) ($d->diagnosis ?? ''));
                            $treat_text = trim((string) ($d->treatment ?? ''));
                            $doc_name = trim((string) ($d->doc_last ?? ''));
                            $doc_first = (string) ($d->doc_first ?? '');
                            if ($doc_name !== '' && $doc_first !== '') { $doc_name .= ', ' . $doc_first; }
                            $diag_date = trim((string) ($d->date ?? ''));
                        ?>
                        <tr>
                            <td>
                                <div class="cell-patient"><?= htmlentities(ucwords(strtolower(trim($d_lname . ', ' . $d_fname)))); ?></div>
                            </td>
                            <td><div class="diag-preview" title="<?= htmlentities($diag_text); ?>"><?= $diag_text !== '' ? htmlentities($diag_text) : '—'; ?></div></td>
                            <td><div class="treatment-preview" title="<?= htmlentities($treat_text); ?>"><?= $treat_text !== '' ? htmlentities($treat_text) : '—'; ?></div></td>
                            <td><?= $doc_name !== '' ? htmlentities(ucwords(strtolower($doc_name))) : '—'; ?></td>
                            <td><?= $diag_date ? date('M d, Y', strtotime($diag_date)) : '—'; ?></td>
                            <td>
                                <?php if($d->payment_status == 1): ?>
                                    <span class="badge-soft badge-soft-success">Paid</span>
                                <?php else: ?>
                                    <span class="badge-soft badge-soft-warning">Unpaid</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6"><div class="empty-state"><i class="ph ph-clipboard-text"></i><p>No diagnoses recorded yet</p></div></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Today's Summary -->
<div class="card widget-card">
    <div class="card-header">
        <h5><i class="ph ph-chart-line"></i>Today's Summary</h5>
    </div>
    <div class="card-body padded">
        <div class="summary-row">
            <div class="summary-item">
                <div class="summary-icon blue"><i class="ph ph-wallet"></i></div>
                <div>
                    <div class="summary-label">Revenue Today</div>
                    <div class="summary-value">PHP <?= number_format(isset($revenue_today) ? $revenue_today : 0, 2); ?></div>
                </div>
            </div>
            <div class="summary-item">
                <div class="summary-icon green"><i class="ph ph-stethoscope"></i></div>
                <div>
                    <div class="summary-label">Patients Seen</div>
                    <div class="summary-value"><?= isset($seen_today) ? $seen_today : 0; ?></div>
                </div>
            </div>
            <div class="summary-item">
                <div class="summary-icon amber"><i class="ph ph-receipt"></i></div>
                <div>
                    <div class="summary-label">Pending Bills</div>
                    <div class="summary-value"><?= isset($pending_bills) ? $pending_bills : 0; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
