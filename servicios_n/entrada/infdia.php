<?php 
$fechaant=date("d/m/Y", mktime(0, 0, 0, $m2, $d2-1, $y2));
$fechaact=date("d/m/Y", mktime(0, 0, 0, $m2, $d2, $y2));
$fechapos=date("d/m/Y", mktime(0, 0, 0, $m2, $d2+1, $y2));
$dant=$d2-1;
$dpos=$d2+1;
$mant=$m2;
$mpos=$m2;
$yant=$y2;
$ypos=$y2;
?>

<table width="900">
<tr>
<td width="100">
<a href="infpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m2=<?php  echo $mant;?>&d2=<?php  echo $dant;?>&y2=<?php  echo $yant;?>&tipo=<?php  echo $tipo;?>&idpunt=<?php  echo $idpunt;?>"><img src="../../img/minor-event-icon.png" width="50px"></a>
</td>

<?php 
if ($idclientes=="todos"){;
?>
<td class="enc" width="400">Datos de Todos los Puestos de Trabajo<br/>
<?php }else{;?>
<td class="enc" width="400">Datos del Puesto de Trabajo - <b>
<?php 
if ($idclientes<10){;
switch($idclientes){;
case '1':$nombre="Teletrabajo";break;
};
}else{;

$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
};
echo $nombre;?></b>
<br/>
<?php };?>
<?php  echo $fechaact;?></td>
<td width="100">
<a href="infpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m2=<?php  echo $mpos;?>&d2=<?php  echo $dpos;?>&y2=<?php  echo $ypos;?>&tipo=<?php  echo $tipo;?>&idpunt=<?php  echo $idpunt;?>"><img src="../../img/add-event-icon.png" width="50px"></a>
</td>

<td><img alt="volver" border="0" src="../../img/Reload-icon.png" width="32px" onclick="history.back()"></td>
<td>
<?php 	if ($idpunt=='jornadas'){;?>
<a href="listadoxlst.php?tipo=<?php  echo $tipo;?>&idempleado=Todos&idclientes=<?php  echo $idclientes;?>&di=<?php  echo $d2;?>&mi=<?php  echo $m2;?>&yi=<?php  echo $y2;?>&df=0&mf=0&yf=0">
<?php  }else{ ?>
<a href="listadoxls.php?tipo=<?php  echo $tipo;?>&idempleado=Todos&idclientes=<?php  echo $idclientes;?>&di=<?php  echo $d2;?>&mi=<?php  echo $m2;?>&yi=<?php  echo $y2;?>&df=0&mf=0&yf=0">
	<?php  } ?>

<img src="../../img/excel_logo.png" border="0" width="32px"></a></td>
</tr>
</table>

<?php 
$fechaa=date("Y-m-d", mktime(0, 0, 0, $m2, $d2, $y2));


if ($idpunt=='jornadas'){;
include ('infdiat.php');
}else{;
include ('infdiap.php');
}


?>
