<?php  
include('bbdd.php');

if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ALTA DE EVENTOS</p></div>
<div class="contenido">

<form action="intro2.php" method="post" name=rgb>
<table>
<input type="hidden" name="tabla" value="ipuntconta">

<tr><td>Evento</td><td><input type="text" name="evento"></td></tr>
<tr><td>Persona de Contacto</td><td><input type="text" name="pcontacto"></td></tr>
<tr><td>Telefono</td><td><input type="text" name="telcontacto" maxlength="9"></td></tr>
<tr><td>Direccion</td><td><input type="text" name="dircontacto"></td></tr>
<tr><td>E-mail</td><td><input type="text" name="mailcontacto"></td></tr>
<!--<tr><td>Estado</td><td><select name="estado"><option value="0">Baja<option value="1">Alta</select></td></tr>-->
<tr><td>Fecha Comienzo</td><td><input type="text" name="dcomienzo" size="2" maxlength="2">-<input type="text" name="mcomienzo" size="2" maxlength="2">-<input type="text" name="acomienzo" size="4" maxlength="4"></td></tr>
<tr><td>Fecha Finalización</td><td><input type="text" name="dfinal" size="2" maxlength="2">-<input type="text" name="mfinal" size="2" maxlength="2">-<input type="text" name="afinal" size="4" maxlength="4"></td></tr>
<tr><td colspan="2">Programa</td></tr>
<tr><td colspan="2"><textarea name="programa" cols="50" rows="10"></textarea></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>
