<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE ALARMAS</p></div>
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
<a href="mpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m=<?php  echo $mant;?>&d=<?php  echo $dant;?>&y=<?php  echo $yant;?>&tipo=<?php  echo $tipo;?>">
<img src="../../img/minor-event-icon.png" width="50px"></a>
</td>
<td width="500">
<?php if ($idclientes!='todos'){;?>
Datos del Puesto de Trabajo
<?php 
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
?>
<?php  echo $nombre;?>
<br/>
<?php };?>
<?php  echo $fechaact;?></td>
<td width="50">
<a href="mpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m=<?php  echo $mpos;?>&d=<?php  echo $dpos;?>&y=<?php  echo $ypos;?>&tipo=<?php  echo $tipo;?>">
<img src="../../img/add-event-icon.png" width="50px"></a>
</td>
</tr>
</table>



<?php 
if ($tipo=="dia"){;
$fechaa=date("Y-m-d", mktime(0, 0, 0, $m, $d, $y));

$sql="SELECT * from alarma where idempresas='".$ide."' and dia='".$fechaa."' and diaresp='0000-00-00'";
if ($idclientes!='todos'){;
$sql.=" and idclientes='".$idclientes."'";
};
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);
?>
<?php if ($row!=0){;?>
<table>
<tr class="subenc"><td>Dia</td><td>Hora</td><td>Puesto de Trabajo</td><td>Mensaje</td><td>Opciones</td></tr>
<?php }else{;?>
<center><h4>No hay datos que mostrar.</h4></center>
<?php };?>
<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idalarma=$resultado['id'];
$dm=$resultado['d'];
$mm=$resultado['m'];
$ym=$resultado['y'];
$hm=$resultado['h'];
$minm=$resultado['min'];
$segm=$resultado['seg'];
$diat=$dm.'-'.$mm.'-'.$ym;
$horat=$hm.':'.$minm.':'.$segm;
$user=$resultado['user'];
$mensaje=$resultado['mensaje'];
$respuesta=$resultado['respuesta'];
$idclientes=$resultado['idclientes'];
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
?>
<tr class="subenc"><td><?php  echo $diat;?></td>
<td><?php  echo $horat;?></td>
<td>
<?php 
/*
if ($idempleado!=null){;
$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;
$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;
echo $nempleado;
};
*/
?>
<?php  echo $nombre;?>
</td>
<td><?php  echo $mensaje;?></td>
<td><a href="modpuntcont.php?idalarma=<?php  echo $idalarma;?>"><img src="../../img/pencil.png" width="20px"></a></td>
</tr>

<?php };?>
<?php 
}else{;
$fechaa=date("Y-m-d", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y-m-d", mktime(0, 0, 0, $m+1, 0, $y));
$sql="SELECT * from alarma where idempresas='".$ide."' and diaresp='0000-00-00'"; 
if ($idclientes!='todos'){;
$sql.=" and idclientes='".$idclientes."'";
};
$sql.=" and dia between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);
?>
<?php if ($row!=0){;?>
<table>
<tr class="subenc"><td>Dia</td><td>Hora</td><td>Puestos de Trabajo</td><td>Mensaje</td><td>Opciones</td></tr>
<?php }else{;?>
<center><h4>No hay datos que mostrar.</h4></center>
<?php };?>

<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idalarma=$resultado['id'];
$dm=$resultado['d'];
$mm=$resultado['m'];
$ym=$resultado['y'];
$hm=$resultado['h'];
$minm=$resultado['min'];
$segm=$resultado['seg'];
$diat=$dm.'-'.$mm.'-'.$ym;
$horat=$hm.':'.$minm.':'.$segm;
$user=$resultado['user'];
$mensaje=$resultado['mensaje'];
$respuesta=$resultado['respuesta'];
$idempleado=$resultado['idempleados'];
$idclientes=$resultado['idclientes'];
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
?>
<tr class="subenc">
<td><?php  echo $diat;?></td>
<td><?php  echo $horat;?></td>
<td>
<?php 
/*
if ($idempleado!=0){;
$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;
$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;
echo $nempleado;
};
*/
?>
<?php  echo $nombre;?>
</td>
<td><?php  echo $mensaje;?></td>
<td><a href="modpuntcont.php?idalarma=<?php  echo $idalarma;?>"><img src="../../img/pencil.png" width="20px"></a></td>
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