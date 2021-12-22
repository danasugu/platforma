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
         			<h1> Invoice Payment</h1>
					<br>
					<?php echo form_open('index.php/main_controller/multiple_payments/'.$id, 'class="form-horizontal"'); ?>
					<?php $invoice_data = $this->db->get_where('invoices', array('id' => $id));
						
						foreach($invoice_data->result() as $invoice)  
						{ ?>

						<input type="text" name="invoice_id" hidden class="form-control input-sm" value="<?php echo $invoice->id ?>">

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
						<div class="form-group">
							<label class="col-sm-2 control-label"><strong>Total</strong></label>
							<div class="col-sm-2">
								<input type="text" name="total" class="form-control input-sm" value="<?php echo $invoice->total ?> lei">
							</div>
						</div>
						<br>



						
							<input type="text" name="pay_now"  />
						
					
				
									 
										<input type="submit" name="pay"  class="btn btn-sm btn-warning" />
									 


					<?php echo form_close(); }?>

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

	 
</body>
</html>