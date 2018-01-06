<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AppBase extends CI_Controller {

    public function __construct() {
        
        parent::__construct();
        $this->load->add_package_path(APPPATH . 'third_party/ion_auth/');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->model('base_model');
        $this->config->load('build_opt', TRUE);
        $this->_is_logged_in();
        $this->build_opt = $this->config->item('build_opt');
        
        
    }

    public function admindisplay($child_view = "", $data = array()) {
        $data['child_template'] = $child_view;
        $this->load->view('manage/base_admin.php', $data);
    }

    public function _result_msg($alert, $msg) {
        return $this->session->set_flashdata(array(
                    'msg' => $msg,
                    'alert' => 'alert-' . $alert
        ));
    }

    public function _is_logged_in() {
        //$auth = $this->session->userdata('is_logged_in');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
    }

}
