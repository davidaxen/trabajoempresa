<?php  
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=mediciones.xls");
header("Pragma: no-cache");
header("Expires: 0");

include('bbdd.php');

$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];

echo "<table border=0 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<td rowspan='3' colspan='2'> ";
echo "</td>";
echo "<td colspan='4'><b>INFORME DE MEDICIONES</b></td></tr>";
echo "<tr><td colspan='2'>Nombre de la empresa</td><td>";
echo $nemp;
echo "</td></tr>";
echo "<tr><td colspan='2'>Datos del Cliente</td><td>";
echo $nombre;
echo "</td></tr>";


$sql10="SELECT * from puntservicios where idempresas='".$ide."' and idpccat='10'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result10");
$row10=mysqli_num_rows($result10);


for($th=0;$th<$row10;$th++){;
mysqli_data_seek($result10,$th);
$resultado10=mysqli_fetch_array($result10);
$nombresub=$resultado10['subcategoria'];
$idpcsubcat=$resultado10['idpcsubcat'];


echo "<tr class='subenc2'><td>Tipo de Lectura</td><td>";
echo $nombresub;
echo "</td></tr>";


if ($tipo=="anual"){;


echo "<tr class='subenc'><td>Punto de Lectura</td><td>Enero</td><td>Febrero</td><td>Marzo</td><td>Abril</td><td>Mayo</td><td>Junio</td><td>Julio</td><td>Agosto</td><td>Septiembre</td><td>Octubre</td><td>Noviembre</td><td>Diciembre</td></tr>";


$sql20="SELECT * from puntoslectura where idempresas='".$ide."' and idclientes='".$idclientes."'";
//echo $sql;
$result20=mysqli_query ($conn,$sql20) or die ("Invalid result20");
$row20=mysqli_num_rows($result20);

for ($i=0;$i<$row20;$i++){;
mysqli_data_seek($result20,$i);
$resultado20=mysqli_fetch_array($result20);
$nombrep=$resultado20['nombre'];
$idpuntoslectura=$resultado20['idpuntoslectura'];

echo "<td>";
echo $nombrep;
echo "</td>";


for($tj=1;$tj<13;$tj++){;
$fechaa=date("Y-m-d", mktime(0, 0, 0, $tj, 1, $y));
$fechab=date("Y-m-d", mktime(0, 0, 0, $tj+1, 0, $y));
$sql="SELECT * from almpc where idempresas='".$ide."' and idpiscina='".$idclientes."' and idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idpuntomed='".$idpuntoslectura."' and dia between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row25=mysqli_num_rows($result);
if($row25==0){;
$cantidad=0;
}else{;
$resultado=mysqli_fetch_array($result);
$cantidad=$resultado['cantidad'];
};

echo "<td>";
echo $cantidad;
echo "</td>";
};
echo "</tr>";

};

}else{;


echo "<tr class='subenc'><td>Punto de Lectura</td><td>Lectura</td></tr>";


$sql20="SELECT * from puntoslectura where idempresas='".$ide."' and idclientes='".$idclientes."'";
//echo $sql;
$result20=mysqli_query ($conn,$sql20) or die ("Invalid result20");
$row20=mysqli_num_rows($result20);

for ($i=0;$i<$row20;$i++){;
mysqli_data_seek($result20,$i);
$resultado20=mysqli_fetch_array($result20);
$nombrep=$resultado20['nombre'];
$idpuntoslectura=$resultado20['idpuntoslectura'];



$fechaa=date("Y-m-d", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y-m-d", mktime(0, 0, 0, $m+1, 0, $y));
$sql="SELECT * from almpc where idempresas='".$ide."' and idpiscina='".$idclientes."' and idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idpuntomed='".$idpuntoslectura."' and dia between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row25=mysqli_num_rows($result);

echo "<tr><td>";
echo $nombrep;
echo "</td></tr>";
for ($ty=0;$ty<$row25;$ty++){;
if($row25==0){;
$cantidad=0;
$diac=0;
$horac=0;
}else{;
mysqli_data_seek($result,$ty);
$resultado=mysqli_fetch_array($result);
$cantidad=$resultado['cantidad'];
$diac=$resultado['dia'];
$horac=$resultado['hora'];
};

echo "<tr><td>";
echo $cantidad;
echo "</td>";
echo "<td>";
echo $diac;
echo "</td>";
echo "<td>";
echo $horac;
echo "</td>";
echo "</tr>";
};

};


};



};
echo "</table>";
?>