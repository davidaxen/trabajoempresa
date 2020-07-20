<?php  
include('bbdd.php');

if ($ide!=null){;
 include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE COMPAÑIA ASEGURADORA</p></div>
<div class="contenido">
<?php 

$sql1="SELECT * from evento";
$sql1.=" where idempresa=:ide ";
$sql1.=" and idevento=:idevento ";
//echo $sql1;
$result=$conn->prepare($sql1);
$result->bindParam(':ide', $ide);
$result->bindParam(':idevento', $idevento);
$result->execute();
$resultado=$result->fetch();

/*$result=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado=mysqli_fetch_array($result);*/

$idevento=$resultado['idevento'];
$evento=$resultado['evento'];
$contacto=$resultado['contacto'];
$telefono=$resultado['telefono'];
$direccion=$resultado['direccion'];
$email=$resultado['email'];
$estado=$resultado['estado'];
$fcomienzo=$resultado['fcomienzo'];
$ffinal=$resultado['ffinal'];
$programa=$resultado['programa'];
?>

<form action="intro2.php" method="post" name=rgb>
<table>
<input type="hidden" name="tabla" value="modpuntconta">

<input type="hidden" name="idevento" value="<?php  echo $idevento;?>">
<input type="hidden" name="evento" value="<?php  echo $evento;?>">
<input type="hidden" name="pcontacto" value="<?php  echo $contacto;?>">
<input type="hidden" name="telcontacto" value="<?php  echo $telefono;?>">
<input type="hidden" name="dircontacto" value="<?php  echo $direccion;?>">
<input type="hidden" name="mailcontacto" value="<?php  echo $email;?>">
<input type="hidden" name="estado" value="<?php  echo $estado;?>">
<input type="hidden" name="fcomienzo" value="<?php  echo $fcomienzo;?>">
<input type="hidden" name="ffinal" value="<?php  echo $ffinal;?>">
<input type="hidden" name="programa" value="<?php  echo $programa;?>">

<tr><td>Evento</td><td><input type="text" name="evento1" value="<?php  echo $evento;?>"></td></tr>
<tr><td>Persona de Contacto</td><td><input type="text" name="pcontacto1" value="<?php  echo $contacto;?>"></td></tr>
<tr><td>Telefono</td><td><input type="text" name="telcontacto1" maxlength="9" value="<?php  echo $telefono;?>"></td></tr>
<tr><td>Direccion</td><td><input type="text" name="dircontacto1" value="<?php  echo $direccion;?>"></td></tr>
<tr><td>E-mail</td><td><input type="text" name="mailcontacto1" value="<?php  echo $email;?>"></td></tr>
<tr><td>Estado</td><td><select name="estado1"><option value="0" <?php  if ($estado==0){;?> selected <?php };?> >Baja<option value="1" <?php  if ($estado==1){;?> selected <?php };?>>Alta</select></td></tr>
<tr><td>Fecha Comienzo</td><td><input type="text" name="fcomienzo1" value="<?php  echo $fcomienzo;?>"></td></tr>
<tr><td>Fecha Fin</td><td><input type="text" name="ffinal1" value="<?php  echo $ffinal;?>"></td></tr>
<tr><td colspan="2">Programa</td></tr>
<tr colspan="2"><td><textarea name="programa1" cols="50" rows="10"><?php  echo $programa;?></textarea></td></tr>

<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>


</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>