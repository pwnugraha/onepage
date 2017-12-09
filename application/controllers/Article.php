<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/Base.php';

class Article extends AppBaseSite {

    public function __construct() {

        parent::__construct();
    }

    public function index() {
        $setting = $this->base_model->get_item('result', 'settings', 'name, value');
        foreach ($setting as $v) {
            $data['sites'][$v['name']] = $v['value'];
        }
        $data['brand'] = $this->base_model->get_join_item('row', 'media.id, value, autoload, media.name, dir, title, description', NULL, 'settings', 'media', 'settings.value = media.id', 'inner');
        $data['theme'] = $this->base_model->get_join_item('result', 'media.id, define, value, media.name, dir', 'define ASC', 'theme_settings', 'media', 'theme_settings.value = media.id', 'inner');
        $data['theme_contents'] = $this->base_model->get_item('result', 'theme_settings', 'value', array('define like' => '%homepage_editable_content%'), 'define ASC');
        $data['theme_contents_title'] = $this->base_model->get_item('result', 'theme_settings', 'value', array('define like' => '%homepage_content_title%', 'define ASC'));

        $data['banner_section_1'] = $this->base_model->get_join_item('result', 'media.name, dir', 'sort ASC', 'banners', 'media', 'banners.media_id = media.id', 'inner', array('section' => 1, 'autoload' => 'yes'));
        $data['banner_section_2'] = $this->base_model->get_join_item('result', 'media.name, dir', 'sort ASC', 'banners', 'media', 'banners.media_id = media.id', 'inner', array('section' => 2, 'autoload' => 'yes'));
        
        $data['articles'] = $this->base_model->get_join_item('result', 'posts.*, media.title as media_title, media.alt_text, media.dir, media.name', 'posts.id DESC', 'posts', 'media', 'posts.image=media.id', 'left', array('page_type' => 'article'));

        $this->siteview('theme/article', $data);
    }

}
