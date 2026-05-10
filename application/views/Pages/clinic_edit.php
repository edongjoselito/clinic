<style>
.clinic-edit-wrapper {
    padding-top: 20px;
}
.edit-hero {
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    border-radius: 12px;
    padding: 25px 30px;
    color: white;
    margin-bottom: 25px;
    box-shadow: 0 10px 30px rgba(30, 136, 229, 0.3);
}
.edit-hero h2 {
    color: white;
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 24px;
}
.edit-hero p {
    color: rgba(255,255,255,0.9);
    margin-bottom: 0;
}
.form-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}
.form-card .card-header {
    background: white;
    border-bottom: 2px solid #e3f2fd;
    padding: 20px 25px;
    border-radius: 12px 12px 0 0;
}
.form-card .card-header h5 {
    margin: 0;
    font-weight: 600;
    color: #1565c0;
    font-size: 16px;
}
.form-card .card-header h5 i {
    margin-right: 8px;
}
.form-card .card-body {
    padding: 25px;
}
.form-group label {
    font-weight: 500;
    color: #424242;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 8px;
}
.form-control {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 12px 15px;
    font-size: 14px;
    transition: all 0.3s ease;
}
.form-control:focus {
    border-color: #1e88e5;
    box-shadow: 0 0 0 3px rgba(30, 136, 229, 0.1);
}
.form-control[readonly] {
    background-color: #f5f5f5;
    color: #757575;
}
.status-badge {
    display: inline-block;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 500;
}
.status-active {
    background: rgba(67, 160, 71, 0.15);
    color: #2e7d32;
}
.status-inactive {
    background: rgba(229, 57, 53, 0.15);
    color: #c62828;
}
.btn-update {
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    border: none;
    color: white;
    padding: 14px 35px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.btn-update:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(30, 136, 229, 0.4);
    color: white;
}
.btn-cancel-edit {
    background: #f5f5f5;
    border: 1px solid #e0e0e0;
    color: #616161;
    padding: 14px 30px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 15px;
    transition: all 0.3s ease;
}
.btn-cancel-edit:hover {
    background: #eeeeee;
    color: #424242;
}
.info-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}
.info-card .card-header {
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
    padding: 20px 25px;
    border-radius: 12px 12px 0 0;
    border-bottom: none;
}
.info-card .card-header h5 {
    margin: 0;
    font-weight: 600;
    color: #1565c0;
}
.info-card .card-body {
    padding: 25px;
}
.info-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px;
}
.info-item:last-child {
    margin-bottom: 0;
}
.info-item i {
    width: 36px;
    height: 36px;
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    color: #1565c0;
    font-size: 18px;
}
.info-item .info-label {
    font-size: 12px;
    color: #757575;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 3px;
}
.info-item .info-value {
    font-weight: 600;
    color: #212121;
    font-size: 14px;
}
.required::after {
    content: ' *';
    color: #e53935;
}
</style>

<div class="clinic-edit-wrapper">

<!-- Hero Header -->
<div class="edit-hero">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h2><i class="ph ph-buildings mr-2"></i>Edit Clinic</h2>
            <p>Update clinic information and settings</p>
        </div>
        <div class="col-md-4 text-md-right">
            <a href="<?= base_url(); ?>Pages/clinic_list" class="btn btn-light">
                <i class="ph ph-arrow-left"></i>Back to List
            </a>
        </div>
    </div>
</div>

<?= form_open('Pages/clinic_edit/'.$clinic->id); ?>

<div class="row">
    <!-- Main Form -->
    <div class="col-lg-8">
        <div class="card form-card">
            <div class="card-header">
                <h5><i class="ph ph-buildings"></i>Clinic Information</h5>
            </div>
            <div class="card-body">
                
                <div class="form-group">
                    <label class="required">Clinic Name</label>
                    <input type="text" name="name" class="form-control" value="<?= set_value('name', $clinic->name); ?>" required>
                    <?= form_error('name'); ?>
                </div>
                
                <div class="form-group">
                    <label>Clinic Code</label>
                    <input type="text" name="code" class="form-control" value="<?= set_value('code', $clinic->code); ?>" readonly>
                    <small class="form-text text-muted"><i class="ph ph-info mr-1"></i>Clinic Code cannot be changed once created</small>
                </div>
                
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control" rows="3" placeholder="Enter clinic address"><?= set_value('address', $clinic->address); ?></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Contact Number</label>
                        <input type="text" name="contact_number" class="form-control" value="<?= set_value('contact_number', $clinic->contact_number); ?>" placeholder="Enter contact number">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= set_value('email', $clinic->email); ?>" placeholder="Enter email address">
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" <?= $clinic->status == 1 ? 'selected' : ''; ?>>
                            Active - Clinic is operational
                        </option>
                        <option value="0" <?= $clinic->status == 0 ? 'selected' : ''; ?>>
                            Inactive - Clinic is temporarily closed
                        </option>
                    </select>
                </div>
                
            </div>
        </div>
        
        <!-- Submit Buttons -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <span class="text-muted"><small><span class="text-danger">*</span> Required fields</small></span>
            </div>
            <div>
                <a href="<?= base_url(); ?>Pages/clinic_list" class="btn btn-cancel-edit mr-2"><i class="ph ph-x"></i>Cancel</a>
                <button type="submit" class="btn btn-update">
                    <i class="ph ph-floppy-disk"></i>Update Clinic
                </button>
            </div>
        </div>
    </div>
    
    <!-- Sidebar Info -->
    <div class="col-lg-4">
        <div class="card info-card">
            <div class="card-header">
                <h5><i class="ph ph-info mr-1"></i>Clinic Details</h5>
            </div>
            <div class="card-body">
                
                <div class="info-item">
                    <i class="ph ph-identification-card"></i>
                    <div>
                        <div class="info-label">Clinic ID</div>
                        <div class="info-value">#<?= $clinic->id; ?></div>
                    </div>
                </div>
                
                <div class="info-item">
                    <i class="ph ph-calendar-plus"></i>
                    <div>
                        <div class="info-label">Created</div>
                        <div class="info-value"><?= date('M d, Y', strtotime($clinic->created_at)); ?></div>
                        <small class="text-muted"><?= date('h:i A', strtotime($clinic->created_at)); ?></small>
                    </div>
                </div>
                
                <?php if($clinic->updated_at): ?>
                <div class="info-item">
                    <i class="ph ph-calendar-dots"></i>
                    <div>
                        <div class="info-label">Last Updated</div>
                        <div class="info-value"><?= date('M d, Y', strtotime($clinic->updated_at)); ?></div>
                        <small class="text-muted"><?= date('h:i A', strtotime($clinic->updated_at)); ?></small>
                    </div>
                </div>
                <?php endif; ?>
                
                <div class="info-item">
                    <i class="ph ph-toggle-right"></i>
                    <div>
                        <div class="info-label">Current Status</div>
                        <div class="mt-1">
                            <?php if($clinic->status == 1): ?>
                                <span class="status-badge status-active"><i class="ph ph-check-circle mr-1"></i>Active</span>
                            <?php else: ?>
                                <span class="status-badge status-inactive"><i class="ph ph-x mr-1"></i>Inactive</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
        <!-- Tips Card -->
        <div class="card info-card mt-4">
            <div class="card-header">
                <h5><i class="ph ph-info mr-1"></i>Tips</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><i class="ph ph-check-circle text-success mr-2"></i>Keep clinic name accurate for reports</li>
                    <li class="mb-2"><i class="ph ph-check-circle text-success mr-2"></i>Update contact info when changed</li>
                    <li class="mb-2"><i class="ph ph-check-circle text-success mr-2"></i>Inactive clinics cannot be accessed</li>
                    <li><i class="ph ph-check-circle text-success mr-2"></i>Changes affect all clinic users</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= form_close(); ?>

</div>
