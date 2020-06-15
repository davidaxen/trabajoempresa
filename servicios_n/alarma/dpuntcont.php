<?php  
include('bbdd.php');
if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES CON <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php if ($dat=="h"){;?>
<div class="main">
<span class="caja2">Acciones</span>
<a href="ipuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Enviar Alarmas</span></a>
<!--
<a href="mpuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/pencil.png" width="30" height="30" />
</div>
</div>
<br/>Modificación de Alarmas</span></a>
-->
</div>
<?php };?>

<?php if ($dat=="i"){;?>
<div class="main">
<span class="caja2">Informe</span>
<a href="infpuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Ver de Informe</span></a>
</div>
<?php };?>
<br/>
Listado de <?php  echo ucfirst($nc);?>
<?php
$sql="SELECT * from alarma where idempresas='".$ide."' and diaresp='0000-00-00'"; 
/*
if ($idclientes!='todos'){;
$sql.=" and idclientes='".$idclientes."'";
};
$sql.=" and dia between '".$fechaa."' and '".$fechab."' order by id asc";
*/
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);
?>
<?php if ($row!=0){;?>
<table>
<tr class="subenc"><td>Dia</td><td>Hora</td><td>Puestos de Trabajo</td><td>Mensaje</td><td>Opciones</td></tr>
<?php }else{;?>
<center><h4>No hay datos que mostrar.</h4></center>
<?php };?>

<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idalarma=$resultado['id'];
$dm=$resultado['d'];
$mm=$resultado['m'];
$ym=$resultado['y'];
$hm=$resultado['h'];
$minm=$resultado['min'];
$segm=$resultado['seg'];
$diat=$dm.'-'.$mm.'-'.$ym;
$horat=$hm.':'.$minm.':'.$segm;
$user=$resultado['user'];
$mensaje=$resultado['mensaje'];
$respuesta=$resultado['respuesta'];
$idempleado=$resultado['idempleados'];
$idclientes=$resultado['idclientes'];
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
?>
<tr class="subenc">
<td><?php  echo $diat;?></td>
<td><?php  echo $horat;?></td>
<td>
<?php 
/*
if ($idempleado!=0){;
$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;
$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;
echo $nempleado;
};
*/
?>
<?php  echo $nombre;?>
</td>
<td><?php  echo $mensaje;?></td>
<td><a href="modpuntcont.php?idalarma=<?php  echo $idalarma;?>"><img src="../../img/pencil.png" width="20px"></a></td>
</tr>

<?php };?>
</table>

</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>
