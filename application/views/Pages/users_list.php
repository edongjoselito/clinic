<style>
.users-list-wrapper {
    padding-top: 20px;
}
.form-hero {
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    border-radius: 12px;
    padding: 25px 30px;
    color: white;
    margin-bottom: 25px;
    box-shadow: 0 10px 30px rgba(30, 136, 229, 0.3);
}
.form-hero h2 {
    color: white;
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 24px;
}
.form-hero p {
    color: rgba(255,255,255,0.9);
    margin-bottom: 0;
}
.table-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    margin-bottom: 25px;
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
.table-modern {
    margin-bottom: 0;
}
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
    padding: 12px 15px;
}
.table-modern tbody td {
    border-color: #f1f3f4;
    padding: 12px 15px;
    vertical-align: middle;
}
.table-modern tbody tr:hover {
    background: #f8fbff;
}
.btn-add {
    background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%);
    border: none;
    color: white;
    padding: 10px 25px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.btn-add:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(67, 160, 71, 0.4);
    color: white;
}
.btn-action {
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    margin-right: 5px;
    transition: all 0.3s ease;
}
.btn-action:hover {
    transform: translateY(-1px);
}
.badge-specialty {
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
    color: #1565c0;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
}
.badge-superadmin {
    background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);
    color: #e65100;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
}
.section-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
}
.section-icon i {
    color: #1565c0;
    font-size: 20px;
}
</style>

<div class="users-list-wrapper">

<!-- Page Header -->
<div class="row">
    <div class="col-12">
        <div class="form-hero">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2><i class="ph ph-users-three mr-2"></i>Users Management</h2>
                    <p>Manage system users and their roles</p>
                </div>
                <div class="col-md-4 text-md-right">
                    <a href="<?= base_url(); ?>Pages/user_add" class="btn btn-add">
                        <i class="ph ph-user-circle-plus"></i>New User
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Users Table -->
<div class="row">
    <div class="col-12">
        <div class="card table-card">
            <div class="card-header">
                <h5><span class="section-icon"><i class="ph ph-users-four"></i></span>System Users</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-modern">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Position</th>
                                <th>Specialty</th>
                                <?php if(isset($is_superadmin) && $is_superadmin): ?>
                                <th>Clinic</th>
                                <?php endif; ?>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row): ?>
                            <tr>
                                <td>
                                    <strong><?= $row->username; ?></strong>
                                </td>
                                <td>
                                    <span class="badge badge-light" style="background: #f5f5f5; color: #616161;"><?= ucfirst($row->position); ?></span>
                                </td>
                                <td>
                                    <?php if(isset($row->specialty_name)): ?>
                                        <span class="badge-specialty"><?= $row->specialty_name; ?></span>
                                    <?php else: ?>
                                        <span class="text-muted" style="font-size: 13px;">None</span>
                                    <?php endif; ?>
                                </td>
                                <?php if(isset($is_superadmin) && $is_superadmin): ?>
                                <td>
                                    <?php if($row->is_superadmin): ?>
                                        <span class="badge-superadmin">Superadmin</span>
                                    <?php else: ?>
                                        <?= $row->clinic_name ? '<span style="color: #424242;">' . $row->clinic_name . '</span>' : '<span class="text-danger" style="font-size: 13px;">Not Assigned</span>'; ?>
                                    <?php endif; ?>
                                </td>
                                <?php endif; ?>
                                <td>
                                    <a data-toggle="modal" class="open-AddBookDialog btn btn-warning btn-action" href="#edit<?= $row->id; ?>">
                                        <i class="ph ph-password"></i>Password
                                    </a>
                                    <a href="user_update/<?= $row->id; ?>" class="btn btn-success btn-action">
                                        <i class="ph ph-pencil-simple"></i>Edit
                                    </a>
                                    <a href="user_delete/<?= $row->id; ?>" class="btn btn-danger btn-action" onclick="return confirm('Are you sure you want to delete this user?');">
                                        <i class="ph ph-trash"></i>Delete
                                    </a>

                                    <div id="edit<?= $row->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Update Password</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                <?= form_open('Pages/users_list'); ?>
                                            
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input type="password" name="password" value="" required class="form-control" placeholder="Enter new password">
                                                        <input type="hidden" value="<?= $row->id; ?>" name="id">
                                                    </div>
                                                    
                                                    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ph ph-x"></i>Cancel</button>
                                                        <button type="submit" name="edit" class="btn btn-primary"><i class="ph ph-lock-key"></i>Update Password</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
