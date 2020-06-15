<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE USUARIOS</p></div>
<div class="contenido">
<?php 
if ($coduser!=null){;?>

<?php 
$idemprempl=ltrim ( substr($coduser,1,4), "0");
$idempl=ltrim ( substr($coduser,5,4), "0");

$sql="SELECT nombre,1apellido,2apellido from empleados where idempresa='".$idemprempl."' and idempleado='".$idempl."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
$pap=$resultado['1apellido'];
$sap=$resultado['2apellido'];
?>
<table>
<tr class="subenc"><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td><td></td></tr>
<tr class="menor1">
<td><?php  echo $nombre;?></td>
<td><?php  echo $pap;?></td>
<td><?php  echo $sap;?></td>
<td><?php  echo $coduser;?></td>
<td><?php  echo $idemprempl;?></td>
<td><?php  echo $idempl;?></td>
</tr>
</table>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>