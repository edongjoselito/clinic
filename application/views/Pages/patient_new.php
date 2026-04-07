                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4"><?= $title; ?></h4>

                                        <?= validation_errors(); ?>

                                        <?php 
                                            $attributes = array('class' => 'parsley-examples');
                                            echo form_open('Pages/patient_add/', $attributes);
                                        ?>

                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputUsername" class="col-form-label">First Name</label>
                                                    <input required type="text" value="" required class="form-control" name="first_name" placeholder="First Name" />
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputUsername" class="col-form-label">Middle Name</label>
                                                    <input required type="text" required value="" class="form-control" name="middle_name" placeholder="Middle Name" />
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputUsername" class="col-form-label">Last Name</label>
                                                    <input required type="text" required value="" class="form-control" name="last_name" placeholder="Last Name" />
                                                </div>
                                        </div> 
                                        

                                        <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="inputUsername" class="col-form-label">Birthday</label>
                                                    <input required type="date" id="datepicker" class="form-control" value="" name="birthday" placeholder="Birthday" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputUsername" class="col-form-label">Age</label>
                                                    <input required type="text" value="" name="age" class="form-control" placeholder="Age" />
                                                </div>
                                            
                                        </div>

                                        <div class="col-md-6">
                                                <h4 class="header-title">Gender</h4>
                                        <div class="mt-3">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" value="male" id="customRadio1" name="gender" class="custom-control-input">
                                                        <label class="custom-control-label text-xs" for="customRadio1">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" value="female" id="customRadio2" name="gender" class="custom-control-input">
                                                        <label class="custom-control-label text-xs" for="customRadio2">Female</label>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputUsername" class="col-form-label">Occupation</label>
                                                    <input required type="text" class="form-control" value="" name="occupation" placeholder="Occupation" />
                                                </div>
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">Sitio</label>
                                                    <input required type="text" value="" class="form-control" name="sitio" placeholder="Sitio" />  
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">Barangay</label>
                                                    <input required type="text" value="" class="form-control" name="barangay" placeholder="Barangay" />
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">City/Municipality</label>
                                                    <input required type="text" value="" class="form-control" name="city_mun" placeholder="City/Municipality" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">Province</label>
                                                    <input required type="text" value="" class="form-control" name="province" placeholder="Province" />
                                                </div>
                                        </div>


                                        
                                      
                                        <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="inputPosition" class="col-form-label">Position</label>
                                                    <select id="inputState" name="civil_status" class="form-control">
                                                    <?php 
                                                        $user_position = array("Civil Status", "Single",'Married','Live-in','Widow/er','Separated','Divorced');
                                                         foreach($user_position as $row){ 
                                                          echo "<option value='";
                                                          echo $row;
                                                          echo "'>";
                                                          echo $row."</option>\n";
                                                         }
                                                      ?> 
                                                    
                                                    </select>
                                                </div> 

                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">contact</label>
                                                    <input type="text" class="form-control" value="" name="contact" placeholder="contact" />
                                                </div>
                                        </div>   

                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputUsername" class="col-form-label">Company</label>
                                                    <input type="text" class="form-control" value="" name="company" placeholder="company" />
                                                </div>
                                        </div>
                                        

                                        <div class="form-group">
                                                    <input type="submit" name="submit" value="New Patient" class="btn btn-primary waves-effect waves-light mr-1" />
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->