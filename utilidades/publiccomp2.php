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

$sql="SELECT * from presupuestocamp where idempresa='".$ide."' and campaña='".$id."'"; 
if ($num!=null){;
$sql.=" and destinatario='".$num."'";
};
$result=mysql_query ($sql) or die ("Invalid result0");
$row=mysql_affected_rows();
?>
<table>
<tr class="subenc">
<td>Nombre Adm</td>
<td>CP</td>
<td>Nombre Com</td>
<td>Direccion Com</td>
<td>Cp Com</td>
<td>Localidad Com</td>
<td>Email Com</td>
<td>Telefono Com</td>
<td>Fecha de Creación</td>
<td>Obs</td>
<td>Visualizar</td></tr>
<? for ($i=0; $i<$row; $i++){;?>
<?
$idadm=mysql_result($result,$i,'destinatario');
if ($idadm==0){;
$nombreadm="Particular";
$cpadm="0";
}else{;
$sqla="SELECT * from destinatario where id='".$idadm."'"; 
$resulta=mysql_query ($sqla) or die ("Invalid result0");
$nombreadm=mysql_result($resulta,0,'nombre');
$cpadm=mysql_result($resulta,0,'cp');
};
$nombrecom=mysql_result($result,$i,'nombre');
$direccioncom=mysql_result($result,$i,'direccion');
$cpcom=mysql_result($result,$i,'cp');
$localidadcom=mysql_result($result,$i,'localidad');
$fechacom=mysql_result($result,$i,'fecha');
$campañacom=mysql_result($result,$i,'campaña');
$email=mysql_result($result,$i,'email');
$telefono=mysql_result($result,$i,'telefono');
$obs=mysql_result($result,$i,'obs');
$idcom=mysql_result($result,$i,'id');

$sql1="select * from publi where id='".$campañacom."' and idempresa='".$ide."'";
$result1=mysql_query ($sql1) or die ("Invalid result 1");
$documentocom=mysql_result($result1,0,'documento');
?>




<tr class="menor1">
<td><?=$nombreadm;?></td>
<td><?=$cpadm;?></td>
<td><?=$nombrecom;?></td>
<td><?=$direccioncom;?></td>
<td><?=$cpcom;?></td>
<td><?=$localidadcom;?></td>
<td><?=$email;?></td>
<td><?=$telefono;?></td>
<td><?=$fechacom;?></td>
<td><?=$obs;?></td>
<td>
<?if ($idadm!=0){;?>
<a href="campa.php?dato=<?=$ide;?>&num=<?=$idcom;?>&dest=<?=$idadm;?>&fechaact=<?=$fechacom;?>&año"><img src="../img/ver.gif" border="0" alt="Visualizar" width=20></a>
<?};?>
</td>
</tr>
<?};?>
</table>


<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://facturacion.piscisol.com">aquí</a>

<?};?>
</body>
</html>