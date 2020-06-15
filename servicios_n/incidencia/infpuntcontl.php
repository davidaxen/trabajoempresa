<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

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
  <img id="expandedImg" style="width:50%" >
  <div id="imgtext"></div>
</div>



<div id="main">
<div class="titulo">
<p class="enc">INFORME DE INCIDENCIAS</</p></div>
<div class="contenido">

<?php 
switch($tipo){;

case 'dia':
if($d!=null){;
$d2=$d;
$m2=$m;
$y2=$y;
};
$fechaant=date("Y-m-d", mktime(0, 0, 0, $m2, $d2-1, $y2));
$fechaact=date("Y-m-d", mktime(0, 0, 0, $m2, $d2, $y2));
$fechapos=date("Y-m-d", mktime(0, 0, 0, $m2, $d2+1, $y2));
$tituloenc="Dia ".$fechaact;
$sqla=" and dia='".$fechaact."' ";
$dant=$d2-1;
$dpos=$d2+1;
$mant=$m2;
$mpos=$m2;
$yant=$y2;
$ypos=$y2;
break;

case 'mes':
if($m!=null){;
$d1=$d;
$m1=$m;
$y1=$y;
};
$fechaant=date("Y-m-d", mktime(0, 0, 0, $m1-1, 1, $y1));
$fechaact=date("Y-m-d", mktime(0, 0, 0, $m1, 1, $y1));
$fechaact2=date("Y-m-d", mktime(0, 0, 0, $m1+1, 0, $y1));
$fechapos=date("Y-m-d", mktime(0, 0, 0, $m1+1, 1, $y1));
$sqla=" and dia between '".$fechaact."' and  '".$fechaact2."' ";
$dant=1;
$dpos=1;
$mant=$m1-1;
$mpos=$m1+1;
$yant=$y1;
$ypos=$y1;
switch($m1){;
case 1: $tituloenc="Enero ".$y1;break;
case 2: $tituloenc="Febrero ".$y1;break;
case 3: $tituloenc="Marzo ".$y1;break;
case 4: $tituloenc="Abril ".$y1;break;
case 5: $tituloenc="Mayo ".$y1;break;
case 6: $tituloenc="Junio ".$y1;break;
case 7: $tituloenc="Julio ".$y1;break;
case 8: $tituloenc="Agosto ".$y1;break;
case 9: $tituloenc="Septiembre ".$y1;break;
case 10: $tituloenc="Octubre ".$y1;break;
case 11: $tituloenc="Noviembre ".$y1;break;
case 12: $tituloenc="Diciembre ".$y1;break;
};


break;

case 'anual':
if($y!=null){;
$d3=$d;
$m3=$m;
$y3=$y;
};
$fechaant=date("Y-m-d", mktime(0, 0, 0, 1, 1, $y3-1));
$fechaact=date("Y-m-d", mktime(0, 0, 0, 1, 1, $y3));
$fechaact2=date("Y-m-d", mktime(0, 0, 0, 0, 0, $y3+1));
$fechapos=date("Y-m-d", mktime(0, 0, 0, 1, 1, $y3+1));
$tituloenc='A&ntilde;o '.$y3;
$sqla=" and dia between '".$fechaact."' and  '".$fechaact2."' ";
$dant=1;
$dpos=1;
$mant=1;
$mpos=1;
$yant=$y3-1;
$ypos=$y3+1;
break;

case 'fentre':
$fechaini=date("Y-m-d", mktime(0, 0, 0, $m4i, $d4i, $y4i));
$fechafin=date("Y-m-d", mktime(0, 0, 0, $m4f, $d4f, $y4f));
$tituloenc='Entre '.$fechaini.' y '.$fechafin;
$sqla=" and dia between '".$fechaini."' and  '".$fechafin."' ";
break;


};



$sql="SELECT * from almpcinci where idempresas='".$ide."' ";
$sql.=$sqla; 
if ($idclientes!='todos'){
$sql.=" and idpiscina='".$idclientes."'";
}
if($obsbusq!=''){;
$sql.=" and texto like '%".$obsbusq."%'";
};
if ($idtrab!='0'){;
$sql.=" and idempleado='".$idtrab."'";
};
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);


?>


<table width="900">
<tr class="enc">
<td width="50">
<?php
if ($tipo!='fentre'){;?>
<a href="infpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m=<?php  echo $mant;?>&d=<?php  echo $dant;?>&y=<?php  echo $yant;?>&tipo=<?php  echo $tipo;?>&idpunt=<?php  echo $idpunt;?>"><img src="../../img/minor-event-icon.png" width="50px"></a>
<?php };?>
</td>
<td width="500">
<?php 
if ($idclientes!='todos'){;?>
Datos del Puesto de Trabajo: 
<?php 
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
?>
<?php  echo $nombre;?>
<br/>
<?php };?>
<?php  echo $tituloenc;?>
</td>
<td width="50">
<?php
if ($tipo!='fentre'){;?>
<a href="infpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m=<?php  echo $mpos;?>&d=<?php  echo $dpos;?>&y=<?php  echo $ypos;?>&tipo=<?php  echo $tipo;?>&idpunt=<?php  echo $idpunt;?>"><img src="../../img/add-event-icon.png" width="50px"></a>
<?php };?>
</td>
<td><img alt="volver" border="0" src="../../img/Reload-icon.png" width="32px" onclick="history.back()"></td>
<td><a href="listadoxls.php?tipo=<?php  echo $tipo;?>&idclientes=<?php  echo $idclientes;?>&d=<?php  echo $d;?>&m=<?php  echo $m;?>&y=<?php  echo $y;?>">
<img src="../../img/excel_logo.png" border="0" width="32px"></a>
</td>
</tr>
</table>
<?php include ('../../js/busqueda.php');?>

<table class="table-bordered table pull-right" id="mytable" cellspacing="0" style="width: 100%;">


<?php
echo "
<table class='table-bordered table pull-right' id='mytable' cellspacing='0' style='width: 100%;'>
<thead><tr class='subenc'>
<?php if ($idclientes=='todos'){;?>
<td>Puesto de Trabajo</td>
<?php };?>
<td>Dia</td><td>Hora</td><td>Empleado</td><td>Imagen</td><td>Texto</td><td>Urgente</td><td>Texto Resp Urgente</td></tr>
</thead>
";
?>


<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$hora=$resultado['hora'];
$idempleado=$resultado['idempleado'];
$texto=$resultado['texto'];
$urgente=$resultado['urgente'];
$textourg=$resultado['textourg'];
$imagen=$resultado['imagen'];
$fechaa=$resultado['dia'];
$idpiscina=$resultado['idpiscina'];
$yt=fmod($i,2);
?>
<?php if ($yt==0){;?><tr class="fpar"><?php };?> 
<?php if ($yt==1){;?><tr class="fimpar"><?php };?>
<?php if ($idclientes=='todos'){;?>
<td>
<?php 
if ($idpiscina==0){
$nombre="Fuera del Puesto";
}else{;
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idpiscina."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
};
?>
<?php  echo strtoupper($nombre);?>
</td>
<?php };?>


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
<?php  echo strtoupper($nempleado);?>
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

include('../../cierre.php');

};?>
