<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Article extends AppBase {

    public function __construct() {
        parent::__construct();
        $this->load->add_package_path(APPPATH . 'third_party/blueimp_jfu/');
    }

    public function index() {
        $data['page'] = $this->base_model->get_join_item('result', 'posts.*, first_name, last_name', 'posts.id DESC', 'posts', 'users', 'posts.user_id=users.id', 'left', array('page_type' => 'article'));
        $this->admindisplay('manage/information/article/article', $data);
    }

    public function _manage_tags($param, $id) {
        $this->base_model->delete_item('posts_terms', array('post_id' => $id));
        $param = explode(',', trim($param, ' ,'));
        foreach ($param as $value) {
            $value = trim(strtolower($value));
            $tag = $this->base_model->get_item('row', 'terms', 'id', array('name' => $value, 'type' => 'tag'));
            if (!$tag) {
                $data = array(
                    'name' => $value,
                    'rel_url' => url_title($value, '-', TRUE),
                    'type' => 'tag'
                );
                $add = $this->base_model->insert_item('terms', $data, 'id');
                $this->base_model->insert_item('posts_terms', array('post_id' => $id, 'term_id' => $add));
                echo "1";
            } else {
                if (!$this->base_model->get_item('row', 'posts_terms', '*', array('post_id' => $id, 'term_id' => $tag['id']))) {
                    $this->base_model->insert_item('posts_terms', array('post_id' => $id, 'term_id' => $tag['id']));
                }
            }
        }
    }

    public function add() {

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $options = [
                'script_url' => site_url('manage/media/image/load'),
                'upload_dir' => APPPATH . '../media/image/',
                'upload_url' => base_url('media/image/'),
                'accept_file_types' => '/\.(gif|jpe?g|png)$/i',
                'max_file_size' => 2000000,
                'temp_save' => NULL,
                'dir' => 'media/image/',
                'media_type' => 'image',
                'user' => $this->ion_auth->user()->row()->id
            ];
            //$this->load->library("uploadhandler", $options);
            $this->load->library("custom_uploadhandler", $options);
        } else {
            $assets = $this->_assets();
            $data['assets_header'] = $assets['assets_header'];
            $data['assets_footer'] = $assets['assets_footer'];
            $media_id = NULL;

            if ($this->input->post('media_update', TRUE)) {
                $media_id = $this->input->post('media_update', TRUE);
                $data['media_src'] = $this->base_model->get_item('row', 'media', 'id, name, dir', array('id' => $this->input->post('media_update', TRUE)));
                if (!$data['media_src']) {
                    show_404();
                }
            } else {
                if ($this->input->post('media_id', TRUE)) {
                    $media_id = $this->input->post('media_id', TRUE);
                    $data['media_src'] = $this->base_model->get_item('row', 'media', 'id, name, dir', array('id' => $this->input->post('media_id', TRUE)));
                    if (!$data['media_src']) {
                        show_404();
                    }
                }
            }

            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('ck_description_field', 'Deskripsi', 'trim');
            $this->form_validation->set_rules('tags', 'Tags', 'trim');
            $this->form_validation->set_rules('save_as', 'Simpan', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $this->admindisplay('manage/information/article/article_add', $data);
            } else {
                $slug = $this->_create_slug($this->input->post('title', TRUE));
                $params = array(
                    'user_id' => $this->ion_auth->user()->row()->id,
                    'title' => $this->input->post('title', TRUE),
                    'description' => $this->input->post('ck_description_field', TRUE),
                    'rel_url' => $slug,
                    'page_type' => 'article',
                    'publish' => $this->input->post('save_as', TRUE),
                    'created' => date('Y-m-d H:i:s'),
                    'modified' => date('Y-m-d H:i:s'),
                );
                $params['image'] = (($media_id) ? $media_id : NULL);
                $act = $this->base_model->insert_item('posts', $params, 'id');
                if (!$act) {
                    $this->_result_msg('danger', 'Gagal menyimpan data');
                } else {
                    $tags = $this->_manage_tags($this->input->post('tags', TRUE), $act);
                    $this->_result_msg('success', 'Data baru telah ditambahkan');
                }
                redirect('manage/information/article');
            }
        }
    }

    public function edit($id = "") {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $options = [
                'script_url' => site_url('manage/media/image/load'),
                'upload_dir' => APPPATH . '../media/image/',
                'upload_url' => base_url('media/image/'),
                'accept_file_types' => '/\.(gif|jpe?g|png)$/i',
                'max_file_size' => 2000000,
                'temp_save' => NULL,
                'dir' => 'media/image/',
                'media_type' => 'image',
                'user' => $this->ion_auth->user()->row()->id
            ];
            //$this->load->library("uploadhandler", $options);
            $this->load->library("custom_uploadhandler", $options);
        } else {
            $assets = $this->_assets();
            $data['assets_header'] = $assets['assets_header'];
            $data['assets_footer'] = $assets['assets_footer'];
            $media_id = NULL;

            $data['page'] = $this->base_model->get_item('row', 'posts', '*', array('page_type' => 'article', 'id' => $id));
            if (!$data['page']) {
                show_404();
            }

            if ($this->input->post('media_update', TRUE)) {
                $media_id = $this->input->post('media_update', TRUE);
                $data['media_src'] = $this->base_model->get_item('row', 'media', 'id, name, dir', array('id' => $this->input->post('media_update', TRUE)));
                if (!$data['media_src']) {
                    show_404();
                }
            } else {
                if ($this->input->post('media_id', TRUE)) {
                    $media_id = $this->input->post('media_id', TRUE);
                    $data['media_src'] = $this->base_model->get_item('row', 'media', 'id, name, dir', array('id' => $this->input->post('media_id', TRUE)));
                    if (!$data['media_src']) {
                        show_404();
                    }
                } else {
                    $data['media_src'] = $this->base_model->get_item('row', 'media', 'id, name, dir', array('id' => $data['page']['image']));
                }
            }

            $data['id_page'] = $id;
            $data['author'] = $this->base_model->get_item('row', 'users', 'first_name, last_name', array('id' => $data['page']['user_id']));
            $data['tags'] = $this->base_model->get_join_item('result', 'terms.name', NULL, 'terms', 'posts_terms', 'terms.id = posts_terms.term_id', 'inner', array('post_id' => $id));
            if ($this->input->post('act', TRUE)) {
                $this->form_validation->set_rules('title', 'Title', 'trim|required');
                $this->form_validation->set_rules('ck_description_field', 'Deskripsi', 'trim');
                $this->form_validation->set_rules('tags', 'Tags', 'trim');
                $this->form_validation->set_rules('rel_url', 'Link Halaman', 'trim|callback_slug_check');
                $this->form_validation->set_rules('save_as', 'Simpan', 'trim|required');

                if ($this->form_validation->run() === FALSE) {
                    $this->admindisplay('manage/information/article/article_edit_f', $data);
                } else {
                    $params = array(
                        'title' => $this->input->post('title', TRUE),
                        'description' => $this->input->post('ck_description_field', TRUE),
                        'rel_url' => $this->input->post('rel_url', TRUE),
                        'publish' => $this->input->post('save_as', TRUE),
                        'modified' => date('Y-m-d H:i:s'),
                    );
                    $params['image'] = (($media_id) ? $media_id : $data['page']['image']);
                    $act = $this->base_model->update_item('posts', $params, array('id' => $id));
                    if (!$act) {
                        $this->_result_msg('danger', 'Gagal menyimpan data');
                    } else {
                        $tags = $this->_manage_tags($this->input->post('tags', TRUE), $id);
                        $this->_result_msg('success', 'Data berhasil diubah');
                    }
                    redirect('manage/information/article/edit/' . $id);
                }
            } else {
                $this->admindisplay('manage/information/article/article_edit', $data);
            }
        }
    }

    public function delete($id) {
        if (!$this->base_model->get_item('row', 'posts', 'id', array('id' => $id))) {
            $this->_result_msg('danger', 'Gagal menghapus data');
        } else {
            $result = $this->base_model->delete_item('posts', array('id' => $id));
            if ($result) {
                $this->_result_msg('success', 'Data telah dihapus');
            } else {
                $this->_result_msg('danger', 'Gagal menghapus data');
            }
        }
        redirect('manage/information/article');
    }

    public function delete_all() {
        $data = $this->input->post('pcheck');
        if (!empty($data)) {
            foreach ($data as $value) {
                if (!$this->base_model->get_item('row', 'posts', 'id', array('id' => $value))) {
                    $this->_result_msg('danger', 'Gagal menghapus data');
                    redirect('manage/information/article');
                } else {
                    $result = $this->base_model->delete_item('posts', array('id' => $value));
                    if ($result) {
                        $this->_result_msg('success', 'Data telah dihapus');
                    } else {
                        $this->_result_msg('danger', 'Gagal menghapus data');
                    }
                }
            }
        } else {
            $this->_result_msg('danger', 'Tidak ada data yang dipilih');
        }
        redirect('manage/information/article');
    }

    public function _assets() {
        $data['assets_header'] = array(
            'asset_2' => '<link href="' . base_url() . 'assets/blueimp/css/jquery.fileupload.css" rel="stylesheet">',
            'asset_3' => '<link href="' . base_url() . 'assets/blueimp/css/jquery.fileupload-ui.css" rel="stylesheet">',
        );
        $data['assets_footer'] = array(
            'asset_1' => '<script src="' . base_url() . 'assets/blueimp/js/vendor/jquery.ui.widget.js"></script>',
            'asset_2' => '<script src="' . base_url() . 'assets/blueimp/js/blueimp/tmpl.min.js"></script>',
            'asset_3' => '<script src="' . base_url() . 'assets/blueimp/js/blueimp/load-image.all.min.js"></script>',
            'asset_4' => '<script src="' . base_url() . 'assets/blueimp/js/blueimp/canvas-to-blob.min.js"></script>',
            'asset_5' => '<script src="' . base_url() . 'assets/blueimp/js/jquery.iframe-transport.js"></script>',
            'asset_6' => '<script src="' . base_url() . 'assets/blueimp/js/jquery.fileupload.js"></script>',
            'asset_7' => '<script src="' . base_url() . 'assets/blueimp/js/jquery.fileupload-process.js"></script>',
            'asset_8' => '<script src="' . base_url() . 'assets/blueimp/js/jquery.fileupload-image.js"></script>',
            'asset_9' => '<script src="' . base_url() . 'assets/blueimp/js/jquery.fileupload-validate.js"></script>',
            'asset_10' => '<script src="' . base_url() . 'assets/blueimp/js/jquery.fileupload-ui.js"></script>',
            'asset_11' => '<script src="' . base_url() . 'assets/blueimp/js/main.js"></script>',
            'asset_12' => '<script>CKEDITOR.replace(\'ck_description_field\', {height:300});</script>',
        );
        return $data;
    }

    public function _create_slug($title) {
        $slug = url_title($title, '-', TRUE);
        $check = $this->base_model->get_item('row', 'posts', 'rel_url', array('rel_url like' => '%' . $slug . '%'), 'rel_url DESC', 1);
        if (!$check) {
            return $slug;
        } else {
            $url = str_replace($slug, '', $check['rel_url']);
            if ($url == '') {
                return $slug . '-2';
            } else {
                $num = explode('-', $url);
                $num = (int) $num[1] + 1;
                return $slug . '-' . $num;
            }
        }
    }

    public function slug_check() {
        if (!$this->input->post('rel_url')) {
            show_404();
        }
        $rel_url = $this->input->post('rel_url');
        if (!$this->base_model->get_item('row', 'posts', 'rel_url', array('rel_url' => $rel_url, 'id NOT IN (' . $this->input->post('id') . ')' => NULL))) {
            return TRUE;
        } else {
            $this->form_validation->set_message('slug_check', 'Link telah digunakan. Masukkan link yang lain.');
            return FALSE;
        }
    }

}
