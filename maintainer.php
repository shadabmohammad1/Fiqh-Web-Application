<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
		<link rel="stylesheet" href="css/sticky-footer-navbar.css" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<title>Maintainer Panel</title>
	</head>
	<body>
		<?php
			session_start();
			if(!isset($_SESSION['username']))
			{
				header("Location: login.php?err=4");
				die();
			}
		?>
		<?php
		require_once ('navbar.php');
		?>
		<div class="container">

			<a href="logout.php"><button class="btn btn-danger">Sign Out</button></a>
		</div>

		<?php
		require_once ('footer.php');
		?>
	</body>
</html>