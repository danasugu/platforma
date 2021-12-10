<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add products</title>
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
          <h1>Add Invoice</h1>
					<div class="panel-body">
						<?php echo form_open('main_controller/add_invoice','class="form-horizontal"');
						?>
						<div class="form-group">
							<label class="col-sm-2 control-label">Invoice Number</label>
							<div class="col-sm-2">
							<input type="text" name="invoice_number" class="form-control input-sm" >
 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Invoice Prefix</label>
							<div class="col-sm-2">
								<input type="text" name="invoice_prefix" class="form-control input-sm" >
				 
							</div>
						</div>
						 <h6>linia 1</h6>
						<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
							 <div class="col-sm-10">
							<input type="text" name="description" class="form-control input-sm" >
							 </div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Price</label>
							<div class="col-sm-10">
								<input type="text" name="price" class="form-control input-sm" >
							</div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Qty</label>
						<div class="col-sm-10">
						<input type="text" name="qty" class="form-control input-sm" >
						</div>
						</div>


						<h6>linia 2</h6>
						<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
							 <div class="col-sm-10">
							<input type="text" name="description" class="form-control input-sm" >
							 </div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Price</label>
							<div class="col-sm-10">
								<input type="text" name="price" class="form-control input-sm" >
							</div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Qty</label>
						<div class="col-sm-10">
						<input type="text" name="qty" class="form-control input-sm" >
						</div>
						</div>

						<h6>linia 3</h6>
						<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
							 <div class="col-sm-10">
							<input type="text" name="description" class="form-control input-sm" >
							 </div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Price</label>
							<div class="col-sm-10">
								<input type="text" name="price" class="form-control input-sm" >
							</div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Qty</label>
						<div class="col-sm-10">
						<input type="text" name="qty" class="form-control input-sm" >
						</div>
						</div>
 

						<div class="form-group">
						<label class="col-sm-2 control-label">procent tva</label>
						<div class="col-sm-10">
						<input type="text" name="vat" class="form-control input-sm" >
						</div>
						</div>


						<br>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" name="add_product" value="Add invoice" class="btn btn-sm btn-info">
							</div>
						</div>
						
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