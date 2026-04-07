                        
                    
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
                                    <div class="card-body">

                                <?php 
                                            $attributes = array('class' => 'parsley-examples');
                                            echo form_open('Pages/patient_search/', $attributes);
                                        ?>
                                       <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">Search by: Last Name, Middle Name and First Name</label>
                                                    <input type="text" value="" required class="form-control" name="search" placeholder="Name" />
                                                </div>
                                                <div class="form-group col-md-12">

                                                    <input type="submit" name="submit" value="Search Patient" class="btn btn-primary waves-effect waves-light mr-1" />
                                                
                                                </div>

                                        </div> 

                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


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
                                <a class="btn btn-success" href="<?= base_url(); ?>Pages/patient_add">New Patient</a>
                                
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        
                                        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <th>Address</th> 
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach($data as $row){ ?>
                                                <tr>
                                                    <td><?= mb_strtoupper($row->last_name, 'UTF-8').', '.mb_strtoupper($row->first_name, 'UTF-8').' '.mb_strtoupper($row->middle_name, 'UTF-8'); ?></td>
                                                    <td><?= strtoupper($row->sitio.' '.$row->barangay.' '.$row->city_mun.''.$row->province); ?></td>
                                                    <td>
                                                        <a href="<?= base_url(); ?>Pages/patient_profile/<?= $row->id; ?>" class="btn btn-success">view</a>
                                                        <a href="<?= base_url(); ?>Pages/ap/<?= $row->id; ?>" class="btn btn-primary">Appointment</a>
                                                        <!-- <a onclick="return confirm('Are you sure?')" href="<?= base_url(); ?>Pages/patient_delete/<?= $row->id; ?>" class="btn btn-danger">Delete</a> -->
                                                    </td>
                                                </tr>
                                                <?php }  ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        
                        