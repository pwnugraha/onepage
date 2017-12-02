<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Banner extends AppBase {

    public function __construct() {
        parent::__construct();
        $this->load->add_package_path(APPPATH . 'third_party/blueimp_jfu/');
    }

    public function index() {
        $data['banner'] = $this->base_model->get_join_item('result', 'id_image, sort, section, page, autoload, name, dir', 'id_image ASC', 'banners', 'images', 'banners.id_image = images.id', 'inner');
        $this->admindisplay('manage/template/banner/index', $data);
    }

    public function load() {

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $options = [
                'script_url' => site_url('manage/media/image/load'),
                'upload_dir' => APPPATH . '../media/image/',
                'upload_url' => base_url('media/image/'),
                'accept_file_types' => '/\.(gif|jpe?g|png)$/i',
                'temp_save' => 'banner',
                'dir' => 'media/image/'
            ];
            //$this->load->library("uploadhandler", $options);
            $this->load->library("custom_uploadhandler", $options);
            $action = $this->base_model->get_item('result', 'images', 'id, temp', array('temp' => 'banner'));
            if ($action) {
                foreach ($action as $item) {
                    if ($item['temp'] == 'banner') {
                        $this->base_model->insert_item('banners', array('id_image' => $item['id']));
                        $this->base_model->update_item('images', array('temp' => NULL), array('id' => $item['id']));
                    }
                }
            }
        } else {
            redirect('manage/template/banner');
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
        $this->admindisplay('manage/template/banner/upload', $data);
    }

    public function edit($id = "") {
        $html = "";
        foreach ($this->build_opt['banner_page'] as $key => $value) {
            $html.= $key . ":" . json_encode($value) . ",";
        }
        $data['assets_footer'] = array(
            'asset_1' => '<script>$(function () {$(document).on("change", "#page", function () {if ($(this).val() == "") {$("#section").html("");}var page = {' . $html . '};for (var prop in page) {if (page.hasOwnProperty(prop)) {if ($(this).val() == prop) {var html = "";for (i = 1; i <= page[prop]; i++) {html += \'<option value = "\' + i + \'">Section \' + i + \'</option>\';$("#section").html(html);}break;}};}})})</script>'
        );
        if (!$this->base_model->get_item('row', 'banners', 'id', array('id_image' => $id))) {
            show_404();
        } else {
            $data['id_banner'] = $id;
        }
        $data['banner_page'] = $this->build_opt['banner_page'];
        $data['max_banner'] = $this->build_opt['max_banner'];
        $data['banner'] = $this->base_model->get_join_item('row', 'id_image, sort, section, page, autoload, name, dir', 'section ASC, sort ASC', 'banners', 'images', 'banners.id_image = images.id', 'inner', array('id_image' => $id));

        $this->form_validation->set_rules('page', 'Halaman', 'trim|required');
        $this->form_validation->set_rules('section', 'Bagian', 'trim|required');
        $this->form_validation->set_rules('sort', 'Urutan', 'trim|required|callback_sort_check');
        $this->form_validation->set_rules('autoload', 'Tampilkan', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $this->admindisplay('manage/template/banner/edit', $data);
        } else {
            $params = array(
                'section' => $this->input->post('section', TRUE),
                'page' => $this->input->post('page', TRUE),
                'sort' => $this->input->post('sort', TRUE),
                'autoload' => $this->input->post('autoload', TRUE),
            );
            $act = $this->base_model->update_item('banners', $params, array('id_image' => $id));
            if (!$act) {
                $this->_result_msg('danger', 'Gagal menyimpan data');
            } else {
                $this->_result_msg('success', 'Data berhasil diubah');
                //$data['page'] = $this->page->get_view_info($id);
            }
            redirect('manage/template/banner/edit/' . $id);
        }
    }

    public function delete($id) {
        $result = $this->base_model->delete_item('banners', array('id_image' => $id));
        if ($result) {
            $this->_result_msg('success', 'Data telah dihapus');
        } else {
            $this->_result_msg('danger', 'Gagal menghapus data');
        }
        redirect('manage/template/banner');
    }

    public function sort_check($sort) {
        $autoload  = $this->input->post('autoload');
        if ($autoload == 'yes') {
            if (!$this->base_model->get_item('row', 'banners', 'sort', array('sort' => $sort, 'section' => $this->input->post('section'), 'autoload' => $autoload))) {
                return TRUE;
            } else {
                $this->form_validation->set_message('sort_check', 'Urutan banner yang ditampilkan tidak boleh sama.');
                return FALSE;
            }
        } else {
            return TRUE;
        }
    }

}
