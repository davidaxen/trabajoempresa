<?php 
$fechaant=date("Y", mktime(0, 0, 0, 1, 1, $y3-1));
$fechaact=date("Y", mktime(0, 0, 0, 1, 1, $y3));
$fechapos=date("Y", mktime(0, 0, 0, 1, 1, $y3+1));
$dant=1;
$dpos=1;
$mant=1;
$mpos=1;
$yant=$y3-1;
$ypos=$y3+1;
?>

<table width="900">
<tr>
<td width="100">
<a href="infpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m3=<?php  echo $mant;?>&d3=<?php  echo $dant;?>&y3=<?php  echo $yant;?>&tipo=<?php  echo $tipo;?>&idpunt=<?php  echo $idpunt;?>"><img src="../../img/minor-event-icon.png" width="50px"></a>
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
<a href="infpuntcontle.php?idclientes=<?php  echo $idclientes;?>&m3=<?php  echo $mpos;?>&d3=<?php  echo $dpos;?>&y3=<?php  echo $ypos;?>&tipo=<?php  echo $tipo;?>&idpunt=<?php  echo $idpunt;?>"><img src="../../img/add-event-icon.png" width="50px"></a>
</td>

<td><img alt="volver" border="0" src="../../img/Reload-icon.png" width="32px" onclick="history.back()"></td>
<td>
<?php 	if ($idpunt=='jornadas'){;?>
<a href="listadoxlst.php?tipo=<?php  echo $tipo;?>&idempleado=Todos&idclientes=<?php  echo $idclientes;?>&di=1&mi=1&yi=<?php  echo $y3;?>&df=0&mf=1&yf=<?php  echo $y3+1;?>">
<?php  }else{ ?>
<a href="listadoxls.php?tipo=<?php  echo $tipo;?>&idempleado=Todos&idclientes=<?php  echo $idclientes;?>&di=1&mi=1&yi=<?php  echo $y3;?>&df=0&mf=1&yf=<?php  echo $y3+1;?>">
	<?php  } ?>





<img src="../../img/excel_logo.png" border="0" width="32px"></a></td>
</tr>
</table>

<?php 
$fechai=date("Y-m-d", mktime(0, 0, 0, 1, 1, $y3));
$fechaf=date("Y-m-d", mktime(0, 0, 0, 1, 0, $y3+1));



if ($idpunt=='jornadas'){;
include ('infanualt.php');
}else{;
include ('infanualp.php');
}


?>