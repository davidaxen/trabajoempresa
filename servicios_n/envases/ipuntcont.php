<?php  
include('bbdd.php');

if ($ide!=null){;

$sql2="select * from envases where idempresas='".$ide."' order by idenvases desc";
$result2=$conn->query($sql2);
$resultado2=$result2->fetch();
/*$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$resultado2=mysqli_fetch_array($result2);*/
$idenvases=$resultado2['idenvases'];

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ALTA DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">


<?php 
if ($enviar==null){;
?>

<form action="ipuntcont.php" method="post">

<table>
<tr><td>&Uacute;ltimo  Envases dados de Alta:</td><td><input type="hidden" name="ultpunto" value="<?php  echo $idenvases;?>"><?php  echo $idenvases;?></td>
<tr><td>Cantidad de Envases</td><td><input type="number" size="10" name="cantpuntcont"></td>
<tr><td>Fecha de Compra</td><td><input type="text" size="10" name="fecha"  placeholder="2015/01/01"></td>
<tr><td>Cantidad de Rellenados</td><td><input type="text" size="10" name="relleno"></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>


<?php } else {;?>

<form action="intro2.php" method="post" name=rgb>
<table>
<input type="hidden" name="tabla" value="ipuntcont">
<?php 
$valorinicial=$ultpunto+1;
$valorfinal=$valorinicial+$cantpuntcont;
?>
<input type="hidden" name="valorinicial" value="<?php  echo $valorinicial;?>">
<input type="hidden" name="valorfinal" value="<?php  echo $valorfinal;?>">
<input type="hidden" name="fecha" value="<?php  echo $fecha;?>">
<input type="hidden" name="relleno" value="<?php  echo $relleno;?>">

Creaci&oacute;n de envases desde el <?php  echo $valorinicial;?> al <?php  echo $valorfinal;?>, con fecha de compra <?php  echo $fecha;?> 
y una vida &uacute;til de <?php  echo $relleno;?> rellenados. 

<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>


<?php };?>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>