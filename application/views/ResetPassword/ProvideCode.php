<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Code sent to your email!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css">
</head>

<body class="bg-light">
	<div class="container bg-white reset-div">
		<h4 class="panel-heading my-3">We sent you a code.</h4>
		<div class="d-flex justify-content-center">
			<p class="w-50 text-center">A code was sent to your email <b><?php if($this->session->flashdata('email')) {
				echo $this->session->flashdata('email');
			}else{redirect('/forgotpassword');}?></b>.Type it down below to continue.</p>
		</div>
		<div class="panel-body">
			<form method="post" action="<?= base_url() ?>ProvideCode/validation" enctype="multipart/form-data">
				<div class="form-group my-3 w-75 email-holder">
					<label>Received Code:</label>
					<input class="form-control" type="text" name="prov_code" value="<?= set_value('prov_code')?>" autocomplete="off">
					<span class="text-danger"><?php echo form_error('prov_code')?></span>
					<span class="text-danger"><?php if($this->session->flashdata('vcode_error')) {echo $this->session->flashdata('vcode_error');} ?></span>
					<input type="hidden" name="email" value="<?= $this->session->flashdata('email')?>">
					<div class="form-group my-3">
						<input type="submit" name="continue" value="Continue" class="btn btn-success create-event mt-2 col-md-5">
					</div>
					<div class="text-center my-3">
				    <a href="<?= base_url() ?>ForgotPassword">Back</a>
				</div>
			</form>
		</div>
	</div>
</body>

</html>
