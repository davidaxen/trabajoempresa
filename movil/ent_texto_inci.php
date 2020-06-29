<?php 
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_texto_inci";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 

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


if ($foto!=null){;
$file = explode(".",$foto_name);
$dia2=str_replace("-", "_", $diaa);
$rf='inci1-'.$idcomunidad.'-'.$idempleado.'-'.$dia2.'-'.$mest.'-'.$anot;
//$docf=$rf.".".strtolower($file[1]);$docf=$rf.".jpg";
//$path="../img/";$path="";
if (!copy($foto,$path.$docf)) {;
    unlink ($path.$docf);
    copy($foto,$path.$docf);
};
}else{;
$foto=0;
};

if ($incid!=null){;
$valor=strtr($incid,"_"," ");//$valor = str_replace("_"," ",$incid);

$valor.="_ent_texto_inci";
}else{;
$valor=0;
};


//if($idemprempl=$idemppis){;
$sql1 = "INSERT INTO almpcinci (idempresas,idempleado,idpiscina,texto,imagen,dia,hora,lat,lon) VALUES ('$idempresa','$idempleado','$idcomunidad','$valor','$docf','$diaa','$hora','$lat','$lon')";
//echo $sql1;

$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");
$row=mysqli_num_rows($result);

/*
if($row==1){;
$nombre=$resultado['nombre');
$total=$nombre;
$rep=$total;
}else{;
$rep="error";
};
}else{;
$rep="error";
};


echo ($rep);
*/






if ($urgente=="true"){;

$sql10="SELECT * from empleados where idempresa='".$idempresa."' and idempleado='".$idempleado."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$resultado10=mysqli_fetch_array($result10);
$nombre=$resultado10['nombre'];
$apellidop=$resultado10['1apellido'];
$apellidos=$resultado10['2apellido'];
$trabajador=$nombre." ".$apellidop." ".$apellidos;
echo $trabajador."</br>";

$sql1="SELECT * from empresas where idempresas='".$idempresa."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$resultado1=mysqli_fetch_array($result1);
$emailempresa=$resultado1['emailadmin'];
$nemp=$resultado1['nombre'];
echo $nemp."</br>";
echo $emailempresa."</br>";

$sql="SELECT * from clientes where idclientes='".$idcomunidad."' and idempresas='".$idempresa."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result 0");
$resultado=mysqli_fetch_array($result);
$idgestor=$resultado['idgestor'];
$nomcliente=$resultado['nombre'];
echo $nomcliente."</br>";

$sql2="SELECT * from gestores where idgestor='".$idgestor."' and idempresa='".$idempresa."'";
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result 2");
$resultado2=mysqli_fetch_array($result2);
$emailgestor=$resultado2['email'];
echo $emailgestor."</br>";






$titulo="Incidencia urgente en ".$nomcliente;
//$destinatario = $emailempresa.",".$emailgestor;
$destinatario = $emailempresa;
$email1=$emailempresa;
$asunto = $titulo;

$text = $asunto;

$valor=strtoupper($valor);

$html="<html><head><title>$titulo</title></head><body>";
$html.="<table border=0>";
$html.="<tr><td>El trabajador $trabajador ha introducido la siguiente incidencia: </td></tr>";
$html.="<tr><td><p><b>$valor</b></td></tr>";
$html.="<tr><td>Dia: $dia </td></tr>";
$html.="<tr><td>Hora: $hora </td></tr>";
if ($mimagen!=null){;
$path = "http://control.nativecbc.com/img/" . $rf1;
$html.="<tr><td>Imagen:<img src='".$path."'></td></tr>";
};
$html.="<tr><td>e mail gestor: $emailgestor </td></tr>";
$html.="</table>";

echo $email1."</br>";
echo $text."</br>";
echo $html."</br>";


require_once '../../mail/PHPMailerAutoload.php';
 
$results_messages = array();
 
$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';
 
class phpmailerAppException extends phpmailerException {}
 
//try {
//$to = $email1;
//echo $to."</br>";

/*
if(!PHPMailer::validateAddress($to)) {
  throw new phpmailerAppException("La dirección de correo " . $to . " no es validad y no se procede al envio");
}
*/

$mail->isMail();
$mail->addReplyTo($email1, $nemp);
$mail->From       = $email1;
$mail->FromName   = $nemp;
$mail->addAddress($email1, $nemp);
$mail->Subject  = $text;
$body = $html;

$mail->WordWrap = 80;
$mail->msgHTML($body, dirname(__FILE__), true); //Create message bodies and embed images
$mail->send();
$results_messages[] = "Mensaje enviado a ".$email1;
//$mail->addAttachment($nomfich,$nomfich1);  // optional name

/* 
try {
  $mail->send();
  $results_messages[] = "Mensaje enviado a ".$email1;
}

catch (phpmailerException $e) {
  throw new phpmailerAppException('No se ha enviado el correo a: ' . $to. ': '.$e->getMessage());
}
*/

/*
}

catch (phpmailerAppException $e) {
  $results_messages[] = $e->errorMessage();
}
*/

 
if (count($results_messages) > 0) {
echo ("enviado");

foreach ($results_messages as $result) {
  echo "<li>$result</li>\n";
}
echo "</ul>\n";
}

}




?>
