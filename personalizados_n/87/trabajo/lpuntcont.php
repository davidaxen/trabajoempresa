<?php 
include('bbdd.php');
if ($ide!=null){;
include('../../../portada_n/cabecera4.php');
include('combo.php');?>
<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE ORDENES
<? if ($estadotr=='1'){;?> CERRADOS<?};?>
<? if ($estadotr=='0'){;?> ABIERTOS<?};?></p></div>
<div class="contenido">


<?if ($estadotr==null){;?>

<form action="lpuntcont.php" method="post">
<table>
<tr><td>Puesto de Trabajo</td></tr>
<tr>
<td>
<select name="idaseguradora" id="combobox">
<option value="todos">Todos
<?
$sql="SELECT * from clientes where idempresas='".$ide."' and estado='1'";
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$row2=mysqli_num_rows($result);

for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result,$t);
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
$idclientes=$resultado['idclientes'];
?><option value="<?=$idclientes;?>"><?=$nombre;?>
<?};?>
</select>
</td></tr>
<tr><td>Estado Actual</td></tr>
<tr><td>
<select name="estadotr">
<option value="todos">Todos
<option value="1">Cerrados
<option value="0">Abiertos
</select>
</td>
</tr>
	<tr><td>D&iacutea de Apertura</td></tr>
	<tr><td><input type="date" name="diatr"></td></tr>
		<tr><td>D&iacutea de Cerrado</td></tr>
	<tr><td><input type="date" name="diatc"></td></tr>
</table>
<input class="envio" type="submit" name="Enviar" value="enviar">
</form>
<?}else{;?>
<?

$sql1="SELECT * from trabajos";
$sql1.=" where idempresa='".$ide."' ";
if ($idaseguradora!='todos'){;
$sql1.=" and idaseguradora='".$idaseguradora."' ";
};
if ($estadotr!='todos'){;
$sql1.=" and terminado='".$estadotr."' ";
};
if ($diatr!=''){;
$sql1.=" and diaapertura='".$diatr."' ";
};		
if ($diatc!=''){;
$sql1.=" and diacierre='".$diatc."' ";
};	

		
$sql1.=" order by dia desc";
//echo $sql1;
$result=mysqli_query($conn,$sql1) or die ("Invalid result1");
$row=mysqli_num_rows($result);
?>

<table>
<tr class="subenc"><td>N Trabajos</td><td>Puesto de Trabajo</td><td>Telefono</td><td>Direccion</td><td>Email</td><td>Descripcion</td>
<? if ($estado=="todos"){;?><td>Estado</td><?};?>
<td>Acciones</td>
</tr>

<? for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idsiniestro=$resultado['idsiniestro'];
$idaseguradora=$resultado['idaseguradora'];
$numsiniestro=$resultado['numsiniestro'];
$contacto=$resultado['contacto'];
$telefono=$resultado['telefono'];
$direccion=$resultado['direccion'];
$localidad=$resultado['localidad'];
$provincia=$resultado['provincia'];
$cp=$resultado['cp'];
$email=$resultado['email'];
$descripcion=$resultado['descripcion'];
$est=$resultado['terminado'];

$sql10="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idaseguradora."'"; 
$result10=mysqli_query($conn,$sql10) or die ("Invalid result");
$resultado10=mysqli_fetch_array($result10);
$nombrecontacto=$resultado10['nombre'];



?><tr class="menor1">
<td><?=$numsiniestro;?></td>
<td><?=$nombrecontacto;?></td>
<td><?=$telefono;?></td>
<td><?=$direccion;?><br>
<?=$localidad;?><br>
<?=$provincia;?><br>
<?=$cp;?></td>
<td><?=$email;?></td>
<td><?=$descripcion;?></td>
<? if ($estado=="todos"){;?>
<td>
<? if ($est==1){;?>Cerrado<?};?>
<? if ($est==0){;?>Abierto<?};?>
</td>
<?};?>
<td><a href="accpuntcont.php?idsiniestro=<?=$idsiniestro;?>"><img src="../../../img/modificar.gif"></a></td>
</tr>
<?};?>
</table>



<?};?>



</div>
</div>

<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://www.smartcbc.com">aquí</a>

<?};?>

