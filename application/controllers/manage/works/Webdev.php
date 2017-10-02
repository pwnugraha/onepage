<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Webdev extends AppBase {

    public function __construct() {
        parent::__construct();
        /* if($this->session->userdata('is_logged_in') ==1){
          redirect('form','refresh');
          } */
        $this->load->model('webdev_model', 'webdev');
    }

    public function product($type = "") {
        $data['type'] = $this->_webdev_type($type);
        $data['features'] = $this->webdev->get_webdev_fts($data['type']);
        if (isset($_GET['act']) && !empty($_GET['act'])) {
            if ($this->input->get('act', TRUE) === "c") {
                $get_params = array(
                    'new_feature' => $this->input->get('new_feature', TRUE),
                    'bronze_feature' => $this->input->get('bronze_feature', TRUE),
                    'silver_feature' => $this->input->get('silver_feature', TRUE),
                    'gold_feature' => $this->input->get('gold_feature', TRUE)
                );
                $this->form_validation->set_data($get_params);
                $this->form_validation->set_rules('new_feature', 'Fitur', 'trim|required|max_length[200]');
                $this->form_validation->set_rules('bronze_feature', 'Bronze', 'trim|required|max_length[200]');
                $this->form_validation->set_rules('silver_feature', 'Silver', 'trim|required|max_length[200]');
                $this->form_validation->set_rules('gold_feature', 'Gold', 'trim|required|max_length[200]');
                if ($this->form_validation->run() === FALSE) {
                    $this->admindisplay('manage/works/webdev/product', $data);
                } else {
                    $params = array(
                        'spec' => $this->input->get('new_feature', TRUE),
                        'bronze' => $this->input->get('bronze_feature', TRUE),
                        'silver' => $this->input->get('silver_feature', TRUE),
                        'gold' => $this->input->get('gold_feature', TRUE),
                        'type' => $data['type']
                    );
                    $this->webdev->create_fts($params);
                    $this->_result_msg('success', 'Fitur/Spesifikasi: ' . $this->input->get('new_feature', TRUE) . ' telah ditambahkan');
                    $data['features'] = $this->webdev->get_webdev_fts($data['type']);
                    redirect('manage/works/webdev/product/' . $data['type']);
                }
            } else {
                redirect('manage/works/webdev/product/' . $data['type']);
            }
        } else
        if (isset($_GET['act']) && empty($_GET['act'])) {
            redirect('manage/works/webdev/product/' . $data['type']);
        } else {
            $this->admindisplay('manage/works/webdev/product', $data);
        }
    }

    public function product_upd($type = "") {
        $data['type'] = $this->_webdev_type($type);
        $data['features'] = $this->webdev->get_webdev_fts($data['type']);
        if ($this->input->post('upd_fts', TRUE) && $this->input->post('c_fts', TRUE)) {
            $count = $this->input->post('c_fts');
            for ($i = 1; $i <= $count; $i++) {
                $this->form_validation->set_rules('id_fts_' . $i, 'id', 'trim|required');
                $this->form_validation->set_rules('bronze_' . $i, 'bronze', 'trim|required|max_length[200]');
                $this->form_validation->set_rules('silver_' . $i, 'silver', 'trim|required|max_length[200]');
                $this->form_validation->set_rules('gold_' . $i, 'gold', 'trim|required|max_length[200]');
            }
            if ($this->form_validation->run() === FALSE) {
                $this->admindisplay('manage/works/webdev/product_f', $data);
            } else {
                $params = array();
                for ($i = 1; $i <= $count; $i++) {
                    $arr = array($this->input->post('bronze_' . $i, TRUE), $this->input->post('silver_' . $i, TRUE), $this->input->post('gold_' . $i, TRUE), $this->input->post('id_fts_' . $i, TRUE),
                    );
                    array_push($params, $arr);
                }
                $this->webdev->upd_fts($params);
                $this->_result_msg('success', 'Data berhasil diubah');
                redirect('manage/works/webdev/product/' . $data['type']);
            }
        } else {
            redirect('manage/works/webdev/product/' . $data['type']);
        }
    }

    public function feature_edit($type = "") {
        $type = $this->_webdev_type($type);
        $this->form_validation->set_rules('fts_id', 'id', 'trim|required|numeric');
        $this->form_validation->set_rules('fts_edit', 'Fitur/Spesifikasi', 'trim|required|max_length[200]');
        if ($this->form_validation->run() === FALSE) {
            $this->_result_msg('danger', 'Gagal menyimpan data. Pastikan data diisi dengan benar');
            redirect('manage/works/webdev/product/' . $type);
        } else {
            $new_fts = $this->input->post('fts_edit', TRUE);
            $old_fts = $this->webdev->get_fts($this->input->post('fts_id', TRUE));
            if ($old_fts === FALSE) {
                $this->_result_msg('danger', 'Not found / an error occured');
                redirect('manage/works/webdev/product/' . $type);
            } else {
                $upd = $this->webdev->upd_fts_spec($this->input->post('fts_id', TRUE), $new_fts);
                if ($upd === TRUE) {
                    $this->_result_msg('success', 'Fitur/Spesifikasi: ' . $old_fts . ' telah diubah menjadi ' . $new_fts);
                    redirect('manage/works/webdev/product/' . $type);
                } else {
                    $this->_result_msg('danger', 'Gagal menyimpan data');
                    redirect('manage/works/webdev/product/' . $type);
                }
            }
        }
    }

    public function feature_delete($id, $type = "", $feature) {
        $type = $this->_webdev_type($type);
        $result = $this->webdev->delete_fts($id);
        if ($result === TRUE) {
            $this->_result_msg('success', 'Fitur/Spesifikasi: ' . $feature . ' telah dihapus');
            redirect('manage/works/webdev/product/' . $type);
        } else {
            $this->_result_msg('danger', 'Gagal menghapus data');
            redirect('manage/works/webdev/product/' . $type);
        }
    }

    function _webdev_type($type) {
        switch ($type) {
            case "company":
            case "shop":
            case "portal":
            case "blog":
            case "edu":
                return $type;
                break;
            case "":
                show_404();
            default:
                show_404();
                break;
        }
    }

}
