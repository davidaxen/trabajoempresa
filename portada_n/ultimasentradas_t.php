<?php   
include('bbdd.php');

$fecha=$_GET["fecha"];

$año= strtok($fecha, '-');
$mes= strtok('-');
$dia= strtok('-');
$fechac=$dia.'/'.$mes.'/'.$año;
$fechac='20/08/2015';

$mesa=str_split($mes);
if ($mesa[0]==0){;
$mes=$mesa[1];
};
//dia='".$fechac."' and

$sql1="SELECT * from almpc where  idempresas='".$ide."' and idempleado='".$idtrab."' order by tiempo desc, hora desc limit 0,12"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_num_rows($result1);

$sql01="SELECT * from categorias where idpccat='".$idpccat."'"; 
$result01=mysqli_query ($conn,$sql01) or die ("Invalid result 1");
$resultado01=mysqli_fetch_array($result01);
$categoria=$resultado01['nombre'];



?>
<script>
function refrescar1()
{
	window.location.reload();
}
</script>
<style type="text/css" media="print">
.nover {display:none}
</style>

		<link rel="stylesheet" href="/estilo/estilonuevo.php" type="text/css" media="screen" charset="utf-8" >
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">

<body  onload="setTimeout('refrescar1()', 5000);">
<table>
<tr class="enctab"><td>Puesto de Trabajo</td><td>Empleado</td><td>Accion</td><td>Dia</td><td>Hora</td><td>Mapa</td><td>Datos</td></tr>

<?php 
for ($j=0;$j<$row1;$j++){;
mysqli_data_seek($result1,$j);
$resultado1=mysqli_fetch_array($result1);
$idempleado=$resultado1['idempleado'];
$idpiscina=$resultado1['idpiscina'];
$dia=$resultado1['dia'];
$hora=$resultado1['hora'];
$idpccat=$resultado1['idpccat'];
$idpcsubcat=$resultado1['idpcsubcat'];
$tiempo=$resultado1['tiempo'];
$lat=$resultado1['lat'];
$lon=$resultado1['lon'];
$cantidad=$resultado1['cantidad'];
$otro=$resultado1['otro'];

$sql12="SELECT * from puntservicios where idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idempresas='".$ide."'"; 
//echo $sql12;
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result 10");
$resultado12=mysqli_fetch_array($result12);
$subcategoria=$resultado12['subcategoria'];


$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$resultado10=mysqli_fetch_array($result10);
$nombre=$resultado10['nombre'];
$priape=$resultado10['1apellido'];
$segape=$resultado10['2apellido'];
$tele1=$resultado10['tele1'];
$tele2=$resultado10['tele2'];
$nombretrab=$nombre.' '.$priape.' '.$segape;

$sql11="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$ide."'"; 
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$resultado11=mysqli_fetch_array($result11);
$nombrecom=$resultado11['nombre'];
if ($idpiscina==1){;
$nombrecom="Teletrabajo";
};

$f=fmod($j,2);
?>
<?php if ($f==0){;?>
<tr class="dattab3">
<?php }else{;?>
<tr class="dattab">
<?php };?>

<td><?php  echo strtoupper($nombrecom);?></td>
<td><?php  echo strtoupper($nombretrab);?></td>
<td><?php  echo strtoupper($subcategoria);?></td>
<td><?php  echo strtoupper($dia);?></td>
<td><?php  echo strtoupper($hora);?></td>

<td><a href="mapa.php?lon=<?php  echo $lon;?>&lat=<?php  echo $lat;?>&nombrecom=<?php  echo $nombrecom;?>&nombretrab=<?php  echo $nombretrab;?>" target="_parent"><img src="../img/modificar.gif" width="25px"></a>
</td>
<td><?php if($cantidad!=0){;?><?php  echo strtoupper($cantidad);?><?php };?></td>
</tr>
<?php };?>
</table>
</body>
