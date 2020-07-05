<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>MOVs</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Insert Daily MOVs</h2>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url(); ?>head/process_insert_mov' method='post'>

                     
                            
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="prefix">Report <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type='text' name='report' class="form-control" required>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button type="submit" class="btn btn-success">File Report</button>
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
                    <h2>Report <small>Detail</small></h2>
                    
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
                            <th>Report</th>
                            <th>Date Added</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                              foreach($report as $row){
                                ?>
                                <tr>
                                  <td><?php echo $row->id; ?></td>
                                  <td><?php echo $row->report; ?></td>
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
        