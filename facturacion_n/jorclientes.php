<?php  
include('bbdd.php');

if ($ide!=null){;

$sql31="select * from menuserviciosnombre where idempresa=:ide";
$result31=$conn->prepare($sql31);
$result31->bindParam(':ide', $ide);
$result31->execute();
$resultado31=$result31->fetch();

/*$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);*/
$nc=$resultado31['jornadas'];

$sql32="select * from menuserviciosimg where idempresa=:ide";
$result32=$conn->prepare($sql32);
$result32->bindParam(':ide', $ide);
$result32->execute();
$resultado32=$result32->fetch();

/*$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);*/
$ic=$resultado32['jornadas'];

include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc"><?php  echo strtoupper($nc);?> DE TRABAJO DE PUESTOS DE TRABAJO</p></div>
<div class="contenido">

<?php 

$sql="SELECT * from clientes where idempresas=:ide and idclientes=:idclientes";
$result=$conn->prepare($sql);
$result->bindParam(':ide', $ide);
$result->bindParam(':idclientes', $idclientes);
$result->execute();
$resultado=$result->fetch();

/*$result=mysqli_query($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
?>

<form action="intro2.php" method="get" name="form2">
<input type="hidden" name="tablas" value="jorclientes">
<!--<input type="hidden" name="datos" value="jorclientes">-->
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<table>
<tr>
<td class="tit">Codigo de Puesto de Trabajo</td><td><b><?php  echo $idclientes;?></b></td>
<td class="tit">Nombre del Puesto de Trabajo</td>
<td ><?php $nombre=$resultado['nombre'];?><b><?php  echo $nombre;?></b></td></tr>
</table>

<script>
function ComponerLista(depto, fabr, prod){
fabr.disabled=true;
prod.lenght=0;
SeleccionarComunidad (depto, prod);
fabr.disabled=false;
}

function SeleccionarComunidad (depto, prod){
var o;
prod.disabled=true;
prod.length=0;
if (depto == "todos"){;
o=document.createElement("OPTION");
o.value="todos";
o.text="Todos";
prod.options.add(o);
}

o=document.createElement("OPTION");
o.value="";
o.text="Elige uno";
prod.options.add(o);
<?php
$sql2="select * from comunidades order by id";
$result2=$conn->query($sql2);

//$result2=mysqli_query ($conn, $sql2) or die ("Invalid result");
//while ($resultado2 = mysqli_fetch_array($result2)){;
while ($resultado2=$result2->fetch()) {

?>

if (depto == "<?=$resultado2['idpais']?>"){
o=document.createElement("OPTION");
o.value="<?=$resultado2['id']?>";
o.text="<?=$resultado2['comunidad'];?>";
prod.options.add(o);
}
<?php
};?>
prod.disabled=false;
}




function ComponerLista1(depto, fabr, prod){
fabr.disabled=true;
prod.lenght=0;
SeleccionarProvincia (depto, prod);
fabr.disabled=false;
}

function SeleccionarProvincia (depto, prod){
var o;
prod.disabled=true;
prod.length=0;
if (depto == "todos"){;
o=document.createElement("OPTION");
o.value="todos";
o.text="Todos";
prod.options.add(o);
}
o=document.createElement("OPTION");
o.value="";
o.text="Elige uno";
prod.options.add(o);
<?php
$sql2="select * from provincias order by id";
$result2=$conn->query($sql2);
//$result2=mysqli_query ($conn, $sql2) or die ("Invalid result");

//while ($resultado2 = mysqli_fetch_array($result2)){;
while ($resultado2=$result2->fetch()) {
?>
if (depto == "<?=$resultado2['comunidad_id']?>"){
o=document.createElement("OPTION");
o.value="<?=$resultado2['id']?>";
o.text="<?=$resultado2['provincia'];?>";
prod.options.add(o);
}
<?php
};?>
prod.disabled=false;
}



function ComponerLista2(depto, fabr, prod){
fabr.disabled=true;
prod.lenght=0;
SeleccionarLocalidad (depto, prod);
fabr.disabled=false;
}

function SeleccionarLocalidad (depto, prod){
var o;
prod.disabled=true;
prod.length=0;
if (depto == "todos"){;
o=document.createElement("OPTION");
o.value="todos";
o.text="Todos";
prod.options.add(o);
}
o=document.createElement("OPTION");
o.value="";
o.text="Elige uno";
prod.options.add(o);
<?php
$sql2="select * from municipios order by id";
$result2=$conn->query($sql2);
/*$result2=mysqli_query ($conn, $sql2) or die ("Invalid result");
while ($resultado2 = mysqli_fetch_array($result2)){;*/
while ($resultado2=$result2->fetch()) {
?>

if (depto == "<?=$resultado2['provincia_id']?>"){
o=document.createElement("OPTION");
o.value="<?=$resultado2['id']?>";
o.text="<?=$resultado2['municipio'];?>";
prod.options.add(o);
}
<?php
};?>
prod.disabled=false;
}


</script>




<table>
<!--<tr><td>Dias festivos que se aplican</td><td><input type="checkbox" value="1" name="diasf"></td></tr>-->
<tr><td>Los dias festivos son de:</td><td>
<table>
<tr><td>Descanso</td><td>/</td><td>Trabajo</td></tr>
<tr><td><input type="radio" value="d" name="diasfd" id="myCheck2" onclick="myFunction()"></td>
<td>/</td><td><input type="radio" value="t" id="myCheck"  name="diasfd" onclick="myFunction()"></td></tr>
</table>
</td></tr>


<tr id="text" style="display:none"><td>Horario dias festivos</td><td>
<table>
<tr>
<td>Horario</td>
<td>Margen</td>
</tr>
<?php
for ($h=0;$h<3;$h++){;
?>
<tr>
<td>
<select name="horentdf[<?php  echo $h;?>]">
<option value=""></option>
<?php for ($hj=0;$hj<24;$hj++){;?>
<option value="<?php  echo $hj;?>:00"><?php  echo $hj;?>:00</option>
<option value="<?php  echo $hj;?>:15"><?php  echo $hj;?>:15</option>
<option value="<?php  echo $hj;?>:30"><?php  echo $hj;?>:30</option>
<option value="<?php  echo $hj;?>:45"><?php  echo $hj;?>:45</option>
<?php };?>
</select>
</td>
<td>
<select name="margenentdf[<?php  echo $h;?>]">
<option value=""></option>
<option value="00:05">00:05</option>
<option value="00:10">00:10</option>
</select>
</td>
</tr>
<?php
};
?>
</table>
</td></tr>


<script>
function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>





<?php
$sqlp="SELECT * from pais";
$resultp=$conn->query($sqlp);

/*$resultp=mysqli_query($conn,$sqlp) or die ("Invalid result");
$rowp=mysqli_num_rows($resultp);*/
?>
<tr><td>Pais</td><td>
<select name="idpais" onChange="ComponerLista(this.value, idpais, idcomunidad)">
<option>Elige el pais</option>
<?php
/*for ($i=0; $i<$rowp; $i++){;
mysqli_data_seek($resultp, $i);
$resultadop=mysqli_fetch_array($resultp);*/
foreach ($resultp as $rowpmos) {
$idpais=$rowpmos['idpais'];
$nombrepais=$rowpmos['nombrepais'];
?>
<option value="<?php echo $idpais;?>"><?php echo $nombrepais;?></option>
<?php };?>
</select>

</td></tr>
<tr><td>Comunidades</td><td>
<select name="idcomunidad" id="combobox" onChange="ComponerLista1(this.value, idcomunidad, idprovincia)">
<option value="todos">Todos</option>
</td></tr>
<tr><td>Provincia</td><td>
<select name="idprovincia" id="combobox1" onChange="ComponerLista2(this.value, idprovincia, idlocalidad)">
<option value="todos">Todos</option>
</td></tr>
<tr><td>Localidad</td><td>
<select name="idlocalidad" id="combobox2">
<option value="todos">Todos</option>
</td></tr>
</table>
<table>
<tr class="enctab">
<td>Fecha Inicio</td>
<td>Fecha Fin</td>
<!--<td>Turno</td>-->
<td>Horario</td>
<td>Margen</td>
<td>
<table>
<tr><td colspan="7">Dias de Trabajo</td></tr>
<tr><td>Lun</td><td>Mar</td><td>Mie</td><td>Jue</td><td>Vie</td><td>Sab</td><td>Dom</td></tr>
</table>
</tr>
<?php for ($j=0;$j<21;$j++){;?>
<tr>
<td><input type="date" name="fi[<?php  echo $j;?>]" size="11" maxlength="10"  placeholder="2015/01/01"></td>
<td><input type="date" name="ff[<?php  echo $j;?>]" size="11" maxlength="10"  placeholder="2015/12/31"></td>
<!--<td>
<select name="turno[<?php  echo $j;?>]">
<option value="1">Mañana
<option value="2">Tarde
<option value="3">Noche
</select>
</td>-->
<td>
<select name="hor[<?php  echo $j;?>]">
<option value=""></option>
<?php for ($hj=0;$hj<24;$hj++){;?>
<option value="<?php  echo $hj;?>:00"><?php  echo $hj;?>:00</option>
<option value="<?php  echo $hj;?>:15"><?php  echo $hj;?>:15</option>
<option value="<?php  echo $hj;?>:30"><?php  echo $hj;?>:30</option>
<option value="<?php  echo $hj;?>:45"><?php  echo $hj;?>:45</option>
<?php };?>
</select>
<!--<input type="text" name="hor[<?php  echo $j;?>]" size="6" maxlength="5"  placeholder="15:00"> </td>-->
<td>
<select name="margen[<?php  echo $j;?>]">
<option value=""></option>
<option value="00:05">00:05</option>
<option value="00:10">00:10</option>
</select>
<!--<input type="text" name="margen[<?php  echo $j;?>]" size="6" maxlength="5"  placeholder="00:05"></td>-->
<td><table>
<tr>
<td><input type="checkbox" value="1" name="lun[<?php  echo $j;?>]"></td>
<td><input type="checkbox" value="1" name="mar[<?php  echo $j;?>]"></td>
<td><input type="checkbox" value="1" name="mie[<?php  echo $j;?>]"></td>
<td><input type="checkbox" value="1" name="jue[<?php  echo $j;?>]"></td>
<td><input type="checkbox" value="1" name="vie[<?php  echo $j;?>]"></td>
<td><input type="checkbox" value="1" name="sab[<?php  echo $j;?>]"></td>
<td><input type="checkbox" value="1" name="dom[<?php  echo $j;?>]"></td>
</tr>
</table>
</td>
</tr>

<?php };?>



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
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>
