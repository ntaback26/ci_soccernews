<?php  
	class Auth_Controller extends MY_Controller {
		protected $_data;

		public function __construct() {
			parent::__construct();
			$module = $this->router->fetch_module();
			$this->_data['module'] = $module;
			$this->_data['template_path'] = $module.'/template';
			$this->_data['public_path'] = base_url().'public/'.$module.'/';
		}
	}
?>