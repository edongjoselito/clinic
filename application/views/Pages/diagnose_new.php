<!-- start page title -->
<?php 
    $p = $this->Page_model->one_cond_get_single_row('patients','id',$a->patient_id);
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
                                        <a href="<?= base_url(); ?>pages/capture/<?= $p->id; ?>"><img src="<?= base_url().'uploads/profile/'.$p->image_path; ?>" alt="" class="avatar-lg rounded-circle"></a>
                                            <div class="">
                                                <h4 class="mt-5 font-18 ellipsis"><?= $p->first_name.''.$p->middle_name.''.$p->last_name; ?></h4>
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
                                                                        <table class="table table-striped mb-0">
                                                                                <thead>
                                                                                    <tr>
                                                                                    <tr>
                                                                                        <th>DIAGNOSED BY:</th>
                                                                                        <th>DOA</th> 		
                                                                                        <th>AGE</th> 	
                                                                                        <th>EDD</th> 	
                                                                                        <th>LMP</th> 	
                                                                                        <th>B P</th> 	
                                                                                        <th>WEIGHT</th> 	
                                                                                        <th>G</th> 	
                                                                                        <th>P</th> 	
                                                                                        <th>T</th>
                                                                                        <th>P</th> 
                                                                                        <th>A</th>	
                                                                                        <th>L</th> 	
                                                                                        <th>TRANSACTION</th> 
                                                                                        <th>LABORATORY</th>
                                                                                        <th>DIAGNOSIS</th>
                                                                                        <th>TREATMENT</th>
                                                                                        <th>REMARKS</th>
                                                                                        <th>MANAGE</th>	
                                                                                    </tr>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                <?php 
                                                                                $data = $this->Page_model->one_cond_loop('diagnose','patient_id',$a->patient_id);
                                                                                foreach($data as $row){
                                                                                    $app = $this->Page_model->one_cond_get_single_row('appointment','id',$row->appointment_id);
                                                                                    $user = $this->Page_model->one_cond_get_single_row('users','id',$row->user_id);
                                                                                ?>
                                                                                    <tr>
                                                                                        <td><?php if(isset($user->id)){echo htmlentities($user->last_name.', '.$user->first_name.' '.substr($user->middle_name, 0, 1).'.');} ?></td>
                                                                                        <td><?= strtoupper($app->visit_date); ?></td>
                                                                                        <td><?= strtoupper($app->age); ?></td>
                                                                                        <td><?= strtoupper($app->date_of_delivery); ?></td>
                                                                                        <td><?= strtoupper($app->lmp); ?></td>
                                                                                        <td><?= strtoupper($app->bp); ?></td>
                                                                                        <td><?= strtoupper($app->weight); ?></td>
                                                                                        <td><?= strtoupper($app->gravida); ?></td>
                                                                                        <td><?= strtoupper($app->parity); ?></td>
                                                                                        <td><?= strtoupper($app->term); ?></td>
                                                                                        <td><?= strtoupper($app->preterm); ?></td>
                                                                                        <td><?= strtoupper($app->abortion); ?></td>
                                                                                        <td><?= strtoupper($app->living); ?></td>
                                                                                        <td><?= strtoupper($app->transaction); ?></td>
                                                                                        <td><?= strtoupper($row->lab); ?></td>
                                                                                        <td><?= strtoupper($row->diagnosis); ?></td>
                                                                                        <td><?= strtoupper($row->treatment); ?></td>
                                                                                        <td><?= strtoupper($row->remarks); ?></td>
                                                                                        <td><a href="<?=base_url(); ?>Pages/diagnose_edit/<?= $row->id; ?>" class="btn btn-success" >EDIT</a> </td>
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
                                        <div class="col-lg-6">
                                        <p>
                                            Age : <b><?= $a->age; ?> Years Old</b><br />
                                            Blood Presure : <b><?= $a->bp; ?></b><br />
                                            Weight : <b><?= $a->weight; ?></b><br />
                                            LMP : <b><?= $a->lmp; ?></b><br />
                                            Estimated Date of Delivery : <b><?= $a->date_of_delivery; ?></b><br />
                                            Gravida : <b><?= $a->gravida; ?></b><br />
                                            Abortion : <b><?= $a->abortion; ?></b><br />
                                            Parity : <b><?= $a->parity; ?></b><br />
                                            Living : <b><?= $a->living; ?></b><br />
                                        
                                        </p>
                                        </div>
                                        <?php 
                                            $attributes = array('class' => 'parsley-examples');
                                            echo form_open('Pages/diagnose_add/', $attributes);
                                        ?>
                                        <input type="hidden" name="patient_id" value="<?= $p->id; ?>"/>
                                        <input type="hidden" name="appointment_id" value="<?= $a->id; ?>"/>
                                        <input type="hidden" name="user_id" value="<?= $this->session->id; ?>"/>

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
                                                <textarea class="form-control" rows="5" id="example-textarea" placeholder="Laboratory" name="lab"></textarea>  
                                            </div>
                                            <div class="form-group col-md-6"> 
                                                <textarea class="form-control" rows="5" id="example-textarea" placeholder="Diagnosis" name="diagnosis"></textarea>
                                            </div>
                                        </div> 

                                        <div class="form-row">
                                            <div class="form-group col-md-6"> 
                                                <textarea class="form-control" rows="5" id="example-textarea" placeholder="Treatment" name="treatment"></textarea>
                                            </div>
                                            <div class="form-group col-md-6"> 
                                            <textarea class="form-control" rows="5" id="example-textarea" placeholder="remarks" name="remarks"></textarea>
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                                    <input type="submit" name="submit" value="diagnose" class="btn btn-primary waves-effect waves-light mr-1" />
                                                
                                            </div>

                                </div>
                            </div>
                        </div>