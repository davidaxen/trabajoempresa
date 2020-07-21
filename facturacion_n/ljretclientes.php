<?php  
include('bbdd.php');

if ($ide!=null){;

$sql31="select * from menuserviciosnombre where idempresa=:ide";

$result31=$conn->prepare($sql31);
$result31->bindParam(':ide',$ide);
$result31->execute();
$resultado31=$result31->fetch();
//$result31=$conn->query($sql31);
//$resultado31=$result31->fetch();
//$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
//$resultado31=mysqli_fetch_array($result31);
$nc=$resultado31['jornadas'];

$sql32="select * from menuserviciosimg where idempresa=:ide";

$result32=$conn->prepare($sql32);
$result32->bindParam(':ide',$ide);
$result32->execute();
$resultado32=$result32->fetch();

//$result32=$conn->query($sql32);
//$resultado32=$result32->fetch();
//$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);
$ic=$resultado32['jornadas'];

include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">LISTADO <?php  echo strtoupper($nc);?> DE TRABAJO EN PUESTOS DE TRABAJO</p></div>
<div class="contenido">
<?php 

if (isset($_REQUEST['enviar'])) {
	$enviar = $_REQUEST['enviar'];
}else{
	$enviar = null;
}

if ($enviar==null){;?>
<form action="ljretclientes.php" method="post" name="form2">
Estado <select name="estado">
<option value="1">Alta
<option value="0">Baja
</select>
<input class="envio" type="submit" value="enviar" name="enviar">
</form>

<?php }else{;?>

<?php 

$sql="SELECT * from clientes where idempresas=:ide and estado=:estado order by idclientes asc";

$result=$conn->prepare($sql);
$result->bindParam(':ide',$ide);
$result->bindParam(':estado',$estado);
$result->execute();
$resultmos=$conn->prepare($sql);
$resultmos->bindParam('ide',$ide);
$resultmos->bindParam(':estado',$estado);
$resultmos->execute();
$resultado=$result->fetch();

//$result=$conn->query($sql);

//$result=mysqli_query($conn,$sql) or die ("Invalid result");
//$row=mysqli_num_rows($result);
?>

<?php include ('../js/busqueda.php');?>

<table class="table-bordered table pull-right" id="mytable">
<?php

foreach ($resultmos as $row) {
$idclientes=$row['idclientes'];
$nombre=$row['nombre'];
$nif=$row['nif'];
$estado=$row['estado'];

//for ($i=0; $i<$row; $i++){;
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
//$idclientes=$resultado['idclientes'];
//$nombre=$resultado['nombre'];
//$nif=$resultado['nif'];
//$estado=$resultado['estado'];
?>
<tr class="menor1">
<td><?php  echo $idclientes;?></td>
<td><?php  echo $nombre;?></td>
<td><?php  echo $nif;?></td>
<td>
<?php if ($estado=='0'){?><font color="red">Baja<?php }else{;?><font color="green">Alta<?php };?></font></td>
<td><a href="ljorretclientes.php?idclientes=<?php  echo $idclientes;?>"><img src="../img/modificar.gif" alt="modificar" border=0 width=20></a></td>
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

