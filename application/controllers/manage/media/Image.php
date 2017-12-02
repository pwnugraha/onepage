<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Image extends AppBase {

    public function __construct() {
        parent::__construct();
        $this->load->add_package_path(APPPATH . 'third_party/blueimp_jfu/');
    }
    
    public function index() {
        
    }

    public function load() {

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $options = [
                'script_url' => site_url('manage/media/image/load'),
                'upload_dir' => APPPATH . '../media/image/',
                'upload_url' => base_url('media/image/'),
                'accept_file_types' => '/\.(gif|jpe?g|png)$/i'
            ];
            //$this->load->library("uploadhandler", $options);
            $this->load->library("custom_uploadhandler", $options);
            
        } else {
            redirect('manage/media/image/upload');
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
        $this->admindisplay('manage/media/upload', $data);
    }

}
