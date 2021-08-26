<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

  	private $db = "";

  	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('emp_db', TRUE);
	}

	var $table = 'master_karyawan_pk_komplit';
	var $column_order = ['', 'NO_BADGE', 'NAMA', 'KODE_INDUK', 'UNIT_INDUK', ''];
	var $column_search = ['NO_BADGE', 'NAMA', 'KODE_INDUK', 'UNIT_INDUK'];
	var $order = ['NAMA' => 'ASC'];

	private function _get_datatables_query($select = '*')
	{
		$this->db->select($select);
		$this->db->from($this->table);

		//check
		if($this->input->get('type') != ""){
			switch ($this->input->get('type')) {
				case 'range_usia':
					$this->db->where('KATEGORI_USIA', urldecode($this->input->get('param')));
					break;
				case 'gender':
					$this->db->where('JK', urldecode($this->input->get('param')));
					break;
				case 'jab':
					$this->db->where('NAMA_JABATAN', urldecode($this->input->get('param')));
					break;
				case 'edu':
					$this->db->join('db_hr_last_edu', 'master_karyawan_pk_komplit.NO_BADGE = db_hr_last_edu.NO_BADGE');
					$this->db->where('db_hr_last_edu.education_level_name', urldecode($this->input->get('param')));
					break;
				case 'masa_kerja':
					switch (urldecode($this->input->get('param'))) {
						case 'Kurang dari 1 Tahun':
							$param = '1';
							break;
						case '1 s.d. 8 Tahun':
							$param = '8';
							break;
						case '9 s.d. 16 Tahun':
							$param = '16';
							break;
						case '17 s.d. 32 Tahun':
							$param = '32';
							break;
						case 'Lebih dari 33 Tahun':
							$param = '33';
							break;
						default:
							$param = '0';
							break;
					}
					$this->db->where('MASA_KERJA', $param);
					break;
				default:
					return null;
					break;
			}
		}

		if($this->input->get('unit_kerja') != ""){
			$this->db->where('master_karyawan_pk_komplit.KODE_INDUK', urldecode($this->input->get('unit_kerja')));
		}

		$i = 0;
		foreach ($this->column_search as $item) {
			if (@$this->input->get('search')['value']) {
				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $this->input->get('search')['value']);
				} else {
					$this->db->or_like($item, $this->input->get('search')['value']);
				}
				if (count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if($this->input->get('order')) {
			$this->db->order_by($this->column_order[$this->input->get('order')['0']['column']], $this->input->get('order')['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables( $select = '*')
	{
		$this->_get_datatables_query($select);
		if (@$this->input->get('length') != -1)
			$this->db->limit(@$this->input->get('length'), @$this->input->get('start'));
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

	public function get($order_by = null) {
		$this->db->select('NO_BADGE, NAMA, KODE_INDUK, UNIT_INDUK');
		if($order_by != null){
		$this->db->order_by($order_by);
		}
		return $this->db->get($this->table);
    }

	public function get_last(){
		return $this->db->last_query();
	}

	public function get_all($table, $select, $order_by = null) {
      $this->db->select($select);
      if($order_by != null){
      $this->db->order_by($order_by);
      }
      return $this->db->get($table);
    }

	public function execute($query) {
      return $this->db->query($query);
    }

	function get_where($table, $select, $where = null,$order_by = null) {
        $this->db->select($select);
        $this->db->where($where);
        if($order_by != null){
    		$this->db->order_by($order_by);
        }
        return $this->db->get($table);
    }

}
