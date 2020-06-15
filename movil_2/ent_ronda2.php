<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_ronda2";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 



$control=explode("*",$valor_ronda);
$tot=$j;

for ($i=0;$i<$tot;$i++){;

list($rond, $dia, $hora, $lat, $lon) = explode(";", $control[$i]);

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



$sql1 = "INSERT INTO almpcronda (idempresas,idempleado,idcliente,idronda,dia,hora,lat,lon,texto,img) VALUES ('$idempresa','$idempleado','$idcomunidad','$rond','$diaa','$hora','$lat','$lon','$control[$i]','$img')";
//echo $sql1;


$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
$row=mysql_affected_rows();

};

$rep=$tot;
echo ($rep);

?>
