<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if( !$_SESSION['u_name'] ){
redirect('home', 'refresh');
 }
 ?>
Welcome, <?php echo $_SESSION['u_name']; ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <title>Dashboard</title>
  </head>
  <body>
<!--dash nav -->
<?php
// $this->load->view('nav');
 ?>
<div class="container">
     <div class="row">
         <div class="col-lg-4 col-md-4 col-lg-oush-4 col-md-push-4">
             <div class="card-group" style="margin-top:50px;"></div>
             <div class="card-header">Login / Register</div>
             <div class="card-body">
                <?php echo form_open('main_controller/login_process'); ?>
                <div class="form-group">
                    <input type="text"   name="u_name" class="form-control input-sm" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password"   name="u_pass" class="form-control input-sm" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="u_login"  value="Login as Admin" class="btn btn-success btn-sm">
                    <a href="<?= site_url() ?>main_controller/register_process" class="btn btn-warning btn-sm">Register</a>
                </div>
<!-- <div class="card-footer">@2021</div> -->
                <?php echo form_close(); ?>
             </div>
         </div>
     </div>
 </div>