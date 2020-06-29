<html>
<head>
<title>Informe de Alarmas</title>
<link rel="stylesheet" href="../../estilo/estilo.css">
</head>
<?php  
include('bbdd.php');
?>

<body>
<table>
<tr><td rowspan="2"><img src="../../img/<?php  echo $img;?>" height=80></td><td class="enc">INFORME DE USO</td></tr>
</table>

<?php if ($estado==null){;?>
<form action="infpuntcont.php" method="post">
<table>
<tr><td>Estado</td><td><select name="estado">
<option value="1">Alta
<option value="0">Baja
</select>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>
<?php }else{;?>


<form action="infpuntcontl.php" method="post">
<table>
<tr><td>Datos del Trabajador</td><td>


<?php 
$sql="SELECT * from empleados where idempresa='".$ide."' and estado='".$estado."'"; 
/*$sql.=" and estado='1'";*/
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
?>
<select name="idempleado">
<?php for ($i=0;$i<$row;$i++){;
$idempleado=mysql_result($result,$i,'idempleado');
$nombre=mysql_result($result,$i,'nombre');
$priape=mysql_result($result,$i,'1apellido');
$segape=mysql_result($result,$i,'2apellido');
?>
<option value="<?php  echo $idempleado;?>"><?php  echo $nombre;?>, <?php  echo $priape;?> <?php  echo $segape;?>
<?php };?>
</select></td></tr>
<tr><td>Tipo de Informe</td><td><select name="tipo">
<option value="mes">Mensual
<option value="anual">Anual
</select></td></tr>
<tr><td>Fecha</td><td>

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
<?php };?>







