<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

    
    
    public function insert_user($user_data)

    {
         
        $this->db->insert('users', $user_data);
        

    }
    
    
    public function get_total( )
    
    {
        $this->db->join('invoices_lines', 'invoices.id = invoices_lines.invoice_id');       
        $result = $this->db->get('invoices')->result_array();
        return $result;
       
        // $result = $this->db->get('mytable')->result_array();

        // return $result;
       
    }

    // public function add_prod( $prod_details )

    // {
    //     $this->db->insert('mytable', $prod_details);
    // }

    
 
    public function insert_data($add_invoice, $add_invoice_lines)
    {

 
        // $this->db->insert('invoices', $add_invoice);
        // $this->db->insert('invoices_lines', $add_invoice_lines);

        // $this->db->join('invoices_lines', 'invoices.id = invoices_lines.invoice_id');       
        // $result = $this->db->get('invoices')->result_array();
        // return $result;
        
        
    }
             

    
    public function view_invoices()
    {
        // $this->db->select('*');
		// $this->db->from('invoices');
		// $results = $this->db->join('invoices_lines', 'invoices.id = invoices_lines.invoice_id');
		// $results= $this->db->get();
		// return $results;
        
        $this->db->select('*');
		// $this->db->from('invoices');
		$results = $this->db->join('invoices_lines', 'invoices.id = invoices_lines.invoice_id');
        
        $results= $this->db->get('invoices')->result_array();;
		return $results;

        // print_r($results);
        // $results = $this->db->get('invoices')->result_array();
        // return $results;
    }


    // public function update_invoice($add_invoice, $add_invoice_lines)
    // {
    //     $this->db->update('invoices', $add_invoice);
    //     $this->db->update('invoices_lines', $add_invoice_lines);
    // }
  

    // public function update_invoice_process($id)
    // {
    //    $this->db->get_where('invoices', array('id' => $id));
    //    $this->db->where('id',$l['id'])->update( 'invoices_lines', $l );

    //     // $this->db->update('invoices', $id);
    //     // $this->db->update('invoices_lines', $id);
    // }
  
}




/* End of file Main_model.php */
