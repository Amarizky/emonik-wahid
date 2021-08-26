<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tis_model extends CI_Model {

  	private $db = "";

  	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('tis_db', TRUE);
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
