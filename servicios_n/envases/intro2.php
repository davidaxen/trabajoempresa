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

$valorult=$valorfinal+1;
for ($i=$valorinicial;$i<$valorult;$i++){;

$sql="SELECT * from envases where idempresas='".$ide."' and idenvases='".$i."'";
$result=$conn->query($sql);
$fetchAll=$result->fetchAll();
$row=count($fetchAll);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//echo $sql;
$row=mysqli_num_rows($result);*/
if ($row==0){;
	$sql1 = "INSERT INTO envases (idempresas,idenvases,fechaentrada,rellenados,estado) VALUES (:ide,'$i',:fecha,:relleno,'1')";
//echo $sql1;

	$temporal1 = $conn->prepare($sql1);
	$temporal1->bindParam(':ide', $ide);
	$temporal1->bindParam(':fecha', $fecha);
	$temporal1->bindParam(':relleno', $relleno);
	$temporal1->execute();

	//$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
}else{;
echo "El c&oacute;digo de envase ".$punt[$i]." ya habia sido introducido.<br/>";
};
};

};

if ($tabla=="ipuntconti"){;


if ($idclientes=='todos'){;

$sql="SELECT * from clientes where idempresas='".$ide."' ";
$sql.="and accdiarias='1'";
$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$fetchAll=$result->fetchAll();
$row=count($fetchAll);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//echo $sql;
$row=mysqli_num_rows($result);*/
if ($row!=0){;
/*for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=myqsli_fetch_array($result);*/
foreach ($resultmos as $rowmos) {
$idclientes=$rowmos['idclientes'];

$sql2="SELECT * from codservicios where idempresas='".$ide."' and idclientes='".$idclientes."' and idpccat='".$idpccat."'";
$result2=$conn->query($sql2);
$fetchAll2=$result2->fetchAll();
$row2=count($fetchAll2);
/*$result2=mysqli_query ($conn,$sql2) or die ("Invalid result2");
//echo $sql2;
$row2=mysqli_num_rows($result);*/
if ($row2==0){;
$clientes[]=$idclientes;
};
};
};

}else{;
$clientes[]=$idclientes;

};


for ($j=0;$j<count($clientes);$j++){;

if ($cantpuntcont=='todos'){;
for ($i=0;$i<count($punt);$i++){;
	$sql1 = "INSERT INTO codservicios (idempresas,idclientes,idpccat,idpcsubcat,activo) VALUES (:ide,:clientes,:idpccat,:punt,'1')";

	$temporal1 = $conn->prepare($sql1);
	$temporal1->bindParam(':ide', $ide);
	$temporal1->bindParam(':clientes', $clientes[$j]);
	$temporal1->bindParam(':idpccat', $idpccat);
	$temporal1->bindParam(':punt', $punt[$i]);
	$temporal1->execute();

	//$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
//echo $sql1;
};
}else{;
$valores=array_unique($punt);
//var_dump($valores);
for ($i=0;$i<count($punt);$i++){;
if ($valores[$i]!=null){;
	$sql1 = "INSERT INTO codservicios (idempresas,idclientes,idpccat,idpcsubcat,activo) VALUES (:ide,:clientes,:idpccat,:valores,'1')";

	$temporal1 = $conn->prepare($sql1);
	$temporal1->bindParam(':ide', $ide);
	$temporal1->bindParam(':clientes', $clientes[$j]);
	$temporal1->bindParam(':idpccat', $idpccat);
	$temporal1->bindParam(':valores', $valores[$i]);
	$temporal1->execute();

	//$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
//echo $sql1;
};
};
};

};



};



if ($tabla=="mpuntcont"){;

$sql0="update puntservicios set ";
$sql1="where idpcsubcat=:idpcsubcat and idempresas=:ide and idpccat=:idpccat";

$nombrec=array('subcategoria','rellr','rellg','rellb','activo');
$valora=array($subcategoria,$rellr,$rellg,$rellb,$activo);
$valorn=array($subcategorian,$rellrn,$rellgn,$rellbn,$activon);

for ($j=0;$j<count($nombrec);$j++){;
if ($valora[$j]!=$valorn[$j]){;
$sqla=$nombrec[$j]."='".$valorn[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo ($sql.'<br>');

	$temporald = $conn->prepare($sql);
	$temporald->bindParam(':idpcsubcat', $idpcsubcat);
	$temporald->bindParam(':ide', $ide);
	$temporald->bindParam(':idpccat', $idpccat);
	$temporald->execute();

//$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrec[$j]." ");
};

};

};


if ($tabla=="modpuntconti"){;

$sql0="update codservicios set ";
$sql1="where idclientes=:idclientes and idempresas=:ide and idpccat=:idpccat and idpcsubcat=:idpcsubcat";


$nombrec=array('activo','idpcsubcat');
$valora=array($activo,$idpcsubcat);
$valorn=array($activon,$idpcsubcatn);



for ($j=0;$j<count($nombrec);$j++){;
if ($valora[$j]!=$valorn[$j]){;
$sqla=$nombrec[$j]."='".$valorn[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo ($sql.'<br>');

	$temporald = $conn->prepare($sql);
	$temporald->bindParam(':idpcsubcat', $idpcsubcat);
	$temporald->bindParam(':ide', $ide);
	$temporald->bindParam(':idpccat', $idpccat);
	$temporald->bindParam(':idpcsubcat', $idpcsubcat);
	$temporald->execute();

//$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrec[$j]." ");
};

};

};


?>



LOS DATOS HAN SIDO INTRODUCCIDOS<p>

<?php  switch($tabla){
case 'ipuntcont': echo "<a href='lpuntcont.php'><img src='../../img/".$ic."' width='50px'><br/>Listado y Codigo de Envases</a><p>";break;

};

?>

<a href="/inicio_n.php" target="_parent">Volver a menu</a>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>