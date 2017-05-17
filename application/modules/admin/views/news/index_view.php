<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Quản lý tin tức 
        </h1>
    </div>
</div>
<!-- /.row -->

<h3>>> <?php echo ucwords($cate_title); ?> - Danh sách tin tức</h3>

<a href="<?php echo base_url().$module.'/news/create/'.$cate_id; ?>">
  <button type="button" class="btn btn-success">
    <i class="fa fa-fw fa-plus"></i>
    Thêm tin tức
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
      <th class="col-md-1">STT</th>
      <th class="col-md-8">Tiêu đề</th>
      <th class="col-md-1">Chi tiết</th>
      <th class="col-md-1">Sửa</th>
      <th class="col-md-1">Xóa</th>
    </tr>
  </thead>
  <tbody>
    <?php  
        $stt = 0;
        foreach ($data as $item) {
        	$stt++;
        	echo "<tr>";
      		echo "<td>$stt</td>";
      		echo "<td align='left'>".$item['news_title']."</td>";
          echo "<td>";
          echo "<a href='".base_url()."$module/news/show/$cate_id/".$item['news_id']."'>";
              echo '<button type="button" class="btn btn-info">
               <i class="fa fa-fw fa-search"></i> Chi tiết
              </button>';
          echo "</a>";
          echo "</td>";
      		echo "<td>";
      		echo "<a href='".base_url()."$module/news/edit/$cate_id/".$item['news_id']."'>";
	            echo '<button type="button" class="btn btn-warning">
	             <i class="fa fa-fw fa-pencil"></i> Sửa
	            </button>';
	        echo "</a>";
      		echo "</td>";
      		echo "<td>";
          echo "<a href='".base_url()."$module/news/destroy/$cate_id/".$item['news_id']."'>";
              echo '<button type="button" class="btn btn-danger" onclick="return confirmDelete(\'bản tin\');">
               <i class="fa fa-fw fa-pencil"></i> Xóa
              </button>';
          echo "</a>";
          echo "</td>";
        }
    ?>
  </tbody>
</table>

<?php echo $page_links;  ?>


