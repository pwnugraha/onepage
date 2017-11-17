<?php

class Auth_model extends CI_Model {

    public function verify_user($user, $pass) {
        $query = $this->db->select('password')->where('user_login', $user)->get('users');
        if ($query->num_rows() == 1) {
            $result = $query->row_array();
            $query->free_result();
            return password_verify($pass, $result['password']);
        } else {
            return FALSE;
        }
    }

}
