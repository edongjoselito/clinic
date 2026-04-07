<div class="row">
    <div class="col-12"><br /><br />
    
        &nbsp; &nbsp;&nbsp;<a class="btn btn-success" href="<?= base_url(); ?>Pages/patient_profile/<?= $this->uri->segment(3); ?>">Back Profile</a><br /><br />

        <script src="<?= base_url(); ?>assets/js/webcam.min.js"></script> 
        <div class="form-group">
                                        <div class="col-sm-3  col-md-offset-3 no-print">
                                            <!--<img src="<?php echo base_url(); ?>assets/images/blank.png" >-->
                                            <div class="clearfix" id="my_camera"></div><br>
                                            <button type="button" class="btn btn-info" onClick="take_snapshot()"><i class="fa fa-camera fa-fw"></i>Capture</button>
                                        </div>
                                        <div class="col-md-3 col-md-offset-1 imager" id="results">
                                            <!--<img src="<?php echo base_url(); ?>assets/images/user.png" class="thumbnail" >-->
                                            <h3>Patient Photo</h3>
                                        </div>
                                    </div>
<script language="JavaScript">
        function take_snapshot() {                
            Webcam.snap(function (data_uri) {                    
                    document.getElementById('results').innerHTML =
                            '<h2>Here is your image:</h2>' +
                            '<img src="' + data_uri + '"/>';
                    Webcam.upload( data_uri, '<?php echo site_url('Pages/saveimage/'.$this->uri->segment(3)); ?>', function(code, text) {
            if (code == '200') {
              alert ('ok');
            } else {
              alert('error');
            }
        } );
                });
        }
    </script>
<script language="JavaScript">
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');
    </script>


                
    </div>
</div>