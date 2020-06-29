<?php
$server = "localhost";
$username="root";
$password="";
$dbname ="bbddsmartcbc";

date_default_timezone_set('Europe/Madrid');
$dbh=new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
$dbh->exec("set names latin1");
/*$dbh=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("bbddsmartcbc");
mysql_query("SET CHARACTER SET latin1");
mysql_query("SET NAMES latin1");*/
extract($_COOKIE);
extract($_POST);
extract($_GET);
?>