<?php
if (!empty($title)) {
  $this->assign('title', $title);
}
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
        <h1>Add college</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Add College</li>
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
            <h3 class="card-title">Add college</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form id="form-add-college">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Name<span class="character-required">*</span></label>
                    <input type="text" required name="name" id="name" placeholder="Enter name" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Short Name<span class="character-required">*</span></label>
                    <input type="text" required name="short_name" id="short_name" placeholder="Enter short name" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="description" rows="3" placeholder="Enter description" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Location<span class="character-required">*</span></label>
                    <textarea required name="location" id="location" rows="3" placeholder="Enter location" class="form-control"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Total faculty<span class="character-required">*</span></label>
                    <input type="number" required min="10" name="total_faculty" id="total_faculty" placeholder="Enter total faculty" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Contact number<span class="character-required">*</span></label>
                    <input type="text" required name="contact_number" id="contact_number" placeholder="Enter contact number" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Email<span class="character-required">*</span></label>
                    <input required type="email" name="email" id="email" placeholder="Enter email" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Cover image<span class="character-required">*</span></label>
                    <input required type="file" name="cover_image" id="cover_image" class="form-control" style="border: none;">
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
  'jquery.validate.min.js'
], ['block' => 'bottomScriptLinks'])
?>

<?php
$this->Html->scriptStart(['block' => true]);
echo '$("#form-add-college").validate();';
$this->Html->scriptEnd();
?>