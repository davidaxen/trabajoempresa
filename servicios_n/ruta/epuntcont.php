<?php  
include('bbdd.php');
if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>


<div id="main">
<div class="titulo">
<p class="enc">ASIGNAR EMPLEADOS A RUTA</p></div>
<div class="contenido">
<?php 
$enviar="enviar";
$estado="1";
if ($enviar==null){;?>
<form action="epuntcont.php" method="post" name="form2">
Estado <select name="estado">
<option value="1">Alta
<option value="0">Baja
</select>
<input class="envio" type="submit" value="enviar" name="enviar">
</form>

<?php }else{;?>

<?php 

$sql="SELECT * from empleados where idempresa='".$ide."' and estado='".$estado."' order by idempleado asc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>
<table>
<?php 
for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$idempleado=$resultado['idempleado'];
$nombre=$resultado['nombre'];
$apellido1=$resultado['1apellido'];
$apellido2=$resultado['2apellido'];
$nif=$resultado['nif'];
$estado=$resultado['estado'];
?>
<tr class="menor1">
<td><?php  echo $idempleado;?></td>
<td><?php  echo $nombre;?>, <?php  echo $apellido1;?> <?php  echo $apellido2;?>
</td>
<td><?php  echo $nif;?></td>
<td>
<?php if ($estado=='0'){?><font color="red">Baja<?php }else{;?><font color="green">Alta<?php };?></font></td>
<td><a href="erpuntcont.php?idempleado=<?php  echo $idempleado;?>"><img src="../../img/modificar.gif" alt="modificar" border=0 width=20></a></td>
</tr>
<?php };?>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

</div>
<?php };?>
<?php } else {;
include ('../../cierre.php');
 };?>
