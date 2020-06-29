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


$sqlcent="select * from almpc where idempresas='".$idempresa."' and idempleado='".$idempleado."' and idpccat='1' order by id desc";
echo $sqlcent;
$resultcent=mysqli_query ($conn,$sqlcent) or die ("Invalid result comprobar entrada");
$resultado=mysqli_fetch_array($resultcent);
$idcoment=$resultado['idpiscina'];
$idpcsubcat=$resultado['idpcsubcat'];


if ($idsubcat==2){;


if ($idcomunidad==$idcoment){;
$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcomunidad','$idcat','$idsubcat','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");

}else{;

$textomen="Hemos detectado que esta saliendo de un puesto de trabajo distinto a la ultima entrada, procedemos a ajustar el sistema";
$sqlmen = "INSERT INTO mensajes (idempresa,idempleado,dia,hora,user,lat,lon,texto) VALUES ('$idempresa','$idempleado','$diaa','$hora','sistema','$lat','$lon','$textomen')";
echo $sqlmen;
$resultmen=mysqli_query ($conn,$sqlmen) or die ("Invalid result icarnet");

$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcoment','1','2','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");
$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcomunidad','1','1','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");
$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcomunidad','1','2','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");


};




}else{;

if ($idcomunidad!=$idcoment){;

$textomen="Hemos detectado que esta saliendo con la entrada de otro puesto de trabajo distinto a la ultima entrada, procedemos a ajustar el sistema";
$sqlmen = "INSERT INTO mensajes (idempresa,idempleado,dia,hora,user,lat,lon,texto) VALUES ('$idempresa','$idempleado','$diaa','$hora','sistema','$lat','$lon','$textomen')";
echo $sqlmen;
$resultmen=mysqli_query ($conn,$sqlmen) or die ("Invalid result icarnet");
$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcoment','$idcat','$idsubcat','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");


}else{;


if ($idpcsubcat==2){;

$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcomunidad','$idcat','$idsubcat','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
echo $sql1;
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");

}else{;
	







$row=mysqli_num_rows($resultcent);







$sqlcent="select * from almpc where idempresas='".$idempresa."' and idempleado='".$idempleado."' and idpiscina='".$idcomunidad."' and idpccat='1' and dia='".$diaa."' and hora<'".$hora."' order by id desc";
echo $sqlcent;
$resultcent=mysqli_query ($conn,$sqlcent) or die ("Invalid result comprobar entrada");
$row=mysqli_num_rows($resultcent);
echo $row;
if($row>=1){;


$resultado=mysqli_fetch_array($resultcent);
$idpcsub=$resultado['idpcsubcat'];
$horaant=$resultado['hora'];
if ($idpcsub==1){;

/*
$sqlcjor="SELECT * FROM jorempleados WHERE idempresas='".$idempresa."' and idempleados='".$idempleado."' and turno='1' and finicio<='".$diaa."' and ffin>='".$diaa."' and horent<='".$hora."' order by horent desc";
echo $sqlcjor;
$resultcjor=mysqli_query ($conn,$sqlcjor) or die ("Invalid result comprobar entrada");
$resultadojor=mysqli_fetch_array($resultcjor);
$horentjor=$resultadojor['horent'];

if ($horentjor<=$hora){;


};

*/

$textomen="Hemos verificado que se ha debido de producir un cierre de la aplicacion sin su salida previa nos figura una entrada a las ".$horaant." esto no afecta en el calculo de la jornada de trabajo";
$sqlmen = "INSERT INTO mensajes (idempresa,idempleado,dia,hora,user,lat,lon,texto) VALUES ('$idempresa','$idempleado','$diaa','$hora','sistema','$lat','$lon','$textomen')";
echo $sqlmen;
$resultmen=mysqli_query ($conn,$sqlmen) or die ("Invalid result icarnet");


};



};



};


};

};

?>
