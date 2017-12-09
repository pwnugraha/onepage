<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AppBaseSite extends CI_Controller {

    public function __construct() {
        
        parent::__construct();
        $this->load->model('base_model');
    }

    public function siteview($child_view = "", $data = array()) {
        $data['child_template'] = $child_view;
        $this->load->view('theme/base.php', $data);
    }

}
