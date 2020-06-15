<?php  
include('bbdd.php');
$idpccat=3;
if ($ide!=null){;
 include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE ASIGNACION DE EVENTOS</p></div>
<div class="contenido">

<?php 
if ($idsiniestro==null){;
?>

<form action="mpuntconti.php" method="post">


<?php 
$sql="SELECT * from siniestros where idempresa='".$ide."' ";
$sql.="and terminado='0'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//echo $sql;
$row=mysqli_num_rows($result);
if ($row!=0){;?>
<table>
<tr><td>Numero de Evento</td><td>
<select name="idsiniestro">
<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$idsiniestro=$resultado['idsiniestro'];
$numsiniestro=$resultado['numsiniestro'];
?>
<option value="<?php  echo $idsiniestro;?>"><?php  echo $numsiniestro;?>
<?php };?>
</select></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php }else{;?>
<table><tr><td>
No tiene siniestros sin terminar.
</td></tr></table>
<?php };?>


<?php } else {;?>

<form action="intro2.php" method="post">
<table>
<input type="hidden" name="tabla" value="ipuntconti">
<input type="hidden" name="idsiniestro" value="<?php  echo $idsiniestro;?>">


<tr class="subenc3"><td>Datos del Evento</td></tr>
<?php 
$sql="SELECT * from siniestros where idempresa='".$ide."' and idsiniestro='".$idsiniestro."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$numsiniestro=$resultado['numsiniestro'];
$contacto=$resultado['contacto'];
$telefono=$resultado['telefono'];
$direccion=$resultado['direccion'];
$localidad=$resultado['localidad'];
$provincia=$resultado['provincia'];
$cp=$resultado['cp'];
$descripcion=$resultado['descripcion'];
$idempleado=$resultado['idempleado'];
$diaasig=$resultado['diaasignacion'];
$horaasig=$resultado['horaasignacion'];
?>
<input type="hidden" name="idempleado" value="<?php  echo $idempleado;?>">
<input type="hidden" name="diaasig" value="<?php  echo $diaasig;?>">
<input type="hidden" name="horaasig" value="<?php  echo $horaasig;?>">

<tr><td>
<table>
<tr><td><?php  echo $numsiniestro;?></td><td><?php  echo $contacto;?></td><td><?php  echo $telefono;?></td></tr>
<tr><td colspan="3"><?php  echo $direccion;?>-<?php  echo $localidad;?>-<?php  echo $provincia;?>-<?php  echo $cp;?></td></tr>
<tr><td colspan="3"><?php  echo $descripcion;?></td></tr>
</tr>
</table><td></tr>


<tr class="subenc3"><td>Acciones Realizadas</td></tr>
<?php 
$sql="SELECT * from accsiniestros where idempresa='".$ide."' and idsiniestro='".$idsiniestro."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
if ($row==0){;
?>
<tr><td>Ninguna Accion Realizada.</td></tr>
<?php 
}else{;

for ($t=0;$t<$row;$t++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$trabajor=$resultado['trabajorealizado'];
$trabajop=$resultado['trabajopendiente'];
$idempleado=$resultado['idempleado'];

$sql2="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$resultado2=mysqli_fetch_array($result2);
$nombre=$resultado2['nombre'];
$priapellido=$resultado2['1apellido'];
$segapellido=$resultado2['2apellido'];
?>
<tr><td>
<table>
<tr><td>Trabajador</td><td><?php  echo $nombre;?>, <?php  echo $priapellido;?> <?php  echo $segapellido;?></td></tr>
<tr><td>Trabajo Realizado</td><td><?php  echo $trabajor;?></td></tr>
<tr><td>Trabajo Pendiente</td><td><?php  echo $trabajop;?></td></tr>
</table>
</td></tr>
<?php };?>
<?php };?>

<tr class="subenc3"><td>Asignacion del Siniestro</td></tr>
<?php 
$sql2="SELECT * from empleados where idempresa='".$ide."' and estado='1'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);
?>
<tr><td>Empleado</td><td><select name="idempleado1">
<?php 
for ($h=0;$h<$row2;$h++){;
mysqli_data_seek($result2, $h);
$resultado2=mysqli_fetch_array($result2);
$idempleado=$resultado2['idempleado'];
$nombre=$resultado2['nombre'];
$priapellido=$resultado2['1apellido'];
$segapellido=$resultado2['2apellido'];
?>
<option value="<?php  echo $idempleado;?>"><?php  echo $nombre;?>, <?php  echo $priapellido;?> <?php  echo $segapellido;?>
<?php };?>
</select>
</td></tr>
<?php 
$yant=strtok($diaasig,'-');
$mant=strtok('-');
$dant=strtok('-');
$hant=strtok($horaasig,':');
$minant=strtok(':');
$segant=strtok(':');

?>

<tr><td>Dia</td><td><input type="text" name="d" size="2" value="<?php  echo $dant;?>">-<input type="text" name="m" size="2" value="<?php  echo $mant;?>">-<input type="text" name="y" size="4" value="<?php  echo $yant;?>"></td></tr>
<tr><td>Hora</td><td><input type="text" name="hora" size="2" value="<?php  echo $hant;?>">-<input type="text" name="min" size="2" value="<?php  echo $minant;?>">-<input type="text" name="seg" size="2" value="<?php  echo $segant;?>"></td></tr>


<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php };?>


</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>