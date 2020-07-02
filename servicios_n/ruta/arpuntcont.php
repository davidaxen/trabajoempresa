<?php  
include('bbdd.php');
if ($ide!=null){;

 include('../../portada_n/cabecera3.php');?>


<div id="main">
<div class="titulo">
<p class="enc">ASIGNAR CLIENTES A RUTA</p></div>
<div class="contenido">

<?php 

$sql="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'";
$result=$conn->query($sql);
$resultado=$result->fetch();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
$nombre=$resultado['nombre'];
?>

<form action="intro2.php" method="get" name="form2">
<input type="hidden" name="tablas" value="arpuntcont">
<!--<input type="hidden" name="datos" value="jorclientes">-->
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<table>
<tr><td class="tit">Codigo de Puesto de Trabajo</td><td><?php  echo $idclientes;?></td></tr>
<tr><td class="tit">Nombre del Puesto de Trabajo</td>
<td><?php  echo $nombre;?></td></tr>

<tr><td>Ruta</td>
<td>
<select name="idruta">
<option value=""></option>
<?php 
$sqld="SELECT * from ruta where idempresas='".$ide."' and estado='1'"; 
/*$sql.=" and estado='1'";*/
$resultd=$conn->query($sqld);
/*$resultd=mysqli_query ($conn,$sqld) or die ("Invalid result");
$rowd=mysqli_num_rows($resultd);

for ($i=0;$i<$rowd;$i++){;
mysqli_data_seek($resultd,$i);
$resultadod=mysqli_fetch_array($resultd);*/
foreach ($resultd as $rowdmos) {
$idruta=$rowdmos['idruta'];
$nombreruta=$rowdmos['nombreruta'];
?>
<option value="<?php  echo $idruta;?>" ><?php  echo $nombreruta;?>
<?php };?>
</select></td>
</tr>


<tr>
<td colspan="4">
<input class="envio" type="submit" name="Enviar" value="Enviar"></td>
</tr>
</form>

</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php } else {;
include ('../../cierre.php');
 };?>
</body>
</html>