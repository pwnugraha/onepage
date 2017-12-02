<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_handler_model extends CI_Model {

    public function add($param, $temp, $dir) {
        $data = array(
            'name' => $param->name,
            'size' => $param->size,
            'type' => $param->type,
            'temp' => $temp,
            'dir'  => $dir,
            'created'  => date('Y-m-d H:i:s'),
            'modified'  => date('Y-m-d H:i:s')
//            'title' => $param->title,
//            'description' => $param->description
        );
        $query = $this->db->insert('images', $data);
        if ($query) {
            $param->id = $this->db->insert_id();
            return $param->id;
        } else {
            show_404(); //should be changed with corresponding error page
        }
    }

    public function get_item($file_name) {
        $query = $this->db->select('id', 'type')->where('name', $file_name)->get('images');
        if ($query->num_rows() == 1) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            show_404(); //should be changed with corresponding error page
        }
    }
    
    public function delete_item($file_name) {
        $query = $this->db->delete('images', array('name' => $file_name));
        return $query;
    }

}
