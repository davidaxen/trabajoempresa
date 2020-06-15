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

<form action="mpuntconti.php" method="post">
<table>
<tr><td>Nombre del Puesto de Trabajo</td><td>
<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and estado='1'";
$sql.=" and accdiarias='1'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);?>
<select name="idclientes">
<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];
$nombre=$resultado['nombre'];

$sql2="SELECT * from codservicios where idempresas='".$ide."' and idclientes='".$idclientes."' and idpccat='".$idpccat."'"; 
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
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];
$nombre=$resultado['nombre'];?>
<?php  echo $nombre;?></td></tr>
<?php 
$sql2="SELECT * from codservicios where idempresas='".$ide."' and idclientes='".$idclientes."' and idpccat='".$idpccat."' order by idpcsubcat asc"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);
?>

<?php 
for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2, $t);
$resultado2=mysqli_fetch_array($result2);
$bloque[]=$resultado2['idpcsubcat'];
};
for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2, $t);
$resultado2=mysqli_fetch_array($result2);
unset($bqn);
$j=0;
$idpcsubcat=$resultado2['idpcsubcat'];
$activo=$resultado2['activo'];
$bloquen=$bloque;
$bloquen[]=$idpcsubcat;
$valores=array_unique($bloquen);


$sql3="SELECT * from puntservicios where idempresas='".$ide."' and idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."'"; 
$result3=mysqli_query ($conn,$sql3) or die ("Invalid result3");
$resultado3=mysqli_fetch_array($result3);
$subcategoria=$resultado3['subcategoria'];
?>

<tr><td><?php  echo $subcategoria;?></td><td>
<?php if ($activo==0){;?>No<?php };?>
<?php if ($activo==1){;?>Si<?php };?>
</td><td>

<a href="modpuntconti.php?idclientes=<?php  echo $idclientes;?>&idpcsubcat=<?php  echo $idpcsubcat;?>&activo=<?php  echo $activo;?>

<?php 
$j=0;
for ($i=0;$i<count($bloque);$i++){;
if ($valores[$i]!=null){;
if ($valores[$i]!=$idpcsubcat){;
$bqn[$j]=$valores[$i];
?>
&bloque[<?php  echo $j?>]=<?php  echo $bqn[$j];?>
<?php 
$j=$j+1;
};
};
};
?>

">
<img src="../../img/modificar.gif" border=0></a>



</td></tr>

<?php };?>

<form action="modpuntconti2.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<?php 
unset($bqn);
for ($i=0;$i<count($bloque);$i++){;
if ($valores[$i]!=null){;
$bqn[$i]=$valores[$i];
?>
<input type="hidden" name="bloque[]" value="<?php  echo $bqn[$i];?>">
<?php 
};
};

$sql4="SELECT count(id) as t from puntservicios where idempresas='".$ide."' and idpccat='".$idpccat."' and activo='1'"; 
$result4=mysqli_query ($conn,$sql4) or die ("Invalid result4");
$resultado4=mysqli_fetch_array($result4);
$cantp=$resultado4['t'];
$cantp=$cantp-count($bqn);
?>
<tr><td>Cantidad de Puntos Nuevos</td>
<td><select name="cantpuntcont">
<option value="todos">Todos
<?php  for ($ty=0;$ty<$cantp;$ty++){;
$tg=$ty+1;?>
<option value="<?php  echo $tg;?>"><?php  echo $tg;?>
<?php };?>
</select></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>

<?php };?>



</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>