<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Profile</h3>
              </div>

              
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Report <small>Activity report</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <?php 
                            $url = $_SERVER['DOCUMENT_ROOT'].'/clockit/img/profile/'.$this->uri->segment(3).'.jpg';
                            if(file_exists($url) == 1){
                                
                                  ?>
                                    <img class="img-responsive avatar-view" src="<?php echo base_url(); ?>img/profile/<?php echo $this->uri->segment(3); ?>.jpg" alt="Avatar" style="height: 20em; width: 20em;">
                                  <?php
                                
                            }else{
                              ?>
                                <img class="img-responsive avatar-view" src="<?php echo base_url(); ?>img/blank_user.png" alt="Avatar" style="height: 20em; width: 20em;">
                              <?php
                            }
                          ?>
                          
                        </div>
                      </div>
                      <?php
                        foreach($profile as $row){
                            ?> 
                            <h3><?php echo $row->prefix.' '.$row->fname.' '.$row->mname.' '.$row->lname.', '.$row->extension.' '.$row->suffix; ?></h3>
                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $row->office; ?>
                                </li>
                                <li>
                                <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $row->position; ?>
                                </li>
                            </ul>
                        <?php
                        }
                      ?>
                    </div>
                    <div class="col-md-9 col-sm-9 ">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Attendance</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Request for Leave</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>In/Out</th>
                                    <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($ams as $row){
                                            ?>
                                            <td><?php echo $row->date; ?></td>
                                            <td><?php echo $row->time; ?></td>
                                            <td><?php if($row->status == 0){
                                                echo 'Out';
                                            }else{
                                                echo 'In';
                                            } ?></td>
                                            <td><?php echo $row->remarks; ?></td>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                    <th>Leave Details</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        foreach($request as $row){
                                            ?>
                                            <td><?php echo $row->request; ?></td>
                                            <td><?php echo $row->date_start; ?></td>
                                            <td><?php echo $row->date_start; ?></td>
                                            <td><?php if($row->status == 0){
                                                echo 'Pending';
                                            }elseif($row->status == 1){
                                                echo 'Approved';
                                            }else{
                                                echo 'Denied';
                                            } ?></td>
                                            
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <!-- end user projects -->

                          </div>
                          
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