<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_acciones2-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 




//$valor="lon ".$lon."-lat ".$lat;
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

if ($obs!=null){;
$valor=strtr($obs,"_"," ");
}else{;
$valor="";
};

//echo $dia."<br>";


$valores=explode('<.>',$parte);
//echo count($valores)."<br>";
//print_r($valores);

for ($j=0;$j<count($valores)-1;$j++){;

$idsubcat=strtok($valores[$j],';');
$cantidad=strtok(';');
$idotro=strtok(';');

if ($cantidad==null){;
$cantidad="0";
};

if ($idotro==null){;
$idotro="";
};

$valort="idempresa - ".$idempresa."- idmpleado - ".$idempleado." - idcomunidad - ".$idcomunidad." - idcat - ".$idcat." - idsubcat - ".$idsubcat." - dia -".$dia." - hora - ".$hora." - lon - ".$lon." - lat - ".$lat." - cantidad -".$cantidad." - idotro - ".$idotro." - obs - ".$obs." - parte - ".$parte ; 

$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcomunidad','$idcat','$idsubcat','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
//echo $sql1;
$result1=mysql_query ($sql1);


};

if (!$result1){
	die ("error".$sql1);
}else{
	echo "Datos almacenados";
	}




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
