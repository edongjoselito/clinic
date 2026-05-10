<style>
.patient-form-wrapper {
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
.custom-radio .custom-control-label {
    text-transform: none;
    font-weight: 400;
    font-size: 14px;
    cursor: pointer;
}
.custom-control-input:checked ~ .custom-control-label::before {
    border-color: #1e88e5;
    background-color: #1e88e5;
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

<div class="patient-form-wrapper">

<!-- Form Header -->
<div class="form-hero">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h2><i class="ph ph-user-plus mr-2"></i><?= $title; ?></h2>
            <p>Enter patient information to register a new patient</p>
        </div>
        <div class="col-md-4 text-md-right">
            <a href="<?= base_url(); ?>Pages/patient_list" class="btn btn-light">
                <i class="ph ph-arrow-left"></i>Back to List
            </a>
        </div>
    </div>
</div>

<?= validation_errors(); ?>

<?php 
    $attributes = array('class' => 'patient-form');
    echo form_open('Pages/patient_add/', $attributes);
?>

<!-- Personal Information -->
<div class="card form-card">
    <div class="card-header">
        <h5><span class="section-icon"><i class="ph ph-user"></i></span>Personal Information</h5>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="required">First Name</label>
                <input required type="text" class="form-control" name="first_name" />
            </div>
            <div class="form-group col-md-4">
                <label>Middle Name</label>
                <input type="text" class="form-control" name="middle_name" />
            </div>
            <div class="form-group col-md-4">
                <label class="required">Last Name</label>
                <input required type="text" class="form-control" name="last_name" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="required">Birthday</label>
                <input required type="date" id="datepicker" class="form-control" name="birthday" onchange="calculateAge()" />
            </div>
            <div class="form-group col-md-2">
                <label class="required">Age</label>
                <input required type="number" id="age" name="age" class="form-control" readonly />
            </div>
            <div class="form-group col-md-3">
                <label class="required">Gender</label>
                <div class="mt-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" value="male" id="genderMale" name="gender" class="custom-control-input" required>
                        <label class="custom-control-label" for="genderMale">Male</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" value="female" id="genderFemale" name="gender" class="custom-control-input">
                        <label class="custom-control-label" for="genderFemale">Female</label>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label class="required">Civil Status</label>
                <select name="civil_status" class="form-control" required>
                    <option value="">Select Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Live-in">Live-in</option>
                    <option value="Widow/er">Widow/er</option>
                    <option value="Separated">Separated</option>
                    <option value="Divorced">Divorced</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="required">Occupation</label>
                <input required type="text" class="form-control" name="occupation" />
            </div>
            <div class="form-group col-md-4">
                <label>Contact Number</label>
                <input type="text" class="form-control" name="contact" />
            </div>
            <div class="form-group col-md-4">
                <label class="required">Email Address</label>
                <input required type="email" class="form-control" name="email" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label class="required">Patient Portal Access</label>
                <div class="mt-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" value="1" id="portalEnabled" name="portal_access" class="custom-control-input" required>
                        <label class="custom-control-label" for="portalEnabled">Enable Portal Access</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" value="0" id="portalDisabled" name="portal_access" class="custom-control-input" checked>
                        <label class="custom-control-label" for="portalDisabled">Disable Portal Access</label>
                    </div>
                </div>
                <small class="text-muted">When enabled, a random password will be generated and sent to the patient's email.</small>
    </div>
</div>

<!-- Address Information -->
<div class="card form-card">
    <div class="card-header">
        <h5><span class="section-icon"><i class="ph ph-map-pin"></i></span>Address Information</h5>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="required">Province</label>
                <select required id="province_select" name="province" class="form-control">
                    <option value="">Select Province</option>
                    <?php if(isset($provinces)): ?>
                        <?php foreach($provinces as $province): ?>
                            <option value="<?= $province->province; ?>"><?= $province->province; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="required">City/Municipality</label>
                <select required id="city_select" name="city_mun" class="form-control" disabled>
                    <option value="">Select City/Municipality</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="required">Barangay</label>
                <select required id="barangay_select" name="barangay" class="form-control" disabled>
                    <option value="">Select Barangay</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label class="required">Sitio</label>
                <input required type="text" class="form-control" name="sitio" />
            </div>
        </div>
    </div>
</div>

<!-- Work Information -->
<div class="card form-card">
    <div class="card-header">
        <h5><span class="section-icon"><i class="ph ph-briefcase"></i></span>Work Information</h5>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Company/Employer</label>
                <input type="text" class="form-control" name="company" />
            </div>
        </div>
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
                <a href="<?= base_url(); ?>Pages/patient_list" class="btn btn-cancel mr-2"><i class="ph ph-x"></i>Cancel</a>
                <button type="submit" name="submit" class="btn-submit">
                    <i class="ph ph-floppy-disk"></i>Save Patient
                </button>
            </div>
        </div>
    </div>
</div>

</form>

<script>
function calculateAge() {
    var birthday = document.getElementById('datepicker').value;
    var ageField = document.getElementById('age');
    
    if (birthday) {
        var birthDate = new Date(birthday);
        var today = new Date();
        var age = today.getFullYear() - birthDate.getFullYear();
        var monthDiff = today.getMonth() - birthDate.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        
        ageField.value = age;
    } else {
        ageField.value = '';
    }
}

$(document).ready(function() {
    // Province change handler
    $('#province_select').on('change', function() {
        var province = $(this).val();
        var citySelect = $('#city_select');
        var barangaySelect = $('#barangay_select');
        
        // Reset city and barangay dropdowns
        citySelect.prop('disabled', true).html('<option value="">Select City/Municipality</option>');
        barangaySelect.prop('disabled', true).html('<option value="">Select Barangay</option>');
        
        if (province) {
            $.ajax({
                url: '<?= base_url(); ?>Pages/get_cities',
                type: 'GET',
                data: { province: province },
                dataType: 'json',
                success: function(data) {
                    citySelect.prop('disabled', false);
                    citySelect.html('<option value="">Select City/Municipality</option>');
                    
                    if (data.length > 0) {
                        $.each(data, function(index, city) {
                            citySelect.append('<option value="' + city.city_mun + '">' + city.city_mun + '</option>');
                        });
                    } else {
                        citySelect.append('<option value="" disabled>No cities found for this province</option>');
                        citySelect.prop('disabled', true);
                    }
                },
                error: function() {
                    alert('Error loading cities. Please try again.');
                }
            });
        }
    });
    
    // City change handler
    $('#city_select').on('change', function() {
        var province = $('#province_select').val();
        var cityMun = $(this).val();
        var barangaySelect = $('#barangay_select');
        
        // Reset barangay dropdown
        barangaySelect.prop('disabled', true).html('<option value="">Select Barangay</option>');
        
        if (province && cityMun) {
            $.ajax({
                url: '<?= base_url(); ?>Pages/get_barangays',
                type: 'GET',
                data: { province: province, city_mun: cityMun },
                dataType: 'json',
                success: function(data) {
                    barangaySelect.prop('disabled', false);
                    barangaySelect.html('<option value="">Select Barangay</option>');
                    
                    if (data.length > 0) {
                        $.each(data, function(index, barangay) {
                            barangaySelect.append('<option value="' + barangay.barangay + '">' + barangay.barangay + '</option>');
                        });
                    } else {
                        barangaySelect.append('<option value="" disabled>No barangays found for this city</option>');
                        barangaySelect.prop('disabled', true);
                    }
                },
                error: function() {
                    alert('Error loading barangays. Please try again.');
                }
            });
        }
    });
});
</script>

</div>
