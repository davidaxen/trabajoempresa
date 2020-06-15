<?php  
include('bbdd.php');

if ($ide!=null){;

 include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCION DE DATOS</p></div>
<div class="contenido">
<?php  
if ($tabla=="ipuntconta"){;
$sql="SELECT * from aseguradora where idempresa='".$ide."' order by idaseguradora desc"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$row2=mysqli_num_rows($result);

if ($row2==0){;
$idaseg=1;
}else{;
$resultado=mysqli_fetch_array($result);
$idaseguradora=$resultado['idaseguradora'];
$idaseg=$idaseguradora+1;
};

$sql1 = "INSERT INTO aseguradora (idempresa,idaseguradora,aseguradora,contacto,telefono,direccion,email) VALUES ('$ide','$idaseg','$aseguradora','$pcontacto','$telcontacto','$dircontacto','$mailcontacto')";
$result1=mysqli_query($conn,$sql1) or die ("Invalid result ipuntconta");

};




if ($tabla=="ipuntcont"){;
$sql="SELECT * from siniestros where idempresa='".$ide."' order by idsiniestro desc"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$row2=mysqli_num_rows($result);

if ($row2==0){;
$idsiniestro=1;
}else{;
$resultado=mysqli_fetch_array($result);
$idsiniestro=$resultado['idsiniestro'];
$idsiniestro=$idsiniestro+1;
};

function getCoordinates($address){
    $address = urlencode($address);
    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address;
    $response = file_get_contents($url);
    $json = json_decode($response,true);
 
    $lat = $json['results'][0]['geometry']['location']['lat'];
    $lng = $json['results'][0]['geometry']['location']['lng'];
 
    return array($lat, $lng);
}
 
 
$coords = getCoordinates($dircontacto.",".$loccontacto.",".$procontacto);
$lat1=$coords[0];
$lon1=$coords[1]; 
 



$diaapertura=$y.'-'.$m.'-'.$d;
$horaapertura=$hora.':'.$min.':'.$seg;

$sql1 = "INSERT INTO siniestros (idempresa,idsiniestro,numsiniestro,idaseguradora,contacto,telefono,direccion,localidad,provincia,cp,email,descripcion,terminado,diaapertura,horaapertura,latdir,londir) VALUES ('$ide','$idsiniestro','$numsiniestro','$idaseguradora','$pcontacto','$telcontacto','$dircontacto','$loccontacto','$procontacto','$cpcontacto','$mailcontacto','$descripcion','0','$diaapertura','$horaapertura','$lat1','$lon1')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result ipuntcont");

};





if ($tabla=="modpuntconta"){;


$sql0="update aseguradora set ";
$sql1="where idaseguradora='".$idaseguradora."' and idempresa='".$ide."'";


$nombrecampo=array('aseguradora','contacto','telefono','direccion','email','estado');

$valoractual=array($aseguradora,$pcontacto,$telcontacto,$dircontacto,$mailcontacto,$estado);

$valornuevo=array($aseguradora1,$pcontacto1,$telcontacto1,$dircontacto1,$mailcontacto1,$estado1);

for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql);
};
};


};




if ($tabla=="modpuntcontc"){;


$sql0="update siniestros set ";
$sql1="where idsiniestro='".$idsiniestro."' and idempresa='".$ide."'";


$nombrecampo=array('numsiniestro','idaseguradora','contacto','telefono','direccion','localidad','provincia','cp','email','descripcion','terminado');

$valoractual=array($numsiniestro,$idaseguradora,$pcontacto,$telcontacto,$dircontacto,$loccontacto,$procontacto,$cpcontacto,$mailcontacto,$descripcion,$terminado);

$valornuevo=array($numsiniestro1,$idaseguradora1,$pcontacto1,$telcontacto1,$dircontacto1,$loccontacto1,$procontacto1,$cpcontacto1,$mailcontacto1,$descripcion1,$terminado1);

for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql);
};
};


};

if ($tabla=="modpuntcont"){;


$sql0="update siniestros set ";
$sql1="where idsiniestro='".$idsiniestro."' and idempresa='".$ide."'";

$diaapertura1=$a.'-'.$m.'-'.$d;
$horaapertura1=$h.':'.$min.':'.$seg;

$nombrecampo=array('numsiniestro','idaseguradora','contacto','telefono','direccion','localidad','provincia','cp','email','descripcion','diaapertura','horaapertura','terminado');

$valoractual=array($numsiniestro,$idaseguradora,$pcontacto,$telcontacto,$dircontacto,$loccontacto,$procontacto,$cpcontacto,$mailcontacto,$descripcion,$diaapertura,$horaapertura,$terminado);

$valornuevo=array($numsiniestro1,$idaseguradora1,$pcontacto1,$telcontacto1,$dircontacto1,$loccontacto1,$procontacto1,$cpcontacto1,$mailcontacto1,$descripcion1,$diaapertura1,$horaapertura1,$terminado1);

for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql);
};
};


};


if ($tabla=="modcpuntcont"){;


$sql0="update siniestros set ";
$sql1="where idsiniestro='".$idsiniestro."' and idempresa='".$ide."'";

$diacierre1=$a.'-'.$m.'-'.$d;
$horacierre1=$h.':'.$min.':'.$seg;

$nombrecampo=array('terminado','diacierre','horacierre');

$valoractual=array($estado,$diacierre,$horacierre);

$valornuevo=array($estado1,$diacierre1,$horacierre1);

for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql);
};
};

};



if ($tabla=="ipuntconti"){;


//echo $tabla."-".$ide;

$sql0="update siniestros set ";
$sql1="where idsiniestro='".$idsiniestro."' and idempresa='".$ide."'";

$diaasig1=$y.'-'.$m.'-'.$d;
$horaasig1=$hora.':'.$min.':'.$seg;

$nombrecampo=array('idempleado','diaasignacion','horaasignacion');

$valoractual=array($idempleado,$diaasig,$horaasig);

$valornuevo=array($idempleado1,$diaasig1,$horaasig1);

for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql);
};
};



};


//echo "hola".$tabla;
?>


LOS DATOS HAN SIDO INTRODUCCIDOS<p>

<?php  switch($tabla){
case ipuntcont: echo "<a href='ipuntconti.php?idsiniestro=$idsiniestro'>Asginacion de Reparaciones / Siniestro</a><p>";break;
case iasientos: echo "<a href='iasientos.php?idc=$idc'>Introducir nuevos asientos de la misma comunidad</a><p><a href='iasientos.php'>Introducir nuevos asientos</a><p>";break;
case idivision: echo "<a href='ivecinos.php?idc=$idc'>Introducir los vecinos</a><p>";break;
case ivecinos: echo "<a href='icoeficientes.php?idc=$idc'>Introducir los coeficientes</a><p>";break;
case irecibos: echo "<a href='irecibos.php'>Introducir nuevos recibos</a><p>";break;
case icoeficientes: echo "<a href='ipresupuestos.php?idc=$idc'>Introducir los presupuestos</a><p>";break;
case ipresupuestos: echo "<a href='icuotas.php?idc=$idc'>Calcular las cuotas</a><p>";break;
case iactas: echo "<a href='iactas.php'>Introducir nuevas actas</a><p>";break;
case iproveedores: echo "<a href='iproveedores.php'>Introducir nuevos proveedores</a><p>";break;
case igestiones: echo "<a href='iacciones.php?idg=$idg'>Introducir las acciones</a><p>";break;
case icarnet: echo "<a href='icarnetvec.php'>Introducir las datos de vecinos</a><p>";break;

};

?>

<a href="/inicio_n.php" target="_parent">Volver a menu</a>
</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>