<?php 
include('bbdd.php');
if ($ide!=null){;
include('../../../portada_n/cabecera4.php');
include('combo.php');?>
<div id="main">
<div class="titulo">
<p class="enc">ALTA DE ORDENES</p></div>
<div class="contenido">

<form action="intro2.php" method="post" name=rgb>
<table>
<input type="hidden" name="tabla" value="ipuntcont">
<input type="hidden" name="pcontacto" value="">
<input type="hidden" name="telcontacto" value="">

<tr><td>Numero de Trabajo</td><td><input type="text" name="numsiniestro"></td></tr>
<tr><td>Puesto de Trabajo</td>
<td>

<?if ($idclientesinc!=null){;?>
<?
$sql="SELECT * from clientes where idempresas='".$ide."' and estado='1' and idclientes='".$idclientesinc."'";
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
$idclientes=$resultado['idclientes'];
?>
<input type="hidden" name="idaseguradora" value="<?=$idclientes;?>"><?=$nombre;?>
<?}else{;?>

<select name="idaseguradora" id="combobox">
<option value="">
<?
$sql="SELECT * from clientes where idempresas='".$ide."' and estado='1'";
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$row2=mysqli_num_rows($result);

for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result,$t);
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
$idclientes=$resultado['idclientes'];
?>
<option value="<?=$idclientes;?>"><?=$nombre;?>
<?};?>
</select>
<?};?>
</td></tr>

<tr><td>Dia Apertura</td><td><input type="text" name="d" size="2" value="<?=date('d');?>">-<input type="text" name="m" size="2" value="<?=date('m');?>">-<input type="text" name="y" size="4" value="<?=date('Y');?>"></td></tr>

<!--
<tr><td>Hora Apertura</td><td>
<input type="text" name="hora" size="2">-<input type="text" name="min" size="2">-<input type="text" name="seg" size="2"></td></tr>
<tr><td>E-mail</td><td><input type="text" name="mailcontacto"></td></tr>
-->



<tr><td>Producto</td><td>
<select name="productos" id="combobox">
<option value="">
<?
$sql22="SELECT * from puntservicios where idempresas='".$ide."' and idpccat='5'";
//echo $sql22;
$result22=mysqli_query($conn,$sql22) or die ("Invalid result");
$row22=mysqli_num_rows($result);

for ($ti=0;$ti<$row22;$ti++){;
mysqli_data_seek($result22,$ti);
$resultado=mysqli_fetch_array($result22);
$nombret=$resultado22['subcategoria'];
?>
<option value="<?=$nombret;?>"><?=$nombret;?>
<?};?>
</select>
</td></tr>








<tr><td>Unidades</td><td><input type="text" name="unidades"></td></tr>

<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

</div>
</div>

<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://www.smartcbc.com">aquí</a>

<?};?>


