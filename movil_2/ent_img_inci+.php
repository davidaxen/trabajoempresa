<?
include('bbdd.php');


$valores1 = implode(",", array_keys($_POST));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_POST));



$gt="idempresa-".$valores1."-ent_img_inci+";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 




$lon1=strtok($lon,",");
$lon2=strtok(",");
$lon=$lon1.".".$lon2;

$lat1=strtok($lat,",");
$lat2=strtok(",");
$lat=$lat1.".".$lat2;



if ($obs!=null){;
$incidencia = str_replace("_"," ",$obs);
}else{;
$incidencia=0;
};

$sql1="SELECT * from imginciplus where idempresa='".$idempresa."' and idsiniestro='".$idincidencia."' order by idimgsiniestro desc"; 
$result1=mysql_query ($sql1) or die ("Invalid result 1");
$row=mysql_affected_rows();

if ($row!=0){;
$idimgsiniestro=mysql_result($result1,0,'idimgsiniestro');
$idimgsiniestro=$idimgsiniestro+1;
}else{;
$idimgsiniestro=1;
};



$rf1="";
$mimagen=basename( $_FILES['imagen']['name']);
$timagen=strtok(basename( $_FILES['imagen']['name']), '.');
$tipoimagen=strtok('.');
if ($mimagen!=null){;
$path="../img/";
$dia2=str_replace("/", "_", $dia);
$rf1=$idempresa."-".$idimgsiniestro."-".$idincidencia."t-".$dia2.".".$tipoimagen;
$dat2[0]=$rf1;
//$path = $path . basename( $_FILES['nimagen']['name']);
$path = $path . $rf1;
if(move_uploaded_file($_FILES['imagen']['tmp_name'], $path)) {;
//echo "El archivo ". basename( $_FILES['nimagen']['name']). " ha sido subido";
echo "El archivo ". $rf1 . " ha sido subido<br>";
}else{;
echo "Ha ocurrido un error, trate de nuevo!<br>";
};
};

$dia1=strtok($dia,"/");
$dia2=strtok("/");
$dia3=strtok("/");
$diaa=$dia3."-".$dia2."-".$dia1;


$sql1 = "INSERT INTO imginciplus(idempresa,idempleado,idsiniestro,idimgsiniestro,imgsiniestro,texto,dia,hora,lon,lat,taccion) VALUES 
('$idempresa','$idempleado','$idincidencia','$idimgsiniestro','$rf1','$incidencia','$diaa','$hora','$lon','$lat','$taccion')";
//echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");


?>
