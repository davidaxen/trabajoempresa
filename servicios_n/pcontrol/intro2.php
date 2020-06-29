<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCION DE DATOS</p></div>
<div class="contenido">
<?php  
if ($tabla=="ipuntcont"){;

for ($i=0;$i<count($punt);$i++){;
$j=$i-1;
switch($i) {;
case 0:
$sql1 = "INSERT INTO puntcont (idempresas,idclientes,idpuntcont,descripcion) VALUES ('$ide','$idclientes','c','$punt[$i]')";
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
$result1=$conn->exec($sql1);
break;
case 1:
$sql1 = "INSERT INTO puntcont (idempresas,idclientes,idpuntcont,descripcion) VALUES ('$ide','$idclientes','f','$punt[$i]')";
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
$result1=$conn->exec($sql1);
break;
default:
$sql1 = "INSERT INTO puntcont (idempresas,idclientes,idpuntcont,descripcion) VALUES ('$ide','$idclientes','$j','$punt[$i]')";
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
$result1=$conn->exec($sql1);
break;
};
};

};

if ($tabla=="puntos"){;

$sql0="update puntcont set ";
$sql1="where id='".$id."' and idempresas='".$ide."'";

if ($descripcion!=$descripcionn){;
$sqla="descripcion='".$descripcionn."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql);
};

};




if ($tabla=="npuntcont"){;

$sql="select *  from puntcont where idempresas='".$ide."' and idclientes='".$idclientes."' order by id  desc";
$result=$conn->query($sql);
$resultado=$result->fetch();
//$result=mysqli_query ($conn,$sql) or die ("Invalid result puntcont");
$valor=$resultado['idpuntcont'];

for ($i=0;$i<count($punt);$i++){;
$j=$valor+$i+1;
$sql1 = "INSERT INTO puntcont (idempresas,idclientes,idpuntcont,descripcion) VALUES ('$ide','$idclientes','$j','$punt[$i]')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
//echo $sql1;
};

};


?>



LOS DATOS HAN SIDO INTRODUCCIDOS<p>

<?php  switch($tabla){
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

};

?>

<a href="/inicio_n.php" target="_parent">Volver a menu</a>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>