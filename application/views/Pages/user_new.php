                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4"><?= $title; ?></h4>

                                        <?= validation_errors(); ?>

                                        <?= form_open('Pages/user_add'); ?>

                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">First Name</label>
                                                    <input type="text" required value="<?= set_value('fname'); ?>" name="fname" class="form-control">
                                                </div>
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">Middle Name</label>
                                                    <input type="text" required value="<?= set_value('mname'); ?>" name="mname" class="form-control">
                                                </div>
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">Last Name</label>
                                                    <input type="text" required value="<?= set_value('lname'); ?>" name="lname" class="form-control">
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">Username</label>
                                                    <input type="text" required value="<?= set_value('username'); ?>" name="username" class="form-control">
                                                </div>
                                        </div>        
                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">Password</label>
                                                    <input type="password" required value="<?= set_value('password'); ?>" name="password" class="form-control">
                                                </div>
                                            
                                        </div>

                                        
                                      
                                        <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="inputPosition" class="col-form-label">Position</label>
                                                    <select id="inputState" name="position" class="form-control">
                                                    <?php 
                                                        $user_position = array("Admin", "secretary");
                                                         foreach($user_position as $row){ 
                                                          echo "<option value='";
                                                          echo $row;
                                                          echo "'>";
                                                          echo $row."</option>\n";
                                                         }
                                                      ?> 
                                                    
                                                    </select>
                                                </div> 
                                        </div>        

                                        <div class="form-group">
                                                    <input type="submit" name="submit" value="New User" class="btn btn-primary waves-effect waves-light mr-1" />
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->