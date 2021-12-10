<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

    
    
    public function insert_user($user_data)

    {
         
        $this->db->insert('users', $user_data);
        

    }
    
    
    public function get_total( )
    
    {
       
        $result = $this->db->get('mytable')->result_array();

        return $result;
       
    }

    public function add_prod( $prod_details )

    {
      $this->db->insert('mytable', $prod_details);
    }

}

/* End of file Main_model.php */
