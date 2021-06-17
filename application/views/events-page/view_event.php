<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $data[0]['event_name'] ?> Event</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css">
</head>

<body>
	<a href="<?php echo base_url(); ?>" class="back"><i class="fas fa-angle-double-left"></i> Go back</a>
	<img src="<?php echo base_url() ?>event_images_uploads/<?php echo $data[0]['event_image'] ?>">
	<div class="title">
		<h1><?php echo $data[0]['event_name'] ?></h1>
	</div>
	<p><?php echo $data[0]['event_description'] ?></p>
	<h4><span>date:</span> <?php echo $data[0]['event_duration'] ?></h4>
	<button type="button" class="btn btn-primary btn-lg invite" data-toggle="modal" data-target="#myModal">Invite</button>

	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Invite people</h4>
				</div>
				<div class="modal-body">
					<form action="#" method="post" enctype="multipart/form-data">
						<input type="search" class="form-control" name="username" id="username" placeholder="Search users..." autocomplete="off" />
					</form>
					<div class="list-group users"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		let field = document.getElementById('username');
		let users = document.getElementsByClassName('users')[0];
		field.onkeyup = function() {
			users.innerHTML = '';
			let q = this.value,
				xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					users.innerHTML = this.responseText;
					console.log(this.responseText);
				}
			}
			xmlhttp.open('GET', '<?= base_url() ?>getUsers?q=' + q, true);
			xmlhttp.send();
		}

		function invite(e, q) {
			let xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					users.innerHTML = this.responseText;
				}
			}
			xmlhttp.open('GET', '<?= base_url() ?>inviteUser?user_id=' + q + '&event_id=<?= $_REQUEST['id'] ?>', true);
			xmlhttp.send();
			alert(`${e.innerHTML} was successfully invited to the ` + "<?= $data[0]['event_name'] ?> event.");
		}
	</script>
</body>

</html>
