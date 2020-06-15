<?php 
include('bbdd.php');
/*
$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon) VALUES ('$idempresa','$idempleado','$idcomunidad','$idcat','$idsubcat','$dia','$hora','$lat','$lon')";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");
*/
$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_empl_puesto-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 




$sql1="SELECT * from empleados where idempresa='".$idempresa."' and idempleado='".$idempleado."'";
//echo $sql1;
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result sql1");
$row=mysqli_num_rows($result1);


if($row==1){;
$resultado1=mysqli_fetch_array($result1);
include('servicios.php');
$rep=$total;
}else{;
$rep="error";
};

echo ($rep);

?>
