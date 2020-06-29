<?php 
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-lis_clientes";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 


$sql1 = "SELECT * from clientes where idempresas='".$idempresa."' and estado='1' order by idclientes asc";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet2");
$row=mysqli_num_rows($result1);
if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
mysqli_data_seek($result1, $j);
$resultado1=mysqli_fetch_array($result1);
$idclientes=$resultado1['idclientes'];
$nombre=$resultado1['nombre'];
$total=$idclientes."#".strtoupper($nombre)."<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
