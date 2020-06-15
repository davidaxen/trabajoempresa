<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-mensarep2";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 
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
if ($text!=null){;
$valor=strtr($text,"_"," ");
}else{;
$valor=0;
};
$sql1="UPDATE almpcinci SET textourg='".$valor."', diaresp='".$diaresp."', horaresp='".$hora."', lonurg='".$lon."', laturg='".$lat."', urgresp='1' , idempleadoresp='".$idempleado."' WHERE id ='".$id."' and idempresas='".$idempresa."'";//echo $sql1;
$result1=mysql_query ($sql1);/*
$row=mysql_affected_rows();

if($row==1){;
$nombre=mysql_result($result,0,'nombre');
$total=$nombre;
$rep=$total;
}else{;

};*/
$rep="Incidencia urgente cerrada";
echo ($rep);

?>
