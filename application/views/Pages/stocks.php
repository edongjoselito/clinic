<?php
    // Pre-selected item when arriving via stocks/{item_id}
    $sel = null;
    $seg = (int) $this->uri->segment(3);
    if ($seg) {
        $sel = $this->Page_model->one_cond_get_single_row('items', 'id', $seg);
    }
    date_default_timezone_set('Asia/Manila');
    $time = date('h:i:s a', time());
    $today = date('Y-m-d');
    $items_map = array();
    foreach ($item as $it) {
        $items_map[$it->id] = array('d' => $it->description, 'p' => $it->price, 'q' => (int) $it->quantity);
    }
    $total_items = is_array($item) ? count($item) : 0;
    $recent = isset($recent) ? $recent : array();
?>
<style>
.admin-wrap { padding-top: 20px; }

/* ===== Hero ===== */
.mhero {
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    border-radius: 14px;
    padding: 26px 30px;
    color: #fff;
    margin-bottom: 22px;
    box-shadow: 0 8px 24px rgba(13, 71, 161, 0.28);
    position: relative;
    overflow: hidden;
}
.mhero::before {
    content: '';
    position: absolute; top: -70px; right: -70px;
    width: 260px; height: 260px;
    background: rgba(255,255,255,0.07);
    border-radius: 50%;
}
.mhero-inner { display: flex; justify-content: space-between; align-items: center; gap: 18px; flex-wrap: wrap; position: relative; }
.mhero h2 { color: #fff; font-weight: 700; font-size: 24px; margin-bottom: 4px; display: flex; align-items: center; gap: 12px; }
.mhero h2 i { font-size: 26px; }
.mhero p { color: rgba(255,255,255,0.85); margin: 0; font-size: 14px; }
.hero-right { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
.hero-stat { display: flex; align-items: center; gap: 10px; background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.25); padding: 9px 16px; border-radius: 10px; }
.hero-stat i { font-size: 17px; color: rgba(255,255,255,0.85); }
.hero-stat .stat-count { font-size: 17px; font-weight: 700; line-height: 1; }
.hero-stat .stat-label { font-size: 10.5px; font-weight: 600; color: rgba(255,255,255,0.8); text-transform: uppercase; letter-spacing: 0.5px; }
.btn-hero { display: inline-flex; align-items: center; gap: 8px; height: 42px; padding: 0 20px; background: #fff; color: #0d47a1; font-weight: 700; font-size: 14px; border-radius: 10px; border: none; text-decoration: none; cursor: pointer; transition: all .2s ease; }
.btn-hero.outline { background: transparent; color: #fff; border: 1.5px solid rgba(255,255,255,0.55); }
.btn-hero.outline:hover { background: rgba(255,255,255,0.12); color: #fff; text-decoration: none; }

/* ===== Flash ===== */
.admin-wrap .alert { border-radius: 10px; border: none; font-size: 14px; padding: 13px 18px; }
.admin-wrap .alert-success { background: #e8f5e9; color: #2e7d32; }
.admin-wrap .alert-danger { background: #fdecea; color: #c62828; }

/* ===== Cards ===== */
.data-card { border: none; border-radius: 14px; box-shadow: 0 2px 14px rgba(20,40,70,0.07); margin-bottom: 24px; overflow: hidden; }
.data-card .card-header { background: #fff; border-bottom: 1px solid #eef2f6; padding: 18px 24px; display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap; }
.data-card .card-header h5 { margin: 0; font-weight: 700; color: #1c2b3a; font-size: 15px; display: flex; align-items: center; gap: 10px; }
.data-card .card-header h5 i { color: #1e88e5; font-size: 18px; }
.data-card .card-body { padding: 0; }
.data-card .card-body.pad { padding: 24px; }
.hdr-meta { font-size: 13px; color: #8a9bb0; font-weight: 500; }

/* ===== Form ===== */
.stock-form .form-group label { font-weight: 600; color: #5a6b7d; font-size: 12px; text-transform: uppercase; letter-spacing: .5px; margin-bottom: 7px; }
.stock-form .form-control { height: 44px; border: 1px solid #dfe7ee; border-radius: 9px; padding: 0 14px; font-size: 14px; color: #1c2b3a; }
.stock-form .form-control:focus { border-color: #1e88e5; box-shadow: 0 0 0 3px rgba(30,136,229,.1); }
.stock-form .form-control[readonly] { background: #f8fafc; color: #5a6b7d; }
.field-note { font-size: 12px; color: #8a9bb0; margin-top: 5px; }
.field-note.err { color: #c62828; font-weight: 600; }
.total-box { display: flex; align-items: center; height: 44px; background: #e8f4fd; border: 1px solid #cfe8fa; border-radius: 9px; padding: 0 14px; font-weight: 700; color: #1565c0; font-size: 15px; font-variant-numeric: tabular-nums; }
.btn-stock { height: 44px; padding: 0 26px; border-radius: 10px; background: linear-gradient(135deg, #1e88e5, #1565c0); color: #fff; font-weight: 700; font-size: 14px; border: none; display: inline-flex; align-items: center; gap: 8px; }
.btn-stock:hover:not(:disabled) { box-shadow: 0 4px 14px rgba(30,136,229,.35); color: #fff; }
.btn-stock:disabled { background: #c3cfdb; cursor: not-allowed; }

/* ===== Table ===== */
.table-modern { margin-bottom: 0; width: 100% !important; }
.table-modern thead th { background: #f8fafc; border-bottom: 1px solid #eef2f6; border-top: none; font-weight: 700; color: #5a6b7d; font-size: 11.5px; text-transform: uppercase; letter-spacing: 0.6px; padding: 13px 18px; }
.table-modern td { vertical-align: middle; border-color: #f2f5f8; padding: 13px 18px; font-size: 14px; color: #3d4f63; }
.table-modern th:first-child, .table-modern td:first-child { padding-left: 24px; }
.table-modern th:last-child, .table-modern td:last-child { padding-right: 24px; }
.table-modern tbody tr:hover { background: #fafcfe; }
.cell-main { font-weight: 700; color: #1c2b3a; }
.cell-date { font-weight: 600; color: #1c2b3a; white-space: nowrap; }
.cell-sub { font-size: 12px; color: #8a9bb0; margin-top: 3px; }
.text-money { font-weight: 700; color: #1c2b3a; font-variant-numeric: tabular-nums; white-space: nowrap; }
.rc-pill { font-size: 12px; font-weight: 600; color: #5a6b7d; background: #f1f5f9; padding: 3px 10px; border-radius: 6px; }

.empty-state { text-align: center; padding: 56px 20px; color: #8a9bb0; }
.empty-state > i { font-size: 42px; color: #cfe3f5; display: block; margin-bottom: 10px; }
.empty-state p { margin: 0 0 4px; font-weight: 600; color: #5a6b7d; }
.empty-state span { font-size: 13px; }
</style>

<div class="admin-wrap">

<!-- Page Header -->
<div class="mhero">
    <div class="mhero-inner">
        <div>
            <h2><i class="ph ph-package"></i>Stock In</h2>
            <p>Record purchased or received inventory</p>
        </div>
        <div class="hero-right">
            <div class="hero-stat">
                <i class="ph ph-archive-box"></i>
                <div>
                    <div class="stat-count"><?= number_format($total_items); ?></div>
                    <div class="stat-label">Catalog Items</div>
                </div>
            </div>
            <a href="<?= base_url(); ?>Pages/item_list" class="btn-hero outline"><i class="ph ph-list-dashes"></i>Item Catalog</a>
        </div>
    </div>
</div>

<!-- Flash Messages -->
<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <?= htmlentities($this->session->flashdata('success')); ?>
    </div>
<?php endif; ?>
<?php if($this->session->flashdata('save')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <?= htmlentities($this->session->flashdata('save')); ?>
    </div>
<?php endif; ?>
<?php if($this->session->flashdata('danger')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <?= htmlentities($this->session->flashdata('danger')); ?>
    </div>
<?php endif; ?>

<!-- Receive Stock -->
<div class="card data-card">
    <div class="card-header">
        <h5><i class="ph ph-package"></i>Receive Stock</h5>
        <span class="hdr-meta">Posting under receipt <?= htmlentities(isset($_SESSION['sc']) ? $_SESSION['sc'] : '—'); ?> &middot; <?= date('M d, Y'); ?></span>
    </div>
    <div class="card-body pad">
        <form method="post" action="<?= base_url(); ?>Pages/stocks" class="stock-form" id="stockForm">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Item</label>
                    <select id="itemSel" name="item_id" class="form-control" required>
                        <option value="">Select an item…</option>
                        <?php foreach($item as $row): ?>
                            <option value="<?= (int) $row->id; ?>" <?= ($sel && (int) $sel->id === (int) $row->id) ? 'selected' : ''; ?>><?= htmlentities($row->description); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Current Stock</label>
                    <input readonly class="form-control" type="text" id="aQtyView" value="<?= $sel ? (int) $sel->quantity : ''; ?>" placeholder="—" />
                    <input type="hidden" name="a_qty" id="aQty" value="<?= $sel ? (int) $sel->quantity : '0'; ?>" />
                </div>
                <div class="form-group col-md-3">
                    <label>Unit Price</label>
                    <input readonly id="PPRICE" class="form-control" type="text" value="<?= $sel ? htmlentities($sel->price, ENT_QUOTES) : ''; ?>" name="price" placeholder="—" />
                </div>
            </div>

            <div class="form-row align-items-end">
                <div class="form-group col-md-3">
                    <label>Quantity Received</label>
                    <input class="form-control" id="QTY" name="quantity" type="number" min="1" step="1" placeholder="0" />
                    <div class="field-note" id="qtyNote"></div>
                </div>
                <div class="form-group col-md-3">
                    <label>Subtotal</label>
                    <div class="total-box" id="TOTALVIEW">&#8369;0.00</div>
                    <input type="hidden" id="TOTAL" name="total" value="0" />
                </div>
                <div class="form-group col-md-3">
                    <label>Receipt Code</label>
                    <input readonly type="text" class="form-control" value="<?= htmlentities(isset($_SESSION['sc']) ? $_SESSION['sc'] : ''); ?>" name="sales_code" />
                </div>
                <div class="form-group col-md-3">
                    <label>&nbsp;</label>
                    <button id="xx" class="btn-stock w-100" type="submit" name="submit" disabled><i class="ph ph-plus-circle"></i>Record Stock In</button>
                </div>
            </div>

            <input type="hidden" name="time" value="<?= $time; ?>" />
            <input type="hidden" name="date" value="<?= $today; ?>" />
        </form>
    </div>
</div>

<!-- Recent Stock-Ins -->
<div class="card data-card">
    <div class="card-header">
        <h5><i class="ph ph-clock-counter-clockwise"></i>Recent Stock-Ins <span class="count-badge" style="background:#e8f4fd;color:#1565c0;font-size:12px;font-weight:700;padding:4px 12px;border-radius:12px;"><?= count($recent); ?></span></h5>
        <span class="hdr-meta">Latest 25 records for this clinic</span>
    </div>
    <div class="card-body">
        <?php if(empty($recent)): ?>
            <div class="empty-state">
                <i class="ph ph-package"></i>
                <p>No stock received yet</p>
                <span>Records appear here after your first stock-in above.</span>
            </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Item</th>
                        <th class="text-right">Qty</th>
                        <th class="text-right">Unit Price</th>
                        <th class="text-right">Total</th>
                        <th>Receipt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($recent as $row):
                        $ts = strtotime($row->date);
                    ?>
                    <tr>
                        <td><span class="cell-date"><?= $ts !== false ? date('M d, Y', $ts) : htmlentities($row->date); ?></span>
                            <div class="cell-sub"><?= htmlentities($row->time); ?></div></td>
                        <td><div class="cell-main"><?= htmlentities($row->description ? $row->description : 'Item #' . (int) $row->item_id); ?></div></td>
                        <td class="text-right"><?= (int) $row->quantity; ?></td>
                        <td class="text-right text-money">&#8369;<?= number_format((float) $row->purchases_price, 2); ?></td>
                        <td class="text-right text-money">&#8369;<?= number_format((float) $row->total, 2); ?></td>
                        <td><span class="rc-pill"><?= htmlentities($row->reciept_code); ?></span></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>

</div>

<script>
(function(){
    var items = <?= json_encode($items_map); ?>;
    var sel = document.getElementById('itemSel');
    var qty = document.getElementById('QTY');
    var btn = document.getElementById('xx');

    function fill(){
        var it = items[sel.value];
        document.getElementById('PPRICE').value = it ? it.p : '';
        document.getElementById('aQtyView').value = it ? it.q : '';
        document.getElementById('aQty').value = it ? it.q : '0';
        calc();
    }
    function calc(){
        var it = items[sel.value];
        var q = parseInt(qty.value, 10) || 0;
        var total = it ? q * (parseFloat(it.p) || 0) : 0;
        document.getElementById('TOTAL').value = total;
        document.getElementById('TOTALVIEW').innerHTML = '&#8369;' + total.toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2});
        var note = document.getElementById('qtyNote');
        if (it && q > 0) {
            note.textContent = 'New stock level: ' + (it.q + q);
            note.className = 'field-note';
        } else {
            note.textContent = '';
        }
        btn.disabled = !(it && q > 0);
    }
    sel.addEventListener('change', fill);
    qty.addEventListener('input', calc);
    if (sel.value) fill();
})();
</script>
