<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'minordb');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
setcookie("unamecookie",$_POST['username']);
if (!isset($_POST['username']) || !isset($_POST['password'])) {
	header("Location: login.php?err=4");
} else if (empty($_POST['username'])) {

	header("Location: login.php?err=1");
} else if (empty($_POST['password'])) {
	header("Location: login.php?err=2");
} else {
	$usernameSubmitted = $_POST['username'];
	$passwordSubmitted = $_POST['password'];
	$logintype= $_POST['logintype'];
	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
	if($logintype=='Maintainer')
	$query = mysql_query("SELECT * FROM userdata where username = '$usernameSubmitted' AND password = '$passwordSubmitted'") or die(mysql_error());
	if($logintype=='Admin')
	 $query = mysql_query("SELECT * FROM admindata where username = '$usernameSubmitted' AND password = '$passwordSubmitted'") or die(mysql_error());
	$row = mysql_fetch_array($query);


	if ($row['username'] == $usernameSubmitted && $row['password'] == $passwordSubmitted) {
		session_start();
		$_SESSION['username'] = $usernameSubmitted;
		if($logintype=='Maintainer')
		header("Location: maintainer.php");
else header("Location: admin.php");
	} else {
		header("Location: login.php?err=3");
	}
}
?>