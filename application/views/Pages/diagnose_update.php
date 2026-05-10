<?php
    // Variables $d, $p, $a are passed from controller
    // $d = diagnosis record, $p = patient, $a = appointment
    if(empty($d)){
        echo '<div class="alert alert-danger">Diagnosis record not found.</div>';
        return;
    }
?>

<style>
.diagnose-wrapper {
    padding-top: 20px;
}
.diagnose-hero {
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    border-radius: 12px;
    padding: 25px 30px;
    color: white;
    margin-bottom: 25px;
    box-shadow: 0 10px 30px rgba(30, 136, 229, 0.3);
}
.diagnose-hero h2 {
    color: white;
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 24px;
}
.diagnose-hero p {
    color: rgba(255,255,255,0.9);
    margin-bottom: 0;
}
.btn-back {
    background: rgba(255,255,255,0.2);
    border: 1px solid rgba(255,255,255,0.3);
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.btn-back:hover {
    background: rgba(255,255,255,0.3);
    color: white;
}
.patient-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    margin-bottom: 25px;
}
.patient-card .card-header {
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
    padding: 20px 25px;
    border-radius: 12px 12px 0 0;
    border-bottom: none;
}
.patient-card .card-header h5 {
    margin: 0;
    font-weight: 600;
    color: #1565c0;
}
.patient-card .card-body {
    padding: 25px;
}
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}
.info-item {
    background: #f8fbff;
    padding: 15px;
    border-radius: 8px;
    border-left: 3px solid #1e88e5;
}
.info-label {
    font-size: 12px;
    color: #757575;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 5px;
}
.info-value {
    font-weight: 600;
    color: #212121;
    font-size: 15px;
}
.history-table {
    margin-bottom: 0;
}
.history-table thead {
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
}
.history-table thead th {
    border: none;
    font-weight: 600;
    color: #1565c0;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 10px 8px;
    white-space: nowrap;
}
.history-table tbody td {
    padding: 12px 8px;
    border-color: #f5f5f5;
    vertical-align: middle;
    font-size: 12px;
}
.history-table tbody tr:hover {
    background-color: #f8fbff;
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
textarea.form-control {
    resize: vertical;
    min-height: 120px;
}
.btn-update-diagnosis {
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
.btn-update-diagnosis:hover {
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
.btn-print-prescription {
    background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%);
    border: none;
    color: white;
    padding: 14px 30px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-left: 10px;
}
.btn-print-prescription:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(67, 160, 71, 0.4);
    color: white;
}

/* Printable Prescription Styles */
.prescription-printable {
    display: none;
    font-family: 'Times New Roman', serif;
}
@media print {
    body * {
        visibility: hidden;
    }
    .prescription-printable,
    .prescription-printable * {
        visibility: visible;
    }
    .prescription-printable {
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        padding: 20mm;
        background: white;
    }
    .no-print {
        display: none !important;
    }
}
.prescription-header {
    text-align: center;
    border-bottom: 2px solid #1565c0;
    padding-bottom: 15px;
    margin-bottom: 30px;
}
.prescription-header h2 {
    color: #1565c0;
    font-size: 24px;
    margin: 0;
    font-weight: bold;
}
.prescription-header p {
    color: #424242;
    margin: 5px 0;
    font-size: 14px;
}
.prescription-body {
    margin: 30px 0;
}
.prescription-row {
    margin-bottom: 20px;
}
.prescription-label {
    font-weight: bold;
    color: #1565c0;
    font-size: 14px;
    margin-bottom: 5px;
}
.prescription-value {
    font-size: 16px;
    color: #212121;
    border-bottom: 1px solid #e0e0e0;
    padding: 8px 0;
    min-height: 30px;
}
.prescription-value.treatment {
    min-height: 100px;
    white-space: pre-wrap;
}
.prescription-footer {
    margin-top: 50px;
    text-align: right;
}
.prescription-signature {
    border-top: 1px solid #424242;
    width: 250px;
    display: inline-block;
    padding-top: 10px;
    text-align: center;
}
</style>

<div class="diagnose-wrapper">

<!-- Hero Header -->
<div class="diagnose-hero">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h2><i class="ph ph-note-pencil mr-2"></i>Edit Diagnosis</h2>
            <p><?= mb_strtoupper($p->first_name.' '.$p->middle_name.' '.$p->last_name, 'UTF-8'); ?></p>
        </div>
        <div class="col-md-4 text-md-right">
            <a href="<?= base_url(); ?>Pages/patient_profile/<?= $p->id; ?>" class="btn btn-back">
                <i class="ph ph-arrow-left"></i>Back to Profile
            </a>
        </div>
    </div>
</div>

<!-- Patient Info Card -->
<div class="card patient-card">
    <div class="card-header">
        <h5><i class="ph ph-user mr-2"></i>Patient Information</h5>
    </div>
    <div class="card-body">
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Patient Name</div>
                <div class="info-value"><?= mb_strtoupper($p->last_name.', '.$p->first_name.' '.$p->middle_name, 'UTF-8'); ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Address</div>
                <div class="info-value"><?= strtoupper($p->sitio.' '.$p->barangay.' '.$p->city_mun.' '.$p->province); ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Occupation</div>
                <div class="info-value"><?= strtoupper($p->occupation); ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Transaction Type</div>
                <div class="info-value"><?= strtoupper($a->transaction); ?></div>
            </div>
        </div>
    </div>
</div>

<!-- Appointment History -->
<div class="card patient-card">
    <div class="card-header">
        <h5><i class="ph ph-files mr-2"></i>Appointment History</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table history-table">
                <thead>
                    <tr>
                        <th>DOA</th>
                        <th>AGE</th>
                        <th>EDD</th>
                        <th>LMP</th>
                        <th>BP</th>
                        <th>WT</th>
                        <th>G</th>
                        <th>A</th>
                        <th>P</th>
                        <th>L</th>
                        <th>TRANSACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row){?>
                    <tr>
                        <td><?= strtoupper($row->visit_date); ?></td>
                        <td><?= strtoupper($row->age); ?></td>
                        <td><?= strtoupper($row->date_of_delivery); ?></td>
                        <td><?= strtoupper($row->lmp); ?></td>
                        <td><?= strtoupper($row->bp); ?></td>
                        <td><?= strtoupper($row->weight); ?></td>
                        <td><?= strtoupper($row->gravida); ?></td>
                        <td><?= strtoupper($row->abortion); ?></td>
                        <td><?= strtoupper($row->parity); ?></td>
                        <td><?= strtoupper($row->living); ?></td>
                        <td><?= strtoupper($row->transaction); ?></td>
                    </tr>
                    <?php } ?>
                    <?php if(empty($data)): ?>
                    <tr>
                        <td colspan="11" class="text-center py-5">
                            <i class="ph ph-calendar-dots text-muted mb-3 d-block" style="font-size: 48px;"></i>
                            <p class="text-muted">No appointment history found</p>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Diagnosis Form -->
<div class="card form-card">
    <div class="card-header">
        <h5><i class="ph ph-stethoscope mr-2"></i><?= $title; ?></h5>
    </div>
    <div class="card-body">
        <?php 
            $attributes = array('class' => 'parsley-examples');
            echo form_open(base_url().'Pages/diagnose_edit/', $attributes);
        ?>
        <input type="hidden" name="patient_id" value="<?= $p->id; ?>"/>
        <input type="hidden" name="appointment_id" value="<?= $a->id; ?>"/>
        <input type="hidden" name="user_id" value="<?= $this->session->id; ?>"/>
        <input type="hidden" name="d_id" value="<?= $this->uri->segment(3); ?>"/>

        <div class="form-row">
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
                            <option value="<?= $specialty->id; ?>" <?= isset($d->specialty_id) && $d->specialty_id == $specialty->id ? 'selected' : ''; ?>><?= $specialty->name; ?></option>
                        <?php endforeach; ?>
                        <?php if($current_category != '') echo "</optgroup>"; ?>
                    <?php endif; ?>
                </select>
                <small class="form-text text-muted">Select medical specialty if applicable</small>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Fullname</label>
                <input type="text" readonly value="<?= strtoupper($p->first_name.' '.$p->middle_name.' '.$p->last_name); ?>" required class="form-control" name="first_name" />
            </div>

            <div class="form-group col-md-6">
                <label>Transaction</label>
                <input required type="text" value="<?= $a->transaction; ?>" class="form-control" name="trasaction" readonly />
            </div>
        </div> 

        <div class="form-row">
            <div class="form-group col-md-6"> 
                <label>Laboratory</label>
                <textarea class="form-control" rows="5" placeholder="Enter laboratory results..." name="lab"><?= $d->lab; ?></textarea>  
            </div>
            <div class="form-group col-md-6"> 
                <label>Diagnosis</label>
                <textarea class="form-control" rows="5" placeholder="Enter diagnosis..." name="diagnosis"><?= $d->diagnosis; ?></textarea>
            </div>
        </div> 

        <div class="form-row">
            <div class="form-group col-md-6"> 
                <label>Treatment</label>
                <textarea class="form-control" rows="5" placeholder="Enter treatment plan..." name="treatment"><?= $d->treatment; ?></textarea>
            </div>
            <div class="form-group col-md-6"> 
                <label>Remarks</label>
                <textarea class="form-control" rows="5" placeholder="Enter additional remarks..." name="remarks"><?= $d->remarks; ?></textarea>
            </div>
        </div> 

        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <a href="<?= base_url(); ?>Pages/patient_profile/<?= $p->id; ?>" class="btn btn-cancel-edit mr-2"><i class="ph ph-x"></i>Cancel</a>
                <button type="submit" name="submit" class="btn btn-update-diagnosis">
                    <i class="ph ph-floppy-disk"></i>Update Diagnosis
                </button>
                <button type="button" class="btn btn-print-prescription" onclick="printPrescription()">
                    <i class="ph ph-printer"></i>Print Prescription
                </button>
            </div>
        </div>
        </form>
    </div>
</div>

<!-- Printable Prescription Template -->
<div class="prescription-printable" id="prescription-print">
    <div class="prescription-header">
        <h2>CLINIC MANAGEMENT SYSTEM</h2>
        <p>Medical Prescription</p>
        <p style="font-size: 12px; color: #757575;">Date: <?= date('F d, Y'); ?></p>
    </div>
    
    <div class="prescription-body">
        <div class="prescription-row">
            <div class="prescription-label">Patient Name:</div>
            <div class="prescription-value"><?= mb_strtoupper($p->last_name.', '.$p->first_name.' '.$p->middle_name, 'UTF-8'); ?></div>
        </div>
        
        <div class="prescription-row">
            <div class="prescription-label">Address:</div>
            <div class="prescription-value"><?= strtoupper($p->sitio.' '.$p->barangay.' '.$p->city_mun.' '.$p->province); ?></div>
        </div>
        
        <div class="prescription-row">
            <div class="prescription-label">Age:</div>
            <div class="prescription-value"><?= $a->age; ?> years old</div>
        </div>
        
        <div class="prescription-row">
            <div class="prescription-label">Diagnosis:</div>
            <div class="prescription-value"><?= nl2br(htmlspecialchars($d->diagnosis)); ?></div>
        </div>
        
        <div class="prescription-row">
            <div class="prescription-label">Treatment / Medications:</div>
            <div class="prescription-value treatment"><?= nl2br(htmlspecialchars($d->treatment)); ?></div>
        </div>
        
        <div class="prescription-row">
            <div class="prescription-label">Remarks:</div>
            <div class="prescription-value"><?= nl2br(htmlspecialchars($d->remarks)); ?></div>
        </div>
    </div>
    
    <div class="prescription-footer">
        <div class="prescription-signature">
            <?php 
            $doctor = $this->Page_model->one_cond_get_single_row('users','id',$d->user_id);
            if(isset($doctor->id)):
            ?>
            <div style="font-weight: bold; font-size: 16px;"><?= $doctor->first_name.' '.$doctor->middle_name.' '.$doctor->last_name; ?></div>
            <div style="font-size: 12px; color: #757575;">Attending Physician</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
function printPrescription() {
    window.print();
}
</script>

</div>
