<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Homepage extends AppBase {

    function __construct() {
        parent::__construct();
        $this->load->add_package_path(APPPATH . 'third_party/blueimp_jfu/');
    }

    public function index() {
        $data['homepage_background_template'] = $this->build_opt['homepage_background_template'];
        $data['homepage_editable_content'] = $this->build_opt['homepage_editable_content'];
        $data['homepage_content_title'] = $this->build_opt['homepage_content_title'];
        $data['theme'] = $this->base_model->get_join_item('result', 'media.id, define, value, media.name, dir', NULL, 'theme_settings', 'media', 'theme_settings.value = media.id', 'inner');

        $data['theme_contents'] = $this->base_model->get_item('result', 'theme_settings', 'define, value', array('define like' => '%homepage_editable_content%'), 'define ASC');
        $data['theme_contents_title'] = $this->base_model->get_item('result', 'theme_settings', 'define, value', array('define like' => '%homepage_content_title%', 'define ASC'));
        $i = 1;
        foreach ($data['theme_contents'] as $v) {
            $this->form_validation->set_rules($v['define'], 'Konten_' . $i, 'trim');
            $i++;
        }
        foreach ($data['theme_contents_title'] as $v) {
            $this->form_validation->set_rules($v['define'], 'Judul konten_' . $i, 'trim');
            $i++;
        }

        if ($this->form_validation->run() === FALSE) {
            $this->admindisplay('manage/template/homepage/index', $data);
        } else {
            for ($i = 0; $i < $data['homepage_editable_content']; $i++) {
                $params = array(
                    'value' => $this->input->post('homepage_editable_content_' . $i, TRUE),
                );
                $act = $this->base_model->update_item('theme_settings', $params, array('define' => 'homepage_editable_content_' . $i));
            }
            for ($i = 0; $i < $data['homepage_content_title']; $i++) {
                $params = array(
                    'value' => $this->input->post('homepage_content_title_' . $i, TRUE),
                );
                $act = $this->base_model->update_item('theme_settings', $params, array('define' => 'homepage_content_title_' . $i));
            }
            if (!$act) {
                $this->_result_msg('danger', 'Gagal menyimpan data');
            } else {
                $this->_result_msg('success', 'Data berhasil diubah');
            }
            redirect('manage/template/homepage/index');
        }
    }

    public function load($param = NULL) {

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $options = [
                'script_url' => site_url('manage/media/image/load'),
                'upload_dir' => APPPATH . '../media/image/',
                'upload_url' => base_url('media/image/'),
                'accept_file_types' => '/\.(gif|jpe?g|png)$/i',
                'max_file_size' => 2000000,
                'temp_save' => $param,
                'dir' => 'media/image/',
                'media_type' => 'image',
                'user' => $this->ion_auth->user()->row()->id
            ];
            //$this->load->library("uploadhandler", $options);
            $this->load->library("custom_uploadhandler", $options);
            $action = $this->base_model->get_item('result', 'media', 'id, temp', array('temp' => $param));
            if ($action) {
                foreach ($action as $item) {
                    if ($item['temp'] == $param) {
                        $this->base_model->update_item('theme_settings', array('value' => $item['id']), array('define' => $param));
                        $this->base_model->update_item('media', array('temp' => NULL), array('id' => $item['id']));
                    }
                }
            }
        } else {
            redirect('manage/template/homepage');
        }
    }

    public function upload() {
        if (!$this->input->post('param', TRUE)) {
            redirect('manage/template/homepage');
        }
        $data['param'] = $this->input->post('param', TRUE);
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
        $this->admindisplay('manage/template/homepage/upload', $data);
    }

}
