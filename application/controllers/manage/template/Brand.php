<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Brand extends AppBase {

    function __construct() {
        parent::__construct();
        /* if($this->session->userdata('is_logged_in') ==1){
          redirect('form','refresh');
          } */
        $this->load->model('config_model');
    }

    public function index() {
        $setting = $this->config_model->get_setting();
        foreach ($setting as $i) {
            $data['set2'][$i['name']] = $i['autoload'];
        }

        $setting = $this->config_model->get_setting();
        foreach ($setting as $i) {
            $data['set'][$i['name']] = $i['value'];
        }
        $this->admindisplay('manage/template/brand', $data);
    }
//    function banner($params = "") {
//        $data['upload_error'] = "";
//        $data['banner'] = $params;
//        $this->admindisplay('manage/setting_banner', $data);
//    }
//
//    function banner_upd($banner = "") {
//        $gambar = $_FILES['fbanner'];
//        $config['upload_path'] = './assets/img/banner/';
//        $config['allowed_types'] = 'gif|jpg|png';
//        $this->upload->initialize($config);
//        //parameter
//
//        if ($this->upload->do_upload('fbanner')) {
//            $img = $this->upload->data();
//
//            $params = array($img['file_name'], $banner);
//            $this->config_model->update_banner($params);
//            $this->session->set_userdata('msg', 'Data telah disimpan');
//            redirect('manage/setting');
//        } else {
//            $data['upload_error'] = $this->upload->display_errors();
//            $data['banner'] = $banner;
//            $this->admindisplay('manage/setting_banner', $data);
//        }
//    }

    function logo() {
        $this->admindisplay('manage/template/logo');
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
            redirect('manage/template/brand/logo');
        } else {
            $img = $this->upload->data();
            $act = $this->config_model->logo_upd($config['upload_path'] . $img['file_name']);
            if (!$act) {
                $this->_result_msg('danger', 'Gagal menyimpan data');
                unlink($config['upload_path'] . $img['file_name']);
                redirect('manage/template/brand/logo');
            } else {
                $this->_result_msg('success', 'Logo berhasil diubah');
                if ($logo['value'] != $config['upload_path'] . $img['file_name']) {
                    unlink($logo['value']);
                }
                redirect('manage/template/brand/logo');
            }
        }
    }

}
