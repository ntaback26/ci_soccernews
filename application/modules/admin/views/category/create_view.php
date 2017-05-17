<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Quản lý chuyên mục
        </h1>
    </div>
</div>
<!-- /.row -->

<h3>Thêm chuyên mục</h3>

<?php  
  // Echo validation error
  if (validation_errors() != "") {
    $errors = $this->form_validation->error_array();
    echo '<div class="alert alert-danger" role="alert">';
    echo "<ul>";
    foreach ($errors as $item) {
      echo "<li>$item</li>";
    }
    echo "</ul>";
    echo '</div>'; 
  }
?>

<form class="form-horizontal form-create" method="POST" 
  action="<?php echo base_url().$module.'/category/create'; ?>">
  
  <div class="form-group">
    <label class="col-sm-5 control-label">Chọn chuyên mục cha</label>
    <div class="col-sm-7">
      <select name="parent">
        <option value="0">Root</option>
        <?php select_menu($data); ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-5 control-label">Tên chuyên mục</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" name="title" placeholder="Vui lòng điền tên chuyên mục" required />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-7">
      <input type="submit" class="btn btn-primary" name="ok" value="Thêm" />
    </div>
  </div>

</form>  