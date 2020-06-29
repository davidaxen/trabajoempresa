<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE ORDENES ASIGNADAS
<?php  if ($estado==1){;?> CERRADOS<?php };?>
<?php  if ($estado==0){;?> ABIERTOS<?php };?>
</p></div>
<div class="contenido">

<?php if ($estado==null){;?>

<form action="lpuntconti.php" method="post">
<table>
<tr><td>Estado Actual</td></tr>
<tr><td>
<select name="estado">
<option value="todos">Todos
<option value="1">Cerrados
<option value="0">Abiertos
</select>
</td>
</tr>
</table>
<input class="envio" type="submit" name="Enviar" value="enviar">
</form>
<?php }else{;?>
<?php 
$sql1="SELECT * from siniestros";
$sql1.=" where idempresa='".$ide."' ";
if ($estado!='todos'){;
$sql1.=" and terminado='".$estado."' ";
};
$sql1.=" order by dia asc";
//echo $sql1;

$result=$conn->query($sql1);


//$result=mysqli_query($conn,$sql1) or die ("Invalid result1");
//$row=mysqli_num_rows($result);
?>

<table>
<tr class="subenc"><td>Nº Siniestro</td><td>Empleado Asignado</td>
<td>Dia y Hora Asignacion</td>
<td>Persona de contacto</td><td>Telefono</td><td>Direccion</td><td>Email</td><td>Descripcion</td>
<?php  if ($estado=="todos"){;?><td>Estado</td><?php };?>
<td>Acciones</td>
</tr>

<?php  

foreach ($result as $row) {
	$idsiniestro=$row['idsiniestro'];
	$numsiniestro=$row['numsiniestro'];
	$idempleado=$row['idempleado'];
	$contacto=$row['contacto'];
	$telefono=$row['telefono'];
	$direccion=$row['direccion'];
	$localidad=$row['localidad'];
	$provincia=$row['provincia'];
	$cp=$row['cp'];
	$email=$row['email'];
	$descripcion=$row['descripcion'];
	$est=$row['terminado'];
	$idempleado=$row['idempleado'];
	$diaasig=$row['diaasignacion'];
	$horaasig=$row['horaasignacion'];	

//for ($i=0; $i<$row; $i++){;
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
//$idsiniestro=$resultado['idsiniestro'];
//$numsiniestro=$resultado['numsiniestro'];
//$idempleado=$resultado['idempleado'];
//$contacto=$resultado['contacto'];
//$telefono=$resultado['telefono'];
//$direccion=$resultado['direccion'];
//$localidad=$resultado['localidad'];
//$provincia=$resultado['provincia'];
//$cp=$resultado['cp'];
//$email=$resultado['email'];
//$descripcion=$resultado['descripcion'];
//$est=$resultado['terminado'];
//$idempleado=$resultado['idempleado'];
//$diaasig=$resultado['diaasignacion'];
//horaasig=$resultado['horaasignacion'];
?><tr class="menor1">
<td><?php  echo $numsiniestro;?></td>
<?php 
$sql2="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 

$result2=$conn->query($sql2);
$resultado2=$result2->fetch();
//$result2=mysqli_query($conn,$sql2) or die ("Invalid result");
//$resultado2=mysqli_fetch_array($result2);
$nombre=$resultado2['nombre'];
$priapellido=$resultado2['1apellido'];
$segapellido=$resultado2['2apellido'];

?>
<td><?php  echo $nombre;?>, <?php  echo $priapellido;?> <?php  echo $segapellido;?></td>
<td><?php  echo $diaasig;?> <?php  echo $horaasig;?></td>





<td><?php  echo $contacto;?></td><td><?php  echo $telefono;?></td>
<td><?php  echo $direccion;?><br>
<?php  echo $localidad;?><br>
<?php  echo $provincia;?><br>
<?php  echo $cp;?></td>
<td><?php  echo $email;?></td>
<td><?php  echo $descripcion;?></td>
<?php  if ($estado=="todos"){;?>
<td>
<?php  if ($est==1){;?>Cerrado<?php };?>
<?php  if ($est==0){;?>Abierto<?php };?>
</td>
<?php };?>
<td><a href="accpuntcont.php?idsiniestro=<?php  echo $idsiniestro;?>"><img src="../../img/modificar.gif"></a></td>
</tr>
<?php };?>
</table>



<?php };?>


</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>