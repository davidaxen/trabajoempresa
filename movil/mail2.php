<?php  
include('bbdd.php');
if ($ide!=null){;
include('../portada_n/cabecera2.php');
//include('combo.php');?>
<div id="main">
<div class="titulo">
<p class="enc">ENVIO DE INCIDENCIAS</p></div>
<div class="contenido">

<?php
$diaa=date('Y-m-d', time());
$hora=date('H:i:s',time());
$idempleado=$idtrab;
$idempresa=$ide;

$sql1 = "INSERT INTO almpcinci (idempresas,idempleado,idpiscina,texto,imagen,dia,hora,lat,lon) VALUES ('$idempresa','$idempleado','$idcomunidad','$valor','$docf','$diaa','$hora','$lat','$lon')";
//echo $sql1;

$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");
$row=mysqli_num_rows($result);
echo "<b>INCIDENCIA INTRODUCCIDA</b>";

if ($urgente=="true"){;

$sql10="SELECT * from empleados where idempresa='".$idempresa."' and idempleado='".$idempleado."'"; 
//echo $sql10.'<br/>'; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$resultado10=mysqli_fetch_array($result10);
$nombre=$resultado10['nombre'];
$apellidop=$resultado10['1apellido'];
$apellidos=$resultado10['2apellido'];
$trabajador=$nombre." ".$apellidop." ".$apellidos;
//echo $trabajador."</br>";

$sql1="SELECT * from empresas where idempresas='".$idempresa."'";
//echo $sql1.'<br/>'; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$resultado1=mysqli_fetch_array($result1);
$emailempresa=$resultado1['emailadmin'];
$nemp=$resultado1['nombre'];
//echo $nemp."</br>";
//echo $emailempresa."</br>";

if ($idcomunidad=='1'){;
$nomcliente='Teletrabajo';
}else{;
$sql="SELECT * from clientes where idclientes='".$idcomunidad."' and idempresas='".$idempresa."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result 0");
$resultado=mysqli_fetch_array($result);
$idgestor=$resultado['idgestor'];
$nomcliente=$resultado['nombre'];
$sql2="SELECT * from gestores where idgestor='".$idgestor."' and idempresa='".$idempresa."'";
echo $sql2.'<br/>'; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result 2");
$resultado2=mysqli_fetch_array($result2);
$emailgestor=$resultado2['email'];
//echo $emailgestor."</br>";
};
//echo $nomcliente."</br>";


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
$html.="<tr><td>Dia: $diaa </td></tr>";
$html.="<tr><td>Hora: $hora </td></tr>";
if ($mimagen!=null){;
$path = "http://control.nativecbc.com/img/" . $rf1;
$html.="<tr><td>Imagen:<img src='".$path."'></td></tr>";
};
$html.="<tr><td>e mail gestor: $emailgestor </td></tr>";
$html.="</table>";

//echo $email1."</br>";
//echo $text."</br>";
//echo $html."</br>";

require_once '../../mail/PHPMailerAutoload.php';
 
$results_messages = array();
 
$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';
 
class phpmailerAppException extends phpmailerException {}
 

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

 
if (count($results_messages) > 0) {
echo ("enviado");

foreach ($results_messages as $result) {
  echo "<li>$result</li>\n";
}
echo "</ul>\n";
}

}
?>
</div>
</div>
<?php } else {;

include('../../cierre.php');

};?>
