<?php  
	class News extends Admin_Controller {
		public function __construct() {
			parent::__construct();
		}

		public function index() {
			// Get category id
			$cate_id = $this->uri->segment(4);
			$this->_data['cate_id'] = $cate_id;

			// Load model 
			$this->load->model('Mnews');
			$this->load->model('Mcategory');
			// Get category title 
			$this->_data['cate_title'] = $this->Mcategory->getTitleById($cate_id);


			// Pagination
			$config['base_url'] = base_url().$this->_data['module'].'/news/index/'.$cate_id.'/';
			$config['total_rows'] = $this->Mnews->countByCate($cate_id);
			$config['per_page'] = 5;
			$config['uri_segment'] = 5;
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
			$this->_data['data'] = $this->Mnews->listByCate($cate_id, $config['per_page'], $start);
			$this->_data['pageLoader'] = 'news/index_view.php';

			$this->load->view($this->_data['template_path'], $this->_data);  
		}

		public function create() {
			// Get category title
			$this->load->model('Mcategory');
			$cate_id = $this->uri->segment(4);
			$this->_data['cate_title'] = $this->Mcategory->getTitleById($cate_id); 
			$this->_data['cate_id'] = $cate_id;

			// Load library
			$this->load->library('form_validation');
			$this->form_validation->CI =& $this;
			$this->_data['error_upload'] = "";

			// Validator
			$this->form_validation
				->set_rules('title', 'Tiêu đề của bản tin', 'max_length[255]')
				->set_rules('author', 'Tên tác giả', 'max_length[100]')
				->set_rules('description', 'Mô tả của bản tin ', 'required|max_length[255]')
				->set_rules('detail', 'Nội dung của bản tin', 'required');

			if ($this->form_validation->run() == TRUE) {
	            if ($_FILES['img']['name'] != "") {
	            	$config['upload_path']		= './uploads/';
		            $config['allowed_types']    = 'gif|jpg|png';
		            $config['max_size']         = '1024';
		            $config['max_width']        = '1024';
		            $config['max_height']       = '768';
	            	$this->load->library('upload', $config);

		            // Check upload successfully
		            if ( ! $this->upload->do_upload('img')) {
		                $this->_data['error_upload'] = $this->upload->display_errors();
		            } else {
		            	// Create thumbnail
		            	$data_upload = $this->upload->data();
		            	$this->load->helper('image');
		            	create_thumb($data_upload['file_name']);
 						
 						// Insert news
				   		$this->load->model('Mnews');
						date_default_timezone_set('Asia/Ho_Chi_Minh');
						$date = date('Y/m/d h:i:s', time());   
				   		$data_store = array(
							'news_title'		=>	$this->input->post('title'),
							'news_author'		=>	$this->input->post('author'),
							'news_description'	=>	$this->input->post('description'),
							'news_detail'		=>	$this->input->post('detail'),
							'news_time'			=>	$date,
							'news_img'			=>	$data_upload['file_name'],
							'cate_id'			=>	$cate_id,
							'parent_id'			=>	$this->Mcategory->getParentById($cate_id),
							'user_id'			=>	$this->session->userdata('id')
						);
						$this->Mnews->insert($data_store);
						$this->session->set_flashdata('success', 'Thêm thành công');
						redirect(base_url().$this->_data['module'].'/news/index/'.$cate_id);
				   		
		            }
		        } else {
		        	$this->_data['error_upload'] = "Vui lòng chọn ảnh đại diện";
		        }		      
			}	 
			
			// Load view
			$this->_data['pageLoader'] = 'news/create_view.php';
			$this->load->view($this->_data['template_path'], $this->_data); 
		}

		public function show() {
			// Load time helper
			$this->load->helper('time');

			// Get category title 
			$this->load->model('Mcategory');
			$cate_id = $this->uri->segment(4);
			$this->_data['cate_id'] = $cate_id;
			$this->_data['cate_title'] = $this->Mcategory->getTitleById($cate_id); 

			// Get news info by id
			$this->load->model('Mnews');
			$news_id = $this->uri->segment(5);
			$this->_data['data'] = $this->Mnews->getNewsById($news_id, 1);

			// Load view
			$this->_data['pageLoader'] = 'news/show_view.php';
			$this->load->view($this->_data['template_path'], $this->_data); 
		}

		public function edit() {
			// Get category title
			$this->load->model('Mcategory');
			$cate_id = $this->uri->segment(4);
			$this->_data['cate_title'] = $this->Mcategory->getTitleById($cate_id); 
			$this->_data['cate_id'] = $cate_id;
			$this->_data['error_upload'] = "";

			// Get new by id
			$this->load->model('Mnews');
			$news_id = $this->uri->segment(5);
			$this->_data['data'] = $this->Mnews->getNewsById($news_id, 2);

			// Load library
			$this->load->library('form_validation');
			$this->form_validation->CI =& $this;
			$this->_data['error_upload'] = "";

			// Edit 
			if ($this->input->post('ok')) {
				
				// Validator
				$this->form_validation
					->set_rules('title', 'Tiêu đề của bản tin', 'max_length[255]')
					->set_rules('author', 'Tên tác giả', 'max_length[100]')
					->set_rules('description', 'Mô tả của bản tin ', 'required|max_length[255]')
					->set_rules('detail', 'Nội dung của bản tin', 'required');

				if ($this->form_validation->run() == TRUE) {
					$this->load->model('Mnews'); 	         	
					$data_update = array(
						'news_title'		=>	$this->input->post('title'),
						'news_author'		=>	$this->input->post('author'),
						'news_description'	=>	$this->input->post('description'),
						'news_detail'		=>	$this->input->post('detail')
					);

					$checkUpload = TRUE;

					if ($_FILES['img']['name'] != "") {
						// Upload news image
			            $config['upload_path']		= './uploads/';
			            $config['allowed_types']    = 'gif|jpg|png';
			            $config['max_size']         = '1024';
			            $config['max_width']        = '1024';
			            $config['max_height']       = '768';

			            $this->load->library('upload', $config);

			            // Check upload successfully
			            if ( ! $this->upload->do_upload('img')) {
			                $this->_data['error_upload'] = $this->upload->display_errors();
			                $checkUpload = FALSE;
						} else {
							$this->load->helper('image');
							delete_image($this->_data['data']['news_img']);           	
							$data_upload = $this->upload->data();
							$data_update['news_img'] = $data_upload['file_name'];
							create_thumb($data_upload['file_name']);
						}
		            }

		            if ($checkUpload == TRUE) {
		            	$this->Mnews->update($data_update, $news_id);
						$this->session->set_flashdata('success', 'Cập nhật thành công');
						redirect(base_url().$this->_data['module'].'/news/index/'.$cate_id);
		            }	
		        }
			}

			// Load view
			$this->_data['pageLoader'] = 'news/edit_view.php';
			$this->load->view($this->_data['template_path'], $this->_data); 
		}

		public function destroy() {
			$cate_id = $this->uri->segment(4);
			$news_id = $this->uri->segment(5);

			// Delete news data
			$this->load->model('Mnews');
			$this->Mnews->delete($news_id);

			// Delete news image
			$this->load->helper('image');
			delete_image($this->Mnews->getImgById($news_id));

			// Redirect
			$this->session->set_flashdata('success', 'Xóa thành công');
			redirect(base_url().$this->_data['module'].'/news/index/'.$cate_id);
		}

	}
?>