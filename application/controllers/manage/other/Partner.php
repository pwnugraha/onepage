<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Partner extends AppBase {

    public function __construct() {
        parent::__construct();
        $this->load->add_package_path(APPPATH . 'third_party/blueimp_jfu/');
    }

    public function index() {
        $data['image'] = $this->base_model->get_join_item('result', 'media.*, first_name, last_name', 'media.id DESC', 'media', 'users', 'media.user_id=users.id', 'left', array('media_type' => 'image', 'dir' => 'media/partner/'));
        if (!empty($data['image'])) {
            foreach ($data['image'] as &$v) {
                $v['size'] = $this->_getFileSize($v['size']);
            }
        }
        $this->admindisplay('manage/other/partner/index', $data);
    }

    public function load() {

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $options = [
                'script_url' => site_url('manage/other/partner/load'),
                'upload_dir' => APPPATH . '../media/partner/',
                'upload_url' => base_url('media/partner/'),
                'accept_file_types' => '/\.(gif|jpe?g|png)$/i',
                'max_file_size' => 5000000,
                'dir' => 'media/partner/',
                'media_type' => 'image',
                'user' => $this->ion_auth->user()->row()->id
            ];
            //$this->load->library("uploadhandler", $options);
            $this->load->library("custom_uploadhandler", $options);
        } else {
            redirect('manage/other/partner/upload');
        }
    }

    public function upload() {
        $data['assets_header'] = array(
            'asset_2' => '<link href="' . base_url() . 'assets/blueimp/css/jquery.fileupload.css" rel="stylesheet">',
            'asset_3' => '<link href="' . base_url() . 'assets/blueimp/css/jquery.fileupload-ui.css" rel="stylesheet">',
        );
        $data['assets_footer'] = array(
            'asset_1' => '<script src="' . base_url() . 'assets/blueimp/js/vendor/jquery.ui.widget.js"></script>',
            'asset_2' => '<script src="' . base_url() . 'assets/blueimp/js/blueimp/tmpl.min.js"></script>',
            'asset_3' => '<script src="' . base_url() . 'assets/blueimp/js/blueimp/load-image.all.min.js"></script>',
            'asset_4' => '<script src="' . base_url() . 'assets/blueimp/js/blueimp/canvas-to-blob.min.js"></script>',
            'asset_5' => '<script src="' . base_url() . 'assets/blueimp/js/jquery.iframe-transport.js"></script>',
            'asset_6' => '<script src="' . base_url() . 'assets/blueimp/js/jquery.fileupload.js"></script>',
            'asset_7' => '<script src="' . base_url() . 'assets/blueimp/js/jquery.fileupload-process.js"></script>',
            'asset_8' => '<script src="' . base_url() . 'assets/blueimp/js/jquery.fileupload-image.js"></script>',
            'asset_9' => '<script src="' . base_url() . 'assets/blueimp/js/jquery.fileupload-validate.js"></script>',
            'asset_10' => '<script src="' . base_url() . 'assets/blueimp/js/jquery.fileupload-ui.js"></script>',
            'asset_11' => '<script src="' . base_url() . 'assets/blueimp/js/main.js"></script>',
        );
        $this->admindisplay('manage/other/partner/upload', $data);
    }

    public function edit($id) {
        $data['image'] = $this->base_model->get_join_item('row', 'media.*, first_name, last_name', NULL, 'media', 'users', 'media.user_id=users.id', 'inner', array('media.id' => $id));
        if (!$data['image']) {
            show_404();
        }
        $data['image']['size'] = $this->_getFileSize($data['image']['size']);
        $this->form_validation->set_rules('title', 'Title', 'trim');
        $this->form_validation->set_rules('description', 'Description', 'trim');
        $this->form_validation->set_rules('caption', 'Caption', 'trim');
        $this->form_validation->set_rules('alt_text', 'Alt text', 'trim');
        $this->form_validation->set_rules('url', 'Link', 'trim');

        if ($this->form_validation->run() === FALSE) {
            $this->admindisplay('manage/other/partner/edit', $data);
        } else {
            $params = array(
                'title' => $this->input->post('title', TRUE),
                'description' => $this->input->post('description', TRUE),
                'caption' => $this->input->post('caption', TRUE),
                'alt_text' => $this->input->post('alt_text', TRUE),
                'url' => $this->input->post('url', TRUE),
                'modified' => date("Y-m-d H:i:s"),
            );
            $act = $this->base_model->update_item('media', $params, array('id' => $id));
            if (!$act) {
                $this->_result_msg('danger', 'Gagal menyimpan data');
            } else {
                $this->_result_msg('success', 'Data berhasil diubah');
            }
            redirect('manage/other/partner/edit/' . $id);
        }
    }

    public function delete($id) {
        $file = $this->base_model->get_item('row', 'media', 'id, dir, name', array('id' => $id));
        if (!$file) {
            $this->_result_msg('danger', 'Gagal menghapus data');
        } else {
            $result = $this->base_model->delete_item('media', array('id' => $id));
            if ($result) {
                $this->_delete_file_photo($file);
                $this->_result_msg('success', 'Data telah dihapus');
            } else {
                $this->_result_msg('danger', 'Gagal menghapus data');
            }
        }
        redirect('manage/other/partner');
    }

    public function delete_all() {
        $data = $this->input->post('pcheck');
        if (!empty($data)) {
            foreach ($data as $value) {
                $file = $this->base_model->get_item('row', 'media', 'id, dir, name', array('id' => $value));
                if (!$file) {
                    $this->_result_msg('danger', 'Gagal menghapus data');
                    redirect('manage/other/partner');
                } else {
                    $result = $this->base_model->delete_item('media', array('id' => $value));
                    if ($result) {
                        $this->_delete_file_photo($file);
                        $this->_result_msg('success', 'Data telah dihapus');
                    } else {
                        $this->_result_msg('danger', 'Gagal menghapus data');
                    }
                }
            }
        } else {
            $this->_result_msg('danger', 'Tidak ada data yang dipilih');
        }
        redirect('manage/other/partner');
    }

    public function _delete_file_photo($file) {
        if (unlink($file['dir'] . $file['name']) && unlink($file['dir'] . 'thumbnail/' . $file['name'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // Snippet from PHP Share: http://www.phpshare.org
    function _getFileSize($bytes) {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

}
