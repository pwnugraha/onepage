<?php

class Page_model extends CI_Model {

    /*Information*/
    function get_info($type) {
        $query = $this->db->select('id, title, description, rel_url')->where('page_type', $type)->get('page');
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return FALSE;
        }
    }
    
    function get_view_info($id) {
        $query = $query = $this->db->select('id, title, description, rel_url')->where('id', $id)->get('page');
        if ($query->num_rows() == 1) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            show_404();
        }
    }
    function get_view_public_info($param) {
        $query = $query = $this->db->select('id, title, description, rel_url')->where('rel_url', $param)->get('page');
        if ($query->num_rows() == 1) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            show_404();
        }
    }

    function info_upd($params, $id) {
        $query = $this->db->set($params)->where('id', $id)->update('page');
        return $query;
    }

    function info_add($params) {
        $query = $this->db->insert('page', $params);
        return $query;
    }

    function delete_info($id) {
        $query = $this->db->delete('page', array('id' => $id));
        return $query;
    }


}
?>

