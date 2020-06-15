<?php 


				$yact=strtok($diaa,'-');
				$mesact=strtok('-');
				$dact=strtok('-');
				$hact=strtok($hora,':');
				$mact=strtok(':');
				$sact=strtok(':');
				
				$diaactual=mktime($hact,$mact,$sact,$mesact,$dact,$yact);
				$diasemanaactual=date('N', mktime($hact,$mact,$sact,$mesact,$dact,$yact));

switch($diasemanaactual){;
case '1': $semana='lun';break;
case '2': $semana='mar';break;
case '3': $semana='mie';break;
case '4': $semana='jue';break;
case '5': $semana='vie';break;
case '6': $semana='sab';break;
case '7': $semana='dom';break;
};

				$sqlcjor="SELECT * FROM jorempleados WHERE idempresas='".$idempresa."' and idempleados='".$idempleado."' and turno='1' and finicio<='".$diaa."' and ffin>='".$diaa."' and ".$semana."='1' order by horent desc";
				//echo $sqlcjor.'<br/>';
				$resultcjor=mysqli_query ($conn,$sqlcjor) or die ("Invalid result comprobar entrada");
				$rowjor=mysqli_num_rows($resultcjor);	
 			   //echo $rowjor.'<br/>';	
			   
if ($rowjor==0){;
		$textomen="Hemos detectado que estas entrado en un puesto de trabajo, cuando nos figura en el sistema que hoy no es un dia de trabajo";
		$sqlmen = "INSERT INTO mensajes (idempresa,idempleado,dia,hora,user,lat,lon,texto) VALUES ('$idempresa','$idempleado','$diaa','$hora','sistema','$lat','$lon','$textomen')";
		//echo $sqlmen.'<br/>';
		$resultmen=mysqli_query ($conn,$sqlmen) or die ("Invalid result icarnet");
}else{;

				for ($ty=0;$ty<$rowjor;$ty++){;
				mysqli_data_seek($resultcjor, $ty);
				$resultadojor=mysqli_fetch_array($resultcjor);
				$horentjor=$resultadojor['horent'];
				$hent=strtok($horentjor,':');
				$ment=strtok(':');
				$sent=strtok(':');
				$horsaljor=$resultadojor['horsal'];
				$hsal=strtok($horsaljor,':');
				$msal=strtok(':');
				$ssal=strtok(':');
				$diaentjor=mktime($hent,$ment,$sent,$mesact,$dact,$yact);
				$diasaljor=mktime($hsal,$msal,$ssal,$mesact,$dact,$yact);
						if ($diasaljor<$diaentjor){;
						$diasaljor=mktime($hsal,$msal,$ssal,$mesact,$dact+1,$yact);
						};
				$horariolab[$ty]=array ('entrada'=>$diaentjor,'horaent'=>$horentjor,'salida'=>$diasaljor,'horasal'=>$horsaljor);

				};


$sqlcent="select * from almpc where idempresas='".$idempresa."' and idempleado='".$idempleado."' and idpccat='1' order by id desc";
//echo $sqlcent.'<br/>';
$resultcent=mysqli_query ($conn,$sqlcent) or die ("Invalid result comprobar entrada");
$resultado=mysqli_fetch_array($resultcent);
$idcoment=$resultado['idpiscina'];
$idpcsubcat=$resultado['idpcsubcat'];
$diaant=$resultado['dia'];
$horaant=$resultado['hora'];

				$yant=strtok($diaant,'-');
				$mesant=strtok('-');
				$dant=strtok('-');
				$hant=strtok($horaant,':');
				$mant=strtok(':');
				$sant=strtok(':');
				
				$diaantm=mktime($hant,$mant,$sant,$mesant,$dant,$yant);


				if (($idpcsubcat=='2') and ($idsubcat=='2')){;
					$textomen="Hemos detectado que esta saliendo de nuevo,el dia $diaa, y a la hora $hora.";
					$sqlmen = "INSERT INTO mensajes (idempresa,idempleado,dia,hora,user,lat,lon,texto) VALUES ('$idempresa','$idempleado','$diaa','$hora','sistema','$lat','$lon','$textomen')";
					//echo $textomen.'<br/>';					
					$resultmen=mysqli_query ($conn,$sqlmen) or die ("Invalid result icarnet");	
				};

				if (($idpcsubcat=='2') and ($idsubcat=='1')){;
					$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcomunidad','1','1','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
					//echo $sql11.'2-1<br/>';	
					$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
				};

				
				if (($idpcsubcat=='1') and ($idsubcat=='2')){;
								//echo "entramos en 1-2 previo";
					
					include('acciones_entradajor12.php');


				};


				if (($idpcsubcat=='1') and ($idsubcat=='1')){;
					//echo "entramos en 1-1 previo";
					
					include('acciones_entradajor11.php');

				};
			

};

/*
print_r($horariolab);
echo '<br>'.$idcoment.'<br>'.$idpcsubcat.'<br>'.$diaant.'<br>'.$horaant;
echo '<br>'.$diaactual;
*/

?>