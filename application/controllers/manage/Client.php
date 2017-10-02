<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Client extends AppBase {

    public function __construct() {
        parent::__construct();
        /* if($this->session->userdata('is_logged_in') ==1){
          redirect('form','refresh');
          } */
        $this->load->model('client_model', 'client');
    }

    public function index() {
        $data['client'] = $this->client->get_client();
        $this->admindisplay('manage/client', $data);
    }

    public function client_view($id = "") {
        if (is_numeric($id)) {
            $data['client'] = $this->client->get_view_client($params);
            $this->admindisplay('manage/client_edit', $data);
        } else {
            show_404();
        }
    }

    public function add() {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->admindisplay('manage/client_add');
        } else {
            $gambar = $_FILES['fimage'];
            $config = array(
                'upload_path' => 'assets/img/client/',
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => 2048,
                'max_width' => 2048,
                'max_height' => 1152,
                'min_width' => 75,
                'min_height' => 75,
                'remove_spaces' => TRUE
            );
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('fimage')) {
                $this->_result_msg('danger', $this->upload->display_errors());
                $this->admindisplay('manage/client_add');
            } else {
                $img = $this->upload->data();
                $thumb = $this->_create_thumb($config['upload_path'] . $img['file_name'], $config['upload_path'] . 'thumb/' . $img['file_name']);
                if ($thumb != TRUE) {
                    $this->_result_msg('danger', $thumb);
                    unlink($config['upload_path'] . $img['file_name']);
                    $this->admindisplay('manage/client_add');
                } else {
                    $params = array(
                        'name' => $this->input->post('title', TRUE),
                        'src' => $config['upload_path'] . $img['file_name'],
                        'description' => $this->input->post('description', TRUE)
                    );
                    $act = $this->client->client_add($params);
                    if (!$act) {
                        $this->_result_msg('danger', 'Gagal menyimpan data');
                        unlink($config['upload_path'] . $img['file_name']);
                        $this->admindisplay('manage/client_add');
                    } else {
                        $this->_result_msg('success', 'Data baru telah ditambahkan');
                        redirect('manage/client');
                    }
                }
            }
        }
    }

    public function edit($id = "") {
        if (!is_numeric($id)) {
            show_404();
        }
        $data['id_client'] = $id;
        $data['client'] = $this->client->get_view_client($id);
        if ($this->input->post('act', TRUE)) {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('description', 'Deskripsi', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $this->admindisplay('manage/client_edit_f', $data);
            } else {
                if (empty($_FILES['fimage']['name'])) {
                    $params = array(
                        'name' => $this->input->post('title', TRUE),
                        'description' => $this->input->post('description', TRUE)
                    );
                    $act = $this->client->client_upd($params, $id);
                    if (!$act) {
                        $this->_result_msg('danger', 'Gagal menyimpan data');
                        $this->admindisplay('manage/client_edit', $data);
                    } else {
                        $this->_result_msg('success', 'Data berhasil disimpan');
                        redirect('manage/client');
                    }
                } else {
                    $gambar = $_FILES['fimage'];
                    $config = array(
                        'upload_path' => 'assets/img/client/',
                        'allowed_types' => 'gif|jpg|jpeg|png',
                        'max_size' => 2048,
                        'max_width' => 2048,
                        'max_height' => 1152,
                        'min_width' => 75,
                        'min_height' => 75,
                        'remove_spaces' => TRUE
                    );
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('fimage')) {
                        $this->_result_msg('danger', $this->upload->display_errors());
                        $this->admindisplay('manage/client_edit', $data);
                    } else {
                        $img = $this->upload->data();
                        $thumb = $this->_create_thumb($config['upload_path'] . $img['file_name'], $config['upload_path'] . 'thumb/' . $img['file_name']);
                        if ($thumb != TRUE) {
                            $this->_result_msg('danger', $thumb);
                            unlink($config['upload_path'] . $img['file_name']);
                            $this->admindisplay('manage/client_edit', $data);
                        } else {
                            $params = array(
                                'name' => $this->input->post('title', TRUE),
                                'src' => $config['upload_path'] . $img['file_name'],
                                'description' => $this->input->post('description', TRUE)
                            );
                            $act = $this->client->client_upd($params, $id);
                            if (!$act) {
                                $this->_result_msg('danger', 'Gagal menyimpan data');
                                unlink($config['upload_path'] . $img['file_name']);
                                $this->admindisplay('manage/client_edit', $data);
                            } else {
                                $this->_result_msg('success', 'Data berhasil diubah');
                                if ($data['client']['src'] != $config['upload_path'] . $img['file_name']) {
                                    unlink($data['client']['src']);
                                }
                                redirect('manage/client');
                            }
                        }
                    }
                }
            }
        } else {
            $this->admindisplay('manage/client_edit', $data);
        }
    }

    public function client_delete($id) {
        $client = $this->client->get_view_client($id);
        $result = $this->client->delete_client($id);
        if ($result === TRUE) {
            unlink($client['src']);
            $this->_result_msg('success', 'Data telah dihapus');
            redirect('manage/client');
        } else {
            $this->_result_msg('danger', 'Gagal menghapus data');
            redirect('manage/client');
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
            'width' => 75,
            'height' => 75
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
