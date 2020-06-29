<?php  
include('bbdd.php');

if ($ide!=null){;
 include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">CIERRE DE SINIESTROS</p></div>
<div class="contenido">
<?php 
$sql1="SELECT * from siniestros";
$sql1.=" where idempresa='".$ide."' ";
$sql1.=" and idsiniestro='".$idsiniestro."' ";
//echo $sql1;
$result=mysqli_query ($conn,$sql1) or die ("Invalid result1");
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

<input type="hidden" name="idsiniestro" value="<?php  echo $idsiniestro;?>">
<input type="hidden" name="estado" value="<?php  echo $estado;?>">
<input type="hidden" name="diacierre" value="<?php  echo $diacierre;?>">
<input type="hidden" name="horacierre" value="<?php  echo $horacierre;?>">

<tr><td>Numero de Siniestro</td><td><?php  echo $numsiniestro;?></td></tr>
<tr><td>Estado de Siniestro</td><td><select name="estado1">
<option value="0" <?php if ($estado==0){;?> selected<?php };?> >Abierto
<option value="1" <?php if ($estado==1){;?> selected<?php };?>>Cerrado
</select>
</td></tr>
<tr><td>Compañia de Seguros</td><td>
<?php 
$sql="SELECT * from aseguradora where idempresa='".$ide."' and idaseguradora='".$idaseguradora."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['aseguradora'];
?>
<?php  echo $nombre;?>
</td></tr><tr><td>Dia Cierre</td><td><input type="text" maxlength="2" size="2" name="d" value="<?php  echo $d;?>">-
<input type="text" maxlength="text" name="m" size="2" value="<?php  echo $m;?>">-
<input type="text" maxlength="text" name="a" size="4" value="<?php  echo $a;?>"></td></tr>
<tr><td>Hora Cierre</td><td><input type="text" maxlength="2" size="2" name="h" value="<?php  echo $h;?>">-
<input type="text" maxlength="2" name="min" size="2" value="<?php  echo $min;?>">-
<input type="text" maxlength="2" name="seg" size="2" value="<?php  echo $seg;?>"></td></tr>
<tr><td>Persona de Contacto</td><td><?php  echo $contacto;?></td></tr>
<tr><td>Telefono</td><td><?php  echo $telefono;?></td></tr>
<tr><td>Direccion</td><td><?php  echo $direccion;?></td></tr>
<tr><td>Localidad</td><td><?php  echo $localidad;?></td></tr>
<tr><td>Provincia</td><td><?php  echo $provincia;?></td></tr>
<tr><td>Codigo Postal</td><td><?php  echo $cp;?></td></tr>
<tr><td>E-mail</td><td><?php  echo $email;?></td></tr>
<tr><td colspan="2">Descripcion</td></tr>
<tr><td colspan="2"><?php  echo $descripcion;?></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>


</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>