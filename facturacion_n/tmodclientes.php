<?php  
include('bbdd.php');

if ($ide!=null){;

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

include('../portada_n/cabecera2.php');

include('../estilo/acordeon.php');
?>


<div id="main">
<div class="titulo">
<p class="enc">TRASPASO DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido"  style="padding-left:10px">

<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result=mysqli_query ($conn, $sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
?>

<form action="intro2.php" method="get" name="form2">
<input type="hidden" name="tablas" value="traspaso">
<input type="hidden" name="datostab" value="tmodclientes">

<div class="accordion">
<img src="../img/iconos/datos_personales.png" width="32px" style="vertical-align:middle;">  Administrador Destinatario
</div>
<div class="panel">
<?php
$sql10c="select * from empresas where idempresas!='".$ide."' and idproyectos='5'"; 
//echo $sql10c;
$result10c=mysqli_query ($conn, $sql10c) or die ("Invalid result empresas");
$row10c=mysqli_num_rows($result10c);
?>
<table>
<tr><td>
Nombre de Administrador</td><td>
<select name="admnuevo">
<?php
for($j=0;$j<$row10c;$j++){;
      mysqli_data_seek($result10c,$j);
		$resultado10c=mysqli_fetch_array($result10c);
		$idetraspaso=$resultado10c['idempresas'];
		$nombrec=$resultado10c['nombre'];
		$colegiado=$resultado10c['nif'];
		?>
		<option value="<?php echo $idetraspaso;?>"><?php echo $colegiado;?> - <?php echo $nombrec;?></option>
<?php		
	};
?>
		</select>
	</td></tr></table>
</div>

<div class="accordion">
<img src="../img/iconos/datos_personales.png" width="32px" style="vertical-align:middle;">  Datos Puesto
</div>
<div class="panel">
<table>
<tr>
<td class="tit">C&oacute;digo de Puesto de Trabajo</td>
<td>

<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<?php  echo $idclientes;?></td>
</tr>
<tr>
<td class="tit">Nombre del Puesto de Trabajo</td>
<td colspan="4"><?php $nombre=$resultado['nombre'];?>
<input type="hidden" name="nombre" value="<?php  echo $nombre;?>"><?php  echo $nombre;?></td>
</tr>
<tr>
<td class="tit">N.I.F</td>
<td colspan="4"><?php $nif=$resultado['nif'];?>
<input type="hidden" name="nif" value="<?php  echo $nif;?>"><?php  echo $nif;?></td>
</tr>

<tr>
<td class="tit">C&oacute;digo Postal</td>
<td colspan="4"><?php $cp=$resultado['cp'];?>
<input type="hidden" name="cp" value="<?php  echo $cp;?>"><?php  echo $cp;?></td>
</tr>
<tr>
<td class="tit">Domicilio</td>
<td colspan="4"><?php $domicilio=$resultado['domicilio'];?>
<input type="hidden" name="domicilio" value="<?php  echo $domicilio;?>"><?php  echo $domicilio;?></td>
</tr>
</tr>
<tr>
<td class="tit">Provincia</td>
<td colspan="4"><?php $provincia=$resultado['provincia'];?>
<input type="hidden" name="provincia" value="<?php  echo $provincia;?>"><?php  echo $provincia;?></td>
</tr>
<tr>
<td class="tit">Localidad</td>
<td colspan="4"><?php $localidad=$resultado['localidad'];?>
<input type="hidden" name="estadocli" value="<?php  echo $estado;?>">
<input type="hidden" name="localidad" value="<?php  echo $localidad;?>"><?php  echo $localidad;?></td>
</tr>


</table>

</div>


<?php 
$dat=array('entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento');

$sql10="select * from servicios where idempresa='".$ide."'"; 
$result10=mysqli_query ($conn, $sql10) or die ("Invalid result clientes");
$resultado10=mysqli_fetch_array($result10);

$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";
$result31=mysqli_query ($conn, $sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);

$sql32="select * from menuserviciosimg where idempresa='".$ide."'";
$result32=mysqli_query ($conn, $sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
?>

<div class="accordion">
<img src="../img/iconos/serviciose.png" width="32px" style="vertical-align:middle;"> Servicios
</div>
<div class="panel" style="column-count:1">
<table>
<tr><td class="tit">Servicios</td></tr>

<?php 
for ($t=0;$t<2;$t++){;
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
<!--
<input type="hidden" name="datos[<?php  echo $t;?>]" value="<?php  echo $valor;?>" >
<input type="hidden" name="datos1[<?php  echo $t;?>]" value="<?php  echo $valor;?>" >
<input type="radio" name="datos1[<?php  echo $t;?>]" value="0" disabled="disabled" <?php if ($valor=='0'){;?>checked="checked"<?php };?> >
/   <input type="radio" name="datos1[<?php  echo $t;?>]" value="1" disabled="disabled" <?php if ($valor=='1'){;?>checked="checked"<?php };?> >
-->
<?php 
//;
break;
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
$sqlqr="SELECT * from codigo where idempresas='".$ide."' and idclientes='".$idclientes."' and idpccat='".$lt."'";
$resultqr=mysqli_query ($conn, $sqlqr) or die ("Invalid result");
$rowqr=mysqli_num_rows($resultqr);
if ($rowqr==0){;
	$valor=0;
	}else{;
		$resultadoqr=mysqli_fetch_array($resultqr);
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
<?php
$sql10e="select distinct(idempleado) from almpc where idempresas='".$ide."' and idpiscina='".$idclientes."'"; 
//echo $sql10e;
$result10e=mysqli_query ($conn, $sql10e) or die ("Invalid result empresas");
$row10e=mysqli_num_rows($result10e);
//$row10e=0;
if ($row10e>5){;
$valorcol=2;
}else{;
$valorcol=1;
};
?>

<div class="accordion">
<img src="../img/iconos/datos_personales.png" width="32px" style="vertical-align:middle;"> Empleados
</div>
<div class="panel" style="column-count:<?php echo $valorcol;?>">


<table>
<tr><td>Nombre de Trabajadores</td></tr>

<?php
for($j=0;$j<$row10e;$j++){;
      mysqli_data_seek($result10e,$j);
		$resultado10e=mysqli_fetch_array($result10e);
		$idempleado=$resultado10e['idempleado'];
		
$sql10em="select * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 
//echo $sql10em;
$result10em=mysqli_query ($conn, $sql10em) or die ("Invalid result empresas");
$resultado10em=mysqli_fetch_array($result10em);		
		$idempl=$resultado10em['id'];		
		$nombrec=$resultado10em['nombre'];
		$papellido=$resultado10em['1apellido'];
		$sapellido=$resultado10em['2apellido'];
		$datonom=$nombrec.' '.$papellido.' '.$sapellido;
		?>
		<tr><td><input type="checkbox" name="empl[<?php echo $j;?>]" value="<?php echo $idempl;?>"> <?php echo strtoupper($datonom);?></option></td></tr>
<?php		
	};
?>

</table>
	
</div>




<button class="accordion">
<img src="../img/iconos/enviar.png" width="32px" style="vertical-align:middle;"> Enviar
</button>

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