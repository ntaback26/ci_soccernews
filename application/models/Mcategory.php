<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcategory extends CI_Model {
	protected $_table = 'category';

	public function __construct() {
		parent::__construct();
	}

	public function listAll() {
		return $this->db->get($this->_table)->result_array();
	}

	public function listAllOfRoot() {
		$this->db->where('parent_id = 0');
		return $this->db->get($this->_table)->result_array();
	}

	public function insert($data) {
		$this->db->insert($this->_table, $data);
	}

	public function update($data, $id) {
		$this->db->where('cate_id', $id);
		$this->db->update($this->_table, $data);
	}

	public function delete($id) {
		$this->db->where('cate_id', $id);
		$this->db->or_where('parent_id', $id);
		$this->db->delete($this->_table);
		$this->db->delete('news');
	}

	public function getCateById($id) {
		$this->db->where('cate_id', $id);
		return $this->db->get($this->_table)->row_array();
	}

	public function checkTitle($id = "", $parent, $title) {
		if ($id != "") {
			$this->db->where('cate_id !=', $id);
		}
		$this->db->where('parent_id', $parent);
		$this->db->where('cate_title', $title);
		return ($this->db->get($this->_table)->num_rows() > 0) ? FALSE : TRUE;
	}

	public function getTitleById($id) {
		$this->db->select('cate_title');
		$this->db->where('cate_id', $id);
		$row = $this->db->get($this->_table)->row_array();
		return $row['cate_title'];
	}

	public function getParentById($id) {
		$this->db->select('parent_id');
		$this->db->where('cate_id', $id);
		$row = $this->db->get($this->_table)->row_array();
		return $row['parent_id'];
	}

	public function countAllOfRoot() {
		$this->db->where('parent_id = 0');
		return $this->db->count_all_results($this->_table);
	}

	public function countAllNews($id) {
		$this->db->where('cate_id', $id);
		$this->db->or_where('parent_id', $id);
		return $this->db->count_all_results('news');
	}
}

/* End of file Mcategory.php */
/* Location: ./application/models/Mcategory.php */