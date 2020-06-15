<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');
include('combo.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE INCIDENCIAS</p></div>
<div class="contenido">

<form action="infpuntcontl.php" method="post">
<table>
<tr><td>Datos del Puesto de Trabajo</td><td>


<?php 
$sql="SELECT * from clientes where idempresas='".$ide."'"; 
if ($idgestor!=0){;
$sql.=" and idgestor='".$idgestor."'"; 
};
if ($idcli!=0){;
$sql.=" and nif='".$gente."'";
};
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>
<select name="idclientes" id="combobox">
<?php if ($idgestor==0 and $idcli==0){;?>
<option value=""></option>
<option value="todos">Todos</option>
<option value="0">Fuera de Trabajo</option>
<?php };
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];
$nombre=$resultado['nombre'];
?>
<option value="<?php  echo $idclientes;?>"><?php  echo $nombre;?></option>
<?php };?>
</select></td></tr>
<tr><td>Tipo de Informe</td><td><select name="tipo">
<option value="todo">Todo
<option value="anual">Anual
<option value="mes">Mensual
<option value="dia">Diario
</select></td></tr>
<tr><td>Fecha</td><td><input type="number" name="d"  min="1" max="31">/

<select name="m">
<option value="1">Enero
<option value="2">Febrero
<option value="3">Marzo
<option value="4">Abril
<option value="5">Mayo
<option value="6">Junio
<option value="7">Julio
<option value="8">Agosto
<option value="9">Septiembre
<option value="10">Octubre
<option value="11">Noviembre
<option value="12">Diciembre
</select>

/<input type="year" name="y" maxlength=4 size=5 value="<?php  echo date("Y",time());?>"></td></tr>

<tr><td>Texto</td><td><input type="text" name="obsbusq"></td></tr>

<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>

</table>
</form>


</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>