<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Office Heads</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="col-md-12 col-sm-12  text-center">
                        
                      </div>

                      <div class="clearfix"></div>
                        <?php 
                            foreach($members as $row){
                                ?>
                                <div class="col-md-4 col-sm-4  profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i><?php echo $row->position?></i></h4>
                            <div class="left col-md-7 col-sm-7">
                              <h2><?php echo $row->prefix.' '.$row->fname.' '.$row->mname.' '.$row->lname.', '.$row->extension.' '.$row->suffix; ?></h2>
                              <h2><?php echo $row->office; ?></h2>
                              <?php 
                                if($row->status == 1){
                                  ?>
                                    <span class="badge badge-white">No Data</span>
                                  <?php
                                }elseif($row->status == 2){
                                  ?>
                                    <span class="badge bg-green">In</span>
                                  <?php
                                }elseif($row->status == 3){
                                  ?>
                                    <span class="badge badge-dark">Out</span>
                                  <?php
                                }elseif($row->status == 4){
                                  ?>
                                    <span class="badge badge-warning">On Leave</span>
                                  <?php
                                }

                                if($row->role == 5){
                                  ?>
                                      <a href='<?php echo base_url(); ?>head/assign_employee/<?php echo $row->plantilla; ?>' class='btn btn-primary'>Assign As Office Administrator</a>
                                  <?php
                                }elseif($row->role == 4){
                                  ?>
                                      <a href='<?php echo base_url(); ?>head/unassign_employee/<?php echo $row->plantilla; ?>'' class='btn btn-secondary'>Unassign As Office Administrator</a>
                                  <?php
                                }
                              ?>
                              
                            </div>
                            <div class="right col-md-5 col-sm-5 text-center">
                            <?php 
                                $url = $_SERVER['DOCUMENT_ROOT'].'/clockit/img/profile/'.$row->plantilla.'.jpg';
                                if(file_exists($url) == 1){
                                    ?>
                                        <img src="<?php echo base_url(); ?>img/profile/<?php echo $row->plantilla; ?>.jpg" alt="" class="img-circle img-fluid" style='<?php 
                                            if($row->status == 3 || $row->status == 4 || $row->status == 1){
                                                echo 'filter: grayscale(100%);';
                                            }
                                        ?>'>
                                    <?php
                                }else{
                                    ?>
                                        <img src="<?php echo base_url(); ?>img/blank_user.png" alt="" class="img-circle img-fluid" style='<?php 
                                            if($row->status == 3 || $row->status == 4){
                                                echo 'filter: grayscale(100%);';
                                            }
                                        ?>'>
                                    <?php
                                }
                            ?>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                                <?php
                            }
                        ?>
                      
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /page content -->