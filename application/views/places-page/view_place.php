<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View place</title>
    <link rel="shortcut icon" href="../../../images/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">
    <script src="https://kit.fontawesome.com/1681f60826.js" crossorigin="anonymous"></script>
</head>
<body>
    <a href="<?php echo base_url();?>" class="back"><i class="fas fa-angle-double-left"></i> Go back</a>
    <img src="<?php  echo base_url()?>place_images_uploads/<?php echo $data[0]['place_image']?>" class="place-image">
    <div class="title">
        <h1><?php echo $data[0]['place_name']?></h1>
    </div>
    <p><?php echo $data[0]['place_description']?></p>
    <h4><span>Location: </span><?php echo $data[0]['location']?></h4>
</body>
</html>