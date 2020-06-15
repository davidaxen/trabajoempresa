<html>
<head>
<title>Introducción de Empleados</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('../bbdd/sqlfacturacion.php');
?>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">MODIFICACION DE CAMPAÑA</td></tr>
</table>


<form action="intro2.php" method="post" enctype="multipart/form-data">
<table>

<?
$sql="select * from publi where idempresa='".$ide."' and id='".$id."' order by id desc"; 
$result=mysql_query ($sql) or die ("Invalid result clientes");
$idc=mysql_result($result,0,'id');
$titulo=mysql_result($result,0,'titulo');
$año=mysql_result($result,0,'año');
$fecha=mysql_result($result,0,'fecha');
$estado=mysql_result($result,0,'estado');
$imagen=mysql_result($result,0,'campaña');
$docpdf=mysql_result($result,0,'documento');
$dossierpdf=mysql_result($result,0,'dossier');
?>

<input type="hidden" name="idc" value="<?=$idc;?>">
<input type="hidden" name="tabla" value="modpublic">
<input type="hidden" name="tituloant" value="<?=$titulo;?>">
<input type="hidden" name="añoant" value="<?=$año;?>">
<input type="hidden" name="fechaant" value="<?=$fecha;?>">
<input type="hidden" name="estadoant" value="<?=$estado;?>">
<input type="hidden" name="imagenant" value="<?=$imagen;?>">
<input type="hidden" name="dossierpdfant" value="<?=$dossierpdf;?>">
<input type="hidden" name="docpdfant" value="<?=$docpdf;?>">


<tr><td>Titulo de la Campaña</td><td><input type="text" name="titulo" value="<?=$titulo;?>"></td></tr>
<tr><td>Año</td><td><input type="text" name="año" maxlength="4" size=4 value="<?=$año;?>"></td></tr>
<tr><td>Fecha de fin de Campaña</td><td><input type="text" name="fecha"  value="<?=$fecha;?>"></td></tr>
<tr><td>Imagen de Campaña</td><td><input type="file" name="imagen"></td></tr>
<tr><td>Dossier PDF</td><td><input type="file" name="dossierpdf"></td></tr>
<tr><td>Documento PHP</td><td><input type="file" name="docpdf"></td></tr>
<tr><td>Estado</td><td><select name"estado"><option value="1" <?if ($estado=='1'){;?>selected<?};?>>Activo<option value="0" <?if ($estado=='0'){;?>selected<?};?>>Inactivo</td></tr>




<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>






