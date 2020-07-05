<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Update Profile</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Insert AMS Records</h2>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url(); ?>office_admin/process_insert_ams' method='post'>

                     
                            
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="prefix">Officemate <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name='plantilla' id='prefix' required>
                            <?php 
                              foreach($members as $row){
                                ?>
                                  <option value="<?php echo $row->plantilla; ?>"><?php echo $row->fname.' '.$row->mname.' '.$row->lname.', '.$row->extension.' '.$row->suffix; ?></option>
                                <?php
                              }
                            ?>
                            
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="prefix">Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type='date' name='date' class="form-control" required>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="prefix">Time <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type='time' name='time' class="form-control" required>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="prefix">In/Out <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name='status' id='prefix' required>
                            <option value='1'>In</option>
                            <option value='0'>Out</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="prefix">Remarks <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type='text' name='remarks' class="form-control" required>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            
            

            
          </div>
        </div>
        <!-- /page content -->
        