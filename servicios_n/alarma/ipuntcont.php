<?php  
include('bbdd.php');
if ($ide!=null){;
 include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ENVIO DE ALARMA</p></div>
<div class="contenido">
<form action="intro2.php" method="post">
<input type="hidden" name="tabla" value="alta">
<table>
<tr><td>Datos del Puesto de Trabajo</td><td>


<?php 
$sql="SELECT * from clientes where idempresas='".$ide."'"; 
$sql.=" and alarma='1'";
//echo $sql;
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
?>
<select name="idclientes">
<?php 
/*for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);*/

foreach ($result as $rowmos) {
$idclientes=$rowmos['idclientes'];
$nombre=$rowmos['nombre'];
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

</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>