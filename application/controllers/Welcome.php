<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/Base.php';

class Welcome extends AppBaseSite {

    public function __construct() {

        parent::__construct();
    }

    public function index() {

        $data['theme_contents'] = $this->base_model->get_item('result', 'theme_settings', 'value', array('define like' => '%homepage_editable_content%'), 'define ASC');
        $data['theme_contents_title'] = $this->base_model->get_item('result', 'theme_settings', 'value', array('define like' => '%homepage_content_title%', 'define ASC'));
        $data['theme_homepage_video'] = $this->base_model->get_item('result', 'theme_settings', 'value', array('define like' => '%homepage_video%', 'define ASC'));

        $data['banner_section_1'] = $this->base_model->get_join_item('result', 'media.name, dir', 'sort ASC', 'banners', 'media', 'banners.media_id = media.id', 'inner', array('section' => 1, 'autoload' => 'yes'));
        $data['banner_section_2'] = $this->base_model->get_join_item('result', 'media.name, dir', 'sort ASC', 'banners', 'media', 'banners.media_id = media.id', 'inner', array('section' => 2, 'autoload' => 'yes'));

        //for genpi
        $data['articles'] = $this->base_model->get_join_item('result', 'posts.*, media.title as media_title, media.alt_text, media.dir, media.name, media.caption', 'posts.id DESC', 'posts', 'media', 'posts.image=media.id', 'left', array('post_type' => 'article','publish'=>'yes'), 5);
        $data['event'] = $this->base_model->get_join_item('row', 'posts.*, media.title as media_title, media.alt_text, media.dir, media.name, media.caption', 'posts.id DESC', 'posts', 'media', 'posts.image=media.id', 'left', array('post_type' => 'event','publish'=>'yes'), 1);
        $data['video'] = $this->base_model->get_item('row', 'media', 'description', array('media_type' => 'video'), 'media.id DESC', 1);
        $data['image'] = $this->base_model->get_item('result', 'media', NULL, array('media_type' => 'image', 'dir'=>'media/image/'));
        $data['partners'] = $this->base_model->get_item('result', 'media', NULL, array('media_type' => 'image', 'dir'=>'media/partner/'));
        //$this->siteview('theme/landing', $data);
        $this->siteview('theme/genpi/index', $data);
    }

}
