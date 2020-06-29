<?php  
include('bbdd.php');

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
<p class="enc">TRASPASO DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">
<?php 
$enviar="enviar";
$tipo="1";
$estadoe="1";
if ($enviar==null){;?>
<form action="tclientes.php" method="post" name="form2">
<input type="hidden" name="tipo" value="<?php  echo $tipo;?>">
Estado <select name="estadoe">
<option value="1">Alta
<option value="0">Baja
</select>
<input class="envio" type="submit" value="enviar" name="enviar">
</form>

<?php }else{;?>

<?php 

$sql="SELECT * from clientes where idempresas='".$ide."' and estado='".$estadoe."' and tipo='".$tipo."' order by idclientes asc"; 
//echo $sql;
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>
<?php  include ('../js/busqueda.php');?>

<table class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab"><td>N&ordm; Cliente</td><td>Nombre Cliente</td><td>NIF</td><td>Estado</td><td>Opción</td></tr>
</thead>
<?php 
for ($i=0; $i<$row; $i++){;
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
<td><?php  echo $nif;?></td>
<td>
<?php if ($estado=='0'){?><font color="red">Baja<?php }else{;?><font color="green">Alta<?php };?></font></td>
<td><a href="tmodclientes.php?idclientes=<?php  echo $idclientes;?>&tipo=<?php  echo $tipo;?>"><img src="../img/modificar.gif" alt="modificar" border=0 width=20></a></td>
</tr>
<?php };?>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

</div>
<?php };?>
<?php }else{;
include ('../cierre.php');
 };?>

