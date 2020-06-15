<html>
<head>
<title>Listado de Usuarios</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('../bbdd/sqlfacturacion.php');
?>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">CONTROL DE ACCESO DE USUARIOS</td></tr>

</table>



<?
if ($ide!=null){;
//if ($datos!='datos'){;
?>
<!--
<table>
<form method="post" action="lusuarios.php">
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Clientes</td><td><select name="estado">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
-->
<?
//}else{;

$sql="SELECT * from usuarios where idempresas='".$ide."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
?>
<table>
<tr class="menor1">
<td><?=$usuarios;?></td>
</tr>
</table>
<table>
<tr class="subenc"><td>Visitas ( Dia - Hora )</td></tr>

<?
$sql1="SELECT * from visitas where usuario='".$usuarios."' order by dia desc,hora desc"; 
$result1=mysql_query ($sql1) or die ("Invalid result");
$row=mysql_affected_rows();
for ($j=0;$j<$row;$j++){;
?>
<tr>
<td>
<?$dia=mysql_result($result1,$j,'dia');?><?=$dia;?>-<?$hora=mysql_result($result1,$j,'hora');?><?=$hora;?>
</td>
</tr>
<?};?>
</table>

<?//};?>

<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://facturacion.piscisol.com">aquí</a>

<?};?>
</body>
</html>





