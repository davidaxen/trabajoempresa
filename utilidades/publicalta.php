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
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">INTRODUCCION DE CAMPAÑA</td></tr>
</table>


<form action="intro2.php" method="post" enctype="multipart/form-data">
<table>

<?
$sql="select id from publi where idempresa='".$ide."' order by id desc"; 
$result=mysql_query ($sql) or die ("Invalid result clientes");
$idc=mysql_result($result,0,'id');
if ($idc!=null){;
$idc=$idc+1;
}else{;
$idc=1;
};
?>

<input type="hidden" name="idc" value="<?=$idc;?>">
<input type="hidden" name="tabla" value="public">

<tr><td>Titulo de la Campaña</td><td><input type="text" name="titulo"></td></tr>
<tr><td>Año</td><td><input type="text" name="año" maxlength="4" size=4></td></tr>
<tr><td>Fecha de fin de Campaña</td><td><input type="text" name="fecha"></td></tr>
<tr><td>Imagen de Campaña</td><td><input type="file" name="imagen"></td></tr>
<tr><td>Dossier PDF</td><td><input type="file" name="dossierpdf"></td></tr>
<tr><td>Documento PHP</td><td><input type="file" name="docpdf"></td></tr>




<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>






