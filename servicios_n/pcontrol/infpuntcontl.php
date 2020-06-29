<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php 

if (isset($_REQUEST['m1'])) {
	$m = $_REQUEST['m1'];
}else{
	$m = null;
}

if (isset($_REQUEST['d2'])) {
	$d = $_REQUEST['d2'];
}else{
	$d = null;
}


if (isset($_REQUEST['y2'])) {
	$y = $_REQUEST['y2'];
}else{
	$y = null;
}

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

if (isset($_REQUEST['idclientes'])) {
	$idclientes = $_REQUEST['idclientes'];
}else{
	$idclientes = "todos";
}


$sql="SELECT * from almpcronda where idempresas='".$ide."' and idronda='c' ";
$sql.=$sqla; 
$sql.=" and idcliente='".$idclientes."'";
//echo $sql;

$result=$conn->query($sql);
$resultado=$result->fetch();

//$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
//$row=mysqli_num_rows($result);








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



if ($idclientes!='todos'){?>
Datos del Puesto de Trabajo: 
<?php 
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 

$result1=$conn->query($sql1);
$resultado1=$result1->fetch();
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
//$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];


?>
<?php  echo $nombre;?>
<br/>
<?php } ?>
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
<td>Dia</td><td>Hora</td></tr>
</thead>
";
?>


<?php 

foreach ($result as $row) {
	$hora=$row['hora'];
	$idpcronda=$row['id'];
	$dia=$row['dia'];
//for ($i=0;$i<$row;$i++){;
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
//$hora=$resultado['hora'];
//$idpcronda=$resultado['id'];
//$dia=$resultado['dia'];
$ya=strtok($dia,'-');
$ma=strtok('-');
$da=strtok('-');
$yt=fmod($i,2);
?>
<?php if ($yt==0){;?><tr class="fpar" style="text-align:center"><?php };?> 
<?php if ($yt==1){;?><tr class="fimpar" style="text-align:center"><?php };?>


<td><?php  echo $dia;?></td>
<td>
<?php  echo $hora;?>
</td>
<td><a href="ipcdhora.php?idpcronda=<?php  echo $idpcronda;?>&hora=<?php  echo $hora;?>&d=<?php  echo $da;?>&m=<?php  echo $ma;?>&y=<?php  echo $ya;?>&idclientes=<?php  echo $idclientes;?>&ide=<?php  echo $ide;?>">
<img src="../../img/modificar.gif" width="25px">
</a></td>
</tr>

<?php };?>





</div>
</div>

<?php } else {;

include('../../cierre.php');

};?>
