<?php  
include('bbdd.php');
if ($ide!=null){;
 include('../../portada_n/cabecera3.php');
 include('combo.php');?>
<div id="main">
<div class="titulo">
<p class="enc">INFORME DE RUTAS</p></div>
<div class="contenido">

<form action="infpuntcontl.php" method="post">
<table>
<tr><td>Datos del Puesto de Trabajo</td><td>


<?php 
$sql="SELECT * from ruta where idempresas=:ide";

$result=$conn->prepare($sql);
$result->bindParam(':ide',$ide);
$result->execute();

$resultmos=$conn->prepare($sql);
$resultmos->bindParam(':ide',$ide);
$resultmos->execute();

$resultado=$result->fetch();

//$result=$conn->query($sql);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//$row=mysqli_num_rows($result);
?>
<select name="idruta" id="combobox">
<option value=""></option>
<?php 

foreach ($resultmos as $row) {
	$idruta=$row['idruta'];
	$nombre=$row['nombreruta'];	

//for ($i=0;$i<$row;$i++){;
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
//$idruta=$resultado['idruta'];
//$nombre=$resultado['nombreruta'];
?>
<option value="<?php  echo $idruta;?>"><?php  echo $nombre;?>
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


</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>