<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register User</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/1681f60826.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">
  </head>
  <body>
  <h1 class="app-title">EVENT MANAGER</h1>
<span style="background-color:red;">
<div class="container mt-5"><!-- container class is used to centered  the body of the browser with some decent width-->
<h4 class="panel-heading">Register To Event Manager</h4>
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

                      <form role="form" method="post" action="<?php echo base_url('user/register_user'); ?>">
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Please enter Name" name="user_name" type="text" autofocus>
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Please enter E-mail" name="user_email" type="email" autofocus>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Enter Password" name="user_password" type="password" value="">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Enter Age" name="user_age" type="number" value="">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Enter 10 diMobile No" name="user_mobile" type="number" value="">
                              </div>

                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >

                          </fieldset>
                      </form>
                      <center><b>You have Already registered ?</b> <br></b><a href="<?php echo base_url(''); ?>"> Please Login</a></center><!--for centered text-->
                  </div>
              </div>
          </div>
      </div>
  </div>





</span>




  </body>
</html>