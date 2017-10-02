<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class User extends AppBase {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    function add($params = "") {
        $this->admindisplay('manage/user_add');
    }

    function create() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[15]|is_unique[user.username]|alpha_dash');
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('repass', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('role', 'Role', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('phone', 'No Telepon', 'trim|required|numeric|max_length[12]');

        if ($this->form_validation->run() === FALSE) {
            $this->admindisplay('manage/user_add');
        } else {
            $params = array(
                'username' => $this->input->post('username', TRUE),
                'name' => $this->input->post('name', TRUE),
                'password' => password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT),
                'role' => $this->input->post('role', TRUE),
                'email' => $this->input->post('email', TRUE),
                'phone' => $this->input->post('phone', TRUE),
            );
            $this->user_model->user_add($params);
            $this->_result_msg('success', 'Data telah ditambahkan');
            redirect('manage/user/add');
        }
    }

}
