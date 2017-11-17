<?php

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->_is_logged_in();
        $this->load->model('auth_model', 'auth');
    }

    public function admin() {
        $this->load->view('auth/login');
    }

    public function login() {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        if (!$this->auth->verify_user($username, $password)) {
            $this->session->set_flashdata('login_msg', 'Username atau Password salah');
            redirect('auth/admin');
        } else {
            $params = array(
                'username' => $username,
                'is_logged_in' => TRUE
            );
            $this->session->set_userdata($params);
            redirect('manage/dashboard');
        }
    }

    function _is_logged_in() {
        $auth = $this->session->userdata('is_logged_in');
        if (isset($auth) && $auth == TRUE) {
            redirect('manage/dashboard');
        }
    }

}
