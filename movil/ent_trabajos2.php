<?php 
include('bbdd.php');

$valores1 = implode(",", array_keys($_POST));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_POST));



$gt="VALORES: ".$valores1."-ent_trabajos2";

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
$diae=$dia3."-".$dia2."-".$dia1;

$dia1=strtok($horasalida,"/");
$dia2=strtok("/");
$dia3=strtok("/");
$dias=$dia3."-".$dia2."-".$dia1;



$horasalida=$horaentrada;
$horaentrada=$diasalida;



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


$sql00 ="select idsiniestro from trabajos where idempresa='".$idempresa."' order by idsiniestro desc";
$result00=mysqli_query ($conn,$sql00) or die ("Invalid result icarnet");
$row00=mysqli_num_rows($result00);
if ($row00==0){
	$num_siniestro=1;
	}else{
		$resultado00=mysqli_fetch_array($result00);
$idsiniestro=$resultado00['idsiniestro'];
$num_siniestro=$idsiniestro+1;
};




$rf1="";
$mimagen=basename( $_FILES['firma']['name']);
$timagen=strtok(basename( $_FILES['firma']['name']), '.');
$tipoimagen=strtok('.');
if ($mimagen!=null){;
$path="../img/";
$dia2=str_replace("/", "_", $diaentrada);
$rf1=$idempresa."-".$num_siniestro."t-".$dia2.".".$tipoimagen;
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

/*
$valores = implode(",", array_keys($_POST));
$valores .="   ";
$valores .= implode(",", array_values($_POST));
*/
$valores=$datentrada;


$sql01 ="select * from clientes where idempresas='".$idempresa."' and idclientes='".$idclientetrabajo."'";
$result01=mysqli_query ($conn,$sql01) or die ("Invalid result clientes");
$resultado01=mysqli_fetch_array($result01);
$nombrecli=$resultado01['nombre'];
$domiciliocli=$resultado01['domicilio'];
$provinciacli=$resultado01['provincia'];
$localidadcli=$resultado01['localidad'];
$cpcli=$resultado01['cp'];


$sql10 = "INSERT INTO trabajos (idempresa,idsiniestro,idaseguradora,idempleado,dia,contacto,email,descripcion,terminado,diaapertura,horaapertura,diacierre,horacierre,londir,latdir,telefono,diaasignacion,horaasignacion,direccion,localidad,provincia,cp) 
VALUES 
('$idempresa','$num_siniestro','$idclientetrabajo','$idempleado','$diae','$contacto','$email','$valores','1','$diae','$horaentrada','$dias','$horasalida','$lon','$lat','$telefonocont','$diae','$horaentrada','$domiciliocli','$localidadcli','$provinciacli','$cpcli')";
//echo $sql10;
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result trabajos");



$sql1 = "INSERT INTO acctrabajos (idempresa,idempleado,idsiniestro,descripcion,trabajorealizado,trabajopendiente,diaentrada,horaentrada,lon,lat,diasalida,horasalida,firma,email) 
VALUES ('$idempresa','$idempleado','$num_siniestro','$valores','$datrealizados','$datpendientes','$diae','$horaentrada','$lon','$lat','$dias','$horasalida','$rf1','$email')";
//echo $sql1;
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result acctrabajos");


echo ($num_siniestro);




?>
