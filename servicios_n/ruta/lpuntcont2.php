<?php  
include('bbdd.php');

if (!isset($ide)){
	$ide=null;
}

if ($ide!=null){

	include('../../portada_n/cabecera3.php');

	include('../../estilo/acordeon.php');
?>

	<div id="main">
	<div class="titulo">
	<p class="enc">LISTADO DE RUTAS</p></div>
	<div class="contenido">


	<div class="main">

	<a href="ipuntcont.php">
	<span class="caja">
	<div style="position:relative">
	<img src="../../img/<?php  echo $ic;?>" width="64px">
	<div style="position:absolute; top:0;right:0;">
	<img border="0"  src="../../img/plus.png" width="30" height="30" />
	</div>
	</div>
	<br/>Crear Ruta
	</span>
	</a>

	</div>

	Tienes las siguientes rutas introducidas:

	<?php 
	$sql2="SELECT * from ruta where idempresas='".$ide."' order by idruta asc"; 
	$result2=$conn->query($sql2);
	$result2mos=$conn->query($sql2);
	$fetchAll2=$result2->fetchAll();
	$row2=count($fetchAll2);

	if ($row2>10){
		$yu=1;
	}else{
		$yu=2;
	}

	$t=0;
	foreach ($result2mos as $row2mos) {
		$idruta=$row2mos['idruta'];
		$nombreruta=$row2mos['nombreruta'];
		$activo=$row2mos['estado'];

		if ($t==$row2-1){
			$ultpunto=$idruta;
		}
		$t=$t+1;

	?>

		<div class="accordion" style="width:400px;height:20px;padding:5px">
		<img src="../../img/iconos/datos_personales.png" width="20px" style="vertical-align:middle;">  
		<?php  echo strtoupper($nombreruta);?>
		</div>
		<div class="panel">
		<a href="mpuntcont.php?enviar=enviar&idruta=<? echo $idruta;?>"><img src="../../img/pencil.png" width="25px"></a>

	<?php  
		$sql3="SELECT * from ruta where idempresas='".$ide."' and idruta='".$idruta."'";
		$result3=$conn->query($sql3);
		$resultado3=$result3->fetch();

		/*$result3=mysqli_query ($conn,$sql3) or die ("Invalid result 3");
		$resultado3=mysqli_fetch_array($result3);*/
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
		<tr><td>Estado</td><td>Empleado</td></tr>
		<tr><td><?php if ($activo==1){?>Activo<?php }else{?>Inactivo<?php }?></td>
		<td>
		<?php 
		$sql="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 
		/*$sql.=" and estado='1'";*/
		$result=$conn->query($sql);
		$resultado=$result->fetch();

		/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
		$resultado=mysqli_fetch_array($result);*/
		$idempl=$resultado['idempleado'];
		$nombre=$resultado['nombre'];
		$priape=$resultado['1apellido'];
		$segape=$resultado['2apellido'];
		  echo $nombre.", ".$priape." ".$segape;
		  ?>
		</td></tr></table>

		<table>
		<tr><td colspan="7">Dia de la Semana</td></tr>
		<tr><td>Lu.</td><td>Ma.</td><td>Mi.</td><td>Ju.</td><td>Vi.</td><td>Sa.</td><td>Do.</td></tr>
		<tr>
		<td><input type="checkbox" value="1" name="lunn" <?php if ($lun=='1'){?>checked<?php }?> disabled ></td>
		<td><input type="checkbox" value="1" name="marn" <?php if ($mar=='1'){?>checked<?php }?> disabled ></td>
		<td><input type="checkbox" value="1" name="mien" <?php if ($mie=='1'){?>checked<?php }?> disabled ></td>
		<td><input type="checkbox" value="1" name="juen" <?php if ($jue=='1'){?>checked<?php }?> disabled ></td>
		<td><input type="checkbox" value="1" name="vien" <?php if ($vie=='1'){?>checked<?php }?> disabled ></td>
		<td><input type="checkbox" value="1" name="sabn" <?php if ($sab=='1'){?>checked<?php }?> disabled ></td>
		<td><input type="checkbox" value="1" name="domn" <?php if ($dom=='1'){?>checked<?php }?> disabled ></td>
		</tr>
		</table>

	<?php 
		$sql21="SELECT * from clienteruta where idempresas='".$ide."' and idruta='".$idruta."'";
		$result21=$conn->query($sql21);
		$result21mos=$conn->query($sql2);
		$fetchAll21=$result21->fetchAll();
		$row21=count($fetchAll21);

	/*$result21=mysqli_query ($conn,$sql21) or die ("Invalid result");
	$row21=mysqli_num_rows($result21);*/

		if ($row21==0){

			echo 'No tienes ning&uacuten cliente asignado, pincha <a href="apuntcont.php"> aqui </a> para asignar clientes';

		}else{
			echo "<table><tr><td colspan='2'>Clientes dentro de Ruta</td></tr>";

	/*for ($ty=0;$ty<$row21;$ty++){;
	mysqli_data_seek($result21,$ty);
	$resultado21=mysqli_fetch_array($result21);*/
			foreach ($result21mos as $row21mos) {
				$idclientes=$row21mos['idclientes'];

				$sql23="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'";
				$result23=$conn->query($sql23);
				$resultado23=$result23->fetch();

				/*$result23=mysqli_query ($conn,$sql23) or die ("Invalid result");
				$resultado23=mysqli_fetch_array($result23);*/
				$nombre=$resultado23['nombre'];
				echo "<tr><td>".$nombre."</td></tr>";
			}

			echo "</table>Pincha <a href='apuntcont.php'> aqui </a> para asignar m&aacutes clientes";
		}?>

		</div>
		<?php
	}
	?>


	<?php  include ('../../js/acordeonjs.php');?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>

	</div>
	</div>

	<?php

} else {
	include ('../../cierre.php');
 }
 ?>