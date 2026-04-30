<?php 
    $p = $this->Page_model->one_cond_get_single_row('patients','id',$a->patient_id);
?>
<style>
.diagnose-wrapper { padding-top: 20px; }
.form-hero {
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    border-radius: 12px;
    padding: 25px 30px;
    color: white;
    margin-bottom: 25px;
    box-shadow: 0 10px 30px rgba(30, 136, 229, 0.3);
}
.form-hero h2 { color: white; font-weight: 600; margin-bottom: 5px; font-size: 24px; }
.form-hero p { color: rgba(255,255,255,0.9); margin-bottom: 0; }
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
.table-modern { margin-bottom: 0; }
.table-modern thead {
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
}
.table-modern thead th {
    border: none;
    font-weight: 600;
    color: #1565c0;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 10px 8px;
    white-space: nowrap;
}
.table-modern tbody td {
    border-color: #f1f3f4;
    padding: 10px 8px;
    vertical-align: middle;
    font-size: 12px;
}
.table-modern tbody tr:hover { background: #f8fbff; }
.vitals-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    margin-bottom: 25px;
}
.vitals-card .card-header {
    background: white;
    border-bottom: 2px solid #e3f2fd;
    padding: 20px 25px;
    border-radius: 12px 12px 0 0;
}
.vitals-card .card-header h5 {
    margin: 0;
    font-weight: 600;
    color: #1565c0;
    font-size: 16px;
}
.vital-item {
    background: #f8fbff;
    border-radius: 8px;
    padding: 12px 15px;
    margin-bottom: 8px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.vital-label { font-size: 12px; color: #757575; text-transform: uppercase; letter-spacing: 0.5px; }
.vital-value { font-weight: 600; color: #1565c0; font-size: 14px; }
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
.form-card .card-header h5 { margin: 0; font-weight: 600; color: #1565c0; font-size: 16px; }
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
.btn-action {
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    transition: all 0.3s ease;
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
.section-icon i { color: #1565c0; font-size: 20px; }
</style>

<div class="diagnose-wrapper">

<!-- Patient Header -->
<div class="row">
    <div class="col-12">
        <div class="form-hero">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2><i class="mdi mdi-stethoscope mr-2"></i><?= $title; ?></h2>
                    <p><?= strtoupper($p->first_name.' '.$p->middle_name.' '.$p->last_name); ?> - <?= $p->occupation; ?></p>
                </div>
                <div class="col-md-4 text-md-right">
                    <a href="<?= base_url(); ?>Pages/patient_queue" class="btn btn-light">
                        <i class="mdi mdi-arrow-left mr-1"></i>Back to Queue
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Diagnosis History -->
<div class="row">
    <div class="col-12">
        <div class="card table-card">
            <div class="card-header">
                <h5><span class="section-icon"><i class="mdi mdi-history"></i></span>Diagnosis History</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-modern">
                        <thead>
                            <tr>
                                <th>Diagnosed By</th>
                                <th>DOA</th>
                                <th>Age</th>
                                <th>EDD</th>
                                <th>LMP</th>
                                <th>BP</th>
                                <th>WT</th>
                                <th>G</th>
                                <th>P</th>
                                <th>T</th>
                                <th>P</th>
                                <th>A</th>
                                <th>L</th>
                                <th>Transaction</th>
                                <th>Lab</th>
                                <th>Diagnosis</th>
                                <th>Treatment</th>
                                <th>Remarks</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $data = $this->Page_model->one_cond_loop('diagnose','patient_id',$a->patient_id);
                            if(count($data) > 0):
                                foreach($data as $row){
                                    $app = $this->Page_model->one_cond_get_single_row('appointment','id',$row->appointment_id);
                                    $user = $this->Page_model->one_cond_get_single_row('users','id',$row->user_id);
                            ?>
                                <tr>
                                    <td><strong><?php if(isset($user->id)){echo htmlentities($user->last_name.', '.$user->first_name.' '.substr($user->middle_name, 0, 1).'.');} ?></strong></td>
                                    <td><?= strtoupper($app->visit_date); ?></td>
                                    <td><?= strtoupper($app->age); ?></td>
                                    <td><?= strtoupper($app->date_of_delivery); ?></td>
                                    <td><?= strtoupper($app->lmp); ?></td>
                                    <td><?= strtoupper($app->bp); ?></td>
                                    <td><?= strtoupper($app->weight); ?></td>
                                    <td><?= strtoupper($app->gravida); ?></td>
                                    <td><?= strtoupper($app->parity); ?></td>
                                    <td><?= strtoupper($app->term); ?></td>
                                    <td><?= strtoupper($app->preterm); ?></td>
                                    <td><?= strtoupper($app->abortion); ?></td>
                                    <td><?= strtoupper($app->living); ?></td>
                                    <td><?= strtoupper($app->transaction); ?></td>
                                    <td><span style="color: #1565c0; font-weight: 500;"><?= strtoupper($row->lab); ?></span></td>
                                    <td><span style="color: #1565c0; font-weight: 500;"><?= strtoupper($row->diagnosis); ?></span></td>
                                    <td><span style="color: #43a047; font-weight: 500;"><?= strtoupper($row->treatment); ?></span></td>
                                    <td><?= strtoupper($row->remarks); ?></td>
                                    <td>
                                        <a href="<?=base_url(); ?>Pages/diagnose_edit/<?= $row->id; ?>" class="btn btn-success btn-action">
                                            <i class="mdi mdi-pencil mr-1"></i>Edit
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                            else:
                            ?>
                                <tr>
                                    <td colspan="19" class="text-center text-muted py-4">
                                        <i class="mdi mdi-clipboard-text-outline" style="font-size: 24px; color: #bdbdbd;"></i>
                                        <p class="mt-2 mb-0">No previous diagnosis records found.</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Patient Vitals -->
<div class="row">
    <div class="col-md-4">
        <div class="card vitals-card">
            <div class="card-header">
                <h5><span class="section-icon"><i class="mdi mdi-heart-pulse"></i></span>Patient Vitals</h5>
            </div>
            <div class="card-body">
                <div class="vital-item">
                    <span class="vital-label">Age</span>
                    <span class="vital-value"><?= $a->age; ?> Years</span>
                </div>
                <div class="vital-item">
                    <span class="vital-label">Blood Pressure</span>
                    <span class="vital-value"><?= $a->bp; ?></span>
                </div>
                <div class="vital-item">
                    <span class="vital-label">Weight</span>
                    <span class="vital-value"><?= $a->weight; ?></span>
                </div>
                <div class="vital-item">
                    <span class="vital-label">LMP</span>
                    <span class="vital-value"><?= $a->lmp ?: 'N/A'; ?></span>
                </div>
                <div class="vital-item">
                    <span class="vital-label">EDD</span>
                    <span class="vital-value"><?= $a->date_of_delivery ?: 'N/A'; ?></span>
                </div>
                <?php if($a->gravida || $a->parity): ?>
                <div class="vital-item">
                    <span class="vital-label">G / P</span>
                    <span class="vital-value"><?= $a->gravida; ?> / <?= $a->parity; ?></span>
                </div>
                <div class="vital-item">
                    <span class="vital-label">T / P / A / L</span>
                    <span class="vital-value"><?= $a->term; ?> / <?= $a->preterm; ?> / <?= $a->abortion; ?> / <?= $a->living; ?></span>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Diagnosis Form -->
    <div class="col-md-8">
        <div class="card form-card">
            <div class="card-header">
                <h5><span class="section-icon"><i class="mdi mdi-file-document-edit"></i></span>New Diagnosis Entry</h5>
            </div>
            <div class="card-body">
                <?php 
                    $attributes = array('class' => 'parsley-examples');
                    echo form_open('Pages/diagnose_add/', $attributes);
                ?>
                <input type="hidden" name="patient_id" value="<?= $p->id; ?>"/>
                <input type="hidden" name="appointment_id" value="<?= $a->id; ?>"/>
                <input type="hidden" name="user_id" value="<?= $this->session->id; ?>"/>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Patient Name</label>
                        <input type="text" readonly value="<?= strtoupper($p->first_name.' '.$p->middle_name.' '.$p->last_name); ?>" class="form-control" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Transaction Notes</label>
                        <input type="text" readonly value="<?= $a->transaction; ?>" class="form-control" />
                    </div>
                </div>

                <?php if(isset($specialties) && count($specialties) > 0): ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Medical Specialty</label>
                        <select name="specialty_id" class="form-control">
                            <option value="">-- No Specialty --</option>
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
                        </select>
                    </div>
                </div>
                <?php endif; ?>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Laboratory Results</label>
                        <textarea class="form-control" rows="5" name="lab" placeholder="Enter laboratory findings..."></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Diagnosis</label>
                        <textarea class="form-control" rows="5" name="diagnosis" placeholder="Enter diagnosis..."></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Treatment Plan</label>
                        <textarea class="form-control" rows="5" name="treatment" placeholder="Enter treatment plan..."></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Remarks</label>
                        <textarea class="form-control" rows="5" name="remarks" placeholder="Enter additional remarks..."></textarea>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" name="submit" class="btn-submit">
                        <i class="mdi mdi-content-save mr-1"></i>Save Diagnosis
                    </button>
                    <a href="<?= base_url(); ?>Pages/patient_queue" class="btn" style="background: #f5f5f5; border: 1px solid #e0e0e0; color: #616161; padding: 14px 30px; border-radius: 8px; font-weight: 500; font-size: 15px; margin-left: 10px;">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>