<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>

<style>
.item-list-wrapper {
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

<div class="item-list-wrapper">

<!-- Page Header -->
<div class="row">
    <div class="col-12">
        <div class="form-hero">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2><i class="mdi mdi-package-variant mr-2"></i>Item Management</h2>
                    <p>Manage inventory items and pricing</p>
                </div>
                <div class="col-md-4 text-md-right">
                    <a data-toggle="modal" class="open-AddBookDialog btn btn-add" href="#new">
                        <i class="mdi mdi-plus mr-1"></i>New Item
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

<!-- Items Table -->
<div class="row">
    <div class="col-12">
        <div class="card table-card">
            <div class="card-header">
                <h5><span class="section-icon"><i class="mdi mdi-package-variant-closed"></i></span>Inventory Items</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-modern">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Sold Out</th>
                                <th class="text-right">Price</th>
                                <th class="text-right">Purchase Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row): ?>
                            <tr>
                                <td><?= $row->id; ?></td>
                                <td>
                                    <strong><?= $row->description; ?></strong>
                                </td>
                                <td><?= $row->quantity; ?></td>
                                <td><?= $row->sold_out; ?></td>
                                <td class="text-right font-weight-bold">PHP <?= number_format($row->price, 2); ?></td>
                                <td class="text-right">PHP <?= number_format($row->purchases_price, 2); ?></td>
                                <td>
                                    <a data-toggle="modal" class="open-AddBookDialog btn btn-success btn-action" href="#edit<?= $row->id; ?>">
                                        <i class="mdi mdi-pencil mr-1"></i>Edit
                                    </a>
                                    <a class="btn btn-danger btn-action" onclick="return confirm('Are you sure you want to delete this item?')" href="<?= base_url()?>Pages/item_delete/<?= $row->id; ?>">
                                        <i class="mdi mdi-delete mr-1"></i>Delete
                                    </a>

                                    <div id="edit<?= $row->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Update Item</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                <?= form_open('Pages/item_list'); ?>
                                            
                                                    <div class="form-group">
                                                        <label>Item Description</label>
                                                        <input type="text" name="description" value="<?= $row->description; ?>" required class="form-control">
                                                        <input type="hidden" name="id" value="<?= $row->id; ?>" required class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Selling Price</label>
                                                        <input type="number" step="0.01" name="price" value="<?= $row->price; ?>" required class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Purchase Price</label>
                                                        <input type="number" step="0.01" name="purchases_price" value="<?= $row->purchases_price; ?>" required class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Quantity</label>
                                                        <input type="number" name="quantity" value="<?= $row->quantity; ?>" required class="form-control">
                                                    </div>
                                                    
                                                    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <input type="submit" name="edit" class="btn btn-primary" value="Update" />
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

<!-- Add Item Modal -->
<div id="new" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add New Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('Pages/item_list'); ?>
    
                <div class="form-group">
                    <label>Item Description</label>
                    <input type="text" name="description" value="" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Selling Price</label>
                    <input type="number" step="0.01" name="price" value="" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Purchase Price</label>
                    <input type="number" step="0.01" name="purchases_price" value="" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" value="" required class="form-control">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="add" class="btn btn-primary" value="Create" />
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>