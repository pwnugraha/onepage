<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Event extends AppBase {

    public function __construct() {
        parent::__construct();
        /* if($this->session->userdata('is_logged_in') ==1){
          redirect('form','refresh');
          } */
        $this->load->model('page_model', 'page');
    }

    public function index() {
        $data['page'] = $this->page->get_info('event');
        $this->admindisplay('manage/event', $data);
    }

    public function view($id = "") {
        if (is_numeric($id)) {
            $data['page'] = $this->page->get_view_info($id);
            $this->admindisplay('manage/event_edit', $data);
        } else {
            show_404();
        }
    }

    public function add() {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('ck_description_field', 'Deskripsi', 'trim');
        $this->form_validation->set_rules('rel_url', 'Link Halaman', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $this->admindisplay('manage/event_add');
        } else {

            $params = array(
                'title' => $this->input->post('title', TRUE),
                'description' => $this->input->post('ck_description_field', TRUE),
                'rel_url' => '/informasi/' . $this->input->post('rel_url', TRUE),
                'page_type' => 'informasi',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            );
            $act = $this->page->info_add($params);
            if (!$act) {
                $this->_result_msg('danger', 'Gagal menyimpan data');
            } else {
                $this->_result_msg('success', 'Data baru telah ditambahkan');
            }
            redirect('manage/event');
        }
    }

    public function edit($id = "") {
        if (!is_numeric($id)) {
            show_404();
        }
        $data['id_page'] = $id;
        $data['page'] = $this->page->get_view_info($id);
        $data['page']['rel_url'] = explode('/', $data['page']['rel_url']);
        if ($this->input->post('act', TRUE)) {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('ck_description_field', 'Deskripsi', 'trim');
            $this->form_validation->set_rules('rel_url', 'Link Halaman', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $this->admindisplay('manage/event_edit_f', $data);
            } else {
                $params = array(
                    'title' => $this->input->post('title', TRUE),
                    'description' => $this->input->post('ck_description_field', TRUE),
                    'rel_url' => '/informasi/'.$this->input->post('rel_url', TRUE),
                    'modified' => date('Y-m-d H:i:s'),
                );
                $act = $this->page->info_upd($params, $id);
                if (!$act) {
                    $this->_result_msg('danger', 'Gagal menyimpan data');
                } else {
                    $this->_result_msg('success', 'Data berhasil diubah');
                    //$data['page'] = $this->page->get_view_info($id);
                }
                redirect('manage/event/edit/' . $id);
            }
        } else {
            $this->admindisplay('manage/event_edit', $data);
        }
    }

    public function delete($id) {
        $result = $this->page->delete_info($id);
        if ($result === TRUE) {
            $this->_result_msg('success', 'Data telah dihapus');
        } else {
            $this->_result_msg('danger', 'Gagal menghapus data');
        }
        redirect('manage/event');
    }

}
