<?php  
include('bbdd.php');
?>


<html>
<head>
<title>Informe de Uso</title>
<link rel="stylesheet" href="../../estilo/estilo.css">
</head>
<body>
<table>
<tr><td rowspan="2"><img src="../../img/<?php  echo $img;?>" height=80></td><td class="enc">INFORME DE EMPLEADOS</td></tr>
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
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
$priape=$resultado1['1apellido'];
$segape=$resultado1['2apellido'];
$entrada=$resultado1['entrada'];
$incidencia=$resultado1['incidencia'];
$mensajes=$resultado1['mensajes'];
$alarmas=$resultado1['alarmas'];
$accdiarias=$resultado1['accdiarias'];
$accmantenimiento=$resultado1['accmantenimiento'];
$niveles=$resultado1['niveles'];
$productos=$resultado1['productos'];
$revision=$resultado1['revision'];
$trabajo=$resultado1['trabajo'];
$siniestro=$resultado1['siniestro'];
$acceso=$resultado1['acceso'];
?>
<?php  echo $nombre;?>, <?php  echo $priape;?> <?php  echo $segape;?>
</td></tr>
</table>

<table>

<?php  if ($entrada=='1'){;
$sql10="SELECT count(id) as valor from almpc where idempresas='".$ide."' and idempleado='".$idempleado."' and idpccat='1' and tiempo between '".$fact."' and '".$fpos."'"; 
//echo $sql10;
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result1");
$resultado10=mysqli_fetch_array($result10);
$valor=$resultado10['valor'];
?>
<tr><td>Entrada / Salida </td><td><?php  echo $valor;?></td></tr>
<?php 
if ($valor>0){;
$sql10="SELECT * from almpc where idempresas='".$ide."' and idempleado='".$idempleado."' and idpccat='1' and tiempo between '".$fact."' and '".$fpos."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result10");
$row=mysqli_num_rows($result10);
?>
<tr><td colspan="2">
<table>
<tr><td>Cliente</td><td>Tipo</td><td>Día</td><td>Hora</td></tr>
<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result10,$i);
$resultado10=mysqli_fetch_array($result10);
$idpcsubcat=$resultado10['idpcsubcat'];
$dia=$resultado10['dia'];
$hora=$resultado10['hora'];
$idclientes=$resultado10['idpiscina'];

$sql11="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result11");
$resultado11=mysqli_fetch_array($result11);
$nombre=$resultado11['nombre'];

$sql12="SELECT subcategoria from pcsubcat where idempresas='".$ide."' and idpccat='1' and idpcsubcat='".$idpcsubcat."'"; 
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result12");
$resultado12=mysqli_fetch_array($result12);
$subcategoria=$resultado12['subcategoria'];

?>
<tr><td><?php  echo $nombre;?></td><td><?php  echo $subcategoria;?></td><td><?php  echo $dia;?></td><td><?php  echo $hora;?></td></tr>


<?php };?>
</table>
</td></tr>
<?php };?>
<?php };?>



<?php  if ($incidencia=='1'){;
$sql10="SELECT count(id) as valor from almpcinci where idempresas='".$ide."' and idempleado='".$idempleado."' and tiempo between '".$fact."' and '".$fpos."'"; 
//echo $sql10;
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result1");
$resultado10=mysqli_fetch_array($result10);
$valor=$resultado10['valor'];
?>
<tr><td>Incidencias </td><td><?php  echo $valor;?></td></tr>


<?php 
$sql10="SELECT count(id) as valor from almpcinci where idempresas='".$ide."' and idempleado='".$idempleado."' and imagen like '%inci%' and tiempo between '".$fact."' and '".$fpos."'"; 
//echo $sql10;
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result1");
$resultado10=mysqli_fetch_array($result10);
$valor=$resultado10['valor'];
?>
<tr><td>Incidencias con Foto</td><td><?php  echo $valor;?></td></tr>
<?php 
if ($valor>0){;
$sql10="SELECT * from almpcinci where idempresas='".$ide."' and idempleado='".$idempleado."' and tiempo between '".$fact."' and '".$fpos."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result10");
$row=mysqli_num_rows($result10);
?>
<tr><td colspan="2">
<table>
<tr><td>Cliente</td><td>Día</td><td>Hora</td></tr>
<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result10,$i);
$resultado10=mysqli_fetch_array($result10);
$texto=$resultado10['texto'];
$dia=$resultado10['dia'];
$hora=$resultado10['hora'];
$idclientes=$resultado10['idpiscina'];

$sql11="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result11");
$resultado11=mysqli_fetch_array($result11);
$nombre=$resultado11['nombre'];

?>
<tr><td><?php  echo $nombre;?></td><td><?php  echo $dia;?></td><td><?php  echo $hora;?></td><td><?php  echo $texto;?></td></tr>

<?php };?>
</table>
<?php };?>

<?php };?>

<?php  if ($niveles=='1'){;
$sql10="SELECT count(id) as valor from almpc where idempresas='".$ide."' and idempleado='".$idempleado."' and idpccat='2' and tiempo between '".$fact."' and '".$fpos."'"; 
//echo $sql10;
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result1");
$resultado10=mysqli_fetch_array($result10);
$valor=$resultado10['valor'];
?>
<tr><td>Niveles </td><td><?php  echo $valor;?></td></tr>
<?php 
if ($valor>0){;
$sql10="SELECT * from almpc where idempresas='".$ide."' and idempleado='".$idempleado."' and idpccat='2' and tiempo between '".$fact."' and '".$fpos."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result10");
$row=mysqli_num_rows($result10);
?>
<tr><td colspan="2">
<table>
<tr><td>Cliente</td><td>Tipo</td><td>Cantidad</td><td>Día</td><td>Hora</td></tr>
<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result10,$i);
$resultado10=mysqli_fetch_array($result10);
$idpcsubcat=$resultado10['idpcsubcat'];
$dia=$resultado10['dia'];
$hora=$resultado10['hora'];
$idclientes=$resultado10['idpiscina'];
$cantidad=$resultado10['cantidad'];

$sql11="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result11");
$resultado11=mysqli_fetch_array($result11);
$nombre=$resultado11['nombre'];

$sql12="SELECT subcategoria from pcsubcat where idempresas='".$ide."' and idpccat='2' and idpcsubcat='".$idpcsubcat."'"; 
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result12");
$resultado12=mysqli_fetch_array($result12);
$subcategoria=$resultado12['subcategoria'];

?>
<tr><td><?php  echo $nombre;?></td><td><?php  echo $subcategoria;?></td><td><?php  echo $cantidad;?></td><td><?php  echo $dia;?></td><td><?php  echo $hora;?></td></tr>


<?php };?>
</table>
</td></tr>
<?php };?>
<?php };?>


<?php  if ($accdiarias=='1'){;
$sql10="SELECT count(id) as valor from almpc where idempresas='".$ide."' and idempleado='".$idempleado."' and idpccat='3' and tiempo between '".$fact."' and '".$fpos."'"; 
//echo $sql10;
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result1");
$resultado10=mysqli_fetch_array($result10);
$valor=$resultado10['valor'];
?>
<tr><td>Acciones Diarias</td><td><?php  echo $valor;?></td></tr>
<?php 
if ($valor>0){;
$sql10="SELECT * from almpc where idempresas='".$ide."' and idempleado='".$idempleado."' and idpccat='3' and tiempo between '".$fact."' and '".$fpos."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result10");
$row=mysqli_num_rows($result10);
?>
<tr><td colspan="2">
<table>
<tr><td>Cliente</td><td>Tipo</td><td>Día</td><td>Hora</td></tr>
<?php 
for ($i=0;$i<$row;$i++){;
$resultado10=mysqli_fetch_array($result10);
$idpcsubcat=$resultado10['idpcsubcat'];
$dia=$resultado10['dia'];
$hora=$resultado10['hora'];
$idclientes=$resultado10['idpiscina'];

$sql11="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result11");
$resultado11=mysqli_fetch_array($result11);
$nombre=$resultado11['nombre'];

$sql12="SELECT subcategoria from pcsubcat where idempresas='".$ide."' and idpccat='3' and idpcsubcat='".$idpcsubcat."'"; 
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result12");
$resultado12=mysqli_fetch_array($result12);
$subcategoria=$resultado12['subcategoria'];

?>
<tr><td><?php  echo $nombre;?></td><td><?php  echo $subcategoria;?></td><td><?php  echo $dia;?></td><td><?php  echo $hora;?></td></tr>


<?php };?>
</table>
</td></tr>
<?php };?>
<?php };?>


<?php  if ($accmantenimiento=='1'){;
$sql10="SELECT count(id) as valor from almpc where idempresas='".$ide."' and idempleado='".$idempleado."' and idpccat='4' and tiempo between '".$fact."' and '".$fpos."'"; 
//echo $sql10;
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result1");
$resultado10=mysqli_fetch_array($result10);
$valor=$resultado10['valor'];
?>
<tr><td>Acciones Mantenimiento</td><td><?php  echo $valor;?></td></tr>
<?php 
if ($valor>0){;
$sql10="SELECT * from almpc where idempresas='".$ide."' and idempleado='".$idempleado."' and idpccat='4' and tiempo between '".$fact."' and '".$fpos."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result10");
$row=mysqli_num_rows($result10);
?>
<tr><td colspan="2">
<table>
<tr><td>Cliente</td><td>Tipo</td><td>Día</td><td>Hora</td></tr>
<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result10,$i);
$resultado10=mysqli_fetch_array($result10);
$idpcsubcat=$resultado10['idpcsubcat'];
$dia=$resultado10['dia'];
$hora=$resultado10['hora'];
$idclientes=$resultado10['idpiscina'];

$sql11="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result11");
$resultado11=mysqli_fetch_array($result11);
$nombre=$resultado11['nombre'];

$sql12="SELECT subcategoria from pcsubcat where idempresas='".$ide."' and idpccat='4' and idpcsubcat='".$idpcsubcat."'"; 
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result12");
$resultado12=mysqli_fetch_array($result12);
$subcategoria=$resultado12['subcategoria'];

?>
<tr><td><?php  echo $nombre;?></td><td><?php  echo $subcategoria;?></td><td><?php  echo $dia;?></td><td><?php  echo $hora;?></td></tr>


<?php };?>
</table>
</td></tr>
<?php };?>
<?php };?>


</table>




<!--
<p>
<img alt="volver" border="0" src="../../img/arrow_cycle.png" onclick="history.back()">
<a href="listadoxls.php?tipo=<?php  echo $tipo;?>&idclientes=<?php  echo $idclientes;?>&d=<?php  echo $d;?>&m=<?php  echo $m;?>&y=<?php  echo $y;?>">
<img src="../../img/excel_logo.png" border="0" width="35">
</a>
-->