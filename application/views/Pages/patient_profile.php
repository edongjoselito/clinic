<style>
.profile-wrapper {
    padding-top: 20px;
}
.profile-hero {
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    border-radius: 12px;
    padding: 25px 30px;
    color: white;
    margin-bottom: 25px;
    box-shadow: 0 10px 30px rgba(30, 136, 229, 0.3);
}
.profile-hero h2 {
    color: white;
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 24px;
}
.profile-hero p {
    color: rgba(255,255,255,0.9);
    margin-bottom: 0;
}
.profile-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    margin-bottom: 25px;
}
.profile-header {
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
    padding: 25px 30px;
    border-radius: 12px 12px 0 0;
    border-bottom: none;
}
.profile-header h5 {
    margin: 0;
    font-weight: 600;
    color: #1565c0;
}
.profile-body {
    padding: 30px;
}
.profile-avatar-section {
    display: flex;
    align-items: flex-start;
    margin-bottom: 25px;
}
.profile-avatar {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #e3f2fd;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-right: 25px;
}
.profile-info {
    flex: 1;
}
.profile-name {
    font-size: 22px;
    font-weight: 700;
    color: #212121;
    margin-bottom: 5px;
}
.profile-address {
    color: #616161;
    font-size: 14px;
    margin-bottom: 15px;
}
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}
.info-item {
    background: #f8fbff;
    padding: 15px;
    border-radius: 8px;
    border-left: 3px solid #1e88e5;
}
.info-label {
    font-size: 12px;
    color: #757575;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 5px;
}
.info-value {
    font-weight: 600;
    color: #212121;
    font-size: 15px;
}
.btn-back {
    background: rgba(255,255,255,0.2);
    border: 1px solid rgba(255,255,255,0.3);
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.btn-back:hover {
    background: rgba(255,255,255,0.3);
    color: white;
}
.btn-edit-profile {
    background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%);
    border: none;
    color: white;
    padding: 10px 25px;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.btn-edit-profile:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(67, 160, 71, 0.4);
    color: white;
}
.history-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}
.history-card .card-header {
    background: white;
    border-bottom: 2px solid #e3f2fd;
    padding: 20px 25px;
    border-radius: 12px 12px 0 0;
}
.history-card .card-header h5 {
    margin: 0;
    font-weight: 600;
    color: #1565c0;
}
.history-card .card-body {
    padding: 0;
}
.history-table {
    margin-bottom: 0;
}
.history-table thead {
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
}
.history-table thead th {
    border: none;
    font-weight: 600;
    color: #1565c0;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 10px 8px;
    white-space: nowrap;
}
.history-table tbody td {
    padding: 12px 8px;
    border-color: #f5f5f5;
    vertical-align: middle;
    font-size: 12px;
}
.history-table tbody tr:hover {
    background-color: #f8fbff;
}
@media (max-width: 1200px) {
    .history-table thead th:nth-child(8),
    .history-table thead th:nth-child(9),
    .history-table thead th:nth-child(10),
    .history-table thead th:nth-child(11),
    .history-table tbody td:nth-child(8),
    .history-table tbody td:nth-child(9),
    .history-table tbody td:nth-child(10),
    .history-table tbody td:nth-child(11) {
        display: none;
    }
}
@media (max-width: 992px) {
    .history-table thead th:nth-child(12),
    .history-table thead th:nth-child(13),
    .history-table tbody td:nth-child(12),
    .history-table tbody td:nth-child(13) {
        display: none;
    }
}
@media (max-width: 768px) {
    .history-table thead th:nth-child(4),
    .history-table thead th:nth-child(5),
    .history-table thead th:nth-child(6),
    .history-table thead th:nth-child(7),
    .history-table tbody td:nth-child(4),
    .history-table tbody td:nth-child(5),
    .history-table tbody td:nth-child(6),
    .history-table tbody td:nth-child(7) {
        display: none;
    }
}
@media (max-width: 576px) {
    .history-table thead th:nth-child(14),
    .history-table thead th:nth-child(15),
    .history-table tbody td:nth-child(14),
    .history-table tbody td:nth-child(15) {
        display: none;
    }
    .btn-edit-diagnosis {
        padding: 4px 10px;
        font-size: 11px;
    }
}
.btn-edit-diagnosis {
    background: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
    border: none;
    color: white;
    padding: 6px 15px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.btn-edit-diagnosis:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(30, 136, 229, 0.3);
    color: white;
}
.diagnosis-text {
    color: #1565c0;
    font-weight: 500;
}
.treatment-text {
    color: #43a047;
    font-weight: 500;
}
.empty-history {
    text-align: center;
    padding: 50px 20px;
}
.empty-history i {
    font-size: 48px;
    color: #bbdefb;
    margin-bottom: 15px;
}
.empty-history p {
    color: #757575;
}
</style>

<div class="profile-wrapper">

<!-- Hero Header -->
<div class="profile-hero">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h2><i class="mdi mdi-account-card-details mr-2"></i>Patient Profile</h2>
            <p>View patient information and medical history</p>
        </div>
        <div class="col-md-4 text-md-right">
            <a href="<?= base_url(); ?>Pages/patient_list" class="btn btn-back">
                <i class="mdi mdi-arrow-left mr-1"></i>Back to List
            </a>
        </div>
    </div>
</div>

<!-- Profile Card -->
<div class="card profile-card">
    <div class="profile-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h5><i class="mdi mdi-account mr-2"></i>Patient Information</h5>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="<?= base_url(); ?>Pages/patient_edit/<?= $p->id; ?>" class="btn btn-edit-profile">
                    <i class="mdi mdi-account-settings-variant mr-1"></i>Edit Profile
                </a>
            </div>
        </div>
    </div>
    <div class="profile-body">
        <div class="profile-avatar-section">
            <a href="<?= base_url(); ?>pages/capture/<?= $p->id; ?>">
                <img src="<?= base_url().'uploads/profile/'.$p->image_path; ?>" alt="Profile" class="profile-avatar">
            </a>
            <div class="profile-info">
                <div class="profile-name">
                    <?= mb_strtoupper($p->first_name, 'UTF-8').' '.mb_strtoupper($p->middle_name, 'UTF-8').' '.mb_strtoupper($p->last_name, 'UTF-8'); ?>
                </div>
                <div class="profile-address">
                    <i class="mdi mdi-map-marker-outline mr-1"></i>
                    <?= strtoupper($p->sitio.' '.$p->barangay.' '.$p->city_mun.' '.$p->province); ?>
                </div>
            </div>
        </div>
        
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Age</div>
                <div class="info-value"><?= $p->age; ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Gender</div>
                <div class="info-value"><?= strtoupper($p->gender); ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Birthday</div>
                <div class="info-value"><?= $p->birthday; ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Occupation</div>
                <div class="info-value"><?= strtoupper($p->occupation); ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Civil Status</div>
                <div class="info-value"><?= strtoupper($p->civil_status); ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Company</div>
                <div class="info-value"><?= strtoupper($p->company); ?></div>
            </div>
        </div>
    </div>
</div>

<!-- Medical History -->
<div class="card history-card">
    <div class="card-header">
        <h5><i class="mdi mdi-medical-bag mr-2"></i>Medical History</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table history-table">
                <thead>
                    <tr>
                        <th>DOA</th>
                        <th>Diagnosed By</th>
                        <th>Age</th>
                        <th>LMP</th>
                        <th>EDD</th>
                        <th>BP</th>
                        <th>WT</th>
                        <th>G</th>
                        <th>A</th>
                        <th>P</th>
                        <th>L</th>
                        <th>Type</th>
                        <th>Lab</th>
                        <th>Diagnosis</th>
                        <th>Treatment</th>
                        <th>Remarks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($diag as $row){
                        $user = $this->Page_model->one_cond_get_single_row('users','id',$row->user_id);
                    ?>
                    <tr>
                        <td><?= strtoupper($row->date); ?></td>
                        <td><?= $user ? strtoupper($user->last_name.', '.$user->first_name.' '.substr($user->middle_name, 0, 1).'.') : 'N/A'; ?></td>
                        <td><?= strtoupper($app->age); ?></td>
                        <td><?= strtoupper($app->lmp); ?></td>
                        <td><?= strtoupper($app->date_of_delivery); ?></td>
                        <td><?= strtoupper($app->bp); ?></td>
                        <td><?= strtoupper($app->weight); ?></td>
                        <td><?= strtoupper($app->gravida); ?></td>
                        <td><?= strtoupper($app->abortion); ?></td>
                        <td><?= strtoupper($app->parity); ?></td>
                        <td><?= strtoupper($app->living); ?></td>
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
                            <a href="<?= base_url(); ?>Pages/diagnose_edit/<?= $row->id; ?>" class="btn btn-edit-diagnosis">
                                <i class="mdi mdi-pencil mr-1"></i>Edit
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if(empty($diag)): ?>
                    <tr>
                        <td colspan="17">
                            <div class="empty-history">
                                <i class="mdi mdi-clipboard-text-outline"></i>
                                <p>No medical history records found</p>
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