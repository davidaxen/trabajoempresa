<html>
<head>
<title>Etiquetas</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('../bbdd/sqlfacturacion.php');
?>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">ETIQUETAS</td></tr>
</table>



<?
if ($idclientes==null){;

if ($enviar!="enviar"){;?>
<form action="etiquetas.php" method="post">
<table>
<tr><td>Tamaño de letra</td><td><select name="tipo">
<option value="9-6-29">9
<option value="16-3-16">16
<option value="22-2-12">22
</select></td></tr>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>
<?}else{;?>

<form action="pdfetiquetas.php" method="post">
<table>
<?
$letra=strtok($tipo,'-');
$lineas=strtok('-');
$max=strtok('-');
?>
<input type="hidden" name="letra" value="<?=$letra;?>">
<input type="hidden" name="lineas" value="<?=$lineas;?>">
<?for ($i=0;$i<$lineas;$i++){;?>
<tr><td>Linea <?=$i;?></td><td><input type="text" size=50 maxlength="<?=$max;?>" name="linea[<?=$i;?>]"></td></tr>
<?};?>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>
<?};?>

<?};?>






