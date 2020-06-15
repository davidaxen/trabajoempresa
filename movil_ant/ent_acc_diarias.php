<?
include('bbdd.php');


$idemprempl=ltrim ( substr($trab,1,4), "0");
$idempl=ltrim ( substr($trab,5,4), "0");


$idemppis=ltrim ( substr($niv,1,3), "0");
$idpis=ltrim ( substr($niv,4,3), "0");
$idcat=ltrim ( substr($niv,7,2), "0");
$idsubcat=ltrim ( substr($niv,9,3), "0");

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

if ($idcat==3) {;
if($idemprempl=$idemppis){;
$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon) VALUES ('$idemprempl','$idempl','$idpis','$idcat','$idsubcat','$diaa','$hora','$lat','$lon')";
//echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
$row=mysql_affected_rows();


if($row==1){;
$nombre=mysql_result($result,0,'nombre');
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
