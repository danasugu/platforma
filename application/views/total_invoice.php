<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
$count = 0; 
 
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<!-- <h3 style="text-align: center">Update invoice</h3> -->
<div style="height: 70px;"></div>
    <!-- <h1>Add products</h1> -->
    <div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3">
				<!-- sidebar -->
				<?php $this->load->view('sidebar'); ?>
				<!-- sidebar -->
			</div>
			<div class="col-lg-9 col-md-9">
				<div class="panel panel-default ">
					<div class="panel-heading"></div>
         			<h1> Total invoice - Payments</h1>
					 <br>
					<div class="panel-body ">
						

                    <table class="table">
  <thead>
    <tr>
       
      <th scope="col">ID</th>
      <th scope="col">Invoice number</th>
      <th scope="col">Invoice prefix</th>
      <th scope="col">Total</th>
      <th scope="col">Total paid</th>
      <th scope="col">Due payment</th>
 
    </tr>
   
  </thead>
  <tbody>

    <?php
    

    //   $this->db->join('invoices_lines', 'invoices.id = invoices_lines.invoice_id');       
    //   $result = $this->db->get('invoices')->result_array();
    //   return $result;

    $this->db->select('*');
    // $this->db->from('invoices');
    $data = $this->db->join('invoices_lines', 'invoices.id = invoices_lines.invoice_id');
    
    $data= $this->db->get('invoices');

    return $data;
    //   print_r($data); exit();
      // $json_data = $this->db->get('invoices');
 
         
        //   $total_price= $invoice->price;
        //   $total_qty = $result->qty;
        //   $vat= $result->vat_percentage;
        //   $total_fara_vat = $total_price *$total_qty;
        //   $total_cu_vat = $total_fara_vat + ($total_fara_vat*$vat);

    ?>
    
    <tr>
      <td><?= $data->id; ?> ?></td> 
      <td><?= $data->invoice_number; ?></td> 
      <td><?= $data->qty ?></td> 
      <td><?=   $total_fara_vat ?></td>
      <td><?=  $total_cu_vat  ?></td>
    </tr>

 

    
  </tbody>
</table>

					</div>
				</div>
			</div>
		</div>
	</div>
	
   
	
</body>
</html>