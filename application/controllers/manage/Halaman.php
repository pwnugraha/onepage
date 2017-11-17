<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Information extends AppBase {

    public function __construct() {
        parent::__construct();
        /* if($this->session->userdata('is_logged_in') ==1){
          redirect('form','refresh');
          } */
        $this->load->model('page_model', 'page');
    }

    public function sendMail() {

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'lab.gomein@gmail.com';                 // SMTP username
            $mail->Password = 'gomelab26';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            //Recipients
            $mail->setFrom('lab.gomein@gmail.com', 'Mailer');
            $mail->addAddress('nugrahapwid@gmail.com');               // Name is optional
            $mail->addReplyTo('lab.gomein@gmail.com', 'Information');

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    public function index() {
        $data['page'] = $this->page->get_info('informasi');
        $this->admindisplay('manage/information', $data);
    }

    public function view($id = "") {
        if (is_numeric($id)) {
            $data['page'] = $this->page->get_view_info($id);
            $this->admindisplay('manage/information_edit', $data);
        } else {
            show_404();
        }
    }

    public function add() {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('ck_description_field', 'Deskripsi', 'trim');
        $this->form_validation->set_rules('rel_url', 'Link Halaman', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $this->admindisplay('manage/information_add');
        } else {

            $params = array(
                'title' => $this->input->post('title', TRUE),
                'description' => $this->input->post('ck_description_field', TRUE),
                'rel_url' => '/informasi/' . $this->input->post('rel_url', TRUE),
                'page_type' => 'informasi',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            );
            $act = $this->page->info_add($params);
            if (!$act) {
                $this->_result_msg('danger', 'Gagal menyimpan data');
            } else {
                $this->_result_msg('success', 'Data baru telah ditambahkan');
            }
            redirect('manage/information');
        }
    }

    public function edit($id = "") {
        if (!is_numeric($id)) {
            show_404();
        }
        $data['id_page'] = $id;
        $data['page'] = $this->page->get_view_info($id);
        $data['page']['rel_url'] = explode('/', $data['page']['rel_url']);
        if ($this->input->post('act', TRUE)) {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('ck_description_field', 'Deskripsi', 'trim');
            $this->form_validation->set_rules('rel_url', 'Link Halaman', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $this->admindisplay('manage/information_edit_f', $data);
            } else {
                $params = array(
                    'title' => $this->input->post('title', TRUE),
                    'description' => $this->input->post('ck_description_field', TRUE),
                    'rel_url' => '/informasi/'.$this->input->post('rel_url', TRUE),
                    'modified' => date('Y-m-d H:i:s'),
                );
                $act = $this->page->info_upd($params, $id);
                if (!$act) {
                    $this->_result_msg('danger', 'Gagal menyimpan data');
                } else {
                    $this->_result_msg('success', 'Data berhasil diubah');
                    //$data['page'] = $this->page->get_view_info($id);
                }
                redirect('manage/information/edit/' . $id);
            }
        } else {
            $this->admindisplay('manage/information_edit', $data);
        }
    }

    public function delete($id) {
        $result = $this->page->delete_info($id);
        if ($result === TRUE) {
            $this->_result_msg('success', 'Data telah dihapus');
        } else {
            $this->_result_msg('danger', 'Gagal menghapus data');
        }
        redirect('manage/information');
    }

}
