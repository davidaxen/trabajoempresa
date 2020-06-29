<html>
<head>
<title>Modificación de Clientes</title>
<link rel="stylesheet" href="../estilo/estilo.css">

<?if ($list=='f'){;?>
<script type="text/javascript" src="urm2lat.js"></script>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAC2cbVZWeY8EQGlPB3ywinhRKtFgtCfGOrLBi5UxgPOc0gP58zRQPnPRTgjQ1BXo96ViBJbziDuciaA"
            type="text/javascript"></script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
 
  function initialize2(x,y) {

  	        latlon = new Array(2);
        var x, y, zone, southhemi;

	    	//alert ("log: " + x);
        	//alert ("lat: " + y);
			zone = 30;
			southhemi = false;    
			   
        UTMXYToLatLon (x, y, zone, southhemi, latlon);

        txtLon = RadToDeg (latlon[1]);
        txtLat = RadToDeg (latlon[0]);
        //alert ("longitud: " + txtLon);
        //alert ("latitud: " + txtLat);  	
  	
  	
  	
    var myOptions = {
      zoom: 19,
      center: new google.maps.LatLng(txtLat, txtLon),
      //mapTypeId: google.maps.MapTypeId.ROADMAP
		mapTypeId: google.maps.MapTypeId.HYBRID
    }
    var map = new google.maps.Map(document.getElementById("map_canvas"),
                                  myOptions);

    var image = 'beachflag.png';
    var myLatLng = new google.maps.LatLng(txtLat, txtLon);
    var beachMarker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image
    });
  }


</script>
<?};?>

</head>
<?php 
include('../bbdd/sqlfacturacion.php');
if ($list=='a'){;
$titulo='ADMINISTRADORES DE FINCAS';
};
if ($list=='c'){;
$titulo='COMUNIDADES DE VECINOS';
};
if ($list=='e'){;
$titulo='EMPRESAS';
};
if ($list=='f'){;
$titulo='CALLEJERO';
};
?>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">MODIFICACION DE DESTINARIOS</td></tr>
<tr><td class="enc"><?=$titulo;?></td></tr>
</table>
<?if ($list=='f'){;?>
  <div id="map_canvas" style="width: 670px; height: 345px"></div>
<?};?>  
<?
if ($ide!=null){;?>

<?
if ($list=='a'){;
$sql="SELECT * from destinatario"; 
};
if ($list=='c'){;
$sql="SELECT * from propuestas"; 
};
if ($list=='e'){;
$sql="SELECT * from empresaspub"; 
};
if ($list=='f'){;
$sql="SELECT * from callejero"; 
};
$sql.=" where id='".$id."'";
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();

?>
<table>

<form action="intro2.php"  method="post" enctype="multipart/form-data" name="form2">

<input type="hidden" name="tablas" value="modificar">
<input type="hidden" name="datos" value="modpublid">
<input type="hidden" name="id" value="<?=$id;?>">
<input type="hidden" name="list" value="<?=$list;?>">

<?if ($list!='f'){;?>

<?if ($list=='a'){;?>
<tr>
<td>Codigo de Cliente</td>
<?$numcoleg=mysql_result($result,0,'numcoleg');?>
<td><?=$numcoleg;?></td>
</tr>
<?};?>
<?if ($list=='e'){;?>
<tr>
<td>Persona de Contacto</td>
<?$contacto=mysql_result($result,0,'contacto');?>
<input type="hidden" name="contacto" value="<?=$contacto;?>">
<td><input type="text" name="contacto1" value="<?=$contacto;?>" size=50></td>
</tr>
<?};?>
<tr>
<td>Nombre del Destinatario</td><td colspan="4">
<?$nombre=mysql_result($result,0,'nombre');?>
<input type="hidden" name="nombre" value="<?=$nombre;?>">
<input type="text" name="nombre1" value="<?=$nombre;?>" size=50></td>
</tr>
<tr>
<td>Direccion</td>
<td colspan="4"><?$direccion=mysql_result($result,0,'domicilio');?>
<input type="hidden" name="domicilio" value="<?=$direccion;?>">
<input type="text" name="domicilio1" value="<?=$direccion;?>" size=50></td>
</tr>
<tr>
<td>Codigo Postal</td>
<td colspan="4"><?$cp=mysql_result($result,0,'cp');?>
<input type="hidden" name="cp" value="<?=$cp;?>">
<input type="text" name="cp1" value="<?=$cp;?>"></td>
</tr>

<tr>
<td>Provincia</td>
<td colspan="4"><?$provincia=mysql_result($result,0,'provincia');?>
<input type="hidden" name="provincia" value="<?=$provincia;?>">
<input type="text" name="provincia1" value="<?=$provincia;?>" size=50></td>
</tr>

<tr>
<td>Localidad</td>
<td colspan="4"><?$localidad=mysql_result($result,0,'localidad');?>
<input type="hidden" name="localidad" value="<?=$localidad;?>">
<input type="text" name="localidad1" value="<?=$localidad;?>" size=50></td>
</tr>
<?if ($list=='c'){;?>
<?$fotocliente=mysql_result($result,0,'fotocliente');?>
<input type="hidden" name="file" value="<?=$fotocliente;?>">
<tr><td>Foto</td><td><input type="file" name="file1">

<?if ($fotocliente!=null){;?>
<img src="../img/prescon/<?=$fotocliente;?>" width="50" onmouseover="this.width=200;this.height=200;"  onmouseout="this.width=50;this.height=50;">

<?};?>

</td></tr>

<?};?>

<?if ($list!='c'){;?>
<tr>
<td>Telefono</td>
<td colspan="4"><?$tele1=mysql_result($result,0,'tele1');?><?$tele2=mysql_result($result,0,'tele2');?>
<input type="hidden" name="tele1" value="<?=$tele1;?>">
<input type="hidden" name="tele2" value="<?=$tele2;?>">
<input type="text" name="tele1n" value="<?=$tele1;?>">-<input type="text" name="tele2n" value="<?=$tele2;?>">
</td>
</tr>
<tr>
<td>Fax</td>
<td colspan="4"><?$faxa=mysql_result($result,0,'fax');?>
<input type="hidden" name="faxa" value="<?=$faxa;?>">
<input type="text" name="faxa1" value="<?=$faxa;?>"></td>
</tr>

<tr>
<td>Email</td>
<td colspan="4"><?$email1=mysql_result($result,0,'email1');?><?$email2=mysql_result($result,0,'email2');?>
<input type="hidden" name="email1" value="<?=$email1;?>">
<input type="hidden" name="email2" value="<?=$email2;?>">
<input type="text" name="email1n" value="<?=$email1;?>"  size=50>-<input type="text" name="email2n" value="<?=$email2;?>" size=50>
</td>
</tr>

<tr>
<td>Web</td>
<td colspan="4"><?$web=mysql_result($result,0,'web');?>
<input type="hidden" name="web" value="<?=$web;?>">
<input type="text" name="web1" value="<?=$web;?>" size=50></td>
</tr>

<tr>
<td>Estado</td>
<td colspan="4"><?$estado=mysql_result($result,0,'estado');?>
<input type="hidden" name="estado" value="<?=$estado;?>">
<select name="estado1">
<option value="0" <?if ($estado=='0'){;?>selected<?};?>>No quiere publicidad
<option value="1" <?if ($estado=='1'){;?>selected<?};?>>Si quiere publicidad
</select></td>
</tr>

<tr>
<td>Verificación del Correo</td>
<td colspan="4"><?$correomal=mysql_result($result,0,'correomal');?>
<input type="hidden" name="correomal" value="<?=$correomal;?>">
<select name="correomal1">
<option value="0" <?if ($correomal=='0'){;?>selected<?};?>>Bien
<option value="1" <?if ($correomal=='1'){;?>selected<?};?>>Mal
</select></td>
</tr>
<?};?>
<?}else{;?>
<tr>
<td>
<?$i=0;?>
<?$cdtvia=mysql_result($result,$i,'cdtvia');?><?=$cdtvia;?> 
<?$dspart=mysql_result($result,$i,'dspart');?><?=$dspart;?> 
<?$dsvial=mysql_result($result,$i,'dsvial');?><?=$dsvial;?>, 
<?$numero=mysql_result($result,$i,'numero');?><?=$numero;?>
</td>
</tr>
<tr>
<td>
<?$coord_x=substr(mysql_result($result,$i,'coord_x'),0,6);?>
<?$coord_y=substr(mysql_result($result,$i,'coord_y'),0,7);?>

		<script> initialize2(<?=$coord_x;?>-89,<?=$coord_y;?>-198)</script>
</td>
</tr>
<tr>
<td>Piscina</td>
<td colspan="4"><?$piscina=mysql_result($result,0,'piscina');?>
<input type="hidden" name="piscina1" value="<?=$piscina;?>">
<select name="piscinanue">
<option value="0" <?if ($piscina=='0'){;?>selected<?};?>>No tiene piscina
<option value="1" <?if ($piscina=='1'){;?>selected<?};?>>Si tiene piscina
</select></td>
</tr>
<tr>
<td>Edificación</td>
<td colspan="4"><?$edificacion=mysql_result($result,0,'edificacion');?>
<input type="hidden" name="edificacion" value="<?=$edificacion;?>">
<select name="edificacionnue">
<option value="0" <?if ($edificacion=='0'){;?>selected<?};?>>Comunidad
<option value="1" <?if ($edificacion=='1'){;?>selected<?};?>>Chalet
<option value="2" <?if ($edificacion=='2'){;?>selected<?};?>>Parcela
<option value="3" <?if ($edificacion=='2'){;?>selected<?};?>>Poligono
</select></td>
</tr>
<?};?>
<tr>
<td>
<input type="submit" name="Enviar" value="Enviar"></td>
</tr>
</form>

</table>



<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="https://facturacion.admiservi.es">aquí</a>

<?};?>
</body>
</html>















