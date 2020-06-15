<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');
include('combo.php');?>
<div id="main">
<div class="titulo">
<p class="enc">ENVIO DE INCIDENCIAS</p></div>
<div class="contenido">



<form action="../../movil/mail2.php" method="post" name="form1" enctype="multipart/form-data">
    <input id="latitud" name="lat" type="hidden" />
    <input id="longitud" name="lon" type="hidden" />
<table>
<tr><td>Datos del Puesto de Trabajo</td><td><input type="hidden" name="idcomunidad" value="1" >Teletrabajo</td></tr>
<tr><td>Urgente</td><td><input type="checkbox" name="urgente" value="true" ></td></tr>
<tr><td colspan="2">Observaciones</td></tr>
<tr><td colspan="2"><textarea name="valor" cols="50" rows="20"></textarea></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>

</table>
</form>

<script>
window.onload = getLocation();

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
         document.getElementById("latitud").value=position.coords.latitude;
         document.getElementById("longitud").value=position.coords.longitude;
}
</script>



</div>
</div>
<?php } else {;

include('../../cierre.php');

};?>
