<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ALTA DE PUNTOS DE <?php  echo strtoupper($nc);?> DE LOS PUESTOS DE TRABAJO</p></div>
<div class="contenido">


<?php 
if ($idclientes==null){;
$sql="SELECT * from clientes where idempresas='".$ide."' ";
$sql.="and mediciones='1'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//echo $sql;
$row=mysqli_num_rows($result);
if ($row!=0){;
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];

$sql2="SELECT * from puntoslectura where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result2");
//echo $sql2;
$row2=mysqli_num_rows($result2);
if ($row2==0){;
$clientes[]=$idclientes;
};
};
};
if (count($clientes)!=0){;
?>
<form action="ipuntconti2.php" method="post">
<table>
<tr><td>Nombre del Puesto de Trabajo</td><td>
<select name="idclientes">
<option value="">
<?php 
//print_r($clientes);

for ($h=0;$h<count($clientes);$h++){;
$sql3="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$clientes[$h]."'"; 
$result3=mysqli_query ($conn,$sql3) or die ("Invalid result3");
//echo $sql3;
$resultado3=mysqli_fetch_array($result3);
$nombre=$resultado3['nombre'];
?>
<option value="<?php  echo $clientes[$h];?>"><?php  echo $nombre;?>
<?php };?>
</select></td></tr>
<tr><td>Cantidad de Puntos</td>
<td><input type="text" name="cantpuntcont"></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php }else{;?>
No tiene puestos de trabajo sin asignar puntos
<?php };?>


<?php } else {;?>

<form action="intro2.php" method="post">
<table>
<input type="hidden" name="tabla" value="ipuntconti2">
<input type="hidden" name="cantpuntcont" value="<?php  echo $cantpuntcont;?>">
<tr><td>Datos del Puesto de Trabajo</td><td>
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];
$nombre=$resultado['nombre'];
?>
<?php  echo $nombre;?>


</td></tr>


<?php 
for ($i=0;$i<$cantpuntcont;$i++){;?>
<tr><td>Punto</td><td>
<input name="punt[<?php  echo $i?>]" type="text">
</td></tr>
<?php };?>


<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php };?>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>
