<?php 
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">CIERRE DE ORDENES</p></div>
<div class="contenido">


<?
$estado="0";

if ($estado==null){;?>

<form action="cpuntcont.php" method="post">
<table>
<tr><td>Estado Actual</td></tr>
<tr><td>
<select name="estado">
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
if ($estado!='todos'){;
$sql1.=" and terminado='".$estado."' ";
};
$sql1.=" order by dia asc";
//echo $sql1;
$result=mysqli_query($conn,$sql1) or die ("Invalid result1");
$row=mysqli_num_rows($result);
?>

<table>
<tr class="subenc"><td>N Trabajo</td><td>Persona de Contacto</td><td>Telefono</td><td>Direccion</td><td>Email</td><td>Estado</td><td>Descripcion</td></tr>

<? for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idsiniestro=$resultado['idsiniestro'];
$terminado=$resultado['terminado'];
$numsiniestro=$resultado['numsiniestro'];
$contacto=$resultado['contacto'];
$telefono=$resultado['telefono'];
$direccion=$resultado['direccion'];
$localidad=$resultado['localidad'];$provincia=$resultado['provincia'];
$cp=$resultado['cp'];
$email=$resultado['email'];
$descripcion=$resultado['descripcion'];
?><tr class="menor1">
<td><?=$numsiniestro;?></td><td><?=$contacto;?></td><td><?=$telefono;?></td>
<td><?=$direccion;?><br>
<?=$localidad;?><br>
<?=$provincia;?><br>
<?=$cp;?></td>
<td><?=$email;?></td>
<td>
<?
switch ($terminado){
case 0: echo "Abierto";break;
case 1: echo "Cerrado";break;	
	
	};?>


</td>
<td><?=$descripcion;?></td>
<td>
<?if ($terminado==0){;?>
<a href="modcpuntcont.php?idsiniestro=<?=$idsiniestro;?>"><img src="../../img/modificar.gif"></a>
<?};?>

</td>
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
