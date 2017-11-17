<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class User extends AppBase {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model', 'user');
    }

    public function profile() {
        $data['user'] = $this->user->get_view_user(1);
        if ($this->input->post('act', TRUE)) {
            $this->form_validation->set_rules('name', 'Nama', 'trim|required|max_length[100]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]|is_unique[users.email]');
            if ($this->form_validation->run() === FALSE) {
                $this->admindisplay('manage/user/set_profile_f', $data);
            } else {
                $params = array(
                    'name' => $this->input->post('name', TRUE),
                    'email' => $this->input->post('email', TRUE),
                );
                $this->user->upd_user($params, 1);
                $this->_result_msg('success', 'Profil telah disimpan.');
                redirect('manage/user/profile');
            }
        } else {
            $this->admindisplay('manage/user/set_profile', $data);
        }
    }

    public function set_pass() {
        if ($this->input->post('act', TRUE)) {
            $this->form_validation->set_rules('oldpassword', 'Password Lama', 'required');
            $this->form_validation->set_rules('password', 'Password Baru', 'required');
            $this->form_validation->set_rules('repass', 'Ulangi Password', 'required|matches[password]');
            if ($this->form_validation->run() === FALSE) {
                $this->admindisplay('manage/user/set_pass_f');
            } else {
                if (!$this->user->verify_pass($this->input->post('oldpassword', TRUE), 1)) {
                    $this->_result_msg('danger', 'Password lama anda salah.');
                    redirect('manage/user/set_pass');
                }

                $params = array(
                    'password' => password_hash($this->input->post('repass', TRUE), PASSWORD_BCRYPT),
                );
                $this->user->upd_pass($params, 1);
                $this->_result_msg('success', 'Password telah diubah');
                redirect('manage/user/set_pass');
            }
        } else {
            $this->admindisplay('manage/user/set_pass');
        }
    }

    public function logout() {
        $this->session->unset_userdata(array('username', 'is_logged_in'));
        redirect('auth/admin', 'refresh');
    }

}
