<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');
include('combo.php');
unset($estadotr);
$estadotr='0';
$idaseguradora='todos';
?>
<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE ORDENES
<?php  if ($estadotr=='1'){;?> CERRADOS<?php };?>
<?php  if ($estadotr=='0'){;?> ABIERTOS<?php };?></p></div>
<div class="contenido">


<?php


 if ($estadotr==null){;?>

<form action="lpuntcont2.php" method="post">
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
<?php }else{;?>


<?php 

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
$result=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$row=mysqli_num_rows($result);
?>

<table><tr><td><?php include ('../../js/busqueda.php');?></td>
<td>
<a href="ipuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Alta de Ordenes
</span>
</a>
</td>
</tr>
</table>

<table class="table-bordered table pull-right" id="mytable">
<tr class="subenc"><td>N Trabajos</td><td>Puesto de Trabajo</td><td>Persona Asignada</td><td>Direccion</td><td>Descripcion</td>
<?php  if ($estado=="todos"){;?><td>Estado</td><?php };?>
<td>Acciones</td>
</tr>

<?php  
for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
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
$idempleado=$resultado['idempleado'];
$descripcion=$resultado['descripcion'];
$est=$resultado['terminado'];

$sql10="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idaseguradora."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result");
$resultado10=mysqli_fetch_array($result10);
$nombrecontacto=$resultado10['nombre'];

$sql10="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result");
$resultado10=mysqli_fetch_array($result10);
$nombree=$resultado10['nombre'];
$apellido1e=$resultado10['1apellido'];
$apellido2e=$resultado10['2apellido'];
$nombreempl=$nombree.", ".$apellido1e." ".$apellido2e;
?>
<tr class="menor1">
<td><?php  echo $numsiniestro;?></td>
<td><?php  echo $nombrecontacto;?></td>
<td><?php  echo strtoupper($nombreempl);?></td>
<td><?php  echo $direccion;?><br>
<?php  echo $localidad;?><br>
<?php  echo $provincia;?><br>
<?php  echo $cp;?></td>
<td><?php  echo $descripcion;?></td>
<?php  if ($estado=="todos"){;?>
<td>
<?php  if ($est==1){;?>Cerrado<?php };?>
<?php  if ($est==0){;?>Abierto<?php };?>
</td>
<?php };?>
<td>
<a href="modpuntcont.php?idsiniestro=<?php  echo $idsiniestro;?>"><img src="../../img/pencil.png" width="25px" alt="modificar orden"></a>
<a href="mpuntconti.php?idsiniestro=<?php  echo $idsiniestro;?>"><img src="../../img/person.png" width="25px" alt="asignacion de trabajador"></a>


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