<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Quản lý chuyên mục
        </h1>
    </div>
</div>
<!-- /.row -->

<h3>Sửa chuyên mục</h3>

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
  action="<?php echo base_url().$module.'/category/edit/'.$data['cate_id']; ?>">
  
  <div class="form-group">
    <label class="col-sm-5 control-label">Chọn chuyên mục cha</label>
    <div class="col-sm-7">
      <select name="parent">
        <?php create_menu($menu, 0, '', $data['parent_id']); ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-5 control-label">Tên chuyên mục</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" name="title" value="<?php echo $data['cate_title']; ?>" required />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-7">
      <input type="submit" class="btn btn-info" name="ok" value="Sửa" />
    </div>
  </div>

</form>  