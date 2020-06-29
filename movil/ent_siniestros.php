<?php 
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_siniestros";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 


$lon1=strtok($lonentrada,",");
$lon2=strtok(",");
$lon=$lon1.".".$lon2;

$lat1=strtok($latentrada,",");
$lat2=strtok(",");
$lat=$lat1.".".$lat2;


$dia1=strtok($diaentrada,"/");
$dia2=strtok("/");
$dia3=strtok("/");
$diaentrada=$dia3."-".$dia2."-".$dia1;

$dia1=strtok($diasalida,"/");
$dia2=strtok("/");
$dia3=strtok("/");
$diasalida=$dia3."-".$dia2."-".$dia1;

if ($datentrada!=null){;
$datentrada = str_replace("_"," ",$datentrada);
}else{;
$datentrada=0;
};

if ($datrealizados!=null){;
$datrealizados = str_replace("_"," ",$datrealizados);
}else{;
$datrealizados=0;
};

if ($datpendientes!=null){;
$datpendientes = str_replace("_"," ",$datpendientes);
}else{;
$datpendientes=0;
};


$rf1="";
$mimagen=basename( $_FILES['firma']['name']);
$timagen=strtok(basename( $_FILES['firma']['name']), '.');
$tipoimagen=strtok('.');
if ($mimagen!=null){;
$path="../img/";
$dia2=str_replace("/", "_", $diaentrada);
$rf1=$idempresa."-".$num_siniestro."-".$dia2.".".$tipoimagen;
$dat2[0]=$rf1;
//$path = $path . basename( $_FILES['nimagen']['name']);
$path = $path . $rf1;
if(move_uploaded_file($_FILES['firma']['tmp_name'], $path)) {;
//echo "El archivo ". basename( $_FILES['nimagen']['name']). " ha sido subido";
echo "El archivo ". $rf1 . " ha sido subido<br>";
}else{;
echo "Ha ocurrido un error, trate de nuevo!<br>";
};
};









$sql1 = "INSERT INTO accsiniestros (idempresa,idempleado,idsiniestro,descripcion,trabajorealizado,trabajopendiente,diaentrada,horaentrada,lon,lat,diasalida,horasalida,firma,email) VALUES ('$idempresa','$idempleado','$num_siniestro','$datentrada','$datrealizados','$datpendientes','$diaentrada','$horaentrada','$lon','$lat','$diasalida','$horasalida','$rf1','$email')";
echo $sql1;
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");

$d1=strtok($diasalida,"/");
$d2=strtok("/");
$d3=strtok("/");
$diasalida2=$d3."-".$d2."-".$d1;

$sql10 = "UPDATE siniestros SET terminado = '1' WHERE idsiniestro='".$num_siniestro."'  and idempresa='".$idempresa."'";
echo $sql10;
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result icarnet");


?>
