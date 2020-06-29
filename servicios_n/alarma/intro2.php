<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCION DE DATOS</p></div>
<div class="contenido">

<?php  

if ($tabla=='alta'){;

$dnum=strlen($d);
for($j=$dnum;$j<2;$j++){;
$d='0'.$d;
};
$mnum=strlen($m);
for($j=$mnum;$j<2;$j++){;
$m='0'.$m;
};



$hnum=strlen($h);
for($j=$hnum;$j<2;$j++){;
$h='0'.$h;
};
$minnum=strlen($min);
for($j=$minnum;$j<2;$j++){;
$min='0'.$min;
};
$segnum=strlen($seg);
for($j=$segnum;$j<2;$j++){;
$seg='0'.$seg;
};

$dia=$y.'-'.$m.'-'.$d;




$sql1 = "INSERT INTO alarma (idempresas,idclientes,dia,d,m,y,h,min,seg,user,respondido,mensaje) 
VALUES ('$ide','$idclientes','$dia','$d','$m','$y','$h','$min','$seg','$user','0','$texto')";
//echo $sql1;
$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
};


if ($tabla=='modificar'){;
include('modificar.php');
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

include('../../cierre.php');
};?>