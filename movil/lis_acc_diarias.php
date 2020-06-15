<?php 
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-lis_acc_diarias";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 


$sql1 = "SELECT * from codservicios where idempresas='".$idempresa."' and  idclientes='".$idclientes."' and  idpccat='3' and activo='1' order by idpcsubcat asc";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet2");
$row=mysqli_num_rows($result1);
if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
mysqli_data_seek($result1, $j);
$resultado1=mysqli_fetch_array($result1);
$idpccat=$resultado1['idpccat'];
$idpcsubcat=$resultado1['idpcsubcat'];

$sql11 = "SELECT * from puntservicios where idempresas='".$idempresa."' and  idpccat='3' and  idpcsubcat='".$idpcsubcat."'";
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet2");
$resultado11=mysqli_fetch_array($result11);
$nombre=$resultado11['subcategoria'];
$total=$idpccat."#".$idpcsubcat."#".strtoupper($nombre);

$total.="<.>";
$rep=$rep.$total;
}

}


echo ($rep);

?>
