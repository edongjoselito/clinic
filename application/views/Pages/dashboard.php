
<style>
.dashboard-wrapper {
    padding-top: 20px;
}
.dashboard-hero {
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    border-radius: 12px;
    padding: 30px;
    color: white;
    margin-bottom: 25px;
    box-shadow: 0 10px 30px rgba(30, 136, 229, 0.3);
}
.dashboard-hero h2 {
    color: white;
    font-weight: 600;
    margin-bottom: 8px;
}
.dashboard-hero p {
    color: rgba(255,255,255,0.9);
    margin-bottom: 0;
}
.stat-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    overflow: hidden;
}
.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}
.stat-card .card-body {
    padding: 25px;
}
.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    margin-bottom: 15px;
}
.stat-icon.appointments { background: linear-gradient(135deg, #42a5f5 0%, #1e88e5 100%); color: white; }
.stat-icon.items { background: linear-gradient(135deg, #64b5f6 0%, #2196f3 100%); color: white; }
.stat-icon.referrals { background: linear-gradient(135deg, #90caf9 0%, #42a5f5 100%); color: white; }
.stat-icon.users { background: linear-gradient(135deg, #1976d2 0%, #0d47a1 100%); color: white; }
.stat-number {
    font-size: 32px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 5px;
}
.stat-label {
    color: #7f8c8d;
    font-size: 14px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.stat-link {
    color: #1e88e5;
    font-weight: 600;
    text-decoration: none;
}
.stat-link:hover {
    color: #0d47a1;
}
.quick-actions {
    background: white;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    margin-bottom: 25px;
}
.quick-actions h5 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 20px;
}
.action-btn {
    display: inline-flex;
    align-items: center;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 500;
    margin-right: 10px;
    margin-bottom: 10px;
    transition: all 0.3s ease;
    text-decoration: none;
}
.action-btn i {
    margin-right: 8px;
    font-size: 18px;
}
.action-btn-primary {
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    color: white;
}
.action-btn-primary:hover {
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(30, 136, 229, 0.4);
}
.action-btn-success {
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    color: white;
}
.action-btn-success:hover {
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(17, 153, 142, 0.4);
}
.action-btn-info {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    color: white;
}
.action-btn-info:hover {
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(79, 172, 254, 0.4);
}
.action-btn-warning {
    background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    color: white;
}
.action-btn-warning:hover {
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(250, 112, 154, 0.4);
}
.widget-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}
.widget-card .card-header {
    background: white;
    border-bottom: 1px solid #f1f3f4;
    padding: 20px 25px;
    border-radius: 12px 12px 0 0;
}
.widget-card .card-header h5 {
    margin: 0;
    font-weight: 600;
    color: #2c3e50;
}
.widget-card .card-body {
    padding: 25px;
}
.table-modern th {
    border-top: none;
    font-weight: 600;
    color: #7f8c8d;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.table-modern td {
    vertical-align: middle;
    border-color: #f1f3f4;
    padding: 15px;
}
.badge-soft {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
}
.badge-soft-primary { background: rgba(30, 136, 229, 0.15); color: #1e88e5; }
.badge-soft-success { background: rgba(17, 153, 142, 0.15); color: #11998e; }
.badge-soft-warning { background: rgba(254, 225, 64, 0.15); color: #f39c12; }
</style>

<div class="dashboard-wrapper">

<!-- Dashboard Hero -->
<?php $current_clinic = get_current_clinic(); ?>
<div class="dashboard-hero">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h2><?= $current_clinic ? $current_clinic->name : 'Clinic'; ?>!</h2>
            <p>
                <small><?= $current_clinic && $current_clinic->address ? $current_clinic->address : ''; ?></small>
            </p>
        </div>
        <div class="col-md-4 text-md-right">
            <span class="text-white-50"><?= date('l, F j, Y'); ?></span>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="quick-actions">
    <h5><i class="mdi mdi-flash mr-2"></i>Quick Actions</h5>
    <a href="<?= base_url(); ?>Pages/patient_add" class="action-btn action-btn-primary">
        <i class="mdi mdi-account-plus"></i> New Patient
    </a>
    <a href="<?= base_url(); ?>Pages/appointments" class="action-btn action-btn-success">
        <i class="mdi mdi-calendar-check"></i> New Appointment
    </a>
    <a href="<?= base_url(); ?>Pages/pay" class="action-btn action-btn-info">
        <i class="mdi mdi-cash-register"></i> Process Payment
    </a>
    <a href="<?= base_url(); ?>Pages/patient_queue" class="action-btn action-btn-warning">
        <i class="mdi mdi-format-list-checks"></i> View Queue
    </a>
</div>

<!-- Stats Cards -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-icon appointments">
                    <i class="mdi mdi-calendar-check"></i>
                </div>
                <div class="stat-number" data-plugin="counterup"><?= $app->num_rows(); ?></div>
                <div class="stat-label"><a href="<?= base_url(); ?>Pages/patient_queue" class="stat-link">Today's Appointments</a></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-icon items">
                    <i class="mdi mdi-pill"></i>
                </div>
                <div class="stat-number" data-plugin="counterup"><?= $item->num_rows(); ?></div>
                <div class="stat-label"><a href="<?= base_url(); ?>Pages/item_list" class="stat-link">Medical Items</a></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-icon referrals">
                    <i class="mdi mdi-share-variant"></i>
                </div>
                <div class="stat-number" data-plugin="counterup"><?= $ref->num_rows(); ?></div>
                <div class="stat-label"><a href="<?= base_url(); ?>Pages/referral_list" class="stat-link">Referrals</a></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-icon users">
                    <i class="mdi mdi-account-group"></i>
                </div>
                <div class="stat-number" data-plugin="counterup"><?= $user->num_rows(); ?></div>
                <div class="stat-label"><a href="<?= base_url(); ?>Pages/users_list" class="stat-link">System Users</a></div>
            </div>
        </div>
    </div>
</div>

<!-- Bottom Widgets Row -->
<div class="row">
    <div class="col-xl-8">
        <div class="card widget-card">
            <div class="card-header">
                <h5><i class="mdi mdi-clock-outline mr-2"></i>Recent Appointments</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-modern">
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($recent_appointments) && $recent_appointments->num_rows() > 0): ?>
                                <?php foreach($recent_appointments->result() as $apt): ?>
                                <tr>
                                    <td><strong><?= $apt->patient_name; ?></strong></td>
                                    <td><?= $apt->appointment_time; ?></td>
                                    <td><span class="badge-soft badge-soft-primary"><?= $apt->status; ?></span></td>
                                    <td>
                                        <a href="<?= base_url(); ?>Pages/patient_profile/<?= $apt->patient_id; ?>" class="btn btn-sm btn-outline-primary">View</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        <i class="mdi mdi-calendar-blank mdi-24px mb-2 d-block"></i>
                                        No recent appointments found
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card widget-card">
            <div class="card-header">
                <h5><i class="mdi mdi-chart-line mr-2"></i>Today's Overview</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Patients Seen</span>
                        <span class="font-weight-bold"><?= isset($patients_seen) ? $patients_seen : 0; ?></span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Pending Bills</span>
                        <span class="font-weight-bold"><?= isset($pending_bills) ? $pending_bills : 0; ?></span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 45%"></div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Queue Status</span>
                        <span class="font-weight-bold"><?= $app->num_rows(); ?> waiting</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 60%"></div>
                    </div>
                </div>
                <hr>
                <a href="<?= base_url(); ?>Pages/patient_queue" class="btn btn-outline-primary btn-block">
                    <i class="mdi mdi-arrow-right mr-1"></i> Go to Patient Queue
                </a>
            </div>
        </div>
    </div>
</div>

</div>