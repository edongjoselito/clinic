<!-- start page title -->
<?php 
    $p = $this->Page_model->one_cond_get_single_row('patients','id',$d->patient_id);
    $data = $this->Page_model->one_cond_loop('appointment','patient_id',$p->id);
        
    $a = $this->Page_model->one_cond_get_single_row('appointment','id',$d->appointment_id);
?>
<div class="row">
                            <div class="col-sm-12">
                            <div class="profile-bg-picture" style="background-image:url('<?php echo base_url(); ?>assets/images/bg-profile.jpg')">
                                    <span class="picture-bg-overlay"></span>
                                    <!-- overlay -->
                                </div>
                                <!-- meta -->
                                <div class="profile-user-box">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="profile-user-img"><img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-lg rounded-circle"></div>
                                            <div class="">
                                                <h4 class="mt-5 font-18 ellipsis"><?= $p->first_name.' '.$p->middle_name.' '.$p->last_name; ?></h4>
                                                <p class="font-13"><?=$p->occupation; ?></p>
                                                <p class="text-muted mb-0"><small><?= strtoupper($p->sitio.' '.$p->barangay.' '.$p->city_mun.''.$p->province); ?></small></p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!--/ meta -->
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <div class="card p-0">
                                    <div class="card-body p-0">
                                        <ul class=" nav nav-tabs tabs-bordered nav-justified">
                                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#projects">HISTORY</a></li>
                                        </ul>

                                        <div class="tab-content m-0 p-4">

                                            <div id="aboutme" class="tab-pane active">

                                                <!-- profile -->
                                                <div id="projects" class="tab-pane">
                                                    <div class="row m-t-10">
                                                        <div class="col-md-12">
                                                            <div class="portlet"><!-- /primary heading -->
                                                                <div id="portlet2" class="panel-collapse collapse show">
                                                                    <div class="portlet-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table mb-0">
                                                                                <thead>
                                                                                    <tr>
                                                                                    <tr>
                                                                                        <th>DOA</th> 		
                                                                                        <th>AGE</th> 	
                                                                                        <th>EDD</th> 	
                                                                                        <th>LMP</th> 	
                                                                                        <th>B P</th> 	
                                                                                        <th>WEIGHT</th> 	
                                                                                        <th>G</th> 	
                                                                                        <th>A</th> 	
                                                                                        <th>P</th> 	
                                                                                        <th>L</th> 	
                                                                                        <th>TRANSACTION</th> 	
                                                                                    </tr>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                <?php foreach($data as $row){?>
                                                                                    <tr>
                                                                                    <td><?= strtoupper($row->visit_date); ?></td>
                                                                                        <td><?= strtoupper($row->age); ?></td>
                                                                                        <td><?= strtoupper($row->date_of_delivery); ?></td>
                                                                                        <td><?= strtoupper($row->lmp); ?></td>
                                                                                        <td><?= strtoupper($row->bp); ?></td>
                                                                                        <td><?= strtoupper($row->weight); ?></td>
                                                                                        <td><?= strtoupper($row->gravida); ?></td>
                                                                                        <td><?= strtoupper($row->abortion); ?></td>
                                                                                        <td><?= strtoupper($row->parity); ?></td>
                                                                                        <td><?= strtoupper($row->living); ?></td>
                                                                                        <td><?= strtoupper($row->transaction); ?></td>
                                                                                    </tr>
                                                                                <?php } ?>    

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- /Portlet -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div> 
                                    </div>
                                </div>
                            <!-- end page title -->

                        </div>
                        <!-- end row -->

                        <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4"><?= $title; ?></h4>
                                        <?php 
                                            $attributes = array('class' => 'parsley-examples');
                                            echo form_open(base_url().'Pages/diagnose_edit/', $attributes);
                                        ?>
                                        <input type="hidden" name="patient_id" value="<?= $p->id; ?>"/>
                                        <input type="hidden" name="appointment_id" value="<?= $a->id; ?>"/>
                                        <input type="hidden" name="user_id" value="<?= $this->session->id; ?>"/>
                                        <input type="hidden" name="d_id" value="<?= $this->uri->segment(3); ?>"/>

                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">Fullname</label>
                                                    <input type="text" readonly value="<?= strtoupper($p->first_name.' '.$p->middle_name.' '.$p->last_name); ?>" required class="form-control" name="first_name" placeholder="First Name" />
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">Transaction</label>
                                                    <input required type="text" value="<?= $a->transaction; ?>" class="form-control" name="trasaction" readonly />
                                                </div>

                                        </div> 

                                        <div class="form-row">
                                            <div class="form-group col-md-6"> 
                                                <textarea class="form-control" rows="5" id="example-textarea" placeholder="Laboratory" name="lab"><?= $d->lab; ?></textarea>  
                                            </div>
                                            <div class="form-group col-md-6"> 
                                                <textarea class="form-control" rows="5" id="example-textarea" placeholder="Diagnosis" name="diagnosis"><?= $d->diagnosis; ?></textarea>
                                            </div>
                                        </div> 

                                        <div class="form-row">
                                            <div class="form-group col-md-6"> 
                                                <textarea class="form-control" rows="5" id="example-textarea" placeholder="Treatment" name="treatment"><?= $d->treatment; ?></textarea>
                                            </div>
                                            <div class="form-group col-md-6"> 
                                            <textarea class="form-control" rows="5" id="example-textarea" placeholder="remarks" name="remarks"><?= $d->remarks; ?></textarea>
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                                    <input type="submit" name="submit" value="Update Diagnoses" class="btn btn-primary waves-effect waves-light mr-1" />
                                                
                                            </div>

                                </div>
                            </div>
                        </div>