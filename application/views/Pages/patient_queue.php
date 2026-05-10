<style>
.queue-wrapper {
    padding-top: 20px;
}
.queue-hero {
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    border-radius: 12px;
    padding: 25px 30px;
    color: white;
    margin-bottom: 25px;
    box-shadow: 0 10px 30px rgba(30, 136, 229, 0.3);
}
.queue-hero h2 {
    color: white;
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 24px;
}
.queue-hero p {
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
    padding: 25px;
}
.search-input {
    border: 2px solid #bbdefb;
    border-radius: 8px 0 0 8px;
    padding: 12px 20px;
    font-size: 15px;
    height: auto;
    transition: all 0.3s ease;
}
.search-input:focus {
    border-color: #1e88e5;
    box-shadow: none;
}
.btn-search-queue {
    background: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
    border: none;
    color: white;
    padding: 12px 25px;
    border-radius: 0 8px 8px 0;
    font-weight: 500;
    transition: all 0.3s ease;
}
.btn-search-queue:hover {
    color: white;
}
.queue-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    margin-bottom: 25px;
}
.queue-card .card-header {
    background: white;
    border-bottom: 2px solid #e3f2fd;
    padding: 20px 25px;
    border-radius: 12px 12px 0 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.queue-card .card-header h5 {
    margin: 0;
    font-weight: 600;
    color: #1565c0;
    font-size: 16px;
}
.queue-card .card-header .count-badge {
    background: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 500;
}
.queue-card .card-body {
    padding: 15px;
}
.queue-table {
    margin-bottom: 0;
}
.queue-table thead {
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
}
.queue-table thead th {
    border: none;
    font-weight: 600;
    color: #1565c0;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 12px 18px;
    white-space: nowrap;
}
.queue-table tbody td {
    padding: 14px 18px;
    border-color: #f5f5f5;
    vertical-align: middle;
    font-size: 13px;
}
.queue-table tbody tr:hover {
    background-color: #f8fbff;
}
.patient-name {
    font-weight: 600;
    color: #212121;
    font-size: 14px;
}
.btn-diagnose {
    background: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
    border: none;
    color: white;
    padding: 6px 15px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.btn-diagnose:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(30, 136, 229, 0.3);
    color: white;
}
.btn-edit-queue {
    background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%);
    border: none;
    color: white;
    padding: 6px 15px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.btn-edit-queue:hover {
    color: white;
}
.btn-delete-queue {
    background: linear-gradient(135deg, #e53935 0%, #c62828 100%);
    border: none;
    color: white;
    padding: 6px 15px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.btn-delete-queue:hover {
    color: white;
}
.diagnosed-card .card-header h5 {
    color: #43a047;
}
.diagnosed-card .card-header .count-badge {
    background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%);
}
.diagnosed-table thead {
    background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
}
.diagnosed-table thead th {
    color: #2e7d32;
}
.diagnosed-by {
    font-weight: 600;
    color: #1565c0;
    font-size: 13px;
}
.treatment-text {
    color: #1565c0;
    font-weight: 500;
}
.diagnosis-text {
    color: #424242;
}
.stats-row {
    margin-bottom: 25px;
}
.stat-card-queue {
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    display: flex;
    align-items: center;
}
.stat-card-queue .stat-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    color: #1565c0;
    font-size: 24px;
}
.stat-card-queue .stat-info .stat-count {
    font-size: 24px;
    font-weight: 700;
    color: #0d47a1;
}
.stat-card-queue .stat-info .stat-label {
    color: #757575;
    font-size: 13px;
}
.empty-queue {
    text-align: center;
    padding: 50px 20px;
}
.empty-queue i {
    font-size: 48px;
    color: #bbdefb;
    margin-bottom: 15px;
}
.empty-queue p {
    color: #757575;
}
.twitter-typeahead {
    width: 100%;
}
.tt-menu {
    width: 100%;
    background: white;
    border: 1px solid #e0e0e0;
    border-radius: 0 0 8px 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.tt-suggestion {
    padding: 12px 15px;
    border-bottom: 1px solid #f5f5f5;
    cursor: pointer;
}
.tt-suggestion:hover {
    background: #f8fbff;
}
</style>

<div class="queue-wrapper">

<!-- Hero Header -->
<div class="queue-hero">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h2><i class="ph ph-list-checks mr-2"></i>Patient Queue</h2>
            <p>
                <?php if(!empty($filter_date)): ?>
                    Showing appointments for <strong><?= date('F j, Y', strtotime($filter_date)); ?></strong>
                <?php else: ?>
                    Manage waiting patients and diagnosed cases
                <?php endif; ?>
            </p>
        </div>
        <div class="col-md-4 text-md-right">
            <?php if(!empty($filter_date)): ?>
                <a href="<?= base_url(); ?>Pages/patient_queue" class="btn" style="background: rgba(255,255,255,0.2); color: white; padding: 12px 20px; border-radius: 8px; font-weight: 500; margin-right: 8px;">
                    <i class="ph ph-x"></i>Clear Filter
                </a>
            <?php endif; ?>
            <a href="<?= base_url(); ?>Pages/patient_add" class="btn" style="background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%); color: white; padding: 12px 25px; border-radius: 8px; font-weight: 500;">
                <i class="ph ph-user-plus"></i>New Patient
            </a>
        </div>
    </div>
</div>

<!-- Stats Row -->
<div class="row stats-row">
    <div class="col-md-6">
        <div class="stat-card-queue">
            <div class="stat-icon">
                <i class="ph ph-clock"></i>
            </div>
            <div class="stat-info">
                <div class="stat-count"><?= count($data); ?></div>
                <div class="stat-label">Waiting Patients</div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="stat-card-queue">
            <div class="stat-icon" style="background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%); color: #2e7d32;">
                <i class="ph ph-check-circle"></i>
            </div>
            <div class="stat-info">
                <div class="stat-count"><?= count($dp); ?></div>
                <div class="stat-label">Diagnosed Today</div>
            </div>
        </div>
    </div>
</div>

<!-- Waiting List -->
<div class="card queue-card">
    <div class="card-header">
        <h5><i class="ph ph-clock mr-2"></i>Waiting List</h5>
        <span class="count-badge"><?= count($data); ?> Patients</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table queue-table">
                <thead>
                    <tr>
                        <th>DOA</th>
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>BP</th>
                        <th>WT</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row){ 
                        $p = $this->Page_model->one_cond_get_single_row('patients','id',$row->patient_id);
                    ?>
                    <tr>
                        <td><?= date('M d', strtotime($row->visit_date)); ?></td>
                        <td>
                            <div class="patient-name">
                                <?= strtoupper(htmlentities($p->first_name.' '.$p->middle_name.' '.$p->last_name)); ?>
                            </div>
                        </td>
                        <td><?= $row->age; ?></td>
                        <td><?= strtoupper($row->bp); ?></td>
                        <td><?= strtoupper($row->weight); ?></td>
                        <td><?= strtoupper($row->transaction); ?></td>
                        <td>
                            <a href="diagnose/<?= $row->id; ?>" class="btn btn-diagnose mr-1">
                                <i class="ph ph-stethoscope"></i>Diagnose
                            </a>
                            <a href="appointment_edit/<?= $row->patient_id.'/'.$row->id; ?>" class="btn btn-edit-queue mr-1">
                                <i class="ph ph-pencil-simple"></i>
                            </a>
                            <a href="app_delete/<?= $row->id; ?>" class="btn btn-delete-queue" onclick="return confirm('Are you sure?')">
                                <i class="ph ph-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if(empty($data)): ?>
                    <tr>
                        <td colspan="7">
                            <div class="empty-queue">
                                <i class="ph ph-check-circle"></i>
                                <p>No patients in waiting list</p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Diagnosed Patients -->
<div class="card queue-card diagnosed-card">
    <div class="card-header">
        <h5><i class="ph ph-check-circle mr-2"></i>Diagnosed Patients</h5>
        <span class="count-badge"><?= count($dp); ?> Cases</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="selection-datatable" class="table queue-table diagnosed-table">
                <thead>
                    <tr>
                        <th>Diagnosed By</th>
                        <th>DOA</th>
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>BP</th>
                        <th>WT</th>
                        <th>Type</th>
                        <th>Lab</th>
                        <th>Diagnosis</th>
                        <th>Treatment</th>
                        <th>Remarks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dp as $row){ 
                        $p = $this->Page_model->one_cond_get_single_row('patients','id',$row->patient_id);
                        $app = $this->Page_model->one_cond_get_single_row('appointment','id',$row->appointment_id);
                        $user = $this->Page_model->one_cond_get_single_row('users','id',$row->user_id);
                    ?>
                    <tr>
                        <td>
                            <div class="diagnosed-by">
                                <?php if(isset($user->id)){echo htmlentities($user->last_name.', '.$user->first_name.' '.substr($user->middle_name, 0, 1).'.');} ?>
                            </div>
                        </td>
                        <td><?= date('M d', strtotime($app->visit_date)); ?></td>
                        <td>
                            <div class="patient-name">
                                <?= strtoupper($p->first_name.' '.htmlentities($p->middle_name).' '.$p->last_name); ?>
                            </div>
                        </td>
                        <td><?= $app->age; ?></td>
                        <td><?= strtoupper($app->bp); ?></td>
                        <td><?= strtoupper($app->weight); ?></td>
                        <td><?= strtoupper($app->transaction); ?></td>
                        <td><?= strtoupper($row->lab); ?></td>
                        <td>
                            <div class="diagnosis-text"><?= strtoupper($row->diagnosis); ?></div>
                        </td>
                        <td>
                            <div class="treatment-text"><?= strtoupper($row->treatment); ?></div>
                        </td>
                        <td><?= strtoupper($row->remarks); ?></td>
                        <td>
                            <a href="<?= base_url(); ?>Pages/diagnose_edit/<?= $row->id; ?>" class="btn btn-edit-queue mr-1">
                                <i class="ph ph-pencil-simple"></i>
                            </a>
                            <a href="<?= base_url(); ?>Pages/diagnose_del/<?= $row->id; ?>/<?= $row->appointment_id; ?>" onclick="return confirm('Are you sure?')" class="btn btn-delete-queue">
                                <i class="ph ph-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if(empty($dp)): ?>
                    <tr>
                        <td colspan="12">
                            <div class="empty-queue">
                                <i class="ph ph-clipboard-text"></i>
                                <p>No diagnosed patients yet</p>
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
$(document).ready(function(){
    // Initialize DataTables with responsive support
    if ($.fn.DataTable.isDataTable('#datatable')) {
        $('#datatable').DataTable().destroy();
    }
    $('#datatable').DataTable({
        responsive: true,
        pageLength: 25,
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
        language: {
            search: '',
            searchPlaceholder: 'Search waiting list...',
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

    // Initialize second table for diagnosed patients
    if ($.fn.DataTable.isDataTable('#selection-datatable')) {
        $('#selection-datatable').DataTable().destroy();
    }
    $('#selection-datatable').DataTable({
        responsive: true,
        pageLength: 25,
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
        language: {
            search: '',
            searchPlaceholder: 'Search diagnosed...',
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
        order: [[1, 'desc']]
    });
});
</script>
