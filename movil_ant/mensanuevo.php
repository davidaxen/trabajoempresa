<?
include('bbdd.php');

$sql1 = "SELECT id,dia,texto from mensajes where idempresa='".$idempresa."' and  idempleado='".$idempleado."' and respondido='0' order by id desc limit ".$valor.", 5";
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
$row=mysql_affected_rows();

echo ($row);
?>