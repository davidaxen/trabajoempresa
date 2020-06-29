<?php  
include('bbdd.php');

if ($ide!=null){;


 include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ENVIO DE MENSAJES</p></div>
<div class="contenido">


<?php  
//echo $idemplt;
if ($idemplt=='todos'){;
$day=date('Y-m-d H:i:s', time());
$sql="SELECT * from empleados where idempresa='".$ide."' and estado='1'";
$result=$conn->query($sql);


//$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//$row=mysqli_affected_rows();
/*for ($i=0;$i<$row;$i++){;
$idempleadost=mysqli_result($result,$i,'idempleado');*/
foreach ($result as $rowmos) {
	$idempleado=$rowmos['idempleado'];
$sql1 = "INSERT INTO mensajes (idempresa,idempleado,texto,user,respondido,dia) VALUES ('$ide','$idempleadost','$texto','$user','0','$day')";
//echo $sql1;
$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
};

}else{;
$day=date('Y-m-d H:i:s', time());
$sql1 = "INSERT INTO mensajes (idempresa,idempleado,texto,user,respondido,dia) VALUES ('$ide','$idemplt','$texto','$user','0','$day')";
//echo $sql1;
$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
};

?>
LOS DATOS HAN SIDO INTRODUCCIDOS<p>

<?php 

if (!empty($tabla)) {

 switch($tabla){
case 'icomunidad': echo "<a href='idivision.php?idc=$idc'>Introducir las divisiones</a><p>";break;
case 'iasientos': echo "<a href='iasientos.php?idc=$idc'>Introducir nuevos asientos de la misma comunidad</a><p><a href='iasientos.php'>Introducir nuevos asientos</a><p>";break;
case 'idivision': echo "<a href='ivecinos.php?idc=$idc'>Introducir los vecinos</a><p>";break;
case 'ivecinos': echo "<a href='icoeficientes.php?idc=$idc'>Introducir los coeficientes</a><p>";break;
case 'irecibos': echo "<a href='irecibos.php'>Introducir nuevos recibos</a><p>";break;
case 'icoeficientes': echo "<a href='ipresupuestos.php?idc=$idc'>Introducir los presupuestos</a><p>";break;
case 'ipresupuestos': echo "<a href='icuotas.php?idc=$idc'>Calcular las cuotas</a><p>";break;
case 'iactas': echo "<a href='iactas.php'>Introducir nuevas actas</a><p>";break;
case 'iproveedores': echo "<a href='iproveedores.php'>Introducir nuevos proveedores</a><p>";break;
case 'igestiones': echo "<a href='iacciones.php?idg=$idg'>Introducir las acciones</a><p>";break;
case 'icarnet': echo "<a href='icarnetvec.php'>Introducir las datos de vecinos</a><p>";break;

}
};

?>

<a href="/inicio_n.php" target="_parent">Volver a menu</a>
</div>
</div>



<?php } else {;
include ('../../cierre.php');
 };?>