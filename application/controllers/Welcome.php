<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('base_model');
    }

    public function index() {
        $data['theme'] = $this->base_model->get_join_item('result', 'images.id, define, value, images.name, dir', 'define ASC', 'theme_settings', 'images', 'theme_settings.value = images.id', 'inner');
        $data['theme_contents'] = $this->base_model->get_item('result', 'theme_settings', 'value', array('define like' => '%homepage_editable_content%'), 'define ASC');
        $data['theme_contents_title'] = $this->base_model->get_item('result', 'theme_settings', 'value', array('define like' => '%homepage_content_title%', 'define ASC'));

        $data['banner_section_1'] = $this->base_model->get_join_item('result', 'images.name, dir', 'sort ASC', 'banners', 'images', 'banners.id_image = images.id', 'inner', array('section' => 1, 'autoload' => 'yes'));
        $data['banner_section_2'] = $this->base_model->get_join_item('result', 'images.name, dir', 'sort ASC', 'banners', 'images', 'banners.id_image = images.id', 'inner', array('section' => 2, 'autoload' => 'yes'));

        $this->load->view('theme/landing', $data);
    }

}
