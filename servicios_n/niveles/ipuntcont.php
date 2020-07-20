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
<p class="enc">ALTA DE PUNTOS DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">


<?php 
if ($enviar==null){;

$sql2="SELECT * from puntservicios where idempresas=:ide and idpccat=:idpccat order by idpcsubcat asc";
$result2=$conn->prepare($sql2);
$result2->bindParam(':ide', $ide);
$result2->bindParam(':idpccat', $idpccat);
$result2->execute();

$result2mos=$conn->prepare($sql2);
$result2mos->bindParam(':ide', $ide);
$result2mos->bindParam(':idpccat', $idpccat);
$result2mos->execute();
$num_rows=$result2->fetchAll();
$row2=count($num_rows);

/*$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);*/

if ($row2!=0){;?>
<table><tr><td>Tienes los siguientes puntos introducidos:</td></tr></table>
<table>
<tr class="enca"><td>Codigo</td><td>Nombre</td></tr>
<?php  
/*for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2, $t);
$resultado2=mysqli_fetch_array($result2);
$idpcsubcat=$resultado2['idpcsubcat'];
$subcategoria=$resultado2['subcategoria'];*/
$t=0;
foreach ($result2mos as $row) {
		$idpcsubcat=$row['idpcsubcat'];
		$subcategoria=$row['subcategoria'];

if ($t==$row2-1){;
$ultpunto=$idpcsubcat;
}
$t=$t+1;
?>
<tr><td><?php  echo $idpcsubcat;?></td><td><?php  echo $subcategoria;?></td></tr>
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
<tr><td>Cantidad de Puntos</td><td><input type="text" size=50 name="cantpuntcont"></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php };?>
<?php } else {;?>

<form action="intro2.php" method="post" name=rgb>
<table>
<input type="hidden" name="tabla" value="ipuntcont">
<input type="hidden" name="ultpunto" value="<?php  echo $ultpunto;?>">
<tr><td>Punto</td><td>Color</td><td>Muestra</td></tr>
<input type="hidden" name="punt" value="<?php  echo $cantpuntcont;?>">
<?php for ($i=0;$i<$cantpuntcont;$i++){;?>
<tr>
<td><input type="text" name="punt[<?php  echo $i?>]"></td>


<td valign=top><nobr>
<input type=text name="hex<?php  echo $i?>" size=7 maxlength=7 value="FFFFFF" 
onblur="setBgColorById('colorSample<?php  echo $i?>',this.form.hex<?php  echo $i?>.value);
this.form.rellr<?php  echo $i?>.value=hexToR(this.form.hex<?php  echo $i?>.value);
this.form.rellg<?php  echo $i?>.value=hexToG(this.form.hex<?php  echo $i?>.value);
this.form.rellb<?php  echo $i?>.value=hexToB(this.form.hex<?php  echo $i?>.value);
"
> 
<td valign=middle>
<nobr>
<span id="colorSample<?php  echo $i?>" style="border: 1px solid gray;">
<big><big><code style="cursor:default;">&nbsp;&nbsp;&nbsp;</code></big></big></span>&nbsp;
Hay que poner numeros entre 0 a F ( porque es hex.)
</nobr></td>
<input type="hidden" id="rellr<?php  echo $i?>" name="rellr[<?php  echo $i?>]" value="255">
<input type="hidden" id="rellg<?php  echo $i?>" name="rellg[<?php  echo $i?>]" value="255">
<input type="hidden" id="rellb<?php  echo $i?>" name="rellb[<?php  echo $i?>]" value="255">
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