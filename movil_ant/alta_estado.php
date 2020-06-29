<?
include('bbdd.php');
$sql="SELECT estado from empleados where idempresa='".$idempresa."' and idempleado='".$idempleado."'";
$result=mysql_query ($sql) or die ("Invalid result datosempl");
$row=mysql_affected_rows();
if($row==1){;
$estado=mysql_result($result,0,'estado');
$rep=$estado;
}else{;
$rep="error";
	};
echo ($rep);

?>
