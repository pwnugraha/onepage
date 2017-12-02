<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_view_user($id) {
        $query = $query = $this->db->select('name, user_login, role, email, status')->where('id', $id)->get('users');
        if ($query->num_rows() == 1) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            show_404();
        }
    }

    public function upd_user($params, $id) {
        $query = $this->db->set($params)->where('id', $id)->update('users');
        return $query;
    }

    public function upd_pass($params, $id) {
        $query = $this->db->set($params)->where('id', $id)->update('users');
        return $query;
    }

    public function verify_pass($param, $id) {
        $query = $this->db->select('password')->where('id', $id)->get('users');
        if ($query->num_rows() == 1) {
            $result = $query->row_array();
            $query->free_result();
            return password_verify($param, $result['password']);
        } else {
            return FALSE;
        }
    }

}
