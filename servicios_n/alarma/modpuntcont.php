<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE ALARMA</p></div>
<div class="contenido">
<form action="intro2.php" method="post">

<?php 
$sql="SELECT * from alarma where id='".$idalarma."'";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$resultado=mysqli_fetch_array($result);
$dm=$resultado['d'];
$mm=$resultado['m'];
$ym=$resultado['y'];
$hm=$resultado['h'];
$minm=$resultado['min'];
$segm=$resultado['seg'];
$mensaje=$resultado['mensaje'];
$fechaant=$ym.'-'.$mm.'-'.$dm;

?>
<input type="hidden" name="tabla" value="modificar">
<input type="hidden" name="idalarma" value="<?php  echo $idalarma;?>">
<input type="hidden" name="fechaant" value="<?php  echo $fechaant;?>">
<input type="hidden" name="dant" value="<?php  echo $dm;?>">
<input type="hidden" name="mant" value="<?php  echo $mm;?>">
<input type="hidden" name="yant" value="<?php  echo $ym;?>">
<input type="hidden" name="hant" value="<?php  echo $hm;?>">
<input type="hidden" name="minant" value="<?php  echo $minm;?>">
<input type="hidden" name="segant" value="<?php  echo $segm;?>">
<input type="hidden" name="mensajeant" value="<?php  echo $mensaje;?>">
<table>
<tr><td>Datos del Puesto de Trabajo</td><td>
<?php 
$idclientes=$resultado['idclientes'];
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
?>
<?php  echo $nombre;?>
</td></tr>

<tr><td>Fecha</td>
<td>
<input type="number" name="dnue" maxlength=2 size=3 value="<?php  echo $dm;?>">/

<select name="mnue">
<option value="1" <?php if ($mm==1){;?>selected<?php };?> >Enero
<option value="2" <?php if ($mm==2){;?>selected<?php };?> >Febrero
<option value="3" <?php if ($mm==3){;?>selected<?php };?> >Marzo
<option value="4" <?php if ($mm==4){;?>selected<?php };?> >Abril
<option value="5" <?php if ($mm==5){;?>selected<?php };?> >Mayo
<option value="6" <?php if ($mm==6){;?>selected<?php };?> >Junio
<option value="7" <?php if ($mm==7){;?>selected<?php };?> >Julio
<option value="8" <?php if ($mm==8){;?>selected<?php };?> >Agosto
<option value="9" <?php if ($mm==9){;?>selected<?php };?> >Septiembre
<option value="10" <?php if ($mm==10){;?>selected<?php };?> >Octubre
<option value="11" <?php if ($mm==11){;?>selected<?php };?> >Noviembre
<option value="12" <?php if ($mm==12){;?>selected<?php };?> >Diciembre
</select>

/<input type="number" name="ynue" maxlength=4 size=5 value="<?php  echo $ym;?>"></td></tr>
<tr><td>Hora</td>
<td>
<input type="number" name="hnue" maxlength=2 size=3 value="<?php  echo $hm;?>">:
<input type="number" name="minnue" maxlength=2 size=3 value="<?php  echo $minm;?>"> 
:<input type="number" name="segnue" maxlength=2 size=3 value="<?php  echo $segm;?>" ></td></tr>
<tr><td colspan="2">Observaciones</td></tr>
<tr><td colspan="2"><textarea cols="100" rows="10" name="mensajenue"><?php  echo $mensaje;?></textarea></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>
