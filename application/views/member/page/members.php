<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Officemates Attendance</h3>
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
                  echo form_open('office_admin/process_daily');
                  ?>
                      <div class="col-md-4 col-sm-4  form-group has-feedback">
                          <select class="form-control" name='plantilla' >
                            <?php foreach($members as $row){
                              ?>
                                <option value='<?php echo $row->plantilla; ?>'><?php echo $row->fname.' '.$row->mname.' '.$row->lname.' '.$row->extension.' '.$row->suffix; ?></option>
                              <?php
                              }?>
                            
                          </select>
                      </div>
                      
                      <div class="col-md-4 col-sm-4  form-group has-feedback">
                        <input type="date" class="form-control has-feedback-left" id="inputSuccess2" placeholder="From" name='from' required >
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true" tooltip='From'></span>
                      </div>

                      <div class="col-md-4 col-sm-4  form-group has-feedback">
                        <input type="date" class="form-control has-feedback-left" id="inputSuccess3" placeholder="To" name='to' required>
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true" tooltip='To'></span>
                      </div>
                      <div class="col-md-9 col-sm-9">
                        <input type='submit' class='btn btn-primary' value='Search'>
                      </div>
                  </div>
                  <?php
                  echo form_close();
                
                  if(!empty($to)){
                    ?>
                      <h1>Summary of Daily Attendance for <?php echo $from; ?> to <?php echo $to; ?></h1>
                    <?php
                  }
                ?>
                      <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>In/Out</th>
                      <th>Remarks</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    if(!empty($ams)){
                      foreach($ams as $row){
                        ?>
                          <tr>
                            <td><?php echo $member; ?></td>
                            <td><?php echo $row->date; ?></td>
                            <td><?php echo $row->time; ?></td>
                            <td><?php if($row->status == 0){
                              echo 'Out';
                              }else{
                              echo 'In';
                            } ?></td>
                            <td><?php echo $row->remarks; ?></td>
                          </tr>
                        <?php
                        }
                    }else{
                      echo 'empty';
                    }
                  ?>
                  </tbody>
                </table>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /page content -->