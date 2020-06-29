<?php  
include('bbdd.php');
if ($ide!=null){;

include('../../portada_n/cabecera3.php');

include('combo.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MENSAJES <?php  echo strtoupper($nc);?> A EMPLEADOS</p></div>
<div class="contenido">


<?php if ($estado==null){;?>

<form action="infpuntcont.php" method="post">
<table>
<tr><td>Estado</td><td><select name="estado">
<option value="1">Alta
<option value="0">Baja
</select></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php }else{;?>

<form action="infpuntcontl.php" method="post">
<table>
<tr><td>Nombre del Empleado</td><td>


<?php 
$sql="SELECT * from empleados where idempresa='".$ide."' and estado='".$estado."'"; 
if ($idtrab!=0){;
$sql.=" and idempleado='".$idtrab."'";
};

$result=$conn->query($sql);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//$row=mysqli_num_rows($result);
?>

<?php  if ($idtrab==0){;?>
<select name="idempl" id="combobox">
<option value=""></option>
<?php 

foreach ($result as $row) {
	$idempleado=$row['idempleado'];
	$nombre=$row['nombre'];
	$apellidop=$row['1apellido'];
	$apellidos=$row['2apellido'];	

$nombret=$nombre.' '.$apellidop.' '.$apellidos;
//for ($i=0;$i<$row;$i++){;
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
//$idempleado=$resultado['idempleado'];
//$nombre=$resultado['nombre'];
//$apellidop=$resultado['1apellido'];
//$apellidos=$resultado['2apellido'];
?>
<option value="<?php  echo $idempleado;?>"><?php  echo $nombret;?>
<?php };?>
</select>
<?php  }else{;
$resultado=$result->fetch();
//$resultado=mysqli_fetch_array($result);
$idempleado=$resultado['idempleado'];
$nombre=$resultado['nombre'];
$apellidop=$resultado['1apellido'];
$apellidos=$resultado['2apellido'];
$nombret=$nombre.' '.$apellidop.' '.$apellidos;
?>
<input type="hidden" name="idempl" value="<?php  echo $idempleado;?>"><?php  echo strtoupper($nombret);?>


<?php };?>
</td></tr>
<tr><td>Tipo de Informe</td><td><select name="tipo">
<option value="anual">Anual
<option value="mes">Mensual
<!--<option value="dia">Diario-->
</select></td></tr>
<tr><td>Fecha</td><td><!--<input type="number" name="d" maxlength=2 size=3>/-->

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


</div>
</div>

<?php };?>

<?php } else {;
include ('../../cierre.php');
 };?>