<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_tronda";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 


$lon1=strtok($lon,",");
$lon2=strtok(",");
$lon=$lon1.".".$lon2;

$lat1=strtok($lat,",");
$lat2=strtok(",");
$lat=$lat1.".".$lat2;

$dia1=strtok($dia,"/");
$dia2=strtok("/");
$dia3=strtok("/");
$diaa=$dia3."-".$dia2."-".$dia1;

$control=explode("*",$valor);
$tot=count($control);

for ($i=0;$i<$tot;$i++){;

list($rond, $dia, $hora, $td1) = explode(";", $control[$i]);

$td=strtr($td1,"_"," ");
//$td=$control[$i]."-".$i."-".$tot."-".$valor;

$sql1 = "INSERT INTO almpcronda (idempresas,idempleado,idcliente,idronda,dia,hora,lat,lon,texto,img) VALUES ('$idempresa','$idempleado','$idcomunidad','$rond','$diaa','$hora','$lat','$lon','$td','$img')";


$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
$row=mysql_affected_rows();

};

$rep=$tot;
echo ($rep);
?>
