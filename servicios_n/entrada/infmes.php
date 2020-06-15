<?php 
$dant=1;
$dpos=1;
$mant=$m1-1;
$mpos=$m1+1;
$yant=$y1;
$ypos=$y1;
switch($m1){;
case 1: $mant=12;$yant=$y1-1;$fechaant="Diciembre ".$yant;$fechaact="Enero ".$y1;$fechapos="Febrero ".$y1;break;
case 2: $fechaant="Enero ".$y1;$fechaact="Febrero ".$y1;$fechapos="Marzo ".$y1;break;
case 3: $fechaant="Febrero ".$y1;$fechaact="Marzo ".$y1;$fechapos="Abril ".$y1;break;
case 4: $fechaant="Marzo ".$y1;$fechaact="Abril ".$y1;$fechapos="Mayo ".$y1;break;
case 5: $fechaant="Abril ".$y1;$fechaact="Mayo ".$y1;$fechapos="Junio ".$y1;break;
case 6: $fechaant="Mayo ".$y1;$fechaact="Junio ".$y1;$fechapos="Julio ".$y1;break;
case 7: $fechaant="Junio ".$y1;$fechaact="Julio ".$y1;$fechapos="Agosto ".$y1;break;
case 8: $fechaant="Julio ".$y1;$fechaact="Agosto ".$y1;$fechapos="Septiembre ".$y1;break;
case 9: $fechaant="Agosto ".$y1;$fechaact="Septiembre ".$y1;$fechapos="Octubre ".$y1;break;
case 10: $fechaant="Septiembre ".$y1;$fechaact="Octubre ".$y1;$fechapos="Noviembre ".$y1;break;
case 11: $fechaant="Octubre ".$y1;$fechaact="Noviembre ".$y1;$fechapos="Diciembre ".$y1;break;
case 12: $mpos=1;$ypos=$y1+1;$fechaant="Noviembre ".$y1;$fechaact="Diciembre ".$y1;$fechapos="Enero ".$ypos;break;
};
?>

<table width="900">
<tr>
<td width="100">
<a href="infpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m1=<?php  echo $mant;?>&d1=<?php  echo $dant;?>&y1=<?php  echo $yant;?>&tipo=<?php  echo $tipo;?>&idpunt=<?php  echo $idpunt;?>"><img src="../../img/minor-event-icon.png" width="50px"></a>
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
<a href="infpuntcontl.php?idclientes=<?php  echo $idclientes;?>&m1=<?php  echo $mpos;?>&d1=<?php  echo $dpos;?>&y1=<?php  echo $ypos;?>&tipo=<?php  echo $tipo;?>&idpunt=<?php  echo $idpunt;?>"><img src="../../img/add-event-icon.png" width="50px"></a>
</td>
<td><img alt="volver" border="0" src="../../img/Reload-icon.png" width="32px" onclick="history.back()"></td>
<td>
<?php 	if ($idpunt=='jornadas'){;?>
<a href="listadoxlst.php?tipo=<?php  echo $tipo;?>&idempleado=Todos&idclientes=<?php  echo $idclientes;?>&di=1&mi=<?php  echo $m1;?>&yi=<?php  echo $y1;?>&df=0&mf=<?php  echo $m1+1;?>&yf=<?php  echo $y1;?>">
<?php  }else{ ?>
<a href="listadoxls.php?tipo=<?php  echo $tipo;?>&idempleado=Todos&idclientes=<?php  echo $idclientes;?>&di=1&mi=<?php  echo $m1;?>&yi=<?php  echo $y1;?>&df=0&mf=<?php  echo $m1+1;?>&yf=<?php  echo $y1;?>">	
	<?php  } ?>
<img src="../../img/excel_logo.png" border="0" width="32px"></a></td>
</tr>
</table>


<?php 
$yea=$y1;
$mes=$m1;
$dia=1;


$fechai=date("Y-m-d", mktime(0, 0, 0, $m1, 1, $y1));
$fechaf=date("Y-m-d", mktime(0, 0, 0, $m1+1, 0, $y1));

if ($idclientes!="todos"){
	
	if ($idpunt=='jornadas'){;
include ('infmest.php');
}else{;
include_once('calen.php');
}




}else{;




if ($idpunt=='jornadas'){;
include ('infmest.php');
}else{;
include ('infmesp.php');
}

}
?>