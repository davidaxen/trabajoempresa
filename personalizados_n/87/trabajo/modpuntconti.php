<?php 
include('bbdd.php');
$idpccat=3;

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE PUNTOS</p></div>
<div class="contenido">

<form action="intro2.php" method="post">
<input type="hidden" name="idclientes" value="<?=$idclientes;?>">
<input type="hidden" name="tabla" value="modpuntconti">
<input type="hidden" name="idpcsubcat" value="<?=$idpcsubcat;?>">
<input type="hidden" name="activo" value="<?=$activo;?>">
<table>
<?
$sql="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
?>
<tr><td>Nombre del Cliente</td><td><?=$nombre;?></td></tr>
<tr><td>Punto</td><td><select name="idpcsubcatn">

<?

$sql2="SELECT * from puntservicios where idempresas='".$ide."' and idpccat='".$idpccat."' ";

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
$result2=mysqli_query($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);

for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2,$t);
$resultado2=mysqli_fetch_array($result2);
$idpcsubcatn=$resultado2['idpcsubcat'];
$subcategoria=$resultado2['subcategoria'];
?>
<option value="<?=$idpcsubcatn;?>" <?if ($idpcsubcatn==$idpcsubcat){;?>selected<?};?> ><?=$subcategoria;?>
<?};?>
</select></td></tr>
<tr><td>Activo</td>
<td><select name="activon">
<option value="0" <?if ($activo==0){;?>selected<?};?> >No
<option value="1" <?if ($activo==1){;?>selected<?};?> >Si
</td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

</div>
</div>

<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://www.smartcbc.com">aquí</a>

<?};?>
