<?php

class Pages extends CI_Controller{
    

    public function view(){

             $page = "dashboard";

             $data['app'] = $this->Page_model->count_with_cond('appointment','visible',0);
             $data['user'] = $this->Page_model->count_all('users');
             $data['item'] = $this->Page_model->count_all('items');
             $data['ref'] = $this->Page_model->count_all('referrals');
             

            $this->load->view('templates/header');
            $this->load->view('templates/menu');
            $this->load->view('Pages/'.$page,$data);
            $this->load->view('templates/footer');

    } 

    public function users_list(){

        

        $page = "users_list";

        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        if($this->input->post('edit')){
            $this->Page_model->change_pass();
            $this->session->set_flashdata('save', 'Successfully Saved');
            redirect(base_url().'Pages/users_list');
        }

        $data['data'] = $this->Page_model->no_cond_loop('users');

       $this->load->view('templates/header');
       $this->load->view('templates/menu');
       $this->load->view('Pages/'.$page,$data);
       $this->load->view('templates/footer');

    } 
    public function patient_list(){

        $page = "patient_list";
        //$data['data'] = $this->Page_model->get_limited_col('id, first_name, middle_name, last_name, sitio, barangay, city_mun, province','patients');
        $data['data'] = $this->Page_model->no_cond_loop_with_limit('patients',100);

    $this->load->view('templates/header');
    $this->load->view('templates/menu');
    $this->load->view('Pages/'.$page,$data);
    $this->load->view('templates/footer');

    } 
    public function patient_add(){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ','</div>');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        //$this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');

        $page = "patient_new";

        if($this->form_validation->run() == FALSE){

        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Add New Patient"; 

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');

        }else{

            $this->Page_model->insert_patient();
            $this->session->set_flashdata('success', ' Successfully saved.');
            redirect(base_url().'Pages/patient_list');
        
            
        } 
    }
    
    public function patient_profile($param){

        

        $page = "patient_profile";

        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['p'] = $this->Page_model->one_cond_get_single_row('patients','id',$param);
        $data['app'] = $this->Page_model->one_cond_get_single_row('appointment','patient_id',$param);

        $data['diag'] = $this->Page_model->one_cond_loop('diagnose','patient_id',$param);


       $this->load->view('templates/header');
       $this->load->view('templates/menu');
       $this->load->view('Pages/'.$page,$data);
       $this->load->view('templates/footer');

    } 

    public function patient_edit($param){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ','</div>');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        //$this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');

        $page = "patient_update";

        if($this->form_validation->run() == FALSE){

        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Add New Patient"; 
        $data['p'] = $this->Page_model->one_cond_get_single_row('patients','id',$param);

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');

        }else{

            $this->Page_model->update_patient();
            $this->session->set_flashdata('success', ' Successfully Update.');
            redirect(base_url().'Pages/patient_list');
        
            
        } 
    }

    public function patient_queue(){
        date_default_timezone_set('Asia/Manila'); # add your city to set local time zone

        $page = "patient_queue";
        $data['data'] = $this->Page_model->one_cond_loop('appointment','visible',0);
        $data['patient'] = $this->Page_model->get_limited_col('id, first_name, middle_name, last_name','patients');

        $data['dp'] = $this->Page_model->one_cond_loop('diagnose','date',date('Y-m-d'));

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page,$data);
        $this->load->view('templates/footer_pq');

    } 
    function fetch(){
    $this->load->model('autocomplete_model');
    echo $this->autocomplete_model->fetch_data($this->uri->segment(3));
    }
    public function appointment(){

        $page = "appointments";


        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "New Appointment"; 
        $id = $this->input->post('name');

        $data['data'] = $this->Page_model->one_cond_get_single_row('patients','fullname',$id);
        $data['patient'] = $this->Page_model->no_cond_loop('referrals');
      


        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer_ap');

    }
    public function appointment_edit($param){

        $page = "appointment_update";


        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Update Appointment"; 
        $app_id = $this->uri->segment('4');
        $user_id = $this->uri->segment('3');

       

        $data['data'] = $this->Page_model->one_cond_get_single_row('patients','id',$user_id);
        $data['edit_app'] = $this->Page_model->one_cond_get_single_row('appointment','id',$app_id);
        $data['patient'] = $this->Page_model->no_cond_loop('referrals');
        

        if($this->input->post('submit')){

            $p_id = $this->input->post('patient_id');
            $this->Page_model->update_appointment();
            $this->session->set_flashdata('success', ' Successfully saved.');
            redirect(base_url().'Pages/patient_queue');

        }


        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer_ap');

    }
    
    public function app_delete($param){
        $this->Page_model->delete('appointment','id',$param);
        $this->Page_model->update_ap_vstat();
        $this->session->set_flashdata('danger', 'deleted Successfully');
        redirect(base_url().'Pages/patient_queue');
    }

    public function diagnosed_patient(){

        $page = "dp";


        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "New Appointment"; 
        $id = $this->input->post('name');

        $data['data'] = $this->Page_model->one_cond_get_single_row('patients','fullname',$id);
        $data['patient'] = $this->Page_model->no_cond_loop('referrals');
      


        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');

    }

    public function patient_delete($param){
        $this->Page_model->delete('patients','id',$param);
        $this->Page_model->update_ap_vstat();
        $this->session->set_flashdata('danger', 'deleted Successfully');
        redirect(base_url().'Pages/patient_list');
    }

    public function saveimage(){
        $id = $this->uri->segment(3);

        $filename='profile'.$id.'.jpg';
        $filepath=FCPATH.'uploads/profile/'.$filename;
        $result=move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath);
        $data = array(
            'image_path' => $filename
            );
            
        $this->db->where('id', $id);
        $result = $this->db->update('patients', $data);
        
    }

    public function capture(){

        $page = "capture";


        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Change Profile"; 


        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        //$this->load->view('templates/footer');

    }

    public function patient_search(){

        $page = "patient_list";


        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Search Patient"; 
        $search = $this->input->post('search');
        $data['data'] =  $this->Page_model->search($search);


        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');

    }

    public function ap($id){

        $page = "appointments";


        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "New Appointment"; 

        $data['data'] = $this->Page_model->one_cond_get_single_row('patients','id',$id);
        $data['patient'] = $this->Page_model->no_cond_loop('referrals');


        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer_ap');

    }

    public function appointment_add(){
            $this->Page_model->insert_appointment();
            $this->session->set_flashdata('success', ' Successfully saved.');
            redirect(base_url().'Pages/patient_queue');
        
    }

    public function app_add(){
        $this->Page_model->insert_appointment();
        $this->session->set_flashdata('success', ' Successfully saved.');
        redirect(base_url().'Pages/patient_queue');
    
}

    public function diagnose($param){

        $page = "diagnose_new";


        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "New Diagnose"; 

        
        $data['a'] = $this->Page_model->one_cond_get_single_row('appointment','id',$param);


        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');
    }

    public function diagnose_add(){
            $this->Page_model->insert_diagnose();
            $this->Page_model->update_ap_stat();
            $this->session->set_flashdata('success', ' Successfully saved.');
            redirect(base_url().'Pages/patient_queue');
    }
    public function diagnose_edit(){

        $page = "diagnose_update";


        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Edit Diagnose"; 

        $data['d'] = $this->Page_model->one_cond_get_single_row('diagnose','id',$this->uri->segment(3));

        if($this->input->post('submit')){

            $p_id = $this->input->post('patient_id');
            $this->Page_model->update_diagnose();
            $this->session->set_flashdata('success', ' Successfully saved.');
            redirect(base_url().'Pages/patient_profile/'.$p_id);

        }


        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');
    }
    public function diagnose_delete($param){
        $this->Page_model->delete('diagnose','id',$param);
        $this->Page_model->update_ap_vstat();
        $this->session->set_flashdata('danger', 'deleted Successfully');
        redirect(base_url().'Pages/item_list');
    }

    public function diagnose_del(){
        $id = $this->uri->segment(3);
        $app_id = $this->uri->segment(4);

        $this->Page_model->delete('diagnose','id',$id);
        $this->Page_model->delete('appointment','id',$app_id);
        $this->session->set_flashdata('danger', 'deleted Successfully');
        redirect(base_url().'Pages/patient_queue');
    }

    public function item_list(){

        $page = "item_list";


        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Item List"; 

        $data['data'] = $this->Page_model->no_cond_loop('items');


        if($this->input->post('add')){
            $this->Page_model->insert_items();
            $this->session->set_flashdata('success', 'Successfully Saved');
            redirect(base_url().'Pages/item_list');
        }

        if($this->input->post('edit')){
            $this->Page_model->update_items();
            $this->session->set_flashdata('success', 'Successfully Saved');
            redirect(base_url().'Pages/item_list');
        }
        


        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');
    }
    public function item_delete($param){
        $this->Page_model->delete('items','id',$param);
        $this->session->set_flashdata('danger', 'deleted Successfully');
        redirect(base_url().'Pages/item_list');
    }


    public function referral_list(){

        $page = "referrals_list";


        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Referral List"; 

        $data['data'] = $this->Page_model->no_cond_loop('referrals');


        if($this->input->post('add')){
            $this->Page_model->insert_referral();
            $this->session->set_flashdata('success', 'Successfully Saved');
            redirect(base_url().'Pages/referral_list');
        }

        if($this->input->post('edit')){
            $this->Page_model->update_referral();
            $this->session->set_flashdata('success', 'Successfully Saved');
            redirect(base_url().'Pages/referral_list');
        }


        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');
    }

    public function referral_delete($param){
        $this->Page_model->delete('referrals','id',$param);
        $this->session->set_flashdata('danger', 'deleted Successfully');
        redirect(base_url().'Pages/referral_list');
    }

    public function purchases_list(){

        $page = "purchases_list";


        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Item List"; 

        $data['data'] = $this->Page_model->no_cond_loop('stock_summary');
        


        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');
    }

    public function expenses_list(){

        $page = "expenses_list";


        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Expenses List"; 

        $data['data'] = $this->Page_model->no_cond_loop('expenses');

        if($this->input->post('add')){
            $this->Page_model->insert_expenses();
            $this->session->set_flashdata('success', 'Successfully Saved');
            redirect(base_url().'Pages/expenses_list');
        }

        if($this->input->post('edit')){
            $this->Page_model->update_expenses();
            $this->session->set_flashdata('success', 'Successfully Saved');
            redirect(base_url().'Pages/expenses_list');
        }
        


        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');
    }
    public function expenses_delete($param){
        $this->Page_model->delete('expenses','id',$param);
        $this->session->set_flashdata('danger', 'deleted Successfully');
        redirect(base_url().'Pages/expenses_list');
    }

    public function pay(){

    $page = "pay_bill";
    $data['data'] = $this->Page_model->one_cond_loop('diagnose','payment_status',0);

    $this->load->view('templates/header');
    $this->load->view('templates/menu');
    $this->load->view('Pages/'.$page,$data);
    $this->load->view('templates/footer');

    } 

    public function sale($param){

        $page = "sales";
        $data['data'] = $this->Page_model->one_cond_get_single_row('diagnose','id',$param);
        $data['item'] = $this->Page_model->no_cond_loop('items');
        $data['sales'] = $this->Page_model->one_cond_loop('sales','reciept_code',$_SESSION['sc']);

        if($this->input->post('item')){
            $item = $this->input->post('item_id');
            $a_id = $this->input->post('a_id');
            redirect(base_url().'Pages/sale/'.$a_id.'/'.$item);
        }

        if($this->input->post('submit')){
            $this->Page_model->insert_sales();
            $this->session->set_flashdata('save', 'Successfully Saved');
            redirect(base_url().'Pages/sale/'.$param);
        }

        if($this->input->post('pay')){
            $this->Page_model->insert_sales_summary();
            $this->Page_model->update_diagnose_ps();
            $this->session->set_flashdata('save', 'Successfully Saved');
            redirect(base_url().'Pages/pay');
        }
    
        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page,$data);
        $this->load->view('templates/footer');
    
    } 

    public function sale_code(){
        $d = $this->uri->segment(3);
        $code = $this->Page_model->one_cond_get_single_row('code','id',1);
        $a = $code->sales_code;
        $b = $a+1;
        $this->Page_model->sales_code($b);
        $c='000'.$b;
        $finalcode=date("Y-m-$c").'-STO';

			session_regenerate_id();
            $_SESSION['sc'] = $finalcode;
			session_write_close();
            redirect(base_url().'Pages/sale/'.$d);
    
    }

    public function stock_code(){
        $code = $this->Page_model->one_cond_get_single_row('code','id',1);
        $a = $code->stock_code;
        $b = $a+1;
        $this->Page_model->stock_code($b);
        $c='000'.$b;
        $finalcode=date("Y-m-$c").'-STO';

			session_regenerate_id();
            $_SESSION['sc'] = $finalcode;
			session_write_close();
            redirect(base_url().'Pages/stocks');
    
    }
    public function stocks(){

        $page = "stocks";
        $data['item'] = $this->Page_model->no_cond_loop('items');
        $data['sales'] = $this->Page_model->one_cond_loop('sales','reciept_code',$_SESSION['sc']);

        if($this->input->post('item')){
            $item = $this->input->post('item_id');
            $a_id = $this->input->post('a_id');
            redirect(base_url().'Pages/stocks/'.$item);
        }

        if($this->input->post('submit')){
            $this->Page_model->insert_stocks();
            $this->Page_model->update_item_stock();
            $this->session->set_flashdata('save', 'Successfully Saved');
            redirect(base_url().'Pages/stocks/');
        }

    
        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page,$data);
        $this->load->view('templates/footer');
    
    } 

        
    public function patient_update($param){
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('username', 'Username', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "user_edit";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Update User";
            $data['data'] = $this->Page_model->one_cond_get_single_row('users','id',$param);


            $this->load->view('templates/header');
            $this->load->view('templates/menu');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{

                $this->Page_model->update_user();
                $this->session->set_flashdata('save', 'Successfully Updated');
                redirect(base_url().'Pages/users_list');

            }
    }

    public function user_delete($param){
        $this->Page_model->delete('users','id',$param);
        $this->session->set_flashdata('danger', ' User was deleted');
        redirect(base_url().'Pages/users_list');
    }


    public function user_profile($param){

        $page = "user";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            
            $data['title'] = "Users"; 
            $data['page'] = $this->Page_model->get_single_table_by_id('id', 'users', $param);
            $data['id'] = $data['page']['id'];
            $data['username'] = $data['page']['username'];
            $data['position'] = $data['page']['position'];
            $data['office'] = $data['page']['office'];
            $data['fname'] = $data['page']['fname'];
            $data['mname'] = $data['page']['mname'];
            $data['lname'] = $data['page']['lname'];
            $data['age'] = $data['page']['age'];
            $data['address'] = $data['page']['address'];
            $data['sex'] = $data['page']['sex'];
            $data['image'] = $data['page']['image'];
            $data['bday'] = $data['page']['bday'];

            $data['dept'] = $this->Page_model->one_cond_row('dept','id',$data['office']);
            

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/modal_username');
            $this->load->view('templates/modal_password');
            $this->load->view('templates/modal_profile_image');
            $this->load->view('templates/footer');
    } 
    public function user_add(){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ','</div>');
        $this->form_validation->set_rules('username', 'Username', 'required');
        //$this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');

        $page = "user_new";

        if($this->form_validation->run() == FALSE){

        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Add New User"; 

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');

        }else{

            $this->Page_model->insert_user();
            $this->session->set_flashdata('success', ' Successfully saved.');
            redirect(base_url().'Pages/users_list');
        
            
        } 
    }

    public function user_update($param){
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('username', 'Username', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "user_edit";

            if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Update User";
            $data['data'] = $this->Page_model->one_cond_get_single_row('users','id',$param);


            $this->load->view('templates/header');
            $this->load->view('templates/menu');
            $this->load->view('Pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{

                $this->Page_model->update_user();
                $this->session->set_flashdata('save', 'Successfully Updated');
                redirect(base_url().'Pages/users_list');

            }
    }

    // summary report
    public function sales_summary(){

        $page = "sales_summary";

        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Sales Summary";   

        if($this->input->post('submit')){
            $df = $this->input->post('df');
            $dt = $this->input->post('dt');
            $data['df'] = $df;
            $data['dt'] = $dt;
            $data['data'] = $this->Page_model->summary_loop('sales_summary',$df,$dt);
        }

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');
    }
    
    public function purchases_summary(){

        $page = "purchases_summary";

        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Sales Summary";   

        if($this->input->post('submit')){
            $df = $this->input->post('df');
            $dt = $this->input->post('dt');
            $data['df'] = $df;
            $data['dt'] = $dt;

            $data['data'] = $this->Page_model->summary_loop('stocks',$df,$dt);
        }

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');
    }
    public function expenses_summary(){

        $page = "expenses_summary";

        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Expenses Summary";   

        if($this->input->post('submit')){
            $df = $this->input->post('df');
            $dt = $this->input->post('dt');
            $data['df'] = $df;
            $data['dt'] = $dt;
            $data['data'] = $this->Page_model->summary_loop('expenses',$df,$dt);
        }

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');
    }
    public function patient_summary(){

        $page = "patient_summary";

        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Patient Summary";   

        if($this->input->post('submit')){
            $df = $this->input->post('df');
            $dt = $this->input->post('dt');
            $data['df'] = $df;
            $data['dt'] = $dt;
            $data['data'] = $this->Page_model->app_summary_loop('appointment',$df,$dt);
        }

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');
    }
    public function income_statement(){

        $page = "income_statement";

        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Income Statement Summary";   

        if($this->input->post('submit')){
            $df = $this->input->post('df');
            $dt = $this->input->post('dt');
            $data['df'] = $df;
            $data['dt'] = $dt;
            $data['ex'] = $this->Page_model->get_sum('expenses',$df,$dt,'amount');
            $data['exp'] = $data['ex']['total'];

            $data['sales'] = $this->Page_model->get_sum('sales_summary',$df,$dt,'amount_due');
            $data['sale'] = $data['sales']['total'];
        }

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('Pages/'.$page, $data);
        $this->load->view('templates/footer');
    }




    public function change_username(){
        $id = $this->input->post('id');
        $this->Page_model->username();
        $this->Page_model->insert_at('Change Username id number '.$id);
        $this->session->set_flashdata('success', ' Username Successfuly Changed.');
        redirect(base_url().'user_profile/'.$id);
    
    }

    public function change_password(){
        $id = $this->input->post('id');
        $pass = $this->input->post('password');
        $cp = $this->input->post('cp');
        if($pass == $cp){
            $this->Page_model->password();
            $this->Page_model->insert_at('Change Password id number '.$id);
            $this->session->set_flashdata('success', ' Password Successfuly Changed.');
            redirect(base_url().'user_profile/'.$id);
        }else{
            $this->session->set_flashdata('danger', ' Confirm Password not Match.');
            redirect(base_url().'user_profile/'.$id);

        }

        
    
    }
    
    public function log_in(){

        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'uassword', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "login";

            if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
                show_404();
            }
            
            $this->load->view('Pages/'.$page);

            }else{

                $user_id = $this->Page_model->login(); 

                if($user_id){

                    $user_data = array(
                        'username' => $user_id['username'],
                        'position' => $user_id['position'],
                        'id' => $user_id['id'],
                        'logged_in' => true

                    );
                
                    $this->session->set_userdata($user_data);
                    $this->session->set_flashdata('user_log', 'You are now loged in as '
                    .$this->session->position);
                    redirect(base_url());
                }else{
                    $this->session->set_flashdata('failed', 'Username/Password not match');
                    redirect(base_url().'Pages/log_in');

                }
  

            }
    } 
    public function lock_user_screen(){

        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('password', 'password', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "lock_screen";

            if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
                show_404();
            }
            
            $this->load->view('Pages/'.$page);

            }else{

                $user_id = $this->Page_model->lock_screen();

                if($user_id){

                    $user_data = array(
                        'username' => $user_id['username'],
                        'user' => $user_id['fname'].' '.$user_id['mname'].' '.$user_id['lname'],
                        'position' => $user_id['position'],
                        'office' => $user_id['office'],
                        'image' => $user_id['image'],
                        'id' => $user_id['id'],
                        'com_id' => $user_id['company_id'],
                        'logged_in' => true

                    );
                
                    $this->session->set_userdata($user_data);
                    $this->session->set_flashdata('user_log', 'You are now loged in as '
                    .$this->session->position);
                    redirect(base_url());
                }else{
                    $this->session->set_flashdata('failed', 'Password not match');
                    redirect(base_url().'lock_user_screen');

                }
  

            }
    } 
    public function logout(){

        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('position');
        $this->session->unset_userdata('logged_in');

        $this->session->set_flashdata('failed', 'You are logged out.');
        redirect(base_url().'Pages/log_in');

    }
    public function lock(){
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('position');
        $this->session->unset_userdata('office');
        $this->session->unset_userdata('logged_in');

        $this->session->set_flashdata('danger', 'You are now Lock Screen Mode');
        redirect(base_url().'lock_user_screen');

    }


}

?>