<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/Base.php';

class Informasi extends AppBaseSite {

    public function __construct() {

        parent::__construct();
    }

    public function read($uri) {

        $data['post'] = $this->base_model->get_join_item('row', 'posts.*, media.title as media_title, media.alt_text, media.dir, media.name', NULL, 'posts', 'media', 'posts.image=media.id', 'left', array('rel_url' => $uri));
        //$this->siteview('theme/content', $data);
        //genpi
        $this->siteview('theme/genpi/content', $data);
    }

}
