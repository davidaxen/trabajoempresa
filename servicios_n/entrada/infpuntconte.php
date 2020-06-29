<?php  
include('bbdd.php');
$idpccat=1;
if ($ide!=null){;

include('../../portada_n/cabecera3.php');

include('combo.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE ENTRADA / SALIDA POR EMPLEADO</p></div>
<div class="contenido">


<form action="infpuntcontle.php" method="get"  name="form1">
<table>

<tr><td>Datos del Empleado</td><td>

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
<select name="idempleado" id="combobox">
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
mysqli_data_seek($result,$i);
$resultadoa=mysqli_fetch_array($resulta);
$idpcsubcat=$resultadoa['idpcsubcat'];
$subcategoria=$resultadoa['subcategoria'];
//$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
//$nombre=$resultado['nombre');
?>
<option value="<?php  echo $idpcsubcat;?>"><?php  echo $subcategoria;?></option>
<?php };?>
</select></td></tr>



<tr><td colspan="2">Tipo de Informe</td></tr>
<tr><td colspan="2">
<table style="text-align:center">
<tr><td ><img src="../../img/iconos/fmes.png" width="64px"><br/>
<input type="radio" name="tipo" value="mes" onclick="mod(1,1,4)" checked ><br/>
Mensual</td> 
<td><img src="../../img/iconos/fdia.png" width="64px"><br/>
<input type="radio" name="tipo" value="dia" onclick="mod(2,1,4)"><br/>
Dia
</td> 
<td><img src="../../img/iconos/fanual.png" width="64px"><br/>
<input type="radio" name="tipo" value="anual" onclick="mod(3,1,4)"><br/>
Anual</td>
<td><img src="../../img/iconos/fentre.png" width="64px"><br/>
<input type="radio" name="tipo" value="fentre" onclick="mod(4,1,4)"><br/>
Entre fechas</td></tr>  
</table>
</td></tr>
<!--
<select id="tipo" name="tipo" onchange="mod(1,4)">
<option value="mes">Mensual</option>
<option value="dia">Diario</option>
<option value="anual">Anual</option>
<option value="entre">Bloque de fechas</option>
</select></td></tr>
-->
</table>

<script>

function mod(num,numi,numf){

/*
var x=document.getElementById("tipo").value

switch(x){
case "mes": num=1;break;
case "dia": num=2;break;
case "anual": num=3;break;
case "entre": num=4;break;
}
*/

for (i=numi;i<numf+1;i++){

elem1=eval("fecha"+i)

if (i==num){

elem1.style.visibility="visible"

}else{

elem1.style.visibility="collapse"

}

}

}

</script>




<div id="fecha1" style="visibility:visible">
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

<div id="fecha2" style="visibility:collapse">
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

<div id="fecha3" style="visibility:collapse">
<table>
<tr><td>Fecha</td><td><input type="number" name="y3" maxlength=4 size=5 value="<?php  echo date('Y',time());?>"></td></tr>
</table>
</div>

<div id="fecha4" style="visibility:collapse" >
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



<script>
document.form1.idempleado.options[0].selected=true;
</script>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>
