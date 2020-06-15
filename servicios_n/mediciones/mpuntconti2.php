<?php  
include('bbdd.php');
if ($ide!=null){;
 include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE PUNTOS DE <?php  echo strtoupper($nc);?> DE PUESTOS DE TRABAJO</p></div>
<div class="contenido">

<?php 
if ($idclientes==null){;?>

<form action="mpuntconti2.php" method="post">
<table>
<tr><td>Nombre del Puesto de Trabajo</td><td>
<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and estado='1'";
$sql.=" and mediciones='1'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);?>
<select name="idclientes">
<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];
$nombre=$resultado['nombre'];

$sql2="SELECT * from puntoslectura where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);
?>
<?php if ($row2!=0){;?><option value="<?php  echo $idclientes;?>"><?php  echo $nombre;?><?php };?>
<?php };?>
</select></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php } else {;?>

<table>
<tr><td>Datos del Puesto de Trabajo</td><td>
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>"></td></tr>
</table>
<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];
$nombre=$resultado['nombre'];?>
<?php  echo $nombre;?></td></tr>
<?php 
$sql2="SELECT * from puntoslectura where idempresas='".$ide."' and idclientes='".$idclientes."' order by idpuntoslectura asc"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);
?>
<div style="column-count:4">
<?php 
for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2,$t);
$resultado2=mysqli_fetch_array($result2);
$idpuntoslectura=$resultado2['idpuntoslectura'];
$nombre=$resultado2['nombre'];
?>

<?php  echo $nombre;?></td><td><a href="modpuntconti2n.php?idclientes=<?php  echo $idclientes;?>&idpuntoslectura=<?php  echo $idpuntoslectura;?>">
<img src="../../img/pencil.png" width="25px" border=0></a><br/>
<?php };?>
</div>
<form action="modpuntconti2n.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<table>
<tr><td>Cantidad de Puntos Nuevos</td>
<td><input type="text" name="cantpuntcont">
</select></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>

<?php };?>



</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>