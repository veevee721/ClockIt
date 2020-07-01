<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Archived Employee</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Archived Employee <small>Detail</small></h2>
                    
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
                            <th>Plantilla</th>
                            <th>Employee Name</th>
                            <th>Birth Date</th>
                            <th>Gender</th>
                            <th>Position</th>
                            <th>Office ASsigned To</th>
                            <th>Status</th>
                            <th>Date Added</th>
                            <th>Date Last Modified</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                              foreach($employee as $row){
                                ?>
                                <tr>
                                  <td><?php echo $row->id; ?></td>
                                  <td><?php echo $row->plantilla; ?></td>
                                  <td><?php echo $row->prefix.' '.$row->fname.' '.$row->mname.' '.$row->lname.', '.$row->extension.' '.$row->suffix; ?></td>
                                  <td><?php echo $row->bdate; ?></td>
                                  <td><?php if($row->gender == 0){
                                    echo 'Male';
                                  }else{
                                    echo 'Female';
                                  } ?></td>
                                  <td><?php echo $row->position; ?></td>
                                  <td><?php echo $row->office; ?></td>
                                  <td><span class="badge badge-secondary">Archived</span></td>
                                  <td><?php echo $row->date_added; ?></td>
                                  <td><?php echo $row->date_modified; ?></td>
                                  <td><a href='<?php echo base_url(); ?>hr/view_profile/<?php echo $row->id; ?>'><abbr title="View Employee Profile"><i class="fa fa-eye"></i></abbr></a>
                                            <a href='<?php echo base_url(); ?>hr/restore_profile/<?php echo $row->plantilla; ?>'><abbr title="Restore Employee Profile"><i class="fa fa-recycle"></i></abbr></a></td>
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
        