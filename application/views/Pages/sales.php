<?php
    if($data === null){
        echo '<div class="alert alert-danger">
                <h4><i class="ph ph-warning"></i> Error</h4>
                <p>Diagnosis record not found. Please ensure you have a valid diagnosis ID.</p>
                <a href="'.base_url().'Pages/patient_queue" class="btn btn-primary">Return to Patient Queue</a>
              </div>';
        return;
    }
    if($p === null || $a === null){
        echo '<div class="alert alert-danger">
                <h4><i class="ph ph-warning"></i> Error</h4>
                <p>Patient or appointment record not found. Please ensure the diagnosis has valid associated records.</p>
                <a href="'.base_url().'Pages/patient_queue" class="btn btn-primary">Return to Patient Queue</a>
              </div>';
        return;
    }

    $p_name   = ucwords(strtolower(trim($p->first_name . ' ' . $p->last_name)));
    $initials = strtoupper(substr(trim($p->first_name), 0, 1) . substr(trim($p->last_name), 0, 1));
    $receipt  = isset($_SESSION['sc']) ? $_SESSION['sc'] : '';
    $visit_ts = $a->visit_date ? strtotime($a->visit_date) : false;

    $items_map = array();
    foreach ($item as $it) {
        $items_map[(int) $it->id] = array(
            'price' => (float) $it->price,
            'qty'   => (int) $it->quantity,
        );
    }
    $total = 0;
    foreach ($sales as $s) { $total += (float) $s->total; }
?>
<style>
.sale-wrapper { padding-top: 20px; padding-bottom: 20px; }

/* ===== Hero ===== */
.hero-card {
    position: relative; overflow: hidden;
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    border-radius: 16px; padding: 28px 32px; color: #fff;
    margin-bottom: 24px; box-shadow: 0 12px 32px rgba(30, 136, 229, 0.28);
    display: flex; align-items: center; justify-content: space-between; gap: 20px; flex-wrap: wrap;
}
.hero-card::before, .hero-card::after {
    content: ''; position: absolute; border-radius: 50%;
    background: rgba(255,255,255,0.07); pointer-events: none;
}
.hero-card::before { width: 260px; height: 260px; right: -60px; top: -110px; }
.hero-card::after { width: 170px; height: 170px; right: 130px; bottom: -90px; }
.hero-left { display: flex; align-items: center; gap: 18px; position: relative; z-index: 1; min-width: 0; }
.hero-avatar {
    width: 64px; height: 64px; border-radius: 16px; flex-shrink: 0;
    background: rgba(255,255,255,0.18); border: 1px solid rgba(255,255,255,0.35);
    display: flex; align-items: center; justify-content: center;
    font-size: 24px; font-weight: 700; color: #fff;
}
.hero-title h2 { margin: 0 0 4px; font-size: 22px; font-weight: 700; color: #fff; }
.hero-sub { font-size: 13.5px; color: rgba(255,255,255,0.85); margin-bottom: 10px; }
.hero-chips { display: flex; flex-wrap: wrap; gap: 8px; }
.hero-chip {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.25);
    border-radius: 20px; padding: 5px 12px; font-size: 12.5px; font-weight: 500; color: #fff;
}
.hero-chip i { font-size: 14px; }
.hero-actions { display: flex; gap: 10px; position: relative; z-index: 1; flex-wrap: wrap; }
.hero-cta {
    display: inline-flex; align-items: center; gap: 7px; height: 40px; padding: 0 18px;
    border-radius: 10px; font-size: 13.5px; font-weight: 600;
    border: 1px solid rgba(255,255,255,0.4); background: rgba(255,255,255,0.15); color: #fff;
}
.hero-cta:hover { background: rgba(255,255,255,0.25); color: #fff; text-decoration: none; }

/* ===== Cards ===== */
.bill-card {
    border: none; border-radius: 14px; background: #fff;
    box-shadow: 0 2px 14px rgba(15, 40, 80, 0.07); margin-bottom: 24px; overflow: hidden;
}
.bill-card .card-header {
    background: #fff; border-bottom: 1px solid #eef2f7;
    padding: 18px 24px; display: flex; align-items: center; justify-content: space-between;
}
.bill-card .card-header h5 {
    margin: 0; font-size: 15.5px; font-weight: 700; color: #1c2b3a;
    display: flex; align-items: center; gap: 12px;
}
.section-icon {
    width: 38px; height: 38px; flex-shrink: 0;
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
    border-radius: 10px; display: inline-flex; align-items: center; justify-content: center;
}
.section-icon i { color: #1565c0; font-size: 19px; }
.section-icon.teal { background: linear-gradient(135deg, #e7f7f5 0%, #b2dfdb 100%); }
.section-icon.teal i { color: #0f8a7f; }
.count-badge {
    display: inline-flex; align-items: center; justify-content: center;
    min-width: 24px; height: 24px; padding: 0 8px; border-radius: 12px;
    background: #e3f2fd; color: #1565c0; font-size: 12px; font-weight: 700;
}
.header-note { font-size: 12.5px; color: #8a9bb0; font-weight: 500; }
.header-link { font-size: 13px; font-weight: 600; color: #1565c0; display: inline-flex; align-items: center; gap: 5px; }
.header-link:hover { color: #0d47a1; text-decoration: none; }
.bill-card .card-body { padding: 24px; }
.bill-card .card-body.flush { padding: 0; }

/* ===== Visit summary ===== */
.visit-meta { display: flex; flex-wrap: wrap; gap: 10px 26px; font-size: 13.5px; margin-bottom: 16px; }
.visit-meta .f { display: flex; gap: 6px; align-items: baseline; }
.visit-meta .k { font-size: 10.5px; font-weight: 700; color: #8a9bb0; text-transform: uppercase; letter-spacing: .5px; }
.visit-meta .v { font-weight: 600; color: #1c2b3a; }
.note { font-size: 13.5px; color: #33475b; line-height: 1.55; white-space: pre-line; }
.note .lbl { font-size: 10.5px; font-weight: 700; color: #8a9bb0; text-transform: uppercase; letter-spacing: .4px; }
.note + .note { margin-top: 8px; }
.note.muted { color: #b8c4d0; font-style: italic; }

/* ===== Form controls ===== */
.form-group label {
    display: block; font-size: 12px; font-weight: 700; color: #54677c;
    text-transform: uppercase; letter-spacing: .6px; margin-bottom: 8px;
}
.form-control {
    width: 100%; height: 44px; border: 1.5px solid #dde5ee; border-radius: 10px;
    padding: 0 14px; font-size: 14px; color: #1c2b3a; background: #fff;
    transition: border-color .2s, box-shadow .2s;
}
.form-control:focus { border-color: #1e88e5; box-shadow: 0 0 0 3px rgba(30,136,229,.12); outline: none; }
.form-control[readonly] { background: #f5f8fb; color: #54677c; }
select.form-control { padding-right: 32px; }
.money-field { position: relative; }
.money-field .peso {
    position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
    font-weight: 700; color: #8a9bb0; pointer-events: none;
}
.money-field .form-control { padding-left: 30px; }
.subtotal-box {
    background: #f0f7ff; border: 1px solid #d6e8fb; border-radius: 10px;
    height: 44px; display: flex; align-items: center; padding: 0 14px;
    font-weight: 700; color: #1565c0; font-size: 15px;
}
.stock-hint { font-size: 12px; margin-top: 6px; color: #8a9bb0; }
.stock-hint.low { color: #c62828; font-weight: 600; }

/* ===== Buttons ===== */
.btn-add {
    display: inline-flex; align-items: center; justify-content: center; gap: 8px;
    background: linear-gradient(135deg, #11998e 0%, #0f8a7f 100%);
    border: none; color: #fff; height: 44px; padding: 0 24px;
    border-radius: 10px; font-weight: 600; font-size: 14px; cursor: pointer; transition: all .2s;
}
.btn-add:hover:not(:disabled) { transform: translateY(-1px); box-shadow: 0 6px 16px rgba(17,153,142,.35); }
.btn-add:disabled { opacity: .5; cursor: not-allowed; }
.btn-pay-now {
    display: inline-flex; align-items: center; justify-content: center; gap: 8px;
    background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%);
    border: none; color: #fff; height: 48px; padding: 0 28px;
    border-radius: 10px; font-weight: 700; font-size: 15px; cursor: pointer;
    transition: all .2s; width: 100%; box-shadow: 0 4px 14px rgba(67,160,71,.3);
}
.btn-pay-now:hover:not(:disabled) { transform: translateY(-1px); box-shadow: 0 8px 20px rgba(67,160,71,.4); }
.btn-pay-now:disabled { opacity: .45; cursor: not-allowed; }
.btn-cancel {
    display: inline-flex; align-items: center; gap: 8px;
    background: #f1f5f9; border: 1px solid #e2e8f0; color: #54677c;
    height: 42px; padding: 0 22px; border-radius: 10px; font-weight: 600; font-size: 14px;
}
.btn-cancel:hover { background: #e8eef4; color: #1c2b3a; text-decoration: none; }
.btn-remove {
    width: 30px; height: 30px; border-radius: 8px; border: none;
    background: #fdecec; color: #c62828; font-size: 15px; cursor: pointer;
    display: inline-flex; align-items: center; justify-content: center; transition: all .2s;
}
.btn-remove:hover { background: #e53935; color: #fff; text-decoration: none; }

/* ===== Charges table ===== */
.table-modern { margin-bottom: 0; }
.table-modern thead th {
    background: #f8fafc; border: none; border-bottom: 1px solid #eef2f7;
    font-weight: 700; color: #54677c; font-size: 11px;
    text-transform: uppercase; letter-spacing: .7px; padding: 12px 16px;
}
.table-modern tbody td { border-color: #f1f5f9; padding: 13px 16px; vertical-align: middle; font-size: 13.5px; color: #33475b; }
.table-modern tbody tr:hover { background: #f8fbff; }
.table-modern tfoot th {
    background: #f8fafc; border-top: 2px solid #eef2f7; padding: 14px 16px;
    font-size: 15px; color: #1c2b3a;
}
.cell-num { text-align: right; font-variant-numeric: tabular-nums; }
.empty-state { text-align: center; padding: 36px 20px; color: #8a9bb0; }
.empty-state > i { font-size: 36px; color: #d4dde8; display: block; margin-bottom: 8px; }
.empty-state p { margin: 0; font-size: 13.5px; }

/* ===== Payment panel ===== */
.pay-row {
    display: flex; align-items: center; justify-content: space-between;
    gap: 14px; padding: 10px 0;
}
.pay-row .lbl { font-size: 13.5px; font-weight: 600; color: #54677c; }
.pay-row .val { font-size: 15px; font-weight: 700; color: #1c2b3a; font-variant-numeric: tabular-nums; }
.pay-row .form-control, .pay-row .money-field { width: 180px; }
.pay-divider { border-top: 1px dashed #e2e8f0; margin: 6px 0; }
.pay-row.due .lbl { font-size: 15px; font-weight: 700; color: #1c2b3a; }
.pay-row.due .val { font-size: 22px; color: #2e7d32; }

@media (max-width: 767px) {
    .hero-card { padding: 22px 20px; }
    .hero-avatar { width: 52px; height: 52px; font-size: 20px; border-radius: 13px; }
}
</style>

<div class="sale-wrapper">

<!-- ===== Hero ===== -->
<div class="hero-card">
    <div class="hero-left">
        <div class="hero-avatar"><?= htmlentities($initials); ?></div>
        <div class="hero-title">
            <h2><i class="ph ph-receipt"></i> Process Payment</h2>
            <div class="hero-sub">Billing for <strong><?= htmlentities($p_name); ?></strong></div>
            <div class="hero-chips">
                <span class="hero-chip"><i class="ph ph-receipt"></i><?= htmlentities($receipt); ?></span>
                <?php if($visit_ts): ?><span class="hero-chip"><i class="ph ph-calendar-blank"></i>Visit <?= date('M j, Y', $visit_ts); ?></span><?php endif; ?>
                <?php if(trim((string) $a->transaction) !== ''): ?><span class="hero-chip"><i class="ph ph-tag"></i><?= htmlentities($a->transaction); ?></span><?php endif; ?>
            </div>
        </div>
    </div>
    <div class="hero-actions">
        <a href="<?= base_url(); ?>Pages/patient_profile/<?= (int) $p->id; ?>" class="hero-cta"><i class="ph ph-user"></i>Profile</a>
        <a href="<?= base_url(); ?>Pages/pay" class="hero-cta"><i class="ph ph-arrow-left"></i>Back to Billing</a>
    </div>
</div>

<!-- ===== Visit & diagnosis summary ===== -->
<div class="card bill-card">
    <div class="card-header">
        <h5><span class="section-icon"><i class="ph ph-identification-card"></i></span>Visit Summary</h5>
        <span class="header-note">Diagnosis #<?= (int) $data->id; ?></span>
    </div>
    <div class="card-body">
        <div class="visit-meta">
            <div class="f"><span class="k">Patient</span><span class="v"><?= htmlentities($p_name); ?></span></div>
            <div class="f"><span class="k">Address</span><span class="v"><?= htmlentities(ucwords(strtolower(trim($p->sitio.' '.$p->barangay.' '.$p->city_mun.' '.$p->province)))); ?></span></div>
            <div class="f"><span class="k">Date</span><span class="v"><?= date('M j, Y'); ?></span></div>
        </div>
        <?php
            $dx = trim((string) $data->diagnosis); $tx = trim((string) $data->treatment); $rm = trim((string) $data->remarks);
            if($dx === '' && $tx === '' && $rm === ''): ?>
            <div class="note muted">No findings recorded on this diagnosis.</div>
        <?php else: ?>
            <?php if($dx !== ''): ?><div class="note"><span class="lbl">Diagnosis</span><br><?= htmlentities($dx); ?></div><?php endif; ?>
            <?php if($tx !== ''): ?><div class="note"><span class="lbl">Treatment</span><br><?= htmlentities($tx); ?></div><?php endif; ?>
            <?php if($rm !== ''): ?><div class="note"><span class="lbl">Remarks</span><br><?= htmlentities($rm); ?></div><?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<!-- ===== Add a charge ===== -->
<div class="card bill-card">
    <div class="card-header">
        <h5><span class="section-icon teal"><i class="ph ph-plus-circle"></i></span>Add Charge</h5>
        <span class="header-note">Pick a service or item — price fills in automatically</span>
    </div>
    <div class="card-body">
        <form name="charge" method="post" action="<?= base_url(); ?>Pages/sale/<?= (int) $data->id; ?>" autocomplete="off">
            <input type="hidden" value="<?= (int) $data->id; ?>" name="diagnose_id" />
            <input type="hidden" value="<?= (int) $p->id; ?>" name="patient_id" />
            <input type="hidden" value="<?= htmlentities($receipt); ?>" name="sales_code" />
            <input type="hidden" name="item_id" id="itemId" value="<?= isset($i->id) ? (int) $i->id : ''; ?>" />
            <input type="hidden" name="price" id="itemPrice" value="<?= isset($i->price) ? htmlentities($i->price) : ''; ?>" />
            <input type="hidden" name="total" id="lineTotal" value="" />
            <input type="hidden" name="time" value="<?= date('h:i:s a'); ?>" />
            <input type="hidden" name="date" value="<?= date('Y-m-d'); ?>" />

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="itemSelect">Service / Item</label>
                    <select id="itemSelect" class="form-control">
                        <option value="">Select a service or item…</option>
                        <?php foreach($item as $row): ?>
                        <option value="<?= (int) $row->id; ?>" <?= isset($i->id) && (int) $i->id === (int) $row->id ? 'selected' : ''; ?>><?= htmlentities($row->description); ?> — ₱<?= number_format($row->price, 2); ?><?= (int) $row->quantity === 0 ? ' (out of stock)' : ''; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="stock-hint" id="stockHint"></div>
                </div>
                <div class="form-group col-md-2">
                    <label for="qtyInput">Quantity</label>
                    <input class="form-control" id="qtyInput" name="quantity" type="number" min="1" step="1" placeholder="0" />
                </div>
                <div class="form-group col-md-3">
                    <label>Amount</label>
                    <div class="subtotal-box" id="subtotalBox">₱0.00</div>
                </div>
                <div class="form-group col-md-2">
                    <label>&nbsp;</label>
                    <button id="addBtn" type="submit" name="submit" class="btn-add" disabled><i class="ph ph-plus"></i>Add Charge</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- ===== Charges on this receipt ===== -->
<div class="card bill-card">
    <div class="card-header">
        <h5><span class="section-icon"><i class="ph ph-list-dashes"></i></span>Charges <span class="count-badge"><?= count($sales); ?></span></h5>
        <span class="header-note">Receipt <?= htmlentities($receipt); ?></span>
    </div>
    <div class="card-body flush">
        <?php if(!empty($sales)): ?>
        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th style="width:50px;">#</th>
                        <th>Item / Service</th>
                        <th class="cell-num" style="width:90px;">Qty</th>
                        <th class="cell-num" style="width:130px;">Unit Price</th>
                        <th class="cell-num" style="width:130px;">Amount</th>
                        <th style="width:60px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1; foreach($sales as $row): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><strong><?= htmlentities((string) $row->description); ?></strong></td>
                        <td class="cell-num"><?= (int) $row->quantity; ?></td>
                        <td class="cell-num">₱<?= number_format((float) $row->price, 2); ?></td>
                        <td class="cell-num"><strong>₱<?= number_format((float) $row->total, 2); ?></strong></td>
                        <td class="cell-num">
                            <a href="<?= base_url(); ?>Pages/sale_item_delete/<?= (int) $row->id; ?>/<?= (int) $data->id; ?>"
                               class="btn-remove" data-toggle="tooltip" title="Remove charge"
                               onclick="return confirm('Remove this charge from the bill?')"><i class="ph ph-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="cell-num">Total</th>
                        <th class="cell-num">₱<?= number_format($total, 2); ?></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <?php else: ?>
        <div class="empty-state">
            <i class="ph ph-receipt"></i>
            <p>No charges yet — add services or items above.</p>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- ===== Payment ===== -->
<div class="card bill-card">
    <div class="card-header">
        <h5><span class="section-icon teal"><i class="ph ph-money"></i></span>Payment</h5>
        <a href="<?= base_url(); ?>Pages/receipt/<?= (int) $data->id; ?>" target="_blank" class="header-link"><i class="ph ph-printer"></i>Print receipt</a>
    </div>
    <div class="card-body">
        <form name="ad" method="post" action="<?= base_url(); ?>Pages/sale/<?= (int) $data->id; ?>" autocomplete="off">
            <input type="hidden" value="<?= (int) $data->id; ?>" name="d_id">
            <input type="hidden" value="<?= (int) $p->id; ?>" name="p_id">
            <input type="hidden" id="tr" value="<?= $total; ?>" name="total_retail" />
            <input type="hidden" value="<?= $total; ?>" id="save_amount" name="due_amount" />

            <div class="row justify-content-end">
                <div class="col-md-5 col-lg-4">
                    <div class="pay-row">
                        <span class="lbl">Total Charges</span>
                        <span class="val">₱<?= number_format($total, 2); ?></span>
                    </div>
                    <div class="pay-row">
                        <span class="lbl">Discount</span>
                        <div class="money-field">
                            <span class="peso">₱</span>
                            <input id="td" class="form-control" type="number" min="0" step="0.01" name="discount" placeholder="0.00" />
                        </div>
                    </div>
                    <div class="pay-row">
                        <span class="lbl">Note</span>
                        <input type="text" class="form-control" name="comment" placeholder="Optional" />
                    </div>
                    <div class="pay-divider"></div>
                    <div class="pay-row due">
                        <span class="lbl">Amount Due</span>
                        <span class="val" id="amountdue">₱<?= number_format($total, 2); ?></span>
                    </div>
                    <div style="margin-top:14px;">
                        <button type="submit" class="btn-pay-now" name="pay"<?php if($total <= 0){echo ' disabled';} ?>>
                            <i class="ph ph-check-circle"></i>Complete Payment
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

<script>
(function () {
    var items    = <?= json_encode($items_map); ?>;
    var select   = document.getElementById('itemSelect');
    var qty      = document.getElementById('qtyInput');
    var itemId   = document.getElementById('itemId');
    var price    = document.getElementById('itemPrice');
    var lineTot  = document.getElementById('lineTotal');
    var box      = document.getElementById('subtotalBox');
    var hint     = document.getElementById('stockHint');
    var addBtn   = document.getElementById('addBtn');

    function fmt(n) { return '₱' + n.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ','); }

    function refresh() {
        var it = items[select.value];
        itemId.value = it ? select.value : '';
        price.value  = it ? it.price : '';
        var q = parseInt(qty.value, 10) || 0;

        if (it) {
            hint.textContent = it.qty > 0 ? it.qty + ' in stock' : 'Out of stock';
            hint.className = 'stock-hint' + (it.qty <= 0 ? ' low' : '');
        } else {
            hint.textContent = '';
        }

        var amount = it ? it.price * q : 0;
        lineTot.value = amount;
        box.textContent = fmt(amount);

        addBtn.disabled = !(it && q > 0 && q <= it.qty);
        if (it && q > it.qty) {
            hint.textContent = 'Only ' + it.qty + ' in stock';
            hint.className = 'stock-hint low';
        }
    }

    select.addEventListener('change', refresh);
    qty.addEventListener('input', refresh);
    refresh();
})();

// Discount → amount due
(function () {
    var total    = parseFloat(document.getElementById('tr').value) || 0;
    var discount = document.getElementById('td');
    var due      = document.getElementById('amountdue');
    var hidden   = document.getElementById('save_amount');

    function fmt(n) { return '₱' + n.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ','); }

    function refresh() {
        var d = parseFloat(discount.value) || 0;
        if (d < 0) d = 0;
        if (d > total) d = total;
        var amount = total - d;
        due.textContent = fmt(amount);
        hidden.value = amount;
    }

    discount.addEventListener('input', refresh);
})();
</script>
