<?php  
include('bbdd.php');

if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE PUNTOS DE <?php  echo strtoupper($nc);?> DE CLIENTES</p></div>
<div class="contenido">

<form action="intro2.php" method="post">
<table>
<input type="hidden" name="tabla" value="ipuntconti">
<input type="hidden" name="cantpuntcont" value="<?php  echo $cantpuntcont;?>">
<tr><td>Datos de la Comunidad</td><td>
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<?php

//$idcliens = $_REQUEST['idcliens'];
//var_dump($idcliens);

	$sql="SELECT * from clientes where idempresas=:ide and idclientes=:idclientes";
	$result=$conn->prepare($sql);
	$result->bindParam(':ide', $ide);
	$result->bindParam(':idclientes', $idclientes);
	$result->execute();
	$resultado=$result->fetch();
	$idclientes=$resultado['idclientes'];
	$nombre=$resultado['nombre'];
//var_dump($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$idclientes=mysqli_result($result,0,'idclientes');
$nombre=mysqli_result($result,0,'nombre');*/
?>
<?php  echo $nombre;?></td></tr>

<?php 
if ($cantpuntcont=='todos'){;
$sql2="SELECT * from puntservicios where idempresas=:ide and idpccat=:idpccat and activo='1' ";
if (count($bloque)!=0){;
$sql2.="and idpcsubcat not in (";
for ($y=0;$y<count($bloque);$y++){;
$sql2.=$bloque[$y];
if ($y!=count($bloque)-1){;
$sql2.=",";
};
};
$sql2.=")";
}; 
//echo $sql2;
	$result2=$conn->prepare($sql2);
	$result2->bindParam(':ide', $ide);
	$result2->bindParam(':idpccat', $idpccat);
	$result2->execute();


/*$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_affected_rows();
for ($t=0;$t<$row2;$t++){;
$idpcsubcat=mysqli_result($result2,$t,'idpcsubcat');
$subcategoria=mysqli_result($result2,$t,'subcategoria');*/
$t=0;
foreach ($result2 as $row2mos) {
$idpcsubcat=$row2mos['idpcsubcat'];
$subcategoria=$row2mos['subcategoria'];
//var_dump($t);
?>
<tr><td colspan="2"><input type="hidden" name="punt[<?php  echo $t?>]" value="<?php  echo $idpcsubcat;?>"><?php  echo $subcategoria;?></td></tr>
<?php $t=$t+1;};?>
<?php }else{;?>


<?php 
for ($i=0;$i<$cantpuntcont;$i++){;?>
<tr><td>Punto</td><td>
<?php 
$sql2="SELECT * from puntservicios where idempresas=:ide and idpccat=:idpccat and activo='1' ";
if (count($bloque)!=0){;
$sql2.="and idpcsubcat not in (";
for ($y=0;$y<count($bloque);$y++){;
$sql2.=$bloque[$y];
if ($y!=count($bloque)-1){;
$sql2.=",";
};
};
$sql2.=")";
}; 
//echo $sql2;
	$result2=$conn->prepare($sql2);
	$result2->bindParam(':ide', $ide);
	$result2->bindParam(':idpccat', $idpccat);
	$result2->execute();

	$result2mos=$conn->prepare($sql2);
	$result2mos->bindParam(':ide', $ide);
	$result2mos->bindParam(':idpccat', $idpccat);
	$result2mos->execute();

	$fetchAll2=$result2->fetchAll();
	$row2=count($fetchAll2);
//var_dump($sql2);

/*$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_affected_rows();*/
if ($row2!=0){;?>
<select name="punt[<?php  echo $i?>]">
<?php 
//for ($t=0;$t<$row2;$t++){;
foreach ($result2mos as $row2mos) {

	$idpcsubcat=$row2mos['idpcsubcat'];
	$subcategoria=$row2mos['subcategoria'];

/*$idpcsubcat=mysqli_result($result2,$t,'idpcsubcat');
$subcategoria=mysqli_result($result2,$t,'subcategoria');*/
?>
<option value="<?php  echo $idpcsubcat;?>"><?php  echo $subcategoria;?>
<?php };?>
<?php };?>
</td></tr>
<?php };?>



<?php };?>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>


</div>
</div>

<?php } else {;

include('../../cierre.php');

};?>

