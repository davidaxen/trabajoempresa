<?php  
include('bbdd.php');

if($idruta==''){;
?>
<script>
history.back()
</script>
<?php 
};
?>

<?php if ($ide!=null){;?>
<?php  include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE RUTAS</p></div>
<div class="contenido">

<?php 
if ($tipo=="dia"){;
$fechaant=date("Y-m-d", mktime(0, 0, 0, $m, $d-1, $y));
$fechaact=date("Y-m-d", mktime(0, 0, 0, $m, $d, $y));
$fechapos=date("Y-m-d", mktime(0, 0, 0, $m, $d+1, $y));
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
<table width="900">
<tr><td width="50">
<a href="infpuntcontl.php?idruta=<?php  echo $idruta;?>&m=<?php  echo $mant;?>&d=<?php  echo $dant;?>&y=<?php  echo $yant;?>&tipo=<?php  echo $tipo;?>"><img src="../../img/minor-event-icon.png" width="50px"></a>
</td><td class="enc" width="500">
<?php if ($idclientes!='todos'){;?>
<?php 

$sql1="SELECT * from ruta where idempresas=:ide and idruta=:idruta";
$result1=$conn->prepare($sql1);
$result1->bindParam(':ide',$ide);
$result1->bindParam(':idruta',$idruta);
$result1->execute();

$resultado1=$result1->fetch();

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);*/
$nombre=$resultado1['nombreruta'];
$idempleadoruta=$resultado1['idempleado'];
?>
<?php  echo $nombre;?>
<br/>
<?php };?>
<?php  echo $fechaact;?></td>
<td>
<a href="infpuntcontl.php?idruta=<?php  echo $idruta;?>&m=<?php  echo $mpos;?>&d=<?php  echo $dpos;?>&y=<?php  echo $ypos;?>&tipo=<?php  echo $tipo;?>"><img src="../../img/add-event-icon.png" width="50px"></a>
</td>
<td>
<img alt="volver" border="0" src="../../img/Reload-icon.png" width="32px" onclick="history.back()">
</td>
<td>
<a href="listadoxls.php?tipo=<?php  echo $tipo;?>&idruta=<?php  echo $idruta;?>&d=<?php  echo $d;?>&m=<?php  echo $m;?>&y=<?php  echo $y;?>">
<img src="../../img/excel_logo.png" border="0" width="32px">
</a>
</td>
</tr>
</table>


<table>
<tr><td>Empleado Asignado por el sistema para realizar esta RUTA es:
<?php 
$sqle1="SELECT * from empleados where idempresa=:ide and idempleado=:idempleadoruta";
$resulte1=$conn->prepare($sqle1);
$resulte1->bindParam(':ide',$ide);
$resulte1->bindParam(':idempleadoruta',$idempleadoruta);
$resulte1->execute();
$resultadoe1=$resulte1->fetch();

/*$resulte1=mysqli_query ($conn,$sqle1) or die ("Invalid result1");
$resultadoe1=mysqli_fetch_array($resulte1);*/
$nombree=$resultadoe1['nombre'];
$apellpe=$resultadoe1['1apellido'];
$apellse=$resultadoe1['2apellido'];
?>
<?php  echo $nombree;?>, <?php  echo $apellpe;?>  <?php  echo $apellse;?> 
</td></tr>
</table>




<table>
<?php 
if ($tipo=="dia"){;



$fechaa=date("Y-m-d", mktime(0, 0, 0, $m, $d, $y));

$sql1="select * from clienteruta where  idempresas=:ide and  idruta=:idruta";
$result1=$conn->prepare($sql1);
$result1->bindParam(':ide',$ide);
$result1->bindParam(':idruta',$idruta);
$result1->execute();
$row1=count($result1->fetchAll());

$result1mos=$conn->prepare($sql1);
$result1mos->bindParam(':ide',$ide);
$result1mos->bindParam(':idruta',$idruta);
$result1mos->execute();

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result0");
$row1=mysqli_num_rows($result1);*/

if ($row1==0){;
?>
No tiene ningun cliente asignado para este dia en dicha ruta.

<?php 
}else{;
?>
<tr class="subenc"><td>Cliente</td><td>Empleado</td><td>Hora Entrada</td><td>Hora Salida</td></tr>
<?php 
/*for ($j=0;$j<$row1;$j++){;
mysqli_data_seek($result1, $j);
$resultado1=mysqli_fetch_array($result1);*/
foreach ($result1mos as $row1mos) {
$idclientes=$row1mos['idclientes'];

$sql10="select * from clientes where  idempresas=:ide and  idclientes=:idclientes and estado='1'";
$result10=$conn->prepare($sql10);
$result10->bindParam(':ide',$ide);
$result10->bindParam(':idclientes',$idclientes);
$result10->execute();
$row10=count($result10->fetchAll());

$result10mos=$conn->prepare($sql10);
$result10mos->bindParam(':ide',$ide);
$result10mos->bindParam(':idclientes',$idclientes);
$result10mos->execute();

/*$result10=mysqli_query ($conn,$sql10) or die ("Invalid result0");
$row10=mysqli_num_rows($result10);*/
if ($row10!=0){;
//$resultado10=mysqli_fetch_array($result10);
$resultado10=$result10mos->fetch();
$nombrecliente=$resultado10['nombre'];

$sql="SELECT * from almpc where idempresas=:ide and idpccat='1' and dia=:fechaa and idpiscina=:idclientes";
$sql.=" and idpcsubcat='1'";
$result=$conn->prepare($sql);
$result->bindParam(':ide',$ide);
$result->bindParam(':fechaa',$fechaa);
$result->bindParam(':idclientes',$idclientes);
$result->execute();
$row=count($result->fetchAll());

$resultmos=$conn->prepare($sql);
$resultmos->bindParam(':ide',$ide);
$resultmos->bindParam(':fechaa',$fechaa);
$resultmos->bindParam(':idclientes',$idclientes);
$resultmos->execute();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);*/
			if ($row==0){
				$horaentrada=0;
				$latentrada=0;
				$lonentrada=0;
				$horasalida=0;
				$latsalida=0;
				$lonsalida=0;				
				}else{;
				//$resultado=mysqli_fetch_array($result);
				$resultado=$resultmos->fetch();
				$idemplentrada=$resultado['idempleado'];
							$sqle2="SELECT * from empleados where idempresa=:ide and idempleado=:idempleadoruta";
							$resulte2=$conn->prepare($sqle2);
							$resulte2->bindParam(':ide',$ide);
							$resulte2->bindParam(':idempleadoruta',$idempleadoruta);
							$resulte2->execute();
							$resultadoe2=$resulte2->fetch();

							/*$resulte2=mysql_query ($sqle2) or die ("Invalid result1");
							$resultadoe2=mysqli_fetch_array($resulte2);*/
							$nombree2=$resultadoe2['nombre'];
							$apellpe2=$resultadoe2['1apellido'];
							$apellse2=$resultadoe2['2apellido'];
				$empleadoentrada=$nombree2.', '.$apellpe2.' '.$apellse2;

				$horaentrada=$result[0]['hora'];
				$latentrada=$result[0]['lat'];
				$lonentrada=$result[0]['lon'];

				/*$horaentrada=mysql_result($result,0,'hora');
				$latentrada=mysql_result($result,0,'lat');
				$lonentrada=mysql_result($result,0,'lon');*/
					$sql11="SELECT * from almpc where idempresas=:ide and idpccat='1' and dia=:fechaa and idpiscina=:idclientes";
					$sql11.=" and idpcsubcat='2'";

					$result11=$conn->prepare($sql11);
					$result11->bindParam(':ide',$ide);
					$result11->bindParam(':fechaa',$fechaa);
					$result11->bindParam(':idclientes',$idclientes);
					$result11->execute();

					$row11=count($result11->fetchAll());

					/*$result11=mysqli_query ($conn,$sql11) or die ("Invalid result0");
					$row11=mysql_num_rows($result11);*/
						if ($row11==0){;
						$horasalida=0;
						$latsalida=0;
						$lonsalida=0;
						}else{;
							//$resultado11=mysqli_fetch_array($result11);
							$resultado11=$result11->fetch();
							$horasalida=$resultado11['hora'];
							$latsalida=$resultado11['lat'];
							$lonsalida=$resultado11['lon'];
						};
				};
		



};
?>
<tr><td><?php  echo $nombrecliente;?></td><td><?php  echo $empleadoentrada;?></td><td><?php  echo $horaentrada;?></td><td><?php  echo $horasalida;?></td></tr>

<?php 
};



};
?>




<tr><td colspan='4'>&nbsp;</td></tr>
<tr><td colspan='4'>&nbsp;</td></tr>
<tr><td colspan='4'>&nbsp;</td></tr>
</table>
<?php }else{;?>
<?php 
$yea=$y;
$mes=$m;
$dia=1;

include_once('calen.php');



};
?>


</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>