<?php 
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ult_rev_inci";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 

$sql1 = "SELECT id,dia,hora,idronda,texto, img from almpcronda where idempresas='".$idempresa."' and  idcliente='".$idcomunidad."' and texto not like '' order by id desc limit ".$valor.", 5";
$result1=mysqli_query($conn,$sql1) or die ("Invalid result icarnet");
$row=mysqli_num_rows($result1);
if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
mysqli_data_seek($result1, $j);
$resultado1=mysqli_fetch_array($result1);
$id=$resultado1['id'];
$texto=$resultado1['id'];
$dia=$resultado1['dia'];
$hora=$resultado1['hora'];
$idronda=$resultado1['idronda'];
$texto=$resultado1['texto'];
$imagen=$resultado1['img'];

$sql10 = "SELECT descripcion from puntcont where idempresas='".$idempresa."' and  idclientes='".$idcomunidad."' and idpuntcont='".$idronda."'";$result10=mysqli_query($conn,$sql10) or die ("Invalid result icarnet");
$resultado10=mysqli_fetch_array($result10);
$ronda=$resultado10['descripcion'];
$total=$id."#".$dia."#".$hora."#".$ronda."#".$texto."#".$imagen."<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
