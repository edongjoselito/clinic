<style>
.patient-list-wrapper { padding-top: 20px; }

/* ===== Hero ===== */
.list-hero {
    position: relative;
    background: linear-gradient(120deg, #0d47a1 0%, #1565c0 45%, #1e88e5 100%);
    border-radius: 16px;
    padding: 34px 36px;
    margin-bottom: 24px;
    box-shadow: 0 12px 32px rgba(13, 71, 161, 0.28);
    color: #fff;
    overflow: hidden;
}
.list-hero::before {
    content: '';
    position: absolute;
    top: -90px; right: -60px;
    width: 240px; height: 240px;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
}
.list-hero::after {
    content: '';
    position: absolute;
    bottom: -60px; right: 150px;
    width: 150px; height: 150px;
    border-radius: 50%;
    background: rgba(255,255,255,0.05);
}
.list-hero > .row { position: relative; z-index: 1; }
.list-hero h2 {
    color: #fff;
    font-weight: 700;
    font-size: 26px;
    margin-bottom: 5px;
}
.list-hero p {
    color: rgba(255,255,255,0.85);
    margin-bottom: 0;
    font-size: 14px;
}
.hero-stat {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    height: 42px;
    padding: 0 16px 0 12px;
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,255,255,0.25);
    border-radius: 10px;
    color: #fff;
}
.hero-stat i { font-size: 18px; color: rgba(255,255,255,0.85); }
.hero-stat .stat-count { font-size: 18px; font-weight: 700; line-height: 1; }
.hero-stat .stat-label {
    font-size: 12px;
    font-weight: 600;
    color: rgba(255,255,255,0.8);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    line-height: 1;
}
.hero-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 12px;
    flex-wrap: wrap;
}
.hero-cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    color: #1565c0;
    font-weight: 600;
    font-size: 14px;
    border-radius: 10px;
    padding: 0 20px;
    height: 42px;
    border: 1px solid #fff;
    text-decoration: none;
    box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    transition: all .25s ease;
    cursor: pointer;
}
.hero-cta:hover { color: #0d47a1; transform: translateY(-2px); text-decoration: none; box-shadow: 0 10px 24px rgba(0,0,0,0.22); }
.hero-cta:focus { outline: none; }
.hero-cta-outline {
    background: rgba(255,255,255,0.15);
    border-color: rgba(255,255,255,0.4);
    color: #fff;
    box-shadow: none;
}
.hero-cta-outline:hover { background: rgba(255,255,255,0.25); color: #fff; box-shadow: none; }

/* ===== Search modal ===== */
.search-modal { border: none; border-radius: 16px; box-shadow: 0 20px 60px rgba(13, 71, 161, 0.25); }
.search-modal .modal-header { border-bottom: 1px solid #f0f4f8; padding: 20px 24px; }
.search-modal .modal-title { font-weight: 700; color: #1c2b3a; font-size: 16px; }
.search-modal .modal-title i { color: #1e88e5; margin-right: 8px; }
.search-modal .modal-body { padding: 22px 24px; }
.search-modal .modal-footer { border-top: 1px solid #f0f4f8; padding: 16px 24px; }
.search-label {
    display: block;
    font-weight: 700;
    color: #1c2b3a;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-bottom: 8px;
}
.search-input {
    border: 1px solid #dce4ec;
    border-radius: 10px;
    padding: 11px 15px;
    height: 46px;
    font-size: 14px;
    transition: all 0.2s ease;
}
.search-input:focus { border-color: #1e88e5; box-shadow: 0 0 0 3px rgba(30, 136, 229, 0.1); }
.btn-search {
    background: #1e88e5;
    border: none;
    color: #fff;
    padding: 0 20px;
    height: 40px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.2s ease;
}
.btn-search:hover { background: #1565c0; color: #fff; }
.btn-modal-cancel {
    background: #f1f5f9;
    border: none;
    color: #3d4f63;
    padding: 0 18px;
    height: 40px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 14px;
}
.btn-modal-cancel:hover { background: #e3eaf1; color: #1c2b3a; }

/* ===== Search results meta ===== */
.search-meta { display: flex; align-items: center; gap: 14px; }
.search-chip {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #e8f4fd;
    color: #1565c0;
    font-size: 13px;
    font-weight: 600;
    padding: 5px 6px 5px 12px;
    border-radius: 20px;
}
.search-chip .chip-count {
    background: #1e88e5;
    color: #fff;
    font-size: 11.5px;
    font-weight: 700;
    border-radius: 12px;
    padding: 1px 8px;
    min-width: 22px;
    text-align: center;
}
.header-link { font-size: 13px; font-weight: 600; color: #8a9bb0; text-decoration: none; display: inline-flex; align-items: center; gap: 4px; }
.header-link:hover { color: #1e88e5; text-decoration: none; }

/* ===== Table ===== */
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
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}
.data-card .card-header h5 {
    margin: 0;
    font-weight: 700;
    color: #1c2b3a;
    font-size: 15px;
}
.data-card .card-header h5 i { color: #1e88e5; margin-right: 8px; }
.data-card .card-body { padding: 0; }

/* DataTables controls: give them the same side padding as the card */
.data-card .dataTables_wrapper > .row { margin: 0; padding: 14px 24px; align-items: center; }
.data-card .dataTables_wrapper > .row > div { padding: 0; }
.data-card .dataTables_wrapper > .row:first-child { border-bottom: 1px solid #f0f4f8; }
.data-card .dataTables_wrapper > .row:last-child { border-top: 1px solid #f0f4f8; }
.data-card .dataTables_wrapper .row:nth-child(2) { padding: 0; }
.data-card .dataTables_length label { margin: 0; color: #6c7d8f; font-size: 13px; font-weight: 500; }
.data-card .dataTables_length select {
    border: 1px solid #dce4ec;
    border-radius: 8px;
    padding: 4px 8px;
    margin: 0 6px;
    height: 32px;
    color: #1c2b3a;
    font-weight: 600;
}
.data-card .dataTables_info { padding: 0; color: #6c7d8f; font-size: 13px; }
.data-card .dataTables_paginate .pagination { margin: 0; }
.data-card .page-link { border-radius: 8px !important; margin-left: 4px; border: 1px solid #e3eaf1; color: #3d4f63; font-weight: 600; font-size: 13px; padding: 6px 12px; }
.data-card .page-item.active .page-link { background: #1e88e5; border-color: #1e88e5; color: #fff; }
.data-card .page-item.disabled .page-link { color: #b8c4d0; }

.table-modern { margin-bottom: 0; }
.table-modern th {
    border-top: none;
    border-bottom: 1px solid #f0f4f8;
    font-weight: 700;
    color: #8496a9;
    font-size: 11.5px;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    padding: 14px 18px;
    background: #fcfdff;
}
.table-modern th:first-child, .table-modern td:first-child { padding-left: 24px; }
.table-modern th:last-child, .table-modern td:last-child { padding-right: 24px; }
.table-modern th.sorting_disabled::before, .table-modern th.sorting_disabled::after { display: none; }
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
.patient-address {
    color: #6c7d8f;
    font-size: 13px;
    max-width: 380px;
    word-break: break-word;
}

/* ===== Action buttons ===== */
.actions-cell { text-align: left; white-space: nowrap; }
.action-buttons { display: inline-flex; gap: 8px; align-items: center; }
.btn-action {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    height: 34px;
    padding: 0 14px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition: all .2s;
    border: none;
}
.btn-action i { font-size: 15px; }
.btn-action.view { background: #eef4fb; color: #1565c0; }
.btn-action.view:hover { background: #1e88e5; color: #fff; text-decoration: none; }
.btn-action.appointment { background: #1e88e5; color: #fff; }
.btn-action.appointment:hover { background: #1565c0; color: #fff; text-decoration: none; }

.empty-state {
    text-align: center;
    padding: 50px 20px;
    color: #8a9bb0;
}
.empty-state > i { font-size: 40px; color: #d4dde8; display: block; margin-bottom: 10px; }
.empty-state p { margin: 0 0 12px; font-size: 14px; }
.empty-state p strong { color: #1c2b3a; }
.empty-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    font-weight: 600;
    color: #1e88e5;
    text-decoration: none;
    background: #eef4fb;
    padding: 0 14px;
    height: 34px;
    border-radius: 8px;
    transition: all .2s;
}
.empty-link:hover { background: #1e88e5; color: #fff; text-decoration: none; }

@media (max-width: 767px) {
    .list-hero { padding: 26px 22px; }
    .hero-actions { justify-content: flex-start; margin-top: 18px; }
    .hero-stat { text-align: left; }
    .patient-address { max-width: 180px; font-size: 12px; }
}
@media (max-width: 576px) {
    .patient-address { max-width: 120px; }
}
</style>

<?php
$is_search = isset($search_term);
$total_patients = isset($total_patients) ? (int) $total_patients : count($data);
?>

<div class="patient-list-wrapper">

<!-- Hero Header -->
<div class="list-hero">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2><i class="ph ph-users-three mr-2"></i>Patient Management</h2>
            <p>View, search, and manage patient records</p>
        </div>
        <div class="col-md-6">
            <div class="hero-actions">
                <div class="hero-stat">
                    <i class="ph ph-users-three"></i>
                    <span class="stat-count"><?= number_format($total_patients); ?></span>
                    <span class="stat-label">Total Patients</span>
                </div>
                <button type="button" class="hero-cta hero-cta-outline" data-toggle="modal" data-target="#searchPatientModal">
                    <i class="ph ph-magnifying-glass"></i>Search
                </button>
                <a href="<?= base_url(); ?>Pages/patient_add" class="hero-cta">
                    <i class="ph ph-user-plus"></i>New Patient
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Search Modal -->
<div class="modal fade" id="searchPatientModal" tabindex="-1" role="dialog" aria-labelledby="searchPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content search-modal">
            <?= form_open('Pages/patient_search/', array('class' => 'patient-search-form')); ?>
            <div class="modal-header">
                <h5 class="modal-title" id="searchPatientModalLabel"><i class="ph ph-magnifying-glass"></i>Search Patient</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <label class="search-label" for="searchPatientInput">Patient name</label>
                <input type="text" id="searchPatientInput" class="form-control search-input" name="search" placeholder="Enter last name, first name, or middle name..." value="<?= $is_search ? htmlentities($search_term) : ''; ?>" required autocomplete="off" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-modal-cancel" data-dismiss="modal">Cancel</button>
                <button type="submit" name="submit" class="btn btn-search"><i class="ph ph-magnifying-glass mr-1"></i>Search</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- Flash Messages -->
<?php if($this->session->flashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('danger')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('danger'); ?>
    </div>
<?php endif; ?>

<!-- Patient Table -->
<div class="card data-card">
    <div class="card-header">
        <h5><i class="ph ph-clipboard-text"></i><?= $is_search ? 'Search Results' : 'Patient Records'; ?></h5>
        <?php if($is_search): ?>
        <div class="search-meta">
            <span class="search-chip"><i class="ph ph-magnifying-glass"></i><?= htmlentities($search_term); ?><span class="chip-count"><?= count($data); ?></span></span>
            <a href="<?= base_url(); ?>Pages/patient_list" class="header-link"><i class="ph ph-x"></i>Clear</a>
        </div>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-modern">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Address</th>
                        <th style="width: 210px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row){ ?>
                    <tr>
                        <td class="cell-patient">
                            <?= htmlentities(ucwords(strtolower(trim($row->last_name . ', ' . $row->first_name . ' ' . $row->middle_name)))); ?>
                        </td>
                        <td>
                            <div class="patient-address">
                                <i class="ph ph-map-pin text-muted mr-1"></i>
                                <?= htmlentities(ucwords(strtolower(trim($row->sitio . ', ' . $row->barangay . ', ' . $row->city_mun . ', ' . $row->province)))); ?>
                            </div>
                        </td>
                        <td class="actions-cell">
                            <div class="action-buttons">
                                <a href="<?= base_url(); ?>Pages/patient_profile/<?= $row->id; ?>" class="btn-action view" data-toggle="tooltip" data-placement="top" title="View patient profile"><i class="ph ph-user"></i> View</a>
                                <a href="<?= base_url(); ?>Pages/ap/<?= $row->id; ?>" class="btn-action appointment" data-toggle="tooltip" data-placement="top" title="Create new appointment"><i class="ph ph-calendar-check"></i> Appointment</a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if(empty($data)): ?>
                    <tr>
                        <td colspan="3">
                            <div class="empty-state">
                                <?php if($is_search): ?>
                                    <i class="ph ph-magnifying-glass"></i>
                                    <p>No patients match "<strong><?= htmlentities($search_term); ?></strong>"</p>
                                    <a href="<?= base_url(); ?>Pages/patient_list" class="empty-link"><i class="ph ph-arrow-left"></i>Back to all patients</a>
                                <?php else: ?>
                                    <i class="ph ph-users-three"></i>
                                    <p>No patients yet</p>
                                    <a href="<?= base_url(); ?>Pages/patient_add" class="empty-link"><i class="ph ph-user-plus"></i>Add a patient</a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $('#searchPatientModal').on('shown.bs.modal', function () {
        $('#searchPatientInput').trigger('focus').select();
    });

    if ($.fn.DataTable.isDataTable('#datatable')) {
        $('#datatable').DataTable().destroy();
    }
    $('#datatable').DataTable({
        responsive: false,
        searching: false,
        pageLength: 25,
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
        dom: '<"row"<"col-sm-12"l>>rt<"row"<"col-sm-6"i><"col-sm-6"p>>',
        language: {
            lengthMenu: 'Show _MENU_ patients',
            info: 'Showing _START_ to _END_ of _TOTAL_ patients',
            infoEmpty: 'No patients found',
            paginate: { first: 'First', last: 'Last', next: 'Next', previous: 'Prev' }
        },
        ordering: true,
        order: [[0, 'asc']],
        columnDefs: [{ targets: 2, orderable: false }]
    });
});
</script>
