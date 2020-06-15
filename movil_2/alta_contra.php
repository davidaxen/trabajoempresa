<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-alta_contra-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 




$sql1="select * from usuarios where user='".$user."' and password='".$password."'";
//echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result datosempl");
$row1=mysql_affected_rows();



if($row1==1){;
$idempresa=mysql_result($result1,0,'idempresas');
$idempl=mysql_result($result1,0,'idempleados');


$sql="SELECT * from empleados where idempresa='".$idempresa."' and idempleado='".$idempl."'";
//echo $sql;
$result=mysql_query ($sql) or die ("Invalid result datosempl");

$row=mysql_affected_rows();
if($row==1){;
$estado=mysql_result($result,0,'estado');
$idempresa=mysql_result($result,0,'idempresa');
$idempleado=mysql_result($result,0,'idempleado');
$nombre=mysql_result($result,0,'nombre');
$priape=mysql_result($result,0,'1apellido');
$segape=mysql_result($result,0,'2apellido');

$rep=$idempresa.";".$idempleado.";".$nombre." ".$priape." ".$segape;
}else{;
$rep="error";
	};
	
}else{;
$rep="error";
};	
	
	
	
echo ($rep);

?>
