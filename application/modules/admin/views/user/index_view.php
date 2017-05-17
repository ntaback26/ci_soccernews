<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Quản lý thành viên
        </h1>
    </div>
</div>
<!-- /.row -->

<h3>Danh sách thành viên</h3>

<a href="<?php echo base_url().$module.'/user/create' ?>">
  <button type="button" class="btn btn-success">
    <i class="fa fa-fw fa-plus"></i>
    Thêm thành viên
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
      <th class="col-md-3">Username</th>
      <th class="col-md-4">Email</th>
      <th class="col-md-2">Cấp bậc</th>
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
      		echo "<td>".$item['username']."</td>";
      		echo "<td>".$item['email']."</td>";
      		echo "<td>";
	          if ($item['level'] == 2) {
	            echo '<span class="label label-danger">Admin</span>';
	          } else {
	            echo 'Thành viên';
	          }
      		echo "</td>";
      		echo "<td>";
      		echo "<a href='".base_url().$module."/user/edit/".$item['id']."'>";
	            echo '<button type="button" class="btn btn-info">
	             <i class="fa fa-fw fa-pencil"></i> Sửa
	            </button>';
	        echo "</a>";
      		echo "</td>";
      		echo "<td>";
          echo "<a href='".base_url().$module."/user/destroy/".$item['id']."'>";
              echo '<button type="button" class="btn btn-danger" onclick="return confirmDelete(\'thành viên\');">
               <i class="fa fa-fw fa-pencil"></i> Xóa
              </button>';
          echo "</a>";
          echo "</td>";
        }
    ?>
  </tbody>
</table>

<?php echo $page_links;  ?>


