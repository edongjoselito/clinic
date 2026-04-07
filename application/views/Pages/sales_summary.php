              
                        
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
                                            echo form_open('Pages/sales_summary/', $attributes);
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
                                                    <th>DATE</th> 	
                                                    <th>RECIEPT CODE</th> 	
                                                    <th style='text-align:center;'>TOTAL AMOUNT</th> 	
                                                    <th style='text-align:center;'>TOTAL DISCOUNT</th> 	
                                                    <th style='text-align:center;'>TOTAL AMOUNT DUE</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php 
                                                if(isset($_POST['submit'])){
                                                    echo "<h4>SALES SUMMARY REPORT FROM <strong> ".$df."</strong> TO <strong>".$dt."</strong></h4><br />";
                                                    $totalAmount = 0;
                                                foreach($data as $row){
                                                     $p = $this->Page_model->one_cond_get_single_row('patients','id',$row->patient_id); 
                                                     ?>
                                                <tr>
                                                    <td><?= strtoupper($p->first_name.' '.$p->middle_name.' '.$p->last_name); ?></td>
                                                    <td><?= $row->date; ?></td>
                                                    <td><?= $row->reciept_code; ?></td>
                                                    <td style='text-align:center;'><?= number_format($row->total_retail,2) ; ?></td>
                                                    <td style='text-align:center;'><?= number_format($row->discount,2); ?></td>
                                                    <td style='text-align:center;'><?= number_format($row->amount_due,2); ?></td>
                                                    <?php $totalAmount += $row->amount_due; ?>
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                        <?php if(isset($_POST['submit'])){ ?>
                                                    <br /><br />
                                                    <h4>TOTAL SALES SUMMARY : PHP <b><?= number_format($totalAmount, 2); ?></b></h4>
                                        <?php } ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                       


                        <div id="new" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel">Add New Item</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <?= form_open('Pages/item_list'); ?>
                                        
                                                        <div class="form-group">
                                                            <label>Item Description</label>
                                                            <input type="text" name="description"  value="" required class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Selling Price</label>
                                                            <input type="text" onkeypress="return isNumberKey(event)" name="price"  value="" required class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Purchases Price</label>
                                                            <input type="text" onkeypress="return isNumberKey(event)" name="purchases_price"  value="" required class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input type="text" onkeypress="return isNumberKey(event)" name="quantity"  value="" required class="form-control" >
                                                        </div>
                                                        
                                                        
                                                    <div class="modal-footer">
                                                        <input type="submit" name="add" class="btn btn-primary waves-effect waves-light" value="CREATE" />
                                                    </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div> 
                                        </div>  
                        