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
                    <h2>My Profile <small>Details</small></h2>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url(); ?>sds/process_update_profile' method='post'>

                      <?php 
                        foreach($profile as $row){
                          ?>
                            <input type='hidden' name='id' value=<?php echo $row->id; ?>>
                            <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="plantilla">Plantilla <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" disabled name='plantilla' id="plantilla" required="required" class="form-control " placeholder='Input Plantilla/Employee Number Here' value=<?php echo $row->plantilla; ?>>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="prefix">Prefix <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name='prefix' id='prefix'>
                            <option value="MR.">MR.</option>
                            <option value="MS.">MS.</option>
                            <option value="MRS.">MRS.</option>
                            <option value="DR.">DR.</option>
                            <option value="ATTY.">ATTY.</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="fname">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name='fname' id="fname" required="required" class="form-control " placeholder='Input First Name Here' value=<?php echo $row->fname; ?>>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="mname">Middle Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name='mname' id="mname" required="required" class="form-control " placeholder='Input Middle Name Here' value=<?php echo $row->mname; ?>>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="lname">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name='lname' id="fname" required="lname" class="form-control " placeholder='Input Last Name Here' value=<?php echo $row->lname; ?>>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="extension">Extension 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name='extension' id="extension" class="form-control " placeholder='Input Extension Here' value=<?php echo $row->extension; ?>>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="suffix">Suffix
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name='suffix' id="suffix" class="form-control " placeholder='Input Suffix i.e. PhD. Here' value=<?php echo $row->suffix; ?>>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="bdate">Birth Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="date" name='bdate' id="bdate" required="required" class="form-control " value=<?php echo $row->bdate; ?>>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="gender">Gender <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="0" class="join-btn" required> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="1" class="join-btn"> Female
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="position">Position <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name='position' id='position'>
                            <?php 
                              foreach($position as $row){
                                ?>
                                  <option value='<?php echo $row->id; ?>'><?php echo $row->position; ?></option>
                                <?php
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="assignment">Assignment <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name='assignment' id='assignment'>
                            <?php 
                              foreach($office as $row){
                                ?>
                                  <option value='<?php echo $row->id; ?>'><?php echo $row->office; ?></option>
                                <?php
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="role">Role <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name='role' id='role'>
                            <?php 
                              foreach($role as $row){
                                ?>
                                  <option value='<?php echo $row->id; ?>'><?php echo $row->role; ?></option>
                                <?php
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                          <?php
                        }
                      ?>

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
        