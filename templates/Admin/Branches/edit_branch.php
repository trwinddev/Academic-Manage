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
        <h1>Edit branch</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit Branch</li>
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
            <h3 class="card-title">Edit Branch</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <?= $this->Form->create($branch, [
                'id' => 'form-edit-branch'
            ]) ?>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Name<span class="character-required">*</span></label>
                    <input type="text" value="<?= $branch->name ?>" required name="name" id="name" placeholder="Enter name" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="description" rows="3" placeholder="Enter description" class="form-control"><?= $branch->description ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Select College<span class="character-required">*</span></label>
                    <select required name="college_id" id="college_id" class="form-control">
                      <option value="">Choose Colleage</option>
                      <?php
                      if(count($colleges) > 0) {
                        foreach ($colleges as $index => $college) {
                        ?>
                        <option <?= $branch->college_id == $college->id ? 'selected' : '' ?> value="<?= $college->id ?>"><?= $college->name ?></option>
                        <?php
                        }
                    }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Total Seats<span class="character-required">*</span></label>
                    <input value="<?= $branch->total_seats ?>" type="number" required min="150" name="total_seats" id="total_seats" placeholder="Enter total seats" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Session Start Date<span class="character-required">*</span></label>
                    <input value="<?= $branch->start_date ?>" type="text" required name="start_date" id="start_date" placeholder="Enter start date" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Session End Date<span class="character-required">*</span></label>
                    <input value="<?= $branch->end_date ?>" type="text" required name="end_date" id="end_date" placeholder="Enter end date" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Total Durations<span class="character-required">*</span></label>
                    <input value="<?= $branch->total_durations ?>" type="number" required min="1" name="total_durations" id="total_durations" placeholder="Enter total durations" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Status<span class="character-required">*</span></label>
                    <select required name="status" id="status" class="form-control">
                      <option <?= $branch->status == 1 ? 'selected' : '' ?> value="1">Active</option>
                      <option <?= $branch->status == 0 ? 'selected' : '' ?> value="0">Inactive</option>
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
            <?= $this->Form->end() ?>
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
echo '  $("#form-edit-branch").validate();';
echo '  pickmeup("input#start_date", {hide_on_select: true}).set_date("'.$branch->start_date.'");';
echo '  pickmeup("input#end_date", {hide_on_select: true}).set_date("'.$branch->end_date.'");';
echo '});';
$this->Html->scriptEnd();
?>
