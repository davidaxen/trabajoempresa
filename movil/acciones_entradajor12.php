<?php
//echo "entramos en 1-2<br/>";

			
	if ($diaa>$diaant){;
	
		$textomen="Hemos detectado que estas saliendo en otra fecha del puesto de trabajo el dia ".$diaant.", procedemos a ajustar el sistema";
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
		//echo $sql11.'1-2<br/>';	
		$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
		$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcomunidad','1','1','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
		//echo $sql11.'1-2<br/>';	
		$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
		$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcomunidad','1','2','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
		//echo $sql11.'1-2<br/>';	
		$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");

	}else{;
	
					if ($idcomunidad!=$idcoment){;
							$textomen="Hemos detectado que esta saliendo en otro puesto de trabajo, distinto a la ultima entrada, procedemos a ajustar el sistema";
							$sqlmen = "INSERT INTO mensajes (idempresa,idempleado,dia,hora,user,lat,lon,texto) VALUES ('$idempresa','$idempleado','$diaa','$hora','sistema','$lat','$lon','$textomen')";
							//echo $textomen.'<br/>';
							
						$sqlcjort="SELECT * FROM jorempleados WHERE idempresas='".$idempresa."' and idempleados='".$idempleado."' and turno='1' and finicio<='".$diaa."' and ffin>='".$diaa."' and horent<='".$hora."' order by horent desc";
		//echo $sqlcjort.'<br/>';

		$resultcjort=mysqli_query ($conn,$sqlcjort) or die ("Invalid result comprobar entrada");
		$rowjort=mysqli_num_rows($resultcjort);	
 		//echo $rowjort.'<br/>';	

				$resultadojort=mysqli_fetch_array($resultcjort);
				$diaantt=$diaa;
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
					$diaantt=date('Y-m-d',mktime(0,0,0,$mesact,$dact+1,$yact));
				};			
								
							$resultmen=mysqli_query ($conn,$sqlmen) or die ("Invalid result icarnet");							
							$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcoment','1','2','$diaantt','$horsaljort','$lat','$lon','$valor','$cantidad','$idotro')";
							//echo $sql1.'1-2';							
							$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");
							$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcomunidad','1','1','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
							//echo $sql11.'1-2<br/>';								
							$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
							$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcomunidad','1','2','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
							//echo $sql11.'1-2<br/>';								
							$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
					}else{;
							$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$idempresa','$idempleado','$idcomunidad','1','2','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
							//echo $sql11.'1-2<br/>';				
							$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
					};
	
	
	};				
					

?>