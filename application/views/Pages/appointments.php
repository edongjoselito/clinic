<style>
.appointment-wrapper {
    padding-top: 20px;
}
</style>

<div class="appointment-wrapper">

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

<!-- Hero Header -->
<div class="profile-hero" style="background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%); border-radius: 12px; padding: 25px 30px; color: white; margin-bottom: 25px; box-shadow: 0 10px 30px rgba(30, 136, 229, 0.3);">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h2 style="color: white; font-weight: 600; margin-bottom: 5px; font-size: 24px;"><i class="ph ph-calendar-plus mr-2"></i>New Appointment</h2>
            <p style="color: rgba(255,255,255,0.9); margin-bottom: 0;">Create a new appointment for the patient</p>
        </div>
        <div class="col-md-4 text-md-right">
            <a href="<?= base_url(); ?>Pages/patient_list" class="btn btn-light">
                <i class="ph ph-arrow-left"></i>Back to Patients
            </a>
        </div>
    </div>
</div>

<?php
$diag = $this->Page_model->one_cond_loop('diagnose','patient_id',$data->id);
$hasPregnancyData = false;
foreach($diag as $row){
    $app = $this->Page_model->one_cond_get_single_row('appointment','id',$row->appointment_id);
    if(!empty($app->lmp) || !empty($app->date_of_delivery) || !empty($app->gravida) || !empty($app->parity)){
        $hasPregnancyData = true;
        break;
    }
}

ob_start();
?>

<!-- Medical History -->
<div class="card" style="border: none; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); margin-bottom: 25px;">
    <div class="card-header" style="background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%); padding: 20px 25px; border-radius: 12px 12px 0 0; border-bottom: none;">
        <h5 style="margin: 0; font-weight: 600; color: #1565c0;"><i class="ph ph-files mr-2"></i>Medical History</h5>
    </div>
    <div class="card-body" style="padding: 0;">
        <div class="table-responsive">
            <table class="table" style="margin-bottom: 0;">
                <thead style="background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);">
                    <tr>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">Diagnosed By</th>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">DOA</th>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">AGE</th>
                        <?php if($hasPregnancyData): ?>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">EDD</th>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">LMP</th>
                        <?php endif; ?>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">BP</th>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">WT</th>
                        <?php if($hasPregnancyData): ?>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">G</th>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">P</th>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">T</th>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">P</th>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">A</th>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">L</th>
                        <?php endif; ?>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">Type</th>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">Lab</th>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">Diagnosis</th>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">Treatment</th>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">Remarks</th>
                        <th style="border: none; font-weight: 600; color: #1565c0; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 8px; white-space: nowrap;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach($diag as $row){
                    $app = $this->Page_model->one_cond_get_single_row('appointment','id',$row->appointment_id);
                    $user = $this->Page_model->one_cond_get_single_row('users','id',$row->user_id);
                ?>
                    <tr>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><?php if(isset($user->id)){echo htmlentities($user->last_name.', '.$user->first_name.' '.substr($user->middle_name, 0, 1).'.');} ?></td>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><?= strtoupper($app->visit_date); ?></td>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><?= strtoupper($app->age); ?></td>
                        <?php if($hasPregnancyData): ?>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><?= strtoupper($app->date_of_delivery); ?></td>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><?= strtoupper($app->lmp); ?></td>
                        <?php endif; ?>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><?= strtoupper($app->bp); ?></td>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><?= strtoupper($app->weight); ?></td>
                        <?php if($hasPregnancyData): ?>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><?= strtoupper($app->gravida); ?></td>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><?= strtoupper($app->parity); ?></td>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><?= strtoupper($app->term); ?></td>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><?= strtoupper($app->preterm); ?></td>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><?= strtoupper($app->abortion); ?></td>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><?= strtoupper($app->living); ?></td>
                        <?php endif; ?>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><?= strtoupper($app->transaction); ?></td>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><span style="color: #1565c0; font-weight: 500;"><?= strtoupper($row->lab); ?></span></td>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><span style="color: #1565c0; font-weight: 500;"><?= strtoupper($row->diagnosis); ?></span></td>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><span style="color: #43a047; font-weight: 500;"><?= strtoupper($row->treatment); ?></span></td>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><?= strtoupper($row->remarks); ?></td>
                        <td style="padding: 12px 8px; border-color: #f5f5f5; vertical-align: middle; font-size: 12px;"><a href="<?= base_url(); ?>pages/appointment_edit/<?= $data->id; ?>/<?= $app->id; ?>" class="btn" style="background: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%); border: none; color: white; padding: 6px 15px; border-radius: 6px; font-size: 12px; font-weight: 500;"><i class="ph ph-pencil-simple"></i>Edit</a></td>
                    </tr>
                <?php } ?>    
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $medical_history_html = ob_get_clean(); ?>

<!-- Appointment Form -->
<div class="card" style="border: none; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); margin-bottom: 25px;">
    <div class="card-header" style="background: white; border-bottom: 2px solid #e3f2fd; padding: 20px 25px; border-radius: 12px 12px 0 0;">
        <h5 style="margin: 0; font-weight: 600; color: #1565c0;"><i class="ph ph-calendar-plus mr-2"></i><?= $title; ?></h5>
    </div>
    <div class="card-body" style="padding: 25px;">
        <?= validation_errors(); ?>
        <?php 
            $attributes = array('class' => 'parsley-examples');
            echo form_open('Pages/app_add', $attributes);
        ?>
        <input type="hidden" name="p_id" value="<?= $data->id; ?>">
        <input type="hidden" name="age" value="<?= date_diff(date_create($data->birthday), date_create('today'))->y; ?>">

        <!-- Patient Info Read-only -->
        <div class="row" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-bottom: 25px;">
            <div style="background: #f8fbff; padding: 15px; border-radius: 8px; border-left: 3px solid #1e88e5;">
                <div style="font-size: 12px; color: #757575; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 5px;">Patient Name</div>
                <div style="font-weight: 600; color: #212121; font-size: 15px;"><?= strtoupper($data->first_name.' '.$data->middle_name.' '.$data->last_name); ?></div>
            </div>
            <div style="background: #f8fbff; padding: 15px; border-radius: 8px; border-left: 3px solid #1e88e5;">
                <div style="font-size: 12px; color: #757575; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 5px;">Birthday</div>
                <div style="font-weight: 600; color: #212121; font-size: 15px;"><?= strtoupper($data->birthday); ?></div>
            </div>
            <div style="background: #f8fbff; padding: 15px; border-radius: 8px; border-left: 3px solid #1e88e5;">
                <div style="font-size: 12px; color: #757575; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 5px;">Age</div>
                <div style="font-weight: 600; color: #212121; font-size: 15px;"><?= date_diff(date_create($data->birthday), date_create('today'))->y;?></div>
            </div>
            <div style="background: #f8fbff; padding: 15px; border-radius: 8px; border-left: 3px solid #1e88e5;">
                <div style="font-size: 12px; color: #757575; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 5px;">Address</div>
                <div style="font-weight: 600; color: #212121; font-size: 15px;"><?= strtoupper($data->sitio.' '.$data->barangay.' '.$data->city_mun.' '.$data->province); ?></div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label style="font-weight: 500; color: #424242; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Date of Appointment</label>
                <input type="date" required class="form-control" name="visit_date" value="<?= date('Y-m-d'); ?>" style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 12px 15px; font-size: 14px;" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label style="font-weight: 500; color: #424242; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Blood Pressure</label>
                <input type="text" required class="form-control" name="bp" value="" placeholder="Blood Pressure" style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 12px 15px; font-size: 14px;" />
            </div>
            <div class="form-group col-md-6">
                <label style="font-weight: 500; color: #424242; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Weight</label>
                <input type="text" required class="form-control" name="weight" value="" placeholder="Weight" style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 12px 15px; font-size: 14px;" />
            </div>
        </div>

        <!-- Pregnancy Details Toggle -->
        <div class="form-row mb-3">
            <div class="form-group col-md-12">
                <button type="button" class="btn btn-outline-primary" onclick="togglePregnancySection()" style="border-radius: 8px; padding: 10px 20px; font-weight: 500;">
                    <i class="ph ph-info mr-1"></i><span id="pregnancyToggleText">Show Pregnancy Details</span>
                </button>
            </div>
        </div>

        <!-- Pregnancy Section (Hidden by default) -->
        <div id="pregnancySection" style="display: none; background: #fafafa; padding: 20px; border-radius: 12px; margin-bottom: 20px;">
            <h6 style="color: #1565c0; font-weight: 600; margin-bottom: 15px;"><i class="ph ph-notepad mr-1"></i>Obstetric Information</h6>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label style="font-weight: 500; color: #424242; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">LMP (Last Menstrual Period)</label>
                    <input type='date' class='form-control' name='lmp' id='datepic1' style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 12px 15px; font-size: 14px; background-color: white;">
                </div> 
                <input id=cyVal type='hidden' value="28" class='easypositive' onkeyup='checnum(this)'>
                <div class="form-group col-md-6">
                    <label style="font-weight: 500; color: #424242; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">&nbsp;</label>
                    <div>
                        <input type=button class="btn btn-primary" value='Calculate EDD' onclick=calculate() style="background: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%); border: none; color: white; padding: 12px 25px; border-radius: 8px; font-weight: 500;">
                        <input class="btn btn-secondary" type=reset value=Reset style="background: #f5f5f5; border: 1px solid #e0e0e0; color: #616161; padding: 12px 25px; border-radius: 8px; font-weight: 500;">
                    </div>
                </div>
            </div>

            <input id=weekVal type='hidden' class='easypositive short2' readonly name="no_of_weeks" placeholder="No. of Weeks" />
            <input id=dayVal type='hidden' class='easypositive short2' readonly name="no_of_days" placeholder="No. of days" />

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label style="font-weight: 500; color: #424242; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Estimated Date of Delivery</label>
                    <input type="text" id=esDate name="date_of_delivery" class='form-control' readonly style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 12px 15px; font-size: 14px; background-color: #f5f5f5;" />
                </div>
                <div class="form-group col-md-1">
                    <label style="font-weight: 500; color: #424242; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Gravida</label>
                    <input type="text" name="gravida" class='form-control' style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 12px 15px; font-size: 14px;" />
                </div>
                <div class="form-group col-md-1">
                    <label style="font-weight: 500; color: #424242; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Parity</label>
                    <input type="text" name="parity" class='form-control' style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 12px 15px; font-size: 14px;" />
                </div>
                <div class="form-group col-md-1">
                    <label style="font-weight: 500; color: #424242; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Term</label>
                    <input type="text" name="term" class='form-control' style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 12px 15px; font-size: 14px;" />
                </div>
                <div class="form-group col-md-1">
                    <label style="font-weight: 500; color: #424242; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Preterm</label>
                    <input type="text" name="preterm" class='form-control' style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 12px 15px; font-size: 14px;" />
                </div>
                <div class="form-group col-md-1">
                    <label style="font-weight: 500; color: #424242; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Abortion</label>
                    <input type="text" name="abortion" class='form-control' style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 12px 15px; font-size: 14px;" />
                </div>
                <div class="form-group col-md-1">
                    <label style="font-weight: 500; color: #424242; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Living</label>
                    <input type="text" name="living" class='form-control' style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 12px 15px; font-size: 14px;" />
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label style="font-weight: 500; color: #424242; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Patient Status</label>
                <div class="mt-2">
                    <div class="custom-control custom-radio" style="display: inline-block; margin-right: 20px;">
                        <input type="radio" onclick="refer()" id="customRadio1" name="ref" value="0" checked class="custom-control-input"/>
                        <label class="custom-control-label" for="customRadio1">Walk In</label>
                    </div>
                    <div class="custom-control custom-radio" style="display: inline-block;">
                        <input type="radio" onclick="referral()" id="customRadio2" name="ref" value="1" class="custom-control-input" />
                        <label class="custom-control-label" for="customRadio2">Referral</label>
                    </div>
                </div>
                <select class="form-control" id="company" style="display:none; margin-top:10px; border: 1px solid #e0e0e0; border-radius: 8px; padding: 12px 15px; font-size: 14px;" type="text" name="ref_id">
                    <option value="">-- Select referral company --</option>
                    <?php foreach($patient as $row){ 
                        echo "<option value='";
                        echo $row->id;
                        echo "'>";
                        echo $row->company."</option>\n";
                    } ?> 
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label style="font-weight: 500; color: #424242; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Transaction Notes</label>
                <textarea class="form-control" rows="5" id="example-textarea" name="transaction" style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 12px 15px; font-size: 14px; resize: vertical;"></textarea>   
            </div>
        </div>  

        <div class="form-group mt-4">
            <button type="submit" name="submit" class="btn" style="background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%); border: none; color: white; padding: 14px 35px; border-radius: 8px; font-weight: 500; font-size: 15px; cursor: pointer; transition: all 0.3s ease;">
                <i class="ph ph-floppy-disk"></i>Create Appointment
            </button>
            <a href="<?= base_url(); ?>Pages/patient_list" class="btn" style="background: #f5f5f5; border: 1px solid #e0e0e0; color: #616161; padding: 14px 30px; border-radius: 8px; font-weight: 500; font-size: 15px; margin-left: 10px;"><i class="ph ph-x"></i>Cancel</a>
        </div>
        </form>
    </div>
</div>

<?= $medical_history_html; ?>

<script>
function togglePregnancySection() {
    var section = document.getElementById('pregnancySection');
    var text = document.getElementById('pregnancyToggleText');
    if (section.style.display === 'none') {
        section.style.display = 'block';
        text.textContent = 'Hide Pregnancy Details';
    } else {
        section.style.display = 'none';
        text.textContent = 'Show Pregnancy Details';
    }
}
</script>

</div>
