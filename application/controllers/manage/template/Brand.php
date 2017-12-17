<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Brand extends AppBase {

    function __construct() {
        parent::__construct();
        $this->load->add_package_path(APPPATH . 'third_party/blueimp_jfu/');
    }

    public function index() {
        $data['brand'] = $this->base_model->get_join_item('row', 'media.id, value, autoload, media.name, dir, title, description', NULL, 'settings', 'media', 'settings.value = media.id', 'inner');
        
        $this->form_validation->set_rules('title', 'Nama Logo', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $this->admindisplay('manage/template/brand/index', $data);
        } else {
            $params = array(
                'title' => $this->input->post('title', TRUE),
                'description' => $this->input->post('description', TRUE),
                'modified' => date("Y-m-d H:i:s"),
            );
            $act = $this->base_model->update_item('media', $params, array('id' => $data['brand']['id']));
            if (!$act) {
                $this->_result_msg('danger', 'Gagal menyimpan data');
            } else {
                $this->_result_msg('success', 'Data berhasil diubah');
            }
            redirect('manage/template/brand/index');
        }
    }

    public function load() {

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $options = [
                'script_url' => site_url('manage/template/brand/load'),
                'upload_dir' => APPPATH . '../media/template/brand/',
                'upload_url' => base_url('media/template/brand/'),
                'accept_file_types' => '/\.(gif|jpe?g|png)$/i',
                'max_file_size' => 5000000,
                'temp_save' => 'brand',
                'dir' => 'media/template/brand/',
                'media_type' => 'image',
                'user' => $this->ion_auth->user()->row()->id
            ];
            //$this->load->library("uploadhandler", $options);
            $this->load->library("custom_uploadhandler", $options);
            $action = $this->base_model->get_item('result', 'media', 'id, temp', array('temp' => 'brand'));
            if ($action) {
                foreach ($action as $item) {
                    if ($item['temp'] == 'brand') {
                        $this->base_model->update_item('settings', array('value' => $item['id']), array('name' => 'site_logo'));
                        $this->base_model->update_item('media', array('temp' => NULL), array('id' => $item['id']));
                    }
                }
            }
        } else {
            redirect('manage/template/brand');
        }
    }

    public function upload() {
        $data['assets_header'] = array(
            'asset_1' => '<link href="' . base_url() . 'assets/blueimp/css/jquery.fileupload.css" rel="stylesheet">',
            'asset_2' => '<link href="' . base_url() . 'assets/blueimp/css/jquery.fileupload-ui.css" rel="stylesheet">',
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
        $this->admindisplay('manage/template/brand/upload', $data);
    }
}
