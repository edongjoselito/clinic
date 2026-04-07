            <?php 
                $p = $this->Page_model->one_cond_get_single_row('patients','id',$data->patient_id); 
                $a = $this->Page_model->one_cond_get_single_row('appointment','id',$data->appointment_id); 
                $i = $this->Page_model->one_cond_get_single_row('items','id',$this->uri->segment(4)); 
            ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- start row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- <div class="panel-heading">
                                                    <h4>Invoice</h4>
                                                </div> -->
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <h4 class="text-left">CURRENT DIAGNOSIS</h4>
                                                <div class="float-left mt-4">
                                                    <address>
                                                    <strong>PATIENT NAME : <?= strtoupper($p->first_name.' '.$p->middle_name.' '.$p->last_name); ?></strong><br />
                                                    ADDRESS : <?= strtoupper($p->sitio.' '.$p->barangay.' '.$p->city_mun.''.$p->province); ?><br />
                                                    DIAGNOSIS : <?= $data->diagnosis; ?><br />
                                                    TREATMENT : <?= $data->treatment; ?><br />
                                                    REMARKS : <?= $data->remarks; ?><br />
                                                    TRANSACTION : <?= $a->transaction; ?>
                                                    </address>
                                                </div>

                                            </div>
                                            
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                    <form class="sales-form form-horizontal" id="sales" method="post" action="sales">
                                                    <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                            <input readonly class="form-control" type="hidden" value="<?= $data->id; ?>" name="a_id" />
                                                            <select id="inputState" name="item_id" class="form-control">
                                                                <option value=""></option>
                                                            <?php 
                                                                foreach($item as $row){ 
                                                                echo "<option value='";
                                                                echo $row->id;
                                                                echo "'>";
                                                                echo $row->description."</option>\n";
                                                                }
                                                            ?> 
                                                            
                                                            </select>
                                                                
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <input class="btn btn-success" type="submit" value="Search Item" name="item" />
                                                            </div>
                                                        </div>  
                                                    </form>

                                            <form class="sales-form form-horizontal" name="abc" method="post" action="sale/<?= $data->id; ?>">
                                                <div class="form-row">
                                                <input readonly class="form-control" type="hidden" value="<?= $data->id; ?>" name="diagnose_id" />
                                                <input readonly class="form-control" type="hidden" value="<?= $p->id; ?>" name="patient_id" />
                                                <input readonly class="form-control" type="hidden" value="<?php if(isset($i->id)){echo $i->id; } ?>" name="item_id" />
                                                    <div class="form-group col-md-4">
                                                        <label for="inputUsername" class="col-form-label">Item Description</label>
                                                        <input readonly class="form-control" type="text" value="<?php if(isset($i->description)){echo $i->description; } ?>" name="description" />
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputUsername" class="col-form-label">Price</label>
                                                        <input readonly id="PPRICE" class="form-control" type="text" value="<?php if(isset($i->price)){echo $i->price; } ?>" name="price" />
                                                    </div>
                                                </div>   

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputUsername" class="col-form-label">Reciept Code</label>
                                                        <input readonly type="text" class="form-control" value="<?= $_SESSION['sc']; ?>" name="sales_code" />
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputUsername" class="col-form-label">Quantity</label>
                                                        <input class="qtys form-control" id="QTY" name="quantity" type="text" onkeyup="multiply()" onkeypress="return checkIt(event)" />
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputUsername" class="col-form-label">Available QTY</label>
                                                        <input readonly class="form-control" type="text" value="<?php if(isset($i->quantity)){echo $i->quantity; } ?>" name="a_qty" />
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputUsername" class="col-form-label">Sub Total</label>
                                                        <input type="text" class="form-control" id="TOTAL" value="" name="total" />
                                                    </div>
                                                </div>
                                                    <?php
                                                        // Change the line below to your timezone!
                                                        date_default_timezone_set('Asia/Manila');
                                                        $time = date('h:i:s a', time());
                                                    ?>

                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label for="inputUsername" class="col-form-label">Date</label>
                                                        <input readonly class="form-control" type="text" value="<?php echo $time; ?>" name="time" />
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputUsername" class="col-form-label">Sub Total</label>
                                                        <input readonly class="form-control" type="text" value="<?= date('Y-m-d'); ?>" name="date" />
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;<input id="xx" class="btn btn-success btn-lg" type="submit" value="ADD TO CART" name="submit" disabled="">
                                                    
                                                </div>
                                               
                                            </form>

                                            </div>
                                        </div>

                                        
                                        <div class="mt-5"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table mt-4">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>DESCRIPTION </th>	
                                                                <th>QUANTITY</th> 	
                                                                <th>RETAIL PRICE</th> 	
                                                                <th>AMOUNT</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $count = 1;
                                                            $total=0;
                                                            foreach($sales as $row){ 
                                                                $ii = $this->Page_model->one_cond_get_single_row('items','id',$row->item_id);
                                                                ?>
                                                            <tr>
                                                                <td><?= $count++; ?></td>
                                                                <td><?= $ii->description; ?></td>
                                                                <td><?= $row->quantity; ?></td>
                                                                <td><?= $row->price; ?></td>
                                                                <td><?= $row->total; ?></td>
                                                                <?php $total += (int)$row->total;  ?>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                        
                                        <div class="row" style="border-radius: 0px">
                                            <div class="col-md-8 offset-md-9">
                                                <form name="ad" class="sales-form" method="post" action="sale/<?= $data->id; ?>">
                                                    
                                                    <input type="hidden" value="<?= $data->id; ?>" name="d_id">
                                                    <input type="hidden" value="<?= $p->id; ?>" name="p_id">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputUsername" class="col-form-label">Total Retail</label>
                                                        <input type="text" class="form-control" readonly value="<?= number_format($total); ?>" />
                                                        <input type="hidden" id="tr" readonly value="<?= $total; ?>" name="total_retail" />
                                                    </div>
                                                </div> 
                                                <div class="form-row">   
                                                    <div class="form-group col-md-4">
                                                        <label for="inputUsername" class="col-form-label">Total Discount</label>
                                                        <input id="td" class="form-control" type="text" onkeyup="sub()" onkeypress="return checkIt(event)" name="discount"/>
                                                    </div>
                                                </div>  
                                                <div class="form-row"> 
                                                    <div class="form-group col-md-4">
                                                        <label for="inputUsername" class="col-form-label">Comment</label>
                                                        <input  type="text" class="form-control" name="comment" value="" />
                                                    </div>
                                                </div> 
                                                <div class="form-row">  
                                                    <div class="form-group col-md-4">
                                                        <label for="inputUsername" class="col-form-label">Amount Due</label>
                                                        <input type="text" class="form-control" value="<?= number_format($total); ?>" id="amountdue" />

                                                        <input type="hidden" value="<?= $total; ?>" id="save_amount" name="due_amount" />
                                                    </div>
                                                </div> 
                                                <div class="form-row">  
                                                    <div class="form-group col-md-4">
                                                        <input type="submit" id="save_summary" class="btn btn-success btn-lg float-right" name="pay" value="SAVE"<?php if($total <= 0){echo 'disabled';} ?> />
                                                    </div>
                                                </div>
                                            </form>


                                            </div>
                                        </div>


                                        
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
