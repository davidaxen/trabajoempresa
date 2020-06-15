<html>
<head>
<title>Visualización de cuentas anuales de comunidades</title>
<link rel="stylesheet" href="../../estilo/estilo.css">

</head>
<?php  
include('bbdd.php');
?>
<body>
<table>
<tr><td rowspan="2"><img src="../../img/<?php  echo $img;?>" height="80"></td><td class="enc">INTRODUCCION DE DATOS</td></tr>
</table>


<?php 

if ($tabla=="cuadrante"){;

for($j=1;$j<$dias+1;$j++){;
if ($empleados[$j]<>' '){;
$sql0="insert into cuadrante (fecha,turno,horas,idcomunidad,idempleado,idempresas,mes,año,horario) values";
$sql1="('$fecha[$j]','$turno','$horas','$idcomunidad','$empleados[$j]','$ide','$mes','$año','$horario[$j]')";
$sql=$sql0.$sql1;
//echo $sql;
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result");
};
};
};


if ($tabla=="mcuadrante"){;
if ($nueempleados=="b"){;
$sql="delete from cuadrante where fecha='".$fecha."' and idcomunidad='".$idcomunidad."' and turno='".$turno."' and idempleado='".$antempleado."'";
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result");
}else{;
$sql0="update cuadrante set ";
$sql1="where fecha='".$fecha."' and idcomunidad='".$idcomunidad."' and turno='".$turno."'";
if ($nueempleados!=$antempleado){;
$sqla="idempleado='".$nueempleados."' ";
$sql=$sql0.$sqla.$sql1;
};
if ($nuehoras!=$anthoras){;
$sqla="horas='".$nuehoras."' ";
$sql=$sql0.$sqla.$sql1;
};
if ($nuevisita!=$antvisita){;
$sqla="visita='".$nuevisita."' ";
$sql=$sql0.$sqla.$sql1;
};
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result");
//};
};
};
?>



LOS DATOS HAN SIDO INTRODUCCIDOS<p>

<?php  switch($tabla){
case icomunidad: echo "<a href='idivision.php?idc=$idc'>Introducir las divisiones</a><p>";break;
case iasientos: echo "<a href='iasientos.php?idc=$idc'>Introducir nuevos asientos de la misma comunidad</a><p><a href='iasientos.php'>Introducir nuevos asientos</a><p>";break;
case idivision: echo "<a href='ivecinos.php?idc=$idc'>Introducir los vecinos</a><p>";break;
case ivecinos: echo "<a href='icoeficientes.php?idc=$idc'>Introducir los coeficientes</a><p>";break;
case irecibos: echo "<a href='irecibos.php'>Introducir nuevos recibos</a><p>";break;
case icoeficientes: echo "<a href='ipresupuestos.php?idc=$idc'>Introducir los presupuestos</a><p>";break;
case ipresupuestos: echo "<a href='icuotas.php?idc=$idc'>Calcular las cuotas</a><p>";break;
case iactas: echo "<a href='iactas.php'>Introducir nuevas actas</a><p>";break;
case iproveedores: echo "<a href='iproveedores.php'>Introducir nuevos proveedores</a><p>";break;
case igestiones: echo "<a href='iacciones.php?idg=$idg'>Introducir las acciones</a><p>";break;
case icarnet: echo "<a href='icarnetvec.php'>Introducir las datos de vecinos</a><p>";break;

};

?>

<a href="/inicio_n.php" target="_parent">Volver a menu</a>
</body>
</html>