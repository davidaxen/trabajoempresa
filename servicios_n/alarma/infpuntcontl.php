<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE ALARMAS</p></div>
<div class="contenido">

<?php 
if ($tipo=="dia"){;
$fechaant=date("d/m/Y", mktime(0, 0, 0, $m, $d-1, $y));
$fechaact=date("d/m/Y", mktime(0, 0, 0, $m, $d, $y));
$fechapos=date("d/m/Y", mktime(0, 0, 0, $m, $d+1, $y));
$dant=$d-1;
$dpos=$d+1;
$mant=$m;
$mpos=$m;
$yant=$y;
$ypos=$y;
}else{;
$dant=1;
$dpos=1;
$mant=$m-1;
$mpos=$m+1;
$yant=$y;
$ypos=$y;
switch($m){;
case 1: $mant=12;$yant=$y-1;$fechaant="Diciembre ".$yant;$fechaact="Enero ".$y;$fechapos="Febrero ".$y;break;
case 2: $fechaant="Enero ".$y;$fechaact="Febrero ".$y;$fechapos="Marzo ".$y;break;
case 3: $fechaant="Febrero ".$y;$fechaact="Marzo ".$y;$fechapos="Abril ".$y;break;
case 4: $fechaant="Marzo ".$y;$fechaact="Abril ".$y;$fechapos="Mayo ".$y;break;
case 5: $fechaant="Abril ".$y;$fechaact="Mayo ".$y;$fechapos="Junio ".$y;break;
case 6: $fechaant="Mayo ".$y;$fechaact="Junio ".$y;$fechapos="Julio ".$y;break;
case 7: $fechaant="Junio ".$y;$fechaact="Julio ".$y;$fechapos="Agosto ".$y;break;
case 8: $fechaant="Julio ".$y;$fechaact="Agosto ".$y;$fechapos="Septiembre ".$y;break;
case 9: $fechaant="Agosto ".$y;$fechaact="Septiembre ".$y;$fechapos="Octubre ".$y;break;
case 10: $fechaant="Septiembre ".$y;$fechaact="Octubre ".$y;$fechapos="Noviembre ".$y;break;
case 11: $fechaant="Octubre ".$y;$fechaact="Noviembre ".$y;$fechapos="Diciembre ".$y;break;
case 12: $mpos=1;$ypos=$y+1;$fechaant="Noviembre ".$y;$fechaact="Diciembre ".$y;$fechapos="Enero ".$ypos;break;
};
};
?>
<table width="900">
<tr class="enc">
<td>
<a href="infpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m=<?php  echo $mant;?>&d=<?php  echo $dant;?>&y=<?php  echo $yant;?>&tipo=<?php  echo $tipo;?>">
<img src="../../img/minor-event-icon.png" width="50px"></a>
</td>
<td width="500">
<?php if ($idclientes!='todos'){;?>
Datos del Puesto de Trabajo
<?php 
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 

$result1=$conn->query($sql1);
$resultado1=$result1->fetch();
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
//$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
?>
<?php  echo $nombre;?>
<br/>
<?php };?>
<?php  echo $fechaact;?></td>
<td width="50">
<a href="infpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m=<?php  echo $mpos;?>&d=<?php  echo $dpos;?>&y=<?php  echo $ypos;?>&tipo=<?php  echo $tipo;?>">
<img src="../../img/add-event-icon.png" width="50px"></a>
</td>
<td><img alt="volver" border="0" src="../../img/Reload-icon.png" width="32px" onclick="history.back()"></td>
<td><a href="listadoxls.php?tipo=<?php  echo $tipo;?>&idclientes=<?php  echo $idclientes;?>&d=<?php  echo $d;?>&m=<?php  echo $m;?>&y=<?php  echo $y;?>">
<img src="../../img/excel_logo.png" border="0" width="35"></a></td>
</tr>
</table>


<table>
<tr class="subenc"><td>Dia</td><td>Hora</td><td>Empleado</td><td>Mensaje</td><td>Respuesta</td><td>Dia resp</td><td>Hora resp</td></tr>
<?php 
if ($tipo=="dia"){;
$fechaa=date("Y-m-d", mktime(0, 0, 0, $m, $d, $y));

$sql="SELECT * from alarma where idempresas='".$ide."' and dia='".$fechaa."'";
if ($idclientes!='todos'){;
$sql.=" and idclientes='".$idclientes."'";
};
//echo $sql;

$result=$conn->query($sql);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
//$row=mysqli_num_rows($result);

foreach ($result as $row) {
	$dm=$row['d'];
	$mm=$row['m'];
	$ym=$row['y'];
	$hm=$row['h'];
	$minm=$row['min'];
	$segm=$row['seg'];
	$user=$row['user'];
	$mensaje=$row['mensaje'];
	$respuesta=$row['respuesta'];
	$idempleado=$row['idempleados'];
	$diaresp=$row['diaresp'];
	$horaresp=$row['horaresp'];
	$respondido=$row['respondido'];


$diat=$dm.'-'.$mm.'-'.$ym;
$horat=$hm.':'.$minm.':'.$segm;

//for ($i=0;$i<$row;$i++){;
//mysqli_data_seek($result,$i);
//$resultado=mysqli_fetch_array($result);
//$dm=$resultado['d'];
//$mm=$resultado['m'];
//$ym=$resultado['y'];
//$hm=$resultado['h'];
//$minm=$resultado['min'];
//$segm=$resultado['seg'];
//$user=$resultado['user'];
//$mensaje=$resultado['mensaje'];
//$respuesta=$resultado['respuesta'];
//$idempleado=$resultado['idempleados'];
//$diaresp=$resultado['diaresp'];
//$horaresp=$resultado['horaresp'];
//$respondido=$resultado['respondido'];
?>
<tr class="subenc"><td><?php  echo $diat;?></td>
<td><?php  echo $horat;?></td>
<td>
<?php 
if ($idempleado!=null){;
$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;

$resultempl=$conn->query($sqlempl);
$resultadoempl=$resultempl->fetch();
//$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
//$resultadoempl=mysqli_fetch_array($resultempl);
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;
?>
<?php  echo $nempleado;?>
<?php };?>
</td>
<td><?php  echo $mensaje;?></td>
<td><?php  echo $respuesta;?></td>
<td><?php  echo $diaresp;?></td>
<td><?php  echo $horaresp;?></td>
<td><?php if ($respondido==0){;?>
No
<?php }else{;?>
Si
<?php };?></td>
</tr>

<?php };?>
<?php 
}else{;
$fechaa=date("Y-m-d", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y-m-d", mktime(0, 0, 0, $m+1, 0, $y));
$sql="SELECT * from alarma where idempresas='".$ide."'"; 
if ($idclientes!='todos'){;
$sql.=" and idclientes='".$idclientes."'";
};
$sql.=" and dia between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql;

$result=$conn->query($sql);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
//$row=mysqli_num_rows($result);
foreach ($result as $row) {
	$dm=$row['d'];
	$mm=$row['m'];
	$ym=$row['y'];
	$hm=$row['h'];
	$minm=$row['min'];
	$segm=$row['seg'];
	$user=$row['user'];
	$mensaje=$row['mensaje'];
	$respuesta=$row['respuesta'];
	$idempleado=$row['idempleados'];
	$diaresp=$row['diaresp'];
	$horaresp=$row['horaresp'];
	$respondido=$row['respondido'];	

$diat=$dm.'-'.$mm.'-'.$ym;
$horat=$hm.':'.$minm.':'.$segm;
//for ($i=0;$i<$row;$i++){;
//mysqli_data_seek($result,$i);
//$resultado=mysqli_fetch_array($result);
//$dm=$resultado['d'];
//$mm=$resultado['m'];
//$ym=$resultado['y'];
//$hm=$resultado['h'];
//$minm=$resultado['min'];
//$segm=$resultado['seg'];
//$user=$resultado['user'];
//$mensaje=$resultado['mensaje'];
//$respuesta=$resultado['respuesta'];
//$idempleado=$resultado['idempleados'];
//$diaresp=$resultado['diaresp'];
//$horaresp=$resultado['horaresp'];
//$respondido=$resultado['respondido'];

?>
<tr class="subenc">
<td><?php  echo $diat;?></td>
<td><?php  echo $horat;?></td>
<td>
<?php 
if ($idempleado!=0){;
$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;

$resultempl=$conn->query($sqlempl);
$resultadoempl=$resultempl->fetch();
//$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
//$resultadoempl=mysqli_fetch_array($resultempl);
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;
?>
<?php  echo $nempleado;?>
<?php };?>
</td>
<td><?php  echo $mensaje;?></td>
<td><?php  echo $respuesta;?></td>
<td><?php  echo $diaresp;?></td>
<td><?php  echo $horaresp;?></td>
<td>
<?php if ($respondido==0){;?>
No
<?php }else{;?>
Si
<?php };?>
</td>
</tr>

<?php };?>

<?php 
};
?>
</table>


</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>