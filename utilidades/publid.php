<html>
<head>
<title>Acciones de Publicidad</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('../bbdd/sqlfacturacion.php');
?>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">ACCIONES CON DESTINATARIOS DE LA PUBLICIDAD O PRESUPUESTOS</td></tr>

</table>
<table>
<tr><td class="subenc3">ADMINISTADORES DE FINCAS</td></tr>
<tr><td><a href="publidalta.php?list=a">Alta de Destinatarios</a></td></tr>
<tr><td><a href="publidmod.php?list=a">Modificación de Destinatarios</a></td></tr>
<tr><td><a href="publidlis.php?list=a">Listado de Destinatarios</a></td></tr>
<tr><td class="subenc3">COMUNIDADES DE VECINOS</td></tr>
<tr><td><a href="publidalta.php?list=c">Alta de Destinatarios</a></td></tr>
<tr><td><a href="publidmod.php?list=c">Modificación de Destinatarios</a></td></tr>
<tr><td><a href="publidlis.php?list=c">Listado de Destinatarios</a></td></tr>
<tr><td class="subenc3">EMPRESAS</td></tr>
<tr><td><a href="publidalta.php?list=e">Alta de Destinatarios</a></td></tr>
<tr><td><a href="publidmod.php?list=e">Modificación de Destinatarios</a></td></tr>
<tr><td><a href="publidlis.php?list=e">Listado de Destinatarios</a></td></tr>
<tr><td class="subenc3">CALLEJERO</td></tr>
<tr><td><a href="publidalta.php?list=f">Alta de Destinatarios</a></td></tr>
<tr><td><a href="publidmod.php?list=f">Modificación de Destinatarios</a></td></tr>
<tr><td><a href="publidlis.php?list=f">Listado de Destinatarios</a></td></tr>
</table>

