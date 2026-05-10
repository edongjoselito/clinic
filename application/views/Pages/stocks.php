<?php 
    $i = $this->Page_model->one_cond_get_single_row('items','id',$this->uri->segment(3)); 
    date_default_timezone_set('Asia/Manila');
    $time = date('h:i:s a', time());
?>
<style>
.stocks-wrapper {
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
.search-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    margin-bottom: 25px;
}
.search-card .card-header {
    background: white;
    border-bottom: 2px solid #e3f2fd;
    padding: 20px 25px;
    border-radius: 12px 12px 0 0;
}
.search-card .card-header h5 {
    margin: 0;
    font-weight: 600;
    color: #1565c0;
    font-size: 16px;
}
.search-card .card-body {
    padding: 25px;
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
    background: #f5f5f5;
    color: #616161;
}
.btn-search {
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
.btn-search:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(30, 136, 229, 0.4);
    color: white;
}
.btn-add-cart {
    background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%);
    border: none;
    color: white;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.btn-add-cart:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(67, 160, 71, 0.4);
    color: white;
}
.btn-add-cart:disabled {
    background: #bdbdbd;
    cursor: not-allowed;
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

<div class="stocks-wrapper">

<!-- Page Header -->
<div class="row">
    <div class="col-12">
        <div class="form-hero">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2><i class="ph ph-package mr-2"></i>Stock Management</h2>
                    <p>Search items and add to cart</p>
                </div>
                <div class="col-md-4 text-md-right">
                    <a href="<?= base_url(); ?>Pages/dashboard" class="btn btn-light">
                        <i class="ph ph-arrow-left"></i>Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Flash Messages -->
<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 8px; border: none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('danger')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 8px; border: none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= $this->session->flashdata('danger'); ?>
    </div>
<?php endif; ?>

<!-- Search Item -->
<div class="row">
    <div class="col-12">
        <div class="card search-card">
            <div class="card-header">
                <h5><span class="section-icon"><i class="ph ph-magnifying-glass"></i></span>Search Item</h5>
            </div>
            <div class="card-body">
                <form class="sales-form form-horizontal" method="post" action="stocks">
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-10">
                            <label>Select Item</label>
                            <select id="inputState" name="item_id" class="form-control">
                                <option value="">-- Select an item --</option>
                                <?php foreach($item as $row): ?>
                                    <option value="<?= $row->id; ?>"><?= $row->description; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <button type="submit" name="item" class="btn-search w-100">
                                <i class="ph ph-magnifying-glass"></i>Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Form -->
<?php if(isset($i->id)): ?>
<div class="row">
    <div class="col-12">
        <div class="card form-card">
            <div class="card-header">
                <h5><span class="section-icon"><i class="ph ph-shopping-cart-simple"></i></span>Add to Cart</h5>
            </div>
            <div class="card-body">
                <form class="sales-form form-horizontal" name="abc" method="post" action="stocks">
                    <input readonly class="form-control" type="hidden" value="<?= $i->id; ?>" name="item_id" />
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Item Description</label>
                            <input readonly class="form-control" type="text" value="<?= $i->description; ?>" name="description" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Price</label>
                            <input readonly id="PPRICE" class="form-control" type="text" value="<?= $i->price; ?>" name="price" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Available Quantity</label>
                            <input readonly class="form-control" type="text" value="<?= $i->quantity; ?>" name="a_qty" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Receipt Code</label>
                            <input readonly type="text" class="form-control" value="<?= $_SESSION['sc']; ?>" name="sales_code" />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Quantity</label>
                            <input class="qtys form-control" id="QTY" name="quantity" type="text" onkeyup="multiply()" onkeypress="return checkIt(event)" placeholder="Enter quantity" />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Sub Total</label>
                            <input type="text" class="form-control" id="TOTAL" value="" name="total" readonly />
                        </div>
                    </div>

                    <div class="form-row align-items-end">
                        <div class="form-group col-md-4">
                            <label>Time</label>
                            <input readonly class="form-control" type="text" value="<?= $time; ?>" name="time" />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Date</label>
                            <input readonly class="form-control" type="text" value="<?= date('Y-m-d'); ?>" name="date" />
                        </div>
                        <div class="form-group col-md-4">
                            <input id="xx" class="btn-add-cart w-100" type="submit" value="Add to Cart" name="submit" disabled>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

</div>

<script language="javascript" type="text/javascript">
function multiply(){
    a = Number(document.abc.QTY.value);
    b = Number(document.abc.PPRICE.value);
    c = a * b;
    document.abc.TOTAL.value = c;
    if (a != 0 && b != 0) {
        document.getElementById("xx").disabled = false;
    } else {
        document.getElementById("xx").disabled = true;
    }
}

function addCommas(nStr){
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function sub(){
    a = Number(document.ad.tr.value);
    b = Number(document.ad.td.value);
    d = a - b;
    document.ad.amountdue.value = addCommas(d);
    document.ad.save_amount.value = d;
}

function checkIt(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        status = "This field accepts numbers only.";
        return false;
    }
    status = "";
    return true;
}
</script>
