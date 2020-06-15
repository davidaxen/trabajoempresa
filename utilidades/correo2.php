<?
include('../bbdd/sqlfacturacion.php');



$sql1="SELECT * from publi where idempresa='".$ide."' and id='".$camp."'"; 
$result1=mysql_query ($sql1) or die ("Invalid result");
$titulo=mysql_result($result1,0,'titulo');
$campaña=mysql_result($result1,0,'campaña');
$documento=mysql_result($result1,0,'documento');
$dossier=mysql_result($result1,0,'doossier');


$sql="SELECT * from destinatario where idempresa='".$ide."' and estado='1' and email1!=''";
if ($cp!='todos'){
$sql.=" and cp='".$cp."'";	
}; 
if ($dest!='todos'){
$sql.=" and id='".$dest."'";	
};
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();

for ($h=0;$h<$row;$h++){;
$email1=mysql_result($result,$h,'email1');
$idt=mysql_result($result,$h,'id');
$destinatario = $email1;
 
$asunto = $titulo;
$idocumento="'".$wpubli."/presupuesto.php?dato=".$ide."&num=".$camp."&dest=".$idt."'";
$icampaña="'".$wpubli."/".$campaña."'";
$baja= "'".$wpubli."/baja.php?num=".$idt."&dato=".$ide."'";

if ($forma=="dossier"){;

  $destino="'".$wpubli."/";
 
 copy($_FILES['archivo1']['tmp_name'], $destino.$_FILES['archivo1']['name']);  
   
  $item= $destino.$_FILES['archivo1']['name'];
  $name=$_FILES['archivo1']['name'];
  $mensaje="Mensaje del mail";
  $size=filesize($item);

  $file = fopen($item, "r"); 

  $contenido=fread($file,$size);

  $encoded_attach = chunk_split(base64_encode($contenido)); 

  fclose($file);

$cuerpo = " <html> <head><title>$titulo</title> </head><body> <table border=0><tr><td>Después de la conversación mantenida está mañana.<br>Aquí les mando, una pequeña presentación de nuestra empresa.<br>Esperamos ser les de gran utilidad.<br>Atentamente<br><?=$repr;?></td></tr></table>";
}else{
$cuerpo = "<html> <head><title>$titulo</title> </head><body> <table border=0><tr><td><a href=$idocumento><img src=$icampaña border=0></a></td></tr></table>";
};

$cuerpo. = "<table width='600'><tr><td>Si quiere obtener un presupuesto para su comunidad, <a href=$idocumento>pinche aqui</a><p></td></tr><tr><td>Si no desea recibir más e-mails sobre nuestros productos,  <a href=$baja>pinche aqui</a><p></td></tr><tr><td>Este correo y sus archivos asociados son privados y confidenciales y va dirigido exclusivamente a su destinatario. Si recibe este correo sin ser el destinatario del mismo, le rogamos proceda a su eliminación y lo ponga en conocimiento del emisor. La difusión por cualquier medio del contenido de este correo podría ser sancionada conforme lo previsto a las leyes españolas. No se autoriza la utilización con fines comerciales o para su incorporación a ficheros automatizados de las direcciones del emisor o del destinatario. </td></tr></table></body> </html> "; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: ".$nemp." <".$email.">\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: ".$email."\r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: ".$email."\r\n"; 
//archivo adjunto  
$cabeceras .= "X-attachments: $name"; 
//direcciones que recibián copia 
//$headers .= "Cc:admiservi@yahoo.com \r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: \r\n"; 
//echo $cuerpo;
mail($destinatario,$asunto,$cuerpo,$headers); 
echo 'Correo enviado a '.$destinatario.'-'.$idt.'<p>';
};
echo 'Total de correos enviados '.$row
?> 