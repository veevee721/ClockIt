<!-- page content -->
<div class="right_col" role="main">
  <!-- top tiles -->
  <div class="row" style="display: inline-block;" >
            <div class="tile_count">
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                <div class="count"><?php echo $users; ?></div>
                
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Number of Administrators</span>
                <div class="count"><?php echo $admins; ?></div>
                
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-building"></i> Number of Offices</span>
                <div class="count"><?php echo $offices; ?></div>
                
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-flag"></i> Total Audit Logs</span>
                <div class="count"><?php echo $audits; ?></div>
                
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock"></i> Total Logs</span>
                <div class="count"><?php echo $logs; ?></div>
                
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-archive"></i> Total Reports</span>
                <div class="count"><?php echo $reports; ?></div>
                
              </div>
              
            </div>
          </div>
          
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Roles <small>User Roles</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="bar-chart-role" style="height:280px;"></div>
                  </div>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Offices <small>Offices and Their Members</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="bar-chart-office" style="height:280px;"></div>
                  </div>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="row">
                  <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%; text-align: center;">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>User</th>
                          <th>Action</th>
                          <th>Date Added</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          foreach($audit as $row){
                        ?>
                          <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->user; ?></td>
                            <td><?php echo $row->action; ?></td>
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
          
          <br />
</div>
          

      
        
        <!-- /page content -->
        <!-- morris.js -->
    <script src="<?php echo base_url(); ?>vendors/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/morris.js/morris.min.js"></script>
    <script>
        $(document).ready(function () {
          Morris.Bar({
            element: 'bar-chart-role',
            data: <?php echo $role?>,
            xkey: 'role',
            ykeys: ['count'],
            labels: ['Total Number']
            
          });
          Morris.Bar({
            element: 'bar-chart-office',
            data: <?php echo $office; ?>,
            xkey: 'office',
            ykeys: ['count'],
            labels: ['Total Number']
            
          });
        });
        

      
        
        
    </script>