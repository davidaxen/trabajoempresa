<?php  
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=alarmas.xls");
header("Pragma: no-cache");
header("Expires: 0");

include('bbdd.php');
$idpccat=8;


$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysql_query ($sql1) or die ("Invalid result1");
$nombre=mysql_result($result1,0,'nombre');








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
$result=mysql_query ($sql) or die ("Invalid result0");
$row=mysql_affected_rows();



for ($i=0;$i<$row;$i++){;
$dm=mysql_result($result,$i,'d');
$mm=mysql_result($result,$i,'m');
$ym=mysql_result($result,$i,'y');
$hm=mysql_result($result,$i,'h');
$minm=mysql_result($result,$i,'min');
$segm=mysql_result($result,$i,'seg');
$diat=$dm.'-'.$mm.'-'.$ym;
$horat=$hm.':'.$minm.':'.$segm;
$user=mysql_result($result,$i,'user');
$respuesta=mysql_result($result,$i,'respuesta');
$idempleado=mysql_result($result,$i,'idempleados');
$diaresp=mysql_result($result,$i,'diaresp');
$horaresp=mysql_result($result,$i,'horaresp');
$respondido=mysql_result($result,$i,'respondido');
$lat=mysql_result($result,$i,'lat');
$lon=mysql_result($result,$i,'lon');

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
$resultempl=mysql_query ($sqlempl) or die ("Invalid result0");
$nombre=mysql_result($resultempl,0,'nombre');
$apellidop=mysql_result($resultempl,0,'1apellido');
$apellidos=mysql_result($resultempl,0,'2apellido');
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
$result=mysql_query ($sql) or die ("Invalid result0");
$row=mysql_affected_rows();


for ($i=0;$i<$row;$i++){;

$dm=mysql_result($result,$i,'d');
$mm=mysql_result($result,$i,'m');
$ym=mysql_result($result,$i,'y');
$hm=mysql_result($result,$i,'h');
$minm=mysql_result($result,$i,'min');
$segm=mysql_result($result,$i,'seg');
$diat=$dm.'-'.$mm.'-'.$ym;
$horat=$hm.':'.$minm.':'.$segm;
$user=mysql_result($result,$i,'user');
$respuesta=mysql_result($result,$i,'respuesta');
$idempleado=mysql_result($result,$i,'idempleados');
$diaresp=mysql_result($result,$i,'diaresp');
$horaresp=mysql_result($result,$i,'horaresp');
$respondido=mysql_result($result,$i,'respondido');
$lat=mysql_result($result,$i,'lat');
$lon=mysql_result($result,$i,'lon');

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
$resultempl=mysql_query ($sqlempl) or die ("Invalid result0");
$nombre=mysql_result($resultempl,0,'nombre');
$apellidop=mysql_result($resultempl,0,'1apellido');
$apellidos=mysql_result($resultempl,0,'2apellido');
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
