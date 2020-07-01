<!-- page content -->
<div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Employees</span>
              <div class="count"><?php echo $staffs; ?></div>
              
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Number of Office Members</span>
              <div class="count"><?php echo $members; ?></div>
              
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-building"></i> Number of Offices</span>
              <div class="count"><?php echo $offices; ?></div>
              
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-flag"></i> Total Office Heads </span>
              <div class="count"><?php echo $heads; ?></div>
              
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
                    <h2>Offices <small>Offices and Their Members</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="bar-chart-office" style="height:280px;"></div>
                  </div>
              </div>
            </div>

          </div>
          <br />

      
        </div>
        <!-- /page content -->
        <script src="<?php echo base_url(); ?>vendors/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/morris.js/morris.min.js"></script>
    <script>
        $(document).ready(function () {
          Morris.Bar({
            element: 'bar-chart-office',
            data: <?php echo $office; ?>,
            xkey: 'office',
            ykeys: ['count'],
            labels: ['Total Number']
            
          });
        });
        

      
        
        
    </script>