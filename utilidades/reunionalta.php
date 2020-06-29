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
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">INTRODUCCION DE REUNION / RECORDATARIOS</td></tr>
</table>


<form action="intro2.php" method="post" enctype="multipart/form-data">
<table>


<input type="hidden" name="tabla" value="reunion">
<input type="hidden" name="list" value="<?=$list;?>">
<input type="hidden" name="idref" value="<?=$id;?>">
<?

$sql1="SELECT * from publi where idempresa='".$ide."'and estado='1' order by id desc"; 
$result1=mysql_query ($sql1) or die ("Invalid result");
$row1=mysql_affected_rows();
?>

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

$sql.=" where id='".$id."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$nombre=mysql_result($result,0,'nombre');
?>
<tr><td>Nombre</td><td><?=$nombre;?></td></tr>
<tr><td>Dia</td><td><input type="text" name="diar"> Ej. aaaa-mm-dd</td></tr>
<tr><td>Hora</td><td><input type="text" name="horar"> Ej. hh:mm:ss</td></tr>

<tr><td>Campaña</td><td><select name="camp">
<?for($j=0;$j<$row1;$j++){;?>
<?$id=mysql_result($result1,$j,'id');?>
<?$titulo=mysql_result($result1,$j,'titulo');?>
<?$año=mysql_result($result1,$j,'año');?>
<option value="<?=$id;?>"><?=$titulo;?>-<?=$año;?>
<?};?>
</select>
</td></tr>

<tr><td>Estado</td><td><select name="estadon">
<option value="0">negro
<option value="1">rojo
<option value="2">naranja
<option value="3">amarillo
<option value="4">verde
<option value="5">azul
</select>
</td></tr>

<tr><td>Observaciones</td><td>
<textarea name="obser" cols=50 rows=5></textarea>
</td></tr>



<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>






