<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">
</head>
<body>
    <a href="<?php echo base_url();?>" class="back"><i class="fas fa-angle-double-left"></i> Go back</a>
    <img src="<?php  echo base_url()?>event_images_uploads/<?php echo $data[0]['event_image']?>">
    <div class="title">
        <h1><?php echo $data[0]['event_name']?></h1>
    </div>
    <p><?php echo $data[0]['event_description']?></p>
    <h4><span>date: </span><?php echo $data[0]['event_duration']?></h4>
</body>
</html>