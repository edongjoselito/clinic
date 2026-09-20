<?php
    $p_name   = ucwords(strtolower(trim($p->first_name . ' ' . $p->last_name)));
    $initials = strtoupper(substr($p->first_name, 0, 1) . substr($p->last_name, 0, 1));
    $civil_options = array('Single', 'Married', 'Live-in', 'Widow/er', 'Separated', 'Divorced');
    $saved_civil   = trim((string) $p->civil_status);
    $saved_province  = trim((string) $p->province);
    $saved_city      = trim((string) $p->city_mun);
    $saved_barangay  = trim((string) $p->barangay);
    $province_known  = false;
    if (!empty($provinces)) {
        foreach ($provinces as $prov) {
            if (strcasecmp($prov->province, $saved_province) === 0) { $province_known = true; break; }
        }
    }
?>
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
.hero-left { display: flex; align-items: center; gap: 16px; min-width: 0; }
.hero-avatar {
    width: 58px; height: 58px; border-radius: 15px; flex-shrink: 0;
    background: rgba(255,255,255,0.18); border: 1px solid rgba(255,255,255,0.35);
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; font-weight: 700; color: #fff;
}
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
.hero-actions { display: flex; gap: 10px; flex-wrap: wrap; }
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
select.form-control { padding-right: 32px; }
/* Segmented radio (Gender) — same height as inputs */
.segmented {
    display: flex;
    height: 44px;
    border: 1px solid #dce4ec;
    border-radius: 10px;
    overflow: hidden;
    background: #fff;
}
.segmented input { position: absolute; opacity: 0; width: 0; height: 0; }
.segmented label {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    margin: 0;
    font-size: 14px;
    font-weight: 600;
    color: #5a6b7d;
    text-transform: none;
    letter-spacing: 0;
    cursor: pointer;
    transition: all .15s;
}
.segmented label i { font-size: 16px; }
.segmented label + input + label { border-left: 1px solid #dce4ec; }
.segmented label:hover { background: #f7fafd; }
.segmented input:checked + label { background: #1e88e5; color: #fff; }
.required::after { content: ' *'; color: #e53935; }

/* ===== Portal toggle ===== */
.form-group label.portal-toggle {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px 18px;
    background: #f9fbfd;
    border: 1px solid #edf2f7;
    border-radius: 12px;
    cursor: pointer;
    text-transform: none;
    letter-spacing: 0;
    margin: 0;
    transition: border-color .2s;
}
.portal-toggle:hover { border-color: #c9dcf2; }
.portal-icon {
    width: 40px; height: 40px; min-width: 40px;
    border-radius: 10px;
    background: #e7f7f5;
    color: #11998e;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px;
}
.portal-text { flex: 1; display: flex; flex-direction: column; gap: 3px; }
.portal-title { font-size: 14px; font-weight: 700; color: #1c2b3a; }
.portal-desc { font-size: 12.5px; color: #8a9bb0; font-weight: 500; line-height: 1.45; }
.portal-toggle .custom-switch { padding-left: 2.75rem; min-height: 1.5rem; }
.portal-toggle .custom-switch .custom-control-label::before { width: 2.5rem; height: 1.4rem; border-radius: 0.7rem; left: -2.75rem; top: 0.05rem; background: #dce4ec; border-color: #dce4ec; }
.portal-toggle .custom-switch .custom-control-label::after { width: calc(1.4rem - 4px); height: calc(1.4rem - 4px); border-radius: 50%; left: calc(-2.75rem + 2px); top: calc(0.05rem + 2px); background: #fff; }
.portal-toggle .custom-switch .custom-control-input:checked ~ .custom-control-label::before { background: #11998e; border-color: #11998e; }
.portal-toggle .custom-switch .custom-control-input:checked ~ .custom-control-label::after { transform: translateX(1.1rem); }

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
    .hero-avatar { width: 46px; height: 46px; font-size: 18px; border-radius: 12px; }
    .form-card .card-body { padding: 20px; }
    .form-row .form-group { margin-bottom: 20px; }
}
</style>

<div class="patient-form-wrapper">

<!-- Form Header -->
<div class="form-hero">
    <div class="hero-left">
        <div class="hero-avatar"><?= htmlentities($initials); ?></div>
        <div>
            <h2><i class="ph ph-user-gear"></i><?= $title; ?></h2>
            <p>Updating record for <strong><?= htmlentities($p_name); ?></strong> · Patient #<?= (int) $p->id; ?></p>
        </div>
    </div>
    <div class="hero-actions">
        <a href="<?= base_url(); ?>Pages/patient_profile/<?= (int) $p->id; ?>" class="hero-cta"><i class="ph ph-user"></i>Profile</a>
        <a href="<?= base_url(); ?>Pages/patient_list" class="hero-cta"><i class="ph ph-arrow-left"></i>Back to List</a>
    </div>
</div>

<?= validation_errors(); ?>

<?= form_open('Pages/patient_edit/' . (int) $p->id, array('class' => 'patient-form')); ?>
<input type="hidden" name="id" value="<?= (int) $p->id; ?>">

<!-- Personal Information -->
<div class="card form-card">
    <div class="card-header">
        <h5><span class="section-icon"><i class="ph ph-user"></i></span>Personal Information</h5>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="required">First Name</label>
                <input required type="text" class="form-control" name="first_name" value="<?= htmlentities($p->first_name); ?>" autocomplete="given-name" autofocus />
            </div>
            <div class="form-group col-md-4">
                <label>Middle Name</label>
                <input type="text" class="form-control" name="middle_name" value="<?= htmlentities((string) $p->middle_name); ?>" autocomplete="additional-name" />
            </div>
            <div class="form-group col-md-4">
                <label class="required">Last Name</label>
                <input required type="text" class="form-control" name="last_name" value="<?= htmlentities($p->last_name); ?>" autocomplete="family-name" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="required">Birthday</label>
                <input required type="date" id="datepicker" class="form-control" name="birthday"
                       value="<?= htmlentities((string) $p->birthday); ?>" max="<?= date('Y-m-d'); ?>" onchange="calculateAge()" />
            </div>
            <div class="form-group col-md-4">
                <label class="required">Age</label>
                <input required type="number" id="age" name="age" class="form-control" value="<?= htmlentities((string) $p->age); ?>" readonly tabindex="-1" />
            </div>
            <div class="form-group col-md-4">
                <label class="required">Gender</label>
                <div class="segmented">
                    <input type="radio" value="male" id="genderMale" name="gender" <?= strtolower((string) $p->gender) === 'male' ? 'checked' : ''; ?> required>
                    <label for="genderMale"><i class="ph ph-gender-male"></i>Male</label>
                    <input type="radio" value="female" id="genderFemale" name="gender" <?= strtolower((string) $p->gender) === 'female' ? 'checked' : ''; ?>>
                    <label for="genderFemale"><i class="ph ph-gender-female"></i>Female</label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="required">Civil Status</label>
                <select name="civil_status" class="form-control" required>
                    <option value="">Select Status</option>
                    <?php if($saved_civil !== '' && !in_array($saved_civil, $civil_options)): ?>
                        <option value="<?= htmlentities($saved_civil); ?>" selected><?= htmlentities($saved_civil); ?></option>
                    <?php endif; ?>
                    <?php foreach($civil_options as $opt): ?>
                        <option value="<?= $opt; ?>" <?= strcasecmp($saved_civil, $opt) === 0 ? 'selected' : ''; ?>><?= $opt; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Contact Number</label>
                <input type="tel" class="form-control" name="contact" value="<?= htmlentities((string) $p->contact); ?>" placeholder="09XX XXX XXXX" inputmode="tel" autocomplete="tel" />
            </div>
            <div class="form-group col-md-4">
                <label class="required">Email Address</label>
                <input required type="email" class="form-control" name="email" value="<?= htmlentities((string) $p->email); ?>" placeholder="name@example.com" autocomplete="email" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="required">Occupation</label>
                <input required type="text" class="form-control" name="occupation" value="<?= htmlentities((string) $p->occupation); ?>" placeholder="e.g. Teacher" />
            </div>
            <div class="form-group col-md-8">
                <label>Company / Employer</label>
                <input type="text" class="form-control" name="company" value="<?= htmlentities((string) $p->company); ?>" placeholder="Optional" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label class="portal-toggle" for="portalAccess">
                    <span class="portal-icon"><i class="ph ph-shield-check"></i></span>
                    <span class="portal-text">
                        <span class="portal-title">Patient Portal Access</span>
                        <span class="portal-desc">When enabled, the patient can view their records online with their portal credentials.</span>
                    </span>
                    <input type="hidden" name="portal_access" id="portalAccessValue" value="<?= (int) $p->portal_access === 1 ? 1 : 0; ?>">
                    <span class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="portalAccess" <?= (int) $p->portal_access === 1 ? 'checked' : ''; ?> onchange="document.getElementById('portalAccessValue').value = this.checked ? 1 : 0">
                        <span class="custom-control-label"></span>
                    </span>
                </label>
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
                    <?php if($saved_province !== '' && !$province_known): ?>
                        <option value="<?= htmlentities($saved_province); ?>" selected><?= htmlentities($saved_province); ?></option>
                    <?php endif; ?>
                    <?php if(!empty($provinces)): ?>
                        <?php foreach($provinces as $province): ?>
                            <option value="<?= htmlentities($province->province); ?>" <?= strcasecmp($province->province, $saved_province) === 0 ? 'selected' : ''; ?>><?= htmlentities($province->province); ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="required">City/Municipality</label>
                <select required id="city_select" name="city_mun" class="form-control">
                    <option value="">Select City/Municipality</option>
                    <?php if($saved_city !== ''): ?>
                        <option value="<?= htmlentities($saved_city); ?>" selected><?= htmlentities($saved_city); ?></option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="required">Barangay</label>
                <select required id="barangay_select" name="barangay" class="form-control">
                    <option value="">Select Barangay</option>
                    <?php if($saved_barangay !== ''): ?>
                        <option value="<?= htmlentities($saved_barangay); ?>" selected><?= htmlentities($saved_barangay); ?></option>
                    <?php endif; ?>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label class="required">Sitio</label>
                <input required type="text" class="form-control" name="sitio" value="<?= htmlentities((string) $p->sitio); ?>" placeholder="Street, purok, or sitio" />
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
                <a href="<?= base_url(); ?>Pages/patient_profile/<?= (int) $p->id; ?>" class="btn-cancel"><i class="ph ph-x"></i>Cancel</a>
                <button type="submit" name="submit" class="btn-submit"><i class="ph ph-floppy-disk"></i>Save Changes</button>
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
    var savedCity     = <?= json_encode($saved_city); ?>;
    var savedBarangay = <?= json_encode($saved_barangay); ?>;

    function ensureOption($select, value) {
        if (!value) return;
        var exists = false;
        $select.find('option').each(function () {
            if ($(this).val().toLowerCase() === value.toLowerCase()) { exists = true; return false; }
        });
        if (!exists) {
            $('<option>', { value: value, text: value }).appendTo($select);
        }
    }

    function loadCities(province, preselect) {
        var citySelect = $('#city_select');
        var barangaySelect = $('#barangay_select');

        if (!preselect) {
            citySelect.prop('disabled', true).html('<option value="">Select City/Municipality</option>');
            barangaySelect.prop('disabled', true).html('<option value="">Select Barangay</option>');
        }
        if (!province) return;

        $.ajax({
            url: '<?= base_url(); ?>Pages/get_cities',
            type: 'GET',
            data: { province: province },
            dataType: 'json',
            success: function(data) {
                if (!preselect) {
                    citySelect.prop('disabled', false);
                }
                $.each(data, function(index, city) {
                    ensureOption(citySelect, city.city_mun);
                });
                if (preselect && savedCity) {
                    citySelect.val(savedCity);
                    loadBarangays(province, savedCity, true);
                }
            }
        });
    }

    function loadBarangays(province, cityMun, preselect) {
        var barangaySelect = $('#barangay_select');
        if (!preselect) {
            barangaySelect.prop('disabled', true).html('<option value="">Select Barangay</option>');
        }
        if (!province || !cityMun) return;

        $.ajax({
            url: '<?= base_url(); ?>Pages/get_barangays',
            type: 'GET',
            data: { province: province, city_mun: cityMun },
            dataType: 'json',
            success: function(data) {
                barangaySelect.prop('disabled', false);
                $.each(data, function(index, barangay) {
                    ensureOption(barangaySelect, barangay.barangay);
                });
                if (preselect && savedBarangay) {
                    barangaySelect.val(savedBarangay);
                }
            }
        });
    }

    $('#province_select').on('change', function() {
        loadCities($(this).val(), false);
    });

    $('#city_select').on('change', function() {
        loadBarangays($('#province_select').val(), $(this).val(), false);
    });

    // Pre-fill city/barangay options for the patient's saved address on load
    var savedProvince = $('#province_select').val();
    if (savedProvince) {
        loadCities(savedProvince, true);
    }
});
</script>

</div>
