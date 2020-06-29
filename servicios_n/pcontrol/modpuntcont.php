<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE LOS PUNTOS DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php 
$sql="SELECT * from puntcont where idempresas='".$ide."' and idclientes='".$idclientes."' order by idpuntcont asc";
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
?>
<table>
<tr class="subenc"><td>Nombre</td>
<?php 
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'";
$result1=$conn->query($sql1);
$resultado1=$result1->fetch();

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
$resultado1=mysqli_fetch_array($result1);*/
$nombre=$resultado1['nombre'];
?>
<td>
<?php  echo $nombre;?></td>
</td></tr></table>
<table>
<tr class="subenc3"><td>Nº Punto</td><td>Descripcion</td></tr>
<?php 
/*for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$descrip=$rowmos['descripcion'];
$id=$rowmos['id'];
$idpuntcont=$rowmos['idpuntcont'];
?>
<tr>
<td class="subenc">
<?php if (($idpuntcont=='c') or ($idpuntcont=='f')){;?>
<?php  echo $idpuntcont;?>
<?php }else{;?>
<a href="modindpuntcont.php?id=<?php  echo $id;?>"><?php  echo $idpuntcont;?></a>
<?php };?>
</td><td class="subenc3"><?php  echo strtoupper($descrip);?></td>
</tr>
<?php };?>
<tr><td colspan="2"><a href="crearpuntcont.php?idclientes=<?php  echo $idclientes;?>">Crear nuevos puntos</a></td></tr>
</table>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>