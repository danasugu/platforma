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
		// $this->load->view('dash/inc/footer');
	}

	public function dashboard(){
		$this->load->view('dashboard');
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
												redirect('index.php/main_controller/dashboard', 'refresh');
										} else {
											echo "<script>alert('Username or password not matching. Try again')</script>";
											redirect('', 'refresh');
										}
									}

		} else{
			// redirect('', 'refresh');
			echo 1;
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
            // redirect('home', 'refresh');
			echo 2;
        }
	}


	public function logout() {
		session_unset();
		session_destroy();
		redirect('main_controller/login_process', 'refresh');
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

        $result = $this->main_model->get_total();
        $this->load->view('total', $result);
        
    }


    public function add_invoice()
    {
      if( $this->input->post('add_invoice') )
      {
        $description = $this->input->post('description');
        $price= $this->input->post('price');
        $qty= $this->input->post('qty');
        $vat= $this->input->post('vat');

  
  
        $prod_data = array (
          'descrition' => $description,
          'price' => $price,
          'qty' => $qty,
          'vat' => $vat

        );
        // var_dump($prod_details);
        $this->Main_model->add_invoice( $prod_data );
        // redirect(' ','reload');
        echo 'success!';
      }
  
      
      $this->load->view('add_invoice');
      
    }
}



/* End of file Main_controller.php */
