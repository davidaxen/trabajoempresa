<?php 
include('bbdd.php');


$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_acc_mant-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 




$idemprempl=ltrim ( substr($trab,1,4), "0");
$idempl=ltrim ( substr($trab,5,4), "0");


$idemppis=ltrim ( substr($niv,1,3), "0");
$idpis=ltrim ( substr($niv,4,3), "0");
$idcat=ltrim ( substr($niv,7,2), "0");
$idsubcat=ltrim ( substr($niv,9,3), "0");

$dia1=strtok($dia,"/");
$dia2=strtok("/");
$dia3=strtok("/");
$diaa=$dia3."-".$dia2."-".$dia1;

$lon1=strtok($lon,",");
$lon2=strtok(",");
$lon=$lon1.".".$lon2;

$lat1=strtok($lat,",");
$lat2=strtok(",");
$lat=$lat1.".".$lat2;

if ($idcat==4) {;
if($idemprempl=$idemppis){;
$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon) VALUES ('$idemprempl','$idempl','$idpis','$idcat','$idsubcat','$diaa','$hora','$lat','$lon')";
//echo $sql1;
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");
$row=mysqli_num_rows($result1);


if($row==1){;
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
$total=$nombre;
$rep=$total;
}else{;
$rep="error";
};
}else{;
$rep="error";
};
}else{;
$rep="error";
};
echo ($rep);

?>
