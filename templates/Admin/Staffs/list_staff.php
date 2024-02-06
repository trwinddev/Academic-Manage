<?php
if (!empty($title)) {
  $this->assign('title', $title);
}
$this->Html->css([
  '/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
], ['block' => 'TopStyleLinks']);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>List staff</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">List Staff</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Form Element sizes -->
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">List Staff</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="tbl-staffs" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Staff Info</th>
                  <th>College/Branch</th>
                  <th>Designation</th>
                  <th>Gender</th>
                  <th>Profile Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Staff Info</th>
                  <th>College/Branch</th>
                  <th>Designation</th>
                  <th>Gender</th>
                  <th>Profile Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card-body -->
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?= $this->Html->script([
  '/plugins/datatables/jquery.dataTables.min.js',
  '/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
], ['block' => 'bottomScriptLinks'])
?>

<?php
$this->Html->scriptStart(['block' => true]);
echo '$("#tbl-staffs").DataTable();';
$this->Html->scriptEnd();
?>