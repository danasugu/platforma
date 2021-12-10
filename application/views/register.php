<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
     <div class="row">
         <div class="col-lg-4 col-md-4 col-lg-oush-4 col-md-push-4">
             <div class="card-group" style="margin-top:50px;"></div>
             <div class="card-header">Register</div>
             <div class="card-body">

                <?php echo form_open('index.php/main_controller/register_process'); ?>
                <div class="form-group">
                    <input type="text"   name='u_email' class="form-control input-sm" placeholder="Email" required>
                </div>
                
                <div class="form-group">
                    <input type="password"   name='u_pass' class="form-control input-sm" placeholder="Password" required>
                </div>
                <br>
                <div class="form-group">

                    <input type="submit" name="u_reg"  value="Register" class="btn btn-info btn-sm">
                     
                    <!-- <a href="http://platforma.lo/index.php/main_controller/login_process" class="btn btn-warning btn-sm">Login as Admin</a> -->
                    <a href="<?= site_url() ?>" class="btn btn-warning btn-sm">Login as Admin</a>
                </div>

                <?php echo form_close(); ?>

             </div>
         </div>
     </div>
 </div>