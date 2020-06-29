<html>
<head>
<title>Listado de Clientes</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('../bbdd/sqlfacturacion.php');
?>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">COMPROBACIÓN DE CAMPAÑAS</td></tr>

</table>



<?
if ($ide!=null){;

$sql="SELECT * from presupuestocamp,destinatario where presupuestocamp.destinatario=destinatario.id and presupuestocamp.idempresa='".$ide."' and presupuestocamp.id='".$num."'"; 
$result=mysql_query ($sql) or die ("Invalid result0");
$row=mysql_affected_rows();
?>
<table>
<tr class="subenc"><td>Nombre Adm</td><td>Email - Telefono</td><td>Nombre Com</td><td>Direccion Com</td>
<td>Cp Com</td><td>Localidad Com</td><td>Fecha de Creación</td><td>Observaciones</td></tr>
<? for ($i=0; $i<$row; $i++){;?>
<?
//$idadm=mysql_result($result,$i,'destinatario.id');
$nombreadm=mysql_result($result,$i,'destinatario.nombre');
$email1=mysql_result($result,$i,'destinatario.email1');
$tele1=mysql_result($result,$i,'destinatario.tele1');
$nombrecom=mysql_result($result,$i,'presupuestocamp.nombre');
$direccioncom=mysql_result($result,$i,'presupuestocamp.direccion');
$cpcom=mysql_result($result,$i,'presupuestocamp.cp');
$localidadcom=mysql_result($result,$i,'presupuestocamp.localidad');
$fechacom=mysql_result($result,$i,'presupuestocamp.fecha');
$campañacom=mysql_result($result,$i,'presupuestocamp.campaña');
$idcom=mysql_result($result,$i,'presupuestocamp.id');
$obs=mysql_result($result,$i,'obs');


$sql1="select * from publi where id='".$campañacom."' and idempresa='".$ide."'";
$result1=mysql_query ($sql1) or die ("Invalid result 1");
$documentocom=mysql_result($result1,0,'documento');
?>




<tr class="menor1">
<td><?=$nombreadm;?></td>
<td><?=$email1;?>-<?=$tele1;?></td>
<td><?=$nombrecom;?></td>
<td><?=$direccioncom;?></td>
<td><?=$cpcom;?></td>
<td><?=$localidadcom;?></td>
<td><?=$fechacom;?></td>
<td><?=$obs;?></td>
</tr>
<?};?>
</table>
<table>
<tr><td colspan="2">
<img alt="volver" border="0" src="../img/arrow_cycle.png" onclick="history.back()"></td></tr>
</table></table>

<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://facturacion.piscisol.com">aquí</a>

<?};?>
</body>
</html>