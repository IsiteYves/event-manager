<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>You forgot your password</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/1681f60826.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css">
</head>

<body class="bg-light">
	<div class="container bg-white reset-div">
		<h4 class="panel-heading my-3">Forgot Password.</h4>
		<div class="d-flex justify-content-center">
			<p class="w-50 text-center">Let's help you get back into your account! First you need to type in your email here below to continue:</p>
		</div>
		<div class="panel-body">
			<?php
			if ($this->session->flashdata('message')) {
				echo '<div class="alert alert-danger">
                            ' . $this->session->flashdata('message') . '
                       </div>';
			}
			?>
			<form method="post" action="<?php echo base_url(); ?>ForgotPassword/validation" enctype="multipart/form-data">
				<div class="form-group my-3 w-75 email-holder">
					<label>E-mail</label>
					<input class="form-control" type="email" value="<?php echo set_value('reset_email') ?>" name="reset_email">
					<span class="text-danger"><?php echo form_error('reset_email') ?></span>
				</div>
				<div class="form-group">
					<input type="submit" name="continue" value="Continue" class="btn btn-success create-event mt-2 col-md-5">
				</div>
				<div class="text-center my-3">
				    <a href="<?= base_url() ?>login">Back to Login</a>
				</div>
			</form>
		</div>
	</div>
</body>

</html>
