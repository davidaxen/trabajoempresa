<?php  
include('bbdd.php');
if ($ide!=null){;

 include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE LOS PUNTOS DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php 
$sql="SELECT * from puntcont where idempresas='".$ide."' and idclientes='".$idclientes."' order by idpuntcont asc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>
<table>
<tr class="subenc"><td>Nombre</td>
<?php 
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
?>
<td>
<a href="pdfpuntcont.php?idclientes=<?php  echo $idclientes;?>" target="_blank"><?php  echo strtoupper($nombre);?></a></td>
</td></tr></table>
<table>
<tr><td>N&ordm; Punto</td><td>Descripcion</td></tr>
<?php 
for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$descrip=$resultado['descripcion'];
$id=$resultado['id'];
$idpuntcont=$resultado['idpuntcont'];
?>
<tr>
<td><a href="pdfindpuntcont.php?id=<?php  echo $id;?>" target="_blank"><?php  echo $idpuntcont;?></a></td><td><?php  echo strtoupper($descrip);?></td>
</tr>
<?php };?>
</table>
<?php } else {;
include ('../../cierre.php');
 };?>