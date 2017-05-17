<?php  
	function navigation() {
		$CI =& get_instance();
		$CI->load->model('Mcategory');
        $data = $CI->Mcategory->listAll();

		echo "<ul id='demo' class='collapse'>";
		foreach ($data as $key => $value) {
			if ($value['parent_id'] == 0) {
				echo "<li>";
				// Kiểm tra có chuyên mục con hay không ?
				$check = FALSE; // FALSE <=> không có chuyên mục con
				$child = array();
				foreach ($data as $key2 => $value2) {
					if ($value2['parent_id'] == $value['cate_id']) {
						$check = TRUE;
						$child[$value2['cate_id']] = $value2['cate_title'];	
					}
				}
				if ($check == FALSE) {
					echo "<a href='".base_url()."admin/news/index/$value[cate_id]'>$value[cate_title]</a>";		
				} else {
					echo "<a href='javascript:;' data-toggle='collapse' data-target='#demo$value[cate_id]'> $value[cate_title] <i class='fa fa-fw fa-caret-down'></i></a>";
					echo "<ul id='demo$value[cate_id]' class='collapse'>";
	                foreach ($child as $key2 => $value2) {
	                	echo "<li>";
	                	echo "<a href='".base_url()."admin/news/index/$key2'>&nbsp;&nbsp;&nbsp;$value2</a>";
	                	echo "</li>";
	                }
	            	echo "</ul>";
				}
				echo "</li>";
			}
		}
	    echo "</ul>";
	}
?>