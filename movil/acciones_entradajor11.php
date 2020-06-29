<?php
echo "entramos en 1-1<br/>";

				
	if ($diaa>$diaant){;
	
		$textomen="Hemos detectado que estas entrado sin la salida previa del puesto de trabajo el dia ".$diaant.", procedemos a ajustar el sistema";
		$sqlmen = "INSERT INTO mensajes (idempresa,idempleado,dia,hora,user,lat,lon,texto) VALUES ('$idempresa','$idempleado','$diaa','$hora','sistema','$lat','$lon','$textomen')";
		//echo $textomen.'<br/>';
		$resultmen=mysqli_query ($conn,$sqlmen) or die ("Invalid result icarnet");

	
		$sqlcjort="SELECT * FROM jorempleados WHERE idempresas='".$idempresa."' and idempleados='".$idempleado."' and turno='1' and finicio<='".$diaant."' and ffin>='".$diaant."' and horent<='".$horaant."' order by horent desc";
		//echo $sqlcjort.'<br/>';

		$resultcjort=mysqli_query ($conn,$sqlcjort) or die ("Invalid result comprobar entrada");
		$rowjort=mysqli_num_rows($resultcjort);	
 		//echo $rowjort.'<br/>';	

				$resultadojort=mysqli_fetch_array($resultcjort);
				$diaantt=$diaant;
				$horentjort=$resultadojort['horent'];
				$hentt=strtok($horentjort,':');
				$mentt=strtok(':');
				$sentt=strtok(':');
				$horsaljort=$resultadojort['horsal'];
				$hsalt=strtok($horsaljort,':');
				$msalt=strtok(':');
				$ssalt=strtok(':');
				$diaentjort=mktime($hentt,$mentt,$sentt,$mesact,$dact,$yact);
				$diasaljort=mktime($hsalt,$msalt,$ssalt,$mesact,$dact,$yact);

					
			if ($diasaljort<$diaentjort){;
					$diaantt=date('Y-m-d',mktime(0,0,0,$mesant,$dant+1,$yant));
				};
		//echo $diaentjort.'-'.$diasaljort.'<br/>';				
			
		$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcoment','1','2','$diaantt','$horsaljort','$lat','$lon','$valor','$cantidad','$idotro')";
		//echo $sql11.'1-1<br/>';	
		$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
		$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcomunidad','1','1','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
		//echo $sql11.'1-1<br/>';	
		$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");


	}else{;
	for ($tu=0;$tu<$rowjor;$tu++){
							//echo "entramos en 1-1-tu".$tu."<br/>";
							$ent=$horariolab[$tu]['entrada'];
							$sal=$horariolab[$tu]['salida'];
							//echo $ent.'<br/>';
							//echo $sal.'<br/>';
							//echo $diaactual.'<br/>';
		if (($diaactual>=$ent) and ($sal>=$diaactual)){;
							//echo "entramos en 1-1-tu".$ent."-".$sal."<br/>";
							//echo $diaantm."<br/>";
							//echo date('Y-m-d H:i:s',$diaantm).'<br/>';
			if (($diaantm>=$ent) and ($sal>=$diaantm)){
					$textomen="Hemos detectado que se ha debido de cerrar la aplicacion, no afecta al calculo de la jornada.";
					$sqlmen = "INSERT INTO mensajes (idempresa,idempleado,dia,hora,user,lat,lon,texto) VALUES ('$idempresa','$idempleado','$diaa','$hora','sistema','$lat','$lon','$textomen')";
					//echo $textomen.'<br/>';
					$resultmen=mysqli_query ($conn,$sqlmen) or die ("Invalid result icarnet");
					$yaesta='10';
			}else{;
				$ti=$tu+1;
				$horasalant2=$horariolab[$ti]['horasal'];			
				$textomen="Hemos detectado que estas entrado sin la salida previa del puesto de trabajo el dia $diaa y $horasalant2, procedemos a ajustar el sistema";
				$sqlmen = "INSERT INTO mensajes (idempresa,idempleado,dia,hora,user,lat,lon,texto) VALUES ('$idempresa','$idempleado','$diaa','$hora','sistema','$lat','$lon','$textomen')";
				//echo $textomen.'<br/>';
				$resultmen=mysqli_query ($conn,$sqlmen) or die ("Invalid result icarnet");
				$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcoment','1','2','$diaa','$horasalant2','$lat','$lon','$valor','$cantidad','$idotro')";
				//echo $sql11.'1-1<br/>';	
				$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
				$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcomunidad','1','1','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
				//echo $sql11.'1-1<br/>';	
				$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
				$tu=$rowjor;
				$yaesta='10';
			};	
		};
	
	
	};

if ($yaesta!='10'){;
				$ti=$rowjor-1;
				$horasalant2=$horariolab[$ti]['horasal'];
				$textomen="Hemos detectado que estas entrado sin la salida previa del puesto de trabajo el dia $diaa y $horasalant2, procedemos a ajustar el sistema";
				$sqlmen = "INSERT INTO mensajes (idempresa,idempleado,dia,hora,user,lat,lon,texto) VALUES ('$idempresa','$idempleado','$diaa','$hora','sistema','$lat','$lon','$textomen')";
				//echo $textomen.'<br/>';
				$resultmen=mysqli_query ($conn,$sqlmen) or die ("Invalid result icarnet");

				$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcoment','1','2','$diaa','$horasalant2','$lat','$lon','$valor','$cantidad','$idotro')";
				//echo $sql11.'1-1<br/>';	
				$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
				$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcomunidad','1','1','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
				//echo $sql11.'1-1<br/>';
				$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
};

	
	};				
					

?>