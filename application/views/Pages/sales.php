            <?php 
                if($data === null){
                    echo '<div class="alert alert-danger">
                            <h4><i class="fas fa-exclamation-triangle"></i> Error</h4>
                            <p>Diagnosis record not found. Please ensure you have a valid diagnosis ID.</p>
                            <a href="'.base_url().'Pages/patient_queue" class="btn btn-primary">Return to Patient Queue</a>
                          </div>';
                    return;
                }
                $p = $this->Page_model->one_cond_get_single_row('patients','id',$data->patient_id); 
                $a = $this->Page_model->one_cond_get_single_row('appointment','id',$data->appointment_id); 
                $i = $this->Page_model->one_cond_get_single_row('items','id',$this->uri->segment(4)); 
                
                if($p === null || $a === null){
                    echo '<div class="alert alert-danger">
                            <h4><i class="fas fa-exclamation-triangle"></i> Error</h4>
                            <p>Patient or appointment record not found. Please ensure the diagnosis has valid associated records.</p>
                            <a href="'.base_url().'Pages/patient_queue" class="btn btn-primary">Return to Patient Queue</a>
                          </div>';
                    return;
                }
            ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex justify-content-between align-items-center">
                                    <h4 class="page-title mb-0">Sale Transaction</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- start row -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Patient Info Card -->
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="card-title mb-0">
                                            <i class="fas fa-user-injured mr-2"></i>Patient Information
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="info-item">
                                                    <strong class="text-muted">Patient Name:</strong>
                                                    <span class="ml-2"><?= strtoupper($p->first_name.' '.$p->middle_name.' '.$p->last_name); ?></span>
                                                </div>
                                                <div class="info-item mt-2">
                                                    <strong class="text-muted">Address:</strong>
                                                    <span class="ml-2"><?= strtoupper($p->sitio.' '.$p->barangay.' '.$p->city_mun.''.$p->province); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-item">
                                                    <strong class="text-muted">Transaction:</strong>
                                                    <span class="ml-2"><?= $a->transaction; ?></span>
                                                </div>
                                                <div class="info-item mt-2">
                                                    <strong class="text-muted">Date:</strong>
                                                    <span class="ml-2"><?= date('Y-m-d'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="info-item">
                                                    <strong class="text-muted">Diagnosis:</strong>
                                                    <span class="ml-2"><?= $data->diagnosis; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="info-item">
                                                    <strong class="text-muted">Treatment:</strong>
                                                    <span class="ml-2"><?= $data->treatment; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="info-item">
                                                    <strong class="text-muted">Remarks:</strong>
                                                    <span class="ml-2"><?= $data->remarks; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Item Selection Card -->
                                <div class="card mb-4">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="card-title mb-0">
                                            <i class="fas fa-search mr-2"></i>Select Item
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <form class="sales-form form-horizontal" id="sales" method="post" action="sales">
                                            <div class="form-row align-items-end">
                                                <div class="form-group col-md-8">
                                                    <label for="inputState" class="font-weight-bold">Search Item</label>
                                                    <input readonly class="form-control" type="hidden" value="<?= $data->id; ?>" name="a_id" />
                                                    <select id="inputState" name="item_id" class="form-control custom-select">
                                                        <option value="">-- Select an item --</option>
                                                    <?php 
                                                        foreach($item as $row){ 
                                                        echo "<option value='";
                                                        echo $row->id;
                                                        echo "'>";
                                                        echo $row->description." (₱".number_format($row->price).")</option>\n";
                                                        }
                                                    ?> 
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <button type="submit" name="item" class="btn btn-info btn-block">
                                                        <i class="fas fa-search mr-1"></i> Search
                                                    </button>
                                                </div>
                                            </div>  
                                        </form>
                                    </div>
                                </div>

                                <!-- Add to Cart Card -->
                                <div class="card mb-4">
                                    <div class="card-header bg-success text-white">
                                        <h5 class="card-title mb-0">
                                            <i class="fas fa-cart-plus mr-2"></i>Add to Cart
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <form class="sales-form form-horizontal" name="abc" method="post" action="sale/<?= $data->id; ?>">
                                            <div class="form-row">
                                                <input readonly class="form-control" type="hidden" value="<?= $data->id; ?>" name="diagnose_id" />
                                                <input readonly class="form-control" type="hidden" value="<?= $p->id; ?>" name="patient_id" />
                                                <input readonly class="form-control" type="hidden" value="<?php if(isset($i->id)){echo $i->id; } ?>" name="item_id" />
                                                <div class="form-group col-md-4">
                                                    <label for="itemDescription" class="font-weight-bold">Item Description</label>
                                                    <input readonly class="form-control bg-light" type="text" value="<?php if(isset($i->description)){echo $i->description; } ?>" name="description" id="itemDescription" />
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="itemPrice" class="font-weight-bold">Price</label>
                                                    <input readonly id="PPRICE" class="form-control bg-light" type="text" value="<?php if(isset($i->price)){echo $i->price; } ?>" name="price" id="itemPrice" />
                                                </div>
                                            </div>   

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="receiptCode" class="font-weight-bold">Receipt Code</label>
                                                    <input readonly type="text" class="form-control bg-light" value="<?= $_SESSION['sc']; ?>" name="sales_code" id="receiptCode" />
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="quantity" class="font-weight-bold">Quantity</label>
                                                    <input class="qtys form-control" id="QTY" name="quantity" type="text" onkeyup="multiply()" onkeypress="return checkIt(event)" placeholder="0" id="quantity" />
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="availableQty" class="font-weight-bold">Available Qty</label>
                                                    <input readonly class="form-control bg-light" type="text" value="<?php if(isset($i->quantity)){echo $i->quantity; } ?>" name="a_qty" id="availableQty" />
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="subTotal" class="font-weight-bold">Sub Total</label>
                                                    <input type="text" class="form-control bg-light" id="TOTAL" value="" name="total" id="subTotal" readonly />
                                                </div>
                                            </div>
                                                <?php
                                                    date_default_timezone_set('Asia/Manila');
                                                    $time = date('h:i:s a', time());
                                                ?>

                                            <div class="form-row align-items-end">
                                                <div class="form-group col-md-3">
                                                    <label for="transactionTime" class="font-weight-bold">Time</label>
                                                    <input readonly class="form-control bg-light" type="text" value="<?php echo $time; ?>" name="time" id="transactionTime" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="transactionDate" class="font-weight-bold">Date</label>
                                                    <input readonly class="form-control bg-light" type="text" value="<?= date('Y-m-d'); ?>" name="date" id="transactionDate" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <button id="xx" type="submit" name="submit" class="btn btn-success btn-lg btn-block" disabled>
                                                        <i class="fas fa-cart-plus mr-2"></i>ADD TO CART
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Cart Items Table -->
                                <div class="card mb-4">
                                    <div class="card-header bg-warning text-dark">
                                        <h5 class="card-title mb-0">
                                            <i class="fas fa-shopping-cart mr-2"></i>Cart Items
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th width="5%">#</th>
                                                        <th width="40%">DESCRIPTION</th>	
                                                        <th width="15%">QUANTITY</th> 	
                                                        <th width="20%">RETAIL PRICE</th> 	
                                                        <th width="20%">AMOUNT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $count = 1;
                                                    $total=0;
                                                    if(!empty($sales)){
                                                        foreach($sales as $row){ 
                                                            $ii = $this->Page_model->one_cond_get_single_row('items','id',$row->item_id);
                                                            ?>
                                                        <tr>
                                                            <td><?= $count++; ?></td>
                                                            <td><strong><?= $ii->description; ?></strong></td>
                                                            <td class="text-center"><?= $row->quantity; ?></td>
                                                            <td class="text-right">₱<?= number_format($row->price, 2); ?></td>
                                                            <td class="text-right"><strong>₱<?= number_format($row->total, 2); ?></strong></td>
                                                            <?php $total += (int)$row->total;  ?>
                                                        </tr>
                                                        <?php }
                                                    } else { ?>
                                                        <tr>
                                                            <td colspan="5" class="text-center text-muted">No items in cart</td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot class="thead-light">
                                                    <tr>
                                                        <th colspan="4" class="text-right">Total:</th>
                                                        <th class="text-right">₱<?= number_format($total, 2); ?></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment Section -->
                                <div class="card">
                                    <div class="card-header bg-dark text-white">
                                        <h5 class="card-title mb-0">
                                            <i class="fas fa-calculator mr-2"></i>Payment Summary
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <form name="ad" class="sales-form" method="post" action="sale/<?= $data->id; ?>">
                                            <input type="hidden" value="<?= $data->id; ?>" name="d_id">
                                            <input type="hidden" value="<?= $p->id; ?>" name="p_id">
                                            
                                            <div class="row justify-content-end">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="totalRetail" class="font-weight-bold">Total Retail</label>
                                                        <input type="text" class="form-control bg-light" readonly value="₱<?= number_format($total, 2); ?>" />
                                                        <input type="hidden" id="tr" readonly value="<?= $total; ?>" name="total_retail" />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row justify-content-end">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="totalDiscount" class="font-weight-bold">Total Discount</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">₱</span>
                                                            </div>
                                                            <input id="td" class="form-control" type="text" onkeyup="sub()" onkeypress="return checkIt(event)" name="discount" placeholder="0.00" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                            
                                            <div class="row justify-content-end">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="comment" class="font-weight-bold">Comment</label>
                                                        <input type="text" class="form-control" name="comment" value="" placeholder="Optional notes..." />
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                            <div class="row justify-content-end">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="amountDue" class="font-weight-bold">Amount Due</label>
                                                        <div class="input-group input-group-lg">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">₱</span>
                                                            </div>
                                                            <input type="text" class="form-control bg-success text-white font-weight-bold" value="<?= number_format($total, 2); ?>" id="amountdue" readonly />
                                                            <input type="hidden" value="<?= $total; ?>" id="save_amount" name="due_amount" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                            <div class="row justify-content-end">
                                                <div class="col-md-4">
                                                    <button type="submit" id="save_summary" class="btn btn-success btn-lg btn-block" name="pay"<?php if($total <= 0){echo ' disabled';} ?>>
                                                        <i class="fas fa-save mr-2"></i>SAVE TRANSACTION
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

             
                <script language="javascript" type="text/javascript">



function multiply(){

a=Number(document.abc.QTY.value);

b=Number(document.abc.PPRICE.value);

c=a*b;

document.abc.TOTAL.value=c;
if (a!=0 && b!=0) // some logic to determine if it is ok to go
    {document.getElementById("xx").disabled = false;}
  else // in case it was enabled and the user changed their mind
    {document.getElementById("xx").disabled = true;}
}



function addCommas(nStr){
 nStr += '';
 x = nStr.split('.');
 x1 = x[0];
 x2 = x.length > 1 ? '.' + x[1] : '';
 var rgx = /(\d+)(\d{3})/;
 while (rgx.test(x1)) {
  x1 = x1.replace(rgx, '$1' + ',' + '$2');
 }
 return x1 + x2;
}


function sub(){
a=Number(document.ad.tr.value);

b=Number(document.ad.td.value);
d=a-b;
document.ad.amountdue.value=addCommas(d);
document.ad.save_amount.value=d;
}
</script>

<SCRIPT LANGUAGE="JavaScript">

function checkIt(evt) {
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        status = "This field accepts numbers only."
        return false
    }

    status = ""
    return true
}

</SCRIPT>
