<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Dashboard extends AppBase {

    public function __construct() {
        parent::__construct();
        $this->load->library('calendar');
        $this->load->library('pagination');
    }

    function index() {
        $this->admindisplay('manage/dashboard.php');
    }

    function _pagination_config($config) {
        $config['next_link'] = '&rsaquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lsaquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['last_link'] = '&raquo;';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '&laquo;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
    }

}
