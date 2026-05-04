<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url().'Pages/log_in');
            exit;
        }
    }

    public function vm_upload(){

        $page = "uploads";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Upload"; 

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
    }
    
    public function upload_file(){
        $config['allowed_types'] = 'jpg|png';
        $config['upload_path'] = './uploads/';
        $this->load->library('upload', $config);

        if($this->upload->do_upload('image')){
            print_r($this->upload->data());
        }else{
            print_r($this->upload->display_errors()); 
        }
    }





}

?>