<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ALTA DE ASISTENTES</p></div>
<div class="contenido">

<form action="intro2.php" method="post" name=rgb>
<table>
<input type="hidden" name="tabla" value="ipuntcont">

<tr><td>Nombre</td><td><input type="text" name="nombreasist"></td></tr>
<tr><td>Apellidos</td><td><input type="text" name="papellidoasist"> <input type="text" name="sapellidoasist"></td></tr>
<tr><td>DNI</td><td><input type="text" name="dniasist"></td></tr>
<tr><td>Empresa</td><td><input type="text" name="empresaasist"></td></tr>
<tr><td>Telefono</td><td><input type="text" name="telasist" maxlength="9"></td></tr>
<tr><td>E-mail</td><td><input type="text" name="mailasist"></td></tr>
<tr><td>Direccion</td><td><input type="text" name="dirasist"></td></tr>
<tr><td>Codigo Postal</td><td><input type="text" name="cpasist" maxlength="5"></td></tr>
<tr><td>Localidad</td><td><input type="text" name="locasist"></td></tr>
<tr><td>Provincia</td><td><input type="text" name="proasist"></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

</div>
</div>
<?php } else {;

include('../../cierre.php');
};?>
