<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Archived Office</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>
            
            <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Archived Office <small>Option</small></h2>
                    
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
                            <th>Office</th>
                            <th>Status</th>
                            <th>Date Added</th>
                            <th>Date Last Modified</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($offices as $row){
                                    ?>
                                        <tr>
                                            <td><?php echo $row->id; ?></td>
                                            <td><?php echo $row->office.' ('.$row->abbr.')'; ?></td>
                                            <td><?php 
                                                if($row->status == 0){
                                                    echo 'Archived';
                                                }
                                            ?></td>
                                            <td><?php echo $row->date_added; ?></td>
                                            <td><?php echo $row->date_modified; ?></td>
                                            <td><a href='<?php echo base_url(); ?>admin/edit_office/<?php echo $row->id; ?>'><abbr title="Edit Office Option"><i class="fa fa-edit"></i></abbr></a>
                                            <a href='<?php echo base_url(); ?>admin/restore_office/<?php echo $row->id; ?>'><abbr title="Restore Office Option"><i class="fa fa-recycle"></i></abbr></a></td>
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
        