<style>
.patient-list-wrapper {
    padding-top: 20px;
    padding-left: 5px;
    padding-right: 5px;
}
.list-hero {
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    border-radius: 12px;
    padding: 25px 30px;
    color: white;
    margin-bottom: 25px;
    box-shadow: 0 10px 30px rgba(30, 136, 229, 0.3);
}
.list-hero h2 {
    color: white;
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 24px;
}
.list-hero p {
    color: rgba(255,255,255,0.9);
    margin-bottom: 0;
}
.search-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    margin-bottom: 25px;
    background: linear-gradient(135deg, #f5f9ff 0%, #ffffff 100%);
}
.search-card .card-body {
    padding: 20px;
}
.search-label {
    font-weight: 600;
    color: #1565c0;
    font-size: 14px;
    margin-bottom: 10px;
}
.search-input {
    border: 2px solid #bbdefb;
    border-radius: 8px;
    padding: 12px 15px;
    font-size: 15px;
    transition: all 0.3s ease;
}
.search-input:focus {
    border-color: #1e88e5;
    box-shadow: 0 0 0 3px rgba(30, 136, 229, 0.1);
}
.btn-search {
    background: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
    border: none;
    color: white;
    padding: 12px 25px;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.btn-search:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(30, 136, 229, 0.4);
    color: white;
}
.btn-new-patient {
    background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%);
    border: none;
    color: white;
    padding: 12px 25px;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.btn-new-patient:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(67, 160, 71, 0.4);
    color: white;
}
.data-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}
.data-card .card-header {
    background: white;
    border-bottom: 2px solid #e3f2fd;
    padding: 15px 20px;
    border-radius: 12px 12px 0 0;
}
.data-card .card-header h5 {
    margin: 0;
    font-weight: 600;
    color: #1565c0;
}
.data-card .card-body {
    padding: 0 15px;
}
.patient-table {
    margin-bottom: 0;
}
.patient-table thead {
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
}
.patient-table thead th {
    border: none;
    font-weight: 600;
    color: #1565c0;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 12px 18px;
    white-space: nowrap;
}
.patient-table tbody td {
    padding: 14px 18px;
    border-color: #f5f5f5;
    vertical-align: middle;
}
.patient-table tbody tr:hover {
    background-color: #f8fbff;
}
.patient-name {
    font-weight: 600;
    color: #212121;
    font-size: 15px;
    word-break: break-word;
}
.patient-address {
    color: #616161;
    font-size: 14px;
    word-break: break-word;
    max-width: 300px;
}
.action-buttons {
    display: flex;
    flex-wrap: nowrap;
    gap: 8px;
    align-items: center;
}
.action-buttons .btn {
    white-space: nowrap;
    flex-shrink: 0;
}
@media (max-width: 768px) {
    .patient-address {
        max-width: 200px;
    }
    .stats-bar .stat-item {
        margin-right: 15px;
    }
    .stats-bar .stat-count {
        font-size: 20px;
    }
    .action-buttons {
        flex-wrap: wrap;
    }
}
@media (max-width: 576px) {
    .patient-list-wrapper {
        padding-left: 10px;
        padding-right: 10px;
    }
    .list-hero {
        padding: 20px;
        text-align: center;
    }
    .list-hero h2 {
        font-size: 20px;
    }
    .list-hero .col-md-4.text-md-right {
        text-align: center !important;
        margin-top: 15px;
    }
    .search-card .card-body {
        padding: 15px;
    }
    .search-card .row.align-items-end > div {
        margin-bottom: 10px;
    }
    .search-card .row.align-items-end > div:last-child {
        margin-bottom: 0;
    }
    .btn-search, .btn-new-patient {
        width: 100%;
        display: block;
        margin: 5px 0;
    }
    .stats-bar {
        text-align: center;
    }
    .stats-bar .stat-item {
        margin-right: 0;
        margin-bottom: 10px;
        display: flex;
        justify-content: center;
    }
    .data-card .card-header {
        padding: 12px 15px;
    }
    .patient-table thead th {
        font-size: 11px;
        padding: 10px 8px;
    }
    .patient-table tbody td {
        padding: 10px 8px;
    }
    .patient-name {
        font-size: 14px;
    }
    .patient-address {
        max-width: 150px;
        font-size: 12px;
    }
    .action-buttons {
        flex-direction: column;
        gap: 5px;
    }
    .action-buttons .btn {
        width: 100%;
        padding: 6px 10px;
        font-size: 12px;
    }
}
@media (max-width: 480px) {
    .patient-address {
        max-width: 120px;
    }
}
.btn-view {
    background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%);
    border: none;
    color: white;
    padding: 8px 18px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.btn-view:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(67, 160, 71, 0.3);
    color: white;
}
.btn-appointment {
    background: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
    border: none;
    color: white;
    padding: 8px 18px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.btn-appointment:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(30, 136, 229, 0.3);
    color: white;
}
.stats-bar {
    background: white;
    border-radius: 12px;
    padding: 15px 20px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    margin-bottom: 25px;
}
.stats-bar .stat-item {
    display: inline-flex;
    align-items: center;
    margin-right: 30px;
}
.stats-bar .stat-item i {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    color: #1565c0;
    font-size: 20px;
}
.stats-bar .stat-item .stat-text {
    font-weight: 600;
    color: #1565c0;
}
.stats-bar .stat-item .stat-count {
    font-size: 24px;
    font-weight: 700;
    color: #0d47a1;
}
</style>

<div class="patient-list-wrapper">

<!-- Hero Header -->
<div class="list-hero">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h2><i class="mdi mdi-account-group mr-2"></i>Patient Management</h2>
            <p>View, search, and manage patient records</p>
        </div>
        <div class="col-md-4 text-md-right">
            <a href="<?= base_url(); ?>Pages/patient_add" class="btn btn-light">
                <i class="mdi mdi-account-plus mr-1"></i>New Patient
            </a>
        </div>
    </div>
</div>

<!-- Flash Messages -->
<?php if($this->session->flashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('danger')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= $this->session->flashdata('danger'); ?>
    </div>
<?php endif; ?>

<!-- Search Section -->
<div class="card search-card">
    <div class="card-body">
        <div class="row align-items-end">
            <div class="col-md-8">
                <?php 
                    $attributes = array('class' => 'patient-search-form');
                    echo form_open('Pages/patient_search/', $attributes);
                ?>
                <div class="form-group mb-0">
                    <label class="search-label"><i class="mdi mdi-magnify mr-1"></i>Search Patient</label>
                    <input type="text" class="form-control search-input" name="search" placeholder="Enter last name, first name, or middle name..." required />
                </div>
            </div>
            <div class="col-md-4 text-md-right">
                <button type="submit" name="submit" class="btn btn-search mr-2">
                    <i class="mdi mdi-magnify mr-1"></i>Search
                </button>
                <a href="<?= base_url(); ?>Pages/patient_add" class="btn btn-new-patient">
                    <i class="mdi mdi-plus mr-1"></i>Add New
                </a>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Stats Bar -->
<div class="stats-bar">
    <div class="stat-item">
        <i class="mdi mdi-account-group"></i>
        <div>
            <div class="stat-count"><?= count($data); ?></div>
            <div class="stat-text">Total Patients</div>
        </div>
    </div>
</div>

<!-- Patient Table -->
<div class="card data-card">
    <div class="card-header">
        <h5><i class="mdi mdi-format-list-bulleted mr-2"></i>Patient Records</h5>
    </div>
    <div class="card-body" style="padding: 15px;">
        <div class="table-responsive">
            <table id="datatable" class="table patient-table">
                <thead>
                    <tr>
                        <th><i class="mdi mdi-account mr-1"></i>Patient Name</th>
                        <th><i class="mdi mdi-map-marker mr-1"></i>Address</th> 
                        <th><i class="mdi mdi-cog mr-1"></i>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row){ ?>
                    <tr>
                        <td>
                            <div class="patient-name">
                                <?= mb_strtoupper($row->last_name, 'UTF-8').', '.mb_strtoupper($row->first_name, 'UTF-8').' '.mb_strtoupper($row->middle_name, 'UTF-8'); ?>
                            </div>
                        </td>
                        <td>
                            <div class="patient-address">
                                <i class="mdi mdi-map-marker-outline text-muted mr-1"></i>
                                <?= strtoupper($row->sitio.', '.$row->barangay.', '.$row->city_mun.', '.$row->province); ?>
                            </div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="<?= base_url(); ?>Pages/patient_profile/<?= $row->id; ?>" class="btn btn-view">
                                    <i class="mdi mdi-eye mr-1"></i>View
                                </a>
                                <a href="<?= base_url(); ?>Pages/ap/<?= $row->id; ?>" class="btn btn-appointment">
                                    <i class="mdi mdi-calendar-check mr-1"></i>Appointment
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if(empty($data)): ?>
                    <tr>
                        <td colspan="3" class="text-center py-5">
                            <i class="mdi mdi-account-off-outline mdi-48px text-muted mb-3 d-block"></i>
                            <p class="text-muted">No patients found</p>
                            <a href="<?= base_url(); ?>Pages/patient_add" class="btn btn-primary mt-2">
                                <i class="mdi mdi-account-plus mr-1"></i>Add First Patient
                            </a>
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
    // Destroy existing DataTable if initialized by datatables.init.js
    if ($.fn.DataTable.isDataTable('#datatable')) {
        $('#datatable').DataTable().destroy();
    }
    // Reinitialize with responsive features
    $('#datatable').DataTable({
        responsive: true,
        pageLength: 25,
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
        language: {
            search: '',
            searchPlaceholder: 'Search patients...',
            lengthMenu: 'Show _MENU_ patients',
            info: 'Showing _START_ to _END_ of _TOTAL_ patients',
            infoEmpty: 'No patients found',
            paginate: {
                first: 'First',
                last: 'Last',
                next: 'Next',
                previous: 'Prev'
            }
        },
        ordering: true,
        order: [[0, 'asc']]
    });
});
</script>