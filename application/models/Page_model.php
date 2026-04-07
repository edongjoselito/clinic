<?php


class Page_model extends CI_Model{
    

    public function __construct(){
        $this->load->database();
        

    }


    public function insert_items(){

        $data = array(
        'description' => $this->input->post('description'), 
        'price' => $this->input->post('price'), 
        'quantity' => $this->input->post('quantity'), 
        'purchases_price' => $this->input->post('purchases_price')
        ); 
    
        return $this->db->insert('items', $data);
        
    }
    public function update_items(){

        $id = $this->input->post('id');

        $data = array(
        'description' => $this->input->post('description'), 
        'price' => $this->input->post('price'), 
        'quantity' => $this->input->post('quantity'), 
        'purchases_price' => $this->input->post('purchases_price')
        ); 
    
        $this->db->where('id', $id);
    return $this->db->update('items', $data);
        
    }

    public function insert_referral(){

        $data = array(
        'company' => $this->input->post('company'), 
        'address' => $this->input->post('address'), 
        'contact' => $this->input->post('contact')
        ); 
    
        return $this->db->insert('referrals', $data);
        
    }
    public function update_referral(){

        $id = $this->input->post('id');

        $data = array(
        'description' => $this->input->post('description'), 
        'price' => $this->input->post('price'), 
        'quantity' => $this->input->post('quantity'), 
        'purchases_price' => $this->input->post('purchases_price')
        ); 
    
        $this->db->where('id', $id);
    return $this->db->update('referrals', $data);
        
    }

    public function insert_expenses(){

        $data = array(
        'description' => $this->input->post('description'), 
        'or_no' => $this->input->post('or_no'), 
        'amount' => $this->input->post('amount'), 
        'date' => $this->input->post('date')
        ); 
    
        return $this->db->insert('expenses', $data);
        
    }
    public function update_expenses(){

        $id = $this->input->post('id');

        $data = array(
            'description' => $this->input->post('description'), 
            'or_no' => $this->input->post('or_no'), 
            'amount' => $this->input->post('amount'), 
            'date' => $this->input->post('date')
        ); 
    
        $this->db->where('id', $id);
    return $this->db->update('expenses', $data);
        
    }


public function insert_user(){

    $password = $this->input->post('password');
    $hash = password_hash($password, PASSWORD_DEFAULT);

    
    $data = array(
    'first_name' => $this->input->post('fname'), 
    'middle_name' => $this->input->post('mname'), 
    'last_name' => $this->input->post('lname'), 
    'username' => $this->input->post('username'),
    'password' => $hash,
    'position' => $this->input->post('position'),
    ); 

    return $this->db->insert('users', $data);
    
}

public function insert_diagnose(){
    date_default_timezone_set('Asia/Manila'); # add your city to set local time zone

    $data = array(
    'appointment_id' => $this->input->post('appointment_id'), 
    'patient_id' => $this->input->post('patient_id'), 
    'lab' => $this->input->post('lab'), 
    'diagnosis' => $this->input->post('diagnosis'), 
    'treatment' => $this->input->post('treatment'), 
    'remarks' => $this->input->post('remarks'), 
    'user_id' => $this->input->post('user_id'), 
    'payment_status' => 0, 
    'date' => date('Y-m-d')
    ); 

    return $this->db->insert('diagnose', $data);
    
}
public function update_diagnose(){

    $id = $this->input->post('d_id');

    $data = array(
    'lab' => $this->input->post('lab'), 
    'diagnosis' => $this->input->post('diagnosis'), 
    'treatment' => $this->input->post('treatment'), 
    'remarks' => $this->input->post('remarks')
    ); 

    $this->db->where('id', $id);
    return $this->db->update('diagnose', $data);
    
}

public function update_ap_stat(){

    $id = $this->input->post('appointment_id'); 

    $data = array(
    'visible' => 1,
    );

    $this->db->where('id', $id);
    return $this->db->update('appointment', $data);
}

public function update_ap_vstat(){

    $id = $this->input->post('appointment_id'); 

    $data = array(
    'visible' => 0,
    );

    $this->db->where('id', $id);
    return $this->db->update('appointment', $data);
}
public function insert_user_sa(){

    $password = $this->input->post('Password');
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    $data = array(
    'Username' => $this->input->post('Username'),
    'Password' => $hash,
    'Position' => $this->input->post('Position'),
    'Office' => "Company IT",
    'fname' => $this->input->post('fname'),
    'mname' => $this->input->post('mname'),
    'lname' => $this->input->post('lname'),
    'age' => "",
    'address' => $this->input->post('address'),
    'sex' => $this->input->post('sex'),
    'image' => "",
    'company_id' => $this->input->post('com_name'),
    'bday' => ""
    ); 

    return $this->db->insert('users', $data);
    
}
public function update_user(){

    $id = $this->input->post('id'); 

    $data = array(
    'first_name' => $this->input->post('fname'), 
    'middle_name' => $this->input->post('mname'), 
    'last_name' => $this->input->post('lname'), 
    'username' => $this->input->post('username'),
    'position' => $this->input->post('position'),
    );

    $this->db->where('id', $id);
    return $this->db->update('users', $data);
}
public function change_pass(){

    $id = $this->input->post('id'); 
    $password = $this->input->post('password');
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $data = array(
    'password' => $hash
    );

    $this->db->where('id', $id);
    return $this->db->update('users', $data);
}

public function update_patient(){
    
    $fname = $this->input->post('first_name');
    $mname = $this->input->post('middle_name');
    $lname = $this->input->post('last_name');
    $id = $this->input->post('id');
    
    
    $data = array(
    'first_name' =>  $fname,
    'middle_name' => $mname, 
    'last_name' => $lname, 
    'age' => $this->input->post('age'), 
    'gender' => $this->input->post('gender'), 
    'birthday' => $this->input->post('birthday'), 
    'occupation' => $this->input->post('occupation'), 
    'sitio' => $this->input->post('sitio'), 
    'barangay' => $this->input->post('barangay'), 
    'city_mun' => $this->input->post('city_mun'), 
    'province' => $this->input->post('province'), 
    'civil_status' => $this->input->post('civil_status'), 
    'contact' => $this->input->post('contact'), 
    'company' => $this->input->post('company'),  
    'fullname' => $fname.' '.$mname.' '.$lname,
    ); 

    $this->db->where('id', $id);

    return $this->db->update('patients', $data);
    
}

public function insert_patient(){
    
    $fname = $this->input->post('first_name');
    $mname = $this->input->post('middle_name');
    $lname = $this->input->post('last_name');
    
    $data = array(
    'first_name' =>  $fname,
    'middle_name' => $mname, 
    'last_name' => $lname, 
    'age' => $this->input->post('age'), 
    'gender' => $this->input->post('gender'), 
    'birthday' => $this->input->post('birthday'), 
    'occupation' => $this->input->post('occupation'), 
    'sitio' => $this->input->post('sitio'), 
    'barangay' => $this->input->post('barangay'), 
    'city_mun' => $this->input->post('city_mun'), 
    'province' => $this->input->post('province'), 
    'civil_status' => $this->input->post('civil_status'), 
    'contact' => $this->input->post('contact'), 
    'company' => $this->input->post('company'),  
    'fullname' => $fname.' '.$mname.' '.$lname,
    ); 

    return $this->db->insert('patients', $data);
    
}

public function insert_appointment(){
    date_default_timezone_set('Asia/Manila'); # add your city to set local time zone
    
    $data = array(
    'patient_id' => $this->input->post('p_id'), 
    'bp' => $this->input->post('bp'), 
    'weight' => $this->input->post('weight'), 
    'lmp' => $this->input->post('lmp'), 
    'date_of_delivery' => $this->input->post('date_of_delivery'), 
    'gravida' => $this->input->post('gravida'), 
    'abortion' => $this->input->post('abortion'), 
    'parity' => $this->input->post('parity'), 
    'living' => $this->input->post('living'), 
    'no_of_weeks' => $this->input->post('no_of_weeks'), 
    'no_of_days' => $this->input->post('no_of_days'), 
    'transaction' => $this->input->post('transaction'), 
    'visit_date' => date('Y-m-d'),
    'age' => $this->input->post('age'),  
    'referral_status' => $this->input->post('ref'), 
    'referral_id' => $this->input->post('ref'),
    'term' => $this->input->post('term'),
    'preterm' => $this->input->post('preterm')
    ); 
   

    return $this->db->insert('appointment', $data);
    
}

public function update_appointment(){
    date_default_timezone_set('Asia/Manila'); # add your city to set local time zone

    $id = $this->input->post('a_id');
    
    $data = array(
    'patient_id' => $this->input->post('p_id'), 
    'bp' => $this->input->post('bp'), 
    'weight' => $this->input->post('weight'), 
    'lmp' => $this->input->post('lmp'), 
    'date_of_delivery' => $this->input->post('date_of_delivery'), 
    'gravida' => $this->input->post('gravida'), 
    'abortion' => $this->input->post('abortion'), 
    'parity' => $this->input->post('parity'), 
    'living' => $this->input->post('living'), 
    'no_of_weeks' => $this->input->post('no_of_weeks'), 
    'no_of_days' => $this->input->post('no_of_days'), 
    'transaction' => $this->input->post('transaction'), 
    'visit_date' => date('Y-m-d'),
    'age' => $this->input->post('age'),  
    'referral_status' => $this->input->post('ref'), 
    'referral_id' => $this->input->post('ref'),
    'term' => $this->input->post('term'),
    'preterm' => $this->input->post('preterm')
    ); 
    
    $this->db->where('id', $id);
    return $this->db->update('appointment', $data);
    
}
public function insert_sales(){
    $data = array(
    'item_id' => $this->input->post('item_id'), 
    'price' => $this->input->post('price'), 
    'reciept_code' => $this->input->post('sales_code'), 
    'quantity' => $this->input->post('quantity'), 
    'total' => $this->input->post('total'), 
    'time' => $this->input->post('time'), 
    'date' => $this->input->post('date'), 
    'diagnose_id' => $this->input->post('diagnose_id') 
    ); 

    return $this->db->insert('sales', $data);  
}
public function insert_sales_summary(){
    date_default_timezone_set('Asia/Manila');
    $time = date('h:i:s a', time());

    $data = array(
    'reciept_code' => $_SESSION['sc'], 
    'patient_id' => $this->input->post('p_id'), 
    'total_retail' => $this->input->post('total_retail'), 
    'discount' => $this->input->post('discount'), 
    'amount_due' => $this->input->post('due_amount'), 
    'comment' => $this->input->post('comment'), 
    'date' => date('Y-m-d'), 
    'time' => $time
    ); 

    return $this->db->insert('sales_summary', $data);  
}
public function update_diagnose_ps(){

    $id = $this->input->post('d_id'); 

    $data = array(
    'payment_status' => 1
    );

    $this->db->where('id', $id);
    return $this->db->update('diagnose', $data);
}

public function update_profile_image(){

    $id = 1; 
    $file = $this->upload->data();
    $filename = $file['file_name'];

    $data = array(
        'image_path' => $filename
        );
        
  
    $this->db->where('id', $id);
    $result = $this->db->update('patients', $data);
    return $result;
}

public function search($search){
    $this->db->select('*');
    $this->db->from('patients');
    $this->db->like('first_name',$search);
    $this->db->or_like('last_name',$search);
    $this->db->or_like('middle_name',$search);
    $this->db->or_like('fullname',$search);
    //$this->db->query("SELECT * FROM film WHERE film.title LIKE '%$query%'");
    $query = $this->db->get();
    return $query->result();
}

public function sales_code($b){

    $data = array(
    'sales_code' => $b
    );

    $this->db->where('id', 1);
    return $this->db->update('code', $data);
}

public function stock_code($b){

    $data = array(
    'stock_code' => $b
    );

    $this->db->where('id', 1);
    return $this->db->update('code', $data);
}
public function insert_stocks(){
    $data = array(
    'item_id' => $this->input->post('item_id'), 
    'purchases_price' => $this->input->post('price'), 
    'reciept_code' => $this->input->post('sales_code'), 
    'quantity' => $this->input->post('quantity'), 
    'total' => $this->input->post('total'), 
    'time' => $this->input->post('time'), 
    'date' => $this->input->post('date'),  
    ); 

    return $this->db->insert('stocks', $data);  
}
public function update_item_stock(){

    $id = $this->input->post('item_id'); 
    $q = $this->input->post('quantity'); 
    $aq = $this->input->post('a_qty'); 
    $total_q = $q+$aq;

    $data = array(
    'quantity' => $total_q
    );

    $this->db->where('id', $id);
    return $this->db->update('items', $data);
}
public function insert_stock_summary(){
    date_default_timezone_set('Asia/Manila');
    $time = date('h:i:s a', time());
    $data = array(
    'reciept_code' => '2023-10-000129942-STO',  
    'total_retail' => $this->input->post('price'), 
    'amount_due' => $this->input->post('total'), 
    'user_id' => $this->input->post('user_id'), 
    'date' => date('Y-m-d'), 
    'time' => $time
    ); 

    return $this->db->insert('stock_summary', $data);  
}




public function items() {
    $query = $this->db->query("SELECT * FROM items");
    return $query->result();
}



public function login(){

    $password = $this->input->post('password');
    
    $this->db->where('username', $this->input->post('username', true));
    //$this->db->where('status', 0);
    //$this->db->where('Password', $this->input->post('Password', true));
    $result = $this->db->get('users');

    if($result->num_rows() == 1){
      
        $data = $result->row(); 

       if (password_verify($password, $data->password)) {
            return $result->row_array();
       }

       // return $result->row_array();
        
    }else{
        return false;
    }

}
public function lock_screen(){

    $password = $this->input->post('password');
    
    $this->db->where('username', $this->session->username);
    $this->db->where('status', 0);
    //$this->db->where('Password', $this->input->post('Password', true));
    $result = $this->db->get('users');

    if($result->num_rows() == 1){
      
        $data = $result->row(); 

       if (password_verify($password, $data->password)) {
            return $result->row_array();
       }

       // return $result->row_array();
        
    }else{
        return false;
    }

}




public function check_dup_user($fname,$lname,$username){
    $result = $this->db->where("fname",$fname);
    $result = $this->db->where('lname',$lname);
    $result = $this->db->or_where('username',$username);
    $result = $this->db->get('users');
    return $result;
}



// common functions loop

public function no_cond_loop($table){
    $query = $this->db->get($table);
    return $query->result();
}

public function no_cond_loop_with_limit($table,$limit){
    $this->db->limit($limit);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get($table);
    return $query->result();
}

public function one_cond_loop($table,$col,$val){
    $this->db->where($col, $val);
    $query = $this->db->get($table);
    return $query->result();
}

public function two_cond_loop($table,$col,$val,$col2,$val2){
    $this->db->where($col, $val);
    $this->db->where($col2, $val2);
    $query = $this->db->get($table);
    return $query->result();
}
public function three_cond_loop($table,$col,$val,$col2,$val2,$col3,$val3){
    $this->db->where($col, $val);
    $this->db->where($col2, $val2);
    $this->db->where($col3, $val3);
    $query = $this->db->get($table);
    return $query->result();
}

public function one_cond_loop_order_by($table,$col,$val,$orderby,$orderbyvalue){
    $this->db->where($col, $val);
    $this->db->order_by($orderby, $orderbyvalue);
    $query = $this->db->get($table);
    return $query->result();
}

public function delete($table,$col,$val){
    $this->db->where($col,$val);
    $this->db->delete($table);
    return true;
}


// common function single row
public function one_cond_get_single_row($table, $col, $val){
    $this->db->where($col, $val);
    $result = $this->db->get($table)->row();
    return $result;
}

// other queries
public function get_limited_col($cols,$table){
    $query = $this->db->select($cols)
        ->from($table)
        ->get();
    return $query->result();
}

public function summary_loop($table,$val,$val2){
    $this->db->where('date >=', $val);
    $this->db->where('date <=', $val2);
    $query = $this->db->get($table);
    return $query->result();
}

public function app_summary_loop($table,$val,$val2){
    $this->db->where('visit_date >=', $val);
    $this->db->where('visit_date <=', $val2);
    $query = $this->db->get($table);
    return $query->result();
}

public function get_sum($table,$val,$val2,$col){
    $this->db->select('SUM('.$col.') as total');
    $this->db->where('date >=', $val);
    $this->db->where('date <=', $val2);
    $query = $this->db->get($table);
    return $query->row_array();
}

public function count_all($table){
    $query = $this->db->get($table);
    return $query;
}
public function count_with_cond($table,$col,$val){
    $query = $this->db->get_where($table,array($col => $val));
    return $query;
}













}

