<html>
<head>
<title>Entrada de datos de los Puntos de Control</title>
<link rel="stylesheet" href="../../estilo/estilo.css">
</head>
<?php 
include('../../bbdd/sqlfacturacion.php');
?>
<body>
<table>
<tr><td rowspan="2"><img src="../../img/<?=$img;?>" height=80></td><td class="enc">ENTRADA DE DATOS</td><td rowspan="2"></td></tr>
<tr><td class="enc">PUNTOS DE CONTROL</td></tr>
</table>


<?if ($tabla!="ientpunto"){;?>

<form action="epuntcont.php" method="post" enctype="multipart/form-data">

<input type="hidden" name="tabla" value="ientpunto">
<table>
<tr><td class="subenc3">Tipo de Lector</td><td><select name="tipo"><option value=0>CS1504<option value=1 selected>P460<option value=2>P460-cc</select>
<tr><td class="subenc3">Fecha</td><td><input type="text" name="d" maxlength=2 size=3>/<input type="text" name="m" maxlength=2 size=3>/<input type="text" name="y" maxlength=4 size=5></td></tr>
<tr><td class="subenc3">Página</td>
<td><input type="file" name="pagina"></td></tr>

<tr><td><input type="submit"  class="envio" value="enviar" name="Enviar"></td>
</tr>
</table>
</form>
<?}else{;



if ($pagina!=null){;
$file = explode(".",$pagina_name);
$doc=$d."-".$m."-".$y.".".$file[1];
$path="./documentos".$idc."/";
copy($pagina,$path.$doc);
$path2=$path.$doc;
echo $path2."<br>";
$gestor=fopen($path2, "r");

if ($gestor) {
		while (!feof($gestor)) {
 		

     if ($tipo=="0"){
     			$bufer = fgetcsv($gestor, 100, ",");
          $tok[0]=strtok($bufer[2]," ");
          $tok[1]=strtok(" ");
          $tok[2]=strtok(" ");
          $tok[3]=strtok(" ");

          $tok[4]=strtok($tok[3],"/");
          $tok[5]=strtok("/");
          $tok[6]=strtok("/")+2000;

          $tok[7]=strtok($tok[1],":");
          $tok[8]=strtok(":");
          $tok[9]=strtok(":");

          if ($tok[2]=="PM"){;
          $tok[7]=$tok[7]+12;
          };

$fecha=date("Y-m-d", mktime(0, 0, 0, $tok[4], $tok[6], $tok[5]));

					$hora=date("H:i:s", mktime($tok[7], $tok[8], $tok[9], $tok[4], $tok[5], $tok[6]));

          $cod[0]=substr($bufer[1],1,1);
							if ($cod[0]=="1"){;
          					$idemprempl=ltrim ( substr($bufer[1],2,4), "0");
          					$idempl=ltrim ( substr($bufer[1],6,4), "0");
          					$idserv=ltrim ( substr($bufer[1],10,3), "0");
          					$sql2 = "INSERT INTO datosempl (idempempl,idempl,fecha,hora) VALUES ('$idemprempl','$idempl','$fecha','$hora')";
										echo $sql2."<br>";
										$result2=mysql_query ($sql2) or die ("Invalid result datosempl");
								}else{;
          					$idempr=ltrim ( substr($bufer[1],2,4), "0");
          					$idcomu=ltrim ( substr($bufer[1],6,4), "0");
          					$idpuntcont=ltrim ( substr($bufer[1],10,3), "0");
          					        $sql1 = "INSERT INTO datospuntcont (idempempl,idempl,idserv,idemp,idcomu,idpuntcont,fecha,hora) VALUES ('$idemprempl','$idempl','$idserv','$idempr','$idcomu','$idpuntcont','$fecha','$hora')";
							echo $sql1."<br>";
							$result1=mysql_query ($sql1) or die ("Invalid result datospuntcont");
          				};
          
		}else{;
		      $bufer = fgetcsv($gestor, 100, "|");
					
          $tok[4]=strtok($bufer[1],"/");
          $tok[5]=strtok("/");
          $tok[6]=strtok("/");

          $tok[7]=strtok($bufer[2],":");
          $tok[8]=strtok(":");
          $tok[9]=strtok(":");

          /*
          if ($tok[2]=="PM"){;
          $tok[7]=$tok[7]+12;
          };
          */
 
if ($tipo=="2"){;       
$fecha=date("Y-m-d", mktime(0, 0, 0, $tok[4], $tok[5], $tok[6]));
}else{;
$fecha=date("Y-m-d", mktime(0, 0, 0, $tok[5], $tok[4], $tok[6]));
};					
					
					$hora=date("H:i:s", mktime($tok[7], $tok[8], $tok[9], $tok[5], $tok[4], $tok[6]));

          $cod[0]=substr($bufer[0],0,1);
							if ($cod[0]=="1"){;
          					$idemprempl=ltrim ( substr($bufer[0],1,4), "0");
          					$idempl=ltrim ( substr($bufer[0],5,4), "0");
          					$idserv=ltrim ( substr($bufer[0],9,3), "0");
          					$sql2 = "INSERT INTO datosempl (idempempl,idempl,fecha,hora) VALUES ('$idemprempl','$idempl','$fecha','$hora')";
										echo $sql2."<br>";
										$result2=mysql_query ($sql2) or die ("Invalid result datosempl");
								}else{;
          					$idempr=ltrim ( substr($bufer[0],1,4), "0");
          					$idcomu=ltrim ( substr($bufer[0],5,4), "0");
          					$idpuntcont=ltrim ( substr($bufer[0],9,3), "0");  
          						$sql1 = "INSERT INTO datospuntcont (idempempl,idempl,idserv,idemp,idcomu,idpuntcont,fecha,hora) VALUES ('$idemprempl','$idempl','$idserv','$idempr','$idcomu','$idpuntcont','$fecha','$hora')";
							echo $sql1."<br>";
							$result1=mysql_query ($sql1) or die ("Invalid result datospuntcont");
	  				};
		};




   }
   fclose ($gestor);
}

}else{;
$doc=$pagina;
};


};

?>

	