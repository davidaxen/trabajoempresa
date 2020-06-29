<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION INDIVIDUAL DE LOS PUNTOS DE MOVIMIENTO</p></div>
<div class="contenido">
<?php 
$sql="SELECT * from puntcont where idempresas='".$ide."' and id='".$id."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$id=$resultado['id'];
$descrip=$resultado['descripcion'];
?>
<form action="intro2.php" method="post">
<input type="hidden" name="tabla" value="puntos">

<input type="hidden" name="id" value="<?php  echo $id;?>">
<input type="hidden" name="descripcion" value="<?php  echo $descrip;?>">
<table>
<tr class="subenc3"><td>Descripcion</td><td><input type="text" name="descripcionn" value="<?php  echo $descrip;?>"</td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>

</form>


</div>
</div>
<?php } else {;
include ('../../cierre.php');
 };?>