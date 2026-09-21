<?php
$filtered = isset($df) && isset($dt);
$gross = isset($sale) ? (float) $sale : 0;
$expenses = isset($exp) ? (float) $exp : 0;
$net = $gross - $expenses;
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
.btn-hero { display: inline-flex; align-items: center; gap: 8px; height: 42px; padding: 0 20px; background: #fff; color: #0d47a1; font-weight: 700; font-size: 14px; border-radius: 10px; border: none; text-decoration: none; cursor: pointer; transition: all .2s ease; }
.btn-hero:hover { background: #e3f2fd; color: #0d47a1; text-decoration: none; }

/* ===== Cards ===== */
.data-card { border: none; border-radius: 14px; box-shadow: 0 2px 14px rgba(20,40,70,0.07); margin-bottom: 24px; overflow: hidden; }
.data-card .card-header { background: #fff; border-bottom: 1px solid #eef2f6; padding: 18px 24px; display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap; }
.data-card .card-header h5 { margin: 0; font-weight: 700; color: #1c2b3a; font-size: 15px; display: flex; align-items: center; gap: 10px; }
.data-card .card-header h5 i { color: #1e88e5; font-size: 18px; }
.data-card .card-body { padding: 0; }
.hdr-meta { font-size: 13px; color: #8a9bb0; font-weight: 500; }
.period-pill { display: inline-flex; align-items: center; gap: 7px; background: #e8f4fd; color: #1565c0; font-size: 12.5px; font-weight: 700; padding: 6px 14px; border-radius: 20px; }
.period-pill i { font-size: 14px; }

/* ===== Stat cards ===== */
.stat-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 24px; }
.stat-card { border: none; border-radius: 14px; box-shadow: 0 2px 14px rgba(20,40,70,0.07); padding: 24px; background: #fff; display: flex; align-items: center; gap: 16px; }
.stat-card .s-icon { width: 52px; height: 52px; border-radius: 12px; display: inline-flex; align-items: center; justify-content: center; font-size: 24px; flex-shrink: 0; }
.stat-card .s-icon.blue { background: #e8f4fd; color: #1565c0; }
.stat-card .s-icon.red { background: #fdecea; color: #c62828; }
.stat-card .s-icon.green { background: #e8f5e9; color: #2e7d32; }
.stat-card .s-label { font-size: 11.5px; font-weight: 700; color: #8a9bb0; text-transform: uppercase; letter-spacing: .6px; margin-bottom: 4px; }
.stat-card .s-value { font-size: 24px; font-weight: 700; color: #1c2b3a; font-variant-numeric: tabular-nums; line-height: 1.1; }
.stat-card .s-value.neg { color: #c62828; }
.stat-card .s-sub { font-size: 12px; color: #8a9bb0; margin-top: 3px; }

/* ===== Breakdown table ===== */
.table-modern { margin-bottom: 0; width: 100% !important; }
.table-modern thead th { background: #f8fafc; border-bottom: 1px solid #eef2f6; border-top: none; font-weight: 700; color: #5a6b7d; font-size: 11.5px; text-transform: uppercase; letter-spacing: 0.6px; padding: 13px 18px; }
.table-modern td { vertical-align: middle; border-color: #f2f5f8; padding: 16px 18px; font-size: 14.5px; color: #3d4f63; }
.table-modern th:first-child, .table-modern td:first-child { padding-left: 24px; }
.table-modern th:last-child, .table-modern td:last-child { padding-right: 24px; }
.table-modern tr.total-row td { background: #f8fafc; border-top: 2px solid #e3eaf1; font-weight: 700; font-size: 15.5px; color: #1c2b3a; }
.table-modern tr.total-row td.net-pos { color: #2e7d32; }
.table-modern tr.total-row td.net-neg { color: #c62828; }
.line-label { font-weight: 600; color: #1c2b3a; display: flex; align-items: center; gap: 10px; }
.line-label i { font-size: 17px; }
.line-sub { font-size: 12px; color: #8a9bb0; margin-top: 2px; }
.text-money { font-weight: 700; color: #1c2b3a; font-variant-numeric: tabular-nums; white-space: nowrap; }

.empty-state { text-align: center; padding: 56px 20px; color: #8a9bb0; }
.empty-state > i { font-size: 42px; color: #cfe3f5; display: block; margin-bottom: 10px; }
.empty-state p { margin: 0 0 4px; font-weight: 600; color: #5a6b7d; }
.empty-state span { font-size: 13px; }
.empty-state .btn-hero-inline { display: inline-flex; align-items: center; gap: 7px; height: 36px; padding: 0 16px; margin-top: 14px; background: #e8f4fd; color: #1565c0; font-weight: 600; font-size: 13px; border-radius: 9px; border: none; cursor: pointer; }
.empty-state .btn-hero-inline:hover { background: #d6ecfc; }

/* ===== Filter modal ===== */
.modal-content { border: none; border-radius: 14px; overflow: hidden; box-shadow: 0 20px 60px rgba(10,30,60,.25); }
.modal-header { background: #f8fafc; border-bottom: 1px solid #eef2f6; padding: 18px 24px; }
.modal-title { font-weight: 700; font-size: 16px; color: #1c2b3a; display: flex; align-items: center; gap: 10px; }
.modal-title i { color: #1e88e5; font-size: 19px; }
.modal-header .close { padding: 0; margin: 0; font-size: 24px; color: #8a9bb0; opacity: 1; }
.modal-body { padding: 22px 24px 10px; }
.modal-body .form-group label { font-weight: 600; color: #5a6b7d; font-size: 12px; text-transform: uppercase; letter-spacing: .5px; margin-bottom: 7px; }
.modal-body .form-control { height: 44px; border: 1px solid #dfe7ee; border-radius: 9px; padding: 0 14px; font-size: 14px; color: #1c2b3a; }
.modal-body .form-control:focus { border-color: #1e88e5; box-shadow: 0 0 0 3px rgba(30,136,229,.1); }
.modal-footer { padding: 14px 24px 20px; border-top: none; }
.btn-m { height: 40px; padding: 0 18px; border-radius: 9px; font-weight: 600; font-size: 13.5px; display: inline-flex; align-items: center; gap: 7px; border: none; }
.btn-m.cancel { background: #f1f5f9; color: #5a6b7d; }
.btn-m.cancel:hover { background: #e2e8f0; color: #3d4f63; }
.btn-m.save { background: linear-gradient(135deg, #1e88e5, #1565c0); color: #fff; }
.btn-m.save:hover { box-shadow: 0 4px 14px rgba(30,136,229,.35); color: #fff; }
.quick-ranges { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 16px; }
.quick-ranges button { height: 30px; padding: 0 12px; border-radius: 15px; border: 1px solid #dfe7ee; background: #f8fafc; color: #5a6b7d; font-size: 12px; font-weight: 600; cursor: pointer; }
.quick-ranges button:hover { background: #e8f4fd; color: #1565c0; border-color: #cfe8fa; }

@media (max-width: 768px) {
    .stat-grid { grid-template-columns: 1fr; }
}
</style>

<div class="admin-wrap">

<!-- Page Header -->
<div class="mhero">
    <div class="mhero-inner">
        <div>
            <h2><i class="ph ph-scales"></i>Income Statement</h2>
            <p>Gross income less expenses, by date range</p>
        </div>
        <div class="hero-right">
            <a data-toggle="modal" href="#filterModal" class="btn-hero"><i class="ph ph-funnel"></i><?= $filtered ? 'Change Range' : 'Generate Report'; ?></a>
        </div>
    </div>
</div>

<?php if(!$filtered): ?>
<div class="card data-card">
    <div class="card-body">
        <div class="empty-state">
            <i class="ph ph-calendar-dots"></i>
            <p>No report generated yet</p>
            <span>Choose a date range to compute the income statement.</span><br>
            <button class="btn-hero-inline" data-toggle="modal" data-target="#filterModal"><i class="ph ph-funnel"></i>Select Date Range</button>
        </div>
    </div>
</div>
<?php else: ?>

<!-- Stat Cards -->
<div class="stat-grid">
    <div class="stat-card">
        <span class="s-icon blue"><i class="ph ph-trend-up"></i></span>
        <div>
            <div class="s-label">Gross Income</div>
            <div class="s-value">&#8369;<?= number_format($gross, 2); ?></div>
            <div class="s-sub">Collected billings</div>
        </div>
    </div>
    <div class="stat-card">
        <span class="s-icon red"><i class="ph ph-trend-down"></i></span>
        <div>
            <div class="s-label">Total Expenses</div>
            <div class="s-value">&#8369;<?= number_format($expenses, 2); ?></div>
            <div class="s-sub">Recorded expenses</div>
        </div>
    </div>
    <div class="stat-card">
        <span class="s-icon <?= $net >= 0 ? 'green' : 'red'; ?>"><i class="ph ph-<?= $net >= 0 ? 'piggy-bank' : 'warning-circle'; ?>"></i></span>
        <div>
            <div class="s-label">Net Income</div>
            <div class="s-value <?= $net < 0 ? 'neg' : ''; ?>">&#8369;<?= number_format($net, 2); ?></div>
            <div class="s-sub"><?= $net >= 0 ? 'Profit for the period' : 'Loss for the period'; ?></div>
        </div>
    </div>
</div>

<!-- Breakdown -->
<div class="card data-card">
    <div class="card-header">
        <h5><i class="ph ph-file-doc"></i>Statement Details</h5>
        <span class="period-pill"><i class="ph ph-calendar-dots"></i><?= date('M d, Y', strtotime($df)); ?> &ndash; <?= date('M d, Y', strtotime($dt)); ?></span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-modern">
                <tbody>
                    <tr>
                        <td>
                            <div class="line-label"><i class="ph ph-trend-up" style="color:#1565c0;"></i>Gross Income</div>
                            <div class="line-sub" style="padding-left:27px;">Total collected sales (amount paid)</div>
                        </td>
                        <td class="text-right text-money">&#8369;<?= number_format($gross, 2); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="line-label"><i class="ph ph-trend-down" style="color:#c62828;"></i>Less: Expenses</div>
                            <div class="line-sub" style="padding-left:27px;">All recorded operating expenses</div>
                        </td>
                        <td class="text-right text-money" style="color:#c62828;">(&#8369;<?= number_format($expenses, 2); ?>)</td>
                    </tr>
                    <tr class="total-row">
                        <td>Net Income</td>
                        <td class="text-right <?= $net >= 0 ? 'net-pos' : 'net-neg'; ?>">&#8369;<?= number_format($net, 2); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endif; ?>

</div>

<!-- Filter Modal -->
<div id="filterModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="ph ph-funnel"></i>Report Date Range</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <?= form_open('Pages/income_statement/'); ?>
            <div class="modal-body">
                <div class="quick-ranges">
                    <button type="button" data-range="today">Today</button>
                    <button type="button" data-range="week">This Week</button>
                    <button type="button" data-range="month">This Month</button>
                    <button type="button" data-range="year">This Year</button>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Date From</label>
                        <input required type="date" id="df" value="<?= $filtered ? htmlentities($df) : date('Y-m-01'); ?>" class="form-control" name="df" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Date To</label>
                        <input required type="date" id="dt" value="<?= $filtered ? htmlentities($dt) : date('Y-m-d'); ?>" class="form-control" name="dt" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-m cancel" data-dismiss="modal"><i class="ph ph-x"></i>Cancel</button>
                <button type="submit" name="submit" class="btn-m save"><i class="ph ph-chart-line-up"></i>Generate Report</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
$(function(){
    var today = new Date();
    function iso(d){ return d.toISOString().slice(0,10); }
    $('.quick-ranges button').on('click', function(){
        var f, t = today;
        switch($(this).data('range')){
            case 'today': f = today; break;
            case 'week':  f = new Date(today); f.setDate(today.getDate() - today.getDay()); break;
            case 'month': f = new Date(today.getFullYear(), today.getMonth(), 1); break;
            case 'year':  f = new Date(today.getFullYear(), 0, 1); break;
        }
        $('#df').val(iso(f));
        $('#dt').val(iso(t));
    });
});
</script>
