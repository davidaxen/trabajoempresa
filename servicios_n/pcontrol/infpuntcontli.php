<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE INCIDENCIAS EN <?php  echo strtoupper($nc);?></p></div>
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

<?php if ($tipo=="dia"){;?>
<table>
<tr class="subenc2"><td>Datos de la Comunidad</td><td>
<?php 

$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 

$result1=$conn->query($sql1);
$resultado1=$result1->fetch();

//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
//$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
?>
<?php  echo $nombre;?>
</td></tr>
<tr class="subenc"><td>Dia</td><td>Hora</td></tr>
<?php 
$fechaa=date("Y-m-d", mktime(0, 0, 0, $m, $d, $y));
$sql="SELECT * from almpcronda where idempresas='".$ide."' and idcliente='".$idclientes."' and (texto!='' or img!='') and dia='".$fechaa."'";
//echo $sql;

$result=$conn->query($sql);
$resultado=$result->fetch();

//$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
//$row=mysqli_num_rows($result);
foreach ($result as $row) {
	$hora=$resultado['hora'];
	$idpcronda=$resultado['id'];
//for ($i=0;$i<$row;$i++){;
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
//$hora=$resultado['hora'];
//$idpcronda=$resultado['id'];
?>
<tr class="subenc"><td><?php  echo $fechaa;?></td>
<td><a href="ipcdhorai.php?idpcronda=<?php  echo $idpcronda;?>&hora=<?php  echo $hora;?>&d=<?php  echo $d;?>&m=<?php  echo $m;?>&y=<?php  echo $y;?>&idclientes=<?php  echo $idclientes;?>&ide=<?php  echo $ide;?>">
<?php  echo $hora;?>
</a>

</td></tr>

<?php };?>
<?php 
}else{;
$fechaa=date("Y-m-d", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y-m-d", mktime(0, 0, 0, $m+1, 0, $y));
$sql="SELECT * from almpcronda where idempresas='".$ide."' and idcliente='".$idclientes."' and idronda='c' and dia between '".$fechaa."' and '".$fechab."' order by id asc";

$result=$conn->query($sql);
$resultado=$result->fetch();

//$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
//$row=mysqli_num_rows($result);
?>


<table width="900">
<tr>
<td width="100">
<a href="infpuntcontli.php?idclientes=<?php  echo $idclientes;?>&m=<?php  echo $mant;?>&d=<?php  echo $dant;?>&y=<?php  echo $yant;?>&tipo=<?php  echo $tipo;?>&idpunt=<?php  echo $idpunt;?>"><img src="../../img/minor-event-icon.png" width="50px"></a>
</td>
<td class="enc" width="400">Datos del Puesto de Trabajo - <b>
<?php 
if ($idclientes=="todos"){;
$nombre="Todos";
}else{;
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 

$result1=$conn->query($sql1);
$resultado1=$result1->fetch();
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
//$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
};
?>
<?php  echo $nombre;?></b>
<br/>
<?php  echo $fechaact;?></td>
<td width="100">
<a href="infpuntcontli.php?idclientes=<?php  echo $idclientes;?>&m=<?php  echo $mpos;?>&d=<?php  echo $dpos;?>&y=<?php  echo $ypos;?>&tipo=<?php  echo $tipo;?>&idpunt=<?php  echo $idpunt;?>"><img src="../../img/add-event-icon.png" width="50px"></a>
</td>
<td><img alt="volver" border="0" src="../../img/Reload-icon.png" width="32px" onclick="history.back()"></td>
</tr>
</table>

<?php 
$yea=$y;
$mes=$m;
$dia=1;

include_once('calene.php');

};
?>





</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>
