<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fileupload extends CI_Controller {
    public function index() {
        $config['upload_path']          = FCPATH . 'uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file_image')) {
            $error = array('error' => $this->upload->display_errors());

            //$this->load->view('upload_form', $error);
            echo json_encode($error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            // $this->load->view('upload_success', $data);
            echo json_encode($data);
        }
    }
}