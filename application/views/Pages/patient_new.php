<style>
.patient-form-wrapper { padding-top: 20px; }

/* ===== Hero ===== */
.form-hero {
    position: relative;
    background: linear-gradient(120deg, #0d47a1 0%, #1565c0 45%, #1e88e5 100%);
    border-radius: 16px;
    padding: 30px 36px;
    margin-bottom: 24px;
    box-shadow: 0 12px 32px rgba(13, 71, 161, 0.28);
    color: #fff;
    overflow: hidden;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}
.form-hero::before {
    content: '';
    position: absolute;
    top: -90px; right: -60px;
    width: 240px; height: 240px;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
}
.form-hero > * { position: relative; z-index: 1; }
.form-hero h2 {
    color: #fff;
    font-weight: 700;
    font-size: 24px;
    margin-bottom: 4px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.form-hero p { color: rgba(255,255,255,0.85); margin: 0; font-size: 14px; }
.hero-cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    height: 42px;
    padding: 0 18px;
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,255,255,0.4);
    border-radius: 10px;
    color: #fff;
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
    transition: all .2s ease;
}
.hero-cta:hover { background: rgba(255,255,255,0.25); color: #fff; text-decoration: none; }

/* ===== Cards ===== */
.form-card {
    border: 1px solid #edf2f7;
    border-radius: 14px;
    box-shadow: 0 1px 4px rgba(30, 58, 95, 0.03);
    margin-bottom: 24px;
    background: #fff;
}
.form-card .card-header {
    background: #fff;
    border-bottom: 1px solid #f0f4f8;
    padding: 16px 24px;
    border-radius: 14px 14px 0 0;
}
.form-card .card-header h5 {
    margin: 0;
    font-weight: 700;
    color: #1c2b3a;
    font-size: 15px;
    display: flex;
    align-items: center;
    gap: 12px;
}
.section-icon {
    width: 36px;
    height: 36px;
    min-width: 36px;
    background: #e8f4fd;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
.section-icon i { color: #1e88e5; font-size: 18px; }
.form-card .card-body { padding: 24px; }

/* ===== Form controls ===== */
.form-group { margin-bottom: 20px; }
.form-row:last-child .form-group { margin-bottom: 0; }
.form-group label {
    font-weight: 600;
    color: #5a6b7d;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 8px;
}
.form-control {
    height: 44px;
    border: 1px solid #dce4ec;
    border-radius: 10px;
    padding: 0 14px;
    font-size: 14px;
    color: #1c2b3a;
    transition: all 0.2s ease;
}
.form-control:focus { border-color: #1e88e5; box-shadow: 0 0 0 3px rgba(30, 136, 229, 0.1); }
.form-control[readonly] { background: #f7fafd; color: #6c7d8f; }
.form-control:disabled { background: #f7fafd; color: #a5b3c2; }
select.form-control { padding-right: 32px; }
.radio-row {
    height: 44px;
    display: flex;
    align-items: center;
    gap: 22px;
}
.custom-radio .custom-control-label {
    text-transform: none;
    font-weight: 500;
    font-size: 14px;
    color: #1c2b3a;
    letter-spacing: 0;
    margin: 0;
    cursor: pointer;
}
.custom-control-input:checked ~ .custom-control-label::before { border-color: #1e88e5; background-color: #1e88e5; }
.form-hint { display: block; font-size: 12.5px; color: #8a9bb0; margin-top: 8px; }
.required::after { content: ' *'; color: #e53935; }

/* ===== Footer actions ===== */
.form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}
.form-actions .hint { font-size: 13px; color: #8a9bb0; }
.form-actions .hint span { color: #e53935; }
.form-actions .btns { display: flex; gap: 10px; }
.btn-cancel, .btn-submit {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    height: 40px;
    padding: 0 18px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 14px;
    border: none;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.2s ease;
}
.btn-cancel { background: #f1f5f9; color: #3d4f63; }
.btn-cancel:hover { background: #e3eaf1; color: #1c2b3a; text-decoration: none; }
.btn-submit { background: #1e88e5; color: #fff; }
.btn-submit:hover { background: #1565c0; color: #fff; }

@media (max-width: 767px) {
    .form-hero { padding: 24px 22px; }
    .form-card .card-body { padding: 20px; }
    .form-row .form-group { margin-bottom: 20px; }
}
</style>

<div class="patient-form-wrapper">

<!-- Form Header -->
<div class="form-hero">
    <div>
        <h2><i class="ph ph-user-plus"></i><?= $title; ?></h2>
        <p>Enter patient information to register a new patient</p>
    </div>
    <a href="<?= base_url(); ?>Pages/patient_list" class="hero-cta">
        <i class="ph ph-arrow-left"></i>Back to List
    </a>
</div>

<?= validation_errors(); ?>

<?= form_open('Pages/patient_add/', array('class' => 'patient-form')); ?>

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
                <div class="radio-row">
                    <div class="custom-control custom-radio">
                        <input type="radio" value="male" id="genderMale" name="gender" class="custom-control-input" required>
                        <label class="custom-control-label" for="genderMale">Male</label>
                    </div>
                    <div class="custom-control custom-radio">
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
                <div class="radio-row">
                    <div class="custom-control custom-radio">
                        <input type="radio" value="1" id="portalEnabled" name="portal_access" class="custom-control-input" required>
                        <label class="custom-control-label" for="portalEnabled">Enable Portal Access</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" value="0" id="portalDisabled" name="portal_access" class="custom-control-input" checked>
                        <label class="custom-control-label" for="portalDisabled">Disable Portal Access</label>
                    </div>
                </div>
                <small class="form-hint">When enabled, a random password will be generated and sent to the patient's email.</small>
            </div>
        </div>
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
        <div class="form-actions">
            <div class="hint"><span>*</span> Required fields</div>
            <div class="btns">
                <a href="<?= base_url(); ?>Pages/patient_list" class="btn-cancel"><i class="ph ph-x"></i>Cancel</a>
                <button type="submit" name="submit" class="btn-submit"><i class="ph ph-floppy-disk"></i>Save Patient</button>
            </div>
        </div>
    </div>
</div>

<?= form_close(); ?>

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
