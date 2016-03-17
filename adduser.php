<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'minordb');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
$username= $_POST['username'];
$password= $_POST['password'];
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
$sql = "INSERT into userdata VALUES ('$username','$password')";
				$delete = mysql_query($sql);

?>