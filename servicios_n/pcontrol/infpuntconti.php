<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');
include('combo.php');

if (isset($_COOKIE['clivp'])) {
	$clivp = $_REQUEST['clivp'];
}else{
	$clivp = 'hola';
}

?>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE INCIDENCIAS EN <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<form action="infpuntcontli.php" method="post">
<table>
<tr><td>Datos de la Comunidad</td><td>


<?php 
if ($clivp==null){;
$sql="SELECT DISTINCT (idclientes) from puntcont where idempresas='".$ide."'"; 
}else{;
$sql="SELECT DISTINCT (idclientes) from puntcont where idempresas='".$ide."' and idclientes='".$clivp."'";
};
//echo $sql;

$result=$conn->query($sql);
$resultado=$result->fetch();

//$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//$row=mysqli_num_rows($result);
?>
<select name="idclientes" id="combobox">
<option value=""></option>
<?php 

foreach ($result as $row) {
	$idclientes=$row['idclientes'];
//for ($i=0;$i<$row;$i++){;
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
//$idclientes=$resultado['idclientes'];
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 

$result1=$conn->query($sql1);
$resultado1=$result1->fetch();
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
//$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
?>
<option value="<?php  echo $idclientes;?>"><?php  echo $nombre;?>
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