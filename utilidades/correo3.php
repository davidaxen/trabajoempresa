<?php
include('/home/pisciso/php/Mail.php');
include('/home/pisciso/php/Mail/mime.php');
include('../bbdd/sqlfacturacion.php');

if ($cp[0]!="todos"){;

for ($r=0; $r<count($cp);$r++){;
if ($r!=0){;
$cpt .=",";
};
$cpt .="'".$cp[$r]."'";

};
};


$sql1="SELECT * from publi where idempresa='".$ide."' and id='".$camp."'"; 
$result1=mysql_query ($sql1) or die ("Invalid result");
$titulo=mysql_result($result1,0,'titulo');
$campaña=mysql_result($result1,0,'campaña');
$documento=mysql_result($result1,0,'documento');
$dossier=mysql_result($result1,0,'dossier');


if ($list=='a'){;
$sql="SELECT * from destinatario ";
};

if ($list=='e'){;
$sql="SELECT * from empresaspub ";
};


$sql.="where estado='1' and email1!='' and correomal='0'";


if ($cp[0]!='todos'){
$sql.=" and cp in (".$cpt.")";	
}; 
if ($dest!='todos'){
$sql.=" and id='".$dest."'";	
};


//echo $sql;
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();


//echo $row;
$grup=ceil($row/200)+1;
//echo "<br>".$grup;
if ($row>200){;
?>
<script type="text/javascript" >
  alert ('Has seleccionado <?=$row;?>, lo maximo que podemos enviar cada hora son 200 referencias, por favor rectifique');
  history.back();
</script>

<?
$ht=0;
}else{;
?>
<script type="text/javascript" >
var r=confirm("Has seleccionado <?=$row;?> referencias, puedes llegar hasta los 200");
if (r==true)
  {
  	<?
  	$ht=0;
  	?>
  history.back();
  }
  if (r==false)
  {
  	<?
  	$ht=$row;
  	?>
  }
  </script>
<?
};
//echo "<br>grupo".$hi."-".$hf;
//echo date('h:i:s') . "\n";


for ($h=0;$h<$ht;$h++){;

$email1=mysql_result($result,$h,'email1');
$idt=mysql_result($result,$h,'id');
$destinatario = $email1;

$asunto = $titulo;
$idocumento="'".$wpubli."/presupuesto.php?dato=".$ide."&num=".$camp."&dest=".$idt."'";
$icampaña="'".$wpubli."/".$campaña."'";
$baja= "'".$wpubli."/baja.php?num=".$idt."&dato=".$ide."'";



$text = $asunto;
//$html = '<html><body>HTML version of email</body></html>';

if ($forma=="dossier"){;

$file = '../images/'.$dossier;
$html="<html><head><title>$titulo</title> </head><body> <table border=0><tr><td>Después de la conversación mantenida está mañana.<br>Aquí les mando, una pequeña presentación de nuestra empresa.<br>Esperamos serles de gran utilidad.<br>Atentamente<br>$repr</a></td></tr></table>";

};

if ($forma=="publi"){;
$file = '../images/'.$dossier;
$html="<html> <head><title>$titulo</title></head><body> <table border=0><tr><td><a href=$idocumento><img src=$icampaña border=0></a></td></tr></table>";
};

if ($ide=='17'){;
$html=$html."<br><table width='600'><tr><td>Si quiere solicitar información sobre un curso específico, ";
}else{;
$html=$html."<br><table width='600'><tr><td>Si quiere obtener un presupuesto para su comunidad, ";
};

$html=$html."<a href=$idocumento>pinche aqui</a><p></td></tr><tr><td>Si no desea recibir más e-mails sobre nuestros productos,  <a href=$baja>pinche aqui</a><p></td></tr><tr><td>Este correo y sus archivos asociados son privados y confidenciales y va dirigido exclusivamente a su destinatario. Si recibe este correo sin ser el destinatario del mismo, le rogamos proceda a su eliminación y lo ponga en conocimiento del emisor. La difusión por cualquier medio del contenido de este correo podría ser sancionada conforme lo previsto a las leyes españolas. No se autoriza la utilización con fines comerciales o para su incorporación a ficheros automatizados de las direcciones del emisor o del destinatario. </td></tr></table></body> </html> "; 


$crlf = "\n";
$hdrs = array(
              'From'    => $nemp.' <'.$email.'>',
              'Subject' => $text
              );

$mime = new Mail_mime($crlf);

$mime->setTXTBody($text);
$mime->setHTMLBody($html);
$mime->addAttachment($file, 'application/pdf');

//do not ever try to call these lines in reverse order
$body = $mime->get();
$hdrs = $mime->headers($hdrs);

$mail =& Mail::factory('mail');
//$mailc='correomal@admiservi.es';
//$mail =& Mail::factory('smtp',$params['localhost']= $mailc);

//echo 'Correo enviado a :'.$destinatario.'<p>';

if($mail->send($destinatario, $hdrs, $body)){;
echo 'Correo enviado a :'.$destinatario.'<p>';
$dia=date("Y-m-d",time());
$hora=date("H:i",time());

$sql10 = "INSERT INTO enviopubli (idempresa,campaña,idref,destinatario,correo,dia,hora,tipo,personal) VALUES ('$ide','$camp','$idt','$list','$email1','$dia','$hora','$forma','$user')";
//echo $sql1;
$result10=mysql_query ($sql10) or die ("Invalid result icarnet");
}else{;
echo('Correo no enviado, error');
};

};

/*
if ($grup>1){;
// dormir durante 3600 segundos
sleep(3600);
};
*/

echo 'Total de correos enviados '.$row



?> 