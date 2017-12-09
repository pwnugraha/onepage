<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class General extends AppBase {

    function __construct() {
        parent::__construct();
        $this->load->model('config_model');
    }

    public function index() {
//        $setting = $this->config_model->get_setting();
//        foreach ($setting as $i) {
//            $data['set2'][$i['name']] = $i['autoload'];
//        }
        $setting = $this->config_model->get_setting();
        foreach ($setting as $i) {
            $data['set'][$i['name']] = $i['value'];
        }
        $this->admindisplay('manage/config/setting_general', $data);
    }

    public function upd_generalconfig() {
        $setting = $this->config_model->get_setting();
        foreach ($setting as $i) {
            $data['set2'][$i['name']] = $i['autoload'];
        }
        $setting = $this->config_model->get_setting();
        foreach ($setting as $i) {
            $data['set'][$i['name']] = $i['value'];
        }
        $data['msg'] = "";
        if ($this->input->post('p_setting')) {
            $this->form_validation->set_rules('site_title', 'Title', 'trim|required');
            $this->form_validation->set_rules('tagline', 'Tagline', 'trim|required');
            $this->form_validation->set_rules('site_keyword', 'Keyword', 'trim|required');
            $this->form_validation->set_rules('site_description', 'Deskripsi Website', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
            $this->form_validation->set_rules('phone', 'Telepon', 'trim|required|numeric');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('whatsapp', 'Whatsapp', 'trim|required|numeric');
            $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
            $this->form_validation->set_rules('twitter', 'Twitter', 'trim');
            $this->form_validation->set_rules('instagram', 'Instagram', 'trim');

            if ($this->form_validation->run() == FALSE) {
                $this->admindisplay('manage/config/setting_general', $data);
            } else {
                $params = array(
                    'site_title' => $this->input->post('site_title', TRUE),
                    'tagline' => $this->input->post('tagline', TRUE),
                    'site_keyword' => $this->input->post('site_keyword', TRUE),
                    'site_description' => $this->input->post('site_description', TRUE),
                    'alamat' => $this->input->post('alamat', TRUE),
                    'phone' => $this->input->post('phone', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    'whatsapp' => $this->input->post('whatsapp', TRUE),
                    'facebook' => $this->input->post('facebook', TRUE),
                    'twitter' => $this->input->post('twitter', TRUE),
                    'instagram' => $this->input->post('instagram', TRUE)
                );
                $upd = $this->config_model->upd_generalconfig($params);
                $this->_result_msg('success', 'Pengaturan berhasil diubah');
                redirect('manage/config/general');
            }
        } else {
            redirect('manage/config/general');
        }
    }
}
