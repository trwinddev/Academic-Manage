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
        <h1>List college</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">List College</li>
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
            <h3 class="card-title">List College</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="tbl-colleges" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>College Info</th>
                  <th>Short Name</th>
                  <th>Cover Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (count($colleges) > 0) {
                  foreach ($colleges as $index => $college) {
                ?>
                    <tr>
                      <td><?= $college->id ?></td>
                      <td><?= "<b>Name: </b>" . $college->name . "<br/><b>Email: </b> " . $college->email . "<br/><b>PhoneNo: </b>" . $college->contact_number ?></td>
                      <td><?= $college->short_name ?></td>
                      <td><?= $this->Html->image('/' . $college->cover_image, ['style' => 'width: 70px;height: 70px; object-fit: cover;']) ?></td>
                      <td>
                        <a href="<?= $this->Url->build('/admin/edit-college/' . $college->id, ['fullBase' => true]) ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                        <a href="" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
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
echo '$("#tbl-colleges").DataTable();';
$this->Html->scriptEnd();
?>