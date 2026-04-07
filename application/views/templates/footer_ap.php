</div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

                

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                2022 - 2023 &copy; Clinica Aquino by <a href="">Softtech Solutions</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        
        
        <script language="javascript" type="text/javascript">

function referral() {
    document.getElementById('company').style.display = "block";
    document.getElementById("company").disabled = false;
}
function refer() {
    document.getElementById('company').style.display = "none";
    document.getElementById("company").disabled = true;
}
</script>
      

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
            <script language=javascript src="../js/numeric.js"></script>
            <script language=javascript src="../js/common.js"></script>

            <script type='text/javascript'>
            $(function(){
                $('#datepic1').datepicker( { yearRange:'1995:2050',changeYear: true, dateFormat: 'mm/dd/yy', });    
            });

            //var moname=new Array('January','February','March','April','May','June','July','August','September','October','November','December');
            var moname=new Array('01','02','03','04','05','06','07','08','09','10','11','12');

            function checnum(as)
                {   
                    var a = as.value;
                    as.value= a.replace(/[^\d]/g, '');       
                } 
            function calculate()
            {
                var datePic1=$('#datepic1').val();
                var cl=$('#cyVal').val();
                if((datePic1=='')||(cl==''))
                {
                    alert('Give all valid inputs')
                }
                else
                {
                    dtVal=datePic1.split('/');
                    mm=dtVal[0];
                    dd=dtVal[1];
                    yy=dtVal[2];
                    
                    mm=mm-1;    
                    if(yy<50)
                    {
                        yy=yy+2000;
                    }
                    var cl=$('#cyVal').val();
                    var lmpDate=new Date(yy,mm,dd);
                    lmpDateVal=lmpDate.getTime();
                    lmpDateVal=lmpDateVal+((cl-28)*24*60*60*1000);
                    var pregVal=((40*7)-1)*60*60*24*1000;
                    var gestVal=new Date();
                    curGestVal=gestVal.getTime();
                    curGestVal=(curGestVal-lmpDateVal)/(24*60*60*1000);
                    lmpDateVal=lmpDateVal+pregVal;
                    curGestVal=Math.round(curGestVal);
                    var lmpWkVal=curGestVal/7;
                    lmpWkVal=parseInt(lmpWkVal);
                    var lmpDyVal=curGestVal%7;
                    lmpDateVal=lmpDate.setTime(lmpDateVal);
                    var mon1=lmpDate.getMonth(); 
                    $('#esDate').val(lmpDate.getDate()+'/'+moname[mon1]+'/'+lmpDate.getFullYear());
                    $('#dayVal').val(lmpDyVal);
                    $('#weekVal').val(lmpWkVal);
                } 
            }

            </script>

            <!-- Required datatable js -->
        <script src="<?= base_url(); ?>assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?= base_url(); ?>assets/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="<?= base_url(); ?>assets/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>assets/libs/jszip/jszip.min.js"></script>
        <script src="<?= base_url(); ?>assets/libs/pdfmake/pdfmake.min.js"></script>
        <script src="<?= base_url(); ?>assets/libs/pdfmake/vfs_fonts.js"></script>
        <script src="<?= base_url(); ?>assets/libs/datatables/buttons.html5.min.js"></script>
        <script src="<?= base_url(); ?>assets/libs/datatables/buttons.print.min.js"></script>

        <!-- Responsive examples -->
        <script src="<?= base_url(); ?>assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="<?= base_url(); ?>assets/libs/datatables/responsive.bootstrap4.min.js"></script>

        <script src="<?= base_url(); ?>assets/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?= base_url(); ?>assets/libs/datatables/dataTables.select.min.js"></script>

        <!-- Datatables init -->
        <script src="<?= base_url(); ?>assets/js/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="<?= base_url(); ?>assets/js/app.min.js"></script>
        <script src="<?= base_url(); ?>assets/libs/select2/select2.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/pages/form-advanced.init.js"></script>



    </body>

</html>