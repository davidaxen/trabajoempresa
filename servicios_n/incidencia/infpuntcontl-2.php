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

<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1000; /* Sit on top */
  padding: 10px; /* Location of the box */
  left: 0;
  top: 0;
  text-align:center;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* The expanding image container */
.container {
  position: relative;
  display: none;
}

/* Expanding image text */
#imgtext {
  position: absolute;
  bottom: 15px;
  left: 15px;
  color: white;
  font-size: 20px;
}

/* Closable button inside the expanded image */
.closebtn {
  z-index:1005;
  position: absolute;
  top: 10px;
  right: 115px;
  color: white;
  font-size: 35px;
  cursor: pointer;
}
</style>
<div class="modal">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImg" style="width:60%;">
  <div id="imgtext"></div>
</div>




<div id="main">
<div class="titulo">
<p class="enc">INFORME DE INCIDENCIAS</p></div>
<div class="contenido">

<?php 
if ($tipo=="todo"){;
$sinfecha="ok";
}else{
if ($tipo=="anual"){;
$fechaant=date("d/m/Y", mktime(0, 0, 0, 1, 1, $y-1));
$fechaact=date("d/m/Y", mktime(0, 0, 0, 1, 1, $y));
$fechapos=date("d/m/Y", mktime(0, 0, 0, 1, 1, $y+1));
$dant=1;
$dpos=1;
$mant=1;
$mpos=1;
$yant=$y-1;
$ypos=$y+1;
}else{
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
};
};
?>
<table width="400">
<?php 
if($sinfecha=="ok"){;
?>
<tr class="enc">
<td>Busqueda total</td>
</tr>
<?php }else{;?>
<tr class="enc"><td>
<a href="infpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m=<?php  echo $mant;?>&d=<?php  echo $dant;?>&y=<?php  echo $yant;?>&tipo=<?php  echo $tipo;?>&obsbusq=<?php  echo $obsbusq;?>"><img src="../../img/minor-event-icon.png" width="50px"></a>
</td><td><?php  echo $fechaact;?></td><td>
<a href="infpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m=<?php  echo $mpos;?>&d=<?php  echo $dpos;?>&y=<?php  echo $ypos;?>&tipo=<?php  echo $tipo;?>&obsbusq=<?php  echo $obsbusq;?>"><img src="../../img/add-event-icon.png" width="50px"></a>
</td></tr>
<?php };?>
</table>


<table>
<tr class="subenc3"><td colspan="2">Datos del Puesto de Trabajo</td><td colspan="3">
<?php 
if ($idclientes=="todos"){
$nombre="Todos";
}else{
if ($idclientes==0){
$nombre="Fuera del Puesto";
}else{;
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
};
};
?>
<?php  echo $nombre;?>
</td></tr>
<tr class="subenc"><td>Dia</td><td>Hora</td><td>Empleado</td><td>Imagen</td><td>Texto</td><td>Urgente</td><td>Texto Resp Urgente</td></tr>


<?php 
if ($tipo=="todo"){;
//$fechaa=date("Y/m/d", mktime(0, 0, 0, $m, $d, $y));

$sql="SELECT * from almpcinci where idempresas='".$ide."'";
if ($idclientes!='todos'){;
$sql.=" and idpiscina='".$idclientes."'"; 
};
if($sinfecha!="ok"){;
$sql.=" and dia='".$fechaa."'";
};
if($obsbusq!=''){;
$sql.=" and texto like '%".$obsbusq."%'";
};
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$hora=$resultado['hora'];
$idempleado=$resultado['idempleado'];
$texto=$resultado['texto'];
$urgente=$resultado['urgente'];
$textourg=$resultado['textourg'];
$imagen=$resultado['imagen'];
$fechaa=$resultado['dia'];
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
<?php if ($imagen!=""){;?>
<img src="../../img/<?php  echo $imagen;?>"  style="width:25px;height:25px" onclick="myFunction(this);"><?php };?>
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

<?php }else{;?>


<?php 
if ($tipo=="anual"){;
$fechaa=date("Y/m/d", mktime(0, 0, 0, 1, 1, $y));
$fechab=date("Y/m/d", mktime(0, 0, 0, 1, 1, $y+1));

$sql="SELECT * from almpcinci where idempresas='".$ide."'";
if ($idclientes!='todos'){;
$sql.=" and idpiscina='".$idclientes."'"; 
};
if($obsbusq!=''){;
$sql.=" and texto like '%".$obsbusq."%'";
};
$sql.=" and tiempo between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);
for ($i=0;$i<$row;$i++){;
$ki=$i+1;
mysqli_data_seek($result,$i);
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
<?php if ($imagen!=""){;?>
<img src="../../img/<?php  echo $imagen;?>"  style="width:25px;height:25px" onclick="myFunction(this);"><?php };?>
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



<?php }else{;?>




<?php 
if ($tipo=="dia"){;
$fechaa=date("Y/m/d", mktime(0, 0, 0, $m, $d, $y));

$sql="SELECT * from almpcinci where idempresas='".$ide."'";
if ($idclientes!='todos'){;
$sql.=" and idpiscina='".$idclientes."'"; 
};
if($sinfecha!="ok"){;
$sql.=" and dia='".$fechaa."'";
};
if($obsbusq!=''){;
$sql.=" and texto like '%".$obsbusq."%'";
};
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);
for ($i=0;$i<$row;$i++){;
$ki=$i+1;
mysqli_data_seek($result,$i);
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
<?php if ($imagen!=""){;?>
<img src="../../img/<?php  echo $imagen;?>"  style="width:25px;height:25px" onclick="myFunction(this);">
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
}else{;
$fechaa=date("Y/m/d", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y/m/d", mktime(0, 0, 0, $m+1, 1, $y));
$sql="SELECT * from almpcinci where idempresas='".$ide."'";
if ($idclientes!='todos'){;
$sql.=" and idpiscina='".$idclientes."'"; 
};
if($obsbusq!=''){;
$sql.=" and texto like '%".$obsbusq."%'";
};
$sql.=" and tiempo between '".$fechaa."' and '".$fechab."' order by id asc";

//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);
for ($i=0;$i<$row;$i++){;
$ki=$i+1;
mysqli_data_seek($result,$i);
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
<img src="../../img/<?php  echo $imagen;?>"  style="width:25px;height:25px" onclick="myFunction(this);">
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

<?php };?>

<?php };?>
</table>
<p>
<img alt="volver" border="0" src="../../img/Reload-icon.png" width="32px" onclick="history.back()">
<a href="listadoxls.php?tipo=<?php  echo $tipo;?>&idclientes=<?php  echo $idclientes;?>&d=<?php  echo $d;?>&m=<?php  echo $m;?>&y=<?php  echo $y;?>">
<img src="../../img/excel_logo.png" border="0" width="35">
</a>


</div>
</div>

<script>
function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
</script>

<?php } else {;
include ('../../cierre.php');
 };?>