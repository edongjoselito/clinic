              
                        
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
                                            echo form_open('Pages/expenses_summary/', $attributes);
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
                                                    <th>DISCRIPTION</th>  	
                                                    <th>DATE</th>  	
                                                    <th>OFFICIAL RECIEPT</th>  	
                                                    <th>AMOUNT</th> 	
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php 
                                                if(isset($_POST['submit'])){
                                                    echo "<h4>PATIENT SUMMARY REPORT FROM <strong> ".$df."</strong> TO <strong>".$dt."</strong></h4><br />";
                                                    $total = 0;
                                                foreach($data as $row){
                                                     //$u = $this->Page_model->one_cond_get_single_row('users','id',$this->session->id); 
                                                     ?>
                                                <tr>
                                                    <td><?= $row->description; ?></td>
                                                    <td><?= $row->date; ?></td>
                                                    <td><?= $row->or_no; ?></td>
                                                    <td><?= $row->amount; ?></td>
                                                    <?php $total += $row->amount; ?>
                                                </tr>
                                                <?php } } ?>

                                            </tbody>
                                        </table>

                                        <?php if(isset($_POST['submit'])){ ?>
                                                    <br /><br />
                                                    <h4>TOTAL EXPENSES SUMMARY : PHP <b><?= number_format($total, 2); ?></b></h4>
                                                <?php } ?>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                       

