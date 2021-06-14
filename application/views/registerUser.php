<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css">
	<title>Document</title>
</head>

<body>
	<h1 class="app-title">EVENT MANAGER</h1>
	<div class="container">
		<h4 class="panel-heading my-3">Register To Event Manager</h4>
		<div class="panel-body">
			<?php
			if ($this->session->flashdata('message')) {
				echo '<div class="alert alert-danger">
                            ' . $this->session->flashdata('message') . '
                       </div>';
			}
			?>
			<form method="post" action="<?php echo base_url(); ?>register/validation" enctype="multipart/form-data">
				<div class="form-group">
					<label>First Name</label>
					<input type="text" name="first_name" class="form-control" value="<?php echo set_value('first_name'); ?>">
					<span class="text-danger"><?php echo form_error('first_name') ?></span>
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" name="last_name" class="form-control" value="<?php echo set_value('last_name'); ?>">
					<span class="text-danger"><?php echo form_error('last_name') ?></span>
				</div>
				<div class="form-group">
					<label for="user_role">Your role:</label>
					<select class="form-control" id="user_role" name="user_role" required>
						<option value="">Choose role</option>
						<option value="1">Administrator</option>
						<option value="2">Manager</option>
						<option value="3">Standard</option>
					</select>
					<span class="text-danger"><?php echo form_error('user_role') ?></span>
				</div>
				<div class="form-group">
					<label>Username</label>
					<input class="form-control" type="text" value="<?php echo set_value('user_name'); ?>" name="user_name">
					<span class="text-danger"><?php echo form_error('user_name') ?></span>
				</div>
				<div class="form-group">
					<label for="district">Your role:</label>
					<select class="form-control" id="district" name="district" required>
						<option value="">Choose district</option>
					</select>
					<span class="text-danger"><?php echo form_error('user_role') ?></span>
				</div>
				<div class="form-group">
					<label for="sector">Your role:</label>
					<select class="form-control" id="sector" name="sector" required>
						<option value="">Choose sector</option>
					</select>
					<span class="text-danger"><?php echo form_error('user_role') ?></span>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" type="email" name="user_email" value="<?php echo set_value('user_email'); ?>">
					<span class="text-danger"><?php echo form_error('user_email') ?></span>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" type="password" value="<?php echo set_value('password'); ?>" name="password">
					<span class="text-danger"><?php echo form_error('password') ?></span>
				</div>
				<div class="form-group">
					<input type="submit" name="create" value="Register" class="btn btn-success create-event mt-2 col-md-5">
				</div>
			</form>
			<center class="my-3"><b>Already have an account? </b> <br></b><a href="<?php echo base_url('login'); ?>">Login here</a></center>
			<!--for centered text-->
		</div>
	</div>

</body>

</html>
