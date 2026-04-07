                        
           <SCRIPT language=Javascript>
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode != 46 && charCode > 31 
              && (charCode < 48 || charCode > 57))
              return false;

            return true;
        }
      </SCRIPT>             
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                <?php if($this->session->flashdata('success')) : ?>

                                        <?= '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>'
                                                .$this->session->flashdata('success'). 
                                            '</div>'; 
                                        ?>
                                        <?php endif; ?>

                                        <?php if($this->session->flashdata('danger')) : ?>
                                        <?= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>'
                                                .$this->session->flashdata('danger'). 
                                            '</div>'; 
                                        ?>
                                        <?php endif;  ?>
                                        <a data-toggle="modal" class="open-AddBookDialog btn btn-success" href="#new">Add New Item</a>
                                
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        
                                        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                                <tr>
                                                    <th>ITEM ID</th>
                                                    <th>Description</th>
                                                    <th>Quantity</th>
                                                    <th>Sold Out</th>
                                                    <th>Price</th>
                                                    <th>Purchases Price</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach($data as $row){ ?>
                                                <tr>
                                                    <td><?= $row->id; ?></td>
                                                    <td><?= $row->description; ?></td>
                                                    <td><?= $row->quantity; ?></td>
                                                    <td><?= $row->sold_out; ?></td>
                                                    <td><?= $row->price; ?></td>
                                                    <td><?= $row->purchases_price; ?></td>
                                                    <td>
                                                        <a data-toggle="modal" class="open-AddBookDialog btn btn-success btn-sm" href="#edit<?= $row->id; ?>">Update</a>
                                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" href="<?= base_url()?>Pages/item_delete/<?= $row->id; ?>">Delete</a>
                                                        
                                                        
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
                                                                            <input type="text" name="description"  value="<?= $row->description; ?>" required class="form-control" >
                                                                            <input type="hidden" name="id"  value="<?= $row->id; ?>" required class="form-control" >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Selling Price</label>
                                                                            <input type="text" onkeypress="return isNumberKey(event)" name="price"  value="<?= $row->price; ?>" required class="form-control" >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Purchases Price</label>
                                                                            <input type="text" onkeypress="return isNumberKey(event)" name="purchases_price"  value="<?= $row->purchases_price; ?>" required class="form-control" >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Quantity</label>
                                                                            <input type="text" onkeypress="return isNumberKey(event)" name="quantity"  value="<?= $row->quantity; ?>" required class="form-control" >
                                                                        </div>
                                                                        
                                                                        
                                                                    <div class="modal-footer">
                                                                        <input type="submit" name="edit" class="btn btn-primary waves-effect waves-light" value="UPDATE" />
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div> 
                                                        </div> 
                                                    </td>
                                                    
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


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
                                                            <input type="text" name="description"  value="" required class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Selling Price</label>
                                                            <input type="text" onkeypress="return isNumberKey(event)" name="price"  value="" required class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Purchases Price</label>
                                                            <input type="text" onkeypress="return isNumberKey(event)" name="purchases_price"  value="" required class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input type="text" onkeypress="return isNumberKey(event)" name="quantity"  value="" required class="form-control" >
                                                        </div>
                                                        
                                                        
                                                    <div class="modal-footer">
                                                        <input type="submit" name="add" class="btn btn-primary waves-effect waves-light" value="CREATE" />
                                                    </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div> 
                                        </div>  
                        