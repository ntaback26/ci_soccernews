<?php  
    class Dashboard extends Admin_Controller {
        public function __construct() {
            parent::__construct();
        }

        public function index() {
            $this->_data['pageLoader'] = 'dashboard/index_view.php';
            $this->load->view($this->_data['template_path'], $this->_data); 
        }
    }
?>