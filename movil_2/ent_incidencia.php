<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_incidencia";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 




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


if ($inci!=null){;

$valor = str_replace("_"," ",$inci);

$valor=$valor." adicional ".$dia;
}else{;
$valor=0;
};


//if($idemprempl=$idemppis){;
$sql1 = "INSERT INTO almpcinci (idempresas,idempleado,idpiscina,texto,imagen,dia,hora,lat,lon) VALUES ('$idemprempl','$idempl','$idpis','$valor','','$diaa','$hora','$lat','$lon')";
//echo $sql1;

$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
$row=mysql_affected_rows();

/*
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


echo ($rep);
*/
?>
