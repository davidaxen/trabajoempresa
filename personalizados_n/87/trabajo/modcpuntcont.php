<?php 
include('bbdd.php');

if ($ide!=null){;

 include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">CIERRE DE ORDENES</p></div>
<div class="contenido">

<?
$sql1="SELECT * from trabajos";
$sql1.=" where idempresa='".$ide."' ";
$sql1.=" and idsiniestro='".$idsiniestro."' ";
//echo $sql1;
$result=mysqli_query($conn,$sql1) or die ("Invalid result1");

$resultado=mysqli_fetch_array($result);

$idaseguradora=$resultado['idaseguradora'];
$numsiniestro=$resultado['numsiniestro'];
$contacto=$resultado['contacto'];
$telefono=$resultado['telefono'];
$direccion=$resultado['direccion'];
$localidad=$resultado['localidad'];
$provincia=$resultado['provincia'];
$cp=$resultado['cp'];
$email=$resultado['email'];
$descripcion=$resultado['descripcion'];
$estado=$resultado['terminado'];
$diacierre=$resultado['diacierre'];
$horacierre=$resultado['horacierre'];
?>
<?

$a=strtok($diacierre,"-");
$m=strtok("-");
$d=strtok("-");

$h=strtok($horacierre,":");
$min=strtok(":");
$seg=strtok(":");

?>

<form action="intro2.php" method="post" name=rgb>
<table>
<input type="hidden" name="tabla" value="modcpuntcont">

<input type="hidden" name="idsiniestro" value="<?=$idsiniestro;?>">
<input type="hidden" name="estado" value="<?=$estado;?>">
<input type="hidden" name="diacierre" value="<?=$diacierre;?>">
<input type="hidden" name="horacierre" value="<?=$horacierre;?>">

<tr><td>Numero de Siniestro</td><td><?=$numsiniestro;?></td></tr>
<tr><td>Estado de Siniestro</td><td><select name="estado1">
<option value="0" <?if ($estado==0){;?> selected<?};?> >Abierto
<option value="1" <?if ($estado==1){;?> selected<?};?>>Cerrado
</select>
</td></tr>
<tr><td>Compañia de Seguros</td><td>
<?
$sql="SELECT * from clientestrabajo where idempresa='".$ide."' and idaseguradora='".$idaseguradora."'"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['aseguradora'];
?><?=$nombre;?>
</td></tr><tr><td>Dia Cierre</td><td><input type="text" maxlength="2" size="2" name="d" value="<?=$d;?>">-
<input type="text" maxlength="text" name="m" size="2" value="<?=$m;?>">-
<input type="text" maxlength="text" name="a" size="4" value="<?=$a;?>"></td></tr>
<tr><td>Hora Cierre</td><td><input type="text" maxlength="2" size="2" name="h" value="<?=$h;?>">-
<input type="text" maxlength="2" name="min" size="2" value="<?=$min;?>">-
<input type="text" maxlength="2" name="seg" size="2" value="<?=$seg;?>"></td></tr>
<tr><td>Persona de Contacto</td><td><?=$contacto;?></td></tr>
<tr><td>Telefono</td><td><?=$telefono;?></td></tr>
<tr><td>Direccion</td><td><?=$direccion;?></td></tr>
<tr><td>Localidad</td><td><?=$localidad;?></td></tr>
<tr><td>Provincia</td><td><?=$provincia;?></td></tr>
<tr><td>Codigo Postal</td><td><?=$cp;?></td></tr>
<tr><td>E-mail</td><td><?=$email;?></td></tr>
<tr><td colspan="2">Descripcion</td></tr>
<tr><td colspan="2"><?=$descripcion;?></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

</div>
</div>

<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://www.smartcbc.com">aquí</a>

<?};?>


