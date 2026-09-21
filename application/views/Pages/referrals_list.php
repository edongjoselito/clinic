<?php $total_refs = is_array($data) ? count($data) : 0; ?>
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

/* ===== Flash ===== */
.admin-wrap .alert { border-radius: 10px; border: none; font-size: 14px; padding: 13px 18px; }
.admin-wrap .alert-success { background: #e8f5e9; color: #2e7d32; }
.admin-wrap .alert-danger { background: #fdecea; color: #c62828; }

/* ===== Card & table ===== */
.data-card { border: none; border-radius: 14px; box-shadow: 0 2px 14px rgba(20,40,70,0.07); margin-bottom: 24px; overflow: hidden; }
.data-card .card-header { background: #fff; border-bottom: 1px solid #eef2f6; padding: 18px 24px; display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap; }
.data-card .card-header h5 { margin: 0; font-weight: 700; color: #1c2b3a; font-size: 15px; display: flex; align-items: center; gap: 10px; }
.data-card .card-header h5 i { color: #1e88e5; font-size: 18px; }
.data-card .card-body { padding: 0; }
.count-badge { background: #e8f4fd; color: #1565c0; font-size: 12px; font-weight: 700; padding: 4px 12px; border-radius: 12px; }
.hdr-meta { font-size: 13px; color: #8a9bb0; font-weight: 500; }

.data-card .dataTables_wrapper > .row { margin: 0; padding: 14px 24px; align-items: center; }
.data-card .dataTables_wrapper > .row > div { padding: 0; }
.data-card .dataTables_wrapper > .row:first-child { border-bottom: 1px solid #f0f4f8; }
.data-card .dataTables_wrapper > .row:last-child { border-top: 1px solid #f0f4f8; }
.data-card .dataTables_length label, .data-card .dataTables_filter label { margin: 0; color: #6c7d8f; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 8px; }
.data-card .dataTables_length select { height: 34px; border: 1px solid #dfe7ee; border-radius: 8px; padding: 0 8px; font-size: 13px; color: #3d4f63; background: #fff; }
.data-card .dataTables_filter input { height: 36px; border: 1px solid #dfe7ee; border-radius: 8px; padding: 0 12px; font-size: 13.5px; min-width: 200px; }
.data-card .dataTables_filter input:focus { outline: none; border-color: #1e88e5; box-shadow: 0 0 0 3px rgba(30,136,229,.1); }
.data-card .dataTables_info { padding: 0; color: #6c7d8f; font-size: 13px; }
.data-card .dataTables_paginate .pagination { margin: 0; }
.data-card .page-link { border-radius: 8px !important; margin-left: 4px; border: 1px solid #e3eaf1; color: #3d4f63; font-weight: 600; font-size: 13px; padding: 6px 12px; }
.data-card .page-item.active .page-link { background: #1e88e5; border-color: #1e88e5; color: #fff; }
.data-card .page-item.disabled .page-link { color: #b8c4d0; }

.table-modern { margin-bottom: 0; width: 100% !important; }
.table-modern thead th { background: #f8fafc; border-bottom: 1px solid #eef2f6; border-top: none; font-weight: 700; color: #5a6b7d; font-size: 11.5px; text-transform: uppercase; letter-spacing: 0.6px; padding: 13px 18px; }
.table-modern td { vertical-align: middle; border-color: #f2f5f8; padding: 14px 18px; font-size: 14px; color: #3d4f63; }
.table-modern th:first-child, .table-modern td:first-child { padding-left: 24px; }
.table-modern th:last-child, .table-modern td:last-child { padding-right: 24px; }
.table-modern th.sorting_disabled::before, .table-modern th.sorting_disabled::after { display: none; }
.table-modern tbody tr:hover { background: #fafcfe; }
.cell-main { font-weight: 700; color: #1c2b3a; }
.cell-sub { font-size: 12px; color: #8a9bb0; margin-top: 3px; display: flex; align-items: center; gap: 5px; }
.cell-sub i { font-size: 13px; }

.actions-cell { white-space: nowrap; text-align: right; }
.act { width: 32px; height: 32px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; font-size: 15px; border: 1px solid transparent; text-decoration: none; transition: all .15s ease; }
.act + .act { margin-left: 6px; }
.act-edit { background: #e8f4fd; color: #1565c0; border-color: #cfe8fa; }
.act-edit:hover { background: #1e88e5; color: #fff; }
.act-del { background: #fdecea; color: #c62828; border-color: #f5c6c0; }
.act-del:hover { background: #e53935; color: #fff; }

.empty-state { text-align: center; padding: 56px 20px; color: #8a9bb0; }
.empty-state > i { font-size: 42px; color: #cfe3f5; display: block; margin-bottom: 10px; }
.empty-state p { margin: 0 0 4px; font-weight: 600; color: #5a6b7d; }
.empty-state span { font-size: 13px; }

/* ===== Modals ===== */
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
</style>

<div class="admin-wrap">

<!-- Page Header -->
<div class="mhero">
    <div class="mhero-inner">
        <div>
            <h2><i class="ph ph-handshake"></i>Referral Partners</h2>
            <p>Companies and providers who refer patients to the clinic</p>
        </div>
        <div class="hero-right">
            <div class="hero-stat">
                <i class="ph ph-address-book"></i>
                <div>
                    <div class="stat-count"><?= number_format($total_refs); ?></div>
                    <div class="stat-label">Partners</div>
                </div>
            </div>
            <a data-toggle="modal" href="#new" class="btn-hero"><i class="ph ph-plus"></i>New Referral</a>
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
<?php if($this->session->flashdata('danger')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <?= htmlentities($this->session->flashdata('danger')); ?>
    </div>
<?php endif; ?>

<!-- Referrals Table -->
<div class="card data-card">
    <div class="card-header">
        <h5><i class="ph ph-address-book"></i>Referral Partners <span class="count-badge"><?= number_format($total_refs); ?></span></h5>
        <span class="hdr-meta">Shown on the referral dropdown when booking appointments</span>
    </div>
    <div class="card-body">
        <?php if(empty($data)): ?>
            <div class="empty-state">
                <i class="ph ph-handshake"></i>
                <p>No referral partners yet</p>
                <span>Add a partner using the New Referral button above.</span>
            </div>
        <?php else: ?>
        <div class="table-responsive">
            <table id="datatable" class="table table-modern">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row): ?>
                    <tr>
                        <td><div class="cell-main"><?= htmlentities($row->company); ?></div></td>
                        <td><?= $row->address !== '' ? htmlentities($row->address) : '<span class="cell-sub">—</span>'; ?></td>
                        <td><?= $row->contact !== '' ? htmlentities($row->contact) : '<span class="cell-sub">—</span>'; ?></td>
                        <td class="actions-cell">
                            <a data-toggle="modal" href="#edit<?= $row->id; ?>" class="act act-edit" title="Edit referral"><i class="ph ph-pencil-simple"></i></a>
                            <a href="<?= base_url(); ?>Pages/referral_delete/<?= $row->id; ?>" class="act act-del" title="Delete referral" data-toggle="tooltip" onclick="return confirm('Delete <?= htmlentities($row->company, ENT_QUOTES); ?>? This cannot be undone.')"><i class="ph ph-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>

</div>

<!-- Edit Referral Modals -->
<?php foreach($data as $row): ?>
<div id="edit<?= $row->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="ph ph-pencil-simple"></i>Edit Referral</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <?= form_open('Pages/referral_list'); ?>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?= (int) $row->id; ?>">
                <div class="form-group">
                    <label>Company</label>
                    <input type="text" name="company" value="<?= htmlentities($row->company, ENT_QUOTES); ?>" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" value="<?= htmlentities($row->address, ENT_QUOTES); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" name="contact" value="<?= htmlentities($row->contact, ENT_QUOTES); ?>" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-m cancel" data-dismiss="modal"><i class="ph ph-x"></i>Cancel</button>
                <button type="submit" name="edit" class="btn-m save"><i class="ph ph-check"></i>Update Referral</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- New Referral Modal -->
<div id="new" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="ph ph-handshake"></i>New Referral Partner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <?= form_open('Pages/referral_list'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Company</label>
                    <input type="text" name="company" required class="form-control" placeholder="e.g. St. Luke's Medical Center" autofocus>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Optional">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" name="contact" class="form-control" placeholder="Phone or email">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-m cancel" data-dismiss="modal"><i class="ph ph-x"></i>Cancel</button>
                <button type="submit" name="add" class="btn-m save"><i class="ph ph-plus"></i>Add Referral</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
$(function(){
    $('[data-toggle="tooltip"]').tooltip({ container: 'body' });
});
</script>
