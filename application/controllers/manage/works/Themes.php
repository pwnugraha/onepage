<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Themes extends AppBase {

    public function __construct() {
        parent::__construct();
        /* if($this->session->userdata('is_logged_in') ==1){
          redirect('form','refresh');
          } */
        $this->load->model('themes_model', 'themes');
    }

    public function index() {
        $data['themes'] = $this->themes->get_themes();
        $this->admindisplay('manage/works/themes/themes', $data);
    }

    public function themes_view($id = "") {
        if (is_numeric($id)) {
            $data['themes'] = $this->themes->get_view_themes($params);
            $this->admindisplay('manage/works/themes/themes_edit', $data);
        } else {
            show_404();
        }
    }

    public function add() {
        $this->form_validation->set_rules('title', 'Theme Title', 'trim|required');
        $this->form_validation->set_rules('url', 'Link Demo', 'trim|required');
        $this->form_validation->set_rules('theme_type1', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('theme_type2', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('theme_type3', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('theme_type4', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('ck_description_field', 'Deskripsi', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->admindisplay('manage/works/themes/themes_add');
        } else {
            $gambar = $_FILES['fimage'];
            $config = array(
                'upload_path' => 'assets/img/works/themes/',
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
                $this->admindisplay('manage/works/themes/themes_add');
            } else {
                $img = $this->upload->data();
                $thumb = $this->_create_thumb($config['upload_path'] . $img['file_name'], $config['upload_path'] . 'thumb/' . $img['file_name']);
                if ($thumb != TRUE) {
                    $this->_result_msg('danger', $thumb);
                    unlink($config['upload_path'] . $img['file_name']);
                    $this->admindisplay('manage/works/themes/themes_add');
                } else {
                    $params = array(
                        'name' => $this->input->post('title', TRUE),
                        'src' => $config['upload_path'] . $img['file_name'],
                        'url' => $this->input->post('url', TRUE),
                        'type' => $this->input->post('type', TRUE),
                        'description' => $this->input->post('ck_description_field', TRUE),
                    );
                    $act = $this->themes->themes_add($params);
                    if (!$act) {
                        $this->_result_msg('danger', 'Gagal menyimpan data');
                        unlink($config['upload_path'] . $img['file_name']);
                        $this->admindisplay('manage/works/themes/themes_add');
                    } else {
                        $this->_result_msg('success', 'Data baru telah ditambahkan');
                        redirect('manage/themes');
                    }
                }
            }
        }
    }

    public function edit($id = "") {
        if (!is_numeric($id)) {
            show_404();
        }
        $data['id_themes'] = $id;
        $data['themes'] = $this->themes->get_view_themes($id);
        if ($this->input->post('act', TRUE)) {
            $this->form_validation->set_rules('title', 'Nama', 'trim|required');
            $this->form_validation->set_rules('url', 'Link Demo', 'trim|required');
            $this->form_validation->set_rules('type', 'Kategori', 'trim|required');
            $this->form_validation->set_rules('ck_description_field', 'Deskripsi', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $this->admindisplay('manage/works/themes/themes_edit_f', $data);
            } else {
                if (empty($_FILES['fimage']['name'])) {
                    $params = array(
                        'name' => $this->input->post('title', TRUE),
                        'url' => $this->input->post('url', TRUE),
                        'type' => $this->input->post('type', TRUE),
                        'description' => $this->input->post('ck_description_field', TRUE),
                    );
                    $act = $this->themes->themes_upd($params, $id);
                    if (!$act) {
                        $this->_result_msg('danger', 'Gagal menyimpan data');
                        $this->admindisplay('manage/works/themes/themes_edit', $data);
                    } else {
                        $this->_result_msg('success', 'Data berhasil disimpan');
                        redirect('manage/themes');
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
                        $this->admindisplay('manage/works/themes/themes_edit', $data);
                    } else {
                        $img = $this->upload->data();
                        $thumb = $this->_create_thumb($config['upload_path'] . $img['file_name'], $config['upload_path'] . 'thumb/' . $img['file_name']);
                        if ($thumb != TRUE) {
                            $this->_result_msg('danger', $thumb);
                            unlink($config['upload_path'] . $img['file_name']);
                            $this->admindisplay('manage/works/themes/themes_edit', $data);
                        } else {
                            $params = array(
                                'name' => $this->input->post('title', TRUE),
                                'src' => $config['upload_path'] . $img['file_name'],
                                'url' => $this->input->post('url', TRUE),
                                'type' => $this->input->post('type', TRUE),
                                'description' => $this->input->post('ck_description_field', TRUE),
                            );
                            $act = $this->themes->themes_upd($params, $id);
                            if (!$act) {
                                $this->_result_msg('danger', 'Gagal menyimpan data');
                                unlink($config['upload_path'] . $img['file_name']);
                                $this->admindisplay('manage/works/themes/themes_edit', $data);
                            } else {
                                $this->_result_msg('success', 'Data berhasil diubah');
                                if ($data['themes']['src'] != $config['upload_path'] . $img['file_name']) {
                                    unlink($data['themes']['src']);
                                }
                                redirect('manage/themes');
                            }
                        }
                    }
                }
            }
        } else {
            $this->admindisplay('manage/works/themes/themes_edit', $data);
        }
    }

    public function themes_delete($id) {
        $themes = $this->themes->get_view_themes($id);
        $result = $this->themes->delete_themes($id);
        if ($result === TRUE) {
            unlink($themes['src']);
            $this->_result_msg('success', 'Data telah dihapus');
            redirect('manage/themes');
        } else {
            $this->_result_msg('danger', 'Gagal menghapus data');
            redirect('manage/themes');
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
