<?php 
include('bbdd.php');



$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-alta-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 




$sql="SELECT nombre, 1apellido, 2apellido, idempleado from empleados where idempresa='".$idempresa."' and idempleado='".$idempleado."' and estado='1'";
$result=mysqli_query($conn,$sql) or die ("Invalid result datosempl");
$row=mysqli_num_rows($result);



if($row==1){;
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
$papellido=$resultado['1apellido'];
$sapellido=$resultado['2apellido'];
$idempl=$resultado['idempleado'];

$total=$nombre.' '.$papellido.' '.$sapellido;
$rep=$idempl;
}else{;
$rep="error";
	};
$gt="idempresa-".$rep."-alta-esp";
$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos");
echo ($rep);
?>
