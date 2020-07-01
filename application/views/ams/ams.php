
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>ClockIt Attendance Monitoring System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sticky-footer/">
    <link rel="icon" href="<?php echo base_url(); ?>rsc/logo.png" type="image/ico" />
    <!-- Bootstrap core CSS -->
<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    
<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
   
  </head><body class="d-flex flex-column h-100" onload="startTime()"> 
  <br><br><br>
  <div class="container login-container">
            <div class="row ams">
                <div class="col-md-6 login-form-1">
                           <?php 
                           if(!empty($member)){
                            foreach($member as $row){
                              $url = $_SERVER['DOCUMENT_ROOT'].'/clockit/img/employee'.$row->plantilla.'.jpg';
                            }
                            if(file_exists($url) == 1){
                                foreach($member as $row1){
                                  ?>
                                    <img class="img-responsive avatar-view" src="<?php echo base_url(); ?>img/profile/<?php echo $row1->plantilla; ?>.jpg" alt="Avatar" style="width:512px; height: 512px;">
                                  <?php
                                }
                            }else{
                              ?>
                                <img class="img-responsive avatar-view" src="<?php echo base_url(); ?>img/blank_user.png" alt="Avatar" style="height: 512px; width: 512px;">
                              <?php
                            }
                          }else{
                            ?>
                            <img class="img-responsive avatar-view" src="<?php echo base_url(); ?>img/blank_user.png" alt="Avatar" style="height: 100%; width: 100%;">
                            <?php
                          }
                          ?>
                    
                </div>
                <div class="col-md-6 login-form-2 form">
                   <center>
                  
                   <?php 
                    echo form_open('ams/process_ams');
                   ?>
                   <br><br><br><br>
                   <?php 
                    
                      if($status == 'a'){

                      }else{
                        if($status == 2){
                          ?>
                            <h1>See You Later</h1>
                          <?php
                        }elseif($status == 1){
                          ?>
                            <h1>Welcome!</h1>
                          <?php
                        }elseif($status == 'b'){
                          ?>
                            <h1>You Already Swipped Try Again After Five (5) Minutes</h1>
                          <?php
                        }else{
                          ?>
                            <h1>ID Number Not Found</h1>
                          <?php
                        }
                      }
                      
                    
                    
                    if(!empty($member)){
                      foreach($member as $row){
                        ?>
                        <h1><?php echo $row->fname.' '.$row->lname;?></h1>
                        <h1><?php echo $row->plantilla;?></h1>
                        <?php
                      }
                    }else{
                      ?>
                        <h1>Employee Name</h1>
                        <h1>Employee Number</h1>
                      <?php
                    }
                   ?>
                   
                    
                    <input type="text" tabindex="1" class="form-control" name="plantilla" autofocus placeholder="Please Scan Your ID Here">
                    <?php echo form_close(); ?>
                    <h1><?php echo date("m/d/Y"); ?></h1><br>
                    <h1 id="txt"><strong></strong></h1>
                    </center>
                </div>
            </div>
        </div>
</body>
<style>
  body{
    background: #686767;
  }
  .ams{
    background: #fff;
  }
  .form {
    background-image: url("<?php echo base_url(); ?>img/do.jpg");
    background-size: cover;
  }

  input{
    text-align:center;
  }
</style>
<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>

</html>