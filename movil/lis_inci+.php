<?php 
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="lis_inci+-".$valores1."-lis_inci+";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1 = mysqli_query($conn,$sql1) or die ("Invalid result datos"); 



$sql10 = "SELECT * from almpcinci where idempresas='".$idempresa."' and id='".$idincidencia."'";
//echo $sql10."prueba";
$result10 = mysqli_query ($conn,$sql10) or die ("Invalid result incid");
$row10 = mysqli_num_rows($result10);


if ($row10==0){


$rep=0;
	}else{
	
for($j=0;$j<$row10;$j++){;
mysqli_data_seek($result10, $j);
$resultado10=mysqli_fetch_array($result10);
$id=$resultado10['id'];
$dia=$resultado10['dia'];
$hora=$resultado10['hora'];
$texto=$resultado10['texto'];
$asunto=$resultado10['asunto'];
$idproveedor=$resultado10['idproveedor'];

$sql11 = "SELECT * from proveedores where idempresas='".$idempresa."' and  idproveedor='".$idproveedor."'";
//echo $sql11;
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result proveedor");
$resultado11=mysqli_fetch_array($result11);
$nombreproveedor=$resultado11['nombre'];
$telproveedor=$resultado11['telefono'];

$sql12 = "SELECT * from imginciplus where idempresa='".$idempresa."' and  idsiniestro='".$idincidencia."'";
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result imag");
$row12=mysqli_num_rows($result12);

if($row12==0){
$imagenes="";
}else{
$imagenes="(";
for($ty=0;$ty>$row12;$ty++) {;
mysqli_data_seek($result12);
$resultado12=mysqli_fetch_array($result12);
$img=$resultado12['imgsiniestro'];
$imagenes.=$img."<?php >";
	};
$imagenes.=")";
}

$total=$id."#".$dia."#".$hora."#".$asunto."#".$texto."#".$nombreproveedor."#".$telproveedor."#".$imagenes."<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
