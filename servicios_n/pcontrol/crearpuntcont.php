<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">CREACION DE NUEVOS PUNTOS DE MOVIMIENTO</p></div>
<div class="contenido">
<?php 
if ($enviar==null){;?>

<form action="crearpuntcont.php" method="post">
<table>
<tr><td>Nombre del Puesto de Trabajo</td><td>

<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];
$nombre=$resultado['nombre'];
?>
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>"><?php  echo $nombre;?>
</td></tr>
<tr><td>Cantidad de Puntos de Control</td><td><input type="text" size=50 name="cantpuntcont"></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php } else {;?>

<form action="intro2.php" method="post">
<table>
<input type="hidden" name="tabla" value="npuntcont">

<input type="hidden" name="cantpuntcont" value="<?php  echo $cantpuntcont;?>">
<tr><td>Datos de la Comunidad</td><td><input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];
$nombre=$resultado['nombre'];?>
<?php  echo $nombre;?></td></tr>


<?php for ($i=0;$i<$cantpuntcont;$i++){;?>
<tr><td>Nuevo Punto de Control</td><td><input type="text" name="punt[<?php  echo $i?>]"></td></tr>
<?php };?>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>


<?php };?>


</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>