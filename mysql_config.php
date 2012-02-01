<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_passwd = 'PASSWORD HERE';
$database = 'courselist';

$link = mysql_connect($mysql_host, $mysql_user, $mysql_passwd)
	or die('Could not connect: ' . mysql_error());
mysql_select_db($database) or die('Could not select database');
mysql_set_charset('utf8', $link);
?>
