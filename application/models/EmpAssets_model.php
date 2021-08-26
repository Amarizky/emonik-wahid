<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpAssets_model extends CI_Model {
	
	var $table = 'v_account_mahasiswa';
	var $column_order = ['username', 'name', 'email', 'last_login', 'phone', 'status',];
	var $column_search = ['username', 'name', 'email', 'last_login', 'phone', 'status',];
	var $order = ['username' => 'asc'];

	private function _get_datatables_query($select = '*')
	{
		$this->db->select($select);
		$this->db->from($this->table);
		// $this->db->group_by($group);
		$i = 0;
		foreach ($this->column_search as $item) {
			if (@$this->input->post('search')['value']) {
				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $this->input->post('search')['value']);
				} else {
					$this->db->or_like($item, $this->input->post('search')['value']);
				}
				if (count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if($this->input->post('order')) {
			$this->db->order_by($this->column_order[$this->input->post('order')['0']['column']], $this->input->post('order')['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables( $select = '*')
	{
		$this->_get_datatables_query($select);
		if (@$this->input->post('length') != -1)
			$this->db->limit(@$this->input->post('length'), @$this->input->post('start'));
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered( $select = '*')
	{
		$this->_get_datatables_query($select);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}