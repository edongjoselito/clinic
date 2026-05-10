<?php
$format_money = static function ($value) {
    if (is_string($value)) {
        $value = str_replace(array('PHP', 'php', ',', ' '), '', $value);
    }

    if (!is_numeric($value)) {
        $value = 0;
    }

    return number_format((float) $value, 2);
};
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <a data-toggle="modal" class="open-AddBookDialog btn btn-success" href="#new"><i class="ph ph-plus"></i>New Item</a>
            <div class="page-title-right">
                <h4 class="page-title"><?= isset($title) ? $title : 'Item List'; ?></h4>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<?php if($this->session->flashdata('success')): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= $this->session->flashdata('success'); ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if($this->session->flashdata('danger')): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= $this->session->flashdata('danger'); ?>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Sold Out</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Purchase Price</th>
                            <th>Manage</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($data as $row): ?>
                        <tr>
                            <td><?= $row->id; ?></td>
                            <td><?= $row->description; ?></td>
                            <td><?= $row->quantity; ?></td>
                            <td><?= $row->sold_out; ?></td>
                            <td class="text-right">PHP <?= $format_money($row->price); ?></td>
                            <td class="text-right">PHP <?= $format_money($row->purchases_price); ?></td>
                            <td>
                                <a data-toggle="modal" class="open-AddBookDialog btn btn-success btn-sm" href="#edit<?= $row->id; ?>"><i class="ph ph-pencil-simple"></i>Edit</a>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')" href="<?= base_url(); ?>Pages/item_delete/<?= $row->id; ?>"><i class="ph ph-trash"></i>Delete</a>

                                <div id="edit<?= $row->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editItemLabel<?= $row->id; ?>" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editItemLabel<?= $row->id; ?>">Update Item</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <?= form_open('Pages/item_list'); ?>

                                                <div class="form-group">
                                                    <label>Item Description</label>
                                                    <input type="text" name="description" value="<?= $row->description; ?>" required class="form-control">
                                                    <input type="hidden" name="id" value="<?= $row->id; ?>">
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

<div id="new" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="newItemLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newItemLabel">Add New Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('Pages/item_list'); ?>

                <div class="form-group">
                    <label>Item Description</label>
                    <input type="text" name="description" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Selling Price</label>
                    <input type="number" step="0.01" name="price" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Purchase Price</label>
                    <input type="number" step="0.01" name="purchases_price" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" required class="form-control">
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
