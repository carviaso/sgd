<?php
// This is an example opendb.php
   include 'config_cppd.php';
   $db = mysql_connect($dbhost, $dbuser, $dbpass);
   mysql_select_db($dbname) or die(mysql_errno() . ": " . mysql_error());

?>