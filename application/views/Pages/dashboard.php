

                    <!-- start page title -->
                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                <h4>CLINICA AQUINO</h4>
                                
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body widget-style-2">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0"><span data-plugin="counterup"><?= $app->num_rows(); ?></span></h2>
                                                <p class="mb-0"><a href="<?= base_url(); ?>Pages/patient_queue">Appoinment</a></p>
                                            </div>
                                            <i class="ion-md-eye text-pink bg-light"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body widget-style-2">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0"><span data-plugin="counterup"><?= $item->num_rows(); ?></span></h2>
                                                <p class="mb-0">Items</p>
                                            </div>
                                            <i class="ion-md-paper-plane text-purple bg-light"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body widget-style-2">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0"><span data-plugin="counterup"><?= $ref->num_rows(); ?></span></h2>
                                                <p class="mb-0">Referrals</p>
                                            </div>
                                            <i class="ion-ios-pricetag text-info bg-light"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body widget-style-2">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0"><span data-plugin="counterup"><?= $user->num_rows(); ?></span></h2>
                                                <p class="mb-0">Users</p>
                                            </div>
                                            <i class="mdi mdi-comment-multiple text-primary bg-light"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        

                    