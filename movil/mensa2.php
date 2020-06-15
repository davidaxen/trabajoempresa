<?php 
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-mensa2";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 

$sql1 = "SELECT * from mensajes where idempresa='".$idempresa."' and  idempleado='".$idempleado."' and respondido='1' order by id desc limit ".$valor.", 5";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");
$row=mysqli_num_rows($result1);
if ($row==0){
	$rep=0;}else{
	
for($j=0;$j<$row;$j++){;
mysqli_data_seek($result1, $j);
$resultado1=mysqli_fetch_array($result1);
$id=$resultado1['id'];
$dia=$resultado1['dia'];
$diat=strtok($dia," ");
$horat=strtok(" ");
$texto=$resultado1['texto'];
$diaresp=$resultado1['diaresp'];
$horaresp=$resultado1['horaresp'];
$resp=$resultado1['respuesta'];
$total=$id."#".$diat."#".$horat."#".$texto."#".$diaresp."#".$horaresp."#".$resp."<.>";
$rep=$rep.$total;
}}

echo ($rep);
?>