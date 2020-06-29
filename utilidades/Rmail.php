<?php 
////Mail Con Adjunto , cualquier tipo de archivo se va no problem 
/// Por : Luis Toscano - www.Codigolandia.com - lab.codigolandia.com
/// CL-Lab Team PorQ estamos aqui y aqui nos quedamos 
///Barranquilla - Colombia 
/// 19 de enero del 2008 7:02 pm 
///Cualquier cosa me comentan a este mail commentariosweb@gmail.com


 if($_POST['btn_envio']){
  $destino="/home/tu ruta ojo q si no la colocas no funca
  $prefijo="sonido_";
 
 copy($_FILES['archivo1']['tmp_name'], $destino.'/'.$prefijo.$_FILES['archivo1']['name']);  
   
  $item= $destino.'/'.$prefijo.$_FILES['archivo1']['name'];
  $name=$_FILES['archivo1']['name'];
  $mensaje="Mensaje del mail";
  $size=filesize($item);

  $file = fopen($item, "r"); 

  $contenido=fread($file,$size);

  $encoded_attach = chunk_split(base64_encode($contenido)); 

  fclose($file); 

  $cabeceras .= "MIME-version: 1.0n"; 
  $cabeceras .= "Content-type: multipart/mixed; "; 
  $cabeceras .= "boundary="Message-Boundary"n";
  $cabeceras .= "From: enviado por <tu mail tbn >r n";  
  $cabeceras .= "Reply-To: Devolver a  <Tu mail valido>r n"; 
  $cabeceras .= "Content-transfer-encoding: 7BITn"; 
  $cabeceras .= "X-attachments: $name"; 

  $body_top = "--Message-Boundaryn"; 
  $body_top .= "Content-type: text/plain; charset=US-ASCIIn"; 
  $body_top .= "Content-transfer-encoding: 7BITn"; 
  $body_top .= "Content-description: Archivonn"; 

  $cuerpo = $body_top.$mensaje; 

  $cuerpo .= "nn--Message-Boundaryn"; 
  $cuerpo .= "Content-type: aplication/zip; name="$name"n"; 
  $cuerpo .= "Content-Transfer-Encoding: BASE64n"; 
  $cuerpo .= "Content-disposition: attachment; filename="$name"nn"; 
  $cuerpo .= "$encoded_attachn"; 
  $cuerpo .= "nn--Message-Boundaryn"; 

  mail('mails a enviar','Archivo enviado desde Codigolandia',$cuerpo,$cabeceras); 


echo ' y se ha enviado Copia a Commentariosweb@gmail.com';

}
?>  

<form method="POST" enctype="multipart/form-data"> 
 
 <input type="file" name="archivo1" size="13" />
 
 <input type="Submit" name="btn_envio" value="Guardar Archivos" ></font></p>

</form>
 