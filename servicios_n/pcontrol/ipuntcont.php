<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ALTA DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php 
if ($idclientes==null){;?>

<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and revision='1' and estado='1'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result 1 ");
$row=mysqli_num_rows($result);

for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];
$nombre=$resultado['nombre'];

$sql2="SELECT * from puntcont where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result 2");
$row2=mysqli_num_rows($result2);
if ($row2==0){;
$datidc[]=$idclientes;
$datnomc[]=$nombre;
};
};
//print_r($datidc);
?>

<?php if (count($datidc)==0){;?>
Actualmente todos los Puestos de Trabajo que tienen el servicio de Circuitos Activo ya están dados de Alta. Si quieres verlos pincha <a href="https://control.nativecbc.com/servicios_n/pcontrol/lpuntcont.php">aqui</a>. <br/>

Si quieres activar el servicio para algún Puesto de Trabajo más, pincha <a href="https://control.nativecbc.com/facturacion_n/mclientes.php">aqui</a>.<br/>

<?php }else{;?>

<form action="ipuntcont.php" method="post">
<table>
<tr><td>Nombre del Puesto de Trabajo</td><td>

<select name="idclientes">
<?php for ($j=0;$j<count($datidc);$j++){;?>
<option value="<?php  echo $datidc[$j];?>"><?php  echo strtoupper($datnomc[$j]);?>
<?php };?>
</select></td></tr>
<tr><td>Cantidad de Puntos de Control</td><td><input type="text" size=50 name="cantpuntcont"></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>
<?php };?>

<?php } else {;?>

<form action="intro2.php" method="post">
<table>
<input type="hidden" name="tabla" value="ipuntcont">

<input type="hidden" name="cantpuntcont" value="<?php  echo $cantpuntcont+2;?>">
<tr><td>Datos de la Comunidad</td><td><input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result 3");
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];
$nombre=$resultado['nombre'];?>
<?php  echo $nombre;?></td></tr>
<tr><td>Comienzo de Circuito</td><td><input type="hidden" name="punt[0]" value="Comienzo de Circuito"></td></tr>
<?php for ($i=2;$i<$cantpuntcont+2;$i++){;?>
<tr><td>Punto de Control <?php  echo $i;?></td><td><input type="text" name="punt[<?php  echo $i?>]"></td></tr>
<?php };?>
<tr><td>Fin de Circuito</td><td><input type="hidden" name="punt[1]" value="Fin de Circuito"></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>


<?php };?>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>