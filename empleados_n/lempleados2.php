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
$nc=$resultado31['empleados'];

$sql32="select * from menuadministracionimg where idempresa=:ide";

$result32=$conn->prepare($sql32);
$result32->bindParam(':ide', $ide);
$result32->execute();
$resultado32=$result32->fetch();
//$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);
$ic=$resultado32['empleados'];


include('../portada_n/cabecera2.php');

if (isset($estadoe)==false){
$estadoe=null;
}
?>

<style>
tr:nth-child(even) {
  background-color: #f2f2f2;
}
/*
tr:nth-child(odd) {
  background-color: #fff;
}
*/
</style>

<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE <?php  echo strtoupper($nc);?> <?php if ($estadoe=="0"){;?>DE BAJA<?php };?><?php if ($estadoe=="1"){;?>DE ALTA<?php };?></p></div>
<div class="contenido">


<?php if ($estadoe==null){;?>
<form action="lempleados.php" method="post">
<table>
<tr><td>Estado</td><td>
<select name="estadoe">
<option value="todos">Todos
<option value="1">Alta
<option value="0">Baja
</select>
</td>
</tr>
</table>
<input class="envio" type="submit" name="Enviar" value="enviar">
</form>
<?php }else{;?>


<?php 

if (isset($smart)==false){
$smart=null;
}


$sql1="SELECT * from empleados";
$sql1.=" where idempresa=:ide ";
if ($estadoe!='todos'){;
	$sql1.=" and estado=:estadoe ";
	$sql1.=" order by idempleado asc";

	$result=$conn->prepare($sql1);
	$result->bindParam(':ide', $ide);
	$result->bindParam(':estadoe', $estadoe);
	$result->execute();
}else{
	$sql1.=" order by idempleado asc";
	$result=$conn->prepare($sql1);
	$result->bindParam(':ide', $ide);
	$result->execute();
}

//echo $sql1;



//$result=mysqli_query ($conn,$sql1) or die ("Invalid result1");
//$row=mysqli_num_rows($result);
?>
<table><tr><td><?php include ('../js/busqueda.php');?></td>

<?php if ($estadoe==1){;?>
<td width="150px" align="center"><a href="lempleados2.php?tipo=<?php  echo $tipo;?>&estadoe=0&datos=datos">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/iconlis.png" width="20" height="20" /></div></div><br/>Listado de <?php  echo strtoupper($nc);?><br/> en <b style="color:red">Baja</b></span>
</a></td>
<?php }else{;?>
<td width="150px" align="center"><a href="lempleados2.php?tipo=<?php  echo $tipo;?>&estadoe=1&datos=datos">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/iconlis.png" width="20" height="20" /></div></div><br/>Listado de <?php  echo strtoupper($nc);?><br/> en <b style="color:green">Alta</b></span>
</a></td>
<?php };?>


<td width="150px" align="center"><a href="iempleados.php?tipo=<?php  echo $tipo;?>">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/plus.png" width="20" height="20" /></div></div><br/>Alta de<br/><?php  echo strtoupper($nc);?></span>
</a></td>
<!--
<td width="150px" align="center"><a href="fempleados.php?tipo=<?php  echo $tipo;?>">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/plus.png" width="20" height="20" /></div></div><br/>Alta de <?php  echo strtoupper($nc);?> por Fichero</span>
</a></td>
-->
</tr>
</table>




<?php if ($smart!='si'){;?>
<a href="pdfcartt.php?dato=todo">Carta para todos los empleados</a>
<?php };?>



<table class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab"><td>Nombre Empleado</td><td>NIF</td>
<?php if ($smart!='si'){;?>
<td width="110px">Doc.</td>
<?php 
$encab=array('Entrada / Salida','Incidencia','Mensajes','Alarmas','Tareas Habituales','Tareas Adicionales','Parametros','Existencias','Circuito','Trabajo','Ordenes','Control','Lecturas','Jornadas','Informes','Ruta','Envases','Incidencias +','Seguimiento','Teletrabajo');
$dat=array('entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento','teletrabajo');


$sql10="select * from servicios where idempresa=:ide"; 

$result10=$conn->prepare($sql10);
$result10->bindParam(':ide', $ide);
$result10->execute();
$resultado10=$result10->fetch();

//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result clientes");
//$resultado10=mysqli_fetch_array($result10);

for ($rt=0;$rt<count($encab);$rt++){;
$valoref=$resultado10[$dat[$rt]];
if ($valoref=='1'){;?>
<td><?php  echo $encab[$rt];?></td>
<?php };
};
?>
<?php }else{;?>
<td>Codigos QR</td>
<!--<td>Codigos DM</td>-->
<?php };?>

</tr>
</thead>


<?php 
$i=0;
foreach ($result as $row) {

//for ($i=0; $i<$row; $i++){;
//mysqli_data_seek($result,$i);
//$resultado=mysqli_fetch_array($result);
?>
<tr class="dattab">
<?php 
$idempleado=$row['idempleado'];
$nombre=$row['nombre'];
$apellido1=$row['1apellido'];
$apellido2=$row['2apellido'];
$nif=$row['nif'];
$nomempl=$nombre.' '.$apellido1.' '.$apellido2;
?>
<td><?php  echo strtoupper($nomempl);?>
</td>
<td><?php  echo strtoupper($nif);?></td>
<?php if ($smart!='si'){;?>
<td>

<a href="pdfcartt.php?dato=<?php  echo $idempleado;?>"><img src="../img/iconlis.png" border=0 width="25px" title="carta"></a>
<a href="modempleados.php?idempleado=<?php  echo $idempleado;?>&tipo=<?php  echo $tipo;?>"><img src="../img/pencil.png" border=0 width="25px" title="modificar"></a>
<a href="pdfemplcode.php?idempl=<?php  echo $idempleado;?>&pis=g" target="_blank"><img src="../img/iconqr.png" border=0 width="25px" title="codigos qr folio"></a>
<a href="dymo.php?idempl=<?php  echo $idempleado;?>&pis=g&nomempl=<?php  echo $nomempl;?>" target="_blank"><img src="../img/dymo.png" border=0 width="25px" title="codigos qr etiquetas"></a>




</td>
<?php };?>

<?php if ($smart=='si'){;?>

<?php if ($tipo=='alta'){;?>
<td>
<a href="pdfemplcode.php?idempl=<?php  echo $idempleado;?>" target="_blank"><img src="../img/carnet.png" border="0" width="25" height="20"></a>
<!--<a href="pdfemplcode2.php?idempl=<?php  echo $idempleado;?>"><img src="../img/codbarra.png" border="0" width="25" height="20"></a>-->
<a href="dymo.php?idempl=<?php  echo $idempleado;?>&nomempl=<?php  echo $nomempl;?>"><img src="../img/dymo.png" border="0" width="25" height="20"></a>
</td>


<!--
<td>
<a href="pdfemplcodeDM.php?idempl=<?php  echo $idempleado;?>" target="_blank"><img src="../img/carnet.png" border="0" width="25" height="20"></a>
-->
<!--<a href="pdfemplcode2.php?idempl=<?php  echo $idempleado;?>"><img src="../img/codbarra.png" border="0" width="25" height="20"></a>-->
<!--
<a href="dymoDM.php?idempl=<?php  echo $idempleado;?>&nomempl=<?php  echo $nomempl;?>"><img src="../img/dymo.png" border="0" width="25" height="20"></a>
</td>
-->
<?php };?>

<!--<td><a href="ldatosempl.php?idempl=<?php  echo $idempleado;?>"><img src="../img/ver.gif" border="0" width="20"></a></td>-->

<?php }else{;?>


<?php 
for ($rt=0;$rt<count($encab);$rt++){;
$valoref=$resultado10[$dat[$rt]];	
if ($valoref=='1'){;?>
<td align="center">
<?php $valortg=$row[$dat[$rt]];?>
<input type="radio" name="<?php  echo $dat[$rt];?>[<?php  echo $i;?>]" value="1" <?php if ($valortg==1){;?>checked="checked"<?php };?>  disabled>
</td>
<?php };
};
?>

<?php };?>

</tr>
<?php 
$i=$i+1;
};?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</div>

<?php };?>


<?php }else{;
include ('../cierre.php');
 };?>
