<html>
<head>
<title>Introducción de Empleados</title>
<link rel="stylesheet" href="../estilo/estilo.css">
<link rel="stylesheet" href="../estilo/estilo2.css">
</head>
<?php 
include('../bbdd/sqlfacturacion.php');
?>
<?
if ($list=='a'){;
$sql="SELECT * from destinatario"; 
};
if ($list=='c'){;
$sql="SELECT * from propuestas"; 
};
if ($list=='e'){;
$sql="SELECT * from empresaspub"; 
};

$sql.=" where id='".$id."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$nombre=mysql_result($result,0,'nombre');
?>
<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">VER NOTAS DE <br><?=strtoupper($nombre);?></td></tr>
</table>

<table>
<TR><TD class="enc2">INFORMACION SOBRE LOS ENVIOS REALIZADOS</TD></TR>
</table>
<table>
<tr class="subenc22">
<td>Campaña</td>
<td>Día</td>
<td>Hora</td>
<td>Documento Enviado</td>
<td>Personal</td>
</tr>
<?
$sql10="SELECT * from enviopubli where idempresa='".$ide."' and destinatario='".$list."' and idref='".$id."'"; 
$result10=mysql_query ($sql10) or die ("Invalid result");
$row10=mysql_affected_rows();

for ($i=0;$i<$row10;$i++){;
$camp=mysql_result($result10,$i,'campaña');
$sql11="SELECT * from publi where idempresa='".$ide."' and id='".$camp."'"; 
$result11=mysql_query ($sql11) or die ("Invalid result 11");
?>
<tr>
<td><?$nombre=mysql_result($result11,0,'titulo');?><?=$nombre;?></td>
<td><?$dia=mysql_result($result10,$i,'dia');?><?=$dia;?></td>
<td><?$hora=mysql_result($result10,$i,'hora');?><?=$hora;?></td>
<td><?$tipo=mysql_result($result10,$i,'tipo');?><?=$tipo;?></td>
<td><?$personal=mysql_result($result10,$i,'personal');?><?=$personal;?></td>
</tr>
<?}?>
</table>


<p>
<table>
<TR><TD class="enc2">INFORMACION SOBRE NOTAS REALIZADAS</TD></TR>
</table>
<table>
<tr class="subenc22">
<td>Campaña</td>
<td>Día</td>
<td>Hora</td>
<td>Personal</td>
<td>Observaciones</td>
</tr>
<?
$sql10="SELECT * from notas where idempresa='".$ide."' and destinatario='".$list."' and idref='".$id."'"; 
$result10=mysql_query ($sql10) or die ("Invalid result");
$row10=mysql_affected_rows();

for ($i=0;$i<$row10;$i++){;
$camp=mysql_result($result10,$i,'idcampaña');
$sql11="SELECT * from publi where idempresa='".$ide."' and id='".$camp."'"; 
$result11=mysql_query ($sql11) or die ("Invalid result 11");
?>
<tr>
<td><?$nombre=mysql_result($result11,0,'titulo');?><?=$nombre;?></td>
<td><?$dia=mysql_result($result10,$i,'dia');?><?=$dia;?></td>
<td><?$hora=mysql_result($result10,$i,'hora');?><?=$hora;?></td>
<td><?$personal=mysql_result($result10,$i,'personal');?><?=$personal;?></td>
<td><?$obs=mysql_result($result10,$i,'observaciones');?><textarea cols="50" rows="3"><?=$obs;?></textarea></td>
<?
$estado=mysql_result($result10,$i,'estado');
switch($estado){;
case 1: $estadolla="disco-rojo.png";break;
case 2: $estadolla="disco-naranja.png";break;
case 3: $estadolla="disco-amarillo.png";break;
case 4: $estadolla="disco-verde.png";break;
case 5: $estadolla="disco-azul.png";break;
};
?>
<td width="25"><img src="../img/<?=$estadolla;?>" width="25" ><td>
</tr>
<?}?>
</table>

<p>

<table>
<TR><TD class="enc2">INFORMACION SOBRE REUNIONES PROGRAMADAS</TD></TR>
</table>
<table>
<tr class="subenc22">
<td>Campaña</td>
<td>Día</td>
<td>Hora</td>
<td>Personal</td>
<td>Observaciones</td>
</tr>
<?
$sql10="SELECT * from reunion where idempresa='".$ide."' and destinatario='".$list."' and idref='".$id."'"; 
$result10=mysql_query ($sql10) or die ("Invalid result");
$row10=mysql_affected_rows();

for ($i=0;$i<$row10;$i++){;
$camp=mysql_result($result10,$i,'idcampaña');
$sql11="SELECT * from publi where idempresa='".$ide."' and id='".$camp."'"; 
$result11=mysql_query ($sql11) or die ("Invalid result 11");
?>
<tr>
<td><?$nombre=mysql_result($result11,0,'titulo');?><?=$nombre;?></td>
<td><?$dia=mysql_result($result10,$i,'dia');?><?=$dia;?></td>
<td><?$hora=mysql_result($result10,$i,'hora');?><?=$hora;?></td>
<td><?$personal=mysql_result($result10,$i,'personal');?><?=$personal;?></td>
<td><?$obs=mysql_result($result10,$i,'observaciones');?><textarea cols="50" rows="3"><?=$obs;?></textarea></td>
<?
$estado=mysql_result($result10,$i,'estado');
switch($estado){;
case 1: $estadolla="disco-rojo.png";break;
case 2: $estadolla="disco-naranja.png";break;
case 3: $estadolla="disco-amarillo.png";break;
case 4: $estadolla="disco-verde.png";break;
case 5: $estadolla="disco-azul.png";break;
};
?>
<td width="25"><img src="../img/<?=$estadolla;?>" width="25" ><td>
</tr>
<?}?>
</table></p>