<style>
.referrals-list-wrapper {
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
.btn-add {
    background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%);
    border: none;
    color: white;
    padding: 10px 25px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.btn-add:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(67, 160, 71, 0.4);
    color: white;
}
.btn-action {
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    margin-right: 5px;
    transition: all 0.3s ease;
}
.btn-action:hover {
    transform: translateY(-1px);
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

<div class="referrals-list-wrapper">

<!-- Page Header -->
<div class="row">
    <div class="col-12">
        <div class="form-hero">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2><i class="ph ph-handshake mr-2"></i>Referrals Management</h2>
                    <p>Manage referral partners and contacts</p>
                </div>
                <div class="col-md-4 text-md-right">
                    <a data-toggle="modal" class="open-AddBookDialog btn btn-add" href="#new">
                        <i class="ph ph-plus"></i>New Referral
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

<!-- Referrals Table -->
<div class="row">
    <div class="col-12">
        <div class="card table-card">
            <div class="card-header">
                <h5><span class="section-icon"><i class="ph ph-address-book"></i></span>Referral Partners</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-modern">
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row): ?>
                            <tr>
                                <td>
                                    <strong><?= $row->company; ?></strong>
                                </td>
                                <td><?= $row->address; ?></td>
                                <td><?= $row->contact; ?></td>
                                <td>
                                    <a data-toggle="modal" class="open-AddBookDialog btn btn-success btn-action" href="#edit<?= $row->id; ?>">
                                        <i class="ph ph-pencil-simple"></i>Edit
                                    </a>
                                    <a class="btn btn-danger btn-action" onclick="return confirm('Are you sure you want to delete this referral?')" href="<?= base_url()?>Pages/referral_delete/<?= $row->id; ?>">
                                        <i class="ph ph-trash"></i>Delete
                                    </a>

                                    <div id="edit<?= $row->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Update Referral</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                <?= form_open('Pages/referral_list'); ?>
                                            
                                                    <div class="form-group">
                                                        <label>Company</label>
                                                        <input type="text" name="company" value="<?= $row->company; ?>" required class="form-control">
                                                        <input type="hidden" name="id" value="<?= $row->id; ?>" required class="form-control">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" name="address" value="<?= $row->address; ?>" required class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Contact</label>
                                                        <input type="text" name="contact" value="<?= $row->contact; ?>" required class="form-control">
                                                    </div>
                                                    
                                                    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ph ph-x"></i>Cancel</button>
                                                        <button type="submit" name="edit" class="btn btn-primary"><i class="ph ph-floppy-disk"></i>Update</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Referral Modal -->
<div id="new" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add New Referral</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('Pages/referral_list'); ?>
    
                <div class="form-group">
                    <label>Company</label>
                    <input type="text" name="company" value="" required class="form-control">
                </div>
                    
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" value="" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" name="contact" value="" required class="form-control">
                </div>                       
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ph ph-x"></i>Cancel</button>
                    <button type="submit" name="add" class="btn btn-primary"><i class="ph ph-plus"></i>Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
