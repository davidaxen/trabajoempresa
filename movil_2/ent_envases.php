<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_envases-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 



$valor="lon ".$lon."-lat ".$lat;
$lon1=strtok($lon,",");
$lon2=strtok(",");
$lon=$lon1.".".$lon2;

$lat1=strtok($lat,",");
$lat2=strtok(",");
$lat=$lat1.".".$lat2;

if ($obs!=null){;
$valor=strtr($obs,"_"," ");
}else{;
$valor="";
};

$sql="select tipo from clientes where idclientes='".$idcomunidad."' and idempresas='".$idempresa."'";
$result=mysql_query ($sql) or die ("Invalid result sql");
$tipocliente=mysql_result($result,0,'tipo');

$dia1=strtok($dia,"/");
$dia2=strtok("/");
$dia3=strtok("/");
$diaa=$dia3."-".$dia2."-".$dia1;

$sql1 = "INSERT INTO almenvases (idempresas,idempleado,idclientes,idenvases,tipocliente,dia,hora,lat,lon,obs) VALUES ('$idempresa','$idempleado','$idcomunidad','$idenvases','$tipocliente','$diaa','$hora','$lat','$lon','$valor')";
//echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");

?>
