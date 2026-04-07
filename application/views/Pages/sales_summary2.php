                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                <!-- <a class="btn btn-success" href="patient_add">New Patient</a> -->
                               
                             
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">

                        <form method="post" action="<?php echo base_url('Pages/sales_summary'); ?>">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label>FROM</label>
                                <input type="date" name="start_date" class="form-control" required />
                            </div>
                            <div class="form-group col-md-5">
                                <label>TO</label>
                                <input type="date" name="end_date" class="form-control" required />
                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="submit" value="View Data" class="btn btn-primary waves-effect waves-light" />
                            </div>
                        </div>
                    </form>
                    </div>
                        </div>



                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                    <h4> <?php if (isset($start_date) && isset($end_date)) { ?>
                                    SALES SUMMARY REPORT FROM <strong> <?php echo date('m/d/Y', strtotime($start_date)); ?></strong> TO <strong><?php echo date('m/d/Y', strtotime($end_date)); ?></strong>
                                 <?php } ?></h4>
                                        
                                    <?php if (isset($filtered_data) && !empty($filtered_data)) { ?>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                                <tr>
                                                <tr>
                                                    <th>PATIENT NAME</th>
                                                    <th>DATE</th>
                                                    <th>RECEIPT CODE</th>
                                                    <th>TOTAL AMOUNT</th>
                                                    <th>TOTAL DISCOUNT</th>
                                                    <th>TOTAL AMOUNT DUE</th>
                                                    <th>COMENT</th>
                                                   
                                                </tr>
                                            </thead>

                                            <tbody>

                                            <?php 
                                            $totalAmount = 0;
                                            foreach ($filtered_data as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row->patientName; ?></td>
                                                    <td><?php echo $row->date; ?></td>
                                                    <td><?php echo $row->reciept_code; ?></td>
                                                    <td><?php echo $row->total_retail; ?></td>
                                                    <td><?php echo $row->discount; ?></td>
                                                    <td><?php echo $row->amount_due; ?></td>
                                                    <td><?php echo $row->comment; ?></td>
                                                 
                                                    <?php
                                       
                                                               $totalAmount += $row->amount_due;
                                                                ?>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                    </table>
                                                    <?php if (!empty($filtered_data)) { ?>
                                                        <tr>
                                                            <td colspan="6"><strong>TOTAL SALES SUMMARY</strong></td>
                                                            <td><strong><?php echo number_format($totalAmount, 2); ?></strong></td>
                                                        </tr>
                                                    <?php } else { ?>
                                                        <p>No data available for the selected date range.</p>
                                                    <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        