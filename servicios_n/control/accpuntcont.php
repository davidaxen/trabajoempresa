<?php  
include('bbdd.php');
$idpccat=3;

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES DE SINIESTRO</p></div>
<div class="contenido">

<?php 
if ($idsiniestro==null){;
?>

<form action="accpuntcont.php" method="post">


<?php 
$sql="SELECT * from siniestros where idempresa='".$ide."' ";
$sql.="and terminado='0'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//echo $sql;
$row=mysqli_num_rows($result);
if ($row!=0){;?>
<table>
<tr><td>Numero de Siniestro</td><td>
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

<table>

<tr class="subenc3"><td>Datos del Siniestro</td></tr>
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
<tr><td>
<table>
<tr class="subenc5"><td>Num. Siniestro</td><td>Pers. Contacto</td><td>Telefono</td><td>Dirección</td><td>Descripcion</td></tr>
<tr>
<td><?php  echo $numsiniestro;?></td>
<td><?php  echo $contacto;?></td>
<td><?php  echo $telefono;?></td>
<td><?php  echo $direccion;?><br><?php  echo $localidad;?><br><?php  echo $provincia;?> <?php  echo $cp;?></td>
<td colspan="3"><?php  echo $descripcion;?></td>
</tr>
</table>
<td></tr>


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
mysqli_data_seek($result, $t);
$resultado=mysqli_fetch_array($result);
$id=$resultado['id'];
$trabajor=$resultado['trabajorealizado'];
$trabajop=$resultado['trabajopendiente'];
$descripcion1=$resultado['descripcion'];
$diaent=$resultado['diaentrada'];
$horaent=$resultado['horaentrada'];
$diasal=$resultado['diasalida'];
$horasal=$resultado['horasalida'];
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
<tr class="subenc5">
<td>Trabajador</td>
<td>Dia y Hora de Entrada</td>
<td>Dia y Hora de Salida</td>
<td>Descripcion</td>
<td>Trabajo Realizado</td>
<td>Trabajo Pendiente</td>
<td>Parte</td>
</tr>
<tr>
<td><?php  echo $nombre;?>, <?php  echo $priapellido;?> <?php  echo $segapellido;?></td>
<td><?php  echo $diaent;?> <?php  echo $horaent;?></td>
<td><?php  echo $diasal;?> <?php  echo $horasal;?></td>
<td><?php  echo $descripcion1;?></td>
<td><?php  echo $trabajor;?></td>
<td><?php  echo $trabajop;?></td>
<td><a href="pdfparte.php?id=<?php  echo $id;?>"><img src="../../img/modificar.gif"></a></td>
</tr>
</table>
</td></tr>
<?php };?>
<?php };?>

<tr class="subenc3"><td>Asignacion del Siniestro</td></tr>


<?php 
$sql2="SELECT * from empleados where idempresa='".$ide."' and estado='1'"; 
if ($idempleado!=0){;
$sql2.=" and idempleado='".$idempleado."'";
};
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);
?>
<tr><td>
<table>
<tr class="subenc5"><td>Empleado</td><td>Dia</td><td>Hora</td></tr>
<tr><td>
<?php 
$resultado2=mysqli_fetch_array($result2);
$idempleado=$resultado2['idempleado'];
$nombre=$resultado2['nombre'];
$priapellido=$resultado2['1apellido'];
$segapellido=$resultado2['2apellido'];
?>
<?php  echo $nombre;?>, <?php  echo $priapellido;?> <?php  echo $segapellido;?>
</td>
<td><?php  echo $diaasig;?></td><td><?php  echo $horaasig;?></td></tr>
</table>
</td></tr>
</table>


<?php };?>


</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>
