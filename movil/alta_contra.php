<?php 
include('bbdd.php');
include('../yo.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-alta_contra-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($password, METHOD, $key, 0, $iv);
			$password=base64_encode($output);


$sql1="select * from usuarios where user='".$user."' and password='".$password."'";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datosempl");
$row1=mysqli_num_rows($result1);



if($row1==1){;
$resultado1=mysqli_fetch_array($result1);
$idempresa=$resultado1['idempresas'];
$idempl=$resultado1['idempleados'];


$sql="SELECT * from empleados where idempresa='".$idempresa."' and idempleado='".$idempl."'";
//echo $sql;
$result=mysqli_query($conn,$sql) or die ("Invalid result datosempl");

$row=mysqli_num_rows($result);
if($row==1){;
$resultado=mysqli_fetch_array($result);
$estado=$resultado['estado'];
$idempresa=$resultado['idempresa'];
$idempleado=$resultado['idempleado'];
$nombre=$resultado['nombre'];
$priape=$resultado['1apellido'];
$segape=$resultado['2apellido'];

$rep=$idempresa.";".$idempleado.";".$nombre." ".$priape." ".$segape;
}else{;
$rep="error";
	};
	
}else{;
$rep="error";
};	
	
echo ($rep);

?>