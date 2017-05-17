<?php  
	class User extends Admin_Controller {
		public function __construct() {
			parent::__construct();
		}

		public function index() {
			// Load model
			$this->load->model('Muser');

			// Pagination
			$config['base_url'] = base_url().$this->_data['module'].'/user/index/';
			$config['total_rows'] = $this->Muser->countAll();
			$config['per_page'] = 5;
			$config['uri_segment'] = 4;
			$config['use_page_numbers'] = TRUE;
			$config['full_tag_open'] = "<nav><ul class='pagination'>";
			$config['full_tag_close'] ="</ul></nav>";
			$config['first_link'] = 'Trang đầu';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Trang cuối';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
			$config['next_tag_open'] = "<li>";
			$config['next_tag_close'] = "</li>";
			$config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
			$config['prev_tag_open'] = "<li>";
			$config['prev_tag_close'] = "</li>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
			
			$this->load->library('pagination', $config);

			$this->_data['page_links'] =  $this->pagination->create_links();

			// Load view
			$page_num = $this->uri->segment($config['uri_segment']);
			$start = ($page_num - 1 < 0) ? 0 : ($page_num - 1) * $config['per_page'];
			$this->_data['data'] = $this->Muser->listAll($config['per_page'], $start);
			$this->_data['pageLoader'] = 'user/index_view.php';

			$this->load->view($this->_data['template_path'], $this->_data); 
		}

		public function create() {
			// Load helper and library
			$this->load->library('form_validation');
			$this->form_validation->CI =& $this;

			// Validator
			$this->form_validation
				->set_rules('username', 'Tên đăng nhập', 'trim|min_length[4]|max_length[25]|is_unique[user.username]')
				->set_rules('password', 'Mật khẩu', 'trim|min_length[6]|max_length[50]')
				->set_rules('password2', 'Xác nhận mật khẩu', 'matches[password]')
				->set_rules('email', 'Email', 'max_length[100]|is_unique[user.email]');

			if ($this->form_validation->run() == TRUE) {
				$this->load->model('Muser');
				$data_store = array(
					'username'	=>	$this->input->post('username'),
					'password'	=>	md5(md5($this->input->post('password'))),
					'email'		=>	$this->input->post('email'),
					'level'		=>	$this->input->post('level')
				);
				$this->Muser->insert($data_store);
				$this->session->set_flashdata('success', 'Thêm thành công');
				redirect(base_url().$this->_data['module'].'/user/index');
			}

			// Load view
			$this->_data['pageLoader'] = 'user/create_view.php';
			$this->load->view($this->_data['template_path'], $this->_data); 
		}

		public function edit() {
			// Get user by id
			$id = $this->uri->segment(4);
			$this->load->model('Muser');
			$this->_data['data'] = $this->Muser->getUserById($id);

			// Load helper and library
			$this->load->library('form_validation');
			$this->form_validation->CI =& $this;

			// Validator
			$this->form_validation
				->set_rules('username', 'Tên đăng nhập', 'trim|min_length[4]|max_length[25]|callback_check_username')
				->set_rules('password', 'Mật khẩu', 'trim|min_length[6]|max_length[50]')
				->set_rules('password2', 'Xác nhận mật khẩu', 'matches[password]')
				->set_rules('email', 'Email', 'max_length[100]|callback_check_email');

			if ($this->form_validation->run() == TRUE) {
				$this->load->model('Muser');
				$data_update = array(
					'username'	=>	$this->input->post('username'),
					'email'		=>	$this->input->post('email'),
					'level'		=>	$this->input->post('level')
				);
				if ($this->input->post('password')) {
					$data_update['password'] = md5(md5($this->input->post('password')));
				}
				$this->Muser->update($data_update, $id);
				$this->session->set_flashdata('success', 'Cập nhật thành công');
				redirect(base_url().$this->_data['module'].'/user/index');
			}

			// Load view
			$this->_data['pageLoader'] = 'user/edit_view.php';
			$this->load->view($this->_data['template_path'], $this->_data); 
		}

		public function check_username($username) {
			$this->load->model('Muser');
			$id = $this->uri->segment(4);
			if ($this->Muser->checkUsername($username, $id) == FALSE) {
				$this->form_validation->set_message('check_username', '{field} đã tồn tại');
				return FALSE;
			} else {
				return TRUE;
			}
		}

		public function check_email($email) {
			$this->load->model('Muser');
			$id = $this->uri->segment(4);
			if ($this->Muser->checkEmail($email, $id) == FALSE) {
				$this->form_validation->set_message('check_email', '{field} đã tồn tại');
				return FALSE;
			} else {
				return TRUE;
			}
		}

		public function destroy() {
			$id = $this->uri->segment(4);
			$this->load->model('Muser');
			$this->Muser->delete($id);
			$this->session->set_flashdata('success', 'Xóa thành công');
			redirect(base_url().$this->_data['module'].'/user/index');
		}
	}
?>