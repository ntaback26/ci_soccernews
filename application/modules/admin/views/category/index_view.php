<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Quản lý chuyên mục
        </h1>
    </div>
</div>
<!-- /.row -->

<h3>Danh sách chuyên mục</h3>

<a href="<?php echo base_url().$module.'/category/create' ?>">
  <button type="button" class="btn btn-success">
    <i class="fa fa-fw fa-plus"></i>
    Thêm chuyên mục
  </button>
</a>

<div id="alert">
  <?php  
    if ($this->session->flashdata('success') != "") {
      echo '<div class="alert alert-success" role="alert">';
      echo '<i class="fa fa-fw fa-check"></i> '.$this->session->flashdata('success');
      echo '</div>';
    }
  ?>
</div>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th class="col-md-2">STT</th>
      <th class="col-md-6">Tên chuyên mục</th>
      <th class="col-md-1">Chi tiết</th>
      <th class="col-md-1">Sửa</th>
      <th class="col-md-1">Xóa</th>
    </tr>
  </thead>
  <tbody>
    <?php  
      index_menu($data);
    ?>
  </tbody>
</table>


