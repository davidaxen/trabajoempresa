<?php 
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-comprobar_estado-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 




$sql="SELECT estado from clientes where idempresas='".$idempresa."' and idclientes='".$idcomunidad."'";
$result=mysqli_query($conn,$sql) or die ("Invalid result datosempl");
$row=mysqli_num_rows($result);
if($row==1){;
$resultado=mysqli_fetch_array($result);
$estado=$resultado['estado'];
$rep=$estado;
}else{;
$rep="0";
	};
echo ($rep);

?>