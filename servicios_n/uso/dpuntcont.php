<html>
<head>
<title>Envio de Alarma</title>
<link rel="stylesheet" href="../../estilo/estilo.css">
</head>
<?php  
include('bbdd.php');
?>

<body>
<table>
<tr><td rowspan="2"><img src="../../img/<?php  echo $img;?>" height=80></td><td class="enc">ENVIO DE ALARMA</td></tr>
</table>

<form action="intro2.php" method="post">
<table>
<tr><td>Datos del Puesto de Trabajo</td><td>


<?php 
$sql="SELECT * from clientes where idempresas='".$ide."'"; 
$sql.=" and alarmas='1'";
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
?>
<select name="idclientes">
<?php for ($i=0;$i<$row;$i++){;
$idclientes=mysql_result($result,$i,'idclientes');
//$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
//$result1=mysql_query ($sql1) or die ("Invalid result");
$nombre=mysql_result($result,$i,'nombre');
?>
<option value="<?php  echo $idclientes;?>"><?php  echo $nombre;?>
<?php };?>
</select></td></tr>

<tr><td>Fecha</td>
<td>
<input type="number" name="d" maxlength=2 size=3>/

<select name="m">
<option value="1">Enero
<option value="2">Febrero
<option value="3">Marzo
<option value="4">Abril
<option value="5">Mayo
<option value="6">Junio
<option value="7">Julio
<option value="8">Agosto
<option value="9">Septiembre
<option value="10">Octubre
<option value="11">Noviembre
<option value="12">Diciembre
</select>

/<input type="number" name="y" maxlength=4 size=5 value="<?php  echo date("Y",time());?>"></td></tr>
<tr><td>Hora</td>
<td>
<input type="number" name="h" maxlength=2 size=3>:<input type="number" name="min" maxlength=2 size=3>
:<input type="number" name="seg" maxlength=2 size=3></td></tr>
<tr><td colspan="2">Observaciones</td></tr>
<tr><td colspan="2"><textarea cols="100" rows="10" name="texto"></textarea></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>








