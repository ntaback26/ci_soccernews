<?php  
	class Default_Controller extends MY_Controller {
		protected $_data;

		public function __construct() {
			parent::__construct();

			// Config
			$module = $this->router->fetch_module();
			$this->_data['module'] = $module;
			$this->_data['template_path'] = $module.'/template';
			$this->_data['public_path'] = base_url().'public/'.$module.'/';
			$this->_data['haveSlider'] = FALSE; // check have slider in view

			// Load library and helper 
			$this->load->library('Mymenu');
			$this->load->helper('review');
			$this->load->helper('time');
		}
	}
?>