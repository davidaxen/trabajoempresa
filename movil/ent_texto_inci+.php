<?php 
include('bbdd.php');
$valores1 = implode(",", array_keys($_POST));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_POST));



$gt="idempresa-".$valores1."-ent_texto_inci+";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 


$idempresa = str_replace("idempresa=", "", $idempresa);
$idempleado = str_replace("idempleado=", "", $idempleado);
$idcomunidad = str_replace("idcomunidad=", "", $idcomunidad);
$incid = str_replace("incid=", "", $incid);
$dia = str_replace("dia=", "", $dia);
$hora = str_replace("hora=", "", $hora);
$asunto = str_replace("asunto=", "", $asunto);
$idproveedor = str_replace("idproveedor=", "", $idproveedor);
$lat = str_replace("lat=", "", $lat);
$lon = str_replace("lon=", "", $lon);


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



/*
$rf1="";
$mimagen=basename( $_FILES['imagen']['name']);
$timagen=strtok(basename( $_FILES['imagen']['name']), '.');
$tipoimagen=strtok('.');
if ($mimagen!=null){;
$path="../img/";
$dia2=str_replace("-", "_", $diaa);
$hora2=str_replace(":", "_", $hora);
$rf1='inci-'.$idempresa."-".$idcomunidad."-".$dia2."-".$hora2.".".$tipoimagen;
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
*/


if ($incid!=null){;
$valor=strtr($incid,"_"," ");
//$valor.=" ".$diaa."-inci2";
}else{;
$valor=0;
};

if ($asunto!=null){;
$asuntot=strtr($asunto,"_"," ");
//$valor.=" ".$diaa."-inci2";
}else{;
$asuntot=0;
};

$sql1 = "INSERT INTO almpcinci (idempresas,idempleado,idpiscina,texto,dia,hora,lat,lon,idproveedor,plus,asunto) VALUES 
('$idempresa','$idempleado','$idcomunidad','$valor','$diaa','$hora','$lat','$lon','$idproveedor','1','$asuntot')";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result insert2");



$sql11 = "select id from almpcinci where idempresas='".$idempresa."' and idempleado='".$idempleado."' and idpiscina='".$idcomunidad."' and plus='1' and idproveedor='".$idproveedor."' and dia='".$diaa."' and hora='".$hora."'";
//echo $sql11;
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result select2");
$resultado11=mysqli_fetch_array($result11);
$idinciplus=$resultado11['id'];


$rep=$idinciplus."#".$idproveedor;
$rep=$idinciplus;
echo ($rep);










$urgente="false";
if ($urgente=="true"){;

$sql10="SELECT * from empleados where idempresa='".$idempresa."' and idempleado='".$idempleado."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$resultado10=mysqli_fetch_array($result10);
$nombre=$resultado10['nombre'];
$apellidop=$resultado10['1apellido'];
$apellidos=$resultado10['2apellido'];
$trabajador=$nombre." ".$apellidop." ".$apellidos;
//echo $trabajador."</br>";

$sql1="SELECT * from empresas where idempresas='".$idempresa."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$resultado1=mysqli_fetch_array($result1);
$emailempresa=$resultado1['email'];
$emailadmin=$resultado1['emailadmin'];
$nemp=$resultado1['nombre'];
//echo $nemp."</br>";
echo $emailempresa."</br>";


if ($idcomunidad!=0){;
$sql="SELECT * from clientes where idclientes='".$idcomunidad."' and idempresas='".$idempresa."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result 0");
$resultado=mysqli_fetch_array($result);
$idgestor=$resultado['idgestor'];
$nomcliente=$resultado['nombre'];
//echo $nomcliente."</br>";

$sql2="SELECT * from gestores where idgestor='".$idgestor."' and idempresa='".$idempresa."'";
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result 2");
$resultado2=mysqli_fetch_array($result2);
$emailgestor=$resultado2['email'];
//echo $emailgestor."</br>";

}else{;
$nomcliente='fuera de centro de trabajo';
};
$nomcliente=strtoupper($nomcliente);
$asunto="Incidencia urgente en ".$nomcliente;

	 //$mailto="sguinaldo@yahoo.com";
	 $mailto=$emailempresa;
    //$message=$obs;
    $subject = $asunto;
		$message = "
				<html>
				<head>
				<title>$asunto</title>
				</head>
				<body><center>
				<table>
				<tr><td colspan='3'><img src='https://control.nativecbc.com/images/logo_native.jpg'></td></tr>
				<tr><td colspan='3' align='center'>INCIDENCIAS URGENTE RECIBIDA DESDE</td></tr>
				<tr><td colspan='3' align='center'>$nomcliente</td></tr>
				<tr><td colspan='3' align='center'>&nbsp</td></tr>
				<tr><td colspan='3' >INCIDENCIA URGENTE ENVIADA EL DIA $diaa y a la HORA $hora con el siguiente texto:</td></tr>
				<tr><td colspan='3' >$valor</td></tr>
				<tr><td colspan='3' align='center'>&nbsp</td></tr>
				<tr><td colspan='3' align='center'>La INCIDENCIA HA SIDO ENVIADA DESDE <a href='https://control.nativecbc.com/portada_n/mapa2.php?lon=$lon&lat=$lat&nombrecom=$nomcliente&nombretrab=$trabajador'>
				<img src='https://control.nativecbc.com/img/modificar.gif'>
				</a></td></tr>			
				<tr><td colspan='3' align='center'>&nbsp</td></tr>";				
if ($mimagen!=null){;
$message.="	<tr><td colspan='3'><img src='https://control.nativecbc.com/img/".$rf1."' width='600px'></td></tr>";
};			
				
				
$message.="<tr><td align='center'>Smartcbc</td><td align='center'>Condiciones del servicio</td><td align='center'>Politica</td></tr>
				</table>
				</center>
				</body>
				</html>";    

    /*
    $message='*Mensaje enviado desde su aplicación de Gestión de Trabajo y Personal<br/>';
    $message.='Estimado Cliente:<br/>';
    $message.="Tienes las siguientes indicidencia desde ".$nomcliente.":<br/>";
    $message.=$valor."<br/>";
*/    
    
/*    
 if ($rf1!=""){;   
    $file = $path . "/" . $rf1;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
};
*/
    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (we use a PHP end of line constant)
    $eol = PHP_EOL;

    // main header (multipart mandatory)

    $headers .= 'From: SMARTCBC - INCIDENCIAS - <no-reply@smartcbc.com>' . $eol;
    $headers .= 'Cc: '.$emailadmin.''  . $eol;
    /*$headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol . $eol;

    // message
  $headers .= "--" . $separator . $eol;
*/
    
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
    //$headers .= $message . $eol . $eol;

/*
if ($rf1!=""){;
    // attachment
    $headers .= "--" . $separator . $eol;
    $headers .= "Content-Type: application/octet-stream; name=\"" . $rf1 . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: base64" . $eol;
    $headers .= "Content-Disposition: attachment" . $eol . $eol;
    $headers .= $content . $eol . $eol;
    $headers .= "--" . $separator . "--";
 };   
*/  

    //SEND Mail
     if (mail($mailto, $subject, $message, $headers)) {
        //echo "mail send ... OK"; // or use booleans here
       echo "<center><table border=1 cellspacing=5 cellpadding=5><tr><th>MENSAJE ENVIADO SATISFACTORIAMENTE</th></tr></table></center>";
       // echo $mailto."<br>";
       // echo $subject."<br>";
       // echo $message."<br>";
       // echo $headers."<br>";       
        
      } else {
        //echo "mail send ... ERROR!";
       echo "<center><table border=1 cellspacing=5 cellpadding=5><tr><th>MENSJE NO ENVIADO</th></tr></table></center>";
       // echo $mailto."<br>";
       // echo $subject."<br>";
       // echo $message."<br>";
       // echo $headers."<br>";
      }
      
//phpinfo();
}

?>
