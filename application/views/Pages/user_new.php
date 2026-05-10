<style>
.user-form-wrapper {
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
.form-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    margin-bottom: 25px;
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
    color: #1e88e5;
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
.btn-submit {
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
.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(30, 136, 229, 0.4);
    color: white;
}
.btn-cancel {
    background: #f5f5f5;
    border: 1px solid #e0e0e0;
    color: #616161;
    padding: 14px 30px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 15px;
    transition: all 0.3s ease;
}
.btn-cancel:hover {
    background: #eeeeee;
    color: #424242;
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
.required::after {
    content: ' *';
    color: #e53935;
}
</style>

<div class="user-form-wrapper">

<!-- Form Header -->
<div class="form-hero">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h2><i class="ph ph-user-circle-plus mr-2"></i><?= $title; ?></h2>
            <p>Enter user information to create a new account</p>
        </div>
        <div class="col-md-4 text-md-right">
            <a href="<?= base_url(); ?>Pages/users_list" class="btn btn-light">
                <i class="ph ph-arrow-left"></i>Back to List
            </a>
        </div>
    </div>
</div>

<?= validation_errors(); ?>

<?php echo form_open('Pages/user_add'); ?>

<!-- Account Information -->
<div class="card form-card">
    <div class="card-header">
        <h5><span class="section-icon"><i class="ph ph-user-circle"></i></span>Account Information</h5>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="required">First Name</label>
                <input type="text" required value="<?= set_value('fname'); ?>" name="fname" class="form-control" placeholder="Enter first name">
            </div>
            <div class="form-group col-md-4">
                <label>Middle Name</label>
                <input type="text" value="<?= set_value('mname'); ?>" name="mname" class="form-control" placeholder="Enter middle name">
            </div>
            <div class="form-group col-md-4">
                <label class="required">Last Name</label>
                <input type="text" required value="<?= set_value('lname'); ?>" name="lname" class="form-control" placeholder="Enter last name">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="required">Username</label>
                <input type="text" required value="<?= set_value('username'); ?>" name="username" class="form-control" placeholder="Enter username">
            </div>
            <div class="form-group col-md-6">
                <label class="required">Password</label>
                <input type="password" required value="<?= set_value('password'); ?>" name="password" class="form-control" placeholder="Enter password">
            </div>
        </div>
    </div>
</div>

<!-- Role & Specialty -->
<div class="card form-card">
    <div class="card-header">
        <h5><span class="section-icon"><i class="ph ph-user-gear"></i></span>Role & Specialty</h5>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="required">Position</label>
                <select id="inputState" name="position" class="form-control">
                <?php
                    $user_position = array("Admin", "secretary");
                     foreach($user_position as $row){
                      echo "<option value='";
                      echo $row;
                      echo "'>";
                      echo $row."</option>\n";
                     }
                  ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label>Medical Specialty (Optional)</label>
                <select id="inputSpecialty" name="specialty_id" class="form-control">
                    <option value="">-- No Specialty --</option>
                    <?php if(isset($specialties)): ?>
                        <?php 
                        $current_category = '';
                        foreach($specialties as $specialty):
                            if($specialty->category != $current_category):
                                if($current_category != '') echo "</optgroup>";
                                $current_category = $specialty->category;
                                $category_label = ucwords(str_replace('_', ' ', $current_category));
                                echo "<optgroup label='$category_label'>";
                            endif;
                        ?>
                            <option value="<?= $specialty->id; ?>"><?= $specialty->name; ?></option>
                        <?php endforeach; ?>
                        <?php if($current_category != '') echo "</optgroup>"; ?>
                    <?php endif; ?>
                </select>
                <small class="form-text text-muted">Select medical specialty if applicable</small>
            </div>
        </div>

        <?php if(isset($is_superadmin) && $is_superadmin): ?>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="required">Assign to Clinic</label>
                <select id="inputClinic" name="clinic_id" class="form-control" required>
                    <option value="">-- Select Clinic --</option>
                    <?php foreach($clinics as $clinic): ?>
                        <option value="<?= $clinic->id; ?>"><?= $clinic->name; ?> (<?= $clinic->code; ?>)</option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-muted">Select which clinic this user will belong to</small>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Submit Buttons -->
<div class="card form-card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span class="text-muted"><small><span class="text-danger">*</span> Required fields</small></span>
            </div>
            <div>
                <a href="<?= base_url(); ?>Pages/users_list" class="btn btn-cancel mr-2"><i class="ph ph-x"></i>Cancel</a>
                <button type="submit" name="submit" class="btn-submit">
                    <i class="ph ph-floppy-disk"></i>Create User
                </button>
            </div>
        </div>
    </div>
</div>

</form>

</div>
