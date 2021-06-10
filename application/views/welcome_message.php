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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1681f60826.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">
</head>
<body>
<div class="navbar-div">
        <h1 class="app-title">EVENT MANAGER</h1>
        <?php print_r($user_info);?>
        <div class="navbar-main-content">
            <nav>
                <ul>
                    <li><a href="" class="active">Events</a></li>
                    <li><a href="#">Notifications</a></li>
                </ul>
            </nav>
            <div class="profile-info">
                <img src="../event_images_uploads/5e98b4cc92619ada2fb8c524ad40f1f4.jpg" alt="Profile picture" class="profilePic">
                <h2 class="profile-name">Pacis</h2>
                <label for="check"><i class="fas fa-user-cog"></i></label>
                <input type="checkbox" id="check">
                <div class="user-option">
                    <a href="profile"><i class="fas fa-user"></i>Profile</a>
                    <a href="logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </div>
            </div>
        </div>
    </div>
    <a href="<?php echo base_url();?>createEvent" class="btn btn-success mt-2 new-event-btn"><i class="fas fa-calendar-plus"></i>New Event</a>
      <div class="row col-sm-12">
            <?php
                foreach ($data as $value_data){
                        $event_id = $value_data['event_id'];
                        $event_name = $value_data['event_name'];
                        $event_description = $value_data['event_description'];
                        $event_duration = $value_data['event_duration'];
                        $event_image = "../event_images_uploads/".$value_data['event_image'];
                        echo '
                        <div class="card mt-2 mb-1 col-sm-1" style="width: 16rem;">
                            <img class="card-img-top" src='.$event_image.' alt='.$event_name.'>
                            <div class="card-body">
                                <h5 class="card-title">'.$event_name.'</h5>
                                <p class="card-text ellipsis-content">'.$event_description.'</p>
                                <div class="read-more-option">
                                    <a href='.base_url() ."event/".$event_id.' class="btn btn-success read-more col-sm-11">Read More</a>                           
                                    <label for="check-post"><i class="fas fa-ellipsis-v"></i></label>
                                    <input type="checkbox" id="check-post">
                                    <div class="post-option">
                                        <a href="event/delete/'.$event_id.'"><i class="fas fa-trash-alt text-danger"></i>Delete</a>
                                    </div>
                                </div>
                                <p class="card-text duration text-secondary col-sm-12">'.$event_duration.'</p>
                            </div>
                        </div>
                        ';
                    
                    }
            ?>
      </div>
</body>
</html>