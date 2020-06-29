<?
include('bbdd.php');
//echo "hola";
//echo $ronda;


$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_ronda";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 



if ($trab!=null){;
$idemprempl=ltrim ( substr($trab,1,4), "0");
$idempl=ltrim ( substr($trab,5,4), "0");
}else{;
$idemprempl=$idempresa;
$idempl=$idempl;
};

$control=explode("*",$ronda);
echo $control;

for ($i=0;$i<count($control);$i++){;

list($rond, $dia, $hora, $lat, $lon, $alt, $idpis, $obs, $img) = explode(";", $control[$i]);

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


$alt1=strtok($alt,",");
$alt2=strtok(",");
$alt=$alt1.".".$alt2;

if ($obs!=null){;
$valor=strtr($obs,"_"," ");
}else{;
$valor="";
};

$sql1 = "INSERT INTO almpcronda (idempresas,idempleado,idcliente,idronda,dia,hora,lat,lon,alt,texto,img) VALUES ('$idemprempl','$idempl','$idpis','$rond','$diaa','$hora','$lat','$lon','$alt','$valor','$img')";
echo $sql1."<br />";


$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
//$row=mysql_affected_rows();

/*
if($row==1){;
$rep='0';
}else{;
$rep="error";
};
*/
};

//echo ($rep);

?>
