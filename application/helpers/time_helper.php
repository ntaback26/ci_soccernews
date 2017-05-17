<?php  
	function admin_time($time) {
		return date('d/m/Y h:i:s', strtotime($time));
	}

	function default_time($time) {
		return date('h:i d/m/Y', strtotime($time));
	}

?>