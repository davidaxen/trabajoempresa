<?php  
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=alarmas.xls");
header("Pragma: no-cache");
header("Expires: 0");

include('bbdd.php');
$idpccat=8;


$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];








echo "<table border=0 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<td rowspan='3' colspan='2'>";
echo "</td>";
echo "<td colspan='4'><b>INFORME DE ALARMAS</b></td></tr>";
echo "<tr><td colspan='2'>Nombre de la empresa</td><td>";
echo $nemp;
echo "</td></tr>";
echo "<tr><td colspan='2'>Datos del Puesto de Trabajo</td><td>";
echo $nombre;
echo "</td></tr>";

echo "<tr>";
echo "<td><b>Dia</b></td>";
echo "<td><b>Hora</b></td>";
echo "<td><b>Empleado</b></td>";
echo "<td><b>Respuesta</b></td>";
echo "<td><b>Dia Resp</b></td>";
echo "<td><b>Hora Resp</b></td>";
echo "<td><b>Latitud</b></td>";
echo "<td><b>Longitud</b></td>";
echo "</tr>";


if ($tipo=="dia"){;
$fechaa=date("Y-m-d", mktime(0, 0, 0, $m, $d, $y));

$sql="SELECT * from alarma where idempresas='".$ide."' and idclientes='".$idclientes."' and dia='".$fechaa."'";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);



for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$dm=$resultado['d'];
$mm=$resultado['m'];
$ym=$resultado['y'];
$hm=$resultado['h'];
$minm=$resultado['min'];
$segm=$resultado['seg'];
$diat=$dm.'-'.$mm.'-'.$ym;
$horat=$hm.':'.$minm.':'.$segm;
$user=$resultado['user'];
$respuesta=$resultado['respuesta'];
$idempleado=$resultado['idempleados'];
$diaresp=$resultado['diaresp'];
$horaresp=$resultado['horaresp'];
$respondido=$resultado['respondido'];
$lat=$resultado['lat'];
$lon=$resultado['lon'];

echo "<tr class='subenc'><td>";
echo $diat;
echo "</td>";
echo "<td>";
echo $horat;
echo "</td>";
echo "<td>";
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
echo "</td>";
echo "<td>";
echo $respuesta;
echo "</td>";
echo "<td>";
echo $diaresp;
echo "</td>";
echo "<td>";
echo $horaresp;
echo "</td>";
echo "<td>";
echo $lat;
echo "</td>";
echo "<td>";
echo $lon;
echo "</td>";
echo "</tr>";

};

}else{;

$fechaa=date("Y-m-d", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y-m-d", mktime(0, 0, 0, $m+1, 0, $y));
$sql="SELECT * from alarma where idempresas='".$ide."' and idclientes='".$idclientes."' and dia between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);


for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$dm=$resultado['d'];
$mm=$resultado['m'];
$ym=$resultado['y'];
$hm=$resultado['h'];
$minm=$resultado['min'];
$segm=$resultado['seg'];
$diat=$dm.'-'.$mm.'-'.$ym;
$horat=$hm.':'.$minm.':'.$segm;
$user=$resultado['user'];
$respuesta=$resultado['respuesta'];
$idempleado=$resultado['idempleados'];
$diaresp=$resultado['diaresp'];
$horaresp=$resultado['horaresp'];
$respondido=$resultado['respondido'];
$lat=$resultado['lat'];
$lon=$resultado['lon'];

echo "<tr class='subenc'><td>";
echo $diat;
echo "</td>";
echo "<td>";
echo $horat;
echo "</td>";
echo "<td>";
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
echo "</td>";
echo "<td>";
echo $respuesta;
echo "</td>";
echo "<td>";
echo $diaresp;
echo "</td>";
echo "<td>";
echo $horaresp;
echo "</td>";
echo "<td>";
echo $lat;
echo "</td>";
echo "<td>";
echo $lon;
echo "</td>";
echo "</tr>";


};


};

echo "</table>";
?>
