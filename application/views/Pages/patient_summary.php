              
                        
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
                                    <?php 
                                            $attributes = array('class' => 'parsley-examples');
                                            echo form_open('Pages/patient_summary/', $attributes);
                                        ?>

                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputUsername" class="col-form-label">Date From</label>
                                                    <input required type="date" value="" required class="form-control" name="df" placeholder="Date From" />
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputUsername" class="col-form-label">Date To</label>
                                                    <input required type="date" required value="" class="form-control" name="dt" placeholder="Date to" />
                                                </div>

                                        </div> 
                                        <div class="form-group">
                                                    <input type="submit" name="submit" value="Submit" class="btn btn-primary waves-effect waves-light mr-1" />
                                                
                                            </div>
                                        

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        
                                        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                                <tr>	
                                                    <th>PATIENT NAME</th>  	
                                                    <th>ADDRESS</th>  	
                                                    <th>VISIT DATE</th>  	
                                                    <th>REFERED BY</th> 	
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php 
                                                if(isset($_POST['submit'])){
                                                    echo "<h4>PATIENT SUMMARY REPORT FROM <strong> ".$df."</strong> TO <strong>".$dt."</strong></h4><br />";
                                                foreach($data as $row){
                                                     $p = $this->Page_model->one_cond_get_single_row('patients','id',$row->patient_id); 
                                                     ?>
                                                <tr>
                                                <td><?= strtoupper($p->first_name.' '.$p->middle_name.' '.$p->last_name); ?></td>
                                                    <td><?= strtoupper($p->sitio.' '.$p->barangay.' '.$p->city_mun.''.$p->province); ?></td>
                                                    <td><?= $row->visit_date; ?></td>
                                                    <td></td>
                                                </tr>
                                                <?php } } ?>

                                            </tbody>
                                        </table>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                       

