<style>
.pay-wrapper {
    padding-top: 20px;
}
.pay-hero {
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    border-radius: 12px;
    padding: 25px 30px;
    color: white;
    margin-bottom: 25px;
    box-shadow: 0 10px 30px rgba(30, 136, 229, 0.3);
}
.pay-hero h2 {
    color: white;
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 24px;
}
.pay-hero p {
    color: rgba(255,255,255,0.9);
    margin-bottom: 0;
}
.pay-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}
.pay-card .card-header {
    background: white;
    border-bottom: 2px solid #e3f2fd;
    padding: 20px 25px;
    border-radius: 12px 12px 0 0;
}
.pay-card .card-header h5 {
    margin: 0;
    font-weight: 600;
    color: #1565c0;
}
.pay-card .card-body {
    padding: 0;
}
.pay-table {
    margin-bottom: 0;
}
.pay-table thead {
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
}
.pay-table thead th {
    border: none;
    font-weight: 600;
    color: #1565c0;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 15px 20px;
}
.pay-table tbody td {
    padding: 18px 20px;
    border-color: #f5f5f5;
    vertical-align: middle;
}
.pay-table tbody tr:hover {
    background-color: #f8fbff;
}
.pay-patient-name {
    font-weight: 600;
    color: #212121;
    font-size: 15px;
}
.pay-patient-address {
    color: #616161;
    font-size: 13px;
}
.pay-diagnosis {
    color: #424242;
    font-size: 14px;
    max-width: 200px;
}
.pay-treatment {
    color: #1565c0;
    font-weight: 500;
    font-size: 14px;
    max-width: 200px;
}
.pay-remarks {
    color: #757575;
    font-size: 13px;
    font-style: italic;
}
.btn-pay {
    background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%);
    border: none;
    color: white;
    padding: 10px 25px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.btn-pay:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(67, 160, 71, 0.4);
    color: white;
}
.btn-pay i {
    margin-right: 6px;
}
.status-badge {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
}
.status-pending {
    background: rgba(255, 193, 7, 0.15);
    color: #f57c00;
}
.empty-state {
    text-align: center;
    padding: 60px 20px;
}
.empty-state i {
    font-size: 64px;
    color: #bbdefb;
    margin-bottom: 20px;
}
.empty-state p {
    color: #757575;
    font-size: 16px;
}
</style>

<div class="pay-wrapper">

<!-- Hero Header -->
<div class="pay-hero">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h2><i class="ph ph-cash-register mr-2"></i>Patient Billing</h2>
            <p>Process payments for patient treatments and services</p>
        </div>
        <div class="col-md-4 text-md-right">
            <span class="text-white-50"><?= date('l, F j, Y'); ?></span>
        </div>
    </div>
</div>

<!-- Flash Messages -->
<?php if($this->session->flashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('danger')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= $this->session->flashdata('danger'); ?>
    </div>
<?php endif; ?>

<!-- Billing Table -->
<div class="card pay-card">
    <div class="card-header">
        <h5><i class="ph ph-list-bullets mr-2"></i>Pending Payments</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table pay-table">
                <thead>
                    <tr>
                        <th><i class="ph ph-user mr-1"></i>Patient</th>
                        <th><i class="ph ph-map-pin mr-1"></i>Address</th>
                        <th><i class="ph ph-stethoscope mr-1"></i>Diagnosis</th>
                        <th><i class="ph ph-bag mr-1"></i>Treatment</th>
                        <th><i class="ph ph-chat-text mr-1"></i>Remarks</th>
                        <th><i class="ph ph-currency-circle-dollar mr-1"></i>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row){ 
                        $p = $this->Page_model->one_cond_get_single_row('patients','id',$row->patient_id);
                        $app = $this->Page_model->one_cond_get_single_row('appointment','id',$row->appointment_id);
                    ?>
                    <tr>
                        <td>
                            <div class="pay-patient-name">
                                <?= strtoupper($p->last_name.', '.$p->first_name.' '.$p->middle_name); ?>
                            </div>
                        </td>
                        <td>
                            <div class="pay-patient-address">
                                <i class="ph ph-map-pin text-muted mr-1"></i>
                                <?= strtoupper($p->sitio.', '.$p->barangay.', '.$p->city_mun.', '.$p->province); ?>
                            </div>
                        </td>
                        <td>
                            <div class="pay-diagnosis">
                                <?= $row->diagnosis ? $row->diagnosis : '<span class="text-muted">-</span>'; ?>
                            </div>
                        </td>
                        <td>
                            <div class="pay-treatment">
                                <?= $row->treatment ? $row->treatment : '<span class="text-muted">-</span>'; ?>
                            </div>
                        </td>
                        <td>
                            <div class="pay-remarks">
                                <?= $row->remarks ? $row->remarks : '<span class="text-muted">-</span>'; ?>
                            </div>
                        </td>
                        <td>
                            <a href="sale_code/<?=$row->id; ?>" class="btn btn-pay">
                                <i class="ph ph-currency-circle-dollar"></i>PAY NOW
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if(empty($data)): ?>
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <i class="ph ph-check-circle"></i>
                                <p>No pending payments at this time</p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
