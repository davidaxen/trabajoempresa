<html>
<head>
<title>Ver Notas</title>
<link rel="stylesheet" href="../estilo/estilo.css">
<link rel="stylesheet" href="../estilo/estilo2.css">
</head>
<?php 
include('../bbdd/sqlfacturacion.php');
?>

<?if ($enviar!='enviar'){;?>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">VER NOTAS DEL DIA <br><?=strtoupper($diab);?></td></tr>
</table>
<table>
<form action="notastotales.php" method="post" enctype="multipart/form-data">
<?
$fechaa=date("Y-m-d",time());
?>
<tr><td>Fecha de notas</td><td><input type="text" name="diab" value="<?=$fechaa;?>"> ej. aaaa-mm-dd</td></tr>

<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>

<?}else{;?>
<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">VER NOTAS DEL DIA <br><?=strtoupper($diab);?></td></tr>
</table>

<table>
<TR><TD class="enc2">INFORMACION SOBRE LOS ENVIOS REALIZADOS</TD></TR>
</table>
<table>
<?
$sql10="SELECT * from enviopubli where idempresa='".$ide."' and dia='".$diab."'";
$result10=mysql_query ($sql10) or die ("Invalid result");
$row10=mysql_affected_rows();
?>

<tr class="subenc22">
<td colspan="6">Total de envios: <?=$row10;?></td>
</tr>

<tr class="subenc22">
<td>Destinatario</td>
<td>Campaña</td>
<td>Día</td>
<td>Hora</td>
<td>Documento Enviado</td>
<td>Personal</td>
</tr>
<?
for ($i=0;$i<$row10;$i++){;
$camp=mysql_result($result10,$i,'campaña');
$sql11="SELECT * from publi where idempresa='".$ide."' and id='".$camp."'"; 
$result11=mysql_query ($sql11) or die ("Invalid result 11");

$list=mysql_result($result10,$i,'destinatario');
$idref=mysql_result($result10,$i,'idref');

if ($list=='a'){;
$sql="SELECT * from destinatario"; 
};
if ($list=='c'){;
$sql="SELECT * from propuestas"; 
};
if ($list=='e'){;
$sql="SELECT * from empresaspub"; 
};

$sql.=" where id='".$idref."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$nombre=mysql_result($result,0,'nombre');
?>


<tr>
<td><?=$nombre;?></td>
<td><?$nomcamp=mysql_result($result11,0,'titulo');?><?=$nomcamp;?></td>
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

<?
$sql10="SELECT * from notas where idempresa='".$ide."' and dia='".$diab."'"; 
$result10=mysql_query ($sql10) or die ("Invalid result");
$row10=mysql_affected_rows();
?>
<table>
<tr class="subenc22">
<td colspan="6">Total de notas: <?=$row10;?></td>
</tr>


<tr class="subenc22">
<td>Destinatario</td>
<td>Campaña</td>
<td>Día</td>
<td>Hora</td>
<td>Personal</td>
<td>Observaciones</td>
</tr>


<?
for ($i=0;$i<$row10;$i++){;
$camp=mysql_result($result10,$i,'idcampaña');
$sql11="SELECT * from publi where idempresa='".$ide."' and id='".$camp."'"; 
$result11=mysql_query ($sql11) or die ("Invalid result 11");

$list=mysql_result($result10,$i,'destinatario');
$idref=mysql_result($result10,$i,'idref');


if ($list=='a'){;
$sql="SELECT * from destinatario"; 
};
if ($list=='c'){;
$sql="SELECT * from propuestas"; 
};
if ($list=='e'){;
$sql="SELECT * from empresaspub"; 
};

$sql.=" where id='".$idref."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$nombre=mysql_result($result,0,'nombre');

?>
<tr>
<td><?=$nombre;?></td>
<td><?$nomcam=mysql_result($result11,0,'titulo');?><?=$nomcam;?></td>
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
<?
$sql10="SELECT * from reunion where idempresa='".$ide."' and dia='".$diab."'"; 
$result10=mysql_query ($sql10) or die ("Invalid result");
$row10=mysql_affected_rows();
?>
<table>
<tr class="subenc22">
<td colspan="6">Total de reuniones:  <?=$row10;?></td>
</tr>


<tr class="subenc22">
<td>Destinatario</td>
<td>Campaña</td>
<td>Día</td>
<td>Hora</td>
<td>Personal</td>
<td>Observaciones</td>
</tr>


<?
for ($i=0;$i<$row10;$i++){;
$camp=mysql_result($result10,$i,'idcampaña');
$sql11="SELECT * from publi where idempresa='".$ide."' and id='".$camp."'"; 
$result11=mysql_query ($sql11) or die ("Invalid result 11");


$list=mysql_result($result10,$i,'destinatario');
$idref=mysql_result($result10,$i,'idref');


if ($list=='a'){;
$sql="SELECT * from destinatario"; 
};
if ($list=='c'){;
$sql="SELECT * from propuestas"; 
};
if ($list=='e'){;
$sql="SELECT * from empresaspub"; 
};

$sql.=" where id='".$idref."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$nombre=mysql_result($result,0,'nombre');

?>
<tr>
<td><?=$nombre;?></td>
<td><?$nomcam=mysql_result($result11,0,'titulo');?><?=$nomcam;?></td>
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

<?};?>