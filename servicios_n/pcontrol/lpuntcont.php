<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE PUESTOS DE TRABAJO CON PUNTOS DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php 
$sql="SELECT DISTINCT (idclientes) from puntcont where idempresas='".$ide."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>

<table><tr><td><?php include ('../../js/busqueda.php');?></td>
<td>
<a href="ipuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Alta<br/>Circuitos
</span>
</a>
</td>
</tr></table>



<table class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="subenc"><td>N&ordm; Puestos de Trabajo</td><td>Nombre</td><td>N&ordm; de Puntos</td><td></td></tr>
</thead>
<?php 
for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];


?>
<tr class="menor1">
<td><?php  echo $idclientes;?></td>
<?php 
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
?>
<td><?php  echo strtoupper($nombre);?></td>
<?php 
$sql2="SELECT * from puntcont where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);
?>

<td><?php  echo $row2;?></td>
<td><a href="lispuntcont.php?idclientes=<?php  echo $idclientes;?>"><img src="../../img/iconlis.png" width="25px"></a></td>
<td><a href="modpuntcont.php?idclientes=<?php  echo $idclientes;?>"><img src="../../img/pencil.png" width="25px"></a></td>
</tr>
<?php };?>
</table>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>