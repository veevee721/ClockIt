<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>File Leave Request</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Leave <small>Details</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php 
                        if(!empty($message)){
                            ?>
                                <div class="alert alert-<?php echo $type; ?> " role="alert" style="text-align:center;">
                                    <strong><?php echo $message; ?></strong> 
                                </div>
                            <?php
                        }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url(); ?>hr/process_add_leave' method='post'>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="plantilla">Leave Info <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name='request' id='prefix'>
                            <?php foreach($leave_type as $row){
                              ?>
                                <option value='<?php echo $row->id; ?>'><?php echo $row->type; ?></option>
                              <?php
                              }?>
                            
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="date_start">Date Start<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="date" name='date_start' id="date_start" required="required" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="date_end">Date End<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="date" name='date_end' id="date_end" required="required" class="form-control ">
                        </div>
                      </div>
                      

                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employee <small>Detail</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%; text-align: center;">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Leave Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Date Added</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                              foreach($request as $row){
                                ?>
                                <tr>
                                  <td><?php echo $row->id; ?></td>
                                  <td><?php foreach($leave_type as $row1){
                                      if($row->request == $row1->id){
                                        echo $row1->type;
                                      }
                                    } ?></td>
                                  <td><?php echo $row->date_start; ?></td>
                                  <td><?php echo $row->date_end; ?></td>
                                  <td><?php 
                                    if($row->status == 0){
                                      echo 'Pending';
                                    }elseif($row->status == 1){
                                      echo 'Approve';
                                    }else{
                                      echo 'Denied';
                                    }
                                  ?></td>
                                  <td><?php echo $row->date_added; ?></td>
                                  </tr>
                                <?php
                              }
                            ?>
                                    
                        </tbody>
                    </table>
                  </div>
                  </div>
              </div>
              </div>
              </div>
              </div>
            </div>

            
          </div>
        </div>
        <!-- /page content -->
        