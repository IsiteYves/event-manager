<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display events</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/1681f60826.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">
</head>
<body>
<div class="navbar-div">
        <h1 class="app-title">EVENT MANAGER</h1>
        <div class="navbar-main-content">
            <nav>
                <ul>
                    <li><a href="<?php echo base_url();?>" class="active">Events</a></li>
                    <li><a href="<?php echo base_url();?>places">Places</a></li>
                    <li><a href="<?php echo base_url();?>users">Users</a></li>
                </ul>
            </nav>
            <div class="profile-info">
                <img src="../event_images_uploads/<?php echo $user_info[0]['profilePicture']?>"  alt="Profile picture" class="profilePic">
                <div class="user_role">
				    <h2 class="profile-name"><?php echo $user_info[0]['user_name']?></h2>
					<p><?= $this->session->userdata('role') ?></p>
				</div>
                <label for="check"><i class="fas fa-user-cog"></i></label>
                <input type="checkbox" id="check">
                <div class="user-option">
                    <a href="profile"><i class="fas fa-user"></i>Profile</a>
                    <a href="logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
            <h4 class="panel-heading">Register an Event</h4>
            <div class="panel-body">
                <?php
                   if($this->session->flashdata('message')){
                       echo '<div class="alert alert-danger">
                            '.$this->session->flashdata('message').'
                       </div>';
                   }
                ?>
                <form method="post" action="<?php echo base_url();?>createEvent/validation" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Event name</label>
                        <input type="text" name="event_name" class="form-control" value="<?php echo set_value('event_name');?>">
                        <span class="text-danger"><?php echo form_error('event_name')?></span>
                    </div>
                    <div class="form-group">
                        <label>Event description</label>
                        <input type="text" name="event_description" class="form-control" value="<?php echo set_value('event_description');?>">
                        <span class="text-danger"><?php echo form_error('event_description')?></span>
                    </div>
                    <div class="form-group">
                        <label>Event duration</label>
                        <input class="form-control" type="datetime-local" value="<?php echo set_value('event_duration')?>" name="event_duration" min="<?php $datetime = new DateTime('tomorrow');echo $datetime->format('Y-m-d H:i:s');?>">
                        <span class="text-danger"><?php echo form_error('event_duration')?></span>
                    </div>
                    <label>Event Image</label>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="customFile" name="event_image">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="create" value="Create An Event" class="btn btn-success create-event mt-2 col-md-5">
                    </div>
                </form>
            </div>
    </div>
</body>
</html>
