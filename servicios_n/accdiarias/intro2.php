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
$p=$ultpunto+1+$i;
$sql1 = "INSERT INTO puntservicios (idempresas,idpccat,idpcsubcat,subcategoria,rellr,rellg,rellb,activo) VALUES ('$ide','$idpccat','$p','$punt[$i]','$rellr[$i]','$rellg[$i]','$rellb[$i]','1')";
//echo $sql1;
$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");

};

};

if ($tabla=="ipuntconti"){;

if ($idclientes=='todos'){;

$sql="SELECT * from clientes where idempresas='".$ide."' ";
$sql.="and accdiarias='1'";
$result=$conn->query($sql);
$rows=$result->fetchColumn();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//echo $sql;
$row=mysqli_num_rows($result);*/
if ($rows!=0){;
/*for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result);
$resultado=mysqli_fetch_array($result);*/

foreach ($result as $row) {
$idclientes=$row['idclientes'];

$sql2="SELECT * from codservicios where idempresas='".$ide."' and idclientes='".$idclientes."' and idpccat='".$idpccat."'";
$result2=$conn->query($sql2);
$rows2=$result2->fetchColumn();
/*$result2=mysqli_query ($conn,$sql2) or die ("Invalid result2");
//echo $sql2;
$row2=mysqli_num_rows($result2);*/
if ($rows2==0){;
$clientes[]=$idclientes;
};
};
};

}else{;
$clientes[]=$idclientes;

};




for ($j=0;$j<count($clientes);$j++){;

if ($cantpuntcont=='todos'){;
	var_dump($punt);
for ($i=0;$i<count($punt);$i++){;
$sql1 = "INSERT INTO codservicios (idempresas,idclientes,idpccat,idpcsubcat,activo) VALUES ('$ide','$idclientes','$idpccat','$punt[$i]','1')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
//echo $sql1;
};
}else{;
$valores=array_unique($punt);
//var_dump($valores);
for ($i=0;$i<count($punt);$i++){;
if ($valores[$i]!=null){;
$sql1 = "INSERT INTO codservicios (idempresas,idclientes,idpccat,idpcsubcat,activo) VALUES ('$ide','$idclientes','$idpccat','$valores[$i]','1')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
//echo $sql1;
};
};
};

};

};



if ($tabla=="mpuntcont"){;

$sql0="update puntservicios set ";
$sql1="where idpcsubcat='".$idpcsubcat."' and idempresas='".$ide."' and idpccat='".$idpccat."'";


$nombrec=array('subcategoria','rellr','rellg','rellb','activo');
$valora=array($subcategoria,$rellr,$rellg,$rellb,$activo);
$valorn=array($subcategorian,"","","",$activon);

/*var_dump($valora);
echo "<br>";
var_dump($valorn);
echo "<br>";*/

for ($j=0;$j<count($nombrec);$j++){;
if ($valora[$j]!=$valorn[$j]){;
$sqla=$nombrec[$j]."='".$valorn[$j]."' ";
$sql=$sql0.$sqla.$sql1;

	$resultd = $conn->prepare($sql);
	$resultd->execute();

//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrec[$j]." ");
};

};

};


if ($tabla=="modpuntconti"){;

$sql0="update codservicios set ";
$sql1="where idclientes='".$idclientes."' and idempresas='".$ide."' and idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."'";


$nombrec=array('activo','idpcsubcat');
$valora=array($activo,$idpcsubcat);
$valorn=array($activon,$idpcsubcatn);



for ($j=0;$j<count($nombrec);$j++){;
if ($valora[$j]!=$valorn[$j]){;
$sqla=$nombrec[$j]."='".$valorn[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo ($sql.'<br>');
	$resultd = $conn->prepare($sql);
	$resultd->execute();
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrec[$j]." ");
};

};

};


?>



LOS DATOS HAN SIDO INTRODUCCIDOS<p>

<?php  switch($tabla){
case 'ipuntcont': echo "<a href='ipuntconti.php'>Asignación de Parametros</a><p>";break;
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