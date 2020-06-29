<?
include('bbdd.php');
$idemprempl=ltrim ( substr($cod,2,3), "0");
$idempl=ltrim ( substr($cod,6,3), "0");
$sql="SELECT nombre, 1apellido, 2apellido from empleados where idempresa='".$idemprempl."' and idempleado='".$idempl."'";
$result=mysql_query ($sql) or die ("Invalid result datosempl");
$row=mysql_affected_rows();
if($row==1){;
$nombre=mysql_result($result,0,'nombre');
$papellido=mysql_result($result,0,'1apellido');
$sapellido=mysql_result($result,0,'2apellido');
$total=$nombre.' '.$papellido.' '.$sapellido;
$rep=$total;
}else{;
$rep="error";
	};
?>

