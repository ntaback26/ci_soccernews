<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mnews extends CI_Model {
	protected $_table = 'news';

	public function __construct() {
		parent::__construct();
	}

	/**
	 *
	 * Admin function
	 *
	 */

	public function listByCate($cate_id, $num, $start) {
		$this->db->select('news_id, news_title, cate_id, user_id');
		$this->db->where('cate_id', $cate_id);
		$this->db->order_by('news_id', 'desc');
		$this->db->limit($num, $start);
		return $this->db->get($this->_table)->result_array();
	}

	public function insert($data) {
		$this->db->insert($this->_table, $data);
	}

	public function update($data, $id) {
		$this->db->where('news_id', $id);
		$this->db->update($this->_table, $data);
	}

	public function delete($id) {
		$this->db->where('news_id', $id);
		$this->db->delete($this->_table);
	}

	public function getNewsById($id, $option) {
		if ($option == 1) {
			// to show 
			$this->db->select('news.news_title, news.news_author, news.news_description, news.news_detail, 
				news.news_img, news.news_time, news.news_view, user.username');
			$this->db->join('user', 'user.id = news.user_id');
		} else {
			// to edit
			$this->db->select('news.news_id, news.news_title, news.news_author, news.news_description, news.news_detail, 
				news.news_img, news.news_time');
		}
		$this->db->where('news_id', $id);
		return $this->db->get($this->_table)->row_array();
	}

	public function getCateById($id) {
		$this->db->select('cate_id');
		$this->db->where('news_id', $id);
		$row = $this->db->get($this->_table)->row_array();
		return $row['cate_id'];
	}

	public function getImgById($id) {
		$this->db->where('news_id', $id);
		$row = $this->db->get($this->_table)->row_array();
		return $row['news_img'];
	}

	public function countByCate($cate_id) {
		$this->db->where('cate_id', $cate_id);
		return $this->db->count_all_results($this->_table);
	}

	/* ============================================================================================ */

	/**
	 *
	 * Default function
	 *
	 */
	public function getPopular($num) {
		$this->db->select('news_id, news_title, news_description, news_img');
		$this->db->order_by('news_view', 'desc');
		$this->db->order_by('news_id', 'desc');
		$this->db->limit($num);
		return $this->db->get($this->_table)->result_array();
	}

	public function getLatest($num) {
		$this->db->select('news_id, news_title, news_img');
		$this->db->order_by('news_id', 'desc');
		$this->db->limit($num);
		return $this->db->get($this->_table)->result_array();
	}

	public function getRelated($news_id, $cate_id) {
		$this->db->select('news_id, news_title, news_img, news_time');
		$this->db->where('news_id <', $news_id);
		$this->db->where('cate_id', $cate_id);
		$this->db->or_where('parent_id', $cate_id);
		$this->db->order_by('news_id', 'desc');
		$this->db->limit(4);
		return $this->db->get($this->_table)->result_array();
	}

	public function getNews($cate_id, $num="") {
		$this->db->select('news_id, news_title, news_description, news_img, news_time');
		$this->db->where('cate_id', $cate_id);
		$this->db->or_where('parent_id', $cate_id);
		$this->db->order_by('news_id', 'desc');
		if ($num != "") {
			$this->db->limit($num);
		}
		return $this->db->get($this->_table)->result_array();
	}

	public function listAllByCate($cate_id, $num, $start) {
		$this->db->select('news_id, news_title, news_description, news_img, news_time');
		$this->db->where('cate_id', $cate_id);
		$this->db->or_where('parent_id', $cate_id);
		$this->db->order_by('news_id', 'desc');
		$this->db->limit($num, $start);
		return $this->db->get($this->_table)->result_array();
	}

	public function countAllByCate($cate_id) {
		$this->db->where('cate_id', $cate_id);
		$this->db->or_where('parent_id', $cate_id);
		return $this->db->count_all_results($this->_table);
	}

	public function updateView($id) {
		$sql = "UPDATE ".$this->_table." SET news_view = news_view + 1 WHERE news_id = '".$id."'";
		$this->db->query($sql);
	}

}

/* End of file Muser.php */
/* Location: ./application/models/Muser.php */