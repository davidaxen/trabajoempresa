<?php  
include('bbdd.php');
if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES CON <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<table><tr><td><?php include ('../../js/busqueda.php');?></td>
<td>
<div class="main">
<?php if ($dat=="h"){;?>
<a href="dpuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Creacion</span></a>
</td></tr>
</table>

<!--
<a href="infpuntcont1.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Seguimiento</span></a>
-->
<p>
Listado de <?php echo ucfirst($nc);?>
<table class="table-bordered table pull-right" id="mytable">
<tr class="enctab"><td>Nombre del Empleado</td><td>Dia</td><td>Texto</td></tr>
<?php 
$sql="SELECT * from mensajes where idempresa='".$ide."' and respondido='0' order by dia desc";
//echo $sql;
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);

for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$idempleado=$rowmos['idempleado'];
$dia=$rowmos['dia'];
$texto=$rowmos['texto'];



$sql2="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
$result2=$conn->query($sql2);
$result2mos=$conn->query($sql2);
$resultado2=$result2mos->fetch();
$fetchAll2=$result2->fetchAll();
$row2=count($fetchAll2);

/*$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);
$resultado2=mysqli_fetch_array($result2);*/
//echo $row2;
if ($row2!=0){;
$nombre=$resultado2['nombre'];
$apellidop=$resultado2['1apellido'];
$apellidos=$resultado2['2apellido'];
$nombret=$nombre.' '.$apellidop.' '.$apellidos;
}else{;
$nombret="sin datos";
};
?>
<tr class="dattab"><td><?php  echo strtoupper($nombret);?></td><td><?php  echo $dia;?></td><td><?php  echo $texto;?></td></tr>

<?php };?>

</table>





<?php };?>
<?php if ($dat=="i"){;?>
<a href="infpuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Enviados a Trabajador</span></a>

<a href="infpuntcont2.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Enviados por Fecha</span></a>
<?php };?>
</div>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>
