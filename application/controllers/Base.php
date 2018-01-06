<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AppBaseSite extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('base_model');
        $this->config->load('build_opt', TRUE);
        $this->build_opt = $this->config->item('build_opt');
    }


    public function siteview($child_view = "", $data = array(), $post_status = FALSE, $post_type = NULL) {
        //appBaseData
        $setting = $this->base_model->get_item('result', 'settings', 'name, value');
        foreach ($setting as $v) {
            $data['sites'][$v['name']] = $v['value'];
        }
        $data['brand'] = $this->base_model->get_join_item('row', 'media.id, value, autoload, media.name, dir, title, description', NULL, 'settings', 'media', 'settings.value = media.id', 'inner');
        $data['theme'] = $this->base_model->get_join_item('result', 'media.id, define, value, media.name, dir', 'define ASC', 'theme_settings', 'media', 'theme_settings.value = media.id', 'inner');

        $data['pages'] = $this->base_model->get_item('result', 'posts', 'title, rel_url', array('post_type' => 'page', 'publish' => 'yes'));
        $data['post_status'] = $post_status;
        $data['post_type'] = $post_type;
        $data['child_template'] = $child_view;
        $this->load->view('theme/base.php', $data);
        //$this->load->view('theme/genpi/base.php', $data);
    }

}
