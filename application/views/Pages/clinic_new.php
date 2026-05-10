<style>
.clinic-new-wrapper {
    padding-top: 20px;
}
.new-hero {
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    border-radius: 12px;
    padding: 25px 30px;
    color: white;
    margin-bottom: 25px;
    box-shadow: 0 10px 30px rgba(30, 136, 229, 0.3);
}
.new-hero h2 {
    color: white;
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 24px;
}
.new-hero p {
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
.btn-create {
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
.btn-create:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(30, 136, 229, 0.4);
    color: white;
}
.btn-cancel-new {
    background: #f5f5f5;
    border: 1px solid #e0e0e0;
    color: #616161;
    padding: 14px 30px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 15px;
    transition: all 0.3s ease;
}
.btn-cancel-new:hover {
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
    margin-bottom: 15px;
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
.info-item .info-text {
    color: #616161;
    font-size: 14px;
    line-height: 1.5;
}
.required::after {
    content: ' *';
    color: #e53935;
}
</style>

<div class="clinic-new-wrapper">

<!-- Hero Header -->
<div class="new-hero">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h2><i class="ph ph-buildings mr-2"></i>Create New Clinic</h2>
            <p>Add a new clinic to the multi-tenant system</p>
        </div>
        <div class="col-md-4 text-md-right">
            <a href="<?= base_url(); ?>Pages/clinic_list" class="btn btn-light">
                <i class="ph ph-arrow-left"></i>Back to List
            </a>
        </div>
    </div>
</div>

<?= form_open('Pages/clinic_new'); ?>

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
                    <input type="text" name="name" class="form-control" value="<?= set_value('name'); ?>" placeholder="Enter clinic name" required>
                    <?= form_error('name'); ?>
                </div>
                
                <div class="form-group">
                    <label class="required">Clinic Code</label>
                    <input type="text" name="code" class="form-control" value="<?= set_value('code'); ?>" placeholder="e.g., CLINIC001" required>
                    <small class="form-text text-muted"><i class="ph ph-info mr-1"></i>Unique identifier for this clinic (e.g., CLINIC001)</small>
                    <?= form_error('code'); ?>
                </div>
                
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control" rows="3" placeholder="Enter clinic address"><?= set_value('address'); ?></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Contact Number</label>
                        <input type="text" name="contact_number" class="form-control" value="<?= set_value('contact_number'); ?>" placeholder="Enter contact number">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= set_value('email'); ?>" placeholder="Enter email address">
                    </div>
                </div>
                
            </div>
        </div>
        
        <!-- Submit Buttons -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <span class="text-muted"><small><span class="text-danger">*</span> Required fields</small></span>
            </div>
            <div>
                <a href="<?= base_url(); ?>Pages/clinic_list" class="btn btn-cancel-new mr-2"><i class="ph ph-x"></i>Cancel</a>
                <button type="submit" class="btn btn-create">
                    <i class="ph ph-floppy-disk"></i>Create Clinic
                </button>
            </div>
        </div>
    </div>
    
    <!-- Sidebar Info -->
    <div class="col-lg-4">
        <div class="card info-card">
            <div class="card-header">
                <h5><i class="ph ph-info mr-1"></i>Important Notes</h5>
            </div>
            <div class="card-body">
                
                <div class="info-item">
                    <i class="ph ph-identification-card"></i>
                    <div class="info-text">
                        <strong>Clinic Code</strong> must be unique across all clinics
                    </div>
                </div>
                
                <div class="info-item">
                    <i class="ph ph-shield"></i>
                    <div class="info-text">
                        <strong>Data isolation</strong> - Each clinic's data is completely separate
                    </div>
                </div>
                
                <div class="info-item">
                    <i class="ph ph-users"></i>
                    <div class="info-text">
                        <strong>User assignment</strong> - Users must be assigned to a specific clinic
                    </div>
                </div>
                
                <div class="info-item">
                    <i class="ph ph-shield"></i>
                    <div class="info-text">
                        <strong>Superadmin access</strong> - Can manage all clinics and assign users
                    </div>
                </div>
                
            </div>
        </div>
        
        <!-- Tips Card -->
        <div class="card info-card mt-4">
            <div class="card-header">
                <h5><i class="ph ph-check-circle mr-1"></i>Best Practices</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><i class="ph ph-check-circle text-success mr-2"></i>Use meaningful clinic names</li>
                    <li class="mb-2"><i class="ph ph-check-circle text-success mr-2"></i>Keep codes short and memorable</li>
                    <li class="mb-2"><i class="ph ph-check-circle text-success mr-2"></i>Include full address for accuracy</li>
                    <li><i class="ph ph-check-circle text-success mr-2"></i>Update contact info regularly</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= form_close(); ?>

</div>
