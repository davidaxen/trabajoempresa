<?php 
include('bbdd.php');


$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-mensaresp";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 

$dia1=strtok($diaresp,"/");
$dia2=strtok("/");
$dia3=strtok("/");
$diaresp=$dia3."-".$dia2."-".$dia1;

$lon1=strtok($lon,",");
$lon2=strtok(",");
$lon=$lon1.".".$lon2;

$lat1=strtok($lat,",");
$lat2=strtok(",");
$lat=$lat1.".".$lat2;
if ($resp!=null){;
$valor=strtr($resp,"_"," ");
}else{;
$valor=0;
};
$sql1="UPDATE mensajes SET respuesta='".$valor."', diaresp='".$diaresp."', horaresp='".$horesp."', lon='".$lon."', lat='".$lat."', respondido='1' WHERE id ='".$id."' and idempresa='".$idempresa."'";
//echo $sql1;
$result1=mysqli_query ($conn,$sql1);/*
$row=mysqli_num_rows($result);

if($row==1){;
$nombre=mysql_result($result,0,'nombre');
$total=$nombre;
$rep=$total;
}else{;

};*/
$rep="bien";
echo ($rep);

?>