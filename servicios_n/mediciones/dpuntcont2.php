<?php  
include('bbdd.php');
error_reporting(0);

if ($ide!=null){;

include('../../portada_n/cabecera3.php');
include('../../estilo/acordeon.php');
?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES CON LOS PUNTOS DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">



<div class="main">
<!--<span class="caja2">Puntos Globales</span>-->
<a href="ipuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconpoint.png" width="30" height="30" />
</div>
</div>
<br/>Acciones con<br/>Puntos Globales</span></a>



<a href="ipuntconti.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconpoint.png" width="30" height="30" />
</div>
</div>
<br/>Elección de Puntos<br/>Puestos de Trabajo</span></a>
</div>
<br/>
Nombre del Puesto de Trabajo con Puntos de <?php  echo ucfirst($nc);?>
<?php 
$sql="SELECT * from clientes where idempresas=:ide and estado='1'";
$sql.=" and mediciones='1'";
	$result=$conn->prepare($sql);
	$result->bindParam(':ide', $ide);
	$result->execute();

	$resultmos=$conn->prepare($sql);
	$resultmos->bindParam(':ide', $ide);
	$resultmos->execute();
	$fetchAll=$result->fetchAll();
	$row=count($fetchAll);

/*$result=mysqli_query ($conn,$sql)or die ("Invalid result");
$row=mysqli_num_rows($result);*/

if ($row>10){;
$yu=2;
}else{;
$yu=1;
};
?>
<div style="column-count:<?php echo $yu;?>">
<?php 
/*for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($resultmos as $rowmos) {
$idclientes=$rowmos['idclientes'];
$nombre=$rowmos['nombre'];

$sql2="SELECT * from codservicios where idempresas=:ide and idclientes=:idclientes and idpccat=:idpccat";
$result2=$conn->prepare($sql2);
	$result2->bindParam(':ide', $ide);
	$result2->bindParam(':idclientes', $idclientes);
	$result2->bindParam(':idpccat', $idpccat);
	$result2->execute();
	$fetchAll2=$result2->fetchAll();
	$row2=count($fetchAll2);


$result2mos1=$conn->prepare($sql2);
	$result2mos1->bindParam(':ide', $ide);
	$result2mos1->bindParam(':idclientes', $idclientes);
	$result2mos1->bindParam(':idpccat', $idpccat);
	$result2mos1->execute();

$result2mos2=$conn->prepare($sql2);
	$result2mos2->bindParam(':ide', $ide);
	$result2mos2->bindParam(':idclientes', $idclientes);
	$result2mos2->bindParam(':idpccat', $idpccat);
	$result2mos2->execute();


/*$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);*/
?>
<?php if ($row2!=0){;?>

<div class="accordion" style="width:400px;height:20px;padding:5px">
<img src="../../img/iconos/datos_personales.png" width="20px" style="vertical-align:middle;">  <?php  echo strtoupper($nombre);?>
</div>
<div class="panel">

<table><tr><td>
<a href="mpuntconti2.php?idclientes=<?php echo $idclientes;?>">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/pencil.png" width="30" height="30" />
</div>
</div>
<br/>Modificación de Puntos<br/>Puestos de Trabajo</span></a>
</td>
<td>
<table>
<?php 
/*for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2, $t);
$resultado2=mysqli_fetch_array($result2);*/
foreach ($result2mos1 as $row2mos) {
$bloque[]=$row2mos['idpcsubcat'];
};
/*for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2, $t);
$resultado2=mysqli_fetch_array($result2);*/
foreach ($result2mos2 as $row2mos) {
unset($bqn);
$j=0;
$idpcsubcat=$row2mos['idpcsubcat'];
$activo=$row2mos['activo'];
$bloquen=$bloque;
$bloquen[]=$idpcsubcat;
$valores=array_unique($bloquen);


$sql3="SELECT * from puntservicios where idempresas=:ide and idpccat=:idpccat and idpcsubcat=:idpcsubcat"; 
$result3=$conn->prepare($sql3);
	$result3->bindParam(':ide', $ide);
	$result3->bindParam(':idpccat', $idpccat);
	$result3->bindParam(':idpcsubcat', $idpcsubcat);
	$result3->execute();
	$resultado3=$result3->fetch();

/*$result3=mysqli_query ($conn,$sql3) or die ("Invalid result3");
$resultado3=mysqli_fetch_array($result3);*/
$subcategoria=$resultado3['subcategoria'];
?>

<tr><td><?php  echo strtoupper($subcategoria);?></td><td>
<?php if ($activo==0){;?>No<?php };?>
<?php if ($activo==1){;?>Si<?php };?>
</td><td>

<a href="modpuntconti.php?idclientes=<?php  echo $idclientes;?>&idpcsubcat=<?php  echo $idpcsubcat;?>&activo=<?php  echo $activo;?>

<?php 
$j=0;
for ($k=0;$k<count($bloque);$k++){;
if ($valores[$k]!=null){;
if ($valores[$k]!=$idpcsubcat){;
$bqn[$j]=$valores[$k];
?>
&bloque[<?php  echo $j?>]=<?php  echo $bqn[$j];?>
<?php 
$j=$j+1;
};
};
};
?>

">
<img src="../../img/pencil.png" width="25x" border=0></a>



</td></tr>

<?php };?>
</table>
</td>

<td>
<form action="modpuntconti2.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<?php 
unset($bqn);
for ($ij=0;$ij<count($bloque);$ij++){;
if ($valores[$ij]!=null){;
$bqn[$ij]=$valores[$ij];
?>
<input type="hidden" name="bloque[]" value="<?php  echo $bqn[$ij];?>">
<?php 
};
};

$sql4="SELECT count(id) as t from puntservicios where idempresas=:ide and idpccat=:idpccat and activo='1'";
$result4=$conn->prepare($sql4);
	$result4->bindParam(':ide', $ide);
	$result4->bindParam(':idpccat', $idpccat);
	$result4->execute();
$resultado4=$result4->fetch();

/*$result4=mysqli_query ($conn,$sql4) or die ("Invalid result4");
$resultado4=mysqli_fetch_array($result4);*/
$cantp=$resultado4['t'];
$cantp=$cantp-count($bqn);
?>
<table><tr>
<td><select name="cantpuntcont">
<option value="todos">Todos
<?php  for ($ty=0;$ty<$cantp;$ty++){;
$tg=$ty+1;?>
<option value="<?php  echo $tg;?>"><?php  echo strtoupper($tg);?>
<?php };?>
</select></td><td><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</td></tr></table>
</div>





<?php };?>
<?php };?>
</div>

<?php  include ('../../js/acordeonjs.php');?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<!--
<a href="mpuntconti.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/pencil.png" width="30" height="30" />
</div>
</div>
<br/>Modificación de Puntos<br/>Puestos de Trabajo</span></a>
</div>
<div class="main">
<span class="caja2">Puntos de Lecturas</span>
<a href="ipuntconti2.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconpoint.png" width="30" height="30" />
</div>
</div>
<br/>Elección<br/>Puntos de Lectura</span></a>
<a href="mpuntconti2.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/pencil.png" width="30" height="30" />
</div>
</div>
<br/>Modificación<br/>Puntos de Lectura</span></a>
-->




</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>
