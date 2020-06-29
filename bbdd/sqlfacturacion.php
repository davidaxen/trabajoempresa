<?php
date_default_timezone_set('Europe/Madrid');

$server = "localhost";
$username="root";
$password="";

$dbh=new PDO("mysql:host=$server;dbname=pisciso_facturacion", $username, $password);
$dbh->exec("set names latin1");

/*$dbh=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("pisciso_facturacion");
mysql_query("SET CHARACTER SET latin1");
mysql_query("SET NAMES latin1");*/

if (isset($_GET[compactada]))
{
      $a=stripslashes ($_GET[compactada]);
      $mi_array=unserialize($a);
      $compactada=serialize($mi_array);
			$compactada=urlencode($compactada);
$user=$mi_array['user'];        
$pass=$mi_array['pass']; 
$com=$mi_array['com']; 
$img=$mi_array['img']; 
$ide=$mi_array['ide']; 
}

extract($_COOKIE);
extract($_POST);
extract($_GET);
?>