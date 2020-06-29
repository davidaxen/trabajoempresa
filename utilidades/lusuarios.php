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
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">LISTADO DE USUARIOS</td></tr>

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
<tr class="subenc"><td>Cod Usuario</td><td>Nombre</td></tr>
<? for ($i=0; $i<$row; $i++){;?>
<tr class="menor1">
<td><?$user1=mysql_result($result,$i,'user');?><?=$user1;?></td>
<?
$sql10="SELECT nombre,1apellido,2apellido from empleados where idempresa='".$ide."' and nif='".$user1."'"; 
$result10=mysql_query ($sql10) or die ("Invalid result");
$row10=mysql_affected_rows();?>
<td>
<?if ($row10!=0){;?>
<?$nombre=mysql_result($result10,0,'nombre');?>
<?$apellido1=mysql_result($result10,0,'1apellido');?>
<?$apellido2=mysql_result($result10,0,'2apellido');?>
<?=$nombre;?>,<?=$apellido1;?> <?=$apellido2;?>
<?}else{;?>
&nbsp;
<?};?>
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





