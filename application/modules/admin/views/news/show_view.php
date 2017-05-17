<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Quản lý tin tức
        </h1>
    </div>
</div>
<!-- /.row -->

<h3>>> <?php echo ucwords($cate_title); ?> - Chi tiết bản tin</h3><br />

<div id="btn-back">
  <a class="btn btn-success" href="<?php echo base_url().$module.'/news/index/'.$cate_id; ?>">
  <i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Quay lại</a>
</div>

<table class="table table-bordered">
  <tr>
    <td class="col-md-2"><strong>Tiêu đề</strong></td>
    <td align="left"><?php echo $data['news_title']; ?></td>
  </tr>
  <tr>
    <td class="col-md-2"><strong>Tác giả</strong></td>
    <td align="left"><?php echo $data['news_author']; ?></td>
  </tr>
  <tr>
    <td class="col-md-2"><strong>Mô tả</strong></td>
    <td align="left"><?php echo $data['news_description']; ?></td>
  </tr>
  <tr>
    <td class="col-md-2"><strong>Chi tiết</strong></td>
    <td align="left"><?php echo $data['news_detail']; ?></td>
  </tr>
  <tr>
    <td class="col-md-2"><strong>Ảnh đại diện</strong></td>
    <td align="left"><img src="<?php echo base_url().'uploads/'.$data['news_img']; ?>" width="100" height="100"/></td>
  </tr>
  <tr>
    <td class="col-md-2"><strong>Ngày tạo</strong></td>
    <td align="left"><?php echo admin_time($data['news_time']); ?></td>
  </tr>
  <tr>
    <td class="col-md-2"><strong>Người tạo</strong></td>
    <td align="left"><?php echo $data['username']; ?></td>
  </tr>
  <tr>
    <td class="col-md-2"><strong>Lượt xem</strong></td>
    <td align="left"><?php echo $data['news_view']; ?></td>
  </tr>
</table>