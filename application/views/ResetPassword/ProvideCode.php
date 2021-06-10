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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/1681f60826.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css">
</head>

<body class="bg-light">
	<div class="container bg-white">
		<h4 class="panel-heading my-3">We sent you a Code.</h4>
		<div class="d-flex justify-content-center">
			<p class="w-50 text-center">A code was sent to your email .Type it down below to continue.</p>
		</div>
		<div class="panel-body">
			<?php
			if ($this->session->flashdata('message')) {
				echo '<div class="alert alert-danger">
                            ' . $this->session->flashdata('message') . '
                       </div>';
			}
			?>
			<form method="post" action="<?php echo base_url(); ?>ProvideCode/validation" enctype="multipart/form-data">
				<div class="form-group my-3 w-75 email-holder">
					<label>Received Code:</label>
					<input class="form-control" type="text" value="<?php echo set_value('received_code') ?>" name="received_code">
					<span class="text-danger"><?php echo form_error('received_code') ?></span>
				</div>
				<div class="form-group">
					<input type="submit" name="continue" value="Continue" class="btn btn-success create-event mt-2 col-md-5">
				</div>
			</form>
		</div>
	</div>
</body>

</html>
