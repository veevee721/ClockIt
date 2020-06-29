<div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <?php 
              echo form_open('ams/process_login');
            ?>
              <h1>Login Form</h1>
              <?php 
                if(!empty($message)){
                  ?>
                    <div class="alert alert-danger " role="alert">
                      <strong>Danger!</strong> <?php echo $message; ?>
                    </div>
                  <?php
                }
              ?>
              <div>
                <input type="text" name='username' class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name='password' class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                
                  <input type='submit' class="btn btn-default" value='Log in'>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-clock-o"></i> ClockIt Attendance Monitoring System</h1>
                  <p>©2020 All Rights Reserved. ClockIt Attendance Monitoring System. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>