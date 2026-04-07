
<?php
class Autocomplete_model extends CI_Model
{
 function fetch_data($query)
 {
  $this->db->like('fullname', $query);
  $query = $this->db->get('patients');
  if($query->num_rows() > 0)
  {
   foreach($query->result_array() as $row)
   {
    $output[] = array(
     'name'  => $row["fullname"]
    );
   }
   echo json_encode($output);
  }
 }
}

?>