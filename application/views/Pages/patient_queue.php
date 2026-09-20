<style>
.queue-wrapper { padding-top: 20px; }

/* ===== Hero ===== */
.queue-hero {
    position: relative;
    background: linear-gradient(120deg, #0d47a1 0%, #1565c0 45%, #1e88e5 100%);
    border-radius: 16px;
    padding: 30px 36px;
    margin-bottom: 24px;
    box-shadow: 0 12px 32px rgba(13, 71, 161, 0.28);
    color: #fff;
    overflow: hidden;
}
.queue-hero::before {
    content: '';
    position: absolute;
    top: -90px; right: -60px;
    width: 260px; height: 260px;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
}
.queue-hero .hero-inner {
    position: relative; z-index: 1;
    display: flex; align-items: center; justify-content: space-between;
    gap: 20px; flex-wrap: wrap;
}
.queue-hero h2 { color: #fff; font-weight: 700; font-size: 26px; margin-bottom: 5px; display: flex; align-items: center; gap: 10px; }
.queue-hero p { color: rgba(255,255,255,0.85); margin: 0; font-size: 14px; }
.queue-hero p strong { color: #fff; }
.hero-right { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
.hero-stat {
    display: inline-flex; align-items: center; gap: 10px;
    height: 42px; padding: 0 16px 0 12px;
    background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.25);
    border-radius: 10px; color: #fff;
}
.hero-stat i { font-size: 18px; color: rgba(255,255,255,0.85); }
.hero-stat .stat-count { font-size: 18px; font-weight: 700; line-height: 1; }
.hero-stat .stat-label { font-size: 12px; font-weight: 600; color: rgba(255,255,255,0.8); text-transform: uppercase; letter-spacing: 0.5px; line-height: 1; }
.hero-stat.teal { background: rgba(17,153,142,0.35); border-color: rgba(17,153,142,0.6); }
.hero-cta {
    display: inline-flex; align-items: center; gap: 8px;
    height: 42px; padding: 0 18px; border-radius: 10px;
    font-weight: 600; font-size: 14px; text-decoration: none; transition: all .2s ease;
    border: 1px solid rgba(255,255,255,0.4); background: rgba(255,255,255,0.15); color: #fff;
}
.hero-cta:hover { background: rgba(255,255,255,0.25); color: #fff; text-decoration: none; }
.hero-cta.primary { background: #fff; color: #1565c0; border-color: #fff; box-shadow: 0 6px 18px rgba(0,0,0,0.15); }
.hero-cta.primary:hover { color: #0d47a1; transform: translateY(-2px); }
.date-nav { display: inline-flex; align-items: center; height: 42px; border: 1px solid rgba(255,255,255,0.4); border-radius: 10px; background: rgba(255,255,255,0.15); overflow: hidden; }
.date-nav a, .date-nav span { display: inline-flex; align-items: center; justify-content: center; height: 100%; color: #fff; text-decoration: none; font-weight: 600; font-size: 13.5px; }
.date-nav a { width: 40px; transition: background .2s; }
.date-nav a:hover { background: rgba(255,255,255,0.2); color: #fff; text-decoration: none; }
.date-nav .date-pick {
    position: relative; display: inline-flex; align-items: center; gap: 6px;
    height: 100%; padding: 0 12px; min-width: 140px; margin: 0;
    border-left: 1px solid rgba(255,255,255,0.3); border-right: 1px solid rgba(255,255,255,0.3);
    color: #fff; font-weight: 600; font-size: 13.5px; cursor: pointer; transition: background .2s;
}
.date-nav .date-pick:hover { background: rgba(255,255,255,0.2); }
.date-nav .date-pick input {
    position: absolute; inset: 0; width: 100%; height: 100%;
    opacity: 0; cursor: pointer; border: 0; padding: 0; margin: 0;
}
.date-nav .date-pick input::-webkit-calendar-picker-indicator { position: absolute; inset: 0; width: 100%; height: 100%; cursor: pointer; }

/* ===== Cards ===== */
.data-card {
    border: 1px solid #edf2f7;
    border-radius: 14px;
    box-shadow: 0 1px 4px rgba(30, 58, 95, 0.03);
    margin-bottom: 24px;
    background: #fff;
}
.data-card .card-header {
    background: #fff;
    border-bottom: 1px solid #f0f4f8;
    padding: 18px 24px;
    border-radius: 14px 14px 0 0;
    display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;
}
.data-card .card-header h5 { margin: 0; font-weight: 700; color: #1c2b3a; font-size: 15px; display: flex; align-items: center; gap: 10px; }
.data-card .card-header h5 i { color: #1e88e5; }
.data-card.diagnosed .card-header h5 i { color: #11998e; }
.data-card .card-body { padding: 0; }
.count-badge { background: #e8f4fd; color: #1565c0; font-size: 12px; font-weight: 700; padding: 3px 10px; border-radius: 12px; }
.count-badge.teal { background: #e7f7f5; color: #0f8a7f; }
.header-link { font-size: 13px; font-weight: 600; color: #1e88e5; text-decoration: none; display: inline-flex; align-items: center; gap: 4px; }
.header-link:hover { color: #0d47a1; text-decoration: none; }

/* DataTables controls */
.data-card .dataTables_wrapper > .row { margin: 0; padding: 14px 24px; align-items: center; }
.data-card .dataTables_wrapper > .row > div { padding: 0; }
.data-card .dataTables_wrapper > .row:first-child { border-bottom: 1px solid #f0f4f8; }
.data-card .dataTables_wrapper > .row:last-child { border-top: 1px solid #f0f4f8; }
.data-card .dataTables_length label, .data-card .dataTables_filter label { margin: 0; color: #6c7d8f; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 8px; }
.data-card .dataTables_length select { border: 1px solid #dce4ec; border-radius: 8px; padding: 4px 8px; margin: 0 6px; height: 32px; color: #1c2b3a; font-weight: 600; }
.data-card .dataTables_filter { text-align: right; }
.data-card .dataTables_filter input { border: 1px solid #dce4ec; border-radius: 8px; height: 36px; padding: 0 12px; font-size: 13px; width: 240px; margin: 0; }
.data-card .dataTables_filter input:focus { outline: none; border-color: #1e88e5; box-shadow: 0 0 0 3px rgba(30,136,229,.1); }
.data-card .dataTables_info { padding: 0; color: #6c7d8f; font-size: 13px; }
.data-card .dataTables_paginate .pagination { margin: 0; }
.data-card .page-link { border-radius: 8px !important; margin-left: 4px; border: 1px solid #e3eaf1; color: #3d4f63; font-weight: 600; font-size: 13px; padding: 6px 12px; }
.data-card .page-item.active .page-link { background: #1e88e5; border-color: #1e88e5; color: #fff; }
.data-card .page-item.disabled .page-link { color: #b8c4d0; }

/* ===== Tables ===== */
.table-modern { margin-bottom: 0; }
.table-modern th {
    border-top: none; border-bottom: 1px solid #f0f4f8;
    font-weight: 700; color: #8496a9; font-size: 11.5px;
    text-transform: uppercase; letter-spacing: 0.6px; padding: 14px 18px; background: #fcfdff; white-space: nowrap;
}
.table-modern td { vertical-align: middle; border-color: #f2f5f8; padding: 14px 18px; font-size: 14px; color: #3d4f63; }
.table-modern.top td { vertical-align: top; }
.table-modern th:first-child, .table-modern td:first-child { padding-left: 24px; }
.table-modern th:last-child, .table-modern td:last-child { padding-right: 24px; }
.table-modern th.sorting_disabled::before, .table-modern th.sorting_disabled::after { display: none; }
.table-modern tbody tr:hover { background: #fafcfe; }

.queue-pos { font-weight: 700; color: #b8c4d0; font-size: 13px; }
.cell-patient { font-weight: 700; color: #1c2b3a; font-size: 14.5px; }
.cell-sub { font-size: 12px; color: #8a9bb0; margin-top: 3px; display: flex; align-items: center; gap: 5px; flex-wrap: wrap; }
.cell-sub i { font-size: 13px; }
.cell-date { font-weight: 600; color: #1c2b3a; white-space: nowrap; }
.vitals { display: flex; gap: 6px; flex-wrap: wrap; }
.vital {
    display: inline-flex; align-items: baseline; gap: 5px;
    background: #f7fafd; border: 1px solid #edf2f7; border-radius: 6px; padding: 3px 8px; white-space: nowrap;
}
.vital .k { font-size: 10px; font-weight: 700; color: #8a9bb0; text-transform: uppercase; }
.vital .v { font-size: 12.5px; font-weight: 700; color: #1c2b3a; }
.tag { display: inline-flex; align-items: center; gap: 4px; height: 24px; padding: 0 9px; border-radius: 12px; font-size: 11px; font-weight: 600; white-space: nowrap; }
.tag.type { background: #e8f4fd; color: #1565c0; text-transform: uppercase; letter-spacing: .3px; }
.tag.referral { background: #f3effb; color: #7e57c2; }
.tag.paid { background: #e7f7f5; color: #0f8a7f; }
.tag.unpaid { background: #fff5e6; color: #d68910; }
.note { max-width: 280px; white-space: pre-line; line-height: 1.5; font-size: 13.5px; color: #1c2b3a; }
.note .lbl { font-size: 10.5px; font-weight: 700; color: #8a9bb0; text-transform: uppercase; letter-spacing: .4px; display: block; margin-bottom: 2px; }
.note + .note { margin-top: 10px; }
.note.muted { color: #b8c4d0; font-style: italic; }

/* ===== Action buttons ===== */
.actions-cell { white-space: nowrap; text-align: right; }
.btn-act {
    display: inline-flex; align-items: center; gap: 6px;
    height: 34px; padding: 0 14px; border-radius: 8px;
    font-size: 13px; font-weight: 600; text-decoration: none; transition: all .2s; white-space: nowrap;
}
.btn-act.primary { background: #1e88e5; color: #fff; }
.btn-act.primary:hover { background: #1565c0; color: #fff; text-decoration: none; }
.btn-act.icon { width: 34px; padding: 0; justify-content: center; font-size: 16px; margin-left: 6px; }
.btn-act.edit { background: #eef4fb; color: #1565c0; }
.btn-act.edit:hover { background: #1e88e5; color: #fff; text-decoration: none; }
.btn-act.delete { background: #fdecec; color: #c62828; }
.btn-act.delete:hover { background: #e53935; color: #fff; text-decoration: none; }
button.btn-act { font-family: inherit; border: none; cursor: pointer; }
tr.stale { background: #fffdf7; }
tr.stale:hover { background: #fffaf0; }
.tag.stale { background: #fff5e6; color: #d68910; }

/* ===== Cancel appointment modal ===== */
.cancel-modal .modal-content { border: none; border-radius: 16px; overflow: hidden; box-shadow: 0 24px 60px rgba(13, 42, 84, 0.25); }
.cancel-modal .modal-header { align-items: center; padding: 18px 24px; border-bottom: 1px solid #f0f4f8; }
.cancel-modal .modal-title { display: flex; align-items: center; gap: 12px; font-size: 16px; font-weight: 700; color: #1c2b3a; }
.cancel-modal .modal-title .warn-icon {
    width: 36px; height: 36px; border-radius: 10px; background: #fdecec; color: #c62828;
    display: inline-flex; align-items: center; justify-content: center; font-size: 18px;
}
.cancel-modal .modal-body { padding: 22px 24px; }
.cancel-modal .who { background: #f7fafd; border: 1px solid #eef3f9; border-radius: 10px; padding: 12px 14px; margin-bottom: 18px; }
.cancel-modal .who .n { font-size: 14px; font-weight: 700; color: #1c2b3a; }
.cancel-modal .who .d { font-size: 12.5px; color: #8a9bb0; margin-top: 2px; }
.cancel-modal label { font-weight: 600; color: #5a6b7d; font-size: 12px; text-transform: uppercase; letter-spacing: .5px; margin-bottom: 8px; }
.cancel-modal .form-control { height: 44px; border: 1px solid #dce4ec; border-radius: 10px; padding: 0 14px; font-size: 14px; color: #1c2b3a; }
.cancel-modal .form-control:focus { border-color: #1e88e5; box-shadow: 0 0 0 3px rgba(30, 136, 229, 0.1); }
.cancel-modal .keep-note { font-size: 12.5px; color: #8a9bb0; margin: 14px 0 0; }
.cancel-modal .modal-footer { border-top: 1px solid #f0f4f8; padding: 14px 24px; }
.cancel-modal .btn-keep, .cancel-modal .btn-confirm {
    display: inline-flex; align-items: center; gap: 6px;
    height: 40px; padding: 0 18px; border-radius: 10px;
    font-weight: 600; font-size: 14px; border: none; cursor: pointer; transition: all .2s;
}
.cancel-modal .btn-keep { background: #f1f5f9; color: #3d4f63; }
.cancel-modal .btn-keep:hover { background: #e3eaf1; }
.cancel-modal .btn-confirm { background: #e53935; color: #fff; }
.cancel-modal .btn-confirm:hover { background: #c62828; }

.empty-state { text-align: center; padding: 50px 20px; color: #8a9bb0; }
.empty-state > i { font-size: 44px; color: #d4dde8; display: block; margin-bottom: 12px; }
.empty-state.ok > i { color: #b9e6e1; }
.empty-state h6 { font-weight: 700; color: #1c2b3a; margin-bottom: 4px; }
.empty-state p { margin: 0; font-size: 14px; }

@media (max-width: 767px) {
    .queue-hero { padding: 24px 22px; }
    .hero-right { width: 100%; }
    .note { max-width: 180px; }
    .data-card .dataTables_filter { text-align: left; margin-top: 10px; }
    .data-card .dataTables_filter input { width: 100%; }
}
</style>

<?php
$is_filtered = !empty($filter_date);
$view_ts = $is_filtered ? strtotime($filter_date) : strtotime('today');
$prev_d = date('Y-m-d', strtotime('-1 day', $view_ts));
$next_d = date('Y-m-d', strtotime('+1 day', $view_ts));
$is_today = date('Y-m-d', $view_ts) === date('Y-m-d');
$waiting_n = count($data);
$diagnosed_n = count($dp);
function q_name($r) { return ucwords(strtolower(trim(($r->last_name ?? '') . ', ' . ($r->first_name ?? '') . ' ' . ($r->middle_name ?? '')))); }
?>

<div class="queue-wrapper">

<!-- Hero -->
<div class="queue-hero">
    <div class="hero-inner">
        <div>
            <h2><i class="ph ph-queue"></i>Patient Queue</h2>
            <p>
                <?php if($is_filtered): ?>
                    Appointments for <strong><?= date('l, F j, Y', $view_ts); ?></strong>
                <?php else: ?>
                    Waiting patients and today's diagnosed cases · <strong><?= date('l, F j, Y'); ?></strong>
                <?php endif; ?>
            </p>
        </div>
        <div class="hero-right">
            <div class="hero-stat"><i class="ph ph-clock"></i><span class="stat-count"><?= $waiting_n; ?></span><span class="stat-label">Waiting</span></div>
            <div class="hero-stat teal"><i class="ph ph-check-circle"></i><span class="stat-count"><?= $diagnosed_n; ?></span><span class="stat-label">Diagnosed</span></div>
            <div class="date-nav">
                <a href="<?= base_url(); ?>Pages/patient_queue?date=<?= $prev_d; ?>" data-toggle="tooltip" data-placement="top" title="Previous day"><i class="ph ph-caret-left"></i></a>
                <label class="date-pick" data-toggle="tooltip" data-placement="top" title="Pick a date">
                    <i class="ph ph-calendar-blank"></i>
                    <span id="datePickLabel"><?= date('M j, Y', $view_ts); ?></span>
                    <input type="date" id="datePick" value="<?= date('Y-m-d', $view_ts); ?>" aria-label="Select date">
                </label>
                <a href="<?= base_url(); ?>Pages/patient_queue?date=<?= $next_d; ?>" data-toggle="tooltip" data-placement="top" title="Next day"><i class="ph ph-caret-right"></i></a>
            </div>
            <?php if($is_filtered): ?>
                <a href="<?= base_url(); ?>Pages/patient_queue" class="hero-cta"><i class="ph ph-x"></i>Live queue</a>
            <?php endif; ?>
            <a href="<?= base_url(); ?>Pages/patient_add" class="hero-cta primary"><i class="ph ph-user-plus"></i>New Patient</a>
        </div>
    </div>
</div>

<!-- Flash messages -->
<?php foreach (array('success' => 'success', 'save' => 'success', 'danger' => 'danger') as $key => $cls): if($this->session->flashdata($key)): ?>
    <div class="alert alert-<?= $cls; ?> alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata($key); ?>
    </div>
<?php endif; endforeach; ?>

<!-- Waiting List -->
<div class="card data-card">
    <div class="card-header">
        <h5><i class="ph ph-clock"></i><?= $is_filtered ? 'Appointments' : 'Waiting List'; ?> <span class="count-badge"><?= $waiting_n; ?></span></h5>
    </div>
    <div class="card-body">
        <?php if(!empty($data)): ?>
        <div class="table-responsive">
            <table id="datatable" class="table table-modern">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Patient</th>
                        <th>Visit</th>
                        <th>Vitals</th>
                        <th>Type</th>
                        <th style="width: 210px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $pos = 1; $today_ts = strtotime(date('Y-m-d')); foreach($data as $row):
                        $vts = $row->visit_date ? strtotime($row->visit_date) : false;
                        $bp = trim((string) $row->bp); $wt = trim((string) $row->weight); $type = trim((string) $row->transaction);
                        $gender = strtolower(trim((string) ($row->gender ?? '')));
                        // Nothing clears a check-in except a diagnosis or a cancellation,
                        // so entries from earlier days pile up unless someone notices them.
                        $days_waiting = ($vts && !$is_filtered) ? (int) floor(($today_ts - strtotime(date('Y-m-d', $vts))) / 86400) : 0;
                    ?>
                    <tr class="<?= $days_waiting > 0 ? 'stale' : ''; ?>">
                        <td><span class="queue-pos"><?= $pos++; ?></span></td>
                        <td>
                            <div class="cell-patient"><?= htmlentities(q_name($row)); ?></div>
                            <div class="cell-sub">
                                <?php if($row->age): ?><span><?= (int) $row->age; ?> yrs</span><?php endif; ?>
                                <?php if($gender): ?><span>· <?= ucfirst($gender); ?></span><?php endif; ?>
                                <?php if((int) $row->referral_status === 1): ?><span class="tag referral"><i class="ph ph-handshake"></i>Referral</span><?php endif; ?>
                            </div>
                        </td>
                        <td data-order="<?= $vts ?: 0; ?>">
                            <div class="cell-date"><?= $vts ? date('M j, Y', $vts) : '—'; ?></div>
                            <?php if($days_waiting > 0): ?><div class="cell-sub"><span class="tag stale"><i class="ph ph-warning-circle"></i><?= $days_waiting; ?> day<?= $days_waiting > 1 ? 's' : ''; ?> waiting</span></div><?php endif; ?>
                        </td>
                        <td>
                            <div class="vitals">
                                <?php if($bp !== ''): ?><span class="vital"><span class="k">BP</span><span class="v"><?= htmlentities($bp); ?></span></span><?php endif; ?>
                                <?php if($wt !== ''): ?><span class="vital"><span class="k">Wt</span><span class="v"><?= htmlentities($wt); ?> kg</span></span><?php endif; ?>
                                <?php if($bp === '' && $wt === ''): ?><span style="color:#b8c4d0;">—</span><?php endif; ?>
                            </div>
                        </td>
                        <td><?= $type !== '' ? '<span class="tag type">' . htmlentities($type) . '</span>' : '<span style="color:#b8c4d0;">—</span>'; ?></td>
                        <td class="actions-cell">
                            <a href="<?= base_url(); ?>Pages/diagnose/<?= (int) $row->id; ?>" class="btn-act primary"><i class="ph ph-stethoscope"></i>Diagnose</a>
                            <a href="<?= base_url(); ?>Pages/appointment_edit/<?= (int) $row->patient_id; ?>/<?= (int) $row->id; ?>" class="btn-act icon edit" data-toggle="tooltip" data-placement="top" title="Edit appointment"><i class="ph ph-pencil-simple"></i></a>
                            <button type="button" class="btn-act icon delete" data-toggle="modal" data-target="#cancelModal" data-id="<?= (int) $row->id; ?>" data-name="<?= htmlentities(q_name($row), ENT_QUOTES); ?>" data-date="<?= $vts ? date('M j, Y', $vts) : ''; ?>" title="Cancel appointment"><i class="ph ph-x-circle"></i></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="empty-state ok">
            <i class="ph ph-check-circle"></i>
            <h6><?= $is_filtered ? 'No appointments on this date' : 'Queue is clear'; ?></h6>
            <p><?= $is_filtered ? 'Try another day using the date controls above.' : 'No patients are waiting right now.'; ?></p>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Diagnosed Patients -->
<div class="card data-card diagnosed">
    <div class="card-header">
        <h5><i class="ph ph-check-circle"></i><?= $is_today ? "Diagnosed Today" : 'Diagnosed'; ?> <span class="count-badge teal"><?= $diagnosed_n; ?></span></h5>
        <a href="<?= base_url(); ?>Pages/pay" class="header-link"><i class="ph ph-receipt"></i>Go to billing</a>
    </div>
    <div class="card-body">
        <?php if(!empty($dp)): ?>
        <div class="table-responsive">
            <table id="selection-datatable" class="table table-modern top">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Visit</th>
                        <th>Vitals</th>
                        <th>Findings</th>
                        <th>Attended By</th>
                        <th>Payment</th>
                        <th style="width: 90px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dp as $row):
                        $vdate = $row->visit_date ?: $row->date;
                        $vts = $vdate ? strtotime($vdate) : false;
                        $bp = trim((string) $row->bp); $wt = trim((string) $row->weight); $type = trim((string) $row->transaction);
                        $dx = trim((string) $row->diagnosis); $tx = trim((string) $row->treatment); $lab = trim((string) $row->lab); $rm = trim((string) $row->remarks);
                        $doc = trim((string) ($row->doc_last ?? ''));
                        if ($doc !== '') { $doc = ucwords(strtolower($doc . ', ' . $row->doc_first)) . (trim((string) $row->doc_middle) !== '' ? ' ' . strtoupper(substr(trim($row->doc_middle), 0, 1)) . '.' : ''); }
                        $gender = strtolower(trim((string) ($row->gender ?? '')));
                    ?>
                    <tr>
                        <td>
                            <div class="cell-patient"><?= htmlentities(q_name($row)); ?></div>
                            <div class="cell-sub">
                                <?php if($row->visit_age): ?><span><?= (int) $row->visit_age; ?> yrs</span><?php endif; ?>
                                <?php if($gender): ?><span>· <?= ucfirst($gender); ?></span><?php endif; ?>
                            </div>
                        </td>
                        <td data-order="<?= $vts ?: 0; ?>">
                            <div class="cell-date"><?= $vts ? date('M j, Y', $vts) : '—'; ?></div>
                            <?php if($type !== ''): ?><div class="cell-sub"><span class="tag type"><?= htmlentities($type); ?></span></div><?php endif; ?>
                        </td>
                        <td>
                            <div class="vitals">
                                <?php if($bp !== ''): ?><span class="vital"><span class="k">BP</span><span class="v"><?= htmlentities($bp); ?></span></span><?php endif; ?>
                                <?php if($wt !== ''): ?><span class="vital"><span class="k">Wt</span><span class="v"><?= htmlentities($wt); ?> kg</span></span><?php endif; ?>
                                <?php if($bp === '' && $wt === ''): ?><span style="color:#b8c4d0;">—</span><?php endif; ?>
                            </div>
                        </td>
                        <td><?= findings_cell(
                                array('Diagnosis' => $dx, 'Treatment' => $tx, 'Laboratory' => $lab, 'Remarks' => $rm),
                                q_name($row),
                                ($vts ? date('F j, Y', $vts) : '') . ($doc !== '' ? ' · ' . $doc : '')
                            ); ?></td>
                        <td><?= $doc !== '' ? htmlentities($doc) : '<span style="color:#b8c4d0;">—</span>'; ?></td>
                        <td><span class="tag <?= (int) $row->payment_status === 1 ? 'paid' : 'unpaid'; ?>"><?= (int) $row->payment_status === 1 ? 'Paid' : 'Unpaid'; ?></span></td>
                        <td class="actions-cell">
                            <a href="<?= base_url(); ?>Pages/diagnose_edit/<?= (int) $row->id; ?>" class="btn-act icon edit" style="margin-left:0;" data-toggle="tooltip" data-placement="top" title="Edit record"><i class="ph ph-pencil-simple"></i></a>
                            <a href="<?= base_url(); ?>Pages/diagnose_del/<?= (int) $row->id; ?>/<?= (int) $row->appointment_id; ?>" class="btn-act icon delete" data-toggle="tooltip" data-placement="top" title="Delete record" onclick="return confirm('Delete this diagnosis record? The linked appointment will be deleted as well.')"><i class="ph ph-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="empty-state">
            <i class="ph ph-clipboard-text"></i>
            <h6>No diagnosed patients<?= $is_today ? ' yet today' : ' on this date'; ?></h6>
            <p>Records appear here once a waiting patient has been diagnosed.</p>
        </div>
        <?php endif; ?>
    </div>
</div>

<?= findings_modal(); ?>

<!-- Cancel appointment: clears the queue entry without destroying the visit record -->
<div class="modal fade cancel-modal" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <?= form_open('Pages/app_cancel', array('autocomplete' => 'off')); ?>
        <input type="hidden" name="appointment_id" id="cancelAppointmentId" value="">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelModalLabel">
                    <span class="warn-icon"><i class="ph ph-x-circle"></i></span>
                    Cancel Appointment
                </h5>
            </div>
            <div class="modal-body">
                <div class="who">
                    <div class="n" id="cancelPatientName">—</div>
                    <div class="d" id="cancelVisitDate"></div>
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label for="cancelReason">Reason</label>
                    <select class="form-control" name="reason" id="cancelReason">
                        <option value="No show">No show</option>
                        <option value="Cancelled by patient">Cancelled by patient</option>
                        <option value="Rescheduled">Rescheduled</option>
                        <option value="Duplicate entry">Duplicate entry</option>
                        <option value="Other">Other…</option>
                    </select>
                    <input type="text" class="form-control" name="reason_other" id="cancelReasonOther" placeholder="Type the reason" maxlength="255" style="display:none; margin-top:10px;">
                </div>
                <p class="keep-note"><i class="ph ph-info"></i> The visit stays on the patient's profile, marked as cancelled. Nothing is deleted.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-keep" data-dismiss="modal">Keep in queue</button>
                <button type="submit" class="btn-confirm"><i class="ph ph-x-circle"></i>Cancel appointment</button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>

</div>

<script>
// Cancel modal: carry the clicked row's appointment into the form
$(function () {
    $('#cancelModal').on('show.bs.modal', function (e) {
        var btn = $(e.relatedTarget);
        $('#cancelAppointmentId').val(btn.data('id'));
        $('#cancelPatientName').text(btn.data('name') || '—');
        var d = btn.data('date');
        $('#cancelVisitDate').text(d ? 'Checked in ' + d : '');
        $('#cancelReason').val('No show').trigger('change');
    });
    $('#cancelReason').on('change', function () {
        var other = this.value === 'Other';
        $('#cancelReasonOther').toggle(other).prop('required', other);
        if (!other) { $('#cancelReasonOther').val(''); }
    });
});

// Date picker in the hero: navigate to the chosen day
(function () {
    var picker = document.getElementById('datePick');
    if (!picker) return;
    var base = '<?= base_url(); ?>Pages/patient_queue';
    picker.addEventListener('change', function () {
        if (!this.value) return;
        window.location.href = base + '?date=' + this.value;
    });
    // Ensure a click anywhere on the pill opens the native picker where supported
    picker.parentNode.addEventListener('click', function (e) {
        if (e.target !== picker && typeof picker.showPicker === 'function') {
            e.preventDefault();
            try { picker.showPicker(); } catch (err) { picker.focus(); }
        }
    });
})();

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({ container: 'body' });

    var lang = function (noun) {
        return {
            search: '',
            searchPlaceholder: 'Search ' + noun + '…',
            lengthMenu: 'Show _MENU_',
            info: 'Showing _START_ to _END_ of _TOTAL_',
            infoEmpty: 'Nothing to show',
            infoFiltered: '(filtered from _MAX_)',
            zeroRecords: 'No matches',
            paginate: { first: 'First', last: 'Last', next: 'Next', previous: 'Prev' }
        };
    };
    var dom = '<"row"<"col-sm-6"l><"col-sm-6"f>>rt<"row"<"col-sm-6"i><"col-sm-6"p>>';

    if ($('#datatable').length) {
        if ($.fn.DataTable.isDataTable('#datatable')) { $('#datatable').DataTable().destroy(); }
        $('#datatable').DataTable({
            responsive: false, pageLength: 25, lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']],
            dom: dom, language: lang('waiting list'),
            order: [[0, 'asc']],
            columnDefs: [{ targets: [3, 4, 5], orderable: false }]
        });
    }
    if ($('#selection-datatable').length) {
        if ($.fn.DataTable.isDataTable('#selection-datatable')) { $('#selection-datatable').DataTable().destroy(); }
        $('#selection-datatable').DataTable({
            responsive: false, pageLength: 25, lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']],
            dom: dom, language: lang('diagnosed'),
            order: [[1, 'desc']],
            columnDefs: [{ targets: [2, 3, 6], orderable: false }]
        });
    }
});
</script>
