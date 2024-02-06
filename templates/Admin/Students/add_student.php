<?php
if (!empty($title)) {
  $this->assign('title', $title);
}
?>
<?=
$this->Html->css([
  'pickmeup.css'
], ['block' => 'TopStyleLinks'])
?>
<style>
  .error,
  .character-required {
    color: red;
  }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Add student</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Add Student</li>
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
            <h3 class="card-title">Add Student</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form id="form-add-student">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Name<span class="character-required">*</span></label>
                    <input type="text" required name="name" id="name" placeholder="Enter name" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Email<span class="character-required">*</span></label>
                    <input type="email" required name="email" id="email" placeholder="Enter email" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Phone No<span class="character-required">*</span></label>
                    <input type="text" required name="phone_no" id="phone_no" placeholder="Enter phone no" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Desciption</label>
                    <textarea name="desciption" id="desciption" rows="3" placeholder="Enter description" class="form-control"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Select College<span class="character-required">*</span></label>
                    <select required name="college_id" id="college_id" class="form-control">
                      <option value="">Sample Colleage</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Select Branch<span class="character-required">*</span></label>
                    <select required name="branch_id" id="branch_id" class="form-control">
                      <option value="">Sample Branch</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Select Gender<span class="character-required">*</span></label>
                    <select required name="gender" id="gender" class="form-control">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="others">Others</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Select Blood Group<span class="character-required">*</span></label>
                    <select required name="blood_group" id="blood_group" class="form-control">
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B+">B-</option>
                      <option value="0+">0+</option>
                      <option value="0-">0-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Profile image<span class="character-required">*</span></label>
                    <input required type="file" name="profile_image" id="profile_image" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">DOB<span class="character-required">*</span></label>
                    <input type="text" required name="dob" id="dob" placeholder="Enter dob" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Status<span class="character-required">*</span></label>
                    <select required name="status" id="status" class="form-control">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <button name="btn_submit" class="btn btn-success">Submit</button>
                    </select>
                  </div>
                </div>
              </div>
            </form>
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
  'jquery.validate.min.js',
  'pickmeup.js',
], ['block' => 'bottomScriptLinks'])
?>

<?php
$this->Html->scriptStart(['block' => true]);
echo '$(document).ready(function() {';
echo '  $("#form-add-student").validate();';
echo '  pickmeup("input#dob", {hide_on_select: true});';
echo '});';
$this->Html->scriptEnd();
?>