<?php 
include('bbdd.php');
?>
<?if ($ide!=null){;?>
<? include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ALTA DE CLIENTES</p></div>
<div class="contenido">

<form action="intro2.php" method="post" name=rgb>
<table>
<input type="hidden" name="tabla" value="ipuntconta">

<tr><td>Cliente</td><td><input type="text" name="aseguradora"></td></tr>
<tr><td>Persona de Contacto</td><td><input type="text" name="pcontacto"></td></tr>
<tr><td>Telefono</td><td><input type="text" name="telcontacto" maxlength="9"></td></tr>
<tr><td>Direccion</td><td><input type="text" name="dircontacto"></td></tr>
<tr><td>E-mail</td><td><input type="text" name="mailcontacto"></td></tr><tr><td>Estado</td><td><select name="estado"><option value="0">Baja<option value="1">Alta</select></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>
</div>
</div>

<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://www.smartcbc.com">aquí</a>

<?};?>


