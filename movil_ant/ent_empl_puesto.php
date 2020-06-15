<?
include('bbdd.php');
/*
$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon) VALUES ('$idempresa','$idempleado','$idcomunidad','$idcat','$idsubcat','$dia','$hora','$lat','$lon')";
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
*/

$sql1="SELECT * from empleados where idempresa='".$idempresa."' and idempleado='".$idempleado."'";
//echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result sql1");
$row=mysql_affected_rows();


if($row==1){;
include('servicios.php');
$rep=$total;
}else{;
$rep="error";
};

echo ($rep);

?>
