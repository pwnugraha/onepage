<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Information extends AppBase {

    public function __construct() {
        parent::__construct();
        /* if($this->session->userdata('is_logged_in') ==1){
          redirect('form','refresh');
          } */
        $this->load->model('information_model', 'info');
    }

    public function index() {
        $data['info'] = $this->info->get_info();
        $this->admindisplay('manage/information', $data);
    }

    public function view($id = "") {
        if (is_numeric($id)) {
            $data['info'] = $this->info->get_view_info($id);
            $this->admindisplay('manage/information_edit', $data);
        } else {
            show_404();
        }
    }

    public function add() {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('ck_description_field', 'Deskripsi', 'trim');
        $this->form_validation->set_rules('rel_url', 'Link Halaman', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $this->admindisplay('manage/information_add');
        } else {

            $params = array(
                'name' => $this->input->post('title', TRUE),
                'description' => $this->input->post('ck_description_field', TRUE),
                'rel_url' => $this->input->post('rel_url', TRUE),
            );
            $act = $this->info->info_add($params);
            if (!$act) {
                $this->_result_msg('danger', 'Gagal menyimpan data');
            } else {
                $this->_result_msg('success', 'Data baru telah ditambahkan');
            }
            redirect('manage/information');
        }
    }

    public function edit($id = "") {
        if (!is_numeric($id)) {
            show_404();
        }
        $data['id_info'] = $id;
        $data['info'] = $this->info->get_view_info($id);
        if ($this->input->post('act', TRUE)) {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('ck_description_field', 'Deskripsi', 'trim');
            $this->form_validation->set_rules('rel_url', 'Link Halaman', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $this->admindisplay('manage/information_edit_f', $data);
            } else {
                $params = array(
                    'name' => $this->input->post('title', TRUE),
                    'description' => $this->input->post('ck_description_field', TRUE),
                    'rel_url' => $this->input->post('rel_url', TRUE),
                );
                $act = $this->info->info_upd($params, $id);
                if (!$act) {
                    $this->_result_msg('danger', 'Gagal menyimpan data');
                } else {
                    $this->_result_msg('success', 'Data berhasil diubah');
                    $data['info'] = $this->info->get_view_info($id);
                }
                redirect('manage/information/edit/'.$id);
            }
        } else {
            $this->admindisplay('manage/information_edit', $data);
        }
    }

    public function delete($id) {
        $result = $this->info->delete_info($id);
        if ($result === TRUE) {
            $this->_result_msg('success', 'Data telah dihapus');
        } else {
            $this->_result_msg('danger', 'Gagal menghapus data');
        }
        redirect('manage/information');
    }

}
