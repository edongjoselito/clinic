<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplete extends CI_Controller {

 public function __construct(){
  parent::__construct();
  if (!$this->session->userdata('logged_in')) {
   if ($this->input->is_ajax_request()) {
    $this->output->set_status_header(401);
    exit;
   }
   redirect(base_url().'Pages/log_in');
   exit;
  }
 }

 function index()
 {
  $this->load->view('Pages/autocomplete_view') ;
 }
 function fetch()
 {
  $this->load->model('autocomplete_model');
  echo $this->autocomplete_model->fetch_data($this->uri->segment(3));
 }
}
?>