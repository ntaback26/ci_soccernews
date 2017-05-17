<?php

	/**
	 *
	 * Get path of news
	 *
	 */

	function path($cate_id) {
		$CI =& get_instance();
		$CI->load->model('Mcategory');

		// Get cate title and parent title
		$cate_title = $CI->Mcategory->getTitleById($cate_id);
		$parent_id = $CI->Mcategory->getParentById($cate_id);
		$parent_title = $CI->Mcategory->getTitleById($parent_id);

		// Build path
		$path = '<a href="'.base_url().'/default">Home</a> <i class="fa fa-long-arrow-right"></i> ';
		if ($parent_id == 0) {
			$path .= $cate_title;
		} else {
			$path .= '<a href="'.base_url().'default/viewcate/'.$parent_id.'">'.$parent_title.'</a> <i class="fa fa-long-arrow-right"></i> '.$cate_title;
		}

		return $path;
	}
?>