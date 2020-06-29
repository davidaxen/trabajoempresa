<?
include('bbdd.php');

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
$sql1="UPDATE trabajo SET respuesta='".$valor."', diaresp='".$diaresp."', horaresp='".$horaresp."', lon='".$lon."', lat='".$lat."', respondido='1' WHERE id ='".$id."' and idempresa='".$idempresa."'";
//echo $sql1;
$result1=mysql_query ($sql1);/*
$row=mysql_affected_rows();

if($row==1){;
$nombre=mysql_result($result,0,'nombre');
$total=$nombre;
$rep=$total;
}else{;

};*/
$rep="bien";
echo ($rep);

?>
