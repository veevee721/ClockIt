<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Requests for Leave</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Request <small>Leave</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                            <?php 
                        if(!empty($message)){
                            ?>
                                <div class="alert alert-<?php echo $type; ?> " role="alert" style="text-align:center;">
                                    <strong><?php echo $message; ?></strong> 
                                </div>
                            <?php
                        }
                    ?>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%; text-align: center;">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Plantilla</th>
                            <th>Employee Name</th>
                            <th>Request Details</th>
                            <th>Date Start</th>
                            <th>Date End</th>
                            <th>Date Added</th>
                            <th>Status</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                              foreach($requests as $row){
                                ?>
                                <tr>
                                  <td><?php echo $row->id; ?></td>
                                  <td><?php echo $row->plantilla; ?></td>
                                  <td><?php echo $row->prefix.' '.$row->fname.' '.$row->mname.' '.$row->lname.', '.$row->extension.' '.$row->suffix; ?></td>
                                  <td><?php echo $row->request; ?></td>
                                  <td><?php echo $row->date_start; ?></td>
                                  <td><?php echo $row->date_end; ?></td>
                                  <td><?php echo $row->date_added; ?></td>
                                  <td><?php 
                                    if($row->status == 0){
                                      ?>
                                      <span class="badge badge-warning">Pending</span></td>
                                      <?php
                                    }elseif($row->status == 1){
                                      ?>
                                      <span class="badge badge-success">Approved</span></td>
                                      <?php
                                    }else{
                                      ?>
                                      <span class="badge badge-dark">Denied</span></td>
                                      <?php
                                    }
                                  ?>
                                  <td><?php 
                                    if($row->status == 0){
                                      ?>
                                         <a href='<?php echo base_url(); ?>hr/approve_request/<?php echo $row->id; ?>'><abbr title="Approve Pending Request"><i class="fa fa-check"></i></abbr></a>
                                         <a href='<?php echo base_url(); ?>hr/deny_request/<?php echo $row->id; ?>'><abbr title="Deny Pending Request"><i class="fa fa-remove"></i></abbr></a>
                                      <?php
                                    }elseif($row->status == 1){
                                      ?>
                                         <a href='<?php echo base_url(); ?>hr/deny_request/<?php echo $row->id; ?>'><abbr title="Deny Request"><i class="fa fa-remove"></i></abbr></a>
                                      <?php
                                    }else{
                                      ?>
                                         <a href='<?php echo base_url(); ?>hr/approve_request/<?php echo $row->id; ?>'><abbr title="Approve Request"><i class="fa fa-check"></i></abbr></a>
                                      <?php
                                    }
                                  ?>
                                  </td>
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
        