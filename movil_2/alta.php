<?
include('bbdd.php');



$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-alta-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 




$sql="SELECT nombre, 1apellido, 2apellido, idempleado from empleados where idempresa='".$idempresa."' and idempleado='".$idempleado."' and estado='1'";
$result=mysql_query ($sql) or die ("Invalid result datosempl");
$row=mysql_affected_rows();



if($row==1){;
$nombre=mysql_result($result,0,'nombre');
$papellido=mysql_result($result,0,'1apellido');
$sapellido=mysql_result($result,0,'2apellido');
$idempl=mysql_result($result,0,'idempleado');

$total=$nombre.' '.$papellido.' '.$sapellido;
$rep=$idempl;
}else{;
$rep="error";
	};
$gt="idempresa-".$rep."-alta-esp";
$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos");
echo ($rep);
?>
