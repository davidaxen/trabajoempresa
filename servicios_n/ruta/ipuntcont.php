<script>
<!--
//R = hexToR("#FFFFFF");
//G = hexToG("#FFFFFF");
//B = hexToB("#FFFFFF");

function hexToR(h) { return parseInt((cutHex(h)).substring(0,2),16) }
function hexToG(h) { return parseInt((cutHex(h)).substring(2,4),16) }
function hexToB(h) { return parseInt((cutHex(h)).substring(4,6),16) }
function cutHex(h) { return (h.charAt(0)=="#") ? h.substring(1,7) : h}

function setBgColorById(id,sColor) {
 var elem;
 if (document.getElementById) {
  if (elem=document.getElementById(id)) {
   if (elem.style) elem.style.backgroundColor=sColor;
  }
 }
}

//-->
</script>



<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ALTA DE RUTAS</p></div>
<div class="contenido">


<?php 
if ($enviar==null){;

$sql2="SELECT * from ruta where idempresas='".$ide."' and estado='1'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);

if ($row2!=0){;?>
<table><tr><td>Tienes los siguientes rutas creadas:</td></tr></table>
<table>
<tr class="enca"><td>Cod. Ruta</td><td>Nombre Ruta</td></tr>
<?php  
for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2, $t);
$resultado2=mysqli_fetch_array($result2);
$idruta=$resultado2['idruta'];
$nombreruta=$resultado2['nombreruta'];

if ($t==$row2-1){;
$ultpunto=$idruta;
};
?>
<tr><td><?php  echo $idruta;?></td><td><?php  echo $nombreruta;?></td></tr>
<?php };?>
</table>
<form action="ipuntcont.php" method="post">
<input type="hidden" name="ultpunto" value="<?php  echo $ultpunto;?>">
<table>
<tr><td>Cantidad de Puntos Nuevos</td><td><input type="text" size=50 name="cantpuntcont"></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>
<img alt="volver" border="0" src="../../img/arrow_cycle.png" onclick="history.back()">

<?php }else{;?>

<form action="ipuntcont.php" method="post">
<input type="hidden" name="ultpunto" value="0">
<table>
<tr><td>Cantidad de Rutas</td><td><input type="text" size=50 name="cantpuntcont"></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php };?>
<?php } else {;?>

<form action="intro2.php" method="post" name=rgb>
<table border="1">
<input type="hidden" name="tabla" value="ipuntcont">
<input type="hidden" name="ultpunto" value="<?php  echo $ultpunto;?>">
<tr><td width="50">Nombre de Ruta</td><td>
<table border="1">
<tr><td colspan="7">Dia de la Semana</td></tr>
<tr>
<td>Lu.</td>
<td>Ma.</td>
<td>Mi.</td>
<td>Ju.</td>
<td>Vi.</td>
<td>Sa.</td>
<td>Do.</td>
</tr>
</table>
</td>
</tr>
<input type="hidden" name="punt" value="<?php  echo $cantpuntcont;?>">
<?php for ($i=0;$i<$cantpuntcont;$i++){;?>
<tr>
<td width="50"><input type="text" name="punt[<?php  echo $i?>]" size="30"></td>


<td width="100">
<table border="1">
<tr>
<td width="6"><input type="checkbox" value="1" name="lun[<?php  echo $i;?>]"></td>
<td width="6"><input type="checkbox" value="1" name="mar[<?php  echo $i;?>]"></td>
<td width="6"><input type="checkbox" value="1" name="mie[<?php  echo $i;?>]"></td>
<td width="6"><input type="checkbox" value="1" name="jue[<?php  echo $i;?>]"></td>
<td width="6"><input type="checkbox" value="1" name="vie[<?php  echo $i;?>]"></td>
<td width="6"><input type="checkbox" value="1" name="sab[<?php  echo $i;?>]"></td>
<td width="6"><input type="checkbox" value="1" name="dom[<?php  echo $i;?>]"></td>
</tr>
</table>
</td> 
</tr>
<?php };?>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>


<?php };?>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>