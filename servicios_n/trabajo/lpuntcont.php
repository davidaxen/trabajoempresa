<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');
include('combo.php');?>
<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE ORDENES
<?php  if ($estadotr=='1'){;?> CERRADOS<?php };?>
<?php  if ($estadotr=='0'){;?> ABIERTOS<?php };?></p></div>
<div class="contenido">


<?php if ($estadotr==null){;?>

<form action="lpuntcont.php" method="post">
<table>
<tr><td>Puesto de Trabajo</td></tr>
<tr>
<td>
<select name="idaseguradora" id="combobox">
<option value="todos">Todos
<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and estado='1'";

$result=$conn->query($sql);
$fetchAll=$result->fetchAll();
$row=count($fetchAll);
//$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//$row2=mysqli_num_rows($result);

foreach ($result as $row) {
	$nombre=$row['nombre'];
	$idclientes=$row['idclientes'];
//for ($t=0;$t<$row2;$t++){;
//mysqli_data_seek($result, $t);
//$resultado=mysqli_fetch_array($result);
//$nombre=$resultado['nombre'];
//$idclientes=$resultado['idclientes'];
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

if ($busquedatr==1){;
switch($tipo){
	case "dia": 
			$fechaa=date("Y-m-d", mktime(0, 0, 0, $m2, $d2, $y2));
			$sql1.=" and diaapertura='".$fechaa."' ";break;
	case "mes": 
			$fechai=date("Y-m-d", mktime(0, 0, 0, $m1, 1, $y1));
			$fechaf=date("Y-m-d", mktime(0, 0, 0, $m1+1, 0, $y1));
			$sql1 .=" and diaapertura between '".$fechai."' and '".$fechaf."' ";
			break;
	case "anual": 
			$fechai=date("Y-m-d", mktime(0, 0, 0, 1, 1, $y3));
			$fechaf=date("Y-m-d", mktime(0, 0, 0, 1, 0, $y3+1));
			$sql1.=" and diacierre between '".$fechai."' and '".$fechaf."'";
			break;
	case "entre": 
			$fechai=date("Y-m-d", mktime(0, 0, 0, $m4i, $d4i, $y4i));
			$fechaf=date("Y-m-d", mktime(0, 0, 0, $m4f, $d4f, $y4f));
			$sql1.=" and diaapertura between '".$fechai."' and '".$fechaf."'";
			break;
};
}else{;	

switch($tipo){
	case "dia": 
			$fechaa=date("Y-m-d", mktime(0, 0, 0, $m2, $d2, $y2));
			$sql1.=" and diacierre='".$fechaa."' ";break;
	case "mes": 			
			$fechai=date("Y-m-d", mktime(0, 0, 0, $m1, 1, $y1));
			$fechaf=date("Y-m-d", mktime(0, 0, 0, $m1+1, 0, $y1));
			$sql1 .=" and diacierre between '".$fechai."' and '".$fechaf."' ";
			break;
	case "anual": 
			$fechai=date("Y-m-d", mktime(0, 0, 0, 1, 1, $y3));
			$fechaf=date("Y-m-d", mktime(0, 0, 0, 1, 0, $y3+1));
			$sql1.=" and diacierre between '".$fechai."' and '".$fechaf."'";
			break;
	case "entre": $fechai=date("Y-m-d", mktime(0, 0, 0, $m4i, $d4i, $y4i));$fechaf=date("Y-m-d", mktime(0, 0, 0, $m4f, $d4f, $y4f));$sql1.=" and diacierre between '".$fechai."' and '".$fechaf."'";break;

};


};	

		
$sql1.=" order by dia desc";
//echo $sql1;

$result=$conn->query($sql1);
$fetchAll1=$result->fetchAll();
$row=count($fetchAll1);
//$result=mysqli_query ($conn,$sql1) or die ("Invalid result1");
//$row=mysqli_num_rows($result);
?>

<table>
<tr class="subenc"><td>N Trabajos</td><td>Puesto de Trabajo</td><td>Telefono</td><td>Direccion</td><td>Email</td><td>Descripcion</td>
<?php  if ($estado=="todos"){;?><td>Estado</td><?php };?>
<td>Acciones</td>
</tr>

<?php 

foreach ($result as $row) {
	$idsiniestro=$row['idsiniestro'];
	$idaseguradora=$row['idaseguradora'];
	$numsiniestro=$row['numsiniestro'];
	$contacto=$row['contacto'];
	$telefono=$row['telefono'];
	$direccion=$row['direccion'];
	$localidad=$row['localidad'];
	$provincia=$row['provincia'];
	$cp=$row['cp'];
	$email=$row['email'];
	$descripcion=$row['descripcion'];
	$est=$row['terminado'];

//for ($i=0; $i<$row; $i++){;
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
//$idsiniestro=$resultado['idsiniestro'];
//$idaseguradora=$resultado['idaseguradora'];
//$numsiniestro=$resultado['numsiniestro'];
//$contacto=$resultado['contacto'];
//$telefono=$resultado['telefono'];
//$direccion=$resultado['direccion'];
//$localidad=$resultado['localidad'];
//$provincia=$resultado['provincia'];
//$cp=$resultado['cp'];
//$email=$resultado['email'];
//$descripcion=$resultado['descripcion'];
//$est=$resultado['terminado'];

$sql10="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idaseguradora."'"; 

$result10=$conn->query($sql10);
$resultado10=$result10->fetch();
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result");
//$resultado10=mysqli_fetch_array($result10);
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
<td><?php  echo $descripcion;?></td>
<?php  if ($estado=="todos"){;?>
<td>
<?php  if ($est==1){;?>Cerrado<?php };?>
<?php  if ($est==0){;?>Abierto<?php };?>
</td>
<?php };?>
<td><a href="accpuntcont.php?idsiniestro=<?php  echo $idsiniestro;?>"><img src="../../img/iconlis.png" width="25px"></a></td>
</tr>
<?php };?>
</table>

<?php };?>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>