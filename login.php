<html>
	<head>
		<meta name="generator"
		content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
		<link rel="stylesheet" href="css/sticky-footer-navbar.css" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<title>Admin Panel</title>

	</head>
	<body>
		<?php
		require_once ('navbar.php');
		?>

		<div class="container">
			<div class="loginbox" style="width: 400px; background-color:#eee; margin:auto; padding:30px; border: 1px solid #ddd; border-radius: 3px;">
				<h3 style="color:#777 ; border-bottom:1px solid #bbb; margin-bottom: 20px;">Admin Login</h3>
				<?php
				if (isset($_GET['err'])) {
					if ($_GET['err'] == 1) {
						echo "<div class='alert alert-warning' role='alert'> <span class='glyphicon glyphicon-warning-sign'></span> Username can't be empty !</div>";
					}

					if ($_GET['err'] == 2) {
						echo "<div class='alert alert-warning' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Please enter a password !</div>";
					}

					if ($_GET['err'] == 3) {
						echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove'></span>  Wrong username or password !</div>";
					}
					if ($_GET['err'] == 4) {
						echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove'></span>  Login First to continue !</div>";
					}
				}
				?>
				<form class="form-horizontal" action="submit.php" method="POST" role="form">
					<div class="form-group">
						<label for="logintype" class="col-sm-4 control-label">Login Type</label>
						<div class="col-sm-8">
							<select id="logintype" name="logintype" class="form-control">
								<option id="maintainer">Maintainer</option>
								<option id="admin">Admin</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="username" class="col-sm-4 control-label">Username</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php
							if (isset($_COOKIE['unamecookie']))
								echo $_COOKIE['unamecookie'];
 ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-4 control-label">Password</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="password" placeholder="Password" name="password" />
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-10">
							<button type="submit" class="btn btn-default">
								Sign in
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<?php
		require_once ('footer.php');
		?>
	</body>
</html>
