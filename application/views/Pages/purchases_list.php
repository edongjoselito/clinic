                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                <a class="btn btn-success" href="patient_add">New Purchase</a>
                                
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
                                                    <th>Company</th>
                                                    <th>Address</th> 
                                                    <th>Contact</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach($data as $row){ ?>
                                                <tr>
                                                    <td><?= $row->company; ?></td>
                                                    <td><?= $row->address; ?></td>
                                                    <td><?= $row->contact; ?></td>
                                                    <td>
                                                        <a class="btn btn-success btn-sm" href="#">Edit</a>
                                                        <a class="btn btn-danger btn-sm" href="#">Delete</a>
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
                        