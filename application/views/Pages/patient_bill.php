                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                <!-- <a data-toggle="modal" data-field="" data-id="" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">+ ADD NEW BILL</a> -->
                                <h3>PATIENT NEED TO PAY</h3>
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
                                                    <th>FULL NAME</th> 	
                                                    <th>AGE</th> 	
                                                    <th>ADDRESS</th> 	
                                                    <th>DIAGNOSIS</th> 	
                                                    <th>TREATMENT</th> 	
                                                    <th>REMARKS</th> 	
                                                    <th>MANAGE</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach($data as $row){ 
                                                    $p = $this->Page_model->one_cond_get_single_row('patients','id',$row->patient_id);
                                                    $a = $this->Page_model->one_cond_get_single_row('appointment','id',$row->patient_id);
                                                    ?>
                                                <tr>
                                                    <td><?= strtoupper($p->first_name.' '.$p->middle_name.' '.$p->last_name); ?></td>
                                                    <td><?= strtoupper($p->age); ?></td>
                                                    <td><?= strtoupper($p->sitio.' '.$p->barangay.' '.$p->city_mun.' '.$p->province); ?></td>
                                                    <td><?= strtoupper($row->diagnosis); ?></td>
                                                    <td><?= strtoupper($row->treatment); ?></td>
                                                    <td><?= strtoupper($row->remarks); ?></td>
                                                    <td>
                                                        <!-- <a href="diagnose/<?= $p->id; ?>" class="btn btn-primary">DIAGNOSE</a>  -->
                                                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg" style="float: right;">PAY</button>
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


                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myLargeModalLabel">CURRENT DIAGNOSIS</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>

                                                    <div class="modal-header">
                                                    
                                                    <table>
                                                        <tr>
                                                            <td style="width: 50px;">PATIENT NAME</td>
                                                            <td>: <?= strtoupper($p->first_name.' '.$p->middle_name.' '.$p->last_name); ?></td>
                                                        </tr>

                                                        <tr>
                                                         <td style="padding-right: 50px;">ADDRESS</td>
                                                            <td>: <?= strtoupper($p->sitio.' '.$p->barangay.' '.$p->city_mun.' '.$p->province); ?></td>
                                                        </tr>

                                                        <tr>
                                                         <td style="padding-right: 50px;">DIAGNOSIS</td>
                                                         <td>: <?= strtoupper($row->diagnosis); ?></td>
                                                        </tr>

                                                        <tr>
                                                         <td style="padding-right: 50px;">TREATMENT</td>
                                                         <td>: <?= strtoupper($row->treatment); ?></td>
                                                        </tr>

                                                        <tr>
                                                         <td style="padding-right: 50px;">REMARKS</td>
                                                         <td>: <?= strtoupper($row->remarks); ?></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="padding-right: 50px;">TRANSACTION</td>
                                                            <td>: <?= strtoupper($a->transaction); ?></td>
                                                        </tr>


                                                    </table>


                                                    </div>
                                                    <div class="modal-body">
    
                                                    <form method="post" action="<?php echo base_url('Page/patient_bill'); ?><?php echo base_url('Page/appointment_add'); ?><?php echo base_url('Page/patient_queue'); ?>">


                                                     
                                                       
                    
<!--                     
                                                    <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label >First Name</label>
                                    <input type="text" name="firstname" class="form-control" id="firstname" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label >Middle Name</label>
                                    <input type="text" name="middlename" class="form-control" id="middlename"required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label >Last name</label>
                                    <input type="text" name="lastname" class="form-control" id="lastname" required  />
                                </div>
                         </div>

                         <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label >Alias</label>
                                    <input type="text" name="alias" class="form-control" id="alias"required  />
                                </div>

                                <div class="form-group col-md-4">
                                    <label >Birth Place</label>
                                    <input type="text" name="birthplace" class="form-control" id="birthplace" required />
                                </div>



                                <div class="form-group col-md-4">
                                    <label >Birth Date</label>
                                    <input type="date" name="birthdate" class="form-control" id="birthdate" required  />
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label >Age</label>
                                    <input type="text" name="age" class="form-control" id="age" required />
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Civil Status</label>
                                    <select name="cstatus" class="form-control" id="cstatus" required>
                                    <option value="">Select Civil Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widow">Widow</option>
                                    </select>
                                </div>


                               <div class="form-group col-md-4">
                                <label>Gender</label>
                                <select name="gender" class="form-control" id="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                </select>
                            </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Purok</label>
                                    <input type="text" name="purok" class="form-control" id="purok" required  />
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Voter Status</label>
                                    <input type="text" name="voterstatus" class="form-control" id="voterstatus" required  />
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label >Voter's ID</label>
                                    <input type="text" name="voterID" class="form-control" id="voterID" required  />
                                </div>

                                <div class="form-group col-md-4">
                                    <label >National ID</label>
                                    <input type="text" name="nationalID" class="form-control" id="nationalID" required />
                                </div>

                                <div class="form-group col-md-4">
                                    <label >Email</label>
                                    <input type="email" name="email" class="form-control" id="email" required  />
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label >Contact Number</label>
                                    <input type="text" name="contact" class="form-control" id="contact" required  />
                                </div>

                                <div class="form-group col-md-8">
                                    <label >Occupation</label>
                                    <input type="text" name="occupation" class="form-control" id="occupation" required  />
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label >Citizenship</label>
                                    <input type="text" name="citizenship" class="form-control" id="citizenship" required />
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Year of Residency</label>
                                    <input type="text" name="yearStarted" class="form-control" id="yearStarted" placeholder="Example: January 21, 2012" required />
                                </div>

                                <div class="form-group col-md-3">
                                    <label >Income per Month</label>
                                    <input type="text" name="salary" class="form-control" id="salary" required />
                                </div>
                            </div> -->

                               

                             






                                                       

                                                        
                                                        <div class="modal-footer">
                                                        <input type="submit" name="save" value="Save Data" class="btn btn-primary waves-effect waves-light"/>
                                                         </div>
                                                         

                                                    </div>
                                                    
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                        