<?php  
	class Admin_Controller extends MY_Controller {
		protected $_data;

		public function __construct() {
			parent::__construct();

			// Check Authentication
			if ($this->session->userdata('logged_in') != TRUE || $this->session->userdata('level') != '2') {
				redirect(base_url().'dang-nhap');
			}

			// Config
			$module = $this->uri->segment(1);
			$this->_data['module'] = $module;
			$this->_data['template_path'] = $module.'/template';
			$this->_data['public_path'] = base_url().'public/'.$module.'/';

			// Load navigation helper
			$this->load->helper('navigation');
		}
	}
?>