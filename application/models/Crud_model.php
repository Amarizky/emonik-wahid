<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

    function get_trash($table, $select, $order_by = null, $where = null) {
      $this->db->select($select);
      if($order_by != null){
      $this->db->order_by($order_by);
      }
      $this->db->where(['is_deleted' => '1']);
      if($where != null){
      $this->db->where($where);
      }
      return $this->db->get($table);
    }

    function get_trash_where_join($select, $table, $table2, $join, $where, $order_by = null){
        $this->db->select($select);
        $this->db->join($table2, $join);
        $this->db->where($where);
        $this->db->where([$table.'.is_deleted' => '1']);
        if($order_by != null){
    		$this->db->order_by($order_by);
        }
        return $this->db->get($table);
    }

    function get($table, $select, $order_by = null) {
      $this->db->select($select);
      if($order_by != null){
      $this->db->order_by($order_by);
      }
      $this->db->where(['is_deleted' => '0']);
      return $this->db->get($table);
    }

    function get_group($table, $select, $order_by = null, $group_by = null) {
      $this->db->select($select);
      if($order_by != null){
        $this->db->order_by($order_by);
      }
      if($group_by != null){
        $this->db->group_by($group_by);
      }
      $this->db->where(['is_deleted' => '0']);
      return $this->db->get($table);
    }

    function get_limit($table, $select, $limit = null, $where = null, $order_by = null) {
      $this->db->select($select);
      $this->db->limit($limit);
      $this->db->where($where);
      $this->db->where(['is_deleted' => '0']);
      if($order_by != null){
    		$this->db->order_by($order_by);
        }
      return $this->db->get($table);
    }


    function get_where($table, $select, $where = null,$order_by = null) {
        $this->db->select($select);
        $this->db->where($where);
        $this->db->where(['is_deleted' => '0']);
        if($order_by != null){
    		$this->db->order_by($order_by);
        }
        return $this->db->get($table);
    }

    function get_where_or($table, $select, $where_or = null, $where = null,$order_by = null) {
        $this->db->select($select);
        $this->db->where(['is_deleted' => '0']);
        if($where != NULL){
          $this->db->where($where);
        }
        $this->db->or_where($where_or);
        if($order_by != null){
    		$this->db->order_by($order_by);
        }
        return $this->db->get($table);
    }

    function get_where_join($select, $table, $table2, $join, $where, $order_by = null){
        $this->db->select($select);
        $this->db->join($table2, $join);
        $this->db->where($where);
        $this->db->where([$table.'.is_deleted' => '0']);
        if($order_by != null){
    		$this->db->order_by($order_by);
        }
        return $this->db->get($table);
    }
    
    function get_where_like($table, $select, $like = null,$order_by = null) {
        $this->db->select($select);
        $this->db->where(['is_deleted' => '0']);
        $this->db->like($like);
        if($order_by != null){
    		$this->db->order_by($order_by);
        }
        return $this->db->get($table);
    }
    
    function insert($table, $data = array()) {
      $this->log_activity('insert', '', $table);
      $data['created_at'] = date('Y-m-d H:i:s');
			// $data['created_by'] = current_ses('username');
      return $this->db->insert($table, $data);
    }

    function update($table, $data = array(), $where = array()) {
      $get = $this->db->get_where($table, $where)->row_array();
      $this->log_activity('update', json_encode($get), $table);
      
      $data['updated_at'] = date('Y-m-d H:i:s');
			// $data['updated_by'] = current_ses('username');
      $this->db->where($where);
      return $this->db->update($table, $data);
    }

    function delete($table, $where) {
      $this->log_activity('delete', '', $table);
      return $this->db->update($table, ['is_recovered' => '0', 'is_deleted' => '1', 'deleted_at' => date('Y-m-d H:i:s'), 'deleted_by' => current_ses('username')], $where);
    }

    function delete_permanent($table, $where) {
      $get = $this->db->get_where($table, $where)->row_array();
      $this->log_activity('delete_permanent', json_encode($get), $table);
      return $this->db->delete($table, $where);
    }

    function delete_all_permanent($table, $where) {
      $get = $this->db->get_where($table, $where)->result();
      $this->log_activity('delete_all_permanent', json_encode($get), $table);
      return $this->db->delete($table, $where);
    }
    
    function recovery($table, $where) {
      $this->log_activity('recovery', '', $table);
      return $this->db->update($table, ['is_deleted' => '0', 'is_recovered' => '1', 'recovered_at' => date('Y-m-d H:i:s'), 'recovered_by' => current_ses('username')], $where);
    }

    function execute($query) {
      return $this->db->query($query);
    }

    function log_activity($activity = '', $data = '', $table = ''){
      $param = [
        'activity' => $activity,
        'userid' => current_ses('id'),
        'created_at' => date('Y-m-d H:i:s'),
        'table' => $table,
        'log_json' => $data
      ];
      $this->db->insert('_log_activity', $param);
    }

}