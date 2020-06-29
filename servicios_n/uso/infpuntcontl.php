<html>
<head>
<title>Informe de Uso</title>
<link rel="stylesheet" href="../../estilo/estilo.css">
</head>
<?php  
include('bbdd.php');
?>

<body>
<table>
<tr><td rowspan="2"><img src="../../img/<?php  echo $img;?>" height=80></td><td class="enc">INFORME DE USO</td></tr>
</table>
<?php 
if ($tipo=="anual"){;
$fechaant=date("d/m/Y", mktime(0, 0, 0, 1, 1, $y-1));
$fechaact=date("d/m/Y", mktime(0, 0, 0, 1, 1, $y));
$fechapos=date("d/m/Y", mktime(0, 0, 0, 1, 1, $y+1));
$fact=date("Y/m/d", mktime(0, 0, 0, 1, 1, $y));
$fpos=date("Y/m/d", mktime(0, 0, 0, 1, 0, $y+1));
$dant=1;
$dpos=1;
$mant=1;
$mpos=1;
$yant=$y-1;
$ypos=$y+1;
}else{;
$dant=1;
$dpos=1;
$mant=$m-1;
$mpos=$m+1;
$yant=$y;
$ypos=$y;
$fact=date("Y/m/d", mktime(0, 0, 0, $m, 1, $y));
$fpos=date("Y/m/d", mktime(0, 0, 0, $mpos, 0, $y));
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
<a href="infpuntcontl.php?idempleado=<?php  echo $idempleado;?>&m=<?php  echo $mant;?>&d=<?php  echo $dant;?>&y=<?php  echo $yant;?>&tipo=<?php  echo $tipo;?>"><< <?php  echo $fechaant;?></a>
</td><td><?php  echo $fechaact;?></td><td>
<a href="infpuntcontl.php?idempleado=<?php  echo $idempleado;?>&m=<?php  echo $mpos;?>&d=<?php  echo $dpos;?>&y=<?php  echo $ypos;?>&tipo=<?php  echo $tipo;?>"><?php  echo $fechapos;?> >></a>
</td></tr>
</table>


<table>
<tr class="subenc2"><td>Datos del Trabajador</td><td>
<?php 

$sql1="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 
$result1=mysql_query ($sql1) or die ("Invalid result1");
$nombre=mysql_result($result1,0,'nombre');
$priape=mysql_result($result1,0,'1apellido');
$segape=mysql_result($result1,0,'2apellido');

$entrada=mysql_result($result1,0,'entrada');
$incidencia=mysql_result($result1,0,'incidencia');
$mensajes=mysql_result($result1,0,'mensajes');
$alarmas=mysql_result($result1,0,'alarmas');
$accdiarias=mysql_result($result1,0,'accdiarias');
$accmantenimiento=mysql_result($result1,0,'accmantenimiento');
$niveles=mysql_result($result1,0,'niveles');
$productos=mysql_result($result1,0,'productos');
$revision=mysql_result($result1,0,'revision');
$trabajo=mysql_result($result1,0,'trabajo');
$siniestro=mysql_result($result1,0,'siniestro');
$acceso=mysql_result($result1,0,'acceso');
?>
<?php  echo $nombre;?>, <?php  echo $priape;?> <?php  echo $segape;?>
</td></tr>
</table>

<table>

<?php  if ($entrada=='1'){;?>
<?php $sql10="SELECT count(id) as valor from almpc where idempresas='".$ide."' and idempleado='".$idempleado."' and idpccat='1' and tiempo between '".$fact."' and '".$fpos."'"; 
//echo $sql10;
$result10=mysql_query ($sql10) or die ("Invalid result1");
$valor=mysql_result($result10,0,'valor');
?>
<tr><td>Entrada / Salida </td><td><?php  echo $valor;?></td></tr>
<?php if ($valor>0){;?>
<?php $totalinc=$totalinc+$valor;?>
<?php $totalkb=($valor*0.000006)+$totalkb;
//echo $totalkb;?>
<?php };?>
<?php };?>



<?php  if ($incidencia=='1'){;?>
<?php $sql10="SELECT count(id) as valor from almpcinci where idempresas='".$ide."' and idempleado='".$idempleado."' and tiempo between '".$fact."' and '".$fpos."'"; 
//echo $sql10;
$result10=mysql_query ($sql10) or die ("Invalid result1");
$valor=mysql_result($result10,0,'valor');
?>
<tr><td>Incidencias </td><td><?php  echo $valor;?></td></tr>
<?php if ($valor>0){;?>
<?php $totalinc=$totalinc+$valor;?>
<?php $totalkb=($valor*0.000006)+$totalkb;
//echo $totalkb;
?>
<?php };?>

<?php $sql10="SELECT count(id) as valor from almpcinci where idempresas='".$ide."' and idempleado='".$idempleado."' and imagen like '%inci%' and tiempo between '".$fact."' and '".$fpos."'"; 
//echo $sql10;
$result10=mysql_query ($sql10) or die ("Invalid result1");
$valor=mysql_result($result10,0,'valor');
?>
<tr><td>Incidencias con Foto</td><td><?php  echo $valor;?></td></tr>
<?php if ($valor>0){;?>
<?php $totalinc=$totalinc+$valor;?>
<?php $totalkb=($valor*0.000006*2000)+$totalkb;
//echo $totalkb;?>
<?php };?>
<?php };?>



<?php  if ($niveles=='1'){;?>
<?php $sql10="SELECT count(id) as valor from almpc where idempresas='".$ide."' and idempleado='".$idempleado."' and idpccat='2' and tiempo between '".$fact."' and '".$fpos."'"; 
//echo $sql10;
$result10=mysql_query ($sql10) or die ("Invalid result1");
$valor=mysql_result($result10,0,'valor');
?>
<tr><td>Niveles </td><td><?php  echo $valor;?></td></tr>
<?php if ($valor>0){;?>
<?php $totalinc=$totalinc+$valor;?>
<?php $totalkb=($valor*0.000006)+$totalkb;
//echo $totalkb;?>
<?php };?>

<?php };?>


<?php  if ($accdiarias=='1'){;?>
<?php $sql10="SELECT count(id) as valor from almpc where idempresas='".$ide."' and idempleado='".$idempleado."' and idpccat='3' and tiempo between '".$fact."' and '".$fpos."'"; 
//echo $sql10;
$result10=mysql_query ($sql10) or die ("Invalid result1");
$valor=mysql_result($result10,0,'valor');
?>
<tr><td>Acciones Diarias</td><td><?php  echo $valor;?></td></tr>
<?php if ($valor>0){;?>
<?php $totalinc=$totalinc+$valor;?>
<?php $totalkb=($valor*0.000006)+$totalkb;
//echo $totalkb;?>
<?php };?>
<?php };?>


<?php  if ($accmantenimiento=='1'){;?>
<?php $sql10="SELECT count(id) as valor from almpc where idempresas='".$ide."' and idempleado='".$idempleado."' and idpccat='4' and tiempo between '".$fact."' and '".$fpos."'"; 
//echo $sql10;
$result10=mysql_query ($sql10) or die ("Invalid result1");
$valor=mysql_result($result10,0,'valor');
?>
<tr><td>Acciones Mantenimiento</td><td><?php  echo $valor;?></td></tr>
<?php if ($valor>0){;?>
<?php $totalinc=$totalinc+$valor;?>
<?php $totalkb=($valor*0.000006)+$totalkb;
//echo $totalkb;?>
<?php };?>
<?php };?>


</table>
<table>
<tr><td class="enc">Total de Incidencias Introduccidas</td><td><?php  echo $totalinc;?></td></tr>
<tr><td class="enc">Total de Compensacion por uso</td><td><?php  echo $totalkb;?></td></tr>
</table>

