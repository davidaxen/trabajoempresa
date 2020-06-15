<?php 
include('bbdd.php');
$idpccat=3;

if ($ide!=null){;
include('../../../portada_n/cabecera4.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE ORDENES</p></div>
<div class="contenido">
<?
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
<table width="400">
<tr class="enc"><td>
<a href="infpuntcontl.php?idclientes=<?=$idclientes;?>&m=<?=$mant;?>&d=<?=$dant;?>&y=<?=$yant;?>&tipo=<?=$tipo;?>"><< <?=$fechaant;?></a>
</td><td><?=$fechaact;?></td><td>
<a href="infpuntcontl.php?idclientes=<?=$idclientes;?>&m=<?=$mpos;?>&d=<?=$dpos;?>&y=<?=$ypos;?>&tipo=<?=$tipo;?>"><?=$fechapos;?> >></a>
</td></tr>
</table>


<table>
<?
if ($idclientes!=null){;
?>
<tr class="subenc2"><td>Datos del Cliente</td><td>
<?
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
?>
<?=$nombre;?>
</td></tr>
<?};?>

<tr class="subenc"><td>Dia</td><td>Hora</td><td>Empleado</td><td>Servicio</td></tr>
<?
if ($tipo=="dia"){;
$fechaa=date("d/m/Y", mktime(0, 0, 0, $m, $d, $y));

$sql="SELECT * from almpc where idempresas='".$ide."' and idpccat='".$idpccat."' and dia='".$fechaa."'";
if ($idclientes!=null){;
$sql.=" and idpiscina='".$idclientes."'";
};

//echo $sql;
$result=mysqli_query($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);

for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$hora=$resultado['hora'];
$idempleado=$resultado['idempleado'];
$idpcsubcat=$resultado['idpcsubcat'];
$yt=fmod($i,2);
?>
<?if ($yt==0){;?><tr class="fpar"><?};?> 
<?if ($yt==1){;?><tr class="fimpar"><?};?>


<td><?=$fechaa;?></td>
<td><?=$hora;?></td>
<td>
<?
$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;
$resultempl=mysqli_query($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;
?>
<?=$nempleado;?>
</td>
<td>
<?
$sqlsub="SELECT * from puntservicios where idempresas='".$ide."' and idpcsubcat='".$idpcsubcat."' and idpccat='".$idpccat."' ";
//echo $sqlsub;
$resultsub=mysqli_query($conn,$sqlsub) or die ("Invalid result0");
$resultadosub=mysqli_fetch_array($resultsub);
$subcategoria=$resultadosub['subcategoria'];
?>
<?=$subcategoria;?>
</td>
</tr>

<?};?>
<?
}else{;
$fechaa=date("Y/m/d", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y/m/d", mktime(0, 0, 0, $m+1, 0, $y));
$sql="SELECT * from almpc where idempresas='".$ide."' and idpiscina='".$idclientes."' and idpccat='".$idpccat."' and tiempo between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql;
$result=mysqli_query($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);

for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$dia=$resultado['dia'];
$hora=$resultado['hora'];
$idempleado=$resultado['idempleado'];
$idpcsubcat=$resultado['idpcsubcat'];
$yt=fmod($i,2);
?>
<?if ($yt==0){;?><tr class="fpar"><?};?> 
<?if ($yt==1){;?><tr class="fimpar"><?};?>


<td><?=$dia;?></td>
<td><?=$hora;?></td>
<td>
<?
$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;
$resultempl=mysqli_query($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;
?>
<?=$nempleado;?>
</td>
<td>
<?
$sqlsub="SELECT * from puntservicios where idempresas='".$ide."' and idpcsubcat='".$idpcsubcat."' and idpccat='".$idpccat."' ";
//echo $sql;
$resultsub=mysqli_query($conn,$sqlsub) or die ("Invalid result0");
$resultadosub=mysqli_fetch_array($resultsub);
$subcategoria=$resultadosub['subcategoria'];
?>
<?=$subcategoria;?>
</td>
</tr>

<?};?>

<?
};
?>
</table>
<p>
<img alt="volver" border="0" src="../../img/arrow_cycle.png" onclick="history.back()">
<a href="listadoxls.php?tipo=<?=$tipo;?>&idclientes=<?=$idclientes;?>&d=<?=$d;?>&m=<?=$m;?>&y=<?=$y;?>">
<img src="../../img/excel_logo.png" border="0" width="35">
</a>
</div>
</div>

<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://www.smartcbc.com">aquí</a>

<?};?>