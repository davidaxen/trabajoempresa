<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE CLIENTES</p></div>
<div class="contenido">

<?php 
$sql1="SELECT * from aseguradora";
$sql1.=" where idempresa='".$ide."' ";
$sql1.=" and idaseguradora='".$idaseguradora."' ";
//echo $sql1;
$result=$conn->query($sql1);
$resultado=$result->fetch();

/*$result=mysqli_query($conn,$sql1) or die ("Invalid result1");
$resultado=mysqli_fetch_array($result);*/

$idaseguradora=$resultado['idaseguradora'];
$aseguradora=$resultado['aseguradora'];
$contacto=$resultado['contacto'];
$telefono=$resultado['telefono'];
$direccion=$resultado['direccion'];
$email=$resultado['email'];
$estado=$resultado['estado'];
?>



<form action="intro2.php" method="post" name=rgb>
<table>
<input type="hidden" name="tabla" value="modpuntconta">

<input type="hidden" name="idaseguradora" value="<?php  echo $idaseguradora;?>">
<input type="hidden" name="aseguradora" value="<?php  echo $aseguradora;?>">
<input type="hidden" name="pcontacto" value="<?php  echo $contacto;?>">
<input type="hidden" name="telcontacto" value="<?php  echo $telefono;?>">
<input type="hidden" name="dircontacto" value="<?php  echo $direccion;?>">
<input type="hidden" name="mailcontacto" value="<?php  echo $email;?>">
<input type="hidden" name="estado" value="<?php  echo $estado;?>">

<tr><td>Compañia Aseguradora / Clientes</td><td><input type="text" name="aseguradora1" value="<?php  echo $aseguradora;?>"></td></tr>
<tr><td>Persona de Contacto</td><td><input type="text" name="pcontacto1" value="<?php  echo $contacto;?>"></td></tr>
<tr><td>Telefono</td><td><input type="text" name="telcontacto1" maxlength="9" value="<?php  echo $telefono;?>"></td></tr>
<tr><td>Direccion</td><td><input type="text" name="dircontacto1" value="<?php  echo $direccion;?>"></td></tr>
<tr><td>E-mail</td><td><input type="text" name="mailcontacto1" value="<?php  echo $email;?>"></td></tr><tr><td>Estado</td><td><select name="estado1"><option value="0" <?php  if ($estado==0){;?> selected <?php };?> >Baja<option value="1" <?php  if ($estado==1){;?> selected <?php };?>>Alta</select></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>