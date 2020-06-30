<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Archived Position</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Archived Position <small>Option</small></h2>
                    
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
                            <th>Position</th>
                            <th>Status</th>
                            <th>Date Added</th>
                            <th>Date Last Modified</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($positions as $row){
                                    ?>
                                        <tr>
                                            <td><?php echo $row->id; ?></td>
                                            <td><?php echo $row->position; ?></td>
                                            <td><?php 
                                                if($row->status == 0){
                                                    echo 'Archived';
                                                }
                                            ?></td>
                                            <td><?php echo $row->date_added; ?></td>
                                            <td><?php echo $row->date_modified; ?></td>
                                            <td><a href='<?php echo base_url(); ?>hr/edit_position/<?php echo $row->id; ?>'><abbr title="Edit Position Option"><i class="fa fa-edit"></i></abbr></a>
                                            <a href='<?php echo base_url(); ?>hr/restore_position/<?php echo $row->id; ?>'><abbr title="Restore Position Option"><i class="fa fa-recycle"></i></abbr></a>
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
        