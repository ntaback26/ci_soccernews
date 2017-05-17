<?php  
	$index = 0; //index: chỉ số của category dưới root
	function index_menu($data, $parent = 0, $text = "", $sub_index = 0) { //sub_index: chỉ số của các child category
		global $index;
		foreach ($data as $key => $value) {
			if ($value['parent_id'] == $parent) {
				$sub_index++;
				if ($value['parent_id'] == 0) {
					$index++;
					echo "<tr>";
					echo "<td>".$index."</td>";
					echo "<td align='left'>"; 
					echo "<i class='fa fa-fw fa-plus-square' id='$value[cate_id]'></i>";
					echo "<a href='javascript:void()' id='$value[cate_id]'> ".$value['cate_title']."</a></td>";
				} else {
					echo "<tr class='child $value[parent_id]'>";
					echo "<td>".$index.".".$sub_index."</td>";
					echo "<td align='left'>"; 
					echo $text." ".$value['cate_title']."</td>";
				}
				
				echo "<td>";
	      		echo "<a href='".base_url()."admin/category/show/".$value['cate_id']."'>";
		            echo '<button type="button" class="btn btn-info">
		             <i class="fa fa-fw fa-search"></i> Chi tiết
		            </button>';
		        echo "</a>";
	      		echo "</td>";

				echo "<td>";
	      		echo "<a href='".base_url()."admin/category/edit/".$value['cate_id']."'>";
		            echo '<button type="button" class="btn btn-warning">
		             <i class="fa fa-fw fa-pencil"></i> Sửa
		            </button>';
		        echo "</a>";
	      		echo "</td>";

	      		echo "<td>";
	          	echo "<a href='".base_url()."admin/category/destroy/".$value['cate_id']."'>";
	              echo '<button type="button" class="btn btn-danger" onclick="return confirmDelete(\'chuyên mục\');">
	               <i class="fa fa-fw fa-trash"></i> Xóa
	              </button>';
	          	echo "</a>";
	          	echo "</td>";
				echo "</tr>";
				unset($data[$key]);
				index_menu($data, $value['cate_id'], $text."--");
			}	
		}
	}

	function select_menu($data, $parent = 0, $text = "", $select = 0) {
		foreach ($data as $key => $value) {
			if ($value['parent_id'] == $parent) {
				$id = $value['cate_id'];
				if ($select != 0 && $id == $select) {
					echo "<option value='$id' selected>".$text.$value['cate_title']."</option>";
				} else {
					echo "<option value='$id'>".$text.$value['cate_title']."</option>";
				}
				unset($data[$key]);
				select_menu($data, $id, $text."--", $select);
			}
		}
	}
?>