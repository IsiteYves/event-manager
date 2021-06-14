<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">
    <title>Profile</title>
</head>
<body>
<h1 class="app-title">EVENT MANAGER</h1>
<div class="container">
            <h4 class="panel-heading my-3">Register To Event Manager</h4>
            <div class="panel-body">
                <?php
                   if($this->session->flashdata('message')){
                       echo '<div class="alert alert-danger">
                            '.$this->session->flashdata('message').'
                       </div>';
                   }
                ?>
                <form method="post" action="<?php echo base_url();?>update/validation" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $user[0]['first_name']?>">
                        <span class="text-danger"><?php echo form_error('first_name')?></span>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo $user[0]['last_name']?>">
                        <span class="text-danger"><?php echo form_error('last_name')?></span>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <input type="submit" name="create" value="Update Profile" class="btn btn-success mt-2 col-sm-5">
                        <input type="submit" name="create" value="Delete Profile" class="btn btn-danger  mt-2 col-sm-5 ml-5">
                    </div>
                </form>
            </div>
    </div>
    
</body>
</html>

