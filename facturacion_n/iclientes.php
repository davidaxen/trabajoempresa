<?php  
include('bbdd.php');

include('../portada_n/cabecera2.php');

include('../estilo/acordeon.php');

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
switch($tipo){
case 1: $nc=$resultado31['clientes'];break;
case 2: $nc=$resultado31['puestos'];break;
}


$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
switch($tipo){
case 1: $ic=$resultado32['clientes'];break;
case 2: $ic=$resultado32['puestos'];break;
};

?>


<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCI&OacuteN DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido"  style="padding-left:10px">


<?php 
$sql10="select liccli from empresas where idempresas='".$ide."'"; 
//echo $sql10;
$result10=mysqli_query($conn,$sql10) or die ("Invalid result lic");
$resultado10=mysqli_fetch_array($result10);
$liccli=$resultado10['liccli'];

$sql10="select count(idclientes) as tot from clientes where idempresas='".$ide."' and estado='1'"; 
$result10=mysqli_query($conn,$sql10) or die ("Invalid result empleados");
$resultado10=mysqli_fetch_array($result10);
$tota=$resultado10['tot'];


if ($liccli>$tota){;

if ($idc==null){;?>

<form action="iclientes.php" method="post" name="form2">

<div class="accordion">
<img src="../img/iconos/datos_personales.png" width="32px" style="vertical-align:middle;">  Datos Puesto
</div>
<div class="panel">
<table>
<input type="hidden" name="idc" value="3">
<input type="hidden" name="tipo" value="<?php  echo $tipo;?>">
<tr><td class="tit">Nombre del Puesto de Trabajo</td><td><input type="text" name="cliente" size="80"></td></tr>
<tr><td class="tit">NIF</td><td><input type="text" name="nif" maxlength="9" size="10"></td></tr>
<tr><td class="tit">Direcci&oacuten</td><td><input type="text" name="direccion" size="80"></td></tr>
<tr><td class="tit">C&oacutedigo Postal</td><td><input type="text" name="cp" maxlength="5"  size="6"></td></tr>
<tr><td class="tit">Localidad</td><td><input type="text" name="localidad" size="80"></td></tr>
<tr><td class="tit">Provincia</td><td><input type="text" name="provincia" size="80"></td></tr>
</table>
</div>

<?php 
$dat=array('entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento');

$sql10="select * from servicios where idempresa='".$ide."'"; 
$result10=mysqli_query($conn,$sql10) or die ("Invalid result clientes");
$resultado10=mysqli_fetch_array($result10);

$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";
$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);

$sql32="select * from menuserviciosimg where idempresa='".$ide."'";
$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
?>

<div class="accordion">
<img src="../img/iconos/serviciose.png" width="32px" style="vertical-align:middle;"> Servicios
</div>
<div class="panel">

<div style="column-count:3">

<table>
<tr class="enctab"><td class="tit">Servicios</td><td class="tit">Inactivo / Activo</td></tr>
<?php for ($t=0;$t<count($dat);$t++){;?>

<?php 
$dgtt=$resultado10[$dat[$t]];
$serimg=$resultado32[$dat[$t]];
$sernom=$resultado31[$dat[$t]];
if ($dgtt==1){;
?>
<tr><td class="tit"><img src="../img/<?php  echo $serimg;?>" width="25px">&nbsp;<?php  echo $sernom;?></td>

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 22px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #000;
}

input:focus + .slider {
  box-shadow: 0 0 1px #000;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<?php  
switch($t){;
case 0:
case 1:
?>
<td>
<input type="hidden" value="1" name="datos[<?php  echo $t;?>]">
<!--
<label class="switch">
  <input type="checkbox" name="datos[<?php  echo $t;?>]" value="1" checked disabled="disabled">
  <span class="slider round"></span>
</label>
-->
<input type="radio" name="datos[<?php  echo $t;?>]" disabled="disabled">
/
<input type="radio" name="datos[<?php  echo $t;?>]" value="1" checked="checked" disabled="disabled">
</td></tr>
<?php 
;break;
default:
?>
<td><!--
<input type="hidden" value="1" name="datos[<?php  echo $t;?>]">
<label class="switch">
  <input type="checkbox" name="datos[<?php  echo $t;?>]" value="1" >
  <span class="slider round"></span>
</label>
-->
<input type="radio" name="datos[<?php  echo $t;?>]" value="0" checked="checked">
/
<input type="radio" name="datos[<?php  echo $t;?>]" value="1">

</td>
<?php 

};
?>
</tr>
<?php };?>

<?php };?>
</table>
</div>
</div>

<button class="accordion">
<img src="../img/iconos/enviar.png" width="32px" style="vertical-align:middle;"> Enviar
</button>
<!--
<table>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
-->

</form>

<?php  include ('../js/acordeonjs.php');?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>


<?php } else {;?>
<?php 

$sql="select idclientes from clientes where idempresas='".$ide."' order by idclientes desc"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result clientes");
$row=mysqli_num_rows($result);
?>
<form action="intro2.php" method="post">
<table>
<input type="hidden" name="tabla" value="idclientes">
<input type="hidden" name="tipo" value="<?php  echo $tipo;?>">

<?php 
if ($row==0){;
$idc=10;
}else{;
$resultado=mysqli_fetch_array($result);
$idc=$resultado['idclientes'];
$idc=$idc+1;
};
?>
<tr><td class="tit">C&oacutedigo del Puesto de Trabajo</td><td><input type="text" name="idc" value="<?php  echo $idc;?>"> - puedes poner el numero que te interese -</td></tr>
<tr><td class="tit">Nombre del Puesto de Trabajo</td><td><input type="hidden" name="cliente" value="<?php  echo $cliente;?>"><?php  echo $cliente;?></td></tr>
<tr><td class="tit">NIF</td><td><input type="hidden" name="nif" value="<?php  echo $nif;?>"><?php  echo $nif;?></td></tr>
<tr><td class="tit">Direcci&oacuten</td><td><input type="hidden" name="direccion" value="<?php  echo $direccion;?>"><?php  echo $direccion;?></td></tr>
<tr><td class="tit">C&oacutedigo Postal</td><td><input type="hidden" name="cp" value="<?php  echo $cp;?>"><?php  echo $cp;?></td></tr>
<tr><td class="tit">Localidad</td><td><input type="hidden" name="localidad" value="<?php  echo $localidad;?>"><?php  echo $localidad;?></td></tr>
<tr><td class="tit">Provincia</td><td><input type="hidden" name="provincia" value="<?php  echo $provincia;?>"><?php  echo $provincia;?></td></tr>
</table>


<?php 
$dat=array('entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus');


$sql10="select * from servicios where idempresa='".$ide."'"; 
$result10=mysqli_query($conn,$sql10) or die ("Invalid result clientes");
$resultado10=mysqli_fetch_array($result10);

$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";
$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);

$sql32="select * from menuserviciosimg where idempresa='".$ide."'";
$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
?>
<div id="divicolumnai">

<table>
<tr><td class="tit">Servicios</td><td class="tit">Inactivo / Activo</td></tr>
<?php for ($t=0;$t<count($dat);$t++){;?>

<?php 
$dgtt=$resultado10[$dat[$t]];
$serimg=$resultado32[$dat[$t]];
$sernom=$resultado31[$dat[$t]];
if ($dgtt==1){;
?>
<tr><td class="tit"><img src="../img/<?php  echo $serimg;?>" width="25px">&nbsp;<?php  echo $sernom;?></td>

<?php  
$valor=$datos[$t];

?>
<input type="hidden" name="datos[<?php  echo $t;?>]" value="<?php  echo $valor;?>" >
<td>
<input type="radio" name="datos1[<?php  echo $t;?>]" value="0" disabled="disabled"
<?php if ($valor=='0'){;?>checked="checked"<?php };?>
>
/
<input type="radio" name="datos1[<?php  echo $t;?>]" value="1" disabled="disabled"
<?php if ($valor=='1'){;?>checked="checked"<?php };?>
>

</td></tr>


<?php };?>

<?php };?>
</table>
</div>


<table>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php };?>
<?php }else{;?>
<p>
<table>
<tr><td class="enc">Ya ha utilizado todas las licencias contratadas</td></tr>
<tr><td class="enc">P&oacute;ngase en contacto con su comercial</td></tr>
</table>
<?php };?>