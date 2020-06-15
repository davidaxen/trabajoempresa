<?php

$sqlcjor="SELECT * FROM jorempleados WHERE idempresas='".$idempresa."' and idempleados='".$idempleado."' and turno='3' and finicio<='".$diaa."' and ffin>='".$diaa."'";
//echo $sqlcjor;
$resultcjor=mysqli_query ($conn,$sqlcjor) or die ("Invalid result comprobar entrada");
$resultadojor=mysqli_fetch_array($resultcjor);
$rowjor=mysqli_num_rows($resultcjor);

if ($rowjor>0){;
		$textomen="Hemos detectado que estas entrado en un puesto de trabajo, cuando nos figura en el sistema que estas de baja";
		$sqlmen = "INSERT INTO mensajes (idempresa,idempleado,dia,hora,user,lat,lon,texto) VALUES ('$idempresa','$idempleado','$diaa','$hora','sistema','$lat','$lon','$textomen')";
		//echo $sqlmen;
		$resultmen=mysqli_query ($conn,$sqlmen) or die ("Invalid result icarnet");
}else{
		$sqlcjor="SELECT * FROM jorempleados WHERE idempresas='".$idempresa."' and idempleados='".$idempleado."' and turno='2' and finicio<='".$diaa."' and ffin>='".$diaa."'";
		//echo $sqlcjor;
		$resultcjor=mysqli_query ($conn,$sqlcjor) or die ("Invalid result comprobar entrada");
		$resultadojor=mysqli_fetch_array($resultcjor);
		$rowjor=mysqli_num_rows($resultcjor);
		if ($rowjor>0){;
			$textomen="Hemos detectado que estas entrado en un puesto de trabajo, cuando nos figura en el sistema que estas de vacaciones";
			$sqlmen = "INSERT INTO mensajes (idempresa,idempleado,dia,hora,user,lat,lon,texto) VALUES ('$idempresa','$idempleado','$diaa','$hora','sistema','$lat','$lon','$textomen')";
			//echo $sqlmen;
			$resultmen=mysqli_query ($conn,$sqlmen) or die ("Invalid result icarnet");
		}else{

include('acciones_entradajor.php');


		};

};

?>