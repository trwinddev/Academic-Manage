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
        <h1>List student</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">List Student</li>
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
            <h3 class="card-title">List Student</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="tbl-students" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Student Info</th>
                  <th>College/Branch</th>
                  <th>Gender</th>
                  <th>Profile Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (count($students) > 0) {
                  foreach ($students as $index => $student) {
                ?>
                    <tr>
                      <td><?= $student->id ?></td>
                      <td>
                        <?= "<b>Name: </b>" . $student->name ?><br>
                        <?= "<b>Email: </b>" . $student->email ?><br>
                        <?= "<b>PhoneNo: </b>" . $student->phone_no ?><br>
                        <?= "<b>BG: </b>" . $student->blood_group ?><br>
                      </td>
                      <td>
                        <button class="btn btn-info" data-toggle="modal" data-target="#modal-allot-college">Allot College</button>
                      </td>
                      <td><?= strtoupper($student->gender) ?></td>
                      <td>
                        <?= $this->Html->image("/" . $student->profile_image, [
                          'style' => 'width: 70px; height: 70px; object-fit: cover',
                        ]) ?>
                      </td>
                      <td>
                        <?= $student->status == 1
                          ? "<button class='btn btn-success'>Active</button>"
                          : "<button class='btn btn-danger'>Inactive</button>"
                        ?>
                      </td>
                      <td>
                        <a href="" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
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

<!-- The Modal -->
<div class="modal" id="modal-allot-college">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Assign College/Branch</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="javascript:void(0)" method="post">
          <div class="form-group">
            <label>Select College:</label>
            <select name="dd_college" id="dd_college" class="form-control">
              <option value="">Choose college</option>
              <?php
              foreach ($colleges as $index => $college) {
              ?>
                <option value="<?= $college->id ?>"><?= $college->name ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Select Branch:</label>
            <select name="dd_branch" id="dd_branch" class="form-control">
              <option value="">Choose branch</option>
            </select>
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox"> Remember me
            </label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->Html->script([
  '/plugins/datatables/jquery.dataTables.min.js',
  '/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
], ['block' => 'bottomScriptLinks'])
?>

<?php
$this->Html->scriptStart(['block' => true]);
echo '$("#tbl-students").DataTable();';
echo '$(document).on("change", "#dd_college", function(){
    var college_id = $(this).val();
    var postdata = "college_id=" + college_id;
    $.get("' . $this->Url->build("/admin/allot-college", ["fullBase" => true]) .'", postdata, function(response) {
        var data = $.parseJSON(response);
        if(data.status) {
            var branchHtml = "<option value=\'\'>Choose Branch</option>";
            $.each(data.branches, function(index, item) {
                branchHtml += "<option value=\'"+item.id+"\'>"+item.name+"</option>"
            });

            $("#dd_branch").html(branchHtml);
        }
    })
})';
$this->Html->scriptEnd();
?>
