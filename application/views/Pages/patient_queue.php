                        
                        
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                        <?= form_open('pages/appointment'); ?>
                                                        <div class="form-group col-md-6">

                                                            <div id="prefetch">
                                                       
                                                        <div class="input-group">
                                                            <input type="text" name="name" id="search_box" class="form-control input-lg typeahead" placeholder="Search Here" />
                                                            <div class="input-group-append">
                                                            <input type="submit" name="submit" class="btn btn-primary waves-effect waves-light" value="Search Patient" />
                                                            </div>
                                                        </div>
                                     
                                                            </div>

                                                            
                                                        </div>
 
                                                    </form>

                                                   
                                
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <h4 class="m-t-0 header-title mb-4">WAITING LIST</h4>    
                                        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                                <tr>
                                                    <th>DOA</th> 	
                                                    <th>FULL NAME</th> 	
                                                    <th>AGE</th> 	
                                                    <th>EDD</th> 	
                                                    <th>LMP</th> 	
                                                    <th>B P</th> 	
                                                    <th>WEIGHT</th> 	
                                                    <th>G</th> 	
                                                    <th>P</th>
                                                    <th>T</th>
                                                    <th>P</th> 
                                                    <th>A</th> 		
                                                    <th>L</th> 	
                                                    <th>TRANSACTION</th> 	
                                                    <th>MANAGE</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach($data as $row){ 
                                                    $p = $this->Page_model->one_cond_get_single_row('patients','id',$row->patient_id);
                                                    ?>
                                                <tr>
                                                    <td><?= strtoupper($row->visit_date); ?></td>
                                                    <td><?= strtoupper(htmlentities($p->first_name.' '.$p->middle_name.' '.$p->last_name)); ?> </td>
                                                    <td><?= strtoupper($row->age); ?></td>
                                                    <td><?= $row->date_of_delivery; ?></td>
                                                    <td><?= $row->lmp; ?></td>
                                                    <td><?= strtoupper($row->bp); ?></td>
                                                    <td><?= strtoupper($row->weight); ?></td>
                                                    <td><?= strtoupper($row->gravida); ?></td>
                                                    <td><?= strtoupper($row->parity); ?></td>
                                                    <td><?= strtoupper($row->term); ?></td>
                                                    <td><?= strtoupper($row->preterm); ?></td>
                                                    <td><?= strtoupper($row->abortion); ?></td>
                                                    <td><?= strtoupper($row->living); ?></td>
                                                    <td><?= strtoupper($row->transaction); ?></td>
                                                    <td>
                                                        <a href="diagnose/<?= $row->id; ?>" class="btn btn-primary">DIAGNOSE</a> 
                                                        <a href="appointment_edit/<?= $row->patient_id.'/'.$row->id; ?>" class="btn btn-success" >EDIT</a> 
                                                        <a href="app_delete/<?= $row->id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">DELETE</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <h4 class="m-t-0 header-title mb-4">DIAGNOSED PATIENTS</h4>  
                                        
                                        
                                        <table id="selection-datatable" class="table dt-responsive nowrap">

                                            <thead>
                                                <tr>
                                                    <th>DIAGNOSED BY:</th>
                                                    <th>DOA</th> 	
                                                    <th>FULL NAME</th> 	
                                                    <th>AGE</th> 	
                                                    <th>EDD</th> 	
                                                    <th>LMP</th> 	
                                                    <th>B P</th> 	
                                                    <th>WEIGHT</th> 	
                                                    <th>G</th>
                                                    <th>P</th> 	
                                                    <th>T</th>	
                                                    <th>P</th> 
                                                    <th>A</th>	
                                                    <th>L</th> 	
                                                    <th>TRANSACTION</th> 	
                                                    <th>LABORATORY</th>
                                                    <th>DIAGNOSIS</th>
                                                    <th>TREATMENT</th>
                                                    <th>REMARKS</th>	
                                                    <th>MANAGE</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach($dp as $row){ 
                                                    $p = $this->Page_model->one_cond_get_single_row('patients','id',$row->patient_id);
                                                    $app = $this->Page_model->one_cond_get_single_row('appointment','id',$row->appointment_id);
                                                    $user = $this->Page_model->one_cond_get_single_row('users','id',$row->user_id);
                                                    ?>
                                                <tr>
                                                    <td><?php if(isset($user->id)){echo htmlentities($user->last_name.', '.$user->first_name.' '.substr($user->middle_name, 0, 1).'.');} ?></td>
                                                    <td><?= strtoupper($app->visit_date); ?></td>
                                                    <td><?= strtoupper($p->first_name.' '.htmlentities($p->middle_name).' '.$p->last_name); ?></td>
                                                    <td><?= strtoupper($app->age); ?></td>
                                                    <td><?= $app->date_of_delivery; ?></td>
                                                    <td><?= $app->lmp; ?></td>
                                                    <td><?= strtoupper($app->bp); ?></td>
                                                    <td><?= strtoupper($app->weight); ?></td>
                                                    <td><?= strtoupper($app->gravida); ?></td>
                                                    <td><?= strtoupper($app->parity); ?></td>
                                                    <td><?= strtoupper($app->term); ?></td>
                                                    <td><?= strtoupper($app->preterm); ?></td>
                                                    <td><?= strtoupper($app->abortion); ?></td>
                                                    <td><?= strtoupper($app->living); ?></td>
                                                    <td><?= strtoupper($app->transaction); ?></td>
                                                    <td><?= strtoupper($row->lab); ?></td>
                                                    <td><?= strtoupper($row->diagnosis); ?></td>
                                                    <td><?= strtoupper($row->treatment); ?></td>
                                                    <td><?= strtoupper($row->remarks); ?></td>
                                                    <td> 
                                                        <a href="<?= base_url(); ?>/Pages/diagnose_edit/<?= $row->id; ?>" class="btn btn-success btn-sm" >EDIT</a> 
                                                        <a href="<?= base_url(); ?>/Pages/diagnose_del/<?= $row->id; ?>/<?= $row->appointment_id; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" >DELETE</a> 
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        

                        

                        

<script>
$(document).ready(function(){
  var sample_data = new Bloodhound({
   datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
   queryTokenizer: Bloodhound.tokenizers.whitespace,
   prefetch:'<?php echo base_url(); ?>pages/fetch',
   remote:{
    url:'<?php echo base_url(); ?>pages/fetch/%QUERY',
    wildcard:'%QUERY'
   }
  });
  

  $('#prefetch .typeahead').typeahead(null, {
   name: 'sample_data',
   display: 'name',
   source:sample_data,
   limit:1000,
   templates:{
    suggestion:Handlebars.compile('<div class="row"><div class="col-md-2" style="padding-right:5px; padding-left:5px;"></div><div class="col-md-10" style="padding-right:5px; padding-left:5px;">{{name}}</div></div>')
   }
  });
});
</script>

                        