<?php
$filtered = isset($df) && isset($dt);
$rows = isset($data) ? $data : array();
$total = 0;
foreach ($rows as $r) {
    $total += (float) str_replace(',', '', (string) $r->amount);
}
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
.btn-hero:hover { background: #e3f2fd; color: #0d47a1; text-decoration: none; }

/* ===== Card & table ===== */
.data-card { border: none; border-radius: 14px; box-shadow: 0 2px 14px rgba(20,40,70,0.07); margin-bottom: 24px; overflow: hidden; }
.data-card .card-header { background: #fff; border-bottom: 1px solid #eef2f6; padding: 18px 24px; display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap; }
.data-card .card-header h5 { margin: 0; font-weight: 700; color: #1c2b3a; font-size: 15px; display: flex; align-items: center; gap: 10px; }
.data-card .card-header h5 i { color: #1e88e5; font-size: 18px; }
.data-card .card-body { padding: 0; }
.count-badge { background: #e8f4fd; color: #1565c0; font-size: 12px; font-weight: 700; padding: 4px 12px; border-radius: 12px; }
.hdr-meta { font-size: 13px; color: #8a9bb0; font-weight: 500; }
.period-pill { display: inline-flex; align-items: center; gap: 7px; background: #e8f4fd; color: #1565c0; font-size: 12.5px; font-weight: 700; padding: 6px 14px; border-radius: 20px; }
.period-pill i { font-size: 14px; }

.table-modern { margin-bottom: 0; width: 100% !important; }
.table-modern thead th { background: #f8fafc; border-bottom: 1px solid #eef2f6; border-top: none; font-weight: 700; color: #5a6b7d; font-size: 11.5px; text-transform: uppercase; letter-spacing: 0.6px; padding: 13px 18px; }
.table-modern td { vertical-align: middle; border-color: #f2f5f8; padding: 14px 18px; font-size: 14px; color: #3d4f63; }
.table-modern tfoot td { background: #f8fafc; border-top: 2px solid #e3eaf1; font-weight: 700; color: #1c2b3a; padding: 14px 18px; font-size: 14px; }
.table-modern th:first-child, .table-modern td:first-child { padding-left: 24px; }
.table-modern th:last-child, .table-modern td:last-child { padding-right: 24px; }
.table-modern tbody tr:hover { background: #fafcfe; }
.cell-main { font-weight: 700; color: #1c2b3a; }
.cell-sub { font-size: 12px; color: #8a9bb0; margin-top: 3px; }
.cell-date { font-weight: 600; color: #1c2b3a; white-space: nowrap; }
.text-money { font-weight: 700; color: #1c2b3a; font-variant-numeric: tabular-nums; white-space: nowrap; }
.or-pill { font-size: 12px; font-weight: 600; color: #5a6b7d; background: #f1f5f9; padding: 3px 10px; border-radius: 6px; }

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
</style>

<div class="admin-wrap">

<!-- Page Header -->
<div class="mhero">
    <div class="mhero-inner">
        <div>
            <h2><i class="ph ph-receipt"></i>Expenses Summary</h2>
            <p>Expense report by date range</p>
        </div>
        <div class="hero-right">
            <?php if($filtered): ?>
            <div class="hero-stat">
                <i class="ph ph-money"></i>
                <div>
                    <div class="stat-count">&#8369;<?= number_format($total, 2); ?></div>
                    <div class="stat-label">Total Spent</div>
                </div>
            </div>
            <div class="hero-stat">
                <i class="ph ph-files"></i>
                <div>
                    <div class="stat-count"><?= number_format(count($rows)); ?></div>
                    <div class="stat-label">Records</div>
                </div>
            </div>
            <?php endif; ?>
            <a data-toggle="modal" href="#filterModal" class="btn-hero"><i class="ph ph-funnel"></i><?= $filtered ? 'Change Range' : 'Generate Report'; ?></a>
        </div>
    </div>
</div>

<!-- Report Results -->
<div class="card data-card">
    <div class="card-header">
        <h5><i class="ph ph-file-doc"></i>Expense Report <?= $filtered ? '<span class="count-badge">' . number_format(count($rows)) . '</span>' : ''; ?></h5>
        <?php if($filtered): ?>
        <span class="period-pill"><i class="ph ph-calendar-dots"></i><?= date('M d, Y', strtotime($df)); ?> &ndash; <?= date('M d, Y', strtotime($dt)); ?></span>
        <?php else: ?>
        <span class="hdr-meta">Pick a date range to generate</span>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <?php if(!$filtered): ?>
            <div class="empty-state">
                <i class="ph ph-calendar-dots"></i>
                <p>No report generated yet</p>
                <span>Choose a date range to see expenses.</span><br>
                <button class="btn-hero-inline" data-toggle="modal" data-target="#filterModal"><i class="ph ph-funnel"></i>Select Date Range</button>
            </div>
        <?php elseif(empty($rows)): ?>
            <div class="empty-state">
                <i class="ph ph-receipt"></i>
                <p>No expenses in this period</p>
                <span>Nothing recorded between <?= date('M d', strtotime($df)); ?> and <?= date('M d, Y', strtotime($dt)); ?>.</span><br>
                <button class="btn-hero-inline" data-toggle="modal" data-target="#filterModal"><i class="ph ph-funnel"></i>Try another range</button>
            </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>O.R. No.</th>
                        <th class="text-right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $row):
                        $ts = strtotime($row->date);
                    ?>
                    <tr>
                        <td><span class="cell-date"><?= $ts !== false ? date('M d, Y', $ts) : htmlentities($row->date); ?></span></td>
                        <td><div class="cell-main"><?= htmlentities($row->description); ?></div></td>
                        <td><?= $row->or_no !== '' ? '<span class="or-pill">' . htmlentities($row->or_no) . '</span>' : '<span class="cell-sub">—</span>'; ?></td>
                        <td class="text-right text-money">&#8369;<?= number_format((float) str_replace(',', '', (string) $row->amount), 2); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Total &middot; <?= number_format(count($rows)); ?> expense<?= count($rows) !== 1 ? 's' : ''; ?></td>
                        <td class="text-right text-money">&#8369;<?= number_format($total, 2); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>

</div>

<!-- Filter Modal -->
<div id="filterModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="ph ph-funnel"></i>Report Date Range</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <?= form_open('Pages/expenses_summary/'); ?>
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
