<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reset your password</title>
	<link rel="shortcut icon" href="../../../images/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css">
</head>

<body class="bg-light">
	<div class="container bg-white reset-div">
		<h4 class="panel-heading my-3">Reset password.</h4>
		<div class="d-flex justify-content-center">
			<p class="w-50 text-center"><b><?php if($this->session->flashdata('email')) {echo $this->session->flashdata('email');}else{redirect('login');} ?></b> confirmed. Finally type in your new password and confirm it.</p>
		</div>
		<div class="panel-body">
			<form method="post" action="<?php echo base_url(); ?>ResetPassword/validation" enctype="multipart/form-data">
				<div class="form-group my-3 w-75 email-holder">
					<label>New password:</label>
					<input class="form-control" type="password" value="<?php echo set_value('new_password') ?>" name="new_password">
					<span class="text-danger"><?php echo form_error('new_password') ?></span>
				</div>
				<div class="form-group my-3 w-75 email-holder">
					<label>Confirm new password:</label>
					<input class="form-control" type="password" value="<?php echo set_value('confirmed_new_password') ?>" name="confirmed_new_password">
					<span class="text-danger"><?php echo form_error('confirmed_new_password') ?></span>
					<span class="text-danger"><?php if($this->session->flashdata('passwords_error')) {echo $this->session->flashdata('passwords_error');} ?></span>
					<input type="hidden" name="email" value="<?= $this->session->flashdata('email') ?>">
				</div>
				<div class="form-group">
					<input type="submit" name="pswdResetButton" value="Done" class="btn btn-success create-event mt-2 col-md-5">
				</div>
				<div class="text-center my-3">
				    <a href="<?= base_url() ?>login">Discard and go to Login</a>
				</div>
			</form>
		</div>
	</div>
</body>

</html>
