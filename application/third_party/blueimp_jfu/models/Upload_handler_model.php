<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_handler_model extends CI_Model {

    public function insert_item($param, $temp, $dir, $type, $user) {
        $data = array(
            'user_id' => $user,
            'name' => $param->name,
            'size' => $param->size,
            'type' => $param->type,
            'temp' => $temp,
            'dir'  => $dir,
            'alt_text' => 'image',
            'media_type' => $type,
            'created'  => date('Y-m-d H:i:s'),
            'modified'  => date('Y-m-d H:i:s'),
//            'title' => $param->title,
//            'description' => $param->description
        );
        $query = $this->db->insert('media', $data);
        if ($query) {
            $param->id = $this->db->insert_id();
            return $param->id;
        } else {
            show_404(); //should be changed with corresponding error page
        }
    }

    public function get_item($file_name) {
        $query = $this->db->select('id', 'type')->where('name', $file_name)->get('media');
        if ($query->num_rows() == 1) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            show_404(); //should be changed with corresponding error page
        }
    }
    
    public function delete_item($file_name) {
        $query = $this->db->delete('media', array('name' => $file_name));
        return $query;
    }

}
