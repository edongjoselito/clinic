<?php
    $p_name  = $p ? ucwords(strtolower(trim($p->first_name . ' ' . $p->last_name))) : 'Unknown Patient';
    $age     = trim((string) $a->age);
    $gender  = strtolower(trim((string) ($p->gender ?? '')));
    $initials = '';
    if ($p) { $initials = strtoupper(substr($p->first_name, 0, 1) . substr($p->last_name, 0, 1)); }
    $has_ob  = trim((string) $a->lmp) !== '' || trim((string) $a->date_of_delivery) !== '' || (int) $a->gravida || (int) $a->parity;
?>
<style>
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
.form-card, .table-card {
    border: none; border-radius: 14px; background: #fff;
    box-shadow: 0 2px 14px rgba(15, 40, 80, 0.07); margin-bottom: 24px; overflow: hidden;
}
.form-card .card-header, .table-card .card-header {
    background: #fff; border-bottom: 1px solid #eef2f7;
    padding: 18px 24px; display: flex; align-items: center; justify-content: space-between;
}
.form-card .card-header h5, .table-card .card-header h5 {
    margin: 0; font-size: 15.5px; font-weight: 700; color: #1c2b3a;
    display: flex; align-items: center; gap: 12px;
}
.section-icon {
    width: 38px; height: 38px; flex-shrink: 0;
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
    border-radius: 10px; display: inline-flex; align-items: center; justify-content: center;
}
.section-icon i { color: #1565c0; font-size: 19px; }
.count-badge {
    display: inline-flex; align-items: center; justify-content: center;
    min-width: 24px; height: 24px; padding: 0 8px; border-radius: 12px;
    background: #e3f2fd; color: #1565c0; font-size: 12px; font-weight: 700;
}
.header-link { font-size: 13px; font-weight: 600; color: #1565c0; display: inline-flex; align-items: center; gap: 5px; }
.header-link:hover { color: #0d47a1; text-decoration: none; }

/* ===== Vitals strip ===== */
.vitals {
    display: flex; flex-wrap: wrap; gap: 10px; padding: 20px 24px;
}
.vital {
    display: inline-flex; flex-direction: column; gap: 2px;
    background: #f8fbff; border: 1px solid #e3eefb; border-radius: 10px;
    padding: 10px 16px; min-width: 110px;
}
.vital .k { font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: .6px; color: #8a9bb0; }
.vital .v { font-size: 14.5px; font-weight: 700; color: #1565c0; }
.vital.wide { flex: 1; }

/* ===== Form ===== */
.form-card .card-body { padding: 24px; }
.form-group label {
    display: block; font-size: 12px; font-weight: 700; color: #54677c;
    text-transform: uppercase; letter-spacing: .6px; margin-bottom: 8px;
}
.form-group label .req { color: #e53935; }
.form-control {
    width: 100%; height: 44px; border: 1.5px solid #dde5ee; border-radius: 10px;
    padding: 0 14px; font-size: 14px; color: #1c2b3a; background: #fff;
    transition: border-color .2s, box-shadow .2s;
}
textarea.form-control { height: auto; padding: 12px 14px; line-height: 1.6; resize: vertical; }
.form-control:focus { border-color: #1e88e5; box-shadow: 0 0 0 3px rgba(30,136,229,.12); outline: none; }
.form-control[readonly] { background: #f5f8fb; color: #54677c; }
.form-hint { font-size: 12px; color: #8a9bb0; margin-top: 6px; }

/* ===== Buttons ===== */
.btn-submit {
    display: inline-flex; align-items: center; gap: 8px;
    background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
    border: none; color: #fff; height: 42px; padding: 0 26px;
    border-radius: 10px; font-weight: 600; font-size: 14px; cursor: pointer;
    transition: all .2s; box-shadow: 0 4px 14px rgba(30,136,229,.3);
}
.btn-submit:hover { transform: translateY(-1px); box-shadow: 0 6px 18px rgba(30,136,229,.4); }
.btn-cancel {
    display: inline-flex; align-items: center; gap: 8px;
    background: #f1f5f9; border: 1px solid #e2e8f0; color: #54677c;
    height: 42px; padding: 0 22px; border-radius: 10px; font-weight: 600; font-size: 14px;
}
.btn-cancel:hover { background: #e8eef4; color: #1c2b3a; text-decoration: none; }
.form-actions { display: flex; gap: 12px; margin-top: 8px; padding-top: 20px; border-top: 1px solid #f0f4f8; }

/* ===== History table ===== */
.table-modern { margin-bottom: 0; }
.table-modern thead th {
    background: #f8fafc; border: none; border-bottom: 1px solid #eef2f7;
    font-weight: 700; color: #54677c; font-size: 11px;
    text-transform: uppercase; letter-spacing: .7px; padding: 12px 14px; white-space: nowrap;
}
.table-modern tbody td {
    border-color: #f1f5f9; padding: 14px; vertical-align: top; font-size: 13px; color: #33475b;
}
.table-modern tbody tr:hover { background: #f8fbff; }
.cell-date { font-weight: 700; color: #1c2b3a; }
.cell-sub { font-size: 12px; color: #8a9bb0; margin-top: 3px; }
.cell-sub i { font-size: 13px; }
.vital-chip {
    display: inline-flex; gap: 4px; background: #f8fbff; border: 1px solid #e3eefb;
    border-radius: 7px; padding: 3px 9px; font-size: 12px; margin: 0 5px 5px 0;
}
.vital-chip .k { color: #8a9bb0; font-weight: 600; }
.vital-chip .v { color: #1565c0; font-weight: 700; }
.note { font-size: 13px; color: #33475b; line-height: 1.55; }
.note .lbl {
    font-size: 10.5px; font-weight: 700; text-transform: uppercase;
    letter-spacing: .5px; color: #8a9bb0;
}
.note.muted { color: #a8b6c6; font-style: italic; }
.tag {
    display: inline-flex; align-items: center; border-radius: 14px;
    padding: 3px 10px; font-size: 11.5px; font-weight: 700;
}
.tag.paid { background: #e8f5e9; color: #2e7d32; }
.tag.unpaid { background: #fff3e0; color: #e65100; }
.tag.type { background: #e8f0fe; color: #1565c0; }
.tag.spec { background: #f3e5f5; color: #7b1fa2; }
.btn-sm-action {
    display: inline-flex; align-items: center; gap: 5px; height: 30px; padding: 0 12px;
    border-radius: 8px; font-size: 12px; font-weight: 600;
    background: #eef4fb; color: #1565c0; transition: all .2s; white-space: nowrap;
}
.btn-sm-action:hover { background: #1e88e5; color: #fff; text-decoration: none; }
.empty-state { text-align: center; padding: 44px 20px; color: #8a9bb0; }
.empty-state > i { font-size: 40px; color: #d4dde8; display: block; margin-bottom: 10px; }
.empty-state p { margin: 0; font-size: 14px; }

@media (max-width: 767px) {
    .hero-card { padding: 22px 20px; }
    .hero-avatar { width: 52px; height: 52px; font-size: 20px; border-radius: 13px; }
    .hero-actions { width: 100%; }
    .vital { min-width: 46%; flex: 1; }
}
</style>

<div class="diagnose-wrapper">

<!-- ===== Hero ===== -->
<div class="hero-card">
    <div class="hero-left">
        <div class="hero-avatar"><?= $initials !== '' ? $initials : '<i class="ph ph-user"></i>'; ?></div>
        <div class="hero-title">
            <h2><i class="ph ph-stethoscope"></i> New Diagnosis</h2>
            <div class="hero-sub">Recording findings for <strong><?= htmlentities($p_name); ?></strong></div>
            <div class="hero-chips">
                <?php if($age !== ''): ?><span class="hero-chip"><i class="ph ph-calendar-blank"></i><?= htmlentities($age); ?> yrs</span><?php endif; ?>
                <?php if($gender !== ''): ?><span class="hero-chip"><i class="ph <?= $gender === 'female' ? 'ph-gender-female' : 'ph-gender-male'; ?>"></i><?= ucfirst($gender); ?></span><?php endif; ?>
                <?php if(trim((string) $a->visit_date) !== ''): ?><span class="hero-chip"><i class="ph ph-clock"></i>Visit <?= htmlentities($a->visit_date); ?></span><?php endif; ?>
                <?php if(trim((string) $a->transaction) !== ''): ?><span class="hero-chip"><i class="ph ph-tag"></i><?= htmlentities($a->transaction); ?></span><?php endif; ?>
                <?php if(!empty($history)): ?><span class="hero-chip"><i class="ph ph-files"></i><?= count($history); ?> prior diagnosis<?= count($history) !== 1 ? 'es' : ''; ?></span><?php endif; ?>
            </div>
        </div>
    </div>
    <div class="hero-actions">
        <?php if($p): ?>
        <a href="<?= base_url(); ?>Pages/patient_profile/<?= (int) $p->id; ?>" class="hero-cta"><i class="ph ph-user"></i>Profile</a>
        <?php endif; ?>
        <a href="<?= base_url(); ?>Pages/patient_queue" class="hero-cta"><i class="ph ph-arrow-left"></i>Back to Queue</a>
    </div>
</div>

<!-- ===== Patient Vitals ===== -->
<div class="card form-card">
    <div class="card-header">
        <h5><span class="section-icon"><i class="ph ph-pulse"></i></span>Vitals for this Visit</h5>
        <a href="<?= base_url(); ?>Pages/appointment_edit/<?= (int) $a->patient_id; ?>/<?= (int) $a->id; ?>" class="header-link"><i class="ph ph-pencil-simple"></i>Edit vitals</a>
    </div>
    <div class="vitals">
        <div class="vital"><span class="k">Age</span><span class="v"><?= $age !== '' ? htmlentities($age) : '—'; ?></span></div>
        <div class="vital"><span class="k">Blood Pressure</span><span class="v"><?= trim((string) $a->bp) !== '' ? htmlentities($a->bp) : '—'; ?></span></div>
        <div class="vital"><span class="k">Weight</span><span class="v"><?= trim((string) $a->weight) !== '' ? htmlentities($a->weight) . ' kg' : '—'; ?></span></div>
        <div class="vital"><span class="k">LMP</span><span class="v"><?= trim((string) $a->lmp) !== '' ? htmlentities($a->lmp) : '—'; ?></span></div>
        <div class="vital"><span class="k">EDD</span><span class="v"><?= trim((string) $a->date_of_delivery) !== '' ? htmlentities($a->date_of_delivery) : '—'; ?></span></div>
        <?php if($has_ob): ?>
        <div class="vital"><span class="k">G / P</span><span class="v"><?= (int) $a->gravida; ?> / <?= (int) $a->parity; ?></span></div>
        <div class="vital"><span class="k">T / P / A / L</span><span class="v"><?= (int) $a->term; ?> / <?= (int) $a->preterm; ?> / <?= (int) $a->abortion; ?> / <?= (int) $a->living; ?></span></div>
        <?php endif; ?>
    </div>
</div>

<!-- ===== Diagnosis Form ===== -->
<div class="card form-card">
    <div class="card-header">
        <h5><span class="section-icon"><i class="ph ph-note-pencil"></i></span>Diagnosis Entry</h5>
    </div>
    <div class="card-body">
        <?= form_open('Pages/diagnose_add/', array('class' => 'parsley-examples')); ?>
        <input type="hidden" name="patient_id" value="<?= (int) $a->patient_id; ?>"/>
        <input type="hidden" name="appointment_id" value="<?= (int) $a->id; ?>"/>
        <input type="hidden" name="user_id" value="<?= (int) $this->session->id; ?>"/>

        <div class="row">
            <div class="form-group col-md-6">
                <label>Patient</label>
                <input type="text" readonly value="<?= htmlentities($p_name); ?>" class="form-control" />
            </div>
            <div class="form-group col-md-6">
                <label>Medical Specialty</label>
                <select name="specialty_id" class="form-control">
                    <option value="">General / No Specialty</option>
                    <?php if(!empty($specialties)):
                        $current_category = '';
                        foreach($specialties as $specialty):
                            if($specialty->category !== $current_category):
                                if($current_category !== '') echo '</optgroup>';
                                $current_category = $specialty->category;
                                echo '<optgroup label="' . htmlentities(ucwords(str_replace('_', ' ', $current_category))) . '">';
                            endif;
                    ?>
                        <option value="<?= (int) $specialty->id; ?>"><?= htmlentities($specialty->name); ?></option>
                    <?php endforeach;
                        if($current_category !== '') echo '</optgroup>';
                    endif; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Diagnosis <span class="req">*</span></label>
            <textarea class="form-control" rows="3" name="diagnosis" placeholder="Primary diagnosis / assessment…"></textarea>
        </div>

        <div class="form-group">
            <label>Treatment Plan</label>
            <textarea class="form-control" rows="3" name="treatment" placeholder="Prescription, procedures, instructions…"></textarea>
        </div>

        <div class="form-group">
            <label>Laboratory Results</label>
            <textarea class="form-control" rows="2" name="lab" placeholder="Requested labs or results…"></textarea>
        </div>

        <div class="form-group">
            <label>Remarks</label>
            <textarea class="form-control" rows="2" name="remarks" placeholder="Follow-up notes, referrals…"></textarea>
        </div>

        <div class="form-actions">
            <button type="submit" name="submit" class="btn-submit"><i class="ph ph-floppy-disk"></i>Save Diagnosis</button>
            <a href="<?= base_url(); ?>Pages/patient_queue" class="btn-cancel"><i class="ph ph-x"></i>Cancel</a>
        </div>
        </form>
    </div>
</div>

<!-- ===== Diagnosis History ===== -->
<div class="card table-card">
    <div class="card-header">
        <h5><span class="section-icon"><i class="ph ph-files"></i></span>Diagnosis History <span class="count-badge"><?= count($history); ?></span></h5>
        <?php if($p): ?>
        <a href="<?= base_url(); ?>Pages/patient_profile/<?= (int) $p->id; ?>" class="header-link">Full history <i class="ph ph-arrow-right"></i></a>
        <?php endif; ?>
    </div>
    <div class="card-body" style="padding: 0;">
        <?php if(!empty($history)): ?>
        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th>Visit</th>
                        <th>Vitals</th>
                        <th>Findings</th>
                        <th>Attended By</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($history as $h):
                        $vdate    = $h->visit_date ?: $h->date;
                        $vdate_ts = $vdate ? strtotime($vdate) : false;
                        $doc = trim((string) $h->doc_last);
                        if ($doc !== '') { $doc = ucwords(strtolower($doc . ', ' . $h->doc_first)); }
                        $dx = trim((string) $h->diagnosis);
                        $tx = trim((string) $h->treatment);
                        $lb = trim((string) $h->lab);
                        $rm = trim((string) $h->remarks);
                        $ob = trim((string) $h->lmp) !== '' || trim((string) $h->date_of_delivery) !== '' || (int) $h->gravida || (int) $h->parity;
                    ?>
                    <tr>
                        <td style="white-space: nowrap;">
                            <div class="cell-date"><?= $vdate_ts ? date('M j, Y', $vdate_ts) : '—'; ?></div>
                            <?php if(trim((string) $h->transaction) !== ''): ?><div class="cell-sub"><span class="tag type"><?= htmlentities($h->transaction); ?></span></div><?php endif; ?>
                            <?php if(trim((string) $h->specialty_name) !== ''): ?><div class="cell-sub"><span class="tag spec"><?= htmlentities($h->specialty_name); ?></span></div><?php endif; ?>
                        </td>
                        <td>
                            <?php if($h->visit_age): ?><span class="vital-chip"><span class="k">Age</span><span class="v"><?= (int) $h->visit_age; ?></span></span><?php endif; ?>
                            <?php if(trim((string) $h->bp) !== ''): ?><span class="vital-chip"><span class="k">BP</span><span class="v"><?= htmlentities($h->bp); ?></span></span><?php endif; ?>
                            <?php if(trim((string) $h->weight) !== ''): ?><span class="vital-chip"><span class="k">Wt</span><span class="v"><?= htmlentities($h->weight); ?> kg</span></span><?php endif; ?>
                            <?php if($ob): ?>
                                <?php if(trim((string) $h->lmp) !== ''): ?><span class="vital-chip"><span class="k">LMP</span><span class="v"><?= htmlentities($h->lmp); ?></span></span><?php endif; ?>
                                <?php if(trim((string) $h->date_of_delivery) !== ''): ?><span class="vital-chip"><span class="k">EDD</span><span class="v"><?= htmlentities($h->date_of_delivery); ?></span></span><?php endif; ?>
                                <span class="vital-chip"><span class="k">G/P/T/P/A/L</span><span class="v"><?= (int)$h->gravida; ?>/<?= (int)$h->parity; ?>/<?= (int)$h->term; ?>/<?= (int)$h->preterm; ?>/<?= (int)$h->abortion; ?>/<?= (int)$h->living; ?></span></span>
                            <?php endif; ?>
                        </td>
                        <td style="min-width: 260px;"><?= findings_cell(
                                array('Diagnosis' => $dx, 'Treatment' => $tx, 'Laboratory' => $lb, 'Remarks' => $rm),
                                $p_name,
                                ($vdate_ts ? date('F j, Y', $vdate_ts) : '') . ($doc !== '' ? ' · ' . $doc : '')
                            ); ?></td>
                        <td>
                            <?php if($doc !== ''): ?><div class="cell-sub" style="margin-top:0;"><i class="ph ph-user-circle"></i> <?= htmlentities($doc); ?></div>
                            <?php else: ?><span class="note muted">—</span><?php endif; ?>
                        </td>
                        <td><span class="tag <?= (int) $h->payment_status === 1 ? 'paid' : 'unpaid'; ?>"><?= (int) $h->payment_status === 1 ? 'Paid' : 'Unpaid'; ?></span></td>
                        <td class="text-right">
                            <a href="<?= base_url(); ?>Pages/diagnose_edit/<?= (int) $h->id; ?>" class="btn-sm-action"><i class="ph ph-pencil-simple"></i>Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="empty-state">
            <i class="ph ph-clipboard-text"></i>
            <p>No previous diagnosis records for this patient.</p>
        </div>
        <?php endif; ?>
    </div>
</div>


<?= findings_modal(); ?>

</div>
