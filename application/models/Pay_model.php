<?php 



defined('BASEPATH') OR exit('No direct script access allowed');

class Pay_model extends CI_Model {

    public function sum_paid()
	{
		$result =  $this->db->query('SELECT sum(paid) as total_paid, invoice_id FROM `payments` GROUP by invoice_id');
        // print_r($result); exit();
		return $result->result_array();
		
	}

}

/* End of file Pay_model.php */
