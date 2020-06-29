<?php   
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php 
if ($tipo=="dia"){;
$fechaant=date("Y-m-d", mktime(0, 0, 0, $m, $d-1, $y));
$fechaact=date("Y-m-d", mktime(0, 0, 0, $m, $d, $y));
$fechapos=date("Y-m-d", mktime(0, 0, 0, $m, $d+1, $y));
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
<td width="50">
<a href="infpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m=<?php  echo $mant;?>&d=<?php  echo $dant;?>&y=<?php  echo $yant;?>&tipo=<?php  echo $tipo;?>&idpunt=<?php  echo $idpunt;?>"><img src="../../img/minor-event-icon.png" width="50px"></a>
</td>
<td width="500">
<?php 
if ($idclientes!='todos'){;?>
Datos del Puesto de Trabajo: 
<?php 
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
?>
<?php  echo $nombre;?>
<br/>
<?php };?>
<?php  echo $fechaact;?>
</td>
<td width="50">
<a href="infpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m=<?php  echo $mpos;?>&d=<?php  echo $dpos;?>&y=<?php  echo $ypos;?>&tipo=<?php  echo $tipo;?>&idpunt=<?php  echo $idpunt;?>"><img src="../../img/add-event-icon.png" width="50px"></a>
</td>
<td><img alt="volver" border="0" src="../../img/Reload-icon.png" width="32px" onclick="history.back()"></td>
<td>
<a href="listadoxls.php?tipo=<?php  echo $tipo;?>&idclientes=<?php  echo $idclientes;?>&d=<?php  echo $d;?>&m=<?php  echo $m;?>&y=<?php  echo $y;?>">
<img src="../../img/excel_logo.png" border="0" width="32px"></a>
</td>
</tr>
</table>


<table>

<?php 
if ($tipo=="dia"){;?>

<tr class="subenc">
<?php if ($idclientes=='todos'){;?>
<td>Puesto</td>
<?php };?>
<td>Dia</td><td>Hora</td><td>Empleado</td><td>Servicio</td><td>Observaciones</td></tr>

<?php 
$fechaa=date("Y-m-d", mktime(0, 0, 0, $m, $d, $y));

$sql="SELECT * from almpc where idempresas='".$ide."' and idpccat='".$idpccat."' and dia='".$fechaa."'";
if ($idclientes!='todos'){
$sql.=" and idpiscina='".$idclientes."'";
}
if ($idpunt!='todos'){
$sql.=" and idpcsubcat='".$idpunt."'";
}
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);

for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$hora=$resultado['hora'];
$idempleado=$resultado['idempleado'];
$idpcsubcat=$resultado['idpcsubcat'];
$cantidad=$resultado['cantidad'];
$lon=$resultado['lon'];
$lat=$resultado['lat'];
$obs=$resultado['obs'];
$yt=fmod($i,2);
?>
<?php if ($yt==0){;?><tr class="fpar"><?php };?> 
<?php if ($yt==1){;?><tr class="fimpar"><?php };?>

<?php if ($idclientes=='todos'){;?>
<td>Puesto</td>
<?php };?>

<td><?php  echo $fechaa;?></td>
<td><?php  echo $hora;?></td>
<td>
<?php 
$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;
$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);
$nombrep=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombrep.' '.$apellidop.' '.$apellidos;
?>
<?php  echo $nempleado;?>
</td>
<td>
<?php 
$sqlsub="SELECT * from puntservicios where idempresas='".$ide."' and idpcsubcat='".$idpcsubcat."' and idpccat='".$idpccat."' ";
//echo $sqlsub;
$resultsub=mysqli_query ($conn,$sqlsub) or die ("Invalid result0");
$resultadosub=mysqli_fetch_array($resultsub);
$subcategoria=$resultadosub['subcategoria'];
?>
<?php  echo $subcategoria;?>
</td>
<td><?php  echo $obs;?></td>
<td><a href="/portada_n/mapa.php?lon=<?php  echo $lon;?>&lat=<?php  echo $lat;?>&nombrecom=<?php  echo $nombre;?>&nombretrab=<?php  echo $nempleado;?>">
<img src="/img/modificar.gif">
</a></td>

</tr>

<?php };?>
<?php 
}else{;

$fechaa=date("Y-m-d", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y-m-d", mktime(0, 0, 0, $m+1, 0, $y));
$sql="SELECT * from almpc where idempresas='".$ide."' and idpiscina='".$idclientes."' and idpccat='".$idpccat."'";
if ($idpunt!='todos'){
$sql.=" and idpcsubcat='".$idpunt."'";
}
$sql.=" and tiempo between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);
?>
<?php 
if ($idclientes=='todos'){;?>
<tr class="subenc"><td>Puesto de Trabajo</td><td>Dia</td><td>Hora</td><td>Empleado</td><td>Servicio</td><td>Cantidad</td></tr>



<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$idcl=$resultado['idpiscina'];
$dia=$resultado['dia'];
$hora=$resultado['hora'];
$idempleado=$resultado['idempleado'];
$idpcsubcat=$resultado['idpcsubcat'];
$cantidad=$resultado['cantidad'];
$yt=fmod($i,2);
?>
<?php if ($yt==0){;?><tr class="fpar"><?php };?> 
<?php if ($yt==1){;?><tr class="fimpar"><?php };?>

<td>
<?php 
$sql1c="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idcl."'"; 
$result1c=mysqli_query ($conn,$sql1c) or die ("Invalid result1c");
$resultado1c=mysqli_fetch_array($result1c);
$nombrecliente=$resultado1c['nombre'];
?>
<?php  echo $nombrecliente;?></td>
<td><?php  echo $dia;?></td>
<td><?php  echo $hora;?></td>
<td>
<?php 
$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;
$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;
?>
<?php  echo $nempleado;?>
</td>
<td>
<?php 
$sqlsub="SELECT * from puntservicios where idempresas='".$ide."' and idpcsubcat='".$idpcsubcat."' and idpccat='".$idpccat."' ";
//echo $sql;
$resultsub=mysqli_query ($conn,$sqlsub) or die ("Invalid result0");
$resultadosub=mysqli_fetch_array($resultsub);
$subcategoria=$resultadosub['subcategoria'];
?>
<?php  echo $subcategoria;?>
</td>
<td><?php  echo $cantidad;?></td>
</tr>

<?php };?>

<?php }else{;?>
<?php 
$yea=$y;
$mes=$m;
$dia=1;

include_once('calen.php');
?>



<?php 
};
?>


<?php 
};
?>
</table>



</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>
