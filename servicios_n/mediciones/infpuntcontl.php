<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php 
if ($tipo=="anual"){;
$fechaant=date("Y", mktime(0, 0, 0, 1, 1, $y-1));
$fechaact=date("Y", mktime(0, 0, 0, 1, 1, $y));
$fechapos=date("Y", mktime(0, 0, 0, 1, 1, $y+1));
$dant=1;
$dpos=1;
$mant=1;
$mpos=1;
$yant=$y-1;
$ypos=$y+1;
}else{;
$dant=1;
$dpos=1;
$mant=$m-1;
$mpos=$m+1;
$yant=$y;
$ypos=$y;
switch($m){;
case 1: $mant=12;$yant=$y-1;$fechaant="Diciembre ".$yant;$fechaact="Enero ".$y;$fechapos="Febrero ".$y;break;
case 2: $fechaant="Enero ".$y;$fechaact="Febrero ".$y;$fechapos="Marzo ".$y;break;
case 3: $fechaant="Febrero ".$y;$fechaact="Marzo ".$y;$fechapos="Abril ".$y;break;
case 4: $fechaant="Marzo ".$y;$fechaact="Abril ".$y;$fechapos="Mayo ".$y;break;
case 5: $fechaant="Abril ".$y;$fechaact="Mayo ".$y;$fechapos="Junio ".$y;break;
case 6: $fechaant="Mayo ".$y;$fechaact="Junio ".$y;$fechapos="Julio ".$y;break;
case 7: $fechaant="Junio ".$y;$fechaact="Julio ".$y;$fechapos="Agosto ".$y;break;
case 8: $fechaant="Julio ".$y;$fechaact="Agosto ".$y;$fechapos="Septiembre ".$y;break;
case 9: $fechaant="Agosto ".$y;$fechaact="Septiembre ".$y;$fechapos="Octubre ".$y;break;
case 10: $fechaant="Septiembre ".$y;$fechaact="Octubre ".$y;$fechapos="Noviembre ".$y;break;
case 11: $fechaant="Octubre ".$y;$fechaact="Noviembre ".$y;$fechapos="Diciembre ".$y;break;
case 12: $mpos=1;$ypos=$y+1;$fechaant="Noviembre ".$y;$fechaact="Diciembre ".$y;$fechapos="Enero ".$ypos;break;
};
};
?>
<table width="400">
<tr class="enc"><td>
<a href="infpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m=<?php  echo $mant;?>&d=<?php  echo $dant;?>&y=<?php  echo $yant;?>&tipo=<?php  echo $tipo;?>"><img src="../../img/minor-event-icon.png" width="50px"></a>
</td><td><?php  echo $fechaact;?></td><td>
<a href="infpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m=<?php  echo $mpos;?>&d=<?php  echo $dpos;?>&y=<?php  echo $ypos;?>&tipo=<?php  echo $tipo;?>"><img src="../../img/add-event-icon.png" width="50px"></a>
</td>
<td><img alt="volver" border="0" src="../../img/Reload-icon.png" width="32px" onclick="history.back()"></td>
<td><a href="listadoxls.php?tipo=<?php  echo $tipo;?>&idclientes=<?php  echo $idclientes;?>&d=<?php  echo $d;?>&m=<?php  echo $m;?>&y=<?php  echo $y;?>">
<img src="../../img/excel_logo.png" border="0" width="35">
</a>
</td>
</tr>
</table>


<table>
<tr class="subenc2"><td>Datos del Cliente</td><td>
<?php 

$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
?>
<?php  echo $nombre;?>
</td></tr>
</table>
<?php 
$sql10="SELECT * from puntservicios where idempresas='".$ide."' and idpccat='10'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result10");
$row10=mysqli_num_rows($result10);


for($th=0;$th<$row10;$th++){;
mysqli_data_seek($result10, $th);
$resultado10=mysqli_fetch_array($result10);
$nombresub=$resultado10['subcategoria'];
$idpcsubcat=$resultado10['idpcsubcat'];
?>


<table>
<tr class="subenc2"><td>Tipo de Lectura</td><td><?php  echo $nombresub;?>
</td></tr>
</table>

<?php 
if ($tipo=="anual"){;
?>

<table>
<tr class="subenc"><td>Punto de Lectura</td>
<td>Enero</td><td>Febrero</td><td>Marzo</td><td>Abril</td><td>Mayo</td><td>Junio</td>
<td>Julio</td><td>Agosto</td><td>Septiembre</td><td>Octubre</td><td>Noviembre</td><td>Diciembre</td>
</tr>

<?php 
$sql20="SELECT * from puntoslectura where idempresas='".$ide."' and idclientes='".$idclientes."'";
//echo $sql;
$result20=mysqli_query ($conn,$sql20) or die ("Invalid result20");
$row20=mysqli_num_rows($result20);

for ($i=0;$i<$row20;$i++){;
mysqli_data_seek($result20, $i);
$resultado20=mysqli_fetch_array($result20);
$nombrep=$resultado20['nombre'];
$idpuntoslectura=$resultado20['idpuntoslectura'];
?>
<td><?php  echo $nombrep;?></td>

<?php 
for($tj=1;$tj<13;$tj++){;
$fechaa=date("Y-m-d", mktime(0, 0, 0, $tj, 1, $y));
$fechab=date("Y-m-d", mktime(0, 0, 0, $tj+1, 0, $y));
$sql="SELECT * from almpc where idempresas='".$ide."' and idpiscina='".$idclientes."' and idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idpuntomed='".$idpuntoslectura."' and dia between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row25=mysqli_num_rows($result);
if($row25==0){;
$cantidad=0;
}else{;
$resultado=mysqli_fetch_array($result);
$cantidad=$resultado['cantidad'];
};
?>


<td><?php  echo $cantidad;?></td>
<?php };?>
</tr>

<?php };?>
<?php 
}else{;
?>
<table>
<tr class="subenc"><td>Punto de Lectura</td><td>Lectura</td></tr>

<?php 
$sql20="SELECT * from puntoslectura where idempresas='".$ide."' and idclientes='".$idclientes."'";
//echo $sql;
$result20=mysqli_query ($conn,$sql20) or die ("Invalid result20");
$row20=mysqli_num_rows($result20);

for ($i=0;$i<$row20;$i++){;
mysqli_data_seek($result20, $i);
$resultado20=mysqli_fetch_array($result20);
$nombrep=$resultado20['nombre'];
$idpuntoslectura=$resultado20['idpuntoslectura'];



$fechaa=date("Y-m-d", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y-m-d", mktime(0, 0, 0, $m+1, 0, $y));
$sql="SELECT * from almpc where idempresas='".$ide."' and idpiscina='".$idclientes."' and idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idpuntomed='".$idpuntoslectura."' and dia between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row25=mysqli_num_rows($result);
?>

<td><?php  echo $nombrep;?></td>
<?php 
for ($ty=0;$ty<$row25;$ty++){;
if($row25==0){;
$cantidad=0;
}else{;
mysqli_data_seek($result, $ty);
$resultado=mysqli_fetch_array($result);
$cantidad=$resultado['cantidad'];
};
?>
<td><?php  echo $cantidad;?></td>
<?php };?>

</tr>

<?php };?>

<?php 
};
?>
</table>


<?php };?>

</div>
</div>



<?php } else {;
include ('../../cierre.php');
 };?>