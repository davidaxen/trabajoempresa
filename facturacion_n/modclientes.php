<?php  
include('bbdd.php');


if ($ide!=null){;

$sql31="select * from menuadministracionnombre where idempresa=:ide";

$result31=$conn->prepare($sql31);
$result31->bindParam(':ide', $ide);
$result31->execute();
$resultado31=$result31->fetch();


//$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
//$resultado31=mysqli_fetch_array($result31);
switch($tipo){
case 1: $nc=$resultado31['clientes'];break;
case 2: $nc=$resultado31['puestos'];break;
}


$sql32="select * from menuadministracionimg where idempresa=:ide";

$result32=$conn->prepare($sql32);
$result32->bindParam(':ide', $ide);
$result32->execute();
$resultado32=$result32->fetch();
//$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);
switch($tipo){
case 1: $ic=$resultado32['clientes'];break;
case 2: $ic=$resultado32['puestos'];break;
};

include('../portada_n/cabecera2.php');

include('../estilo/acordeon.php');
?>


<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido"  style="padding-left:10px">

<?php 
$sql="SELECT * from clientes where idempresas=:ide and idclientes=:idclientes"; 

$result=$conn->prepare($sql);
$result->bindParam(':ide', $ide);
$result->bindParam(':idclientes', $idclientes);
$result->execute();
$resultado=$result->fetch();
//$result=mysqli_query ($conn, $sql) or die ("Invalid result");
//$resultado=mysqli_fetch_array($result);
?>

<form action="intro2.php" method="get" name="form2">




<div class="accordion">
<img src="../img/iconos/datos_personales.png" width="32px" style="vertical-align:middle;">  Datos Puesto
</div>
<div class="panel">
<table>
<tr>
<td class="tit">C&oacute;digo de Puesto de Trabajo</td>
<td>
<input type="hidden" name="tablas" value="modificar">
<input type="hidden" name="datostab" value="modclientes">
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<?php  echo $idclientes;?></td>
</tr>
<tr>
<td class="tit">Nombre del Puesto de Trabajo</td>
<td colspan="4"><?php $nombre=$resultado['nombre'];?>
<input type="hidden" name="nombre" value="<?php  echo $nombre;?>">
<input type="text" name="nombre1" value="<?php  echo $nombre;?>" size=50></td>
</tr>
<tr>
<td class="tit">N.I.F</td>
<td colspan="4"><?php $nif=$resultado['nif'];?>
<input type="hidden" name="nif" value="<?php  echo $nif;?>"><input type="text" name="nif1" value="<?php  echo $nif;?>">
</td>
</tr>

<tr>
<td class="tit">C&oacute;digo Postal</td>
<td colspan="4"><?php $cp=$resultado['cp'];?>
<input type="hidden" name="cp" value="<?php  echo $cp;?>">
<input type="text" name="cp1" value="<?php  echo $cp;?>" maxlength="5"></td>
</tr>
<tr>
<td class="tit">Domicilio</td>
<td colspan="4"><?php $domicilio=$resultado['domicilio'];?>
<input type="hidden" name="domicilio" value="<?php  echo $domicilio;?>">
<input type="text" name="domicilio1" value="<?php  echo $domicilio;?>" size="50"></td>
</tr>
</tr>
<tr>
<td class="tit">Provincia</td>
<td colspan="4"><?php $provincia=$resultado['provincia'];?>
<input type="hidden" name="provincia" value="<?php  echo $provincia;?>">
<input type="text" name="provincia1" value="<?php  echo $provincia;?>"></td>
</tr>
<tr>
<td class="tit">Localidad</td>
<td colspan="4"><?php $localidad=$resultado['localidad'];?>
<input type="hidden" name="localidad" value="<?php  echo $localidad;?>">
<input type="text" name="localidad1" value="<?php  echo $localidad;?>"></td>
</tr>

<tr>
<td class="tit">Estado</td>
<?php $estado=$resultado['estado'];?>
<td colspan="4">
<input type="hidden" name="estadocli" value="<?php  echo $estado;?>">
<select name="estadocli1">
<option value="0" <?php if ($estado=='0'){;?>selected<?php };?> >Baja
<option value="1" <?php if ($estado=='1'){;?>selected<?php };?>   >Alta
</td>
</tr>


<tr>
<td class="tit">Gestor</td>
<?php 
$idgestor=$resultado['idgestor'];
$sql1="SELECT * from gestores where idempresa=:ide"; 

$result1=$conn->prepare($sql1);
$result1->bindParam(':ide', $ide);
$result1->execute();
$fetchAll1=$result1->fetchAll();
$row=count($fetchAll1);

$result1mos=$conn->prepare($sql1);
$result1mos->bindParam(':ide', $ide);
$result1mos->execute();
//$result1=mysqli_query ($conn, $sql1) or die ("Invalid result");
//$row=mysqli_num_rows($result1);
?>
<td colspan="4">
<input type="hidden" name="idgestor" value="<?php  echo $idgestor;?>">
<?php 
if ($row!=0){;
?>
<select name="idgestor1">
<option value="0" <?php if ($idgestor=="0"){;?>selected<?php };?> >
<?php

foreach ($result1mos as $row) {

//for($hg=0;$hg<$row;$hg++){;
//mysqli_data_seek($result1,$hg);
//$resultado1=mysqli_fetch_array($result1);
$idgestor1=$row['idgestor'];
$nombrecont=$row['nombregestor'];
?>
<option value="<?php  echo $idgestor1;?>" <?php if ($idgestor==$idgestor1){;?>selected<?php };?> ><?php  echo strtoupper($nombrecont);?>
<?php };?>
<?php }else{;?>
<input type="hidden" name="idgestor1" value="<?php  echo $idgestor;?>">
<?php };?>
</td>
</tr>



</table>

</div>


<?php 
$dat=array('entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento');

$sql10="select * from servicios where idempresa=:ide";

$result10=$conn->prepare($sql10);
$result10->bindParam(':ide', $ide);
$result10->execute();
$resultado10=$result10->fetch();

//$result10=mysqli_query ($conn, $sql10) or die ("Invalid result clientes");
//$resultado10=mysqli_fetch_array($result10);

$sql31="select * from menuserviciosnombre where idempresa=:ide";

$result31=$conn->prepare($sql31);
$result31->bindParam(':ide', $ide);
$result31->execute();
$resultado31=$result31->fetch();

//$result31=mysqli_query ($conn, $sql31) or die ("Invalid result menucontabilidad");
//$resultado31=mysqli_fetch_array($result31);

$sql32="select * from menuserviciosimg where idempresa=:ide";

$result32=$conn->prepare($sql32);
$result32->bindParam(':ide', $ide);
$result32->execute();
$resultado32=$result32->fetch();

//$result32=mysqli_query ($conn, $sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);
?>

<div class="accordion">
<img src="../img/iconos/serviciose.png" width="32px" style="vertical-align:middle;"> Servicios
</div>
<div class="panel" style="column-count:2">
<table>
<tr><td class="tit">Servicios</td><td class="tit">Inactivo / Activo</td><td class="tit">C&oacute;digos QR / Listado</td></tr>

<?php 
for ($t=0;$t<count($dat);$t++){;
?>

<?php 
$dgtt=$resultado10[$dat[$t]];
$serimg=$resultado32[$dat[$t]];
$sernom=$resultado31[$dat[$t]];
if ($dgtt==1){;
?>
<tr><td class="tit"><img src="../img/<?php  echo $serimg;?>" width="25px">&nbsp;<?php  echo $sernom;?></td>

<?php  
$valor=$resultado[$dat[$t]];
?>

<!--<div id="divicolumnai">-->
<td>

<?php  
switch($t){;
case 0:
case 1:
?>
<input type="hidden" name="datos[<?php  echo $t;?>]" value="<?php  echo $valor;?>" >
<input type="hidden" name="datos1[<?php  echo $t;?>]" value="<?php  echo $valor;?>" >
<input type="radio" name="datos1[<?php  echo $t;?>]" value="0" disabled="disabled" <?php if ($valor=='0'){;?>checked="checked"<?php };?> >
/   <input type="radio" name="datos1[<?php  echo $t;?>]" value="1" disabled="disabled" <?php if ($valor=='1'){;?>checked="checked"<?php };?> >
<?php 
;break;
case 4:
case 5:
case 6:
case 7:
?>
<input type="hidden" name="datos[<?php  echo $t;?>]" value="<?php  echo $valor;?>" >
<input type="radio" name="datos1[<?php  echo $t;?>]" value="0" <?php if ($valor=='0'){;?>checked="checked"<?php };?> >
/   <input type="radio" name="datos1[<?php  echo $t;?>]" value="1" <?php if ($valor=='1'){;?>checked="checked"<?php };?> >





<?php 
switch($t){
	case 4: $lt=3;break;
	case 5: $lt=4;break;
	case 6: $lt=2;break;
	case 7: $lt=5;break;
};
?>	
	<?php 
$sqlqr="SELECT * from codigo where idempresas=:ide and idclientes=:idclientes and idpccat=:lt";

$resultqr=$conn->prepare($sqlqr);
$resultqr->bindParam(':ide', $ide);
$resultqr->bindParam(':idclientes', $idclientes);
$resultqr->bindParam(':lt', $lt);
$resultqr->execute();
$fetchAlltqr=$resultqr->fetchAll();
$rowqr=count($fetchAlltqr);

$resultqrmos=$conn->prepare($sqlqr);
$resultqrmos->bindParam(':ide', $ide);
$resultqrmos->bindParam(':idclientes', $idclientes);
$resultqrmos->bindParam(':lt', $lt);
$resultqrmos->execute();


//$resultqr=mysqli_query ($conn, $sqlqr) or die ("Invalid result");
//$rowqr=mysqli_num_rows($resultqr);
if ($rowqr==0){;
	$valor=0;
	}else{;
		$resultadoqr=$resultqrmos->fetch();
		//$resultadoqr=mysqli_fetch_array($resultqr);
		$valor=$resultadoqr['activo'];
		};
?>
</td>
<td>
<input type="hidden" name="altaqr[<?php  echo $lt;?>]" value="<?php  echo $rowqr;?>" >
<input type="hidden" name="datosqr[<?php  echo $lt;?>]" value="<?php  echo $valor;?>" >
<input type="radio" name="datosqr1[<?php  echo $lt;?>]" value="1" <?php if ($valor=='1'){;?>checked="checked"<?php };?> >
/   <input type="radio" name="datosqr1[<?php  echo $lt;?>]" value="0" <?php if ($valor=='0'){;?>checked="checked"<?php };?> >


</td>
<?php 
;break;



default:
?>
<input type="hidden" name="datos[<?php  echo $t;?>]" value="<?php  echo $valor;?>" >
<input type="radio" name="datos1[<?php  echo $t;?>]" value="0" <?php if ($valor=='0'){;?>checked="checked"<?php };?> >
/   <input type="radio" name="datos1[<?php  echo $t;?>]" value="1" <?php if ($valor=='1'){;?>checked="checked"<?php };?> >

<?php };?>
</td>


</tr>

<!--fin div -->

<?php };?>

<?php };?>
</table>
</div>

<button class="accordion">
<img src="../img/iconos/enviar.png" width="32px" style="vertical-align:middle;"> Enviar
</button>
<!--
<table>
<tr>
<td>
<input class="envio" type="submit" name="Enviar" value="Enviar"></td>
</tr>
</table>
-->
</form>

<?php  include ('../js/acordeonjs.php');?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</div>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>