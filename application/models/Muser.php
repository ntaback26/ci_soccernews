<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model {
	protected $_table = 'user';

	public function __construct() {
		parent::__construct();
	}

	public function listAll($num, $start) {
		$this->db->select('id, username, email, level');
		$this->db->limit($num, $start);
		return $this->db->get($this->_table)->result_array();
	}

	public function insert($data) {
		$this->db->insert($this->_table, $data);
	}

	public function update($data, $id) {
		$this->db->where('id', $id);
		$this->db->update($this->_table, $data);
	}

	public function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->_table);
	}

	public function countAll() {
		return $this->db->count_all($this->_table);
	}

	public function getUserById($id) {
		$this->db->select('id, username, email, level');
		$this->db->where('id', $id);
		return $this->db->get($this->_table)->row_array();
	}

	public function checkUsername($username, $id) {
		$this->db->where('username', $username);
		$this->db->where('id !=', $id);
		return ($this->db->get($this->_table)->num_rows() == 0) ? TRUE : FALSE;
	}

	public function checkEmail($email, $id) {
		$this->db->where('email', $email);
		$this->db->where('id !=', $id);
		return ($this->db->get($this->_table)->num_rows() == 0) ? TRUE : FALSE;
	}

	public function checkLogin($username, $password) {
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get($this->_table);
		if ($query->num_rows() == 1) {
			return $query->row_array();
		} else {
			return FALSE;
		}
	}
}

/* End of file Muser.php */
/* Location: ./application/models/Muser.php */