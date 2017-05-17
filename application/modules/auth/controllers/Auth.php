<?php  
	class Auth extends Auth_Controller {
		public function __construct() {
			parent::__construct();
		}

		public function login() {
			$this->load->model('Muser');
			$this->_data['error'] = "";

			if ($this->input->post('ok')) {
				$username = $this->input->post('username');
				$password = md5(md5($this->input->post('password')));
				$result = $this->Muser->checkLogin($username, $password);
				if ($result == FALSE) {
					$this->_data['error'] = 'Tên đăng nhập hoặc mật khẩu không chính xác !';
				} else {
				    $sess = array();
					foreach ($result as $key => $value) {
						$sess[$key] = $value;
					}
					$sess['logged_in'] = TRUE;
					$this->session->set_userdata($sess);
					redirect(base_url().'admin/dashboard/index');
				}
			}

			// Load view
			$this->_data['pageTitle'] = 'Đăng nhập';
			$this->_data['pageLoader'] = 'login_view.php';
			$this->load->view($this->_data['template_path'], $this->_data); 
		}

		public function logout() {
			$this->session->sess_destroy();
			session_start();
			session_destroy();
			redirect(base_url().$this->_data['module'].'/auth/login');
		}

		public function register() {
			// Load helper and library
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->_data['success'] = "";

			// Validator
			$this->form_validation
				->set_rules('username', 'Tên đăng nhập', 'trim|min_length[4]|max_length[25]|is_unique[user.username]')
				->set_rules('password', 'Mật khẩu', 'trim|min_length[6]|max_length[50]')
				->set_rules('password2', 'Xác nhận mật khẩu', 'matches[password]',
					array('matches' => 'Xác nhận mật khẩu không chính xác.'))
				->set_rules('email', 'Email', 'max_length[100]|is_unique[user.email]');

			$this->form_validation
				->set_message('required', 'Vui lòng điền {field}.')
				->set_message('min_length', '{field} tối thiểu {param} ký tự.')
				->set_message('max_length', '{field} tối đa {param} ký tự.')
				->set_message('is_unique', '{field} đã tồn tại.');

			if ($this->form_validation->run() == TRUE) {
				$this->load->model('Muser');
				$data_store = array(
					'username'	=>	$this->input->post('username'),
					'password'	=>	$this->input->post('password'),
					'email'		=>	$this->input->post('email'),
				);
				$this->Muser->insert($data_store);
				$this->_data['success'] = 'Chúc mừng bạn đã đăng ký thành công !';
			}

			// Load view
			$this->_data['pageTitle'] = 'Đăng ký';
			$this->_data['pageLoader'] = 'register_view.php';
			$this->load->view($this->_data['template_path'], $this->_data); 
		}
	}
?>