<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/Base.php';

class Welcome extends AppBaseSite {

    public function __construct() {

        parent::__construct();
    }
    
    
    function _remap() {
        $segment_1 = $this->uri->segment(1);

        switch (strtolower($segment_1)) {
            case 'welcome':
                redirect();
            case 'article':
            case 'event':
            case 'portofolio':
            case 'service':
                $this->_posts($segment_1);
                break;
            case 'image':
                $this->_image();
                break;
            case 'video':
                $this->_video();
                break;
            case null:
                $this->index();
                break;
            default:
                $this->_post($segment_1);
                break;
        }
    }

    public function index() {

        $data['theme_contents'] = $this->base_model->get_item('result', 'theme_settings', 'value', array('define like' => '%homepage_editable_content%'), 'define ASC');
        $data['theme_contents_title'] = $this->base_model->get_item('result', 'theme_settings', 'value', array('define like' => '%homepage_content_title%', 'define ASC'));
        $data['theme_homepage_video'] = $this->base_model->get_item('result', 'theme_settings', 'value', array('define like' => '%homepage_video%', 'define ASC'));

        $data['banner_section_1'] = $this->base_model->get_join_item('result', 'media.name, dir', 'sort ASC', 'banners', 'media', 'banners.media_id = media.id', 'inner', array('section' => 1, 'autoload' => 'yes'));
        $data['banner_section_2'] = $this->base_model->get_join_item('result', 'media.name, dir', 'sort ASC', 'banners', 'media', 'banners.media_id = media.id', 'inner', array('section' => 2, 'autoload' => 'yes'));
        //for laundry-in
        $data['article'] = $this->base_model->get_item('row', 'posts', 'description, rel_url', array('post_type' => 'article', 'publish' => 'yes'), 'posts.id DESC', 1);
        $this->siteview('theme/landing', $data);
        //for genpi
        $data['articles'] = $this->base_model->get_join_item('result', 'posts.*, media.title as media_title, media.alt_text, media.dir, media.name, media.caption', 'posts.id DESC', 'posts', 'media', 'posts.image=media.id', 'left', array('post_type' => 'article', 'publish' => 'yes'), 5);
        $data['event'] = $this->base_model->get_join_item('row', 'posts.*, media.title as media_title, media.alt_text, media.dir, media.name, media.caption', 'posts.id DESC', 'posts', 'media', 'posts.image=media.id', 'left', array('post_type' => 'event', 'publish' => 'yes'), 1);
        $data['video'] = $this->base_model->get_item('row', 'media', 'description', array('media_type' => 'video'), 'media.id DESC', 1);
        $data['image'] = $this->base_model->get_item('result', 'media', NULL, array('media_type' => 'image', 'dir' => 'media/image/'));
        $data['partners'] = $this->base_model->get_item('result', 'media', NULL, array('media_type' => 'image', 'dir' => 'media/partner/'));

        //$this->siteview('theme/genpi/index', $data);
    }
    
     public function _posts($uri) {
          //for laundry-in
        $data['article'] = $this->base_model->get_item('row', 'posts', 'description, rel_url', array('post_type' => 'article', 'publish' => 'yes'), 'posts.id DESC', 1);
        $data['theme_contents'] = $this->base_model->get_item('result', 'theme_settings', 'value', array('define like' => '%homepage_editable_content%'), 'define ASC');
        $data['theme_contents_title'] = $this->base_model->get_item('result', 'theme_settings', 'value', array('define like' => '%homepage_content_title%', 'define ASC'));

        $data['banner_section_1'] = $this->base_model->get_join_item('result', 'media.name, dir', 'sort ASC', 'banners', 'media', 'banners.media_id = media.id', 'inner', array('section' => 1, 'autoload' => 'yes'));
        $data['banner_section_2'] = $this->base_model->get_join_item('result', 'media.name, dir', 'sort ASC', 'banners', 'media', 'banners.media_id = media.id', 'inner', array('section' => 2, 'autoload' => 'yes'));

        $data['posts'] = $this->base_model->get_join_item('result', 'posts.*, media.title as media_title, media.alt_text, media.dir, media.name', 'posts.id DESC', 'posts', 'media', 'posts.image=media.id', 'left', array('post_type' => $uri, 'publish' => 'yes'));

        //$this->siteview('theme/article', $data);
        //genpi
        $this->siteview('theme/genpi/' . $uri, $data);
    }

    public function _post($uri) {
         //for laundry-in
        $data['article'] = $this->base_model->get_item('row', 'posts', 'description, rel_url', array('post_type' => 'article', 'publish' => 'yes'), 'posts.id DESC', 1);
        $data['post'] = $this->base_model->get_join_item('row', 'posts.*, media.title as media_title, media.alt_text, media.dir, media.name', NULL, 'posts', 'media', 'posts.image=media.id', 'left', array('rel_url' => $uri));
        if ($data['post']) {
            $this->siteview('theme/content', $data, TRUE, $data['post']['post_type']);
            //$this->siteview('theme/genpi/content', $data, TRUE, $data['post']['post_type']);
        } else {
            show_404();
        }
    }

    //for image and video gallery
    public function _image() {
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

        //for genpi
        $data['media'] = $this->base_model->get_join_item('result', 'media.*, media_tags.tag', 'media.id DESC', 'media', 'media_tags', 'media.id=media_tags.media_id', 'left', array('media_type' => 'image', 'dir' => 'media/image/'));
        //$this->siteview('theme/landing', $data);
        $this->siteview('theme/genpi/image', $data);
    }

    public function _video() {
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

        //for genpi
        $data['media'] = $this->base_model->get_join_item('result', 'media.*, media_tags.tag', 'media.id DESC', 'media', 'media_tags', 'media.id=media_tags.media_id', 'left', array('media_type' => 'video'));
        //$this->siteview('theme/landing', $data);
        $this->siteview('theme/genpi/video', $data);
    }

}
