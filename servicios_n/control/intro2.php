<?php  
include('bbdd.php');
$idpccat=3;
if ($ide!=null){;

 include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCION DE DATOS</p></div>
<div class="contenido">

<?php  
if ($tabla=="ipuntconta"){;
$sql="SELECT * from evento where idempresa='".$ide."' order by idevento desc";
$result=$conn->query($sql);
$resultt=$conn->query($sql);
$fetchAll2=$result->fetchAll();
$row2=count($fetchAll2);
//$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//$row2=mysqli_num_rows($result);

if ($row2==0){;
$idevento=1;
}else{;
	$resultado=$resultt->fetch();
//$resultado=mysqli_fetch_array($result);
$idevento=$resultado['idevento'];
$idevento=$idevento+1;
};
$fcomienzo=$acomienzo.'-'.$mcomienzo.'-'.$dcomienzo;
$ffinal=$afinal.'-'.$mfinal.'-'.$dfinal;

$sql1 = "INSERT INTO evento (idempresa,idevento,evento,contacto,telefono,direccion,email,estado,fcomienzo,ffinal,programa) VALUES (:ide,:idevento,:evento,:pcontacto,:telcontacto,:dircontacto,:mailcontacto,'1',:fcomienzo,:ffinal,:programa)";

	$temporal1 = $conn->prepare($sql1);
	$temporal1->bindParam(':ide', $ide);
	$temporal1->bindParam(':idevento', $idevento);
	$temporal1->bindParam(':evento', $evento);
	$temporal1->bindParam(':pcontacto', $pcontacto);
	$temporal1->bindParam(':telcontacto', $telcontacto);
	$temporal1->bindParam(':dircontacto', $dircontacto);
	$temporal1->bindParam(':mailcontacto', $mailcontacto);
	$temporal1->bindParam(':fcomienzo', $fcomienzo);
	$temporal1->bindParam(':ffinal', $ffinal);
	$temporal1->bindParam(':programa', $programa);
	$temporal1->execute();

//$result1=$conn->exec($sql);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntconta");
};

if ($tabla=="ipuntcont"){;
$sql="SELECT * from asistentes where idempresa='".$ide."' order by idasistente desc";
$result=$conn->query($sql);
$resultt=$conn->query($sql);
$fetchAll2=$result->fetchAll();
$row2=count($fetchAll2);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row2=mysqli_num_rows($result);*/

if ($row2==0){;
$idasistente=1;
}else{;
	$resultado=$resultt->fetch();
//$resultado=mysqli_fetch_array($result);
$idasistente=$resultado['idasistente'];
$idasistente=$idasistente+1;
};


$sql1 = "INSERT INTO asistentes (idempresa,idasistente,nombre,papellido,sapellido,dni,domicilio,cp,telefono,email,localidad,provincia,empresa) 
VALUES (:ide,:idasistente,:nombreasist,:papellidoasist,:sapellidoasist,:dniasist,:dirasist,:cpasist,:telasist,:mailasist,:locasist,:proasist,:empresaasist)";
//echo $sql1;

	$temporal1 = $conn->prepare($sql1);
	$temporal1->bindParam(':ide', $ide);
	$temporal1->bindParam(':idasistente', $idasistente);
	$temporal1->bindParam(':nombreasist', $nombreasist);
	$temporal1->bindParam(':papellidoasist', $papellidoasist);
	$temporal1->bindParam(':sapellidoasist', $sapellidoasist);
	$temporal1->bindParam(':dniasist', $dniasist);
	$temporal1->bindParam(':dirasist', $dirasist);
	$temporal1->bindParam(':telasist', $telasist);
	$temporal1->bindParam(':mailasist', $mailasist);
	$temporal1->bindParam(':locasist', $locasist);
	$temporal1->bindParam(':proasist', $proasist);
	$temporal1->bindParam(':empresaasist', $empresaasist);
	$temporal1->execute();

//$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");

};





if ($tabla=="modpuntconta"){;


$sql0="update evento set ";
$sql1="where idevento=:idevento and idempresa=:ide";


$nombrecampo=array('evento','contacto','telefono','direccion','email','estado','fcomienzo','ffinal','programa');

$valoractual=array($evento,$pcontacto,$telcontacto,$dircontacto,$mailcontacto,$estado,$fcomienzo,$ffinal,$programa);

$valornuevo=array($evento,$pcontacto1,$telcontacto1,$dircontacto1,$mailcontacto1,$estado1,$fcomienzo1,$ffinal1,$programa1);

for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."=:valornuevo ";
$sql=$sql0.$sqla.$sql1;

	$temporald = $conn->prepare($sql);
	$temporald->bindParam(':idevento', $idevento);
	$temporald->bindParam(':ide', $ide);
	$temporald->bindParam(':valornuevo', $valornuevo[$j]);
	$temporald->execute();

//$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql);
};
};


};




if ($tabla=="modpuntcontc"){;


$sql0="update siniestros set ";
$sql1="where idsiniestro=:idsiniestro and idempresa=:ide";


$nombrecampo=array('numsiniestro','idaseguradora','contacto','telefono','direccion','localidad','provincia','cp','email','descripcion','terminado');

$valoractual=array($numsiniestro,$idaseguradora,$pcontacto,$telcontacto,$dircontacto,$loccontacto,$procontacto,$cpcontacto,$mailcontacto,$descripcion,$terminado);

$valornuevo=array($numsiniestro1,$idaseguradora1,$pcontacto1,$telcontacto1,$dircontacto1,$loccontacto1,$procontacto1,$cpcontacto1,$mailcontacto1,$descripcion1,$terminado1);

for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."=:valornuevo ";
$sql=$sql0.$sqla.$sql1;

	$temporald = $conn->prepare($sql);
	$temporald->bindParam(':idsiniestro', $idsiniestro);
	$temporald->bindParam(':ide', $ide);
	$temporald->bindParam(':valornuevo', $valornuevo[$j]);
	$temporald->execute();

//$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql);
};
};


};

if ($tabla=="modpuntcont"){;


$sql0="update siniestros set ";
$sql1="where idsiniestro=:idsiniestro and idempresa=:ide";

$diaapertura1=$a.'-'.$m.'-'.$d;
$horaapertura1=$h.':'.$min.':'.$seg;

$nombrecampo=array('numsiniestro','idaseguradora','contacto','telefono','direccion','localidad','provincia','cp','email','descripcion','diaapertura','horaapertura','terminado');

$valoractual=array($numsiniestro,$idaseguradora,$pcontacto,$telcontacto,$dircontacto,$loccontacto,$procontacto,$cpcontacto,$mailcontacto,$descripcion,$diaapertura,$horaapertura,$terminado);

$valornuevo=array($numsiniestro1,$idaseguradora1,$pcontacto1,$telcontacto1,$dircontacto1,$loccontacto1,$procontacto1,$cpcontacto1,$mailcontacto1,$descripcion1,$diaapertura1,$horaapertura1,$terminado1);

for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."=:valornuevo ";
$sql=$sql0.$sqla.$sql1;

	$temporald = $conn->prepare($sql);
	$temporald->bindParam(':idsiniestro', $idsiniestro);
	$temporald->bindParam(':ide', $ide);
	$temporald->bindParam(':valornuevo', $valornuevo[$j]);
	$temporald->execute();

//$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql);
};
};


};


if ($tabla=="modcpuntcont"){;


$sql0="update siniestros set ";
$sql1="where idsiniestro=:idsiniestro and idempresa=:ide";

$diacierre1=$a.'-'.$m.'-'.$d;
$horacierre1=$h.':'.$min.':'.$seg;

$nombrecampo=array('terminado','diacierre','horacierre');

$valoractual=array($estado,$diacierre,$horacierre);

$valornuevo=array($estado1,$diacierre1,$horacierre1);

for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."=:valornuevo ";
$sql=$sql0.$sqla.$sql1;

	$temporald = $conn->prepare($sql);
	$temporald->bindParam(':idsiniestro', $idsiniestro);
	$temporald->bindParam(':ide', $ide);
	$temporald->bindParam(':valornuevo', $valornuevo[$j]);
	$temporald->execute();

//$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql);
};
};

};



if ($tabla=="ipuntconti"){;


//echo $tabla."-".$ide;

$sql0="update siniestros set ";
$sql1="where idsiniestro=:idsiniestro and idempresa=:ide";

$diaasig1=$y.'-'.$m.'-'.$d;
$horaasig1=$hora.':'.$min.':'.$seg;

$nombrecampo=array('idempleado','diaasignacion','horaasignacion');

$valoractual=array($idempleado,$diaasig,$horaasig);

$valornuevo=array($idempleado1,$diaasig1,$horaasig1);

for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."=:valornuevo ";
$sql=$sql0.$sqla.$sql1;

	$temporald = $conn->prepare($sql);
	$temporald->bindParam(':idsiniestro', $idsiniestro);
	$temporald->bindParam(':ide', $ide);
	$temporald->bindParam(':valornuevo', $valornuevo[$j]);
	$temporald->execute();

//$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql);
};
};



};


//echo "hola".$tabla;
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
