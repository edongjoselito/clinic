                        
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
                                <a data-toggle="modal" class="open-AddBookDialog btn btn-success" href="#new">New Expenses</a>
                                
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
                                                    <th>Description</th> 
                                                    <th>Official Receipt</th> 
                                                    <th>Amount</th> 
                                                    <th>Date</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach($data as $row){ ?>
                                                <tr>
                                                    <td><?= $row->description; ?></td>
                                                    <td><?= $row->or_no; ?></td>
                                                    <td><?= $row->amount; ?></td>
                                                    <td><?= $row->date; ?></td>
                                                    <td>
                                                    <a data-toggle="modal" class="open-AddBookDialog btn btn-success btn-sm" href="#edit<?= $row->id; ?>">Update</a>
                                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" href="<?= base_url()?>Pages/expenses_delete/<?= $row->id; ?>">Delete</a>
                                                        
                                                        
                                                        <div id="edit<?= $row->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="myModalLabel">Update Expenses</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <?= form_open('Pages/expenses_list'); ?>
                                                        
                                                                    <div class="form-group">
                                                                        <label>Date</label>
                                                                        <input type="date" name="date"  value="<?= $row->date; ?>" required class="form-control" >
                                                                        <input type="hidden" name="id"  value="<?= $row->id; ?>" required class="form-control" >
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <input type="text" name="description"  value="<?= $row->description; ?>" required class="form-control" >
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label>Official Receipt</label>
                                                                        <input type="text" name="or_no"  value="<?= $row->or_no; ?>" required class="form-control" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>amount</label>
                                                                        <input type="text" name="amount"  value="<?= $row->amount; ?>" required class="form-control" >
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
                                                    <?= form_open('Pages/expenses_list'); ?>

                                                        <div class="form-group">
                                                            <label>Date</label>
                                                            <input type="date" name="date"  value="" required class="form-control" >
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <input type="text" name="description"  value="" required class="form-control" >
                                                        </div>
                                                         
                                                        <div class="form-group">
                                                            <label>Official Receipt</label>
                                                            <input type="text" name="or_no"  value="" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>amount</label>
                                                            <input type="text" name="amount"  value="" required class="form-control" >
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
                        