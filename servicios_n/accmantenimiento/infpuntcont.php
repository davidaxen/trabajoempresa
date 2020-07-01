<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');
include('combo.php');?>
<div id="main">
<div class="titulo">
<p class="enc">INFORME DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<form action="infpuntcontl.php" method="post" name="form1">
<table>
<tr><td>Datos del Puesto de Trabajo</td><td>

<?php 
$sql="SELECT * from clientes where idempresas='".$ide."'"; 
$sql.=" and accdiarias='1'";
if ($idcli!=0){;
$sql.=" and nif='".$gente."'";
};

$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$resultado=$result->fetch();

//$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//$row=mysqli_num_rows($result);
?>
<select name="idclientes" id="combobox">
<?php if($idcli==0){;?> 
<option value="todos">Todos</option>
<?php };

foreach ($resultmos as $row) {
	$idclientes=$resultado['idclientes'];
	$nombre=$resultado['nombre'];	


//for ($i=0;$i<$row;$i++){
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
//$idclientes=$resultado['idclientes'];
//$nombre=$resultado['nombre'];
?>
<option value="<?php  echo $idclientes;?>"><?php  echo $nombre;?>
<?php };?>
</select></td></tr>
<tr><td>Parametro</td><td>
<?php 
$sqla="SELECT * from puntservicios where idempresas='".$ide."' and idpccat='".$idpccat."'"; 

$resulta=$conn->query($sqla);
$resultamos=$conn->query($sqla);
$resultadoa=$resulta->fetch();

//$resulta=mysqli_query ($conn,$sqla) or die ("Invalid result");
//$rowa=mysqli_num_rows($resulta);
?>
<select name="idpunt">
<option value="todos">Todos
<?php 

foreach ($resultamos as $row) {
	$idpcsubcat=$row['idpcsubcat'];
	$subcategoria=$row['subcategoria'];


//for ($i=0;$i<$rowa;$i++){;
//mysqli_data_seek($resulta,$i);
//$resultadoa=mysqli_fetch_array($resulta);
//$idpcsubcat=$resultadoa['idpcsubcat'];
//$subcategoria=$resultadoa['subcategoria'];
?>
<option value="<?php  echo $idpcsubcat;?>"><?php  echo $subcategoria;?>
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
document.form1.idclientes.options[0].selected=true;
</script>

</div>
</div>


<?php } else {;

include('../../cierre.php');

};?>
