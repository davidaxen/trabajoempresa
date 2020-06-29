<?php 
include('bbdd.php');



$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_acciones-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 



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

//$valor=$obs;

if ($cantidad==null){;
$cantidad="0";
};

if ($idotro==null){;
$idotro="";
};

$dia1=strtok($dia,"/");
$dia2=strtok("/");
$dia3=strtok("/");
$diaa=$dia3."-".$dia2."-".$dia1;







if ($idcat>1){;
$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcomunidad','$idcat','$idsubcat','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");

}else{;


$sqlcjor="SELECT * FROM jorempleados WHERE idempresas='".$idempresa."' and idempleados='".$idempleado."' and finicio<='".$diaa."' and ffin>='".$diaa."'";
//echo $sqlcjor;
$resultcjor=mysqli_query ($conn,$sqlcjor) or die ("Invalid result comprobar entrada");
$resultadojor=mysqli_fetch_array($resultcjor);
$rowjor=mysqli_num_rows($resultcjor);

if ($rowjor==0){;
//echo 'entramos en acciones entrada<br/>';
include('acciones_entrada.php');

}else{;
//echo 'entramos en acciones jornada<br/>';
include('acciones_jornada.php');

};










};


?>
