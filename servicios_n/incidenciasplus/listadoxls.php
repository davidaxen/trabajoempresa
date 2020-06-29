<?php  
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=incidencias.xls");
header("Pragma: no-cache");
header("Expires: 0");

include('bbdd.php');
$idpccat=8;

if ($idclientes==0){;
$nombre="Fuera del Puesto de Trabajo";
}else{;
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
};







echo "<table border=0 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<td rowspan='3' colspan='2'>";
echo "</td>";
echo "<td colspan='4'><b>INFORME DE INCIDENCIAS</b></td></tr>";
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
echo "<td><b>Texto</b></td>";
echo "<td><b>Urgente</b></td>";
echo "<td><b>Texto Resp. Urgente</b></td>";
echo "<td><b>Latitud</b></td>";
echo "<td><b>Longitud</b></td>";
echo "<td><b>Tiempo</b></td>";
echo "</tr>";


if ($tipo=="dia"){;
$fechaa=date("d/m/Y", mktime(0, 0, 0, $m, $d, $y));

$sql="SELECT * from almpcinci where idempresas='".$ide."' and idpiscina='".$idclientes."' and dia='".$fechaa."'";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);



for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$hora=$resultado['hora'];
$idempleado=$resultado['idempleado'];
$texto=$resultado['texto'];
$urgente=$resultado['urgente'];
$textourg=$resultado['textourg'];
$tiempo=$resultado['tiempo'];
$lat=$resultado['lat'];
$lon=$resultado['lon'];
if ($urgente==0){;
$urgente="No";
}else{;
$urgente="Si";
	};

echo "<tr class='subenc'><td>";
echo $fechaa;
echo "</td>";
echo "<td>";
echo $hora;
echo "</td>";
echo "<td>";

$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;
$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;

echo $nempleado;
echo "</td>";
echo "<td>";
echo $texto;
echo "</td>";
echo "<td>";
echo $urgente;
echo "</td>";
echo "<td>";
echo $textourg;
echo "</td>";
echo "<td>";
echo $lat;
echo "</td>";
echo "<td>";
echo $lon;
echo "</td>";
echo "<td>";
echo $tiempo;
echo "</td>";

echo "</tr>";

};

}else{;


$fechaa=date("Y/m/d", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y/m/d", mktime(0, 0, 0, $m+1, 0, $y));
$sql="SELECT * from almpcinci where idempresas='".$ide."' and idpiscina='".$idclientes."' and tiempo between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);

for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$dia=$resultado['dia'];
$hora=$resultado['hora'];
$idempleado=$resultado['idempleado'];
$texto=$resultado['texto'];
$urgente=$resultado['urgente'];
$textourg=$resultado['textourg'];
$tiempo=$resultado['tiempo'];
$lat=$resultado['lat'];
$lon=$resultado['lon'];
if ($urgente==0){;
$urgente="No";
}else{;
$urgente="Si";
	};

echo "<tr class='subenc'><td>";
echo $dia;
echo "</td>";
echo "<td>";
echo $hora;
echo "</td>";
echo "<td>";

$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;
$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;

echo $nempleado;
echo "</td>";
echo "<td>";
echo $texto;
echo "</td>";
echo "<td>";
echo $urgente;
echo "</td>";
echo "<td>";
echo $textourg;
echo "</td>";
echo "<td>";
echo $lat;
echo "</td>";
echo "<td>";
echo $lon;
echo "</td>";
echo "<td>";
echo $tiempo;
echo "</td>";
echo "</tr>";

};


};

echo "</table>";
?>
