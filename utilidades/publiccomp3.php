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
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">COMPROBACIÓN DE ENVIO DE CORREOS DE CAMPAÑAS</td></tr>

</table>



<?
if ($ide!=null){;

$sql="SELECT * from enviopubli where idempresa='".$ide."' and campaña='".$id."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
?>
<table>
<tr class="subenc"><td>Destinatario</td><td>Correo</td><td>Dia</td><td>Hora</td><td>Documento enviado</td><td>Personal</td><td>Mas información</td><td>Comprobrar respuestas</td></tr>
<? for ($i=0; $i<$row; $i++){;?>
<?
$destinatario=mysql_result($result,$i,'destinatario');
$correo=mysql_result($result,$i,'correo');
$diacamp=mysql_result($result,$i,'dia');
$horacamp=mysql_result($result,$i,'hora');
$tipo=mysql_result($result,$i,'tipo');
$personal=mysql_result($result,$i,'personal');
$idt=mysql_result($result,$i,'idref');
?>




<tr class="menor1">
<td><?switch ($destinatario){;
case "a": $dest="Administrador";break;
case "c": $dest="Comunidad";break;
};?>
<?=$dest;?></td>
<td><?=$correo;?></td>
<td><?=$diacamp;?></td>
<td><?=$horacamp;?></td>
<td><?=$tipo;?></td>
<td><?=$personal;?></td>
<td><a href="publidlis3.php?num=<?=$idt;?>&list=<?=$destinatario;?>"><img src="../img/modificar.gif" alt="mas info" border=0 width=20></a></td>
<td><a href="publiccomp2.php?num=<?=$idt;?>&camp=<?=$id;?>"><img src="../img/modificar.gif" alt="comprobar" border=0 width=20></a></td>
</tr>
<?};?>
</table>


<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://facturacion.piscisol.com">aquí</a>

<?};?>
</body>
</html>