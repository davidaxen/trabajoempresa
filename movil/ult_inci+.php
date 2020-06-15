<?php 
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ult_inci+";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 


$sql1 = "SELECT id,dia,hora,asunto,texto from almpcinci where idempresas='".$idempresa."' and  idpiscina='".$idcomunidad."' and plus='1' order by id desc limit ".$valor.", 5";
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
$hora=$resultado1['hora'];
$texto=$resultado1['texto'];
$asunto=$resultado1['asunto'];
$total=$dia."#".$hora."#".$asunto."#".$texto."#".$id."<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
