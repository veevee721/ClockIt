<!-- top navigation -->
<div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php
                    $url = $_SERVER['DOCUMENT_ROOT'].'/clockit/img/profile/'.$this->session->userdata('username').'.jpg'; 
                  if(file_exists($url) == 1){
                    echo base_url().'img/profile/'.$this->session->userdata('username').'.jpg';
                  }else{
                    echo base_url().'img/blank_user.png';
                  }
                ?>" alt=""><?php 
                if(!empty($name)){
                  echo $name;
                }else{
                  echo 'Office Admin';
                }
              ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item"  href="<?php echo base_url(); ?>member/view_profile/<?php echo $this->session->userdata('username'); ?>"><i class="fa fa-eye pull-right"></i> View Profile</a>
                    <a class="dropdown-item"  href="<?php echo base_url(); ?>member/update_profile/<?php echo $this->session->userdata('username'); ?>"><i class="fa fa-edit pull-right"></i> Update Profile</a>
                    <a class="dropdown-item"  href="<?php echo base_url(); ?>member/update_image/<?php echo $this->session->userdata('username'); ?>"><i class="fa fa-upload pull-right"></i> Update Image</a>
                    <a class="dropdown-item"  href="<?php echo base_url(); ?>member/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->