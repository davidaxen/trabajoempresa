<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');
include('combo.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">
<form action="infpuntcontl.php" method="post">
<table>
<tr><td>Datos del Cliente</td><td>

<?php 
$sql="SELECT * from clientes where idempresas='".$ide."'"; 
$sql.=" and mediciones='1'";

$result=$conn->query($sql);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//$row=mysqli_num_rows($result);
?>
<select name="idclientes" id="combobox">
<option value=""></option>
<?php 

foreach ($result as $row) {
	$idclientes=$row['idclientes'];
	$nombre=$row['nombre'];
//for ($i=0;$i<$row;$i++){;
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
//$idclientes=$resultado['idclientes'];
//$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
//$nombre=$resultado['nombre'];
?>
<option value="<?php  echo $idclientes;?>"><?php  echo $nombre;?>
<?php };?>
</select></td></tr>
<tr><td>Tipo de Informe</td><td><select name="tipo">
<option value="mes">Mensual
<option value="anual">Anual
</select></td></tr>
<tr><td>Fecha</td><td>
<!--<input type="number" name="d" maxlength=2 size=3>/-->

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