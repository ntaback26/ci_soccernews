<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Quản lý tin tức
        </h1>
    </div>
</div>
<!-- /.row -->

<h3>>> <?php echo ucwords($cate_title); ?> - Thêm tin tức</h3><br />

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
  if ($error_upload != "") {
    echo '<div class="alert alert-danger" role="alert">';
    echo "<ul>";
    echo "<li>$error_upload</li>";
    echo "</ul>";
    echo '</div>'; 
  }
  
?>

<form class="form-horizontal" method="POST" enctype="multipart/form-data"
  action="<?php echo base_url().$module.'/news/create/'.$cate_id; ?>">
  
  <div class="form-group">
    <label class="col-sm-2 control-label">Tiêu đề</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="title" placeholder="Vui lòng điền tiêu đề của bản tin" required />      
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Tác giả</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="author" placeholder="Vui lòng điền tên tác giả" required />      
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Mô tả</label>
    <div class="col-sm-8">
      <textarea class="form-control" name="description" rows="2" placeholder="Vui lòng điền mô tả của bản tin"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Nội dung</label>
    <div class="col-sm-8">
      <textarea class="form-control" name="detail"></textarea>
      <script src="<?php echo $public_path; ?>js/ckeditor/ckeditor.js"></script>
      <script type="text/javascript">
        CKEDITOR.replace('detail');
      </script>
    </div>
  </div>
 
  <div class="form-group">
    <label class="col-sm-2 control-label">Ảnh đại diện</label>
    <div class="col-sm-8">
      <input type="file" name="img" />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
      <input type="submit" class="btn btn-primary" name="ok" value="Thêm" />&nbsp;
      <input type="reset" class="btn btn-default" value="Reset" />
    </div>
  </div>

</form>  