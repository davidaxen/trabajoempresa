<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>


<div id="main">
<div class="titulo">
<p class="enc">ASIGNAR CLIENTES A RUTA</p></div>
<div class="contenido">
<?php 
$enviar="enviar";
$estado="1";
if ($enviar==null){;?>
<form action="apuntcont.php" method="post" name="form2">
Estado <select name="estado">
<option value="1">Alta
<option value="0">Baja
</select>
<input class="envio" type="submit" value="enviar" name="enviar">
</form>

<?php }else{;?>

<?php 

$sql="SELECT * from clientes where idempresas='".$ide."' and estado='".$estado."' order by idclientes asc";
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
?>
<table>
<?php  
/*for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$idclientes=$rowmos['idclientes'];
$nombre=$rowmos['nombre'];
$nif=$rowmos['nif'];
$estado=$rowmos['estado'];
?>
<tr class="menor1">
<td><?php  echo $idclientes;?></td>
<td><?php  echo $nombre;?></td>
<td><?php  echo $nif;?></td>
<td>
<?php if ($estado=='0'){?><font color="red">Baja<?php }else{;?><font color="green">Alta<?php };?></font></td>
<td><a href="arpuntcont.php?idclientes=<?php  echo $idclientes;?>"><img src="../../img/modificar.gif" alt="modificar" border=0 width=20></a></td>
</tr>
<?php };?>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

</div>
<?php };?>
<?php } else {;
include ('../../cierre.php');
 };?>