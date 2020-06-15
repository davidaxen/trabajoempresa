<?php  
include('bbdd.php');
$idpccat=3;
if ($ide!=null){;


include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">


<?php 
$sql1="SELECT * from almenvases where idempresas='".$ide."' and idenvases='".$idenvases."' order by id asc"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$row=mysqli_num_rows($result1);
?>



<table>
<tr class="subenc"><td>Dia</td><td>Cliente / Puesto</td><td>Empleado</td></tr>

<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result1, $i);
$resultado1=mysqli_fetch_array($result1);
$dia=$resultado1['dia'];
$idempleado=$resultado1['idempleado'];
$idclientes=$resultado1['idclientes'];
$yt=fmod($i,2);
?>
<?php if ($yt==0){;?><tr class="fpar"><?php };?> 
<?php if ($yt==1){;?><tr class="fimpar"><?php };?>


<td><?php  echo $dia;?></td>
<td>
<?php 
$sqlsub="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'";
//echo $sqlsub;
$resultsub=mysqli_query ($conn,$sqlsub) or die ("Invalid result0");
$resultadosub=mysqli_fetch_array($resultsub);
$nombre=$resultadosub['nombre'];
?>
<?php  echo $nombre;?>
</td>
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

</tr>

<?php };?>


</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>
