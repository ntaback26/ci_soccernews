<?php  
	class Category extends Admin_Controller {
		public function __construct() {
			parent::__construct();
		}

		public function index() {
			// Load model and helper
			$this->load->model('Mcategory');
			$this->load->helper('recursion');

			// List all category
			$this->_data['data'] = $this->Mcategory->listAll();

			// Load view
			$this->_data['pageLoader'] = 'category/index_view.php';
			$this->load->view($this->_data['template_path'], $this->_data); 
		}

		public function create() {
			// Load model, helper and library
			$this->load->model('Mcategory');
			$this->load->helper('recursion');
			$this->load->library('form_validation');
			$this->form_validation->CI =& $this;

			// List all category
			$this->_data['data'] = $this->Mcategory->listAll();

			// Validator
			$this->form_validation
				->set_rules('title', 'Tên chuyên mục', 
					'max_length[255]|callback_check_title['.$this->input->post('parent').']');

			if ($this->form_validation->run() == TRUE) {
				$this->load->model('Mcategory');
				$data_store = array(
					'cate_title'	=>	$this->input->post('title'),
					'parent_id'		=>	$this->input->post('parent')
				);
				$this->Mcategory->insert($data_store);
				$this->session->set_flashdata('success', 'Thêm thành công');
				redirect(base_url().$this->_data['module'].'/category/index');
			}

			// Load view
			$this->_data['pageLoader'] = 'category/create_view.php';
			$this->load->view($this->_data['template_path'], $this->_data); 
		}

		public function show() {
			// Get category by id
			$id = $this->uri->segment(4);
			$this->load->model('Mcategory');
			$data = $this->Mcategory->getCateById($id);
			$this->_data['data'] = $data;

			// Get total news of category
			$this->_data['count_news'] = $this->Mcategory->countAllNews($id);

			// Get parent category of title
			if ($data['parent_id'] == 0) {
				$this->_data['parent_title'] = 'Root';
			} else {
				$this->_data['parent_title'] = $this->Mcategory->getTitleById($data['parent_id']);
			}
			
			// Load view
			$this->_data['pageLoader'] = 'category/show_view.php';
			$this->load->view($this->_data['template_path'], $this->_data); 
		}

		public function edit() {
			// Get category by id
			$id = $this->uri->segment(4);
			$this->load->model('Mcategory');
			$this->_data['data'] = $this->Mcategory->getCateById($id);

			// Load helper and library
			$this->load->helper('form');
			$this->load->helper('recursion');
			$this->load->library('form_validation');
			$this->form_validation->CI =& $this;

			// List all category
			$this->_data['menu'] = $this->Mcategory->listAll();

			// Validator
			$this->form_validation
				->set_rules('title', 'Tên chuyên mục', 
					'max_length[255]|callback_check_title['.$this->input->post('parent').']');

			if ($this->form_validation->run() == TRUE) {
				$data_update = array(
					'cate_title'	=>	$this->input->post('title'),
					'parent_id'		=>	$this->input->post('parent')
				);
				$this->Mcategory->update($data_update, $id);
				$this->session->set_flashdata('success', 'Sửa thành công');
				redirect(base_url().$this->_data['module'].'/category/index');
			}

			// Load view
			$this->_data['pageLoader'] = 'category/edit_view.php';
			$this->load->view($this->_data['template_path'], $this->_data); 
		}

		public function destroy() {
			$id = $this->uri->segment(4);
			$this->load->model('Mcategory');
			$this->Mcategory->delete($id);
			$this->session->set_flashdata('success', 'Xóa thành công');
			redirect(base_url().$this->_data['module'].'/category/index');
		}

		public function check_title($title, $parent) {
			$id = $this->uri->segment(4);
			$this->load->model('Mcategory');
			if ($this->Mcategory->checkTitle($id, $parent, $title) == FALSE) {
				$this->form_validation->set_message('check_title', '{field} này đã tồn tại trong chuyên mục cha');
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}
?>