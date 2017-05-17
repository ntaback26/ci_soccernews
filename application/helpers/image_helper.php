<?php  
	function create_thumb($file_name) {
		$CI =& get_instance();
		$CI->load->library('image_lib');

		// 300 x 185
		$config['image_library'] 	= 'gd2';
		$config['source_image']		= './uploads/'.$file_name;
		$config['new_image']		= './uploads/300x185';
		$config['create_thumb'] 	= TRUE;
		$config['maintain_ratio'] 	= TRUE;
		$config['width']	 		= 300;
		$config['height']			= 185;
		$CI->image_lib->initialize($config);
		$CI->image_lib->resize();
		$CI->image_lib->clear();
		unset($config);

		// 140 x 85
		$config['image_library'] 	= 'gd2';
		$config['source_image']		= './uploads/'.$file_name;
		$config['new_image']		= './uploads/140x85';
		$config['create_thumb'] 	= TRUE;
		$config['maintain_ratio'] 	= TRUE;
		$config['width']	 		= 140;
		$config['height']			= 85;
		$CI->image_lib->initialize($config);
		$CI->image_lib->resize();
		$CI->image_lib->clear();
		unset($config);
	}

	function delete_image($file_name) {
		unlink('./uploads/'.$file_name);
		unlink('./uploads/300x185'.$file_name);
		unlink('./uploads/140x85'.$file_name);
	}
?>