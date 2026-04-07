<?php 
                $i = $this->Page_model->one_cond_get_single_row('items','id',$this->uri->segment(3)); 
            ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                <?php if($this->session->flashdata('success')) : ?>

                                        <?= '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>'
                                                .$this->session->flashdata('success'). 
                                            '</div>'; 
                                        ?>
                                        <?php endif; ?>

                                        <?php if($this->session->flashdata('danger')) : ?>
                                        <?= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>'
                                                .$this->session->flashdata('danger'). 
                                            '</div>'; 
                                        ?>
                                        <?php endif;  ?>
                                    
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
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                    <form class="sales-form form-horizontal" method="post" action="stocks">
                                                    <div class="form-row">
                                                            <div class="form-group col-md-3">
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

                                            <form class="sales-form form-horizontal" name="abc" method="post" action="stocks">
                                                <div class="form-row">
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
