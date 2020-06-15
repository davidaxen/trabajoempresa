<?php  
include('bbdd.php');?>

<?php 
if ($ide!=null){;


$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
switch($tipo){
case 1: $nc=$resultado31['clientes'];break;
case 2: $nc=$resultado31['puestos'];break;
}
$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
switch($tipo){
case 1: $ic=$resultado32['clientes'];break;
case 2: $ic=$resultado32['puestos'];break;
};

include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php 

$sql="SELECT * from clientes where idempresas='".$ide."' and estado='1'";
if ($idcli!=0){;
$sql.=" and nif='".$gente."'";
};
$sql.=" and tipo='".$tipo."' order by idclientes asc"; 
//echo $sql;
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>
<?php  include ('../js/busqueda.php')?>

<table class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab"><td>N&ordm; Cliente</td><td>Nombre Cliente</td><td>NIF</td><td>Estado</td><td>Opci&oacute;n</td></tr>
</thead>
<?php  for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];
$nombre=$resultado['nombre'];
$nif=$resultado['nif'];
$estado=$resultado['estado'];
?>
<tr class="menor1">
<td><?php  echo $idclientes;?></td>
<td><?php  echo strtoupper($nombre);?></td>
<td><?php  echo strtoupper($nif);?></td>
<td>
<?php if ($estado=='0'){?><font color="red">Baja<?php }else{;?><font color="green">Alta<?php };?></font></td>
<td>
<a href="pdfcontpisc.php?idclientes=<?php  echo $idclientes;?>&pis=g" target="_blank"><img src="../img/iconlis.png" alt="modificar" border=0 width=20></a>
<a href="dymo.php?idclientes=<?php  echo $idclientes;?>&pis=g&nomcli=<?php  echo $nombre;?>"><img src="../img/dymo.png" alt="modificar" border=0 width=20></a>
</td>
</tr>
<?php };?>
</table>
</div>
</div>
<?php }else{;
include ('../cierre.php');
 };?>
