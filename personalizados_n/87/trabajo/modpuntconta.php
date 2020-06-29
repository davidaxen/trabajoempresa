<?php 
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE CLIENTES</p></div>
<div class="contenido">

<?
$sql1="SELECT * from clientestrabajo";
$sql1.=" where idempresa='".$ide."' ";
$sql1.=" and idaseguradora='".$idaseguradora."' ";
//echo $sql1;
$result=mysqli_query($conn,$sql1) or die ("Invalid result1");
$resultado=mysqli_fetch_array($result);
$idaseguradora=$resultado['idaseguradora'];
$aseguradora=$resultado['aseguradora'];
$contacto=$resultado['contacto'];
$telefono=$resultado['telefono'];
$direccion=$resultado['direccion'];
$email=$resultado['email'];
$estado=$resultado['estado'];
?>



<form action="intro2.php" method="post" name=rgb>
<table>
<input type="hidden" name="tabla" value="modpuntconta">

<input type="hidden" name="idaseguradora" value="<?=$idaseguradora;?>">
<input type="hidden" name="aseguradora" value="<?=$aseguradora;?>">
<input type="hidden" name="pcontacto" value="<?=$contacto;?>">
<input type="hidden" name="telcontacto" value="<?=$telefono;?>">
<input type="hidden" name="dircontacto" value="<?=$direccion;?>">
<input type="hidden" name="mailcontacto" value="<?=$email;?>">
<input type="hidden" name="estado" value="<?=$estado;?>">

<tr><td>Compañia Aseguradora / Clientes</td><td><input type="text" name="aseguradora1" value="<?=$aseguradora;?>"></td></tr>
<tr><td>Persona de Contacto</td><td><input type="text" name="pcontacto1" value="<?=$contacto;?>"></td></tr>
<tr><td>Telefono</td><td><input type="text" name="telcontacto1" maxlength="9" value="<?=$telefono;?>"></td></tr>
<tr><td>Direccion</td><td><input type="text" name="dircontacto1" value="<?=$direccion;?>"></td></tr>
<tr><td>E-mail</td><td><input type="text" name="mailcontacto1" value="<?=$email;?>"></td></tr><tr><td>Estado</td><td><select name="estado1"><option value="0" <? if ($estado==0){;?> selected <?};?> >Baja<option value="1" <? if ($estado==1){;?> selected <?};?>>Alta</select></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

</div>
</div>

<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://www.smartcbc.com">aquí</a>

<?};?>

