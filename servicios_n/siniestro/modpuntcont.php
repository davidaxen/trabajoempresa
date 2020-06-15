<?php  
include('bbdd.php');

if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE ORDENES</p></div>
<div class="contenido">

<?php 
$sql1="SELECT * from siniestros";
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

<input type="hidden" name="idsiniestro" value="<?php  echo $idsiniestro;?>">
<input type="hidden" name="numsiniestro" value="<?php  echo $numsiniestro;?>">
<input type="hidden" name="idaseguradora" value="<?php  echo $idaseguradora;?>">
<input type="hidden" name="pcontacto" value="<?php  echo $contacto;?>">
<input type="hidden" name="telcontacto" value="<?php  echo $telefono;?>">
<input type="hidden" name="dircontacto" value="<?php  echo $direccion;?>">
<input type="hidden" name="loccontacto" value="<?php  echo $localidad;?>">
<input type="hidden" name="procontacto" value="<?php  echo $provincia;?>">
<input type="hidden" name="cpcontacto" value="<?php  echo $cp;?>">
<input type="hidden" name="mailcontacto" value="<?php  echo $email;?>">
<input type="hidden" name="descripcion" value="<?php  echo $descripcion;?>">
<input type="hidden" name="diaapertura" value="<?php  echo $diaapertura;?>">
<input type="hidden" name="horaapertura" value="<?php  echo $horaapertura;?>">
<input type="hidden" name="terminado" value="<?php  echo $estado;?>">
<?php 

$a=strtok($diaapertura,"-");
$m=strtok("-");
$d=strtok("-");

$h=strtok($horaapertura,":");

$min=strtok(":");
$seg=strtok(":");

?>


<tr><td>Numero de Siniestro</td><td><input type="text" name="numsiniestro1" value="<?php  echo $numsiniestro;?>"></td></tr>
<tr><td>Compañia de Seguros</td><td><select name="idaseguradora1">
<?php 
$sql="SELECT * from aseguradora where idempresa='".$ide."' and estado='1'"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$row2=mysqli_num_rows($result);

for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result, $t);
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['aseguradora'];
$idaseg=$resultado['idaseguradora'];
?><option value="<?php  echo $idaseg;?>" <?php if ($idaseg==$idaseguradora){;?>selected <?php };?> ><?php  echo $nombre;?>
<?php };?>
</select></td></tr>
<tr><td>Persona de Contacto</td><td><input type="text" name="pcontacto1" value="<?php  echo $contacto;?>"></td></tr>
<tr><td>Telefono</td><td><input type="text" name="telcontacto1" maxlength="9" value="<?php  echo $telefono;?>"></td></tr>
<tr><td>Direccion</td><td><input type="text" name="dircontacto1" value="<?php  echo $direccion;?>"></td></tr>
<tr><td>Localidad</td><td><input type="text" name="loccontacto1" value="<?php  echo $localidad;?>"></td></tr>
<tr><td>Provincia</td><td><input type="text" name="procontacto1" value="<?php  echo $provincia;?>"></td></tr>
<tr><td>Codigo Postal</td><td><input type="text" name="cpcontacto1" maxlength="5" value="<?php  echo $cp;?>"></td></tr>
<tr><td>E-mail</td><td><input type="text" name="mailcontacto1" value="<?php  echo $email;?>"></td></tr>
<tr><td colspan="2">Descripcion</td></tr>
<tr><td colspan="2"><textarea name="descripcion1" cols="50" rows="8"><?php  echo $descripcion;?></textarea></td></tr><tr><td>Dia Apertura</td><td><input type="text" maxlength="2" size="2" name="d" value="<?php  echo $d;?>">-
<input type="text" maxlength="text" name="m" size="2" value="<?php  echo $m;?>">-
<input type="text" maxlength="text" name="a" size="4" value="<?php  echo $a;?>"></td></tr>

<tr><td>Hora Apertura</td><td><input type="text" maxlength="2" name="h" size="2" value="<?php  echo $h;?>">-
<input type="text" maxlength="2" name="min" size="2" value="<?php  echo $min;?>">-
<input type="text" maxlength="2" name="seg" size="2" value="<?php  echo $seg;?>"></td></tr>

<tr><td>Estado</td><td><select name="terminado1">
<option value="0" <?php if ($estado=='0'){;?>selected<?php };?> >Abiertos</option>
<option value="1" <?php if ($estado=='1'){;?>selected<?php };?> >Cerrados</option>
</select>
</td></tr>

<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>