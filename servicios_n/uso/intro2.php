<html>
<head>
<title>Introduccion de datos</title>
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
$dia=$y.'-'.$m.'-'.$d;

$sql1 = "INSERT INTO alarma (idempresas,idclientes,dia,d,m,y,h,min,seg,user,respondido,mensaje) 
VALUES ('$ide','$idclientes','$dia','$d','$m','$y','$h','$min','$seg','$user','0','$texto')";
//echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result ipuntcont");


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