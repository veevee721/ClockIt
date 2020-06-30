<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url(); ?>" class="site_title"><i class="fa fa-clock-o"></i> <span>ClockIt</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php 
                  if(!empty($plantilla)){
                    echo base_url().'img/'.$plantilla.'.jpg';
                  }else{
                    echo base_url().'img/blank_user.png';
                  }
                ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php 
                  if(!empty($name)){
                    echo $name;
                  }else{
                    echo 'HR';
                  }
                ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />