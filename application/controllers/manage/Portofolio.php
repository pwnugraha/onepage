<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Portofolio extends AppBase {

    public function __construct() {
        parent::__construct();
        /* if($this->session->userdata('is_logged_in') ==1){
          redirect('form','refresh');
          } */
        $this->load->model('portofolio_model', 'portofolio');
    }

    public function index() {
        $data['portofolio'] = $this->portofolio->get_portofolio();
        $this->admindisplay('manage/portofolio', $data);
    }

    public function portofolio_view($id = "") {
        if (is_numeric($id)) {
            $data['portofolio'] = $this->portofolio->get_view_portofolio($params);
            $this->admindisplay('manage/portofolio_edit', $data);
        } else {
            show_404();
        }
    }

    public function add() {
        $this->form_validation->set_rules('title', 'Nama', 'trim|required');
        $this->form_validation->set_rules('url', 'Url', 'trim|required');
        $this->form_validation->set_rules('type', 'Tipe', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->admindisplay('manage/portofolio_add');
        } else {
            $gambar = $_FILES['fimage'];
            $config = array(
                'upload_path' => 'assets/img/webdev/',
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => 2048,
                'max_width' => 2048,
                'max_height' => 1152,
                'min_width' => 300,
                'min_height' => 150,
                'remove_spaces' => TRUE
            );
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('fimage')) {
                $this->_result_msg('danger', $this->upload->display_errors());
                $this->admindisplay('manage/portofolio_add');
            } else {
                $img = $this->upload->data();
                $thumb = $this->_create_thumb($config['upload_path'] . $img['file_name'], $config['upload_path'] . 'thumb/' . $img['file_name']);
                if ($thumb != TRUE) {
                    $this->_result_msg('danger', $thumb);
                    unlink($config['upload_path'] . $img['file_name']);
                    $this->admindisplay('manage/portofolio_add');
                } else {
                    $params = array(
                        'name' => $this->input->post('title', TRUE),
                        'src' => $config['upload_path'] . $img['file_name'],
                        'url' => $this->input->post('url', TRUE),
                        'type' => $this->input->post('type', TRUE)
                    );
                    $act = $this->portofolio->portofolio_add($params);
                    if (!$act) {
                        $this->_result_msg('danger', 'Gagal menyimpan data');
                        unlink($config['upload_path'] . $img['file_name']);
                        $this->admindisplay('manage/portofolio_add');
                    } else {
                        $this->_result_msg('success', 'Data baru telah ditambahkan');
                        redirect('manage/portofolio');
                    }
                }
            }
        }
    }

    public function edit($id = "") {
        if (!is_numeric($id)) {
            show_404();
        }
        $data['id_portofolio'] = $id;
        $data['portofolio'] = $this->portofolio->get_view_portofolio($id);
        if ($this->input->post('act', TRUE)) {
            $this->form_validation->set_rules('title', 'Nama', 'trim|required');
            $this->form_validation->set_rules('url', 'Url', 'trim|required');
            $this->form_validation->set_rules('type', 'Tipe', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $this->admindisplay('manage/portofolio_edit_f', $data);
            } else {
                if (empty($_FILES['fimage']['name'])) {
                    $params = array(
                        'name' => $this->input->post('title', TRUE),
                        'url' => $this->input->post('url', TRUE),
                        'type' => $this->input->post('type', TRUE)
                    );
                    $act = $this->portofolio->portofolio_upd($params, $id);
                    if (!$act) {
                        $this->_result_msg('danger', 'Gagal menyimpan data');
                        $this->admindisplay('manage/portofolio_edit', $data);
                    } else {
                        $this->_result_msg('success', 'Data berhasil disimpan');
                        redirect('manage/portofolio');
                    }
                } else {
                    $gambar = $_FILES['fimage'];
                    $config = array(
                        'upload_path' => 'assets/img/webdev/',
                        'allowed_types' => 'gif|jpg|jpeg|png',
                        'max_size' => 2048,
                        'max_width' => 2048,
                        'max_height' => 1152,
                        'min_width' => 300,
                        'min_height' => 150,
                        'remove_spaces' => TRUE
                    );
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('fimage')) {
                        $this->_result_msg('danger', $this->upload->display_errors());
                        $this->admindisplay('manage/portofolio_edit', $data);
                    } else {
                        $img = $this->upload->data();
                        $thumb = $this->_create_thumb($config['upload_path'] . $img['file_name'], $config['upload_path'] . 'thumb/' . $img['file_name']);
                        if ($thumb != TRUE) {
                            $this->_result_msg('danger', $thumb);
                            unlink($config['upload_path'] . $img['file_name']);
                            $this->admindisplay('manage/portofolio_edit', $data);
                        } else {
                            $params = array(
                                'name' => $this->input->post('title', TRUE),
                                'src' => $config['upload_path'] . $img['file_name'],
                                'url' => $this->input->post('url', TRUE),
                                'type' => $this->input->post('type', TRUE)
                            );
                            $act = $this->portofolio->portofolio_upd($params, $id);
                            if (!$act) {
                                $this->_result_msg('danger', 'Gagal menyimpan data');
                                unlink($config['upload_path'] . $img['file_name']);
                                $this->admindisplay('manage/portofolio_edit', $data);
                            } else {
                                $this->_result_msg('success', 'Data berhasil diubah');
                                if ($data['portofolio']['src'] != $config['upload_path'] . $img['file_name']) {
                                    unlink($data['portofolio']['src']);
                                }
                                redirect('manage/portofolio');
                            }
                        }
                    }
                }
            }
        } else {
            $this->admindisplay('manage/portofolio_edit', $data);
        }
    }

    public function portofolio_delete($id) {
        $portofolio = $this->portofolio->get_view_portofolio($id);
        $result = $this->portofolio->delete_portofolio($id);
        if ($result === TRUE) {
            unlink($portofolio['src']);
            $this->_result_msg('success', 'Data telah dihapus');
            redirect('manage/portofolio');
        } else {
            $this->_result_msg('danger', 'Gagal menghapus data');
            redirect('manage/portofolio');
        }
    }

    function _create_thumb($file, $thumb) {
        $config_thumb = array(
            'image_library' => 'gd2',
            'source_image' => $file,
            'new_image' => $file,
            'create_thumb' => TRUE,
            'thumb_marker' => '',
            'maintain_ratio' => FALSE,
            'width' => 360,
            'height' => 200
        );
        $this->load->library('image_lib', $config_thumb);
        //ini_set('gd.jpeg_ignore_warning', 1);
        if (!$this->image_lib->resize()) {
            return $this->image_lib->display_errors();
        } else {
            return TRUE;
        }
    }

}
