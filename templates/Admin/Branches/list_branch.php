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
        <h1>List branch</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">List Branch</li>
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
            <h3 class="card-title">List Branch</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="tbl-branches" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Branch Info</th>
                  <th>College Name</th>
                  <th>Total Seats</th>
                  <th>Total Durations</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (count($branches) > 0) {
                  foreach ($branches as $index => $branch) {
                ?>
                    <tr>
                      <td><?= $branch->id ?></td>
                      <td><?= "<b>Name: </b>" . $branch->name . "<br/><b>Session Start: </b> " . $branch->start_date . "<br/><b>Session End: </b>" . $branch->end_date ?></td>
                      <td><?= isset($branch->branch_college->name) ? $branch->branch_college->name : 'N/A' ?></td>
                      <td><?= $branch->total_seats ?></td>
                      <td><?= $branch->total_durations ?></td>
                      <td class="d-flex">
                        <a href="<?= $this->Url->build('/admin/edit-branch/' . $branch->id, ['fullBase' => true]) ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                      </td>
                    </tr>
                <?php
                  }
                }
                ?>
              </tbody>
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
echo '$("#tbl-branches").DataTable();';
$this->Html->scriptEnd();
?>
