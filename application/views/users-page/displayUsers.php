<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Display Users</title>
	<link rel="shortcut icon" href="../../../images/logo.ico" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/1681f60826.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css">
</head>

<body>
	<div class="navbar-div">
		<h1 class="app-title">EVENT MANAGER</h1>
		<div class="navbar-main-content">
			<nav>
				<ul>
					<li><a href="<?php echo base_url(); ?>">Events</a></li>
					<li><a href="<?php echo base_url(); ?>places">Places</a></li>
					<li><a href="" class="active">Users</a></li>
				</ul>
			</nav>
			<div class="profile-info">
				<img src="../event_images_uploads/<?php echo $user_info[0]['profilePicture'] ?>" alt="Profile picture" class="profilePic">
				<div class="user_role">
				    <h2 class="profile-name"><?php echo $user_info[0]['user_name']?></h2>
					<p><?= $role_info[1] ?></p>
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

	<a href="<?php echo base_url(); ?>users/pdfExport" target="_blank" class="btn btn-success pdf-export-btn">Export to Pdf</a>

	<div class="table-container table-responsive mt-3">
		<table class="table table-bordered table-hover table-striped">
			<thead class="table-dark">
				<tr>
					<th>User Id</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Email</th>
					<th>Username</th>
					<th>Events</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$role = $user_info[0]['roleId'];
				foreach ($data as $user_data) {
					$userId = $user_data['userId'];
					$firstName = $user_data['first_name'];
					$lastName = $user_data['last_name'];
					$email = $user_data['email'];
					$username = $user_data['user_name'];
					$events = $user_data['events'];
					echo "
                        <tr>
                            <td>$userId</td>
                            <td>$firstName</td>
                            <td>$lastName</td>
                            <td>$email</td>
                            <td>$username</td>
                            <td>$events events</td>
                    ";
					if ($role == 1) {
						echo "<td><a href='" . base_url() . "users/delete/$userId' class='btn btn-danger'>Delete</a></td>";
					}
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
		<div><?php echo $links; ?></div>
	</div>
</body>

</html>
