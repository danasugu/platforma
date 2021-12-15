<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if( !$_SESSION['u_email'] ){
  redirect('index.php/main_controller/login', 'refresh');
}
$id=$this->uri->segment(3);
?>
<!-- Welcome, <?php echo $_SESSION['u_email']; ?> -->

<?php 
$this->load->view('header');
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit invoice</title>
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
          				<h1>Edit / Update Invoice</h1>
					<div class="panel-body">
					
					<?php
						$invoice_details = $this->db->get_where('invoices', array('id' => $id ));
					
						foreach ($invoice_details->result() as $invoice)
					
					{?>
					
						<?php echo form_open('index.php/main_controller/update_invoice_process/'.$invoice->id,'class="form-horizontal"');
					
					?>

						<div class="form-group">
							<label class="col-sm-2 control-label">Invoice Number</label>
							<div class="col-sm-2">
							<input type="text" name="invoice_number" class="form-control input-sm" value="<?= $invoice->invoice_number ?>" >
 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Invoice Prefix</label>
							<div class="col-sm-2">
								<input type="text" name="invoice_prefix" class="form-control input-sm" value="<?= $invoice->invoice_prefix ?>" >
				 
							</div>
						</div>


						<?php
						form_close();
					?>
					<?php }

					?>


					<?php
						$invoices_lines_details = $this->db->get_where('invoices_lines', array('invoice_id' => $id ));
					
						foreach ($invoices_lines_details->result() as $invoices_lines)
					
					{?>
					
						<?php echo form_open('index.php/main_controller/update_invoice_process/'.$invoice->id,'class="form-horizontal"');
					
					?>

						<h6>linia 1</h6>
						<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
							 <div class="col-sm-10">
							<input type="text" name="description_l1" class="form-control input-sm"  value="<?= $invoices_lines->description_l1 ?>" >
							 </div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Price</label>
							<div class="col-sm-10">
								<input type="text" name="price_l1" class="form-control input-sm" value="<?= $invoices_lines->price_l1 ?>" >
							</div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Qty</label>
						<div class="col-sm-10">
						<input type="text" name="qty_l1" class="form-control input-sm" value="<?= $invoices_lines->qty_l1 ?>" >
						</div>
						</div>


						<h6>linia 2</h6>
						<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
							 <div class="col-sm-10">
							<input type="text" name="description_l2" class="form-control input-sm" value="<?= $invoices_lines->description_l2 ?>" >
							 </div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Price</label>
							<div class="col-sm-10">
								<input type="text" name="price_l2" class="form-control input-sm" value="<?= $invoices_lines->price_l2 ?>" >
							</div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Qty</label>
						<div class="col-sm-10">
						<input type="text" name="qty_l2" class="form-control input-sm" value="<?= $invoices_lines->qty_l2 ?>" >
						</div>
						</div>

						<h6>linia 3</h6>
						<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
							 <div class="col-sm-10">
							<input type="text" name="description_l3" class="form-control input-sm" value="<?= $invoices_lines->description_l3 ?>" >
							 </div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Price</label>
							<div class="col-sm-10">
								<input type="text" name="price_l3" class="form-control input-sm" value="<?= $invoices_lines->price_l3 ?>" >
							</div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Qty</label>
						<div class="col-sm-10">
						<input type="text" name="qty_l3" class="form-control input-sm" value="<?= $invoices_lines->qty_l3 ?>" >
						</div>
						</div>
 

						<div class="form-group">
						<label class="col-sm-2 control-label">procent tva</label>
						<div class="col-sm-10">
						<input type="text" name="vat_percentage" class="form-control input-sm" value="<?= $invoices_lines->vat_percentage ?>" >
						</div>
						</div>


						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							<input type="hidden"  name="invoice_id">
							</div>
						</div>
						<br>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" name="add_invoice" value="Update invoice" class="btn btn-sm btn-info">
							</div>
						</div>
						
						
						<?php
						form_close();
					?>
					<?php }

					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>