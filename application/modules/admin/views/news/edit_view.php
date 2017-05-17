<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Quản lý tin tức
        </h1>
    </div>
</div>
<!-- /.row -->

<h3>>> <?php echo ucwords($cate_title); ?> - Sửa tin tức</h3><br />

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
  action="<?php echo base_url().$module.'/news/edit/'.$cate_id.'/'.$data['news_id']; ?>">
  
  <div class="form-group">
    <label class="col-sm-2 control-label">Tiêu đề</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="title" value="<?php echo $data['news_title']; ?>" required />      
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Tác giả</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="author" value="<?php echo $data['news_author']; ?>" required />      
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Mô tả</label>
    <div class="col-sm-9">
      <textarea class="form-control" name="description" rows="2"><?php echo $data['news_description']; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Nội dung</label>
    <div class="col-sm-9">
      <textarea class="form-control" name="detail"><?php echo $data['news_detail']; ?></textarea>
      <script src="<?php echo $public_path; ?>js/ckeditor/ckeditor.js"></script>
      <script type="text/javascript">
        CKEDITOR.replace('detail');
      </script>
    </div>
  </div>
 
  <div class="form-group">
    <label class="col-sm-2 control-label">Ảnh đại diện</label>
    <div class="col-sm-8">
      <img src="<?php echo base_url().'uploads/'.$data['news_img']; ?>" width="100" height="100"/>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Chọn ảnh mới<br />(không bắt buộc)</label>
    <div class="col-sm-8">
      <br /><input type="file" name="img" />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
      <input type="submit" class="btn btn-info" name="ok" value="Sửa" />&nbsp;
    </div>
  </div>

</form>  