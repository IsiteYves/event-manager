<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">
</head>
<body>
  <h1 class="app-title">EVENT MANAGER</h1>
  <div class="container mt-5">
    <div class="my-3">
        <h4 class="panel-heading">Login To Event Manager</h4>
    </div>
    <div class="panel-body">
      <?php
        $success_msg= $this->session->flashdata('success_msg');
        $error_msg= $this->session->flashdata('error_msg');
        if($success_msg){
      ?>
      <div class="alert alert-success">
        <?php echo $success_msg; ?>
      </div>
      <?php
        }
        if($error_msg){
      ?>
      <div class="alert alert-danger">
        <?php echo $error_msg; ?>
      </div>
      <?php
        }
      ?>
      <form method="post" action="<?php echo base_url('Login/login_process'); ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="user_name" class="form-control" value="<?php echo set_value('user_name');?>">
          <span class="text-danger"><?php echo form_error('user_name')?></span>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password');?>">
          <span class="text-danger"><?php echo form_error('user_password')?></span>
        </div>
        <div class="form-group">
          <input type="submit" name="create" value="Login" class="btn btn-success create-event mt-2 col-md-5">
        </div>
      </form>
      <center><a href="<?php echo base_url('forgotpassword'); ?>">Forgot password</a></center><!--for centered text-->
      <center class="my-3"><b>Do not have an account? </b> <br></b><a href="<?php echo base_url('register'); ?>">Register here</a></center><!--for centered text-->
    </div>
  </div>

</body>
</html>
