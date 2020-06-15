<html>
<head>
<title>Informe Puntos de Control</title>
<link rel="stylesheet" href="../../estilo/estilo.css">
</head>
<?php  
include('bbdd.php');
?>

<body>
<table>
<tr><td rowspan="2"><img src="../../img/<?php  echo $img;?>" height=80></td><td class="enc">INFORME DE ENTRADA / SALIDA</td></tr>
</table>

<form action="infpuntcontlemp.php" method="post">
<table>
<tr><td>Datos del Puesto de Trabajo</td><td>


<?php 
$sql="SELECT * from empleados where idempresa='".$ide."'"; 
$result=mysqli_query ($conn,$conn,$conn,$sql) or die ("Invalid result");
$row=mysqli_affected_rows();
?>
<select name="idempleado">

<?php for ($i=0;$i<$row;$i++){;
$idempleado=mysqli_result($result,$i,'idempleado');
//$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
//$result1=mysqli_query ($conn,$conn,$conn,$sql1) or die ("Invalid result");
$nombre=mysqli_result($result,$i,'nombre');
$papellido=mysqli_result($result,$i,'1apellido');
$sapellido=mysqli_result($result,$i,'2apellido');
?>
<option value="<?php  echo $idempleado;?>"><?php  echo $nombre;?>, <?php  echo $papellido;?> <?php  echo $sapellido;?>
<?php };?>
</select></td></tr>
<tr><td>Tipo de Informe</td><td><select name="tipo">
<option value="mes">Mensual
<option value="dia">Diario
</select></td></tr>
<tr><td>Fecha</td><td><input type="number" name="d" maxlength=2 size=3>/

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
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>








