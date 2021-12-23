<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model {

   public function getTotalInvoice($id) 
   {

                  $this->db->where('id', $id);
                  
                  $data =  $this->db->get('invoices', $id);
                  return $data->row();

                  
   }

   public function get_invoices(){
      return $this->db->get('invoices')->result();
   }

   public function get_invoices_with_payment(){

      $this->db->select('*, sum(paid) as total_paid,  ( invoices.total - sum(paid) ) as remaining_payment');
      $this->db->join('payments','payments.invoice_id = invoices.id','left');
      $this->db->group_by('payments.invoice_id');
      $query = $this->db->get('invoices');

      return $query->result();

   }
    

}

/* End of file Invoice_model.php */
