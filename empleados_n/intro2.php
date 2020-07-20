<?php 
include('bbdd.php');

if ($ide!=null){;
include('../portada_n/cabecera2.php')

?>


<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCION DE DATOS</p></div>
<div class="contenido">





<?php 
/*
print_r($_GET); 
echo "<br/>post";
print_r($_POST);
*/
//echo 'hola';

if ($tabla=="idempleados"){

//if ($numempleado>10){

if ($nif!=null){

$sql2="select id from empleados where idempresa='".$ide."' and nif='".$nif."'"; 

$result2=$conn->query($sql2);
$result2mos=$conn->query($sql2);
$fetchAll2=$result2->fetchAll();
$row2=count($fetchAll2);

//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result clientes");
//$row2=mysqli_num_rows($result2);

if ($row2==0){

if ($foto!=null){
$file = explode(".",$foto_name);
$rf=$ide.'-'.$idc.'-f';
$docf=$rf.".".strtolower($file[1]);
$path="../img/emp/";
copy($foto,$path.$docf);
}


if ($numempleado==''){
$sql="select idempleado from empleados where idempresa='".$ide."' order by idempleado desc"; 

	$result=$conn->query($sql);
    $resultmos=$conn->query($sql);
    $fetchAll=$result->fetchAll();
    $row=count($fetchAll);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result clientes");
//$row=mysqli_num_rows($result);
if ($row==0){
$idc=10;
}else{;
//$resultado=mysqli_fetch_array($result);
$idc=$resultado['idempleado'];
$idc=$idc+1;
};
}else{
$idc=$numempleado;
}

$sql1="INSERT INTO empleados (idempleado,idempresa,nombre,1apellido,2apellido,tnif,nif,";
$sql1.="cp,domicilio,provincia,localidad,nacionalidad,estado,";
$sql1.="entrada,incidencia,mensaje,alarma,accdiarias,accmantenimiento,niveles,productos,revision,trabajo,siniestro,control,mediciones,jornadas,informes,ruta,envases,incidenciasplus,seguimiento,teletrabajo,";
$sql1.="foto,tele1,tele2,email1,sexo,dia,mes,ano,numempleadogest,grupo) ";
$sql1.="VALUES (:idc,:ide,:nombre,:apellido1,:apellido2,:tnif,:nif,";
$sql1.=":cp,:direccion,:provincia,:localidad,:pais,'1',";

if ($grupo==null){;
//$sql1.="'$entrada','$incidencia','$mensaje','$alarma','$accdiarias','$accmantenimiento','$niveles','$productos','$revision','$trabajo','$siniestro','$control','$mediciones','$jornadas','$informes','$ruta','$envases','$incidenciasplus','$seguimiento','$teletrabajo',";

$sql2 =":entrada,:incidencia,:mensaje,:alarma,:accdiarias,:accmantenimiento,:niveles,:productos,:revision,:trabajo,:siniestro,:control,:mediciones,:jornadas,:informes,:ruta,:envases,:incidenciasplus,:seguimiento,:teletrabajo,";

$sql3 =":docf,:tele1,:tele2,:email1,:sexo,:dia4,:mes4,:ano4,:numempleadogest,:grupo)";

$sqlt= $sql1.$sql2.$sql3;

$temporal1 = $conn->prepare($sqlt);

$temporal1->bindParam(':idc', $idc);
$temporal1->bindParam(':ide', $ide);
$temporal1->bindParam(':nombre', $nombre);
$temporal1->bindParam(':apellido1', $apellido1);
$temporal1->bindParam(':apellido2', $apellido2);
$temporal1->bindParam(':tnif', $tnif);
$temporal1->bindParam(':nif', $nif);
$temporal1->bindParam(':cp', $cp);
$temporal1->bindParam(':direccion', $direccion);
$temporal1->bindParam(':provincia', $provincia);
$temporal1->bindParam(':localidad', $localidad);
$temporal1->bindParam(':pais', $pais);

$temporal1->bindParam(':entrada', $entrada);
$temporal1->bindParam(':incidencia', $incidencia);
$temporal1->bindParam(':mensaje', $mensaje);
$temporal1->bindParam(':alarma', $alarma);
$temporal1->bindParam(':accdiarias', $accdiarias);
$temporal1->bindParam(':accmantenimiento', $accmantenimiento);
$temporal1->bindParam(':niveles', $niveles);
$temporal1->bindParam(':productos', $productos);
$temporal1->bindParam(':revision', $revision);
$temporal1->bindParam(':trabajo', $trabajo);
$temporal1->bindParam(':siniestro', $siniestro);
$temporal1->bindParam(':control', $control);
$temporal1->bindParam(':mediciones', $mediciones);
$temporal1->bindParam(':jornadas', $jornadas);
$temporal1->bindParam(':informes', $informes);
$temporal1->bindParam(':ruta', $ruta);
$temporal1->bindParam(':envases', $envases);
$temporal1->bindParam(':incidenciasplus', $incidenciasplus);

if (empty($seguimiento)) {
	$seguimiento = 0;
}
$temporal1->bindParam(':seguimiento', $seguimiento);

if (empty($teletrabajo)) {
	$teletrabajo = 0;
}
$temporal1->bindParam(':teletrabajo', $teletrabajo);

if (empty($docf)) {
	$docf = 0;
}
$temporal1->bindParam(':docf', $docf);
$temporal1->bindParam(':tele1', $tele1);
$temporal1->bindParam(':tele2', $tele2);
$temporal1->bindParam(':email1', $email1);
$temporal1->bindParam(':sexo', $sexo);
$temporal1->bindParam(':dia4', $dia4);
$temporal1->bindParam(':mes4', $mes4);
$temporal1->bindParam(':ano4', $ano4);

if (empty($numempleadogest)) {
	$numempleadogest = 0;
}
$temporal1->bindParam(':numempleadogest', $numempleadogest);

if (empty($grupo)) {
	$grupo = 0;
}
$temporal1->bindParam(':grupo', $grupo);

$temporal1->execute();

}else{;
$vl=$grupo;
//$sql1.="'$entrada[$vl]','$incidencia[$vl]','$mensaje[$vl]','$alarma[$vl]','$accdiarias[$vl]','$accmantenimiento[$vl]','$niveles[$vl]','$productos[$vl]','$revision[$vl]','$trabajo[$vl]','$siniestro[$vl]','$control[$vl]','$mediciones[$vl]','$jornadas[$vl]','$informes[$vl]','$ruta[$vl]','$envases[$vl]','$incidenciasplus[$vl]','$seguimiento[$vl]','$teletrabajo[$vl]',";

$sql2 =":entrada,:incidencia,:mensaje,:alarma,:accdiarias,:accmantenimiento,:niveles,:productos,:revision,:trabajo,:siniestro,:control,:mediciones,:jornadas,:informes,:ruta,:envases,:incidenciasplus,:seguimiento,:teletrabajo,";

$sql3 =":docf,:tele1,:tele2,:email1,:sexo,:dia4,:mes4,:ano4,:numempleadogest,:grupo)";

$sqlt= $sql1.$sql2.$sql3;

$temporal1 = $conn->prepare($sqlt);

$temporal1->bindParam(':idc', $idc);
$temporal1->bindParam(':ide', $ide);
$temporal1->bindParam(':nombre', $nombre);
$temporal1->bindParam(':apellido1', $apellido1);
$temporal1->bindParam(':apellido2', $apellido2);
$temporal1->bindParam(':tnif', $tnif);
$temporal1->bindParam(':nif', $nif);
$temporal1->bindParam(':cp', $cp);
$temporal1->bindParam(':direccion', $direccion);
$temporal1->bindParam(':provincia', $provincia);
$temporal1->bindParam(':localidad', $localidad);
$temporal1->bindParam(':pais', $pais);

$temporal1->bindParam(':entrada', $entrada[$vl]);
$temporal1->bindParam(':incidencia', $incidencia[$vl]);
$temporal1->bindParam(':mensaje', $mensaje[$vl]);
$temporal1->bindParam(':alarma', $alarma[$vl]);
$temporal1->bindParam(':accdiarias', $accdiarias[$vl]);
$temporal1->bindParam(':accmantenimiento', $accmantenimiento[$vl]);
$temporal1->bindParam(':niveles', $niveles[$vl]);
$temporal1->bindParam(':productos', $productos[$vl]);
$temporal1->bindParam(':revision', $revision[$vl]);
$temporal1->bindParam(':trabajo', $trabajo[$vl]);
$temporal1->bindParam(':siniestro', $siniestro[$vl]);
$temporal1->bindParam(':control', $control[$vl]);
$temporal1->bindParam(':mediciones', $mediciones[$vl]);
$temporal1->bindParam(':jornadas', $jornadas[$vl]);
$temporal1->bindParam(':informes', $informes[$vl]);
$temporal1->bindParam(':ruta', $ruta[$vl]);
$temporal1->bindParam(':envases', $envases[$vl]);
$temporal1->bindParam(':incidenciasplus', $incidenciasplus[$vl]);
$temporal1->bindParam(':seguimiento', $seguimiento[$vl]);
$temporal1->bindParam(':teletrabajo', $teletrabajo[$vl]);

$temporal1->bindParam(':docf', $docf);
$temporal1->bindParam(':tele1', $tele1);
$temporal1->bindParam(':tele2', $tele2);
$temporal1->bindParam(':email1', $email1);
$temporal1->bindParam(':sexo', $sexo);
$temporal1->bindParam(':dia4', $dia4);
$temporal1->bindParam(':mes4', $mes4);
$temporal1->bindParam(':ano4', $ano4);
$temporal1->bindParam(':numempleadogest', $numempleadogest);
$temporal1->bindParam(':grupo', $grupo);


$temporal1->execute();

};

//echo $sql1;

//$result1=$conn->query($sql1);

//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result iempleados 1");

$useremp=$ide.$idc;
$passnif=$nif;
if ($passnif==''){;
$passnif='AAAAAAAA';
};

include ('../yo.php');

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($passnif, METHOD, $key, 0, $iv);
			$passnif=base64_encode($output);




$sql2 = "INSERT INTO usuarios (user,password,idempresas,idempleados,trabajador,tusuario,modulo) VALUES (:useremp,:passnif,:ide,:idc,'1','3','41')";

$temporal2 = $conn->prepare($sql2);

$temporal2->bindParam(':useremp', $useremp);
$temporal2->bindParam(':passnif', $passnif);
$temporal2->bindParam(':ide', $ide);
$temporal2->bindParam(':idc', $idc);

$temporal2->execute();


//$result2=$conn->query($sql2);

//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result usuarios");
}else{
$datos="22";
}

}else{
$datos="24";
};

$datcli=array('entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro',
'control','mediciones','ruta','envases','incidenciasplus','seguimiento','jornadas','informes','teletrabajo');
$tablas=array('clientes','empleados','servicios');

for ($j=0;$j<count($tablas);$j++){;
for ($t=0;$t<count($datcli);$t++){;
$sql="update ".$tablas[$j]." set ".$datcli[$t]."='0' where ".$datcli[$t]."=''";
//echo $sql.'<br/>';

$result=$conn->exec($sql);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result 10 ".$tablas[$j]);

};
};

$sql="update servicios set cuadrante='0' where cuadrante=''";
//echo $sql.'<br/>';

$result=$conn->exec($sql);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result 20");


}


if ($tablas=="modificar"){;
$sql0="update empleados set ";
$sql1="where idempleado='".$idc."' and idempresa='".$ide."'";


if ($grupo1!=null){;
$vl=$grupo1;
$entrada1=$entrada[$vl];
$incidencia1=$incidencia[$vl];
$mensaje1=$mensaje[$vl];
$alarma1=$alarma[$vl];
$accdiarias1=$accdiarias[$vl];
$accmantenimiento1=$accmantenimiento[$vl];
$niveles1=$niveles[$vl];
$productos1=$productos[$vl];
$revision1=$revision[$vl];
$trabajo1=$trabajo[$vl];
$siniestro1=$siniestro[$vl];
$control1=$control[$vl];
$mediciones1=$mediciones[$vl];
$jornadas1=$jornadas[$vl];
$informes1=$informes[$vl];
$ruta1=$ruta[$vl];
$envases1=$envases[$vl];
$indicenciasplus1=$incidenciasplus[$vl];
$seguimiento1=$seguimiento[$vl];
$teletrabajo1=$teletrabajo[$vl];
};



$nombrecampo=array('nombre','1apellido','2apellido','estado','nif','tnif','sexo','dia','mes','ano',
'cp','domicilio','localidad','provincia','tele1','tele2','email1','nacionalidad','grupo',
'entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento','teletrabajo');

$valoractual=array($nombre,$apellido1,$apellido2,$estadoe,$nif,$tnif,$sexo,$diaa,$mesa,$anoa,
$cp,$domicilio,$localidad,$provincia,$tele1,$tele2,$email1,$idpais,$grupo,
$entrada,$incidencia,$mensaje,$alarma,$accdiarias,$accmantenimiento,$niveles,$productos,$revision,$trabajo,$siniestro,$control,$mediciones,$jornadas,$informes,$ruta,$envases,$incidenciasplus);


$valornuevo=array($nombre1,$apellido11,$apellido21,$estadoemp1,$nif1,$tnif1,$sexo1,$diaa1,$mesa1,$anoa1,
$cp1,$domicilio1,$localidad1,$provincia1,$tele1n,$tele2n,$email1n,$idpais1,$grupo1,
$entrada1,$incidencia1,$mensaje1,$alarma1,$accdiarias1,$accmantenimiento1,$niveles1,$productos1,$revision1,$trabajo1,$siniestro1,$control1,$mediciones1,$jornadas1,$informes1,$ruta1,$envases1,$incidenciasplus1,$seguimiento1,$teletrabajo1);


//echo (count($nombrecampo));
for ($j=0;$j<count($nombrecampo);$j++){;

if ($nombrecampo[$j]=="estado"){;
//echo $valoractual[$j];
//echo $valornuevo[$j];
if ($valoractual[$j]!=$valornuevo[$j]){;
if ($valornuevo[$j]=="1"){;
$sql10="select lictra from empresas where idempresas='".$ide."'"; 

$result10=$conn->query($sql10);
$resultado10=$result10->fetch();

//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result lic");
//$resultado10=mysqli_fetch_array($result10);
$lictra=$resultado10['lictra'];
$sql10="select count(idempleado) as tot from empleados where idempresa='".$ide."' and estado='1'"; 

$result10=$conn->query($sql10);
$resultado10=$result10->fetch();
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result empleados");
//$resultado10=mysqli_fetch_array($result10);
$tota=$resultado10['tot'];
if ($lictra>$tota){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo $sql;

$resultd=$conn->query($sql);

//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
}else{;
$datos=23;
};

}else{;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo $sql;

$resultd=$conn->query($sql);

//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
};
};
}else{;

if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo $sql;

$resultd=$conn->query($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
$datos='';


};
};



if ($foto1!=null){
$file = explode(".",$foto1_name);
$rf=$ide.'-'.$idc.'-f';$docf=$rf.".".strtolower($file[1]);
$path="../img/emp/";
copy($foto1,$path.$docf);
$sqla="foto='".$docf."' ";
$sql=$sql0.$sqla.$sql1;

$resultd=$conn->query($sql);

//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result foto");

}


}

$sql2="select idempleados from usuarios where idempresas='".$ide."' and idempleados='".$idc."'"; 

	$result2=$conn->query($sql2);
    $fetchAll2=$result2->fetchAll();
    $row2=count($fetchAll2);

//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result clientes");
//$row2=mysqli_num_rows($result2);

if ($row2==0){
$sql2="select * from empleados where idempresa='".$ide."' and idempleado='".$idc."'";

$result2=$conn->query($sql2);
$resultado2=$result2->fetch();

//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result clientes");
//$resultado2=mysqli_fetch_array($result2);
$passnif=$resultado2['nif'];
if ($passnif==''){
$passnif='AAAAAAAA';
}
$useremp=$ide.$idc;

$sql2 = "INSERT INTO usuarios (user,password,idempresas,idempleados,trabajador) VALUES (:useremp,:passnif,:ide,:idc,'1')";

$temporal2 = $conn->prepare();

$temporal1->bindParam(':useremp', $useremp);
$temporal1->bindParam(':passnif', $passnif);
$temporal1->bindParam(':ide', $ide);
$temporal1->bindParam(':idc', $idc);

$temporal2->execute();
//$result2=$conn->query($sql2);

//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result usuarios");

}

}
?>

<?php 
if ($datos==21){
?>
Tienes que poner un NIF.<br>
<img alt="volver" border="0" src="../img/arrow_cycle.png" onclick="history.go(-2)">

<?php 
}
?>
<?php 
if ($datos==22){
?>
El NIF esta repetido.<br>
<img alt="volver" border="0" src="../img/arrow_cycle.png" onclick="history.go(-2)">
<?php 
}; 
?>
<?php 
if ($datos==24){
?>
El Numero de Empleado debe de ser mayor que 10.<br>
<img alt="volver" border="0" src="../img/arrow_cycle.png" onclick="history.go(-2)">
<?php 
}
?>

<?php 
if ($datos==23){
?>
<table>
<tr><td class="enc">Ya ha utilizado todas las licencias contratadas</td></tr>
<tr><td class="enc">Póngase en contacto con su comercial</td></tr>
</table><br>
EL RESTO DE DATOS HAN SIDO MODIFICADOS<p>
<?php 
}


if ($datos==''){
?>
LOS DATOS HAN SIDO INTRODUCCIDOS<p>
<?php 
}
?>
<p>
<a href="lempleados2.php?estadoe=1">Volver a menu</a>
</div>
<?php }else{
include ('../cierre.php');
 } 


 ?>