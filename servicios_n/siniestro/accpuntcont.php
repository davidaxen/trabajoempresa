<?php  
include('bbdd.php');
if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES DE ORDENES</p></div>
<div class="contenido">

<?php 
if ($idsiniestro==null){;
?>

<form action="accpuntcont.php" method="post">


<?php 
$sql="SELECT * from siniestros where idempresa='".$ide."' ";
$sql.="and terminado='0'";

$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$fetchAll=$result->fetchAll();
$row=count($fetchAll);

//$result=mysqli_query($conn,$sql) or die ("Invalid result");
//$row=mysqli_num_rows($result);
if ($row!=0){;?>
<table>
<tr><td>Numero de Siniestro</td><td>
<select name="idsiniestro">
<?php 

foreach ($resultmos as $row) {

//for ($i=0;$i<$row;$i++){;
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
$idsiniestro=$row['idsiniestro'];
$numsiniestro=$row['numsiniestro'];
?>
<option value="<?php  echo $idsiniestro;?>"><?php  echo $numsiniestro;?>
<?php };?>
</select></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php }else{;?>
<table><tr><td>
No tiene siniestros sin terminar.
</td></tr></table>
<?php };?>


<?php } else {;?>

<table>

<tr class="subenc3"><td>Datos del Siniestro</td></tr>
<?php 
$sql="SELECT * from siniestros where idempresa='".$ide."' and idsiniestro='".$idsiniestro."'"; 

$result=$conn->query($sql);
$resultado=$result->fetch();
//$result=mysqli_query($conn,$sql) or die ("Invalid result");
//$resultado=mysqli_fetch_array($result);
$numsiniestro=$resultado['numsiniestro'];
$contacto=$resultado['contacto'];
$telefono=$resultado['telefono'];
$direccion=$resultado['direccion'];
$localidad=$resultado['localidad'];
$provincia=$resultado['provincia'];
$cp=$resultado['cp'];
$descripcion=$resultado['descripcion'];
$idempleado=$resultado['idempleado'];
$diaasig=$resultado['diaasignacion'];
$horaasig=$resultado['horaasignacion'];
?>
<tr><td>
<table>
<tr class="subenc5"><td>Num. Siniestro</td><td>Pers. Contacto</td><td>Telefono</td><td>Dirección</td><td>Descripcion</td></tr>
<tr>
<td><?php  echo $numsiniestro;?></td>
<td><?php  echo $contacto;?></td>
<td><?php  echo $telefono;?></td>
<td><?php  echo $direccion;?><br><?php  echo $localidad;?><br><?php  echo $provincia;?> <?php  echo $cp;?></td>
<td colspan="3"><?php  echo $descripcion;?></td>
</tr>
</table>
<td></tr>


<tr class="subenc3"><td>Acciones Realizadas</td></tr>
<?php 
$sql="SELECT * from accsiniestros where idempresa='".$ide."' and idsiniestro='".$idsiniestro."'";

$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$fetchAll=$result->fetchAll();
$row=count($fetchAll);

//$result=mysqli_query($conn,$sql) or die ("Invalid result");
//$row=mysqli_num_rows($result);
if ($row==0){;
?>
<tr><td>Ninguna Accion Realizada.</td></tr>
<?php 
}else{;

foreach ($resultmos as $row) {

//for ($t=0;$t<$row;$t++){;
//mysqli_data_seek($result, $t);
//$resultado=mysqli_fetch_array($result);
$id=$row['id'];
$trabajor=$row['trabajorealizado'];
$trabajop=$row['trabajopendiente'];
$descripcion1=$row['descripcion'];
$diaent=$row['diaentrada'];
$horaent=$row['horaentrada'];
$diasal=$row['diasalida'];
$horasal=$row['horasalida'];
$idempleado=$row['idempleado'];

$sql2="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 


$result2=$conn->query($sql2);
$resultado2=$result2->fetch();
//$result2=mysqli_query($conn,$sql2) or die ("Invalid result");
//$resultado2=mysqli_fetch_array($result2);
$nombre=$resultado2['nombre'];
$priapellido=$resultado2['1apellido'];
$segapellido=$resultado2['2apellido'];
?>
<tr><td>
<table>
<tr class="subenc5">
<td width="100">Trabajador</td>
<td width="100">Dia y Hora de Entrada</td>
<td width="100">Dia y Hora de Salida</td>
<td width="250">Descripcion de la Situacion</td>
<td width="250">Trabajos Realizados</td>
<td width="250">Trabajos Pendientes</td>
<td>Parte</td>
</tr>
<tr>
<td valign="top"><?php  echo $nombre;?>, <?php  echo $priapellido;?> <?php  echo $segapellido;?></td>
<td valign="top"><?php  echo $diaent;?><br/><?php  echo $horaent;?></td>
<td valign="top"><?php  echo $diasal;?><br/><?php  echo $horasal;?></td>
<td valign="top"><?php  echo $descripcion1;?>
<?php 
$sqldes="SELECT * from imgsiniestros where idempresa='".$ide."' and idsiniestro='".$idsiniestro."' and dia='".$diaent."' and taccion='1'"; 

$resultdes=$conn->query($sqldes);
$resultdesmos=$conn->query($sqldes);
$fetchAlldes=$resultdes->fetchAll();
$rowdes=count($fetchAlldes);

//$resultdes=mysqli_query($conn,$sqldes) or die ("Invalid result");
//$rowdes=mysqli_num_rows($resultdes);
if ($rowdes!=0){;
?>
<p>
<?php 
		
		foreach ($resultdesmos as $row) {
		//for ($tdes=0;$tdes<$rowdes;$tdes++){;
		//mysqli_data_seek($resultdes, $tdes);
//$resultadodes=mysqli_fetch_array($resultdes);
				$imgsiniestro=$row['imgsiniestro'];?>
<img src="../../img/<?php  echo $imgsiniestro;?>" width="150 px" onclick="window.open('../../img/<?php  echo $imgsiniestro;?>','','top=200,left=200,width=250,height=250')"><p>
<?php 
		};

};

?>
</td>
<td valign="top"><?php  echo $trabajor;?>
<?php 
$sqldes="SELECT * from imgsiniestros where idempresa='".$ide."' and idsiniestro='".$idsiniestro."' and dia='".$diaent."' and taccion='2'";

$resultdes=$conn->query($sqldes);
$resultdesmos=$conn->query($sqldes);
$fetchAlldes=$resultdes->fetchAll();
$rowdes=count($fetchAlldes);

//$resultdes=mysqli_query($conn,$sqldes) or die ("Invalid result");
//$rowdes=mysqli_num_rows($resultdes);
if ($rowdes!=0){;
?>
<p>
<?php 

		foreach ($resultdesmos as $row) {
		//for ($tdes=0;$tdes<$rowdes;$tdes++){;
		//		mysqli_data_seek($resultdes, $tdes);
//$resultadodes=mysqli_fetch_array($resultdes);
				$imgsiniestro=$row['imgsiniestro'];?>
<img src="../../img/<?php  echo $imgsiniestro;?>" width="150 px" onclick="window.open('../../img/<?php  echo $imgsiniestro;?>','','top=200,left=200,width=250,height=250')"><p>
<?php 
		};

};

?>
</td>
<td valign="top"><?php  echo $trabajop;?>
<?php 
$sqldes="SELECT * from imgsiniestros where idempresa='".$ide."' and idsiniestro='".$idsiniestro."' and dia='".$diaent."' and taccion='3'"; 

$resultdes=$conn->query($sqldes);
$resultdesmos=$conn->query($sqldes);

$fetchAlldes=$resultdes->fetchAll();
$rowdes=count($fetchAlldes);
//$resultdes=mysqli_query($conn,$sqldes) or die ("Invalid result");
//$rowdes=mysqli_num_rows($resultdes);
if ($rowdes!=0){;
?>
<p>
<?php 


		foreach ($resultdesmos as $row) {
		//for ($tdes=0;$tdes<$rowdes;$tdes++){;
		//mysqli_data_seek($resultdes, $tdes);
//$resultadodes=mysqli_fetch_array($resultdes);
				$imgsiniestro=$row['imgsiniestro'];?>
<img src="../../img/<?php  echo $imgsiniestro;?>" width="150 px" onclick="window.open('../../img/<?php  echo $imgsiniestro;?>','','top=200,left=200,width=250,height=250')"><p>
<?php 
		};

};

?>


</td>
<td valign="top"><a href="pdfparte.php?id=<?php  echo $id;?>"><img src="../../img/modificar.gif"></a></td>
</tr>
</table>
</td></tr>
<?php };?>
<?php };?>

<tr class="subenc3"><td>Asignacion de la Reparación / Siniestro</td></tr>


<?php 
$sql2="SELECT * from empleados where idempresa='".$ide."' and estado='1'"; 
if ($idempleado!=0){;
$sql2.=" and idempleado='".$idempleado."'";
};

$result2=$conn->query($sql2);
$fetchAll2=$result2->fetchAll();
$row2=count($fetchAll2);


//$result2=mysqli_query($conn,$sql2) or die ("Invalid result");
//$row2=mysqli_num_rows($result2);
?>
<tr><td>
<table>
<tr class="subenc5"><td>Empleado</td><td>Dia</td><td>Hora</td></tr>
<tr><td>
<?php 

$resultado2=$result2->fetch();
//$resultado2=mysqli_fetch_array($result2);
$idempleado=$resultado2['idempleado'];
$nombre=$resultado2['nombre'];
$priapellido=$resultado2['1apellido'];
$segapellido=$resultado2['2apellido'];
?>
<?php  echo $nombre;?>, <?php  echo $priapellido;?> <?php  echo $segapellido;?>
</td>
<td><?php  echo $diaasig;?></td><td><?php  echo $horaasig;?></td></tr>
</table>
</td></tr>
</table>


<?php };?>
</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>
