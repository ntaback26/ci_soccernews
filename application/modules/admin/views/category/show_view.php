<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Quản lý chuyên mục
        </h1>
    </div>
</div>
<!-- /.row -->

<h3>Thông tin chuyên mục</h3><br />

<div id="btn-back">
  <a class="btn btn-success" href="<?php echo base_url().$module.'/category/index'; ?>">
  <i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Quay lại</a>
</div>

<div class="row">
  <div class="col-md-8">
    <table class="table table-bordered">
      <tr>
        <td class="col-md-2"><strong>ID</strong></td>
        <td align="left" class="col-md-6"><?php echo $data['cate_id']; ?></td>
      </tr>
      <tr>
        <td class="col-md-2"><strong>Tên chuyên mục</strong></td>
        <td align="left" class="col-md-6"><?php echo $data['cate_title']; ?></td>
      </tr>
      <tr>
        <td class="col-md-2"><strong>Chuyên mục cha</strong></td>
        <td align="left" class="col-md-6"><?php echo $parent_title; ?></td>
      </tr>
      <tr>
        <td class="col-md-2"><strong>Tổng số bản tin</strong></td>
        <td align="left" class="col-md-6"><?php echo $count_news; ?></td>
      </tr>
    </table>
  </div>      
</div>
