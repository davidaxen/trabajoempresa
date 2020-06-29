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
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">MODIFICACION DE USUARIOS</td></tr>

</table>



<?
if ($ide!=null){;

$sql="SELECT * from usuarios where idempresas='".$ide."' and user='".$user1."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
?>
<form method="post" action="modusuarios2.php">
<input type="hidden" name="user1" value="<?=$user1;?>">
<table>
<tr class="subenc"><td>Cod Usuario</td><td><?=$user1;?></td></tr>
<?$trab=mysql_result($result,0,'trabajadores');?>
<?if ($trab!=0){;?>
<input type="hidden" name="trabant" value="<=$trab;?>">
<tr><td>Trabajadores</td><td><input type="radio" name="trab" value="0">Inactivo - <input type="radio" name="trab" value="1" checked>Activo</td></tr>
<?}else{;?>
<?$verp=mysql_result($result,0,'verpuntcont');?>
<?if ($verp!=0){;?>
<input type="hidden" name="verpant" value="<=$verp;?>">
<tr><td>Ver Puntos de Control</td><td><input type="radio" name="verp" value="0">Inactivo - <input type="radio" name="verp" value="1" checked>Activo</td></tr>
<?}else{;?>
<?$fact=mysql_result($result,0,'facturacion');?>
<input type="hidden" name="factant" value="<?=$fact;?>">
<tr><td>Facturacion</td><td><input type="radio" name="fact" value="0" <?if ($fact==0){;?>checked<?}?>>Inactivo - <input type="radio" name="fact" value="1"  <?if ($fact==1){;?>checked<?}?>>Activo</td></tr>
<?$empl=mysql_result($result,0,'empleados');?>
<input type="hidden" name="emplant" value="<?=$empl;?>">
<tr><td>Empleados</td><td><input type="radio" name="empl" value="0" <?if ($empl==0){;?>checked<?}?>>Inactivo - <input type="radio" name="empl" value="1"  <?if ($empl==1){;?>checked<?}?>>Activo</td></tr>
<?$cont=mysql_result($result,0,'contabilidad');?>
<input type="hidden" name="contant" value="<?=$cont;?>">
<tr><td>Contabilidad</td><td><input type="radio" name="cont" value="0" <?if ($cont==0){;?>checked<?}?>>Inactivo - <input type="radio" name="cont" value="1"  <?if ($cont==1){;?>checked<?}?>>Activo</td></tr>
<?$util=mysql_result($result,0,'utilidades');?>
<input type="hidden" name="utilant" value="<?=$util;?>">
<tr><td>Utilidades</td><td><input type="radio" name="util" value="0" <?if ($util==0){;?>checked<?}?>>Inactivo - <input type="radio" name="util" value="1"  <?if ($util==1){;?>checked<?}?>>Activo</td></tr>
<?$exis=mysql_result($result,0,'existencias');?>
<input type="hidden" name="exisant" value="<?=$exis;?>">
<tr><td>Existencia</td><td><input type="radio" name="exis" value="0" <?if ($exis==0){;?>checked<?}?>>Inactivo - <input type="radio" name="exis" value="1"  <?if ($exis==1){;?>checked<?}?>>Activo</td></tr>
<?$pers=mysql_result($result,0,'personalizado');?>
<input type="hidden" name="persant" value="<?=$pers;?>">
<tr><td>Personalizado</td><td><input type="radio" name="pers" value="0" <?if ($pers==0){;?>checked<?}?>>Inactivo - <input type="radio" name="pers" value="1"  <?if ($pers==1){;?>checked<?}?>>Activo</td></tr>
<?$dato=mysql_result($result,0,'datoslateral');?>
<input type="hidden" name="datoant" value="<?=$dato;?>">
<tr><td>Datos Lateral</td><td><input type="radio" name="dato" value="0" <?if ($dato==0){;?>checked<?}?>>Inactivo - <input type="radio" name="dato" value="1"  <?if ($dato==1){;?>checked<?}?>>Activo</td></tr>
<?};?>
<?};?>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
</table>



<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://facturacion.piscisol.com">aquí</a>

<?};?>
</body>
</html>





