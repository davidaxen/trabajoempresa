<html>
<head>
<title>Informe Puntos de Control</title>
<link rel="stylesheet" href="../../estilo/estilo.css">
</head>
<?php  
include('bbdd.php');
$idpccat=1;
?>

<body>
<table>
<tr><td rowspan="2"><img src="../../img/<?php  echo $img;?>" height=80></td><td class="enc">INFORME DE ENTRADA / SALIDA</td></tr>
</table>
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
<table width="400">
<tr class="enc"><td>
<a href="infpuntcontlemp.php?idempleado=<?php  echo $idempleado;?>&m=<?php  echo $mant;?>&d=<?php  echo $dant;?>&y=<?php  echo $yant;?>&tipo=<?php  echo $tipo;?>"><< <?php  echo $fechaant;?></a>
</td><td><?php  echo $fechaact;?></td><td>
<a href="infpuntcontlemp.php?idempleado=<?php  echo $idempleado;?>&m=<?php  echo $mpos;?>&d=<?php  echo $dpos;?>&y=<?php  echo $ypos;?>&tipo=<?php  echo $tipo;?>"><?php  echo $fechapos;?> >></a>
</td></tr>
</table>


<table>
<tr class="subenc2"><td>Datos del Puesto de Trabajo</td><td>
<?php 

$sql1="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 
$result1=mysqli_query ($conn,$conn,$conn,$sql1) or die ("Invalid result1");
$nombre=mysqli_result($result1,0,'nombre');
$papellido=mysqli_result($result1,0,'1apellido');
$sapellido=mysqli_result($result1,0,'2apellido');
?>
<?php  echo $nombre;?>, <?php  echo $papellido;?> <?php  echo $sapellido;?>
</td></tr>
<tr class="subenc"><td>Dia</td><td>Hora</td><td>Cliente</td><td>Servicio</td></tr>
<?php 
if ($tipo=="dia"){;
$fechaa=date("d/m/Y", mktime(0, 0, 0, $m, $d, $y));

$sql="SELECT * from almpc where idempresas='".$ide."' and idempleado='".$idempleado."' and idpccat='".$idpccat."' and dia='".$fechaa."'";
echo $sql;
$result=mysqli_query ($conn,$conn,$conn,$sql) or die ("Invalid result0");
$row=mysqli_affected_rows();
?>


<?php for ($i=0;$i<$row;$i++){;
$hora=mysqli_result($result,$i,'hora');
$idclientes=mysqli_result($result,$i,'idpiscina');
$idpcsubcat=mysqli_result($result,$i,'idpcsubcat');
$yt=fmod($i,2);
?>
<?php if ($yt==0){;?><tr class="mpar"><?php };?> 
<?php if ($yt==1){;?><tr class="mimpar"><?php };?>


<td><?php  echo $fechaa;?></td>
<td><?php  echo $hora;?></td>
<td>
<?php 
$sqlempl="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idcientes."'";
//echo $sql;
$resultempl=mysqli_query ($conn,$conn,$conn,$sqlempl) or die ("Invalid result0");
$nombrec=mysqli_result($resultempl,0,'nombre');
?>
<?php  echo $nombrec;?>
</td>
<td>
<?php 
$sqlsub="SELECT * from puntservicios where idempresas='".$ide."' and idpcsubcat='".$idpcsubcat."' and idpccat='".$idpccat."' ";
//echo $sqlsub;
$resultsub=mysqli_query ($conn,$conn,$conn,$sqlsub) or die ("Invalid result0");
$subcategoria=mysqli_result($resultsub,0,'subcategoria');
?>
<?php  echo $subcategoria;?>
</td>
</tr>

<?php };?>
<?php 
}else{;
$fechaa=date("Y/m/d", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y/m/d", mktime(0, 0, 0, $m+1, 0, $y));
$sql="SELECT * from almpc where idempresas='".$ide."' and idempleado='".$idempleado."' and idpccat='".$idpccat."' and tiempo between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql;
$result=mysqli_query ($conn,$conn,$conn,$sql) or die ("Invalid result0");
$row=mysqli_affected_rows();
?>


<?php for ($i=0;$i<$row;$i++){;
$dia=mysqli_result($result,$i,'dia');
$hora=mysqli_result($result,$i,'hora');
$idclientes=mysqli_result($result,$i,'idpiscina');
$idpcsubcat=mysqli_result($result,$i,'idpcsubcat');
$yt=fmod($i,2);
?>
<?php if ($yt==0){;?><tr class="fpar"><?php };?> 
<?php if ($yt==1){;?><tr class="fimpar"><?php };?>


<td><?php  echo $dia;?></td>
<td><?php  echo $hora;?></td>
<td>
<?php 
$sqlempl="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'";
//echo $sql;
$resultempl=mysqli_query ($conn,$conn,$conn,$sqlempl) or die ("Invalid result0");
$nombrec=mysqli_result($resultempl,0,'nombre');

?>
<?php  echo $nombrec;?>
</td>
<td>
<?php 
$sqlsub="SELECT * from puntservicios where idempresas='".$ide."' and idpcsubcat='".$idpcsubcat."' and idpccat='".$idpccat."' ";
//echo $sql;
$resultsub=mysqli_query ($conn,$conn,$conn,$sqlsub) or die ("Invalid result0");
$subcategoria=mysqli_result($resultsub,0,'subcategoria');
?>
<?php  echo $subcategoria;?>
</td>
</tr>

<?php };?>

<?php 
};
?>
</table>
<p>
<img alt="volver" border="0" src="../../img/arrow_cycle.png" onclick="history.back()">
<a href="listadoxls.php?tipo=<?php  echo $tipo;?>&idclientes=<?php  echo $idclientes;?>&d=<?php  echo $d;?>&m=<?php  echo $m;?>&y=<?php  echo $y;?>">
<img src="../../img/excel_logo.png" border="0" width="35">
</a>
