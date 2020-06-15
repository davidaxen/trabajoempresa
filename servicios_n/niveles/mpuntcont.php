<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');
?>

<div id="main">
<div class="titulo">
<p class="enc">ALTA DE PUNTOS DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<script type="text/javascript" language="JavaScript">
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

if ($enviar==null){;

$sql2="SELECT * from puntservicios where idempresas='".$ide."' and idpccat='".$idpccat."' order by idpcsubcat asc"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);

if ($row2!=0){;?>
<table><tr><td>Tienes los siguientes puntos introducidos:</td></tr></table>
<table>
<tr class="enca"><td>Codigo</td><td>Nombre</td><td>Activo</td><td>Opcion</td></tr>
<?php  
for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2,$t);
$resultado2=mysqli_fetch_array($result2);
$idpcsubcat=$resultado2['idpcsubcat'];
$subcategoria=$resultado2['subcategoria'];
$rellr=$resultado2['rellr'];
$rellg=$resultado2['rellg'];
$rellb=$resultado2['rellb'];
$activo=$resultado2['activo'];
if ($t==$row2-1){;
$ultpunto=$idpcsubcat;
};
?>
<tr><td><?php  echo $idpcsubcat;?></td><td><?php  echo $subcategoria;?></td>
<td>
<?php if ($activo==1){;?>Si<?php }else{;?>No<?php };?>
</td>
<td><a href="mpuntcont.php?enviar=enviar&subcategoria=<?php  echo $subcategoria;?>&idpcsubcat=<?php  echo $idpcsubcat;?>&activo=<?php  echo $activo;?>&rellr=<?php  echo $rellr;?>&rellg=<?php  echo $rellg;?>&rellb=<?php  echo $rellb;?>"><img src="../../img/modificar.gif"></a></td></tr>
<?php };?>
</table>
<img alt="volver" border="0" src="../../img/arrow_cycle.png" onclick="history.back()">

<?php }else{;?>

No tienes dado de alta ningún punto

<?php };?>
<?php } else {;?>

<form action="intro2.php" method="post" name=rgb>
<table>
<input type="hidden" name="tabla" value="mpuntcont">
<input type="hidden" name="idpcsubcat" value="<?php  echo $idpcsubcat;?>">
<input type="hidden" name="subcategoria" value="<?php  echo $subcategoria;?>">
<input type="hidden" name="rellr" value="<?php  echo $rellr;?>">
<input type="hidden" name="rellg" value="<?php  echo $rellg;?>">
<input type="hidden" name="rellb" value="<?php  echo $rellb;?>">
<input type="hidden" name="activo" value="<?php  echo $activo;?>">
<tr><td>Punto</td><td>Activo</td><td>Color</td><td>Muestra</td></tr>

<tr>
<td><input type="text" name="subcategorian" value="<?php  echo $subcategoria;?>"></td>
<td><select name="activon">
<option value="1" <?php if ($activo==1){;?>selected<?php };?> >Si
<option value="0" <?php if ($activo==0){;?>selected<?php };?> >No
</td>
<?php 
$rt2=dechex($rellr);
$gt2=dechex($rellg);
$bt2=dechex($rellb);
$colortt2=$rt2.$gt2.$bt2;
?>
<td valign=top><nobr>
<input type=text name="hex" size=7 maxlength=7 value="<?php  echo $colortt2?>" 
onblur="setBgColorById('colorSample',this.form.hex.value);
this.form.rellrn.value=hexToR(this.form.hex.value);
this.form.rellgn.value=hexToG(this.form.hex.value);
this.form.rellbn.value=hexToB(this.form.hex.value);
"
> 
<td valign=middle>
<nobr>
<span id="colorSample<?php  echo $i?>" style="border: 1px solid gray;">
<big><big><code style="cursor:default;">&nbsp;&nbsp;&nbsp;</code></big></big></span>&nbsp;
Hay que poner numeros entre 0 a F ( porque es hex.)
</nobr></td>
<input type="hidden" id="rellrn" name="rellrn" value="<?php  echo $rellr;?>">
<input type="hidden" id="rellgn" name="rellgn" value="<?php  echo $rellg;?>">
<input type="hidden" id="rellbn" name="rellbn" value="<?php  echo $rellb;?>">
</tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>


<?php };?>



</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>