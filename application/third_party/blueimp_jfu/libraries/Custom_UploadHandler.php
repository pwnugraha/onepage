<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/third_party/blueimp_jfu/libraries/UploadHandler.php';

class Custom_UploadHandler extends UploadHandler {

    public function __construct($options = null) {
        $this->options = $options;
        parent::__construct($options);
    }

    protected function initialize() {
        parent::initialize();
    }

    protected function handle_form_data($file, $index) {
        // $file->title = @$_REQUEST['title'][$index];
        //$file->description = @$_REQUEST['description'][$index];
    }

    public function handle_file_upload($uploaded_file, $name, $size, $type, $error, $index = null, $content_range = null) {
        $CI = &get_instance();
        $CI->load->model('upload_handler_model');
        $file = parent::handle_file_upload(
                        $uploaded_file, $name, $size, $type, $error, $index, $content_range
        );
        if (empty($file->error)) {
            $action = $CI->upload_handler_model->add($file, $this->options['temp_save'], $this->options['dir']);
            $file->id = $action;
        }
        return $file;
    }

    protected function set_additional_file_properties($file) {
        $CI = &get_instance();
        $CI->load->model('upload_handler_model');
        parent::set_additional_file_properties($file);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $action = $CI->upload_handler_model->get_item($file->name);

            $file->id = $action['id'];
            $file->type = $action['type'];
            //$file->title = $action['title'];
            //$file->description = $action['description'];
        }
    }

//    public function delete($print_response = true) {
//        $CI = &get_instance();
//        $CI->load->model('upload_handler_model');
//        $response = parent::delete(false);
//        foreach ($response as $name => $deleted) {
//            if ($deleted) {
//                $action = $CI->upload_handler_model->delete_item($name);
//            }
//        }
//        return $this->generate_response($response, $print_response);
//    }
}
