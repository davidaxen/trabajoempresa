<?php  
include('bbdd.php');
if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ASIGNACION DE ORDENES</p></div>
<div class="contenido">

<?php 
if ($idsiniestro==null){;
?>

<form action="ipuntconti.php" method="post">


<?php 
$sql="SELECT * from siniestros where idempresa=:ide ";
$sql.="and terminado='0'";
$result=$conn->prepare($sql);
$result->bindParam(':ide', $ide);
$result->execute();

$resultmos=$conn->prepare($sql);
$resultmos->bindParam(':ide', $ide);
$resultmos->execute();

$row=count($result->fetchAll());
//$result=mysqli_query($conn,$sql) or die ("Invalid result");
//echo $sql;
//$row=mysqli_num_rows($result);
if ($row!=0){;?>
<table>
<tr><td>Numero de Orden</td><td>
<select name="idsiniestro">
<?php 
/*for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($resultmos as $rowmos) {
$idsiniestro=$rowmos['idsiniestro'];
$numsiniestro=$rowmos['numsiniestro'];
?>
<option value="<?php  echo $idsiniestro;?>"><?php  echo $numsiniestro;?>
<?php };?>
</select></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php }else{;?>
<table><tr><td>
No tiene ordenes sin terminar.
</td></tr></table>
<?php };?>


<?php } else {;?>

<form action="intro2.php" method="post">
<table>
<input type="hidden" name="tabla" value="ipuntconti">
<input type="hidden" name="idsiniestro" value="<?php  echo $idsiniestro;?>">


<tr class="subenc3"><td>Datos del Siniestro</td></tr>
<?php 
$sql="SELECT * from siniestros where idempresa=:ide and idsiniestro=:idsiniestro";
$result=$conn->prepare($sql);
$result->bindParam(':ide', $ide);
$result->bindParam(':idsiniestro', $idsiniestro);
$result->execute();
$resultado=$result->fetch();

/*$result=mysqli_query($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
$numsiniestro=$resultado['numsiniestro'];
$contacto=$resultado['contacto'];
$telefono=$resultado['telefono'];
$direccion=$resultado['direccion'];
$localidad=$resultado['localidad'];
$provincia=$resultado['provincia'];
$cp=$resultado['cp'];
$descripcion=$resultado['descripcion'];
$idempleado=$resultado['idempleado'];
?>
<tr><td>
<table>
<tr><td><?php  echo $numsiniestro;?></td><td><?php  echo $contacto;?></td><td><?php  echo $telefono;?></td></tr>
<tr><td colspan="3"><?php  echo $direccion;?>-<?php  echo $localidad;?>-<?php  echo $provincia;?>-<?php  echo $cp;?></td></tr>
<tr><td colspan="3"><?php  echo $descripcion;?></td></tr>
</tr>
</table><td></tr>


<tr class="subenc3"><td>Acciones Realizadas</td></tr>
<?php 
$sql="SELECT * from accsiniestros where idempresa=:ide and idsiniestro=:idsiniestro";
$result=$conn->prepare($sql);
$result->bindParam(':ide', $ide);
$result->bindParam(':idsiniestro', $idsiniestro);
$result->execute();
$row=count($result->fetchAll());

/*$result=mysqli_query($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
if ($row==0){;
?>
<tr><td>Ninguna Accion Realizada.</td></tr>
<?php 
}else{;

/*for ($t=0;$t<$row;$t++){;
mysqli_data_seek($result, $t);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$trabajor=$rowmos['trabajorealizado'];
$trabajop=$rowmos['trabajopendiente'];
$idempleado=$rowmos['idempleado'];


$sql2="SELECT * from empleados where idempresa=:ide and idempleado=:idempleado";
$result2=$conn->prepare($sql2);
$result2->bindParam(':ide', $ide);
$result2->bindParam(':idempleado', $idempleado);
$result2->execute();
$resultado2=$result2->fetch();
/*$result2=mysqli_query($conn,$sql2) or die ("Invalid result");
$resultado2=mysqli_fetch_array($result2);*/
$nombre=$resultado2['nombre'];
$priapellido=$resultado2['1apellido'];
$segapellido=$resultado2['2apellido'];
?>
<tr><td>
<table>
<tr><td class="subenc4">Trabajador</td><td><?php  echo $nombre;?>, <?php  echo $priapellido;?> <?php  echo $segapellido;?></td></tr>
<tr><td class="subenc4">Trabajo Realizado</td><td><?php  echo $trabajor;?></td></tr>
<tr><td class="subenc4">Trabajo Pendiente</td><td><?php  echo $trabajop;?></td></tr>
</table>
</td></tr>
<?php };?>
<?php };?>

<tr class="subenc3"><td>Asignacion de la Reparación / Siniestro</td></tr>

<?php 
$sql2="SELECT * from empleados where idempresa=:ide and estado='1'"; 
if ($idempleado!=0){
	$sql2.=" and idempleado=:idempleado";
	$result2=$conn->prepare($sql2);
	$result2->bindParam(':ide', $ide);
	$result2->bindParam(':idempleado', $idempleado);
	$result2->execute();

	$result2mos=$conn->prepare($sql2);
	$result2mos->bindParam(':ide', $ide);
	$result2mos->bindParam(':idempleado', $idempleado);
	$result2mos->execute();

}else{
	$result2=$conn->prepare($sql2);
	$result2->bindParam(':ide', $ide);
	$result2->execute();

	$result2mos=$conn->prepare($sql2);
	$result2mos->bindParam(':ide', $ide);
	$result2mos->execute();
}

$row2=count($result2->fetchAll());

/*$result2=mysqli_query($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result);*/
?>
<input type="hidden" name="idempleado" value="">
<input type="hidden" name="diaasig" value="">
<input type="hidden" name="horaasig" value="">

<tr><td>Empleado</td><td>

<select name="idempleado1">
<?php if ($idempleado==0){;?>
<option value=""> </option>
<?php };?>
<?php 
/*for ($h=0;$h<$row2;$h++){;
mysqli_data_seek($result2, $h);
$resultado2=mysqli_fetch_array($result2);*/
foreach ($result2mos as $row2mos) {
$idempleado=$row2mos['idempleado'];
$nombre=$row2mos['nombre'];
$priapellido=$row2mos['1apellido'];
$segapellido=$row2mos['2apellido'];
?>
<option value="<?php  echo $idempleado;?>"><?php  echo $nombre;?>, <?php  echo $priapellido;?> <?php  echo $segapellido;?>
<?php };?>
</select>
</td></tr>
<tr><td>Dia</td><td><input type="text" name="d" size="2">-<input type="text" name="m" size="2">-<input type="text" name="y" size="4"></td></tr>
<tr><td>Hora</td><td><input type="text" name="hora" size="2">-<input type="text" name="min" size="2">-<input type="text" name="seg" size="2"></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php };?>
</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>