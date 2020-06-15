<?php 
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE ORDENES ASIGNADAS
<? 
switch ($estord){;
case '1': echo "CERRADOS";break;
case '0': echo "ABIERTOS";break;
default: echo "";break;
};?>
</p></div>
<div class="contenido">

<?if ($estord==null){;?>

<form action="lpuntconti.php" method="post">
<table>
<tr><td>Estado Actual</td></tr>
<tr><td>
<select name="estord">
<option value="todos">Todos
<option value="1">Cerrados
<option value="0">Abiertos
</select>
</td>
</tr>
</table>
<input class="envio" type="submit" name="Enviar" value="enviar">
</form>
<?}else{;?>
<?
$sql1="SELECT * from trabajos";
$sql1.=" where idempresa='".$ide."' ";
if ($estord!='todos'){;
$sql1.=" and terminado='".$estord."' ";
};
$sql1.=" order by dia asc";
//echo $sql1;
$result=mysqli_query($conn,$sql1) or die ("Invalid result1");
$row=mysqli_num_rows($result);
?>

<table>
<tr class="subenc"><td>Nº Trabajos</td><td>Empleado Asignado</td>
<td>Dia y Hora Asignacion</td>
<td>Persona de contacto</td><td>Telefono</td><td>Direccion</td><td>Email</td><td>Descripcion</td>
<? if ($estord=="todos"){;?><td>Estado</td><?};?>
<td>Acciones</td>
</tr>

<? for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idsiniestro=$resultado['idsiniestro'];
$numsiniestro=$resultado['numsiniestro'];
$idempleado=$resultado['idempleado'];
$contacto=$resultado['contacto'];
$telefono=$resultado['telefono'];
$direccion=$resultado['direccion'];
$localidad=$resultado['localidad'];
$provincia=$resultado['provincia'];
$cp=$resultado['cp'];
$email=$resultado['email'];
$descripcion=$resultado['descripcion'];
$est=$resultado['terminado'];
$idempleado=$resultado['idempleado'];
$diaasig=$resultado['diaasignacion'];
$horaasig=$resultado['horaasignacion'];
?><tr class="menor1">
<td><?=$numsiniestro;?></td>
<?
$sql2="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 
$result2=mysqli_query($conn,$sql2) or die ("Invalid result");
$resultado2=mysqli_fetch_array($result2);
$nombre=$resultado2['nombre'];
$priapellido=$resultado2['1apellido'];
$segapellido=$resultado2['2apellido'];

?>
<td><?=$nombre;?>, <?=$priapellido;?> <?=$segapellido;?></td>
<td><?=$diaasig;?> <?=$horaasig;?></td>





<td><?=$contacto;?></td><td><?=$telefono;?></td>
<td><?=$direccion;?><br>
<?=$localidad;?><br>
<?=$provincia;?><br>
<?=$cp;?></td>
<td><?=$email;?></td>
<td><?=$descripcion;?></td>
<? if ($estado=="todos"){;?>
<td>
<? if ($est==1){;?>Cerrado<?};?>
<? if ($est==0){;?>Abierto<?};?>
</td>
<?};?>
<td><a href="accpuntcont.php?idsiniestro=<?=$idsiniestro;?>"><img src="../../img/modificar.gif"></a></td>
</tr>
<?};?>
</table>



<?};?>


</div>
</div>

<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://www.smartcbc.com">aquí</a>

<?};?>