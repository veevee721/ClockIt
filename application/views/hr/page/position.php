<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Position</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Create Position Option <small>adding Position Option</small></h2>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url(); ?>hr/process_add_position' method='post'>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Position <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name='position' id="first-name" required="required" class="form-control " placeholder='Input Position Option Here'>
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
                    <h2>Position <small>Option</small></h2>
                    
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
                                                if($row->status == 1){
                                                    echo 'Active';
                                                }
                                            ?></td>
                                            <td><?php echo $row->date_added; ?></td>
                                            <td><?php echo $row->date_modified; ?></td>
                                            <td><a href='<?php echo base_url(); ?>hr/edit_position/<?php echo $row->id; ?>'><abbr title="Edit Position Option"><i class="fa fa-edit"></i></abbr></a>
                                            <a href='<?php echo base_url(); ?>hr/archive_position/<?php echo $row->id; ?>'><abbr title="Archive Position Option"><i class="fa fa-archive"></i></abbr></a>
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
        