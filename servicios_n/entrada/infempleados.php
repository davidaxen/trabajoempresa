<?php 
include('bbdd.php');
include('combo1.php');?>

<div id="inicioy2" style="visibility:visible">
<form action="infpuntcontle.php" method="get"  name="form1" target="_top">
<table>

<tr><td>Datos de <?php echo ucfirst($nc2);?></td><td>

<?php 
$sql="SELECT * from empleados where idempresa='".$ide."'"; 
if ($idtrab!='0'){;
$sql.=" and idempleado='".$idtrab."'";
};
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);

if ($idtrab!='0'){;

for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idempleado=$resultado['idempleado'];
$nombre=$resultado['nombre'];
$papellido=$resultado['1apellido'];
$sapellido=$resultado['2apellido'];
?>
<input name="idempleado" type="hidden" value="<?php  echo $idempleado;?>"><?php  echo $nombre;?>, <?php  echo $papellido;?> <?php  echo $sapellido;?>
<?php 
};
}else{;
?>
<select name="idempleado" id="combodato">
<option value="todos">Todos</option>
<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idempleado=$resultado['idempleado'];
$nombre=$resultado['nombre'];
$papellido=$resultado['1apellido'];
$sapellido=$resultado['2apellido'];
?>
<option value="<?php  echo $idempleado;?>"><?php  echo $nombre;?>, <?php  echo $papellido;?> <?php  echo $sapellido;?>
<?php };?>
</select>
<?php };?>
</td></tr>


<tr><td>Parametro</td><td>
<?php 
$sqla="SELECT * from puntservicios where idempresas='".$ide."' and idpccat='".$idpccat."'"; 
$resulta=mysqli_query ($conn,$sqla) or die ("Invalid result");
$rowa=mysqli_num_rows($resulta);
?>
<select name="idpunt">
<option value="todos">Todos</option>
<option value="jornadas">JORNADAS</option>
<?php for ($i=0;$i<$rowa;$i++){;
mysqli_data_seek($resulta,$i);
$resultadoa=mysqli_fetch_array($resulta);
$idpcsubcat=$resultadoa['idpcsubcat'];
$subcategoria=$resultadoa['subcategoria'];
?>
<option value="<?php  echo $idpcsubcat;?>"><?php  echo $subcategoria;?></option>
<?php };?>
</select></td></tr>



<tr><td colspan="2">Tipo de Informe</td></tr>
<tr><td colspan="2">
<table style="text-align:center">
<tr><td ><img src="../../img/iconos/fmes.png" width="64px"><br/>
<input type="radio" name="tipo" value="mes" onclick="mod(1,1,4)" ><br/>
Mensual</td> 
<td><img src="../../img/iconos/fdia.png" width="64px"><br/>
<input type="radio" name="tipo" value="dia" onclick="mod(2,1,4)"><br/>
Dia
</td> 
<td><img src="../../img/iconos/fanual.png" width="64px"><br/>
<input type="radio" name="tipo" value="anual" onclick="mod(3,1,4)"><br/>
Anual</td>
<td><img src="../../img/iconos/fentre.png" width="64px"><br/>
<input type="radio" name="tipo" value="entre" onclick="mod(4,1,4)"><br/>
Entre fechas</td></tr>  
</table>
</td></tr>
</table>

<script>

function mod(num,numi,numf){

for (i=numi;i<numf+1;i++){

elem1=eval("fecha2"+i)

if (i==num){

elem1.style.visibility="visible"

}else{

elem1.style.visibility="collapse"

}

}

}

</script>




<div id="fecha21" style="visibility:collapse">
<table>
<tr><td>Fecha</td><td>
<select name="m1">
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
/<input type="number" name="y1" maxlength=4 size=5 value="<?php  echo date('Y',time());?>"></td></tr>
</table>
</div>

<div id="fecha22" style="visibility:collapse">
<table>
<tr><td>Fecha</td><td><input type="number" name="d2" maxlength=2 size=3>/
<select name="m2">
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
/<input type="number" name="y2" maxlength=4 size=5 value="<?php  echo date('Y',time());?>"></td></tr>
</table>
</div>

<div id="fecha23" style="visibility:collapse">
<table>
<tr><td>Fecha</td><td><input type="number" name="y3" maxlength=4 size=5 value="<?php  echo date('Y',time());?>"></td></tr>
</table>
</div>

<div id="fecha24" style="visibility:collapse" >
<table>
<tr><td>Fecha Inicial</td><td><input type="number" name="d4i" maxlength=2 size=3>/
<select name="m4i">
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
/<input type="number" name="y4i" maxlength=4 size=5 value="<?php  echo date('Y',time());?>"></td></tr>

<tr><td>Fecha Final</td><td><input type="number" name="d4f" maxlength=2 size=3>/
<select name="m4f">
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
/<input type="number" name="y4f" maxlength=4 size=5 value="<?php  echo date('Y',time());?>"></td></tr>
</table>
</div>
<table>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>
</div>
