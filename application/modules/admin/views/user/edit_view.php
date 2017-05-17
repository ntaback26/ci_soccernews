<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Quản lý thành viên
        </h1>
    </div>
</div>
<!-- /.row -->

<h3>Sửa thành viên</h3>

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
  action="<?php echo base_url().$module.'/user/edit/'.$data['id']; ?>">
  
  <div class="form-group">
    <label class="col-sm-4 control-label">Tên đăng nhập</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" required />      
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-4 control-label">Mật khẩu</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" name="password" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-4 control-label">Xác nhận mật khẩu</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" name="password2" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-4 control-label">Email</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>" required />      
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-4 control-label">Cấp bậc</label>
    <div class="col-sm-8">
      <select name="level">
        <option value="1" <?php if ($data['level'] == 1) echo "selected"; ?>>Thành viên</option>
        <option value="2" <?php if ($data['level'] == 2) echo "selected"; ?>>Admin</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <input type="submit" class="btn btn-info" name="ok" value="Sửa" />
    </div>
  </div>

</form> 
  
