                <!-- start page title -->
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
                                            <div class="profile-user-img">
                                                <a href="<?= base_url(); ?>pages/capture/<?= $p->id; ?>"><img src="<?= base_url().'uploads/profile/'.$p->image_path; ?>" alt="" class="avatar-lg rounded-circle"></a>
                                            
                                            </div>
                                            <div>
                                                <h4 class="mt-5 font-18 ellipsis"><?= mb_strtoupper($p->first_name, 'UTF-8').' '.mb_strtoupper($p->middle_name, 'UTF-8').' '.mb_strtoupper($p->last_name, 'UTF-8'); ?></h4>
                                                <p class="text-muted mb-0"><?=strtoupper($p->occupation); ?><br /><small><?= strtoupper($p->sitio.' '.$p->barangay.' '.$p->city_mun.''.$p->province); ?></small></p>
                                                <p class="text-muted mb-0">
                                                <strong>AGE</strong> : <?= $p->age; ?><br />
                                                <strong>GENDER</strong> : <?= $p->gender; ?><br />
                                                <strong>BIRTHDAY</strong> : <?= $p->birthday; ?><br />
                                                <strong>OCCUPATION</strong> : <?= $p->occupation; ?><br />
                                                <strong>STATUS</strong> : <?= $p->civil_status; ?><br />
                                                <strong>COMPANY</strong> : <?= $p->company; ?></p>
                                            </div>     

                                        </div>

                                        <div class="col-sm-6">
                                            <div class="text-right">
                                                <a href="<?= base_url(); ?>Pages/patient_edit/<?= $p->id; ?>" class="btn btn-success waves-effect waves-light">
                                                    <i class="mdi mdi-account-settings-variant mr-1"></i> Edit Profile
                                            </a>
                                            </div>
                                        </div>

                                        
                                            
                                     
                                        
                                    </div>
                                </div>
                                <!--/ meta -->
                            </div>
                        </div>
                                            </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">

                                    <table class="table table-striped mb-0">
                                                                                <thead>
                                                                                    <tr>
                                                                                    <tr>
                                                                                        <th>DOA</th>
                                                                                        <th>DIAGNOSED BY:</th>
                                                                                        <th>AGE</th>
                                                                                        <th>LMP</th>
                                                                                        <th>EDD</th>
                                                                                        <th>BP</th>
                                                                                        <th>WEIGHT</th>
                                                                                        <th>G</th>
                                                                                        <th>A</th>
                                                                                        <th>P</th>
                                                                                        <th>L</th>
                                                                                        <th>TRANSACTION</th>
                                                                                        <th>Hx/PE/LAB</th>
                                                                                        <th>DIAGNOSIS</th>
                                                                                        <th>TREATMENT</th>
                                                                                        <th>REMARKS</th>
                                                                                        <th>Manage</th>	
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                <?php foreach($diag as $row){
                                                                                    $user = $this->Page_model->one_cond_get_single_row('users','id',$row->user_id);
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td><?= strtoupper($row->date); ?></td>
                                                                                        <td><?= $user->first_name.''.$user->middle_name.''.$user->last_name; ?></td>
                                                                                        <td><?= strtoupper($app->age); ?></td>
                                                                                        <td><?= strtoupper($app->date_of_delivery); ?></td>
                                                                                        <td><?= strtoupper($app->lmp); ?></td>
                                                                                        <td><?= strtoupper($app->bp); ?></td>
                                                                                        <td><?= strtoupper($app->weight); ?></td>
                                                                                        <td><?= strtoupper($app->gravida); ?></td>
                                                                                        <td><?= strtoupper($app->abortion); ?></td>
                                                                                        <td><?= strtoupper($app->parity); ?></td>
                                                                                        <td><?= strtoupper($app->living); ?></td>
                                                                                        <td><?= strtoupper($app->transaction); ?></td>
                                                                                        <td><?= strtoupper($row->lab); ?></td>
                                                                                        <td><?= strtoupper($row->diagnosis); ?></td>
                                                                                        <td><?= strtoupper($row->treatment); ?></td>
                                                                                        <td><?= strtoupper($row->remarks); ?></td>
                                                                                        <td>
                                                                                        <a href="<?= base_url(); ?>Pages/diagnose_edit/<?= $row->id; ?>" class="btn btn-primary">EDIT</a>
                                                                                        <!-- <a href="#" class="btn btn-danger" onclick="return confirm('Are you sure!!');">DELETE</a> -->
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php } ?>    

                                                                                </tbody>
                                                                            </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                        