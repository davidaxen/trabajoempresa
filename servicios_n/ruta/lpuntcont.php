<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE RUTAS</p></div>
<div class="contenido">

<?php 
if ($enviar==null){;

$sql2="SELECT * from ruta where idempresas='".$ide."' order by idruta asc"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);

if ($row2!=0){;?>
<table><tr><td>Tienes las siguientes rutas introducidas:</td></tr></table>
<table>
<tr class="enca"><td>Cod. Ruta</td><td>Nombre</td><td>Activo</td><td>Opcion</td></tr>
<?php  for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2, $t);
$resultado2=mysqli_fetch_array($result2);
$idruta=$resultado2['idruta'];
$nombreruta=$resultado2['nombreruta'];
$activo=$resultado2['estado'];
if ($t==$row2-1){;
$ultpunto=$idruta;
};
?>
<tr><td><?php  echo $idruta;?></td><td><?php  echo $nombreruta;?></td>
<td>
<?php if ($activo==1){;?>Si<?php }else{;?>No<?php };?>
</td>
<td><a href="lpuntcont.php?enviar=enviar&idruta=<?php  echo $idruta;?>"><img src="../../img/modificar.gif"></a></td></tr>
<?php };?>
</table>
<img alt="volver" border="0" src="../../img/arrow_cycle.png" onclick="history.back()">

<?php }else{;?>

No tienes dado de alta ningún punto

<?php };?>
<?php } else {;?>
<?php 
$sql3="SELECT * from ruta where idempresas='".$ide."' and idruta='".$idruta."'"; 
$result3=mysqli_query ($conn,$sql3) or die ("Invalid result 3");
$resultado3=mysqli_fetch_array($result3);
$idruta=$resultado3['idruta'];
$nombreruta=$resultado3['nombreruta'];
$activo=$resultado3['estado'];
$lun=$resultado3['lun'];
$mar=$resultado3['mar'];
$mie=$resultado3['mie'];
$jue=$resultado3['jue'];
$vie=$resultado3['vie'];
$sab=$resultado3['sab'];
$dom=$resultado3['dom'];
$idempleado=$resultado3['idempleado'];
?>

<table>


<tr><td>Nombre de Ruta</td>
<td>Estado</td>
<td>Empleado</td>
<td>
<table>
<tr><td colspan="7">Dia de la Semana</td></tr>
<tr>
<td>Lu.</td>
<td>Ma.</td>
<td>Mi.</td>
<td>Ju.</td>
<td>Vi.</td>
<td>Sa.</td>
<td>Do.</td>
</tr>
</table>
</td>

</tr>

<tr>
<td><?php  echo $nombreruta;?></td>
<td><?php if ($activo==1){;?>Activo<?php }else{;?>Inactivo<?php };?></td>
<td>


<?php 
$sql="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 
/*$sql.=" and estado='1'";*/
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
?>
<?php 
$resultado=mysqli_fetch_array($result);
$idempl=$resultdo['idempleado'];
$nombre=$resultado['nombre'];
$priape=$resultado['1apellido'];
$segape=$resultado['2apellido'];
?>
<?php  echo $nombre;?>, <?php  echo $priape;?> <?php  echo $segape;?>

</td>




<td>
<table>
<tr>
<td><input type="checkbox" value="1" name="lunn" <?php if ($lun=='1'){;?>checked<?php };?> disabled ></td>
<td><input type="checkbox" value="1" name="marn" <?php if ($mar=='1'){;?>checked<?php };?> disabled ></td>
<td><input type="checkbox" value="1" name="mien" <?php if ($mie=='1'){;?>checked<?php };?> disabled ></td>
<td><input type="checkbox" value="1" name="juen" <?php if ($jue=='1'){;?>checked<?php };?> disabled ></td>
<td><input type="checkbox" value="1" name="vien" <?php if ($vie=='1'){;?>checked<?php };?> disabled ></td>
<td><input type="checkbox" value="1" name="sabn" <?php if ($sab=='1'){;?>checked<?php };?> disabled ></td>
<td><input type="checkbox" value="1" name="domn" <?php if ($dom=='1'){;?>checked<?php };?> disabled ></td>
</tr>
</table>
</td> 
</table>


<?php 
$sql21="SELECT * from clienteruta where idempresas='".$ide."' and idruta='".$idruta."'"; 
$result21=mysqli_query ($conn,$sql21) or die ("Invalid result");
$row21=mysqli_num_rows($result21);

if ($row21==0){;
?>
No tienes ning&uacuten cliente asignado, pincha <a href="apuntcont.php"> aqui </a> para asignar clientes
<?php 
}else{;
?>
<table>
<tr><td colspan="2">Clientes dentro de Ruta</td></tr>
<?php 
for ($ty=0;$ty<$row21;$ty++){;
mysqli_data_seek($result21,$ty);
$resultado21=mysqli_fetch_array($result21);
$idclientes=$resultado21['idclientes'];

$sql23="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result23=mysqli_query ($conn,$sql23) or die ("Invalid result");
$resultado23=mysqli_fetch_array($result23);
$nombre=$resultado23['nombre'];

?>
<tr>
<td><?php  echo $nombre;?></td>
</tr>

<?php };?>
</table>
 Pincha <a href="apuntcont.php"> aqui </a> para asignar m&aacutes clientes
<?php };?>

<?php };?>



</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>