<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Base_model extends CI_Model {

    public function get_item($search_type, $table, $select = NULL, $where = array(), $order = NULL, $limit = NULL, $offset = NULL) {
        if (isset($select)) {
            $this->db->select($select);
        }
        if (isset($order)) {
            $this->db->order_by($order);
        }
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table, $limit, $offset);
        if ($query->num_rows() > 0) {
             if($search_type == 'result'){
                $result = $query->result_array();
            } else {
                $result = $query->row_array();
            }
            $query->free_result();
            return $result;
        } else {
            return FALSE;
        }
    }

    public function get_join_item($search_type, $select, $order = NULL, $table1, $table2, $relation, $option = NULL, $where = NULL, $limit = NULL, $offset = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (isset($order)) {
            $this->db->order_by($order);
        }
        $query = $this->db->select($select)->join($table2, $relation, $option)->get($table1, $limit, $offset);

        if ($query->num_rows() > 0) {
            if($search_type == 'result'){
                $result = $query->result_array();
            } else {
                $result = $query->row_array();
            }
            $query->free_result();
            return $result;
        } else {
            return FALSE;
        }
    }

    function insert_item($table, $data) {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    function update_item($table, $set = array(), $where = array()) {
        $query = $this->db->update($table, $set, $where);
        return $query;
    }

    function delete_item($table, $where = array()) {
        $query = $this->db->delete($table, $where);
        return $query;
    }

}
