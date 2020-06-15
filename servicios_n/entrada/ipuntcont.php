<html>
<head>
<title>Creacion de Puntos Entrada / Salida</title>
<link rel="stylesheet" href="../../estilo/estilo.css">
</head>
<?php  
include('bbdd.php');
?>

<body>
<table>
<tr><td rowspan="2"><img src="../../img/<?php  echo $img;?>" height=80></td><td class="enc">CREACION DE PUNTOS ENTRADA / SALIDA</td></tr>
</table>


<form action="intro2.php" method="post">
<table>
<tr><td>Nombre del Puesto de Trabajo</td><td>
<input type="hidden" name="tabla" value="ipuntcont">
<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and entrada='1' and estado='1'"; 
$result=mysqli_query ($conn,$conn,$conn,$sql) or die ("Invalid result");
$row=mysqli_affected_rows();?>
<select name="idclientes">
<?php for ($i;$i<$row;$i++){;
$idclientes=mysqli_result($result,$i,'idclientes');
$nombre=mysqli_result($result,$i,'nombre');

$sql2="SELECT * from codservicios where idempresas='".$ide."' and idclientes='".$idclientes."' and idpccat='1'"; 
$result2=mysqli_query ($conn,$conn,$conn,$sql2) or die ("Invalid result");
$row2=mysqli_affected_rows();
?>
<?php if ($row2==0){;?><option value="<?php  echo $idclientes;?>"><?php  echo $nombre;?><?php };?>
<?php };?>
</select></td></tr>

<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>




