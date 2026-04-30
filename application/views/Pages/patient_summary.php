<style>
.patient-summary-wrapper {
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
.filter-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    margin-bottom: 25px;
}
.filter-card .card-header {
    background: white;
    border-bottom: 2px solid #e3f2fd;
    padding: 20px 25px;
    border-radius: 12px 12px 0 0;
}
.filter-card .card-header h5 {
    margin: 0;
    font-weight: 600;
    color: #1565c0;
    font-size: 16px;
}
.filter-card .card-body {
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
    padding: 12px 30px;
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
.no-data {
    text-align: center;
    padding: 40px;
    color: #757575;
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

<div class="patient-summary-wrapper">

<!-- Page Header -->
<div class="row">
    <div class="col-12">
        <div class="form-hero">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2><i class="mdi mdi-account-group mr-2"></i>Patient Summary</h2>
                    <p>Generate patient visit reports by date range</p>
                </div>
                <div class="col-md-4 text-md-right">
                    <a href="<?= base_url(); ?>Pages/dashboard" class="btn btn-light">
                        <i class="mdi mdi-arrow-left mr-1"></i>Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Date Filter -->
<div class="row">
    <div class="col-12">
        <div class="card filter-card">
            <div class="card-header">
                <h5><span class="section-icon"><i class="mdi mdi-filter-variant"></i></span>Filter by Date Range</h5>
            </div>
            <div class="card-body">
                <?php 
                    $attributes = array('class' => 'parsley-examples');
                    echo form_open('Pages/patient_summary/', $attributes);
                ?>
                <div class="form-row align-items-end">
                    <div class="form-group col-md-4">
                        <label>Date From</label>
                        <input required type="date" value="" class="form-control" name="df" />
                    </div>
                    <div class="form-group col-md-4">
                        <label>Date To</label>
                        <input required type="date" value="" class="form-control" name="dt" />
                    </div>
                    <div class="form-group col-md-4">
                        <button type="submit" name="submit" class="btn-submit w-100">
                            <i class="mdi mdi-magnify mr-1"></i>Generate Report
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Report Results -->
<div class="row">
    <div class="col-12">
        <div class="card table-card">
            <div class="card-header">
                <h5><span class="section-icon"><i class="mdi mdi-file-document-outline"></i></span>Patient Report</h5>
            </div>
            <div class="card-body">
                <?php if(!isset($_POST['submit'])): ?>

                    <div class="no-data">
                        <i class="mdi mdi-calendar-search mdi-48px mb-3 d-block"></i>
                        <p>Select a date range and click Generate Report to view patient visits</p>
                    </div>

                <?php else: ?>

                    <div class="alert alert-info mb-4" style="background: rgba(30, 136, 229, 0.1); border: none; color: #1565c0; border-radius: 8px;">
                        <i class="mdi mdi-calendar-range mr-2"></i>
                        Report period: <strong><?= isset($df) ? date('F d, Y', strtotime($df)) : ''; ?></strong> to <strong><?= isset($dt) ? date('F d, Y', strtotime($dt)) : ''; ?></strong>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-modern">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Address</th>
                                    <th>Visit Date</th>
                                    <th>Referred By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($data) && count($data) > 0): ?>
                                    <?php foreach($data as $row): 
                                        $p = $this->Page_model->one_cond_get_single_row('patients','id',$row->patient_id); 
                                    ?>
                                    <tr>
                                        <td>
                                            <strong><?= strtoupper($p->first_name.' '.$p->middle_name.' '.$p->last_name); ?></strong>
                                        </td>
                                        <td><?= strtoupper($p->sitio.' '.$p->barangay.' '.$p->city_mun.' '.$p->province); ?></td>
                                        <td><?= date('M d, Y', strtotime($row->visit_date)); ?></td>
                                        <td>
                                            <?php 
                                                if(!empty($row->referral_id)){
                                                    $ref = $this->Page_model->one_cond_get_single_row('referrals','id',$row->referral_id);
                                                    echo $ref ? strtoupper($ref->name) : '-';
                                                } else {
                                                    echo '-';
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="no-data" style="border: none;">
                                            <i class="mdi mdi-account-off mdi-48px mb-3 d-block"></i>
                                            <p>No patient visits found for the selected date range</p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

</div>
