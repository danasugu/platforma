<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if( !$_SESSION['u_email'] ){
  redirect('index.php/main_controller/login', 'refresh');
}
$id=$this->uri->segment(3);
?>
<!-- Welcome, <?php echo $_SESSION['u_email']; ?> -->

<?php 
  // $this->load->view('header');
//   $this->load->view('nav');
//  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Totals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1></h1>

<!-- dashboard data -->
<div class="container">
  <div class="row">
<div class="col-lg-43 col-md-3">
<!-- sidebar -->
<?php $this->load->view('sidebar'); ?>
<!-- sidebar -->
</div>
<div class="col-lg-9 col-md-9">
<div class="panel-heading"></div>
         			<h1>View Invoices</h1>

<table class="table">
  <thead>
    <tr>
       
      <th scope="col">Invoice number</th>
      <th scope="col">Invoice prefix</th>
      <th scope="col">Total factura</th>
      <th scope="col">Total platit</th>
      <th scope="col">Rest de plata</th>
      <th scope="col">Edit / Update</th>
      <th scope="col">Delete</th>
 
    </tr>

  </thead>
  <tbody>

    <?php
    
      
    

     
      
      foreach($invoices as $invoice)
      { 
        
    ?>
    <tr>
     
      <td > <?= $invoice->invoice_number; ?> </td>
      <td ><?= $invoice->invoice_prefix; ?> </td>
      <td ><?= $invoice->total; ?> </td>
      <td ><?= $invoice->total_paid; ?> </td>
      <td ><?= $invoice->remaining_payment; ?> </td>
      <!-- <td> <a href="<?= site_url() ?>index.php/main_controller/single_invoice/<?= $invoice->id; ?>" class="btn btn-success btn-xs btn-block">view details</a> </td> -->
      <td> <a href="<?= site_url() ?>index.php/main_controller/update_invoice/<?= $invoice->id; ?>" class="btn btn-info btn-xs btn-block">edit/update</a></td>
      <td> <a href="<?= site_url() ?>index.php/main_controller/delete_invoice/<?= $invoice->id; ?>" class="btn btn-danger btn-xs btn-block">delete </td>

    </tr>

    <?php 
       }

	?>

    
  </tbody>
</table>
     
</div>
  </div>
</div>
<!-- dashboard data -->





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>