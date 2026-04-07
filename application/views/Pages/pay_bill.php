                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
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
                                                    $app = $this->Page_model->one_cond_get_single_row('appointment','id',$row->appointment_id);
                                                   
                                                    ?>
                                                <tr>
                                                    <td><?= strtoupper($p->last_name.', '.$p->first_name.' '.$p->middle_name); ?></td>
                                                    <td><?= strtoupper($p->sitio.' '.$p->barangay.' '.$p->city_mun.''.$p->province); ?></td>
                                                    <td><?= $row->diagnosis; ?></td>
                                                    <td><?= $row->treatment; ?></td>
                                                    <td><?= $row->remarks; ?></td>
                                                    <td>
                                                        <a href="sale_code/<?=$row->id; ?>" class="btn btn-primary">PAY</a> 
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



                        