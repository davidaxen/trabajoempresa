<?php 
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_puesto2";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 

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
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");
/*
$sql="SELECT nombre from clientes where idempresas='".$idempresa."' and idclientes='".$idcomunidad."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result datosempl");
$row=mysqli_num_rows($result);


if($row==1){;
$nombre=$resultado['nombre');
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
