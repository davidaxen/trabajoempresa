<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');
include('combo.php');?>


<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE ORDENES</p></div>
<div class="contenido">


<?php 
//$estadom="";

if ($estadom==null){;?>

<form action="mpuntcont.php" method="post">
<table>
<tr><td>Puesto de Trabajo</td></tr>
<tr>
<td>
<select name="idaseguradora" id="combobox">
<option value="todos">Todos
<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and estado='1'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row2=mysqli_num_rows($result);

for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result, $t);
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
$idclientes=$resultado['idclientes'];
?>
<option value="<?php  echo $idclientes;?>"><?php  echo $nombre;?>
<?php };?>
</select>
</td></tr>

<tr><td>Estado Actual</td></tr>
<tr><td>
<select name="estadom">
<option value="todos">Todos
<option value="1">Cerrados
<option value="0">Abiertos
</select>
</td>
</tr>
	<tr><td>D&iacutea de Apertura</td></tr>
	<tr><td><input type="date" name="diatr"></td></tr>
</table>
<input class="envio" type="submit" name="Enviar" value="enviar">
</form>
<?php }else{;?>

<?php 

$sql1="SELECT * from trabajos";
$sql1.=" where idempresa='".$ide."'";
if ($idaseguradora!='todos'){;
$sql1.=" and idaseguradora='".$idaseguradora."' ";
};
if ($estadom!='todos'){;
$sql1.=" and terminado='".$estadom."' ";
};
if ($diatr!=''){;
$sql1.=" and diaapertura='".$diatr."' ";
};		
$sql1.=" order by dia asc";
//echo $sql1;
$result=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$row=mysqli_num_rows($result);
?>

<table>
<tr class="subenc"><td>N Trabajos</td><td>Puesto de Trabajo</td><td>Telefono</td><td>Direccion</td><td>Email</td><td>Estado</td><td>Descripcion</td></tr>

<?php  for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);

$idsiniestro=$resultado['idsiniestro'];
$idaseguradora=$resultado['idaseguradora'];
$terminado=$resultado['terminado'];
$numsiniestro=$resultado['numsiniestro'];
$contacto=$resultado['contacto'];
$telefono=$resultado['telefono'];
$direccion=$resultado['direccion'];
$localidad=$resultado['localidad'];
$provincia=$resultado['provincia'];
$cp=$resultado['cp'];
$email=$resultado['email'];
$descripcion=$resultado['descripcion'];


$sql10="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idaseguradora."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result");
$resultado10=mysqli_fetch_array($result10);
$nombrecontacto=$resultado10['nombre'];

?>
<tr class="menor1">
<td><?php  echo $numsiniestro;?></td>
<td><?php  echo $nombrecontacto;?></td>
<td><?php  echo $telefono;?></td>
<td><?php  echo $direccion;?><br>
<?php  echo $localidad;?><br>
<?php  echo $provincia;?><br>
<?php  echo $cp;?></td>
<td><?php  echo $email;?></td>
<td>
<?php 
switch ($terminado){;
case 0: echo "Abierto";break;
case 1: echo "Cerrado";break;
};?></td>
<td><?php  echo $descripcion;?></td>
<td>
<?php  //if ($terminado==0){;?>
<a href="modpuntcont.php?idsiniestro=<?php  echo $idsiniestro;?>"><img src="../../img/modificar.gif"></a>
<?php //};?>
</td>
</tr>
<?php };?>
</table>

<?php };?>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>