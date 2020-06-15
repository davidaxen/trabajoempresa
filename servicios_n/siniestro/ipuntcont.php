<?php  
include('bbdd.php');
if ($ide!=null){;
 include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ALTA DE ORDENES</p></div>
<div class="contenido">

<form action="intro2.php" method="post" name=rgb>
<table>
<input type="hidden" name="tabla" value="ipuntcont">

<tr><td>Numero de Siniestro</td><td><input type="text" name="numsiniestro"></td></tr>
<tr><td>Compañia de Seguros / Cliente</td><td><select name="idaseguradora">
<?php 
$sql="SELECT * from aseguradora where idempresa='".$ide."' and estado='1'"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$row2=mysqli_num_rows($result);

for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result, $t);
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['aseguradora'];
$idaseguradora=$resultado['idaseguradora'];
?><option value="<?php  echo $idaseguradora;?>"><?php  echo $nombre;?>
<?php };?>
</select></td></tr>
<tr><td>Persona de Contacto</td><td><input type="text" name="pcontacto"></td></tr>
<tr><td>Telefono</td><td><input type="text" name="telcontacto" maxlength="9"></td></tr>
<tr><td>Direccion</td><td><input type="text" name="dircontacto">Ej. Calle Nuria 87 1 A - Nombre de la calle num piso letra</td></tr>
<tr><td>Localidad</td><td><input type="text" name="loccontacto"></td></tr>
<tr><td>Provincia</td><td><input type="text" name="procontacto"></td></tr>
<tr><td>Codigo Postal</td><td><input type="text" name="cpcontacto" maxlength="5"></td></tr>
<tr><td>Dia Apertura</td><td><input type="text" name="d" size="2">-<input type="text" name="m" size="2">-<input type="text" name="y" size="4"></td></tr>
<tr><td>Hora Apertura</td><td><input type="text" name="hora" size="2">-<input type="text" name="min" size="2">-<input type="text" name="seg" size="2"></td></tr>
<tr><td>E-mail</td><td><input type="text" name="mailcontacto"></td></tr>
<tr><td colspan="2">Descripcion</td></tr>
<tr><td colspan="2"><textarea name="descripcion" cols="50" rows="8"></textarea></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>