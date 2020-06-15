<html>
<head>
<title>Introducción de Empleados</title>
<link rel="stylesheet" href="../estilo/estilo.css">
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
?>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">INTRODUCCION DE DESTINATARIOS</td></tr>
<tr><td class="enc"><?=$titulo;?></td></tr>
</table>


<form action="intro2.php" method="post" enctype="multipart/form-data">
<table>


<input type="hidden" name="tabla" value="publicd">
<input type="hidden" name="list" value="<?=$list;?>">

<?if ($list=='a'){;?>
<tr><td>Num. Colegiado</td><td><input type="text" name="numcol"></td></tr>
<tr><td>Nombre</td><td><input type="text" name="nombre"></td></tr>
<tr><td>Dirección</td><td><input type="text" name="direccion"></td></tr>
<tr><td>Codigo Postal</td><td><input type="text" name="cp" maxlength="5" size=5></td></tr>
<tr><td>Provincia</td><td><input type="text" name="provincia"></td></tr>
<tr><td>Localidad</td><td><input type="text" name="localidad"></td></tr>
<tr><td>Telefono I</td><td><input type="text" name="tele1"></td></tr>
<tr><td>Telefono II</td><td><input type="text" name="tele2"></td></tr>
<tr><td>Fax</td><td><input type="text" name="fax1"></td></tr>
<tr><td>Correo Electronico I</td><td><input type="text" name="email1"></td></tr>
<tr><td>Correo Electronico II</td><td><input type="text" name="email2"></td></tr>
<?};?>

<?if ($list=='c'){;?>
<tr><td>Nombre de Comunidad</td><td><input type="text" name="nombre"></td></tr>
<tr><td>Dirección</td><td><input type="text" name="direccion"></td></tr>
<tr><td>Codigo Postal</td><td><input type="text" name="cp" maxlength="5" size=5></td></tr>
<tr><td>Provincia</td><td><input type="text" name="provincia"></td></tr>
<tr><td>Localidad</td><td><input type="text" name="localidad"></td></tr>
<tr><td>Foto</td><td><input type="file" name="foto"></td></tr>
<?};?>

<?if ($list=='e'){;?>
<tr><td>Persona de Contacto</td><td><input type="text" name="contacto"></td></tr>
<tr><td>Nombre de la Empresa</td><td><input type="text" name="nombre"></td></tr>
<tr><td>Dirección</td><td><input type="text" name="direccion"></td></tr>
<tr><td>Codigo Postal</td><td><input type="text" name="cp" maxlength="5" size=5></td></tr>
<tr><td>Provincia</td><td><input type="text" name="provincia"></td></tr>
<tr><td>Localidad</td><td><input type="text" name="localidad"></td></tr>
<tr><td>Telefono I</td><td><input type="text" name="tele1"></td></tr>
<tr><td>Telefono II</td><td><input type="text" name="tele2"></td></tr>
<tr><td>Fax</td><td><input type="text" name="fax1"></td></tr>
<tr><td>Correo Electronico I</td><td><input type="text" name="email1"></td></tr>
<tr><td>Correo Electronico II</td><td><input type="text" name="email2"></td></tr>
<?};?>


<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>






