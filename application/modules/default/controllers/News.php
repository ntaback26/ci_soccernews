<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Default_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('path');
		$this->load->helper('seourl');
	}

	public function index() {
		// Load news model
		$this->load->model('Mnews');

		// Get popular and latest news
		$this->_data['popular'] = $this->Mnews->getPopular(5);
		$this->_data['latest'] = $this->Mnews->getLatest(3);

		// Đổ dữ liệu theo type 1
		$this->_data['category1'] = $this->Mnews->getNews(1, 6);	// Chuyển nhượng
		// Đổ dữ liệu theo type 2
		$this->_data['category2'][] = $this->Mnews->getNews(7, 6); 	// Việt Nam 
		$this->_data['category2'][0]['cate_title'] = 'Việt Nam';
		$this->_data['category2'][] = $this->Mnews->getNews(2, 6);	// Anh
		$this->_data['category2'][1]['cate_title'] = 'Bóng đá Anh';
		$this->_data['category2'][] = $this->Mnews->getNews(3, 6);	// Tây Ban Nha
		$this->_data['category2'][2]['cate_title'] = 'Bóng đá TBN';
		$this->_data['category2'][] = $this->Mnews->getNews(4, 6);	// Italia
		$this->_data['category2'][3]['cate_title'] = 'Bóng đá Italia';
		// Đổ dữ liệu theo type 3
		$this->_data['category3'][] = $this->Mnews->getNews(5, 3); // Đức
		$this->_data['category3'][0]['cate_title'] = 'Bóng đá Đức';
		$this->_data['category3'][] = $this->Mnews->getNews(6, 3); // Pháp
		$this->_data['category3'][1]['cate_title'] = 'Bóng đá Pháp';

		// Load view
		$this->_data['pageLoader'] = 'news/index_view.php';
		$this->_data['pageTitle'] = 'Bóng đá';
		$this->_data['haveSlider'] = TRUE;
		$this->load->view($this->_data['template_path'], $this->_data);  
	}

	public function viewcate($cate_id) {
		// Get category id
		$this->load->model('Mcategory');
		$cate_title = $this->Mcategory->getTitleById($cate_id);

		// Get path of category
		$this->_data['path'] = path($cate_id);

		// Get all news of category
		$this->load->model('Mnews');

		// Pagination
		$config['base_url'] = base_url().'chuyen-muc/'.$cate_id.'/'.unicode($cate_title).'.html/';
		$config['total_rows'] = $this->Mnews->countAllByCate($cate_id);
		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<div class="pager"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = 'Trang đầu';
		$config['first_tag_open'] = '<li class="first-page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Trang cuối';
		$config['last_tag_open'] = '<li class="last-page">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '';
		$config['next_tag_open'] = '<li class="next-page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '';
		$config['prev_tag_open'] = '<li class="prev-page">';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="#" class="active">';
		$config['cur_tag_close'] = '</a></li>';
		
		$this->load->library('pagination', $config);

		$this->_data['page_links'] =  $this->pagination->create_links();

		// Load view
		$page_num = $this->uri->segment($config['uri_segment']);
		$start = ($page_num - 1 < 0) ? 0 : ($page_num - 1) * $config['per_page'];
		$this->_data['data'] = $this->Mnews->listAllByCate($cate_id, $config['per_page'], $start);
		$this->_data['pageLoader'] = 'news/viewcate_view.php';
		$this->_data['pageTitle'] = $cate_title;
		$this->load->view($this->_data['template_path'], $this->_data);  
	}

	public function detail($news_id) {
		// Update view of news
		$this->load->model('Mnews');
		$this->Mnews->updateView($news_id);

		// Get path of news
		$cate_id = $this->Mnews->getCateById($news_id);
		$this->_data['path'] = path($cate_id);

		// Get news data
		$data = $this->Mnews->getNewsById($news_id, 2);
		$this->_data['data'] = $data;

		// Get related news
		$this->_data['related'] = $this->Mnews->getRelated($news_id, $cate_id);

		// Load view
		$this->_data['pageLoader'] = 'news/detail_view.php';
		$this->_data['pageTitle'] = $data['news_title'];
		$this->load->view($this->_data['template_path'], $this->_data);
	}
}

/* End of file News.php */
/* Location: ./application/modules/default/controllers/News.php */