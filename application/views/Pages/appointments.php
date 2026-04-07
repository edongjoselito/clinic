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
                                                                                        <th>Manage</th>
                                                                                    </tr>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                <?php 
                                                                                $diag = $this->Page_model->one_cond_loop('diagnose','patient_id',$data->id);
                                                                                foreach($diag as $row){
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
                                                                                        <td><a class="btn btn-warning" href="<?= base_url(); ?>pages/appointment_edit/<?= $data->id; ?>/<?= $app->id; ?>">Edit</a></td>
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
                        
                        
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4"><?= $title; ?></h4>

                                        <?= validation_errors(); ?>

                                        <?php 
                                            $attributes = array('class' => 'parsley-examples');
                                            echo form_open('Pages/app_add', $attributes);
                                        ?>

                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <input type="hidden" name="p_id" value="<?= $data->id; ?>">
                                                    <label for="inputUsername" class="col-form-label">First Name</label>
                                                    <input type="text" readonly value="<?= strtoupper($data->first_name); ?>" required class="form-control" name="first_name" placeholder="First Name" />
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputUsername" class="col-form-label">Middle Name</label>
                                                    <input required type="text" readonly value="<?= strtoupper($data->middle_name); ?>" class="form-control" name="middle_name" placeholder="Middle Name" />
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputUsername" class="col-form-label">Last Name</label>
                                                    <input required type="text" readonly value="<?= strtoupper($data->last_name); ?>" class="form-control" name="last_name" placeholder="Last Name" />
                                                </div>
                                        </div> 
                                        

                                        <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="inputUsername" class="col-form-label">Birthday</label>
                                                    <input required type="text" readonly class="form-control" value="<?= strtoupper($data->birthday); ?>" name="birthday" placeholder="Birthday" />
                                                </div>
                                               
                                                <div class="form-group col-md-4">
                                                    <label for="inputUsername" class="col-form-label">Age</label>
                                                    <input required type="text" value="<?= date_diff(date_create($data->birthday), date_create('today'))->y;?>" name="age" class="form-control" placeholder="Age" />
                                                </div>
                                            
                                        </div>

                                        <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="inputUsername" class="col-form-label">Occupation</label>
                                                    <input required type="text" readonly class="form-control" value="<?= strtoupper($data->occupation); ?>" name="occupation" placeholder="Occupation" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputUsername" class="col-form-label">Contact No.</label>
                                                    <input required type="text" readonly class="form-control" value="<?= strtoupper($data->contact); ?>" name="contact" placeholder="Contact No." />
                                                </div>
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputUsername" class="col-form-label">Complete Address</label>
                                                    <input required type="text" readonly value="<?= strtoupper($data->sitio.' '.$data->barangay.' '.$data->city_mun.' '.$data->province); ?>" class="form-control" name="address" placeholder="Sitio" />  
                                                </div>
                                        </div>

                                        <div class="col-md-6">
                                                <h4 class="header-title">Patient status:</h4>
                                        <div class="mt-3">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" onclick="refer()" id="customRadio1" name="ref" value="0" checked class="custom-control-input"/>
                                                        <label class="custom-control-label text-xs" for="customRadio1">Walk In</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" onclick="referral()" id="customRadio2" name="ref" value="1" class="custom-control-input" />
                                                        <label class="custom-control-label text-xs" for="customRadio2">Referral</label>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                               
                                                <select required class="form-control" id="company" style="display:none; margin-top:10px" type="text" name="ref_id">
                                                    <?php 
                                                         foreach($patient as $row){ 
                                                          echo "<option value='";
                                                          echo $row->id;
                                                          echo "'>";
                                                          echo $row->company."</option>\n";
                                                         }
                                                      ?> 
                                                    
                                                    </select>

                                            </div>
                                        </div>



                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">Blood Presure</label>
                                                    <input type="text" required class="form-control" name="bp" value="" placeholder="Blood Presure" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">Weight</label>
                                                    <input type="text" required class="form-control" name="weight" value="" placeholder="Weight" />
                                                </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type='text' required class='form-control' name='lmp' id='datepic1' readonly placeholder="LMP">
                                            </div> 
                                                <input id=cyVal type='hidden' value="28" class='easypositive' onkeyup='checnum(this)' required>
                                            
                                            <div class="form-group col-md-4">
                                                <input type=button  class="btn btn-primary" value='Calculate' onclick=calculate()>
                                                <input  class="btn btn-primary" type=reset value=Reset>
                                            </div>
                                    </div>

                                    <input id=weekVal type='hidden' class='easypositive short2' readonly name="no_of_weeks" required placeholder="No. of Weeks" />
                                    <input id=dayVal type='hidden' class='easypositive short2' readonly name="no_of_days" required placeholder="No. of days" />

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputUsername" class="col-form-label">Estimated Date of Delivery</label>
                                            <input type="text" id=esDate name="date_of_delivery" class='form-control' readonly  required />
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="inputUsername" class="col-form-label">Gravida</label>
                                            <input required type="text" name="gravida" class='form-control' required />
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="inputUsername" class="col-form-label">Parity</label>
                                            <input required type="text" name="parity" class='form-control' required />
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="inputUsername" class="col-form-label">Term</label>
                                            <input required type="text" name="term" class='form-control' required />
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="inputUsername" class="col-form-label">Preterm</label>
                                            <input required type="text" name="preterm" class='form-control' required />
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="inputUsername" class="col-form-label">Abortion</label>
                                            <input required type="text" name="abortion" class='form-control' required />
                                        </div>
                                        
                                        <div class="form-group col-md-1">
                                            <label for="inputUsername" class="col-form-label">Living</label>
                                            <input required type="text" name="living" class='form-control' required />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control" rows="5" id="example-textarea" name="transaction" placeholder="Transaction"></textarea>   
                                        </div>
                                    </div>  
                                        
                                        

                                        <div class="form-group">
                                                    <input type="submit" name="submit" value="New Appointment" class="btn btn-primary waves-effect waves-light mr-1" />
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        

                        
                       