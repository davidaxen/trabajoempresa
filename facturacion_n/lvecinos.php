
<?php  
include('bbdd.php');
?>
<?php if ($ide!=null){;

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
$nc=$resultado31['vecinos'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
$ic=$resultado32['vecinos'];


?>
<?php  include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php 
if ($datos!='datos'){;
?>
<form method="post" action="lvecinos.php">
<table>
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de <?php  echo strtoupper($nc);?></td><td><select name="estado">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;

$sql="SELECT * from vecinos where idempresa='".$ide."' and estado='".$estado."'"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>

<?php  include ('../js/busqueda.php');?>

<!--
<a href="pdfcartg.php?dato=todo">
Carta para todos los gestores</a>
-->


<table class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab"><td>N� <?php  echo strtoupper($nc);?></td><td>Nombre del <?php  echo strtoupper($nc);?></td><td>Referencia</td><td>Telefono 1</td><td>Telefono 2</td><td>Fax</td><td>Direccion</td><td>C.P.</td><td>E.mail</td><td>Comunidad</td></tr>
</thead>

<?php  for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idvecino=$resultado['idvecino'];
$nombre=$resultado['nombre'];
$referencia=$resultado['referencia'];
$tele1=$resultado['telefono1'];
$tele2=$resultado['telefono2'];
$fax=$resultado['fax'];
$direccion=$resultado['direccion'];
$cp=$resultado['cp'];
$emailn=$resultado['email'];
$idclientevec=$resultado['idcliente'];

$sql33="select * from clientes where idempresas='".$ide."' and idclientes='".$idclientevec."'";
//echo $sql33;
$result33=mysqli_query($conn,$sql33) or die ("Invalid result clientes");
$resultado33=mysqli_fetch_array($result33);
$nombrecli=$resultado33['nombre'];
?>
<tr class="dattab">
<td><?php  echo $idvecino;?></td>
<td><?php  echo strtoupper($nombre);?></td>
<td><?php  echo strtoupper($referencia);?></td>
<td><?php  echo $tele1;?></td>
<td><?php  echo $tele2;?></td>
<td><?php  echo $fax;?></td>
<td><?php  echo strtoupper($direccion);?></td>
<td><?php  echo $cp;?></td>
<td><?php  echo strtoupper($emailn);?></td>
<td><?php  echo strtoupper($nombrecli);?></td>
<!--
<td>
<a href="lgestorescl.php?idgest=<?php  echo $idgestor;?>"><img src="../img/icono-usuarios.gif" border=0 width=25></a>
<a href="pdfcartg.php?dato=<?php  echo $userg;?>"><img src="../img/modificar.gif" border=0></a>
</td>
-->

</tr>
<?php };?>
</table>

<?php };?>
</div>

<?php }else{;
include ('../cierre.php');
 };?>

