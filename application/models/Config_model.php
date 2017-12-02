<?php

class Config_model extends CI_Model {

    function setting_edit($params) {
        foreach ($params as $key => $value) {
            $query = $this->db->query("update setting set value = '$value' where name = '$key' ");
        }
        return $query;
    }

    function upd_generalconfig($params) {
        foreach ($params as $key => $value) {
            $val = array(
                'value' => $value
            );
            $this->db->update('settings', $val, "name = '$key'");
        }
    }

    function get_setting() {
        $query = $this->db->select('name, value, autoload')->get('settings');
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_logo() {
        $query = $query = $this->db->select('value')->where('name', 'site_logo')->get('settings');
        if ($query->num_rows() == 1) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            show_404();
        }
    }

    function logo_upd($params) {
        $val = array(
          'value' => $params
        );
        $query = $this->db->update('settings', $val, "name = 'site_logo'");
        return $query;
    }

    function update_banner($params) {
        $query = $this->db->query("update setting set value = ? where name = ?", $params);
        return $query;
    }
    
    /*Information*/
    function get_config_info() {
        $query = $this->db->select('id, name, description, rel_url')->get('information');
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return FALSE;
        }
    }
    
    function get_view_config_info($id) {
        $query = $query = $this->db->select('id, name, description, rel_url')->where('id', $id)->get('information');
        if ($query->num_rows() == 1) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            show_404();
        }
    }
    function get_view_public_config_info($param) {
        $query = $query = $this->db->select('id, name, description, rel_url')->where('rel_url', $param)->get('information');
        if ($query->num_rows() == 1) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            show_404();
        }
    }

    function config_info_upd($params, $id) {
        $query = $this->db->set($params)->where('id', $id)->update('information');
        return $query;
    }

    function config_info_add($params) {
        $query = $this->db->insert('information', $params);
        return $query;
    }

    function delete_config_info($id) {
        $query = $this->db->delete('information', array('id' => $id));
        return $query;
    }


}
?>

