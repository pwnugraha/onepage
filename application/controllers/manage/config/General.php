<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class General extends AppBase {

    function __construct() {
        parent::__construct();
        /* if($this->session->userdata('is_logged_in') ==1){
          redirect('form','refresh');
          } */
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
            $this->form_validation->set_rules('about_gome', 'Tentang Gome', 'trim|required');

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
                    'instagram' => $this->input->post('instagram', TRUE),
                    'about_gome' => $this->input->post('about_gome', TRUE)
                );
                $upd = $this->config_model->upd_generalconfig($params);
                $this->_result_msg('success', 'Pengaturan berhasil diubah');
                redirect('manage/config/general');
            }
        } else {
            redirect('manage/config/general');
        }
    }

    function banner($params = "") {
        $data['upload_error'] = "";
        $data['banner'] = $params;
        $this->admindisplay('manage/config/setting_banner', $data);
    }

    function banner_upd($banner = "") {
        $gambar = $_FILES['fbanner'];
        $config['upload_path'] = './assets/img/banner/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->upload->initialize($config);
        //parameter

        if ($this->upload->do_upload('fbanner')) {
            $img = $this->upload->data();

            $params = array($img['file_name'], $banner);
            $this->config_model->update_banner($params);
            $this->session->set_userdata('msg', 'Data telah disimpan');
            redirect('manage/config/setting');
        } else {
            $data['upload_error'] = $this->upload->display_errors();
            $data['banner'] = $banner;
            $this->admindisplay('manage/config/setting_banner', $data);
        }
    }

    function logo() {
        $this->admindisplay('manage/config/setting_logo');
    }

    public function logo_upd() {
        $logo = $this->config_model->get_logo();
        $gambar = $_FILES['fimage'];
        $config = array(
            'upload_path' => 'assets/img/',
            'allowed_types' => 'gif|jpg|jpeg|png',
            'max_size' => 256,
            'max_width' => 640,
            'max_height' => 640,
            'min_width' => 130,
            'min_height' => 60,
            'remove_spaces' => TRUE
        );

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('fimage')) {
            $this->_result_msg('danger', $this->upload->display_errors());
            redirect('manage/config/logo');
        } else {
            $img = $this->upload->data();
            $act = $this->config_model->logo_upd($config['upload_path'] . $img['file_name']);
            if (!$act) {
                $this->_result_msg('danger', 'Gagal menyimpan data');
                unlink($config['upload_path'] . $img['file_name']);
                redirect('manage/config/logo');
            } else {
                $this->_result_msg('success', 'Logo berhasil diubah');
                if ($logo['value'] != $config['upload_path'] . $img['file_name']) {
                    unlink($logo['value']);
                }
                redirect('manage/config/general');
            }
        }
    }

}
