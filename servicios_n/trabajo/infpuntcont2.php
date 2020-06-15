<?php  
include('bbdd.php');
if ($ide!=null){;

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
$nc1=$resultado31['clientes'];
$nc2=$resultado31['empleados'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
$ic1=$resultado32['clientes'];
$ic2=$resultado32['empleados'];




include('../../portada_n/cabecera3.php');
include('combo.php');?>
<div id="main">
<div class="titulo">
<p class="enc">INFORME DE ORDENES
<?php  if ($estadotr=='1'){;?> CERRADOS<?php };?>
<?php  if ($estadotr=='0'){;?> ABIERTOS<?php };?></p></div>
<div class="contenido">

<?php if ($estadotr==null){;?>
<style>
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>


<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Clientes')"><img src="../../img/<?php echo $ic1;?>" width="25px">&nbsp;<?php echo strtoupper($nc1);?></button>
  <button class="tablinks" onclick="openCity(event, 'Empleados')"><img src="../../img/<?php echo $ic2;?>" width="25px">&nbsp;<?php echo strtoupper($nc2);?></button>
</div>

<div id="Clientes" class="tabcontent">

<div id="inicioy1" style="visibility:visible">
<form action="lpuntcont.php" method="post">
<table>
<tr><td>Puesto de Trabajo</td></tr>
<tr>
<td>
<select name="idaseguradora" id="combobox">
<option value="todos">Todos
<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and estado='1'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row2=mysqli_num_rows($result);

for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result, $t);
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
$idclientes=$resultado['idclientes'];
?>
<option value="<?php  echo $idclientes;?>"><?php  echo $nombre;?>
<?php };?>
</select>
</td></tr>
<tr><td>Estado Actual</td></tr>
<tr><td>
<select name="estadotr">
<option value="todos">Todos
<option value="1">Cerrados
<option value="0">Abiertos
</select>
</td>
</tr>
<tr><td>Fechas de Busqueda</td></tr>
<tr><td>
<select name="busquedatr">
<option value="1">Fecha de Apertura
<option value="0">Fecha de Cierre
</select>
</td>
</tr>

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
<input type="radio" name="tipo" value="entre" onclick="mod(4,1,4)"><br/>
Entre fechas</td></tr>  
</table>
</td></tr>
</table>

<script>

function mod(num,numi,numf){

for (i=numi;i<numf+1;i++){

elem1=eval("fechai"+i)

if (i==num){

elem1.style.visibility="visible"

}else{

elem1.style.visibility="collapse"

}

}

}

</script>




<div id="fechai1" style="visibility:visible">
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

<div id="fechai2" style="visibility:collapse">
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

<div id="fechai3" style="visibility:collapse">
<table>
<tr><td>Fecha</td><td><input type="number" name="y3" maxlength=4 size=5 value="<?php  echo date('Y',time());?>"></td></tr>
</table>
</div>

<div id="fechai4" style="visibility:collapse" >
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
<input class="envio" type="submit" name="Enviar" value="enviar">
</form>
</div>

</div>


<div id="Empleados" class="tabcontent">



<div id="inicioy2" style="visibility:visible">
<form action="lpuntconte.php" method="post">
<table>
<tr><td>Nombre del Trabajador</td></tr>
<tr>
<td>
<select name="idempleado" id="combobox">
<option value="todos">Todos
<?php 
$sql="SELECT * from empleados where idempresa='".$ide."' and estado='1'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row2=mysqli_num_rows($result);

for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result, $t);
$resultado=mysqli_fetch_array($result);
$nombree=$resultado['nombre'];
$apellido1e=$resultado['1apellido'];
$apellido2e=$resultado['2apellido'];
$nombreempl=$nombree." ".$apellido1e." ".$apellido2e;
$idempleado=$resultado['idempleado'];
?>
<option value="<?php  echo $idempleado;?>"><?php  echo $nombreempl;?>
<?php };?>
</select>
</td></tr>
<tr><td>Estado Actual</td></tr>
<tr><td>
<select name="estadotr">
<option value="todos">Todos
<option value="1">Cerrados
<option value="0">Abiertos
</select>
</td>
</tr>
<tr><td>Fechas de Busqueda</td></tr>
<tr><td>
<select name="busquedatr">
<option value="1">Fecha de Apertura
<option value="0">Fecha de Cierre
</select>
</td>
</tr>

<tr><td colspan="2">Tipo de Informe</td></tr>
<tr><td colspan="2">
<table style="text-align:center">
<tr><td ><img src="../../img/iconos/fmes.png" width="64px"><br/>
<input type="radio" name="tipo" value="mes" onclick="mod3(1,1,4)" checked ><br/>
Mensual</td> 
<td><img src="../../img/iconos/fdia.png" width="64px"><br/>
<input type="radio" name="tipo" value="dia" onclick="mod3(2,1,4)"><br/>
Dia
</td> 
<td><img src="../../img/iconos/fanual.png" width="64px"><br/>
<input type="radio" name="tipo" value="anual" onclick="mod3(3,1,4)"><br/>
Anual</td>
<td><img src="../../img/iconos/fentre.png" width="64px"><br/>
<input type="radio" name="tipo" value="entre" onclick="mod3(4,1,4)"><br/>
Entre fechas</td></tr>  
</table>
</td></tr>
</table>

<script>

function mod3(num,numi,numf){

for (i=numi;i<numf+1;i++){

elem1=eval("fechaf"+i)

if (i==num){

elem1.style.visibility="visible"

}else{

elem1.style.visibility="collapse"

}

}

}

</script>




<div id="fechaf1" style="visibility:visible">
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

<div id="fechaf2" style="visibility:collapse">
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

<div id="fechaf3" style="visibility:collapse">
<table>
<tr><td>Fecha</td><td><input type="number" name="y3" maxlength=4 size=5 value="<?php  echo date('Y',time());?>"></td></tr>
</table>
</div>

<div id="fechaf4" style="visibility:collapse" >
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
<input class="envio" type="submit" name="Enviar" value="enviar">
</form>
</div>

</div>



<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>








<?php }else{;?>
<?php 

$sql1="SELECT * from trabajos";
$sql1.=" where idempresa='".$ide."' ";
if ($idaseguradora!='todos'){;
$sql1.=" and idaseguradora='".$idaseguradora."' ";
};
if ($estadotr!='todos'){;
$sql1.=" and terminado='".$estadotr."' ";
};
if ($diatr!=''){;
$sql1.=" and diaapertura='".$diatr."' ";
};		
if ($diatc!=''){;
$sql1.=" and diacierre='".$diatc."' ";
};	

		
$sql1.=" order by dia desc";
//echo $sql1;
$result=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$row=mysqli_num_rows($result);
?>

<table>
<tr class="subenc"><td>N Trabajos</td><td>Puesto de Trabajo</td><td>Telefono</td><td>Direccion</td><td>Email</td><td>Descripcion</td>
<?php  if ($estado=="todos"){;?><td>Estado</td><?php };?>
<td>Acciones</td>
</tr>

<?php  
for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$idsiniestro=$resultado['idsiniestro'];
$idaseguradora=$resultado['idaseguradora'];
$numsiniestro=$resultado['numsiniestro'];
$contacto=$resultado['contacto'];
$telefono=$resultado['telefono'];
$direccion=$resultado['direccion'];
$localidad=$resultado['localidad'];
$provincia=$resultado['provincia'];
$cp=$resultado['cp'];
$email=$resultado['email'];
$descripcion=$resultado['descripcion'];
$est=$resultado['terminado'];

$sql10="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idaseguradora."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result");
$resultado10=mysqli_fetch_array($result10);
$nombrecontacto=$resultado10['nombre'];
?>
<tr class="menor1">
<td><?php  echo $numsiniestro;?></td>
<td><?php  echo $nombrecontacto;?></td>
<td><?php  echo $telefono;?></td>
<td><?php  echo $direccion;?><br>
<?php  echo $localidad;?><br>
<?php  echo $provincia;?><br>
<?php  echo $cp;?></td>
<td><?php  echo $email;?></td>
<td><?php  echo $descripcion;?></td>
<?php  if ($estado=="todos"){;?>
<td>
<?php  if ($est==1){;?>Cerrado<?php };?>
<?php  if ($est==0){;?>Abierto<?php };?>
</td>
<?php };?>
<td><a href="accpuntcont.php?idsiniestro=<?php  echo $idsiniestro;?>"><img src="../../img/modificar.gif"></a></td>
</tr>
<?php };?>
</table>

<?php };?>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>