<?php 
include('bbdd.php');
$idpccat=3;
if ($ide!=null){;
include('../../../portada_n/cabecera4.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES DE ORDENES</p></div>
<div class="contenido">

<?
if ($idsiniestro==null){;
?>

<form action="accpuntcont.php" method="post">


<?
$sql="SELECT * from trabajos where idempresa='".$ide."' ";
$sql.="and terminado='0'";
$result=mysqli_query($conn,$sql) or die ("Invalid result");
//echo $sql;
$row=mysqli_num_rows($result);
if ($row!=0){;?>
<table>
<tr><td>Numero de Trabajo</td><td>
<select name="idsiniestro">
<?
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$idsiniestro=$resultado['idsiniestro'];
$numsiniestro=$resultado['numsiniestro'];
?>
<option value="<?=$idsiniestro;?>"><?=$numsiniestro;?>
<?};?>
</select></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?}else{;?>
<table><tr><td>
No tiene trabajos sin terminar.
</td></tr></table>
<?};?>


<?} else {;?>

<table>

<tr class="subenc3"><td><h3>Datos actuales del Trabajo</h3></td></tr>
<?
$sql="SELECT * from trabajos where idempresa='".$ide."' and idsiniestro='".$idsiniestro."'"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$numsiniestro=$resultado['numsiniestro'];
$idaseguradora=$resultado['idaseguradora'];
$contacto=$resultado['contacto'];
//$telefono=$resultado['telefono'];
//$direccion=$resultado['direccion'];
//$localidad=$resultado['localidad'];
//$provincia=$resultado['provincia'];
//$cp=$resultado['cp'];
$descripcion=$resultado['descripcion'];
$idempleado=$resultado['idempleado'];
$diaasig=$resultado['diaasignacion'];
$horaasig=$resultado['horaasignacion'];

$sql10="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idaseguradora."'"; 
$result10=mysqli_query($conn,$sql10) or die ("Invalid result");
$resultado10=mysqli_fetch_array($result10);
$nombrecontacto=$resultado10['nombre'];


?>
<tr><td>
<table>
<tr class="subenc5"><td>Num. Trabajo</td><td>Puesto de Trabajo</td><td>Descripcion</td></tr>
<tr>
<td><?=$numsiniestro;?></td>
<td><?=$nombrecontacto;?></td>
<td colspan="3"><?=$descripcion;?></td>
</tr>
</table>
<td></tr>
</table>

<table>

<tr class="subenc3"><td><h3>Acciones Realizadas</h3></td></tr>
<?
$sql="SELECT * from acctrabajos where idempresa='".$ide."' and idsiniestro='".$idsiniestro."'"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
if ($row==0){;
?>
<tr><td>Ninguna Acción Realizada.</td></tr>
<?
}else{;?>
<tr><td>
<table>
<tr class="subenc5">
<td width="150">Trabajador</td>
<td width="150">Dia y Hora de Entrada</td>
<td width="150">Dia y Hora de Salida</td>
<td width="350">Descripcion inicial</td>
<td width="350">Trabajos Realizados</td>
<td width="350">Trabajos Pendientes</td>
</tr>
<?
for ($t=0;$t<$row;$t++){;
mysqli_data_Seek($result, $t);
$resultado=mysqli_fetch_array($result);
$id=$resultado['id'];
$trabajor=$resultado['trabajorealizado'];
$trabajop=$resultado['trabajopendiente'];
$descripcion1=$resultado['descripcion'];
$diaent=$resultado['diaentrada'];
$horaent=$resultado['horaentrada'];
$diasal=$resultado['diasalida'];
$horasal=$resultado['horasalida'];
$idempleado=$resultado['idempleado'];

$sql2="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 
$result2=mysqli_query($conn,$sql2) or die ("Invalid result");
$resultado2=mysqli_fetch_array($result2);
$nombre=$resultado2['nombre'];
$priapellido=$resultado2['1apellido'];
$segapellido=$resultado2['2apellido'];
?>


<tr>
<td valign="top"><?=$nombre;?>, <?=$priapellido;?> <?=$segapellido;?></td>
<td valign="top"><?=$diaent;?><br/><?=$horaent;?></td>
<td valign="top"><?=$diasal;?><br/><?=$horasal;?></td>
<td valign="top"><?=$descripcion1;?>
<?
$sqldes="SELECT * from imgtrabajos where idempresa='".$ide."' and idsiniestro='".$idsiniestro."' and dia='".$diaent."' and taccion='1'"; 
$resultdes=mysqli_query($conn,$sqldes) or die ("Invalid result");
$rowdes=mysqli_num_rows($resultdes);
if ($rowdes!=0){;
?>
<p>
<?
		for ($tdes=0;$tdes<$rowdes;$tdes++){;
				mysqli_data_seek($resultdes, $tdes);
				$resultadodes=mysqli_fetch_array($resultdes);
				$imgsiniestro=$resultadodes['imgsiniestro'];?>
<img src="../../../img/<?=$imgsiniestro;?>" width="150 px" onclick="window.open('../../../img/<?=$imgsiniestro;?>','','top=200,left=200,width=250,height=250')"><p>
<?
		};

};

?>
</td>


<td valign="top"><?=$trabajor;?>
<?
$sqldes="SELECT * from imgtrabajos where idempresa='".$ide."' and idsiniestro='".$idsiniestro."' and dia='".$diaent."' and taccion='2'"; 
$resultdes=mysqli_query($conn,$sqldes) or die ("Invalid result");
$rowdes=mysqli_num_rows($resultdes);
if ($rowdes!=0){;
?>
<p>
<?
		for ($tdes=0;$tdes<$rowdes;$tdes++){;
				mysqli_data_seek($resultdes, $tdes);
				$resultadodes=mysqli_fetch_array($resultdes);
				$imgsiniestro=$resultadodes['imgsiniestro'];?>
<img src="../../../img/<?=$imgsiniestro;?>" width="150 px" onclick="window.open('../../../img/<?=$imgsiniestro;?>','','top=200,left=200,width=250,height=250')"><p>
<?
		};

};

?>
</td>
<td valign="top"><?=$trabajop;?>

<?
$sqldes="SELECT * from imgtrabajos where idempresa='".$ide."' and idsiniestro='".$idsiniestro."' and dia='".$diaent."' and taccion='3'"; 
$resultdes=mysqli_query($conn,$sqldes) or die ("Invalid result");
$rowdes=mysqli_num_rows($resultdes);
if ($rowdes!=0){;
?>
<p>
<?
		for ($tdes=0;$tdes<$rowdes;$tdes++){;
				mysqli_data_seek($resultdes, $tdes);
				$resultadodes=mysqli_fetch_array($resultdes);
				$imgsiniestro=$resultadodes['imgsiniestro'];?>
<img src="../../../img/<?=$imgsiniestro;?>" width="150 px" onclick="window.open('../../../img/<?=$imgsiniestro;?>','','top=200,left=200,width=250,height=250')"><p>
<?
		};

};

?>


</td>



</tr>

<?};?>
</table>
</td></tr>
<?};?>
</table>
<table>
<tr class="subenc3"><td><h3>Parte de Trabajo</h3></td><td valign="top"><a href="pdfparte.php?idsiniestro=<?=$idsiniestro;?>"><img src="../../../img/modificar.gif"></a></td></tr>
</table>
<table>
<tr class="subenc3"><td><h3>Asignacion de Trabajo</h3></td></tr>


<?
$sql2="SELECT * from empleados where idempresa='".$ide."' and estado='1'"; 
if ($idempleado!=0){;
$sql2.=" and idempleado='".$idempleado."'";
};
$result2=mysqli_query($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);
?>
<tr><td>
<table>
<tr class="subenc5"><td>Empleado</td><td>Dia</td><td>Hora</td></tr>
<tr><td>
<?
				$resultado2=mysqli_fetch_array($result2);
$idempleado=$resultado2['idempleado'];
$nombre=$resultado2['nombre'];
$priapellido=$resultado2['1apellido'];
$segapellido=$resultado2['2apellido'];
?>
<?=$nombre;?>, <?=$priapellido;?> <?=$segapellido;?>
</td>
<td><?=$diaasig;?></td><td><?=$horaasig;?></td></tr>
</table>
</td></tr>
</table>


<?};?>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</div>

<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://www.smartcbc.com">aquí</a>

<?};?>
