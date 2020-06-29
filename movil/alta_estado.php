<?php 
include('bbdd.php');

$valores1 ="  GET ";
$valores1 .= implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));
$valores1 .="  POST ";
$valores1 .= implode(",", array_keys($_POST));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_POST));
$valores1 .="  COOKIE ";
$valores1 .= implode(",", array_keys($_COOKIE));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_COOKIE));

$gt="idempresa-".$valores1."-alta_estado-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 



$sql="SELECT estado from empleados where idempresa='".$idempresa."' and idempleado='".$idempleado."'";
//echo $sql;
//$sql="SELECT estado from clientes where idempresa='".$idempresa."' and idclientes='".$idcomunidad."' and estado='1'";
$result=mysqli_query($conn,$sql) or die ("Invalid result datosempl");
$row=mysqli_num_rows($result);
if($row==1){;
$resultado=mysqli_fetch_array($result);
$estado=$resultado['estado'];
$rep=$estado;
}else{;
$rep="error";
	};
echo ($rep);

?>