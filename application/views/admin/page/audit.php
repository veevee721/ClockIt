<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Audit Trail</h3>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
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
                foreach($audits as $row){
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
<!-- /page content -->
        