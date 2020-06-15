<?php 
include('bbdd.php');

$y1=strtok($dia,'-');
$m1=strtok('-');
$d1=strtok('-')+1;
$dia1=$y1.'-'.$m1.'-'.$d1;



$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-alarma-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 






$sql1 = "SELECT * from alarma where idempresas='".$idempresa."' and  idclientes='".$idclientes."' and dia between '".$dia."' and '".$dia1."' order by dia asc, h asc, min asc";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result icarnet");
$row=mysqli_num_rows($result1);

if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
mysqli_data_seek($result1, $j);
$resultado1=mysqli_fetch_array($result1);
$id=$resultado1['id'];
$dia=$resultado1['dia'];
$h=$resultado1['h'];
$min=$resultado1['min'];
$seg=$resultado1['seg'];
$hora=$h.":".$min.":".$seg;
$texto=$resultado1['mensaje'];
$total=$id."#".$dia."#".$hora."#".$texto."<.>";
$rep=$rep.$total;
}}

echo ($rep);
?>