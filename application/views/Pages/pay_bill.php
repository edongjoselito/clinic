<style>
.pay-wrapper { padding-top: 20px; }

/* ===== Hero ===== */
.pay-hero {
    position: relative;
    background: linear-gradient(120deg, #0d47a1 0%, #1565c0 45%, #1e88e5 100%);
    border-radius: 16px;
    padding: 30px 36px;
    margin-bottom: 24px;
    box-shadow: 0 12px 32px rgba(13, 71, 161, 0.28);
    color: #fff;
    overflow: hidden;
}
.pay-hero::before {
    content: '';
    position: absolute;
    top: -90px; right: -60px;
    width: 260px; height: 260px;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
}
.pay-hero .hero-inner {
    position: relative; z-index: 1;
    display: flex; align-items: center; justify-content: space-between;
    gap: 20px; flex-wrap: wrap;
}
.pay-hero h2 { color: #fff; font-weight: 700; font-size: 26px; margin-bottom: 5px; display: flex; align-items: center; gap: 10px; }
.pay-hero p { color: rgba(255,255,255,0.85); margin: 0; font-size: 14px; }
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
.hero-stat.amber { background: rgba(243,156,18,0.35); border-color: rgba(243,156,18,0.6); }
.hero-date { font-size: 13px; color: rgba(255,255,255,0.8); font-weight: 500; }

/* ===== Card ===== */
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
.data-card .card-body { padding: 0; }
.count-badge { background: #fff5e6; color: #d68910; font-size: 12px; font-weight: 700; padding: 3px 10px; border-radius: 12px; }

/* DataTables controls */
.data-card .dataTables_wrapper > .row { margin: 0; padding: 14px 24px; align-items: center; }
.data-card .dataTables_wrapper > .row > div { padding: 0; }
.data-card .dataTables_wrapper > .row:first-child { border-bottom: 1px solid #f0f4f8; }
.data-card .dataTables_wrapper > .row:last-child { border-top: 1px solid #f0f4f8; }
.data-card .dataTables_length label, .data-card .dataTables_filter label { margin: 0; color: #6c7d8f; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 8px; }
.data-card .dataTables_length select {
    border: 1px solid #dce4ec; border-radius: 8px; padding: 4px 8px; margin: 0 6px; height: 32px; color: #1c2b3a; font-weight: 600;
}
.data-card .dataTables_filter { text-align: right; }
.data-card .dataTables_filter input {
    border: 1px solid #dce4ec; border-radius: 8px; height: 36px; padding: 0 12px; font-size: 13px; width: 240px; margin: 0;
}
.data-card .dataTables_filter input:focus { outline: none; border-color: #1e88e5; box-shadow: 0 0 0 3px rgba(30,136,229,.1); }
.data-card .dataTables_info { padding: 0; color: #6c7d8f; font-size: 13px; }
.data-card .dataTables_paginate .pagination { margin: 0; }
.data-card .page-link { border-radius: 8px !important; margin-left: 4px; border: 1px solid #e3eaf1; color: #3d4f63; font-weight: 600; font-size: 13px; padding: 6px 12px; }
.data-card .page-item.active .page-link { background: #1e88e5; border-color: #1e88e5; color: #fff; }
.data-card .page-item.disabled .page-link { color: #b8c4d0; }

/* ===== Table ===== */
.table-modern { margin-bottom: 0; }
.table-modern th {
    border-top: none; border-bottom: 1px solid #f0f4f8;
    font-weight: 700; color: #8496a9; font-size: 11.5px;
    text-transform: uppercase; letter-spacing: 0.6px; padding: 14px 18px; background: #fcfdff; white-space: nowrap;
}
.table-modern td { vertical-align: top; border-color: #f2f5f8; padding: 16px 18px; font-size: 14px; color: #3d4f63; }
.table-modern th:first-child, .table-modern td:first-child { padding-left: 24px; }
.table-modern th:last-child, .table-modern td:last-child { padding-right: 24px; }
.table-modern th.sorting_disabled::before, .table-modern th.sorting_disabled::after { display: none; }
.table-modern tbody tr:hover { background: #fafcfe; }

.cell-patient { font-weight: 700; color: #1c2b3a; font-size: 14.5px; }
.cell-sub { font-size: 12px; color: #8a9bb0; margin-top: 3px; display: flex; align-items: center; gap: 5px; flex-wrap: wrap; }
.cell-sub i { font-size: 13px; }
.cell-date { font-weight: 600; color: #1c2b3a; white-space: nowrap; }
.tag {
    display: inline-flex; align-items: center; gap: 4px;
    height: 24px; padding: 0 9px; border-radius: 12px;
    font-size: 11px; font-weight: 600; white-space: nowrap;
}
.tag.type { background: #e8f4fd; color: #1565c0; text-transform: uppercase; letter-spacing: .3px; }
.note { max-width: 300px; white-space: pre-line; line-height: 1.5; font-size: 13.5px; color: #1c2b3a; }
.note .lbl { font-size: 10.5px; font-weight: 700; color: #8a9bb0; text-transform: uppercase; letter-spacing: .4px; display: block; margin-bottom: 2px; }
.note + .note { margin-top: 10px; }
.note.muted { color: #b8c4d0; font-style: italic; }
.remarks { font-size: 13px; color: #6c7d8f; max-width: 220px; white-space: pre-line; line-height: 1.5; }

.btn-pay {
    display: inline-flex; align-items: center; gap: 6px;
    height: 36px; padding: 0 16px; border-radius: 9px;
    font-size: 13px; font-weight: 700; text-decoration: none;
    background: #11998e; color: #fff; transition: all .2s; white-space: nowrap;
}
.btn-pay:hover { background: #0e8278; color: #fff; text-decoration: none; }
.btn-view {
    display: inline-flex; align-items: center; justify-content: center;
    width: 36px; height: 36px; border-radius: 9px; margin-left: 6px;
    background: #eef4fb; color: #1565c0; text-decoration: none; transition: all .2s; font-size: 16px;
}
.btn-view:hover { background: #1e88e5; color: #fff; text-decoration: none; }
.btn-print-bill {
    display: inline-flex; align-items: center; justify-content: center;
    width: 36px; height: 36px; border-radius: 9px; margin-left: 6px;
    background: #fff5e6; color: #d68910; text-decoration: none; transition: all .2s; font-size: 16px;
}
.btn-print-bill:hover { background: #f39c12; color: #fff; text-decoration: none; }
.actions-cell { white-space: nowrap; text-align: right; }

.empty-state { text-align: center; padding: 60px 20px; color: #8a9bb0; }
.empty-state > i { font-size: 44px; color: #b9e6e1; display: block; margin-bottom: 12px; }
.empty-state h6 { font-weight: 700; color: #1c2b3a; margin-bottom: 4px; }
.empty-state p { margin: 0; font-size: 14px; }

@media (max-width: 767px) {
    .pay-hero { padding: 24px 22px; }
    .hero-right { width: 100%; }
    .note, .remarks { max-width: 180px; }
    .data-card .dataTables_filter { text-align: left; margin-top: 10px; }
    .data-card .dataTables_filter input { width: 100%; }
}
</style>

<?php $pending = count($data); ?>

<div class="pay-wrapper">

<!-- Hero -->
<div class="pay-hero">
    <div class="hero-inner">
        <div>
            <h2><i class="ph ph-cash-register"></i>Patient Billing</h2>
            <p>Process payments for completed consultations and treatments</p>
        </div>
        <div class="hero-right">
            <span class="hero-date"><i class="ph ph-calendar-blank mr-1"></i><?= date('l, F j, Y'); ?></span>
            <div class="hero-stat <?= $pending > 0 ? 'amber' : ''; ?>">
                <i class="ph ph-receipt"></i>
                <span class="stat-count"><?= $pending; ?></span>
                <span class="stat-label">Pending</span>
            </div>
        </div>
    </div>
</div>

<!-- Flash Messages -->
<?php if($this->session->flashdata('success') || $this->session->flashdata('save')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('success') ?: $this->session->flashdata('save'); ?>
    </div>
<?php endif; ?>
<?php if($this->session->flashdata('danger')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('danger'); ?>
    </div>
<?php endif; ?>

<!-- Pending payments -->
<div class="card data-card">
    <div class="card-header">
        <h5><i class="ph ph-list-checks"></i>Pending Payments <span class="count-badge"><?= $pending; ?></span></h5>
    </div>
    <div class="card-body">
        <?php if(!empty($data)): ?>
        <div class="table-responsive">
            <table id="datatable" class="table table-modern">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Visit</th>
                        <th>Findings</th>
                        <th style="width: 150px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row):
                        $name = ucwords(strtolower(trim(($row->last_name ?? '') . ', ' . ($row->first_name ?? '') . ' ' . ($row->middle_name ?? ''))));
                        $vdate = $row->date ?: $row->visit_date;
                        $vdate_ts = $vdate ? strtotime($vdate) : false;
                        $doc = trim((string) ($row->doc_last ?? ''));
                        if ($doc !== '') { $doc = ucwords(strtolower($doc . ', ' . $row->doc_first)); }
                        $dx = trim((string) $row->diagnosis); $tx = trim((string) $row->treatment); $rm = trim((string) $row->remarks);
                        $type = trim((string) ($row->transaction ?? ''));
                    ?>
                    <tr>
                        <td>
                            <div class="cell-patient"><?= htmlentities($name); ?></div>
                            <div class="cell-sub">
                                <?php if($row->visit_age): ?><span><?= (int) $row->visit_age; ?> yrs</span><?php endif; ?>
                                <?php if(trim((string) $row->gender) !== ''): ?><span>· <?= ucfirst(strtolower($row->gender)); ?></span><?php endif; ?>
                                <?php if(trim((string) $row->contact) !== ''): ?><span>· <i class="ph ph-phone"></i><?= htmlentities($row->contact); ?></span><?php endif; ?>
                            </div>
                        </td>
                        <td data-order="<?= $vdate_ts ?: 0; ?>">
                            <div class="cell-date"><?= $vdate_ts ? date('M j, Y', $vdate_ts) : '—'; ?></div>
                            <?php if($type !== ''): ?><div class="cell-sub"><span class="tag type"><?= htmlentities($type); ?></span></div><?php endif; ?>
                            <?php if($doc !== ''): ?><div class="cell-sub"><i class="ph ph-user-circle"></i><?= htmlentities($doc); ?></div><?php endif; ?>
                        </td>
                        <td><?= findings_cell(
                                array('Diagnosis' => $dx, 'Treatment' => $tx, 'Remarks' => $rm),
                                $name,
                                ($vdate_ts ? date('F j, Y', $vdate_ts) : '') . ($doc !== '' ? ' · ' . $doc : '')
                            ); ?></td>
                        <td class="actions-cell">
                            <a href="<?= base_url(); ?>Pages/sale_code/<?= (int) $row->id; ?>" class="btn-pay"><i class="ph ph-currency-circle-dollar"></i>Pay Now</a>
                            <a href="<?= base_url(); ?>Pages/receipt/<?= (int) $row->id; ?>" target="_blank" class="btn-print-bill" data-toggle="tooltip" data-placement="top" title="Print statement of charges"><i class="ph ph-printer"></i></a>
                            <a href="<?= base_url(); ?>Pages/patient_profile/<?= (int) $row->patient_id; ?>" class="btn-view" data-toggle="tooltip" data-placement="top" title="View patient profile"><i class="ph ph-user"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="empty-state">
            <i class="ph ph-check-circle"></i>
            <h6>All caught up</h6>
            <p>There are no pending payments right now.</p>
        </div>
        <?php endif; ?>
    </div>
</div>

</div>

<?= findings_modal(); ?>

<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip({ container: 'body' });

    if (!$('#datatable').length) return;
    if ($.fn.DataTable.isDataTable('#datatable')) {
        $('#datatable').DataTable().destroy();
    }
    $('#datatable').DataTable({
        responsive: false,
        pageLength: 25,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']],
        dom: '<"row"<"col-sm-6"l><"col-sm-6"f>>rt<"row"<"col-sm-6"i><"col-sm-6"p>>',
        language: {
            search: '',
            searchPlaceholder: 'Search patient, diagnosis…',
            lengthMenu: 'Show _MENU_ bills',
            info: 'Showing _START_ to _END_ of _TOTAL_ pending bills',
            infoEmpty: 'No pending bills',
            infoFiltered: '(filtered from _MAX_)',
            zeroRecords: 'No bills match your search',
            paginate: { first: 'First', last: 'Last', next: 'Next', previous: 'Prev' }
        },
        order: [[1, 'desc']],
        columnDefs: [{ targets: [2, 3], orderable: false }]
    });
});
</script>
