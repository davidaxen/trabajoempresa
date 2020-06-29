<?php  
include('bbdd.php');
if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>
<script>

function mod2(num,numi,numf){
for (i=numi;i<numf+1;i++){
elem1=eval("verf"+i)
if (i==num){
elem1.style.visibility="visible"
}else{
elem1.style.visibility="hidden"
}
}
}

</script>
<div id="main">
<div class="titulo">
<p class="enc">INFORME DE INCIDENCIAS</p></div>
<div class="contenido">

<?php 
if ($tipo=="dia"){;
$fechaant=date("d/m/Y", mktime(0, 0, 0, $m, $d-1, $y));
$fechaact=date("d/m/Y", mktime(0, 0, 0, $m, $d, $y));
$fechapos=date("d/m/Y", mktime(0, 0, 0, $m, $d+1, $y));
$dant=$d-1;
$dpos=$d+1;
$mant=$m;
$mpos=$m;
$yant=$y;
$ypos=$y;
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
</td></tr>
</table>


<table>
<tr class="subenc3"><td colspan="2">Datos del Puesto de Trabajo</td><td colspan="3">
<?php 
if ($idclientes==0){
$nombre="Fuera del Puesto";
}else{;
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
};
?>
<?php  echo $nombre;?>
</td></tr>
<tr class="subenc"><td>Dia</td><td>Hora</td><td>Empleado</td><td>Imagen</td><td>Texto</td><td>Urgente</td><td>Texto Resp Urgente</td></tr>
<?php 
if ($tipo=="dia"){;
$fechaa=date("Y/m/d", mktime(0, 0, 0, $m, $d, $y));

$sql="SELECT * from almpcinci where idempresas='".$ide."' and idpiscina='".$idclientes."' and dia='".$fechaa."'";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);

for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$hora=$resultado['hora'];
$idempleado=$resultado['idempleado'];
$texto=$resultado['texto'];
$urgente=$resultado['urgente'];
$textourg=$resultado['textourg'];
$imagen=$resultado['imagen'];
$yt=fmod($i,2);
?>
<?php if ($yt==0){;?><tr class="fpar"><?php };?>
<?php if ($yt==1){;?><tr class="fimpar"><?php };?>

<td><?php  echo $fechaa;?></td>
<td><?php  echo $hora;?></td>
<td>
<?php 
$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;
$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;
?>
<?php  echo $nempleado;?>
</td>

<td>
<?php  echo $texto;?>
</td>
<td>
<?php if ($urgente==0){;?>NO<?php }else{;?>Sí<?php };?>
</td>
<td>
<?php  echo $textourg;?>
</td>


</tr>

<?php };?>
<?php 
}else{;
$fechaa=date("Y/m/d", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y/m/d", mktime(0, 0, 0, $m+1, 1, $y));
$sql="SELECT * from almpcinci where idempresas='".$ide."' and idpiscina='".$idclientes."' and tiempo between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);

for ($i=0;$i<$row;$i++){;
$ki=$i+1;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$dia=$resultado['dia'];
$hora=$resultado['hora'];
$idempleado=$resultado['idempleado'];
$texto=$resultado['texto'];
$urgente=$resultado['urgente'];
$imagen=$resultado['imagen'];
$textourg=$resultado['textourg'];
$yt=fmod($i,2);
?>
<?php if ($yt==0){;?><tr class="fpar"><?php };?>
<?php if ($yt==1){;?><tr class="fimpar"><?php };?>

<td><?php  echo $dia;?></td>
<td><?php  echo $hora;?></td>
<td>
<?php 
$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;
$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;
?>
<?php  echo $nempleado;?>
</td>
<td>
<?php if ($imagen!=""){;?>
<img src="../../img/ver.gif" onclick="mod2(<?php  echo $ki;?>,1,<?php  echo $row;?>)" ondblclick="mod2(0,1,<?php  echo $row;?>)" title="pincha una vez para ver y dos para quitar" width="25px">


<!--<img src="../../img/<?php  echo $imagen;?>"  onmouseover="this.width=300;this.height=300;"  onmouseout="this.width=50;this.height=50;" width="50" height="50">-->
<?php };?>
</td>
<td>
<?php  echo $texto;?>
</td>

<td>
<?php if ($urgente==0){;?>NO<?php }else{;?>Sí<?php };?>
</td>
<td>
<?php  echo $textourg;?>
</td>

</tr>

<?php };?>

<?php 
};
?>
</table>
<p>
<img alt="volver" border="0" src="../../img/Reload-icon.png" width="32px" onclick="history.back()">
<a href="listadoxls.php?tipo=<?php  echo $tipo;?>&idclientes=<?php  echo $idclientes;?>&d=<?php  echo $d;?>&m=<?php  echo $m;?>&y=<?php  echo $y;?>">
<img src="../../img/excel_logo.png" border="0" width="35">
</a>
<div class="posf2" id="verf0" ></div>
<?php for ($i=0;$i<$row;$i++){;
$ki=$i+1;
$imagen=$resultado['imagen');
?>
<div class="posf2" id="verf<?php  echo $ki;?>" ><img src="../../img/<?php  echo $imagen;?>" width="300" height="300" ></div>
<?php };?>



</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>