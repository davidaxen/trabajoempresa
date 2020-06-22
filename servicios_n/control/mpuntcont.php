<?php  
include('bbdd.php');

if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE PERSONAS</p></div>
<div class="contenido">

<?php if ($estado==null){;?>

<form action="mpuntcont.php" method="post">
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
$sql1.=" where idempresa='".$ide."' ";
if ($cpasist!='todos'){;
$sql1.=" and cp='".$cpasist."' ";
};
$sql1.=" order by idasistente asc";
//echo $sql1;
$result=$conn->query($sql1);

/*$result=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$row=mysqli_num_rows($result);*/
?>

<table>
<tr class="subenc"><td>Nº Siniestro</td><td>Persona de Contacto</td><td>Telefono</td><td>Direccion</td><td>Email</td><td>Descripcion</td></tr>

<?php  
/*for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$idsiniestro=$rowmos['idsiniestro'];
$numsiniestro=$rowmos['numsiniestro'];
$contacto=$rowmos['contacto'];
$telefono=$rowmos['telefono'];
$direccion=$rowmos['direccion'];
$localidad=$rowmos['localidad'];
$provincia=$rowmos['provincia'];
$cp=$rowmos['cp'];
$email=$rowmos['email'];
$descripcion=$rowmos['descripcion'];
?>
<tr class="menor1">
<td><?php  echo $numsiniestro;?></td><td><?php  echo $contacto;?></td><td><?php  echo $telefono;?></td>
<td><?php  echo $direccion;?><br>
<?php  echo $localidad;?><br>
<?php  echo $provincia;?><br>
<?php  echo $cp;?></td>
<td><?php  echo $email;?></td>
<td><?php  echo $descripcion;?></td>
<td><a href="modpuntcont.php?idsiniestro=<?php  echo $idsiniestro;?>"><img src="../../img/modificar.gif"></a></td>
</tr>
<?php };?>
</table>



<?php };?>



</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>
