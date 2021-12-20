<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Main_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Main_model');
      }


    public function index()
    {
		$this->load->view('header');

        $this->load->view('login');
    }
	
    public function register(){
		
		$this->load->view('header');
		$this->load->view('register');
		
	}

	public function dashboard(){
		$this->load->view('header');
		$this->load->view('dashboard');
	}
	
	public function payments(){
		// $this->load->view('header');
		$this->load->view('payments');
	}
	
	public function payment_process($id){
		// $this->load->view('header');
		$this->load->view('update_payment', $id);
	}

	public function view_invoices() {
		$this->load->view('header');
		
		$this->load->view('view_invoices');
		$this->Main_model->view_invoices();

		

    //   $results =  $query->result(); 
		// echo 'succes';
    
		// print_r($results);
		// echo 1;
		
	}

	public function login_process(){
		if($this->input->post('u_login')){
						$u_email = $this->input->post('u_email');
						$u_pass = md5($this->input->post('u_pass'));

						$user_data = array(
							'u_email' => $u_email,
							'u_pass' => $u_pass
						);
						// echo "<pre>";
						// var_dump($user_data);
						$users_list = $this->db->get_where( 'users', array( 'u_email' => $user_data[ 'u_email'] ));
									foreach ( $users_list -> result() as $user )
									{
										if( $user_data['u_email'] == $user-> u_email && $user_data['u_pass'] == $user->u_pass )
										{
											// print_r($u_email);
											// echo 'hi, DS!';
												$_SESSION['u_email'] = $user_data['u_email'];
												redirect('index.php/main_controller/view_invoices', 'refresh');
										} else {
											echo "<script>alert('Username or password not matching. Try again')</script>";
											redirect('', 'refresh');
										}
									}

		} else{
			redirect('', 'refresh');
			// echo 1;
		}
	}


	public function register_process()
    { 
		
		$this->load->view('register');
		
		if($this->input->post('u_reg')){
			$u_email = $this->input->post('u_email');
			$u_pass = md5($this->input->post('u_pass'));

			$user_data = array(
				'u_email' 	=> $u_email,
				'u_pass' 	=> $u_pass
			);
			echo "<pre>";
			var_dump($user_data);
			echo 'succes';
			$this->Main_model->insert_user($user_data);
			redirect('', 'refresh');

		} else{
            redirect('home', 'refresh');
			// echo 234;
        }
	}


	public function logout() {
		session_unset();
		session_destroy();
		redirect('', 'refresh');
	}


	public function single_invoice($i_id)
	{
  
	  $this->load->view('single_invoice', $i_id);
  
	}
  
	public function edit_invoice($id)
	{
		$this->load->view('update_invoice', $id);
	}


    public function date_diff($date1, $date2)
    {
		
		$date1 = new DateTime('2009-10-5');
        $date2 = new DateTime('2009-10-13');
        
        $interval = $date1->diff($date2);
        
        echo $interval->format('%R%a days');
		
		
        $this->load->view('main', $interval);
    }
    
	
	
    public function calculate_invoice_total( )
	
    { 
		
		$result = $this->Main_model->get_total();
		// $this->db->join('invoices_lines', 'invoices.id = invoices_lines.invoice_id');       
        // $result = $this->db->get('invoices')->result_array();
        // return $result;
        $this->load->view('total', $result);
		
		// echo "<pre>";
        // print_r($result);
    }
	
	
	public function update_invoice($id)
	{
		
		$this->load->view('update_invoice', $id);
	}
	

	public function add_invoice_data( )
	{
		$this->load->view('header');
		 
		if( $this->input->post('add_invoice') )
		{

			$data = $this->input->post();

			$invoice_data['invoice_number'] = $data['invoice_number'];
			$invoice_data['invoice_prefix'] = $data['invoice_prefix'];

			$this->db->insert('invoices',$invoice_data);
		
			$invoice_id = $this->db->insert_id();

			$total = 0;

			foreach( $data['linedata'] as $key => $l ){

				// print_r($l); exit();

				$l['invoice_id'] = $invoice_id;
							
				
				$this->db->insert('invoices_lines', $l);
				
				
				$total += $l['qty'] * $l['price'];
				
			}

			$this->db->where('id', $invoice_id)->update('invoices', ['total'=> $total]);

	
			
			redirect(site_url('index.php/main_controller/view_invoices'));
		}

 		
		$this->load->view('add_invoice');
	}


	public function delete_invoice($id)
	{
		// $this->db->where('id', $id);
		// $this->db->delete('invoices');
		$this->db->where('invoice_id', $id);
		$this->db->delete('invoices_lines');
		redirect('index.php/main_controller/view_invoices', 'refresh');
	}

	public function delete_invoice_line($id)
	{   
		if( $this->input->post( 'update_invoice' ))
		{
			$data = $this->input->post();
		foreach( $data['linedata']  as $key =>  $l )
			{
				$this->db->where('invoice_id', $id);
				$line_id = $l['id'];
				// $this->db->where('id', $id);
				// $this->db->delete('invoices';
				$this->db->where('invoice_id', $line_id);
				// $this->db->delete('invoices_lines');
				redirect('index.php/main_controller/view_invoices', 'refresh');
			}	

		}
	}




public function update_invoice_process( $id )
	{
		
		if( $this->input->post( 'update_invoice') )
		{
			$data = $this->input->post();
			//print_r($_POST); exit();
			
			$invoice_data['invoice_number'] = $data['invoice_number'];
			$invoice_data['invoice_prefix'] = $data['invoice_prefix'];
			
			$this->db->where( 'id', $id )->update( 'invoices', $invoice_data );
			
			$invoice_id = $id;
			
			$total = 0;
			
			
			$this->db->where('invoice_id', $invoice_id)->delete( 'invoices_lines');

			foreach( $data['linedata']  as $key =>  $l )
			{
				$l['invoice_id'] = $invoice_id;
							
				
				$this->db->insert('invoices_lines', $l);
				
				
				$total += $l['qty'] * $l['price'];
				
			}

			$this->db->where( 'id', $id )->update( 'invoices', ['total'=>$total] );
			

			redirect(site_url('index.php/main_controller/view_invoices'));
		}
		
 
		$this->load->view('view_invoice');
	}



	public function repeat(){
		
		$this->load->view('repeat');
		
	}

}



/* End of file Main_controller.php */
