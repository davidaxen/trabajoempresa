<?php 
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE CLIENTES</p></div>
<div class="contenido">

<?if ($estado==null){;?>

<form action="mpuntconta.php" method="post">
<table>
<tr><td>Estado Actual</td></tr>
<tr><td>
<select name="estado">
<option value="todos">Todos
<option value="1">Alta
<option value="0">Baja
</select>
</td>
</tr>
</table>
<input class="envio" type="submit" name="Enviar" value="enviar">
</form>
<?}else{;?>
<?

$sql1="SELECT * from clientestrabajo";
$sql1.=" where idempresa='".$ide."' ";
if ($estado!='todos'){;
$sql1.=" and estado='".$estado."' ";
};
$sql1.=" order by idaseguradora asc";
//echo $sql1;
$result=mysqli_query($conn,$sql1) or die ("Invalid result1");
$row=mysqli_num_rows($result);
?>

<table>
<tr class="subenc"><td>Cliente</td><td>Persona de Contacto</td><td>Telefono</td><td>Direccion</td><td>Email</td></tr>

<? 
for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idaseguradora=$resultado['idaseguradora'];
$aseguradora=$resultado['aseguradora'];
$contacto=$resultado['contacto'];
$telefono=$resultado['telefono'];
$direccion=$resultado['direccion'];
$email=$resultado['email'];
?><tr class="menor1">
<td><?=$aseguradora;?></td><td><?=$contacto;?></td><td><?=$telefono;?></td><td><?=$direccion;?></td><td><?=$email;?></td>
<td><a href="modpuntconta.php?idaseguradora=<?=$idaseguradora;?>"><img src="../../img/modificar.gif"></a></td>
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

