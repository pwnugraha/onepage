<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Redefine extends AppBase {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->build_opt['homepage_background_template'] > 0) {
            for ($i = 0; $i < $this->build_opt['homepage_background_template']; $i++) {
                $params = array(
                    'define' => 'homepage_background_template_' . $i,
                );
                if (!$this->base_model->get_item('row', 'theme_settings', 'define', array('define' => $params['define']))) {
                    $this->base_model->insert_item('theme_settings', $params);
                }
            }
        }
        if ($this->build_opt['homepage_editable_content'] > 0) {
            for ($i = 0; $i < $this->build_opt['homepage_editable_content']; $i++) {
                $params = array(
                    'define' => 'homepage_editable_content_' . $i,
                );
                if (!$this->base_model->get_item('row', 'theme_settings', 'define', array('define' => $params['define']))) {
                    $this->base_model->insert_item('theme_settings', $params);
                }
            }
        }
        if ($this->build_opt['homepage_content_title'] > 0) {
            for ($i = 0; $i < $this->build_opt['homepage_content_title']; $i++) {
                $params = array(
                    'define' => 'homepage_content_title_' . $i,
                );
                if (!$this->base_model->get_item('row', 'theme_settings', 'define', array('define' => $params['define']))) {
                    $this->base_model->insert_item('theme_settings', $params);
                }
            }
        }
        if ($this->build_opt['homepage_video'] > 0) {
            for ($i = 0; $i < $this->build_opt['homepage_video']; $i++) {
                $params = array(
                    'define' => 'homepage_video_' . $i,
                );
                if (!$this->base_model->get_item('row', 'theme_settings', 'define', array('define' => $params['define']))) {
                    $this->base_model->insert_item('theme_settings', $params);
                }
            }
        }
        redirect('manage/dashboard');
    }

}
