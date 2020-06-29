<?php 
$fechai=date("Y-m-d", mktime(0, 0, 0, $m4i, $d4i, $y4i));
$fechaf=date("Y-m-d", mktime(0, 0, 0, $m4f, $d4f, $y4f));
?>

<table width="900">
<tr>
<td width="100">
&nbsp;
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
Entre <?php  echo $fechai?> y <?php  echo $fechaf?></td>
<td width="100">
&nbsp;
</td>

<td><img alt="volver" border="0" src="../../img/Reload-icon.png" width="32px" onclick="history.back()"></td>
<td>
<?php 	if ($idpunt=='jornadas'){;?>
<a href="listadoxlst.php?tipo=<?php  echo $tipo;?>&idempleado=Todos&idclientes=<?php  echo $idclientes;?>&di=<?php  echo $d4i;?>&mi=<?php  echo $m4i;?>&yi=<?php  echo $y4i;?>&df=<?php  echo $d4f;?>&mf=<?php  echo $m4f;?>&yf=<?php  echo $y4f;?>">
<?php  }else{ ?>
<a href="listadoxls.php?tipo=<?php  echo $tipo;?>&idempleado=Todos&idclientes=<?php  echo $idclientes;?>&di=<?php  echo $d4i;?>&mi=<?php  echo $m4i;?>&yi=<?php  echo $y4i;?>&df=<?php  echo $d4f;?>&mf=<?php  echo $m4f;?>&yf=<?php  echo $y4f;?>">

	<?php  } ?>



<img src="../../img/excel_logo.png" border="0" width="32px"></a></td>
</tr>
</table>
<?php 

if ($idpunt=='jornadas'){;
//echo 'infentret<br/>';
include ('infentret.php');
}else{;
//echo 'infentrep<br/>';
include ('infentrep.php');
}


?>