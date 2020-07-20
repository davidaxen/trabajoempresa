<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE PUNTOS DE <?php  echo strtoupper($nc);?> DE CLIENTES</p></div>
<div class="contenido">



<form action="intro2.php" method="post">
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<input type="hidden" name="tabla" value="modpuntconti">
<input type="hidden" name="idpcsubcat" value="<?php  echo $idpcsubcat;?>">
<input type="hidden" name="activo" value="<?php  echo $activo;?>">
<table>
<?php 
	$sql="SELECT * from clientes where idempresas=:ide and idclientes=:idclientes";
	$result=$conn->prepare($sql);
	$result->bindParam(':ide', $ide);
	$result->bindParam(':idclientes', $idclientes);
	$result->execute();

	$resultado=$result->fetch();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
$nombre=$resultado['nombre'];
?>
<tr><td>Nombre del Cliente</td><td><?php  echo $nombre;?></td></tr>
<tr><td>Punto</td><td><select name="idpcsubcatn">

<?php 

$sql2="SELECT * from puntservicios where idempresas=:ide and idpccat=:idpccat ";

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
$row2=mysqli_num_rows($result2);
for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2, $t);
$resultado2=mysqli_fetch_array($result2);*/
foreach ($result2 as $row2mos) {
$idpcsubcatn=$row2mos['idpcsubcat'];
$subcategoria=$row2mos['subcategoria'];
?>
<option value="<?php  echo $idpcsubcatn;?>" <?php if ($idpcsubcatn==$idpcsubcat){;?>selected<?php };?> ><?php  echo $subcategoria;?>
<?php };?>
</select></td></tr>
<tr><td>Activo</td>
<td><select name="activon">
<option value="0" <?php if ($activo==0){;?>selected<?php };?> >No
<option value="1" <?php if ($activo==1){;?>selected<?php };?> >Si
</td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>


</div>
</div>

<?php } else {;

include('../../cierre.php');

};?>