<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function fetch_country() {
		$this->db->select('*', 'ASC');
		$this->db->from('country');
		$query = $this->db->get();
		return $query->result();
	}

	public function fetch_state($id) {
		$this->db->select('*', 'ASC');
		$this->db->from('state');
		$this->db->where('country_id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function fetch_city($id) {
		$this->db->select('*', 'ASC');
		$this->db->from('city');
		$this->db->where('state_id', $id);
		$query = $this->db->get();
		return $query->result();
	}

}
