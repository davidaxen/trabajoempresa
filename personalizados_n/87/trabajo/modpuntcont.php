<?php 
include('bbdd.php');

if ($ide!=null){;

include('../../../portada_n/cabecera4.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE ORDENES</p></div>
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
$diaapertura=$resultado['diaapertura'];
$horaapertura=$resultado['horaapertura'];
$estado=$resultado['terminado'];
?>


<form action="intro2.php" method="post" name=rgb>
<table>
<input type="hidden" name="tabla" value="modpuntcont">

<input type="hidden" name="idsiniestro" value="<?=$idsiniestro;?>">
<input type="hidden" name="numsiniestro" value="<?=$numsiniestro;?>">
<input type="hidden" name="idaseguradora" value="<?=$idaseguradora;?>">
<input type="hidden" name="pcontacto" value="<?=$contacto;?>">
<input type="hidden" name="telcontacto" value="<?=$telefono;?>">
<input type="hidden" name="descripcion" value="<?=$descripcion;?>">
<input type="hidden" name="diaapertura" value="<?=$diaapertura;?>">
<input type="hidden" name="horaapertura" value="<?=$horaapertura;?>">
<input type="hidden" name="terminado" value="<?=$estado;?>">
<?

$a=strtok($diaapertura,"-");
$m=strtok("-");
$d=strtok("-");

$h=strtok($horaapertura,":");

$min=strtok(":");
$seg=strtok(":");

?>


<tr><td>Numero de Siniestro</td><td><input type="text" name="numsiniestro1" value="<?=$numsiniestro;?>"></td></tr>
<tr><td>Puesto de Trabajo</td>
<td>
<?if ($idclientesinc!=null){;?>
<?
$sql2="SELECT * from clientes where idempresas='".$ide."' and estado='1' and idclientes='".$idclientesinc."'";
$result2=mysqli_query($conn,$sql2) or die ("Invalid result");
$resultado2=mysqli_fetch_array($result2);
$nombre=$resultado2['nombre'];
$idclientes=$resultado2['idclientes'];
?>
<input type="hidden" name="idaseguradora1" value="<?=$idclientes;?>"><?=$nombre;?>
<?}else{;?>
<select name="idaseguradora1" id="combobox">
<?
$sql="SELECT * from clientes where idempresas='".$ide."' and estado='1' ";
if ($idaseguradora>10){;
$sql.=" and idclientes='".$idaseguradora."'";
};
//echo $sql;
$result2=mysqli_query($conn,$sql) or die ("Invalid result");
$row2=mysqli_num_rows($result2);

for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2,$t);
$resultado2=mysqli_fetch_array($result2);
$nombre=$resultado2['nombre'];
$idclientes=$resultado2['idclientes'];
?><option value="<?=$idclientes;?>"><?=$nombre;?>
<?};?>
</select>
<?};?>
</td></tr>


<tr><td>Persona de Contacto</td><td><input type="text" name="pcontacto1" value="<?=$contacto;?>"></td></tr>
<tr><td>Telefono</td><td><input type="text" name="telcontacto1" maxlength="9" value="<?=$telefono;?>"></td></tr>
<tr><td colspan="2">Descripcion</td></tr>
<tr><td colspan="2"><textarea name="descripcion1" cols="50" rows="8"><?=$descripcion;?></textarea></td></tr>
<tr><td>Dia Apertura</td><td><input type="text" maxlength="2" size="2" name="d" value="<?=$d;?>">-
<input type="text" maxlength="text" name="m" size="2" value="<?=$m;?>">-
<input type="text" maxlength="text" name="a" size="4" value="<?=$a;?>"></td></tr>

<tr><td>Hora Apertura</td><td><input type="text" maxlength="2" name="h" size="2" value="<?=$h;?>">-
<input type="text" maxlength="2" name="min" size="2" value="<?=$min;?>">-
<input type="text" maxlength="2" name="seg" size="2" value="<?=$seg;?>"></td></tr>

<tr><td>Estado</td><td><select name="terminado1">
<option value="0" <?if ($estado=='0'){;?>selected<?};?> >Abiertos</option>
<option value="1" <?if ($estado=='1'){;?>selected<?};?> >Cerrados</option>
</select>
</td></tr>

<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

</div>
</div>

<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://www.smartcbc.com">aquí</a>

<?};?>