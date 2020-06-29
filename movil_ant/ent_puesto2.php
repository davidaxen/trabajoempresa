<?
include('bbdd.php');

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

$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon) VALUES ('$idempresa','$idempleado','$idcomunidad','$idcat','$idsubcat','$diaa','$hora','$lat','$lon')";
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
/*
$sql="SELECT nombre from clientes where idempresas='".$idempresa."' and idclientes='".$idcomunidad."'";
$result=mysql_query ($sql) or die ("Invalid result datosempl");
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
*/
?>
