<?
include('../bbdd/sqlfacturacion.php');



$sql1="SELECT * from publi where idempresa='".$ide."' and id='".$camp."'"; 
$result1=mysql_query ($sql1) or die ("Invalid result");
$titulo=mysql_result($result1,0,'titulo');
$campa�a=mysql_result($result1,0,'campa�a');
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
$icampa�a="'".$wpubli."/".$campa�a."'";
$baja= "'".$wpubli."/baja.php?num=".$idt."&dato=".$ide."'";
$cuerpo = " 
<html> 
<head>
<title>$titulo</title> 
<style>
td {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 10pt;
  text-align: left;
  vertical-align: top;
  color:0000aa;
}
</style>
</head>
<body> 
<table border=0>
<tr>
<td><a href=$idocumento><img src=$icampa�a border=0></a></td>
</tr>
</table>
<table width='600'>
<tr>
<td>Si quiere obtener un presupuesto para su comunidad, 
<a href=$idocumento>pinche aqui</a><p>
</td>
</tr>
<tr>
<td>Si no desea recibir m�s e-mails sobre nuestros productos,  
<a href=$baja>pinche aqui</a><p>
</td>
</tr>

<tr>
<td>Este correo y sus archivos asociados son privados y confidenciales y va dirigido exclusivamente 
a su destinatario. Si recibe este correo sin ser el destinatario del mismo, le rogamos 
proceda a su eliminaci�n y lo ponga en conocimiento del emisor. La difusi�n por cualquier 
medio del contenido de este correo podr�a ser sancionada conforme lo previsto a las leyes 
espa�olas. No se autoriza la utilizaci�n con fines comerciales o para su incorporaci�n a 
ficheros automatizados de las direcciones del emisor o del destinatario. </td>
</tr>
</table>
</body> 
</html> 
"; 

//para el env�o en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//direcci�n del remitente 
$headers .= "From: ".$nemp." <".$email.">\r\n"; 

//direcci�n de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: ".$email."\r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: ".$email."\r\n"; 

//direcciones que recibi�n copia 
//$headers .= "Cc:admiservi@yahoo.com \r\n"; 

//direcciones que recibir�n copia oculta 
//$headers .= "Bcc: \r\n"; 
//echo $cuerpo;
mail($destinatario,$asunto,$cuerpo,$headers); 
echo 'Correo enviado a '.$destinatario.'-'.$idt.'<p>';
};
echo 'Total de correos enviados '.$row
?> 