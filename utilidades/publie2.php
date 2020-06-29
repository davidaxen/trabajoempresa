<html>
<head>
<title>Acciones de Publicidad</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('../bbdd/sqlfacturacion.php');
?>

<?if ($ide!=null){;?>

<?if ($list==null){;?>
<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">ENVIO DE CAMPAÑAS DE PUBLICIDAD</td></tr>
</table>
<form action="publie.php" method="post" enctype="multipart/form-data">
<table>
<tr><td>Destinatarios</td><td><select name="list"><option value="a">Administrador<option value="c">Comunidades de Vecinos</select>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>

</form>

<?}else{;?>


<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">ENVIO DE CAMPAÑAS DE PUBLICIDAD</td></tr>
</table>
<?if ($list=='a'){;?>
<form action="correo3.php" method="post" enctype="multipart/form-data">
<?$sql="SELECT * from destinatario where id='".$id."'";?>
<?};?>
<?if ($list=='c'){;?>
<form action="/publi/pdfpubli.php" method="post" enctype="multipart/form-data">
<?$sql="SELECT * from propuestas where id='".$id."'";?>
<?};?>
<?if ($list=='e'){;?>
<form action="correo3.php" method="post" enctype="multipart/form-data">
<?$sql="SELECT * from empresaspub where id='".$id."'"; ?>
<?};?>
<?
$result=mysql_query ($sql) or die ("Invalid result");


$sql1="SELECT * from publi where idempresa='".$ide."' and estado='1' order by id desc"; 
$result1=mysql_query ($sql1) or die ("Invalid result");
$row1=mysql_affected_rows();
?>
<input type="hidden" name="list" value="<?=$list;?>">
<input type="hidden" name="cp[0]" value="<?=$cp;?>">
<input type="hidden" name="dato" value="<?=$ide;?>">
<input type="hidden" name="dest" value="<?=$id;?>">
<table>


<tr><td>Destinatario</td><td><?$nombre=mysql_result($result,0,'nombre');?><?=$nombre;?></td></tr>

<tr><td>Campaña</td><td><select name="camp">
<?for($j=0;$j<$row1;$j++){;?>
<?$id=mysql_result($result1,$j,'id');?>
<?$titulo=mysql_result($result1,$j,'titulo');?>
<?$año=mysql_result($result1,$j,'año');?>
<option value="<?=$id;?>"><?=$titulo;?>-<?=$año;?>
<?};?>
</td></tr>

<tr><td>Documento a Enviar</td>
<td><select name="forma">
<option value="publi">Publicidad
<option value="dossier">Dossier
</td></tr>
<?if ($row1!=0){;?>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
<?};?>
</table>



<?};?>

<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://facturacion.piscisol.com">aquí</a>

<?};?>




















