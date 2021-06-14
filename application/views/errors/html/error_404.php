<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Page Not Found</title>
<link rel="stylesheet" href="../../css/styles.css">
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

#container {
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
	width: 90%;
	margin: auto;
	padding: 2rem;
}

p {
	margin: auto;
}
</style>
</head>
<body>
	<div class="navbar-div" id="container">
		<h1 class="app-title">EVENT MANAGER</h1>
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
		<a href="javascript:history.go(-1)" title="Return to previous page">&laquo;Go back</a>
	</div>
</body>
</html>