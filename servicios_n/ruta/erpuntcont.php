<?php  
include('bbdd.php');
if ($ide!=null){;
 include('../../portada_n/cabecera3.php');?>


<div id="main">
<div class="titulo">
<p class="enc">ASIGNAR EMPLEADOS A RUTA</p></div>
<div class="contenido">

<?php 
$sql="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
$apellido1=$resultado['1apellido'];
$apellido2=$resultado['2apellido'];
?>

<form action="intro2.php" method="get" name="form2">
<input type="hidden" name="tablas" value="erpuntcont">
<!--<input type="hidden" name="datos" value="jorclientes">-->
<input type="hidden" name="idempleado" value="<?php  echo $idempleado;?>">
<table>
<tr><td class="tit">Codigo del Empleado</td><td><?php  echo $idempleado;?></td></tr>
<tr><td class="tit">Nombre del Empleado</td>
<td>
<?php  echo $nombre;?>, <?php  echo $apellido1;?> <?php  echo $apellido2;?>
</td></tr>

<tr><td>Ruta</td>
<td>
<select name="idruta">
<option value=""></option>
<?php 
$sqld="SELECT * from ruta where idempresas='".$ide."' and estado='1'"; 
/*$sql.=" and estado='1'";*/
$resultd=mysqli_query ($conn,$sqld) or die ("Invalid result");
$rowd=mysqli_num_rows($resultd);
?>
<?php 
for ($i=0;$i<$rowd;$i++){;
mysqli_data_seek($resultd,$i);
$resultadod=mysqli_fetch_array($resultd);
$idruta=$resultadod['idruta'];
$nombreruta=$resultadod['nombreruta'];
?>
<option value="<?php  echo $idruta;?>" ><?php  echo $nombreruta;?>
<?php };?>
</select></td>
</tr>


<tr>
<td colspan="4">
<input class="envio" type="submit" name="Enviar" value="Enviar"></td>
</tr>
</form>

</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php } else {;
include ('../../cierre.php');
 };?>
</body>
</html>
