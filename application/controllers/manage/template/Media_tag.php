<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Media_tag extends AppBase {

    function __construct() {
        parent::__construct();
    }

    public function show($media_type = NULL) {

        if ($media_type == 'video') {
            $data['media'] = $this->base_model->get_join_item('result', 'media.*, media_tags.tag', 'media.id DESC', 'media', 'media_tags', 'media.id=media_tags.media_id', 'left', array('media_type' => 'video'));
        } else if ($media_type == 'image') {
            $data['media'] = $this->base_model->get_join_item('result', 'media.*, media_tags.tag', 'media.id DESC', 'media', 'media_tags', 'media.id=media_tags.media_id', 'left', array('media_type' => 'image', 'dir' => 'media/image/'));
        } else {
            show_404();
        }
        $data['media_type'] = $media_type;

        $this->form_validation->set_rules('tag', 'Nama Tag', 'trim');
        $this->form_validation->set_rules('id', 'id', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $this->admindisplay('manage/template/media_tag/index', $data);
        } else {
            if (!$this->base_model->get_item('row', 'media', NULL, array('id' => $this->input->post('id', TRUE)))) {
                show_404();
            }
            $params = array(
                'media_id' => $this->input->post('id', TRUE),
                'tag' => $this->input->post('tag', TRUE),
            );
            if (!$this->base_model->delete_item('media_tags', array('media_id' => $this->input->post('id', TRUE)))) {
                $this->_result_msg('danger', 'Gagal menyimpan data');
            } else {
                $act = $this->base_model->insert_item('media_tags', $params);
                if (!$act) {
                    $this->_result_msg('danger', 'Gagal menyimpan data');
                } else {
                    $this->_result_msg('success', 'Data berhasil diubah');
                }
            }
            redirect('manage/template/media_tag/show/' . $media_type);
        }
    }

}
