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
         			<h1>Update Payment</h1>
					<div class="panel-body ">
						<?php 
						$attributes = array('class' => 'repeater');
						echo form_open_multipart('index.php/main_controller/update_invoice_process/'.$id, $attributes);?>
						
						
						<?php $invoice_data = $this->db->get_where('invoices', array('id' => $id));
						
						foreach($invoice_data->result() as $invoice)  
						{ ?>

						<div class="form-group">
							<label class="col-sm-2 control-label"><strong>Invoice Number</strong></label>
							<div class="col-sm-2">
								<input type="text" name="invoice_number" class="form-control input-sm" value="<?php echo $invoice->invoice_number ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"><strong>Invoice Prefix</strong></label>
							<div class="col-sm-2">
								<input type="text" name="invoice_prefix" class="form-control input-sm" value="<?php echo $invoice->invoice_prefix ?>">
							</div>
						</div>

						<!-- start repeat -->
						<div data-repeater-list="linedata">
						
						
							
						<?php
						
						$data['linedata'] = $this->db->get_where('invoices_lines', array('invoice_id' => $id))->result_array();
 
						// echo "<br>";
						// exit();
					 
						$count = 0; 
						foreach( $data['linedata'] as $key => $l )
						{ 
							//  echo "<pre>";
						    //  print_r($data['linedata'] );
							?>
								<div data-repeater-item>	
								

								<div>
								<label style="text-align:left; background-color:aqua;" class="col-sm-2 control-label"><strong>Line: <?= $count + 1; ?> </strong></label>
									
								</div>

							
							 
							 	<div>
								<label class="col-sm-2 control-label"><strong>Description</strong></label>
									<div class="col-sm-10">
										<input type="text" name="linedata[<?= $count; ?>][description]" class="form-control input-sm" value="<?= $l['description']; ?>">
									</div>
								</div>
								
								<div>
								<label class="col-sm-2 control-label"><strong>Price</strong></label>
									<div class="col-sm-10">
										<input type="text" name="linedata[<?= $count; ?>][price]" class="form-control input-sm" value="<?= $l['price']; ?> lei">
									</div>
								</div>
								<div>
									<label class="col-sm-2 control-label"><strong>Qty</strong></label>
									<div class="col-sm-10">
										<input type="text" name="linedata[<?= $count; ?>][qty]" class="form-control input-sm" value="<?= $l['qty']; ?>">
									</div>
								</div>
								<div>
									<label class="col-sm-2 control-label"><strong>Procent tva</strong></label>
									<div class="col-sm-10">
										<input type="text" name="linedata[<?= $count; ?>][vat_percentage]" class="form-control input-sm" value="<?= $l['vat_percentage']; ?>%">
									</div>
								</div>	

								<div>
									<div class="col-sm-offset-2 col-sm-10">
										<input type="hidden" name="invoice_id">
									</div>
								</div> 
								<br>
								
								<!-- <input data-repeater-delete type="button" class="form-control input-sm btn btn-danger" value="Delete"/> -->
								<input type="text"> <input type="submit" value="pay" class="btn btn-warning btn-xs btn-block"/>
							</div>
	
								<br>
								<br>
						 
								
						<?php
						$count++;
					// print_r($data['linedata']); exit();	
					}
						
						?> 
								<br>
								</div>
 
								<input data-repeater-create type="button" class="form-control input-sm btn btn-info"  value="Add new line"/>
								<br>
								<br>
								<div>
									<div class="col-sm-offset-2 col-sm-10">
										<input type="submit" name="update_invoice" value="Update invoice" class="btn btn-sm btn-warning">
									</div>
								</div>

						<br><br>

						
					<?php
					//	unset($l);
						// print_r($data['linedata']); exit();	
						form_close();
					}
					?>



					</div>
				</div>
			</div>
		</div>
	</div>
	
    <!-- <form class="repeater">
    
    <div data-repeater-list="category-group">
      <div data-repeater-item>
        <input type="hidden" name="rx" id="x"/>
       <input type="text" name="cat-title" />
       <input type="text" name="cat-slug" />
       <input data-repeater-delete type="button" value="Delete"/>
      </div>
    </div>
    <input data-repeater-create type="button" value="Add"/>

   
	</form>
  -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="<?= site_url() ?>assets/js/repeat.js"></script>

	<script>
			$(document).ready(function () {
			'use strict';
			window.id = 0;

			$('.repeater').repeater(
			{
				defaultValues: {
					'rx': window.id,
						
						},
				show: function () {
							$(this).slideDown();
			console.log($(this).find('input')[1]);
				$('#x').val(window.id);
						},
						hide: function (deleteElement) {
							if(confirm('Are you sure you want to delete this line?')) {
							window.id--;
								$('#x').val(window.id);
							$(this).slideUp(deleteElement);
							console.log($('.repeater').repeaterVal());
							}
						},
						ready: function (setIndexes) {
						

						}
			}
			);

    });
	</script>
</body>
</html>