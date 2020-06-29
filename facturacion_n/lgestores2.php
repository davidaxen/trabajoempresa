
<?php  
include('bbdd.php');
?>
<?php if ($ide!=null){;

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";

$result31=$conn->query($sql31);
$resultado31=$result31->fetch();
//$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
//$resultado31=mysqli_fetch_array($result31);
$nc=$resultado31['gestores'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";

$result32=$conn->query($sql32);
$resultado32=$result32->fetch();
//$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);
$ic=$resultado32['gestores'];


?>
<?php  include('../portada_n/cabecera2.php');?>
<style>
tr:nth-child(even) {
  background-color: #f2f2f2;
}
/*
tr:nth-child(odd) {
  background-color: #fff;
}
*/
</style>

<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php 
if ($datos!='datos'){;
?>
<form method="post" action="lgestores.php">
<table>
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de <?php  echo strtoupper($nc);?></td><td><select name="estado">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;

$sql="SELECT * from gestores where idempresa='".$ide."' and estado='".$estado."'";

$result=$conn->query($sql);

//$result=mysqli_query($conn,$sql) or die ("Invalid result");
//$row=mysqli_num_rows($result);
?>

<table><tr><td><?php include ('../js/busqueda.php');?></td>
<!--
<?php if ($estadoe==1){;?>
<td width="150px" align="center"><a href="lgestores2.php?tipo=<?php  echo $tipo;?>&estadoe=0&datos=datos">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/iconlis.png" width="20" height="20" /></div></div><br/>Listado de <?php  echo strtoupper($nc);?><br/> en <b style="color:red">Baja</b></span>
</a></td>
<?php }else{;?>
<td width="150px" align="center"><a href="lgestores2.php?tipo=<?php  echo $tipo;?>&estadoe=1&datos=datos">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/iconlis.png" width="20" height="20" /></div></div><br/>Listado de <?php  echo strtoupper($nc);?><br/> en <b style="color:green">Alta</b></span>
</a></td>
<?php };?>
-->

<td width="150px" align="center"><a href="igestores.php?tipo=<?php  echo $tipo;?>">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/plus.png" width="20" height="20" /></div></div><br/>Alta de<br/><?php  echo strtoupper($nc);?></span>
</a></td>
<!--
<td width="150px" align="center"><a href="fempleados.php?tipo=<?php  echo $tipo;?>">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/plus.png" width="20" height="20" /></div></div><br/>Alta de <?php  echo strtoupper($nc);?> por Fichero</span>
</a></td>
-->
</tr>
</table>

<a href="pdfcartg.php?dato=todo">
Carta para todos los gestores</a>



<table class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab"><td>Nº <?php  echo ucfirst($nc);?></td><td>Nombre de <?php  echo ucfirst($nc);?></td><td>Persona de Contacto</td><td>Telefono 1</td><td>Telefono 2</td><td>Fax</td><td>Direccion</td><td>C.P.</td><td>E.mail</td><td>Opcion</td></tr>
</thead>

<?php


foreach ($result as $row) {
	$idgestor=$row['idgestor'];
	$nombre=$row['nombregestor'];
	$percontacto=$row['percontacto'];
	$tele1=$row['telefono1'];
	$tele2=$row['telefono2'];
	$fax=$row['fax'];
	$direccion=$row['direccion'];
	$cp=$row['cp'];
	$emailn=$row['email'];
	$userg=$row['user'];	
//for ($i=0; $i<$row; $i++){;
//mysqli_data_seek($result,$i);
//$resultado=mysqli_fetch_array($result);
//$idgestor=$resultado['idgestor'];
//$nombre=$resultado['nombregestor'];
//$percontacto=$resultado['percontacto'];
//$tele1=$resultado['telefono1'];
//$tele2=$resultado['telefono2'];
//$fax=$resultado['fax'];
//$direccion=$resultado['direccion'];
//$cp=$resultado['cp'];
//$emailn=$resultado['email'];
//$userg=$resultado['user'];
?>
<tr class="dattab">
<td><?php  echo $idgestor;?></td>
<td><?php  echo strtoupper($nombre);?></td>
<td><?php  echo strtoupper($percontacto);?></td>
<td><?php  echo $tele1;?></td>
<td><?php  echo $tele2;?></td>
<td><?php  echo $fax;?></td>
<td><?php  echo strtoupper($direccion);?></td>
<td><?php  echo $cp;?></td>
<td><?php  echo strtoupper($emailn);?></td>

<td>
<a href="mgestoresm.php?idgestora=<?php  echo $idgestor;?>"><img src="../img/pencil.png" border=0 width="25px" title="modificar"></a>
<a href="lgestorescl.php?idgest=<?php  echo $idgestor;?>"><img src="../img/icono-usuarios.gif" border=0 width="25px"></a>
<a href="pdfcartg.php?dato=<?php  echo $userg;?>"><img src="../img/iconlis.png" border=0 width="25px"></a>
</td>
</tr>
<?php };?>
</table>

<?php };?>
</div>

<?php }else{;
include ('../cierre.php');
 };?>

