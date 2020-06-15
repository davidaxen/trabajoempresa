<?php  
include('bbdd.php');
if ($ide!=null){;
 include('../../portada_n/cabecera3.php');
 
 include('combo.php');?>
<div id="main">
<div class="titulo">
<p class="enc">ALTA DE CUADRANTES</p></div>
<div class="contenido">
<?php 
if ($enviar==null){;
?>
<form action="acuadrante.php" method="post">
<?php 

$sql0="select * from clientes where idempresas='".$ide."'";
//echo $sql0;
$result0=mysqli_query ($conn,$sql0) or die ("Invalid result0");
$row0=mysqli_num_rows($result);

?>
<table>
<tr><td>Nombre de Puesto de Trabajo</td></tr>
<tr><td>
<select name="clientes" id="combobox">
<option value=" "> 
<option value="0">Sin determinar
<?php  
for ($j=0; $j<$row0; $j++){;
mysqli_data_seek($result0, $j);
$resultado0=mysqli_fetch_array($result0);
$idp=$resultado0['idclientes'];
$nombrep=$resultado0['nombre'];
?>
<option value="<?php  echo $idp?>"><?php  echo $nombrep?>
<?php };?>
</select></td>
</tr>
<tr><td>Turno</td></tr>
<tr>
<td><select name="turno"><option value="1">Mañana<option value="2">Tarde<option value="3">Noche</select></td>
</tr>
<tr><td>Horas</td></tr>
<tr><td><input type="text" name="horas"></td></tr>
<tr><td>Mes</td></tr>
<td>
<select size="1" name="mes" size="23">
<option value=" "> </option>
<option value="1">Enero</option>
<option value="2">Febrero</option>
<option value="3">Marzo</option>
<option value="4">Abril</option>
<option value="5">Mayo</option>
<option value="6">Junio</option>
<option value="7">Julio</option>
<option value="8">Agosto</option>
<option value="9">Septiembre</option>
<option value="10">Octubre</option>
<option value="11">Noviembre</option>
<option value="12">Diciembre</option>
</select></td>
</tr>

<tr><td>Año</td></tr>
<tr>
<td>
<select name="año">
<option value=" "> 
<?php $today=getdate();
$a=$today['year'];
$b=$a+2;
for ($j=2004;$j<$b;$j++){;?>
<option value="<?php  echo $j?>"><?php  echo $j?>
<?php };?>
</select>
</td></tr>
</table>
<input class="envio" type="submit" name="enviar" value="enviar">
</form>
<?php 

}else{;
$t10=mktime(0,0,0,$mes,1,$año);
$t11=mktime(0,0,0,$mes+1,1,$año);
$t101=date("Y-n-j",mktime(0,0,0,$mes,1,$año));
$t102=date("Y-n-j",mktime(0,0,0,$mes+1,1,$año));
$t=round(($t11-$t10)/86400,0);

$sql0="select idempleado, nombre, 1apellido as pa, 2apellido as sa from empleados where idempresa='".$ide."'";
$sql0.=" and estado='1'";
//echo $sql0;
$result0=mysqli_query ($conn,$sql0) or die ("Invalid result0");
$row0=mysqli_num_rows($result);

$sql10="select idclientes,nombre from clientes where idempresas='".$ide."' and idclientes='".$clientes."'";
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result0");
$nombrep=mysqli_result($result10,0,nombre);
?>
<p>
<form action="intro2.php" method="get" name="form2">
<input type="hidden" name="tabla" value="cuadrante"> 
<table border=0>
<input type="hidden" name="idcomunidad" value="<?php  echo $clientes;?>">
<input type="hidden" name="turno" value="<?php  echo $turno;?>">
<input type="hidden" name="horas" value="<?php  echo $horas;?>">
<input type="hidden" name="dias" value="<?php  echo $t;?>">
<input type="hidden" name="mes" value="<?php  echo $mes;?>">
<input type="hidden" name="año" value="<?php  echo $año;?>">

<tr><td>nombre de la Comunidad</td><td><?php  echo $nombrep;?></td></tr>
<tr><td>Turno</td><td>
<?php switch ($turno){;
case 1: $d="Mañana";$hor00='06:00:00';$hor01='12:00:00';break;
case 2: $d="Tarde";$hor00='13:00:00';$hor01='17:00:00';break;
case 3: $d="Noche";$hor00='18:00:00';$hor01='23:59:00';break;
};
?>
<?php  echo $d;?></td></tr>



<tr><td>Horas</td><td><?php  echo $horas;?></td></tr>
</table>
<table border=0>
<tr class="subenc">
             <td>Dia</td>
             <td>Empleado</td>
 				 <td>Hora</td>
</tr>
<tr>
<?php  for ($f=1;$f<$t+1;$f++){;
$t1=date("j-n-Y D",mktime(0,0,0,$mes,$f,$año));
$t2=date("Y-n-j",mktime(0,0,0,$mes,$f,$año));
$t3=date("N",mktime(0,0,0,$mes,$f,$año));

$sql1a="SELECT * from jornadas where  idempresas='".$ide."' and idclientes='".$clientes."'";
switch($t3){;
case 1: $sql1a.=" and lun='1' ";break;
case 2: $sql1a.=" and mar='1' ";break;
case 3: $sql1a.=" and mie='1' ";break;
case 4: $sql1a.=" and jue='1' ";break;
case 5: $sql1a.=" and vie='1' ";break; 
case 6: $sql1a.=" and sab='1' ";break;
case 7: $sql1a.=" and dom='1' ";break;
};
$sql1a.=" and finicio<='".$t2."' and ffin>='".$t2."' ";
$sql1a.=" and horario<='".$hor01."' and horario>='".$hor00."' ";
$sql1a.="order by horario asc"; 
$result1a=mysqli_query ($conn,$sql1a) or die ("Invalid result 1");
//echo $sql1a;
$row1a=mysqli_num_rows($result1a);
?>

<td><input type="hidden" name="fecha[<?php  echo $f;?>]" value="<?php  echo $t2;?>"><?php  echo $t1;?></td>
<?php  
$sqldf="select * from diasfestivos where año='".$año."' and mes='".$mes."' and dia='".$f."'"; 
$resultdf=mysqli_query ($conn,$sqldf) or die ("Invalid query");
$rowdf=mysqli_num_rows($resultdf);
?>
<td>
<select name="empleados[<?php  echo $f;?>]" <?php if ($rowdf==1){;?>id="menusel"<?php };?> >
<option value=" "> 
<?php  for ($j=0; $j<$row0; $j++){;
mysqli_data_seek($result0, $j);
$resultado0=mysqli_fetch_array($result0);

$idce=$resultado0['idempleado'];
$nombree=$resultado0['nombre'];
$apellidope=$resultado0['pa'];
$apellidose=$resultado0['sa'];
?>
<option value="<?php  echo $idce?>"><?php  echo strtoupper($nombree)?> <?php  echo strtoupper($apellidope)?> <?php  echo strtoupper($apellidose)?>
<?php };?>
</select>
</td>


<td>
<select name="horario[<?php  echo $f;?>]" >
<?php if($row1a>1){;?>
<option value=" ">
<?php };?> 
<?php  for ($ja=0; $ja<$row1a; $ja++){;?>
<?php $hore=mysqli_result($result1a,$ja,horario);?>
<option value="<?php  echo $hore?>"><?php  echo $hore;?>
<?php };?>
</select>
</td>



</tr>
<?php };?>



</table>
<input class="envio" type="submit" name="enviar" value="enviar">
</form>

<?php };?>


</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>