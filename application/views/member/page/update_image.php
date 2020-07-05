<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Update Profile Image</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>My Profile <small>Image</small></h2>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url(); ?>sds/process_update_image' method='post' enctype="multipart/form-data">

                      <?php 
                        foreach($profile as $row){
                          ?>
                            <input type='hidden' name='plantilla' value=<?php echo $row->plantilla; ?>>
                            
                          <?php
                        }
                      ?>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Image <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" id="first-name" required="required" name="userfile" class="form-control " onchange="previewFile()">
                        </div>
                      </div>
                      <div class='item form-group'>
                      <div class="col-md-3 col-sm-3 "></div>
                        <center>
                        <h3>Preview</h3>
                        <div class="col-md-6 col-sm-6 ">
                          <img id="uploadPreview" style="width: 512px; height: 512px;" />  
                        </div>
                        </center>
                        <div class="col-md-3 col-sm-3 "></div>
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
        <script type="text/javascript">

function previewFile() {
  var preview = document.getElementById('uploadPreview');
  var file = document.querySelector('input[type=file]').files[0];
  var reader = new FileReader();

  // when user select an image, `reader.readAsDataURL(file)` will be triggered
  // reader instance will hold the result (base64) data
  // next, event listener will be triggered and we call `reader.result` to get
  // the base64 data and replace it with the image tag src attribute
  reader.addEventListener("load", function() {
    console.log('before preview');
    preview.src = reader.result;
    console.log('after preview');
  }, false);

  if (file) {
    console.log('inside if');
    reader.readAsDataURL(file);
  } else {
    console.log('inside else');
  }

  /*
  FLOW OF THE RESULT:
  
  inside if
  before preview
  after preview
  */
}
</script>