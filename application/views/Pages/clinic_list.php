<style>
.clinic-wrapper { padding-top: 20px; }
.page-hero {
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    border-radius: 12px;
    padding: 25px 30px;
    color: white;
    margin-bottom: 25px;
    box-shadow: 0 10px 30px rgba(30, 136, 229, 0.3);
}
.page-hero h2 { color: white; font-weight: 600; margin-bottom: 5px; font-size: 24px; }
.page-hero p { color: rgba(255,255,255,0.9); margin-bottom: 0; }
.btn-create {
    background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%);
    border: none;
    color: white;
    padding: 12px 28px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 14px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(67, 160, 71, 0.3);
}
.btn-create:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 25px rgba(67, 160, 71, 0.4);
    color: white;
    text-decoration: none;
}
.table-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}
.table-card .card-header {
    background: white;
    border-bottom: 2px solid #e3f2fd;
    padding: 20px 25px;
    border-radius: 12px 12px 0 0;
}
.table-card .card-header h5 {
    margin: 0;
    font-weight: 600;
    color: #1565c0;
    font-size: 16px;
}
.table-modern { margin-bottom: 0; }
.table-modern thead {
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
}
.table-modern thead th {
    border: none;
    font-weight: 600;
    color: #1565c0;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 14px 12px;
    white-space: nowrap;
}
.table-modern tbody td {
    border-color: #f1f3f4;
    padding: 14px 12px;
    vertical-align: middle;
    font-size: 14px;
    color: #424242;
}
.table-modern tbody tr:hover { background: #f8fbff; }
.status-badge {
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.3px;
}
.status-active {
    background: #e8f5e9;
    color: #2e7d32;
}
.status-inactive {
    background: #ffebee;
    color: #c62828;
}
.btn-action {
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 500;
    transition: all 0.3s ease;
    border: none;
    color: white;
}
.btn-edit {
    background: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
    margin-right: 6px;
}
.btn-edit:hover { transform: translateY(-1px); box-shadow: 0 3px 10px rgba(30, 136, 229, 0.3); color: white; }
.btn-deactivate {
    background: linear-gradient(135deg, #e53935 0%, #c62828 100%);
}
.btn-deactivate:hover { transform: translateY(-1px); box-shadow: 0 3px 10px rgba(229, 57, 53, 0.3); color: white; }
.empty-state {
    padding: 40px;
    text-align: center;
    color: #9e9e9e;
}
.empty-state i { font-size: 48px; color: #e0e0e0; margin-bottom: 15px; }
.clinic-code {
    background: #f5f5f5;
    padding: 4px 10px;
    border-radius: 4px;
    font-family: monospace;
    font-size: 12px;
    color: #616161;
}
</style>

<div class="clinic-wrapper">

<!-- Hero Header -->
<div class="row">
    <div class="col-12">
        <div class="page-hero">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2><i class="ph ph-buildings mr-2"></i>Clinic Management</h2>
                    <p>Manage and oversee all registered clinics</p>
                </div>
                <div class="col-md-4 text-md-right">
                    <a href="<?= base_url(); ?>Pages/clinic_new" class="btn-create">
                        <i class="ph ph-plus"></i>Create New Clinic
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Alerts -->
<?php if($this->session->flashdata('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 8px; border: none; margin-bottom: 20px;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?= $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>

<?php if($this->session->flashdata('danger')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 8px; border: none; margin-bottom: 20px;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?= $this->session->flashdata('danger'); ?>
</div>
<?php endif; ?>

<!-- Clinics Table -->
<div class="row">
    <div class="col-12">
        <div class="card table-card">
            <div class="card-header">
                <h5><i class="ph ph-clipboard-text mr-2"></i>All Clinics</h5>
            </div>
            <div class="card-body" style="padding: 0;">
                <div class="table-responsive">
                    <table class="table table-modern" id="clinics-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Clinic Name</th>
                                <th>Code</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($clinics as $clinic): ?>
                            <tr>
                                <td style="font-weight: 600; color: #1565c0;">#<?= $clinic->id; ?></td>
                                <td><strong style="color: #212121;"><?= $clinic->name; ?></strong></td>
                                <td><span class="clinic-code"><?= $clinic->code; ?></span></td>
                                <td><?= $clinic->contact_number ?: '<span style="color: #bdbdbd;">-</span>'; ?></td>
                                <td><?= $clinic->email ?: '<span style="color: #bdbdbd;">-</span>'; ?></td>
                                <td>
                                    <?php if($clinic->status == 1): ?>
                                        <span class="status-badge status-active"><i class="ph ph-check-circle mr-1"></i>Active</span>
                                    <?php else: ?>
                                        <span class="status-badge status-inactive"><i class="ph ph-x mr-1"></i>Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td style="color: #757575; font-size: 13px;"><?= date('M d, Y', strtotime($clinic->created_at)); ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>Pages/clinic_edit/<?= $clinic->id; ?>" class="btn-action btn-edit" title="Edit">
                                        <i class="ph ph-pencil-simple"></i> Edit
                                    </a>
                                    <?php if($clinic->status == 1): ?>
                                    <a href="<?= base_url(); ?>Pages/clinic_delete/<?= $clinic->id; ?>" class="btn-action btn-deactivate" title="Deactivate" onclick="return confirm('Are you sure you want to deactivate this clinic?');">
                                        <i class="ph ph-x"></i>
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if(empty($clinics)): ?>
                            <tr>
                                <td colspan="8">
                                    <div class="empty-state">
                                        <i class="ph ph-buildings"></i>
                                        <h5>No clinics found</h5>
                                        <p class="mb-0">Create your first clinic to get started.</p>
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
</div>

</div>

<script>
$(document).ready(function() {
    $('#clinics-table').DataTable({
        "order": [[0, "desc"]],
        "pageLength": 25,
        "language": {
            "search": "",
            "searchPlaceholder": "Search clinics..."
        }
    });
});
</script>
