<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Video extends AppBase {

    public function __construct() {
        parent::__construct();
        $this->load->add_package_path(APPPATH . 'third_party/blueimp_jfu/');
    }

    public function index() {
        $data['media'] = $this->base_model->get_join_item('result', 'media.*, first_name, last_name', 'media.id DESC', 'media', 'users', 'media.user_id=users.id', 'left', array('media_type' => 'video'));
        $this->admindisplay('manage/media/video/index', $data);
    }

    public function create() {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('embed', 'Embed Code', 'trim|required');
        $this->form_validation->set_rules('url', 'Link', 'trim|valid_url');
        $this->form_validation->set_rules('caption', 'Caption', 'trim');

        if ($this->form_validation->run() === FALSE) {
            $this->admindisplay('manage/media/video/create');
        } else {
            $params = array(
                'user_id' => $this->ion_auth->user()->row()->id,
                'title' => $this->input->post('title', TRUE),
                'description' => $this->input->post('embed', TRUE),
                'caption' => $this->input->post('caption', TRUE),
                'url' => $this->input->post('url', TRUE),
                'media_type' => 'video',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            );
            $act = $this->base_model->insert_item('media', $params, 'id');
            if (!$act) {
                $this->_result_msg('danger', 'Gagal menyimpan data');
            } else {
                $this->_result_msg('success', 'Data baru telah ditambahkan');
            }
            redirect('manage/media/video/edit/' . $act);
        }
    }

    public function edit($id) {
        $data['media'] = $this->base_model->get_join_item('row', 'media.*, first_name, last_name', NULL, 'media', 'users', 'media.user_id=users.id', 'inner', array('media.id' => $id));
        if (!$data['media']) {
            show_404();
        }
        if ($this->input->post('act', TRUE)) {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('embed', 'Embed Code', 'trim|required');
            $this->form_validation->set_rules('url', 'Link', 'trim|valid_url');
            $this->form_validation->set_rules('caption', 'Caption', 'trim');

            if ($this->form_validation->run() === FALSE) {
                $this->admindisplay('manage/media/video/edit_f', $data);
            } else {
                $params = array(
                    'title' => $this->input->post('title', TRUE),
                    'description' => $this->input->post('embed', TRUE),
                    'caption' => $this->input->post('caption', TRUE),
                    'url' => $this->input->post('url', TRUE),
                    'modified' => date("Y-m-d H:i:s"),
                );
                $act = $this->base_model->update_item('media', $params, array('id' => $id));
                if (!$act) {
                    $this->_result_msg('danger', 'Gagal menyimpan data');
                } else {
                    $this->_result_msg('success', 'Data berhasil diubah');
                }
                redirect('manage/media/video/edit/' . $id);
            }
        } else {
            $this->admindisplay('manage/media/video/edit', $data);
        }
    }

    public function delete($id) {
        $file = $this->base_model->get_item('row', 'media', 'id, dir, name', array('id' => $id));
        if (!$file) {
            $this->_result_msg('danger', 'Gagal menghapus data');
        } else {
            $result = $this->base_model->delete_item('media', array('id' => $id));
            if ($result) {
                $this->_result_msg('success', 'Data telah dihapus');
            } else {
                $this->_result_msg('danger', 'Gagal menghapus data');
            }
        }
        redirect('manage/media/video');
    }

    public function delete_all() {
        $data = $this->input->post('pcheck');
        if (!empty($data)) {
            foreach ($data as $value) {
                $file = $this->base_model->get_item('row', 'media', 'id, dir, name', array('id' => $value));
                if (!$file) {
                    $this->_result_msg('danger', 'Gagal menghapus data');
                    redirect('manage/media/video');
                } else {
                    $result = $this->base_model->delete_item('media', array('id' => $value));
                    if ($result) {
                        $this->_result_msg('success', 'Data telah dihapus');
                    } else {
                        $this->_result_msg('danger', 'Gagal menghapus data');
                    }
                }
            }
        } else {
            $this->_result_msg('danger', 'Tidak ada data yang dipilih');
        }
        redirect('manage/media/video');
    }
}
