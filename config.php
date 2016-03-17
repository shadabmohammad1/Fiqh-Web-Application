<?php
mysql_connect("localhost","root","");
mysql_select_db("minordb")or die(mysql_error());
mysql_query("SET NAMES 'utf8'"); mysql_query('SET CHARACTER SET utf8');
?>