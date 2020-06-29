<?
include('bbdd.php');



$sql1 = "SELECT * from mensajes where idempresa='".$idempresa."' and  idempleado='".$idempleado."' and respondido='1' order by id desc limit ".$valor.", 5";
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
$row=mysql_affected_rows();
if ($row==0){
	$rep=0;}else{
	
for($j=0;$j<$row;$j++){;
$id=mysql_result($result1,$j,'id');
$dia=mysql_result($result1,$j,'dia');
$diat=strtok($dia," ");
$horat=strtok(" ");
$texto=mysql_result($result1,$j,'texto');
$diaresp=mysql_result($result1,$j,'diaresp');
$horaresp=mysql_result($result1,$j,'horaresp');
$resp=mysql_result($result1,$j,'respuesta');
$total=$id."#".$diat."#".$horat."#".$texto."#".$diaresp."#".$horaresp."#".$resp."<.>";
$rep=$rep.$total;
}}

echo ($rep);
?>