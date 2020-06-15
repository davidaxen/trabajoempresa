<?php 
include('bbdd.php');


$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-respuesta";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 

$idemprempl=ltrim ( substr($cod,2,3), "0");
$idempl=ltrim ( substr($cod,6,3), "0");

$sql="SELECT nombre, 1apellido, 2apellido from empleados where idempresa='".$idemprempl."' and idempleado='".$idempl."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result datosempl");
$row=mysqli_num_rows($result);

if($row==1){;
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
$papellido=$resultado['1apellido'];
$sapellido=$resultado['2apellido'];
$total=$nombre.' '.$papellido.' '.$sapellido;
$rep=$total;
}else{;
$rep="error";
	};
?>

