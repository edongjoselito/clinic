<div class="dashboard-wrapper">

<!-- Page Title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4><i class="mdi mdi-hospital-building mr-2"></i>Clinic Management</h4>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!-- Alerts -->
<?php if($this->session->flashdata('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $this->session->flashdata('success'); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>

<!-- Action Button -->
<div class="row mb-3">
    <div class="col-12">
        <a href="<?= base_url(); ?>Pages/clinic_new" class="btn btn-primary">
            <i class="mdi mdi-plus mr-1"></i>Create New Clinic
        </a>
    </div>
</div>

<!-- Clinics Table -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">All Clinics</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="clinics-table">
                        <thead class="thead-light">
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
                                <td><?= $clinic->id; ?></td>
                                <td><strong><?= $clinic->name; ?></strong></td>
                                <td><code><?= $clinic->code; ?></code></td>
                                <td><?= $clinic->contact_number ?: '-'; ?></td>
                                <td><?= $clinic->email ?: '-'; ?></td>
                                <td>
                                    <?php if($clinic->status == 1): ?>
                                        <span class="badge badge-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= date('M d, Y', strtotime($clinic->created_at)); ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>Pages/clinic_edit/<?= $clinic->id; ?>" class="btn btn-sm btn-info" title="Edit">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <?php if($clinic->status == 1): ?>
                                    <a href="<?= base_url(); ?>Pages/clinic_delete/<?= $clinic->id; ?>" class="btn btn-sm btn-danger" title="Deactivate" onclick="return confirm('Are you sure you want to deactivate this clinic?');">
                                        <i class="mdi mdi-close-circle"></i>
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if(empty($clinics)): ?>
                            <tr>
                                <td colspan="8" class="text-center">No clinics found.</td>
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
        "order": [[0, "desc"]]
    });
});
</script>
