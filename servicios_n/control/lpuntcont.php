<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE PERSONAS</p></div>
<div class="contenido">


<?php if ($cpasist==null){;?>
<form action="lpuntcont.php" method="post">
<table>
<tr><td>Codigo Postal</td></tr>
<tr><td>
<select name="cpasist">
<option value="todos">Todos

</select>
</td>
</tr>
</table>
<input class="envio" type="submit" name="Enviar" value="enviar">
</form>
<?php }else{;?>

<?php 

$sql1="SELECT * from asistentes";
$sql1.=" where idempresa=:ide ";
if ($cpasist!='todos'){;
$sql1.=" and cp=:cpasist ";
$sql1.=" order by idasistente asc";
	$result=$conn->prepare($sql1);
	$result->bindParam(':ide', $ide);
	$result->bindParam(':cpasist', $cpasist);
	$result->execute();
}else{
	$sql1.=" order by idasistente asc";
	$result=$conn->prepare($sql1);
	$result->bindParam(':ide', $ide);
	$result->execute();
}

//echo $sql1;




/*$result=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$row=mysqli_num_rows($result);*/
?>

<table>
<tr class="subenc"><td>Id.</td><td>Persona de Contacto</td><td>Telefono</td><td>Email</td></tr>

<?php /*for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$idasistente=$rowmos['idasistente'];
$nombreasist=$rowmos['nombre'];
$papellidoasist=$rowmos['papellido'];
$sapellidoasist=$rowmos['sapellido'];
$contacto=$nombreasist.' '.$papellidoasist.' '.$sapellidoasist;
$telefono=$rowmos['telefono'];
$email=$rowmos['email'];
?><tr class="menor1">
<td><?php  echo $idasistente;?></td><td><?php  echo $contacto;?></td><td><?php  echo $telefono;?></td>
<td><?php  echo $email;?></td>
</tr>
<?php };?>
</table>



<?php };?>



</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>