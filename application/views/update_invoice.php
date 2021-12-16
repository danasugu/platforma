<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
$invoice_id = $this->uri->segment(3);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <br>
    <!-- <h1>Add products</h1> -->
    <div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3">
				<!-- sidebar -->
			 
				<!-- sidebar -->
			</div>
			<div class="col-lg-9 col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
          <h1>Update Invoice</h1>
					<div class="panel-body">
						<?php echo form_open_multipart('index.php/main_controller/update_invoice_process/'.$id,'class="form-horizontal"');
						
						$invoice_data = $this->db->get_where('invoices', array('id' => $id));
						
						foreach($invoice_data->result() as $invoice) 
						{ ?>

						<div class="form-group">
							<label class="col-sm-2 control-label">Invoice Number</label>
							<div class="col-sm-2">
								<input type="text" name="invoice_number" class="form-control input-sm" value="<?php echo $invoice->invoice_number ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Invoice Prefix</label>
							<div class="col-sm-2">
								<input type="text" name="invoice_prefix" class="form-control input-sm" value="<?php echo $invoice->invoice_prefix ?>">
							</div>
						</div>

						<?php }
						
						
						
						$data['linedata'] = $this->db->get_where('invoices_lines', array('invoice_id' => $invoice_id))->result_array();
						// var_dump($invoice_lines_data['linedata'] ); 
						// echo "<pre>";
						// print_r($data['linedata'] );


						// echo $data['linedata'][0]['description'] ;
						// echo $data['linedata'][2]['description'] ;
						echo "<br>";
						// exit();
					 
						
						foreach( $data['linedata'] as $key => $l )
						{   	
							$description = $l['id']['description'];	 				
						?>
 
								<div>
								<label class="col-sm-2 control-label">Description</label>
									<div class="col-sm-10">
										<input type="text" name="linedata[0][description]" class="form-control input-sm" value="<?= $l['id']['description']; ?>">
									</div>
								</div>
								
								<div>
								<label class="col-sm-2 control-label">Price</label>
									<div class="col-sm-10">
										<input type="text" name="linedata[0][price]" class="form-control input-sm" value="<?= $l['id']['price']; ?>">
									</div>
								</div>
								<div>
									<label class="col-sm-2 control-label">Qty</label>
									<div class="col-sm-10">
										<input type="text" name="linedata[0][qty]" class="form-control input-sm" value="<?= $l['id']['qty'] ;?>">
									</div>
								</div>
								<div>
									<label class="col-sm-2 control-label">procent tva</label>
									<div class="col-sm-10">
										<input type="text" name="linedata[0][vat_percentage]" class="form-control input-sm" value="<?= $l['id']['vat_percentage'] ;?>">
									</div>
								</div>	

								<div>
									<div class="col-sm-offset-2 col-sm-10">
										<input type="hidden"  name="invoice_id">
									</div>
								</div> 
								<br>
						<?php }
						
						?>
								<br><br>
								<div>
								<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" name="update_invoice" value="Update invoice" class="btn btn-sm btn-warning">
								</div>
						</div>

						<br><br>

						
						<?php
						form_close();
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>