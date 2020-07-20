<?php  
include('bbdd.php');
if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>


<div id="main">
<div class="titulo">
<p class="enc">ENVIO DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<form action="intro2.php" method="post">
<table>
<tr><td>Nombre del Empleado</td><td>


<?php 
$sql="SELECT * from empleados where idempresa=:ide and estado='1'";
$result=$conn->prepare($sql);
$result->bindParam(':ide', $ide);
$result->execute();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
?>
<select name="idemplt">
<option value="todos">Todos</option>
<?php 
/*for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$idempleado=$rowmos['idempleado'];
$nombre=$rowmos['nombre'];
$apellidop=$rowmos['1apellido'];
$apellidos=$rowmos['2apellido'];
$nombret=$nombre.' '.$apellidop.' '.$apellidos;
?>
<option value="<?php  echo $idempleado;?>"><?php  echo $nombret;?></option>
<?php };?>
</select></td></tr>
<tr><td colspan="2">Mensaje</td></tr>
<tr><td colspan="2"><textarea cols="50" rows="10" name="texto"></textarea></td></tr>

<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>
</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>
