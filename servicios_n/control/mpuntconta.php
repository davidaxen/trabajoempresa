<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE EVENTO</p></div>
<div class="contenido">


<?php if ($estado==null){;?>
<form action="mpuntconta.php" method="post">
<table>
<tr><td>Estado Actual</td></tr>
<tr><td>
<select name="estado">
<option value="todos">Todos
<option value="1">Alta
<option value="0">Baja
</select>
</td>
</tr>
</table>
<input class="envio" type="submit" name="Enviar" value="enviar">
</form>
<?php }else{;?>
<?php 
$sql1="SELECT * from evento";
$sql1.=" where idempresa=:ide ";
if ($estado!='todos'){;
$sql1.=" and estado=:estado ";
$sql1.=" order by idevento asc";
	$result=$conn->prepare($sql1);
	$result->bindParam(':ide', $ide);
	$result->bindParam(':estado', $estado);
	$result->execute();
}else{
	$sql1.=" order by idevento asc";
	$result=$conn->prepare($sql1);
	$result->bindParam(':ide', $ide);
	$result->execute();
}

//echo $sql1;


/*$result=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$row=mysqli_num_rows($result);*/
?>

<table>
<tr class="subenc"><td>Evento</td><td>Persona de Contacto</td><td>Telefono</td><td>Direccion</td><td>Email</td><td>Fechas del evento</td><td>&nbsp;</td></tr>

<?php  
/*for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$idevento=$rowmos['idevento'];
$evento=$rowmos['evento'];
$contacto=$rowmos['contacto'];
$telefono=$rowmos['telefono'];
$direccion=$rowmos['direccion'];
$email=$rowmos['email'];
$fcomienzo=$rowmos['fcomienzo'];
$ffinal=$rowmos['ffinal'];
?>
<tr class="menor1">
<td><?php  echo $evento;?></td><td><?php  echo $contacto;?></td><td><?php  echo $telefono;?></td><td><?php  echo $direccion;?></td><td><?php  echo $email;?></td><td><?php  echo $fcomienzo;?>-<?php  echo $ffinal;?></td>
<td><a href="modpuntconta.php?idevento=<?php  echo $idevento;?>"><img src="../../img/modificar.gif"></a></td>
</tr>
<?php };?>
</table>



<?php };?>

</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>
