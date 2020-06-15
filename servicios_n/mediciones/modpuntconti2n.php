<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE PUNTOS DE <?php  echo strtoupper($nc);?> DE PUESTOS DE TRABAJO</p></div>
<div class="contenido">

<form action="intro2.php" method="post">
<table>

<tr><td>Datos de la Comunidad</td><td>
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];
$nombre=$resultado['nombre'];
?>
<?php  echo $nombre;?></td></tr>

<?php 
if ($idpuntoslectura!=null){;
$sql2="SELECT * from puntoslectura where idempresas='".$ide."' and idclientes='".$idclientes."' and idpuntoslectura='".$idpuntoslectura."' ";
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$resultado2=mysqli_fetch_array($result2);
$nombre=$resultado2['nombre'];
?>
<input type="hidden" name="tabla" value="modpuntconti2">
<input type="hidden" name="idpuntoslectura" value="<?php  echo $idpuntoslectura;?>">
<tr><td colspan="2"><input type="text" name="nombre" value="<?php  echo $nombre;?>"></td></tr>

<?php }else{;?>
<input type="hidden" name="cantpuntcont" value="<?php  echo $cantpuntcont;?>">
<input type="hidden" name="tabla" value="ipuntconti2">
<input type="hidden" name="dat" value="hola">
<?php 
for ($i=0;$i<$cantpuntcont;$i++){;?>
<tr><td>Punto</td><td><input type="text" name="punt[<?php  echo $i?>]"></td></tr>
<?php };?>

<?php };?>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>


</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>