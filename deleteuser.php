<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'minordb');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
$sql = "DELETE from userdata WHERE username='" . $name . "';";
				$delete = mysql_query($sql);
				?>