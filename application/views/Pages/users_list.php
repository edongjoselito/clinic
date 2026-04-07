                       <!-- start page title -->
                       <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                <a class="btn btn-success" href="<?= base_url(); ?>Pages/user_add">New User</a>
                                
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
                                                    <th>Username</th>
                                                    <th>Position</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach($data as $row){ ?>
                                                <tr>
                                                    <td><?= $row->username; ?></td>
                                                    <td><?= $row->position; ?></td>
                                                    <td>
                                                        <a data-toggle="modal" class="open-AddBookDialog btn btn-warning btn-sm" href="#edit<?= $row->id; ?>">Change Password</a>
                                                        <a href="user_update/<?= $row->id; ?>" class="btn btn-success">Edit</a>&nbsp;&nbsp;&nbsp;
                                                        <a href="user_delete/<?= $row->id; ?>" class="btn btn-danger">Delete</a>

                                                        <div id="edit<?= $row->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="myModalLabel">Update Password</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <?= form_open('Pages/users_list'); ?>
                                                        
                                                                    <div class="form-group">
                                                                        <label>New Password</label>
                                                                        <input type="text" name="password"  value="" required class="form-control" >
                                                                        <input type="hidden" value="<?= $row->id; ?>" name="id">
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
