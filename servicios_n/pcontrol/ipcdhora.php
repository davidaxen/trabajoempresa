<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>
<script>

function mod2(num,numi){
	var numf=formulario.valor.value
	//alert (numf)
	
for (i=numi;i<numf+1;i++){
elem1=eval("verf"+i)
if (i==num){
elem1.style.visibility="visible"
}else{
elem1.style.visibility="hidden"
}
}
}

</script>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE PUNTOS DE MOVIMIENTO</p></div>
<div class="contenido">

<table>
<tr class="subenc3"><td>Datos de la Comunidad</td><td>
<?php 
$fechaa=date("Y-m-d", mktime(0, 0, 0, $m, $d, $y));
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
//echo $sql1;
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
?>
<?php  echo $nombre;?>
</td></tr>
<tr class="subenc3"><td>Dia</td><td><?php  echo $fechaa;?></td></tr>
</table>
<p>
<table>
<tr class="subenc"><td>Punto de Control</td><td>Hora</td><td>Incidencia</td><td>Imagen</td></tr>
<?php 

$idronda='c';
$dato=1;
$ki=0;


while ($idronda!='f') {;
//include('../../bbdd/sqlsmartcbc.php');
$sql="SELECT * from almpcronda where idempresas='".$ide."' and idcliente='".$idclientes."' and id='".$idpcronda."'";
// and dia='".$fechaa."'";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$resultado=mysqli_fetch_array($result);
$idpcronda=$idpcronda+1;
?>
<?php 
$hora=$resultado['hora'];
$texto=$resultado['texto'];
$idronda=$resultado['idronda'];
$imgronda=$resultado['img'];
$ilat=$resultado['lat'];
$ilon=$resultado['lon'];
//include('../../bbdd/sqlfacturacion.php');
$sql2="SELECT * from puntcont where idempresas='".$ide."' and idclientes='".$idclientes."' and idpuntcont='".$idronda."'";
//echo $sql2;
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result2");
$resultado2=mysqli_fetch_array($result2);
$descripcion=$resultado2['descripcion'];
?>
<tr class="subenc"><td><?php  echo $descripcion;?></td>
<td><?php  echo $hora;?></td><td><?php  echo $texto;?></td>
<td>
<?php if ($imgronda!=''){;
$ki=$ki+1;
$imagen[$ki]=$imgronda;
?>
<img src="../../img/ver.gif" onclick="mod2(<?php  echo $ki;?>,1)" ondblclick="mod2(0,1)" title="pincha una vez para ver y dos para quitar" width="25px">

<?php };?>

</td>
<td><a href="/portada_n/mapa.php?lon=<?php  echo $ilon;?>&lat=<?php  echo $ilat;?>&nombrecom=<?php  echo $nombre;?>&nombretrab=<?php  echo $nempleado;?>">
<img src="/img/modificar.gif">
</a></td>
<td><?php  echo $ilat;?>-<?php  echo $ilon;?></td>



</tr>
<?php 
};
?>
</table>
<form name="formulario">
<input type="hidden" name="valor" value="<?php  echo $ki;?>">
</form>
<div class="posf2" id="verf0" ></div>
<?php 
$ty=$ki+1;
for ($i=1;$i<$ty;$i++){;?>
<div class="posf2" id="verf<?php  echo $i;?>" ><img src="../../img/<?php  echo $imagen[$i];?>" width="300" height="300" ></div>
<?php };?>


<p>
<img alt="volver" border="0" src="../../img/Reload-icon.png" width="32px" onclick="history.back()">

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>