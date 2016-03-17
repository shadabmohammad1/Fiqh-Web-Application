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
		<title>Admin Panel</title>
	</head>
	<body>
		<script type="text/javascript">
			function deleteUser() {

				$.get("deleteuser.php");
				return false;
			}
</script>
	
		<?php
		session_start();
		if (!isset($_SESSION['username'])) {
			header("Location: login.php?err=4");
			die();
		}
		?>
		<?php
		require_once ('navbar.php');
		?>
		<a href="logout.php"><button class="btn btn-danger pull-right">Sign Out</button></a>
		<div class="container">
			<h3 class="page-header">Existing Users</h3>
			<?php
			function deleteuser($name) {
				$sql = "DELETE from userdata WHERE username=$name";

				echo "#";
			}
			?>
			<?php
			$mysqli= new mysqli("localhost", "root", "","minordb");
			$sql = "SELECT username, password FROM userdata";
			$maintainerlist= $mysqli->query($sql);
			if($maintainerlist)
			{
				echo"<table class='table'>
				<tr>
					<th>Username</th>
					<th>Action</th>
				</tr>";
				
			while($maintainer = $maintainerlist->fetch_array())
			{
				
			?>
			<tr>
				<td><?php echo $maintainer['username']; ?></td>
				<td><a href="#" onclick="deleteUser();"><button>Remove</button></a></td>
			</tr>
				
			
			<?php
			}
			echo "</table>";
			}
			?>
			<h3 class="page-header">Add User</h3>
			<form class="form-horizontal" role="form" method="POST" action="adduser.php">
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-5">
      <button type="submit" class="btn btn-default">Add User</button>
    </div>
  </div>
</form>
		</div>

		<?php
		require_once ('footer.php');
		?>
	</body>
</html>