<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-controldeuso-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 




$lon1=strtok($lon,",");
$lon2=strtok(",");
$lon=$lon1.".".$lon2;

$lat1=strtok($lat,",");
$lat2=strtok(",");
$lat=$lat1.".".$lat2;


$sql1 = "INSERT INTO controldeuso (idempresa,idempleado,idcomunidad,dia,hora,lat,lon,lista) VALUES ('$idempresa','$idempleado','$idcomunidad','$dia','$hora','$lat','$lon','$lista')";

$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
/*
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
