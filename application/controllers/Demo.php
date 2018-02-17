<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/Base.php';

class Demo extends AppBaseSite {

    public function __construct() {

        parent::__construct();
    }
    
    public function theme($name, $page = NULL) {
        $page = (!isset($page))?'index':$page;
        $data['theme'] = $name;
        $this->load->view('theme/'.$name.'/'.$page, $data);
    }
}
