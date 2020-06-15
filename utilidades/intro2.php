<html>
<head>
<title>Visualización de cuentas anuales de comunidades</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('../bbdd/sqlfacturacion.php');
?>
<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height="80"></td><td class="enc">INTRODUCCION DE DATOS</td></tr>
</table>


<? 

if ($tabla=="icarnetvec"){;

for($j=0;$j<10;$j++){;

if ($nom[$j]!=null){;
if ($foto1[$j]!=null){;
$file = explode(".",$foto1_name);
$rf=$ide.'-'.$idpl.'-f-'.$j;
$docf=$rf.".jpg";
//.$file[1];
$path="./img/emp/";
copy($foto1[$j],$path.$docf);
};

$sql1 = "INSERT INTO defcarnet (idcarnet,nombre,foto) VALUES ('$idpl','$nom[$j]','$docf')";
echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
};
};
};

if ($tabla=="icarnet"){;


for($j=0;$j<$nvec;$j++){;

$sql1 = "INSERT INTO carnetpiso (idc,idcliente,planta,letra) VALUES ('$ide','$idcliente','$pl[$j]','$let[$j]')";
echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
};

};


if ($tabla=="avigilancia"){;
$sql1 = "INSERT INTO datos_vigilancia (idempresa,idcliente,puntoscontrol,telefono,horario) VALUES ('$ide','$idclientes','$tipo','$telefono','$horario')";
$result1=mysql_query ($sql1) or die ("Invalid result datos_vigilancia");

for ($l=0;$l<$ntrabajadores;$l++){;
$sql2 = "INSERT INTO datos_personal (idempresa,idcliente,idempleado) VALUES ('$ide','$idclientes','$empleados[$l]')";
$result2=mysql_query ($sql2) or die ("Invalid result datos_personal");
};


};

if ($tabla=="modvigilancia"){;

$sql0="update datos_vigilancia set ";
$sql1="where idcliente='".$idclientes."' and idempresa='".$ide."' ";

$sql2="and id='".$id."'";

$datosnue=array($tiponue,$telefononue,$horarionue);
$datos=array($tipo,$telefono,$horario,);
$bbdd=array('puntoscontrol','telefono','horario');

for ($i=0;$i<count($datosnue);$i++){

if ($datosnue[$i]!=$datos[$i]){;
$sqla="$bbdd[$i]='".$datosnue[$i]."' ";
$sql=$sql0.$sqla.$sql1.$sql2;
echo $sql;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

};


};






if ($tabla=="apiscinas"){;


for($j=0;$j<$cant;$j++){;

$sql1 = "INSERT INTO datos_piscina (idempresa,idcliente,tipo,volumen,superficie,profundidad,filtro,tiempo_renov,producto,nvecinos) VALUES ('$ide','$idclientes','$tipo[$j]','$volumen[$j]','$superficie[$j]','$profundidad[$j]','$filtro[$j]','$tiempo[$j]','$producto[$j]','$nvecinos[$j]')";
$result1=mysql_query ($sql1) or die ("Invalid result datos_piscina");
};

};


if ($tabla=="modpiscinas"){;

$sql0="update datos_piscina set ";
$sql1="where idcliente='".$idclientes."' and idempresa='".$ide."' ";

for($j=0;$j<$cant;$j++){;
$sql2="and id='".$id[$j]."'";

$datosnue=array($tiponue[$j],$volumennue[$j],$superficienue[$j],$profundidadnue[$j],$filtronue[$j],$tiemponue[$j],$productonue[$j],$nvecinosnue[$j]);
$datos=array($tipo[$j],$volumen[$j],$superficie[$j],$profundidad[$j],$filtro[$j],$tiempo[$j],$producto[$j],$nvecinos[$j]);
$bbdd=array('tipo','volumen','superficie','profundidad','filtro','tiempo','producto','nvecinos');

for ($i=0;$i<count($datosnue);$i++){

if ($datosnue[$i]!=$datos[$i]){;
$sqla="$bbdd[$i]='".$datosnue[$i]."' ";
$sql=$sql0.$sqla.$sql1.$sql2;
echo $sql;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

};

};
};

if ($tabla=="modpublic"){;

$sql0="update publi set ";
$sql1="where id='".$idc."' and idempresa='".$ide."' ";


$datosnue=array($titulo,$año,$fecha,$estado);
$datos=array($tituloant,$añoant,$fechaant,$estadoant);
$bbdd=array('titulo','año','fecha','estado');

for ($i=0;$i<count($datosnue);$i++){

if ($datosnue[$i]!=$datos[$i]){;
$sqla="$bbdd[$i]='".$datosnue[$i]."' ";
$sql=$sql0.$sqla.$sql1;
echo $sql;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

};

if ($imagen!=null){;
$path="../../publi/";

unlink($path.$imagenant);

$file = explode(".",strtolower($imagen_name));
$rf=$ide.'-'.$idc.'-fa';
$doca=$rf.".".strtolower($file[1]);
copy($imagen,$path.$doca);
$sqla="campaña='".$doca."' ";
$sql=$sql0.$sqla.$sql1;
echo $sql;
$resultd=mysql_query ($sql) or die ("Invalid result");
};
if ($docpdf!=null){;
$path="../../publi/";
unlink($path.$docpdfant);

$file = explode(".",strtolower($docpdf_name));
$rf=$ide.'-'.$idc.'-fb';
$docb=$rf.".".strtolower($file[1]);
copy($docpdf,$path.$docb);
$sqla="documento='".$docb."' ";
$sql=$sql0.$sqla.$sql1;
echo $sql;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($dossierpdf!=null){;
$path="../../publi/";
$path2="../images/";
unlink($path.$dossierpdfant);
unlink($path2.$dossierpdfant);
$file = explode(".",strtolower($dossierpdf_name));
$rf='dossier-'.$idc.$año;
$docc=$rf.".".strtolower($file[1]);

copy($dossierpdf,$path.$docc);

copy($dossierpdf,$path2.$docc);
$sqla="dossier='".$docc."' ";
$sql=$sql0.$sqla.$sql1;
echo $sql;
$resultd=mysql_query ($sql) or die ("Invalid result");
};




};

if ($tabla=="public"){;

if ($imagen!=null){;
$file = explode(".",strtolower($imagen_name));
$rf=$ide.'-'.$idc.'-fa';
$doca=$rf.".".strtolower($file[1]);
$path="../../publi/";
copy($imagen,$path.$doca);
};
if ($docpdf!=null){;
$file = explode(".",strtolower($docpdf_name));
$rf=$ide.'-'.$idc.'-fb';
$docb=$rf.".".strtolower($file[1]);
$path="../../publi/";
copy($docpdf,$path.$docb);
};

if ($dossierpdf!=null){;
$file = explode(".",strtolower($dossierpdf_name));
$rf='dossier-'.$idc.$año;
$docc=$rf.".".strtolower($file[1]);
$path="../../publi/";
copy($dossierpdf,$path.$docc);
$path2="../images/";
copy($dossierpdf,$path2.$docc);
};

$sql1 = "INSERT INTO publi (idempresa,titulo,campaña,documento,dossier,año,fecha) VALUES ('$ide','$titulo','$doca','$docb','$docc','$año','$fecha')";
$result1=mysql_query ($sql1) or die ("Invalid result publi");


};






if ($tabla=="publicd"){;

if ($list=='a'){;
$sql1 = "INSERT INTO destinatario (numcoleg,nombre,domicilio,cp,provincia,localidad,tele1,tele2,fax,email1,email2) VALUES 
('$numcol','$nombre','$direccion','$cp','$provincia','$localidad','$tele1','$tele2','$fax1','$email1','$email2')";
$result1=mysql_query ($sql1) or die ("Invalid result destinatario");
};


if ($list=='e'){;
$sql1 = "INSERT INTO empresaspub (contacto,nombre,domicilio,cp,provincia,localidad,tele1,tele2,fax,email1,email2) VALUES 
('$contacto','$nombre','$direccion','$cp','$provincia','$localidad','$tele1','$tele2','$fax1','$email1','$email2')";
$result1=mysql_query ($sql1) or die ("Invalid result destinatario");
};


if ($list=='c'){;

if ($foto!=null){;
$file = explode(".",$foto_name);
$rf=$ide.'-'.$nombre.'-f';
$docf=strtolower($rf).".".strtolower($file[1]);
$path="../img/prescon/";
copy($foto,$path.$docf);
};

$sql1 = "INSERT INTO propuestas (idempresa,nombre,domicilio,cp,provincia,localidad,fotocliente) VALUES 
('$ide','$nombre','$direccion','$cp','$provincia','$localidad','$docf')";
$result1=mysql_query ($sql1) or die ("Invalid result destinatario");
};

};


if ($tabla=="notas"){;

$dia=date("Y-m-d",time());
$hora=date("H:i",time());

$sql1 = "INSERT INTO notas (idempresa,destinatario,idref,dia,hora,idcampaña,observaciones,personal,estado) VALUES 
('$ide','$list','$idref','$dia','$hora','$camp','$obser','$user','$estadon')";
//echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result destinatario");



};


if ($tabla=="reunion"){;

//$dia=date("Y-m-d",time());
//$hora=date("H:i",time());

$sql1 = "INSERT INTO reunion (idempresa,destinatario,idref,dia,hora,idcampaña,observaciones,personal,estado) VALUES 
('$ide','$list','$idref','$diar','$horar','$camp','$obser','$user','$estadon')";
//echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result destinatario");



};


if ($tabla=="idempleados"){;

if ($fotocarneta!=null){;
$file = explode(".",$fotocarneta_name);
$rf=$ide.'-'.$idc.'-fa';
$doca=$rf.".".$file[1];
$path="../img/emp/";
copy($fotocarneta,$path.$doca);
};
if ($fotocarnetb!=null){;
$file = explode(".",$fotocarnetb_name);
$rf=$ide.'-'.$idc.'-fb';
$docb=$rf.".".$file[1];
$path="../img/emp/";
copy($fotocarnetb,$path.$docb);
};
if ($fotoss!=null){;
$file = explode(".",$fotoss_name);
$rf=$ide.'-'.$idc.'-fs';
$docss=$rf.".".$file[1];
$path="../img/emp/";
copy($fotoss,$path.$docss);
};
if ($foto!=null){;
$file = explode(".",$foto_name);
$rf=$ide.'-'.$idc.'-f';
$docf=$rf.".".$file[1];
$path="../img/emp/";
copy($foto,$path.$docf);
};
if ($fotootro!=null){;
$file = explode(".",$fotootro_name);
$rf=$ide.'-'.$idc.'-f';
$doco=$rf.".".$file[1];
$path="../img/emp/";
copy($fotootro,$path.$doco);
};

$sql1 = "INSERT INTO empleados (idempleado,idempresa,nombre,1apellido,2apellido,nif,nss,formacion,dia,mes,año,cp,domicilio,provincia,localidad,nacionalidad,estado,ent,suc,dc,ncuenta,fotocarneta,fotocarnetb,foto,fotoss,fotootro) VALUES ('$idc','$ide','$nombre','$apellido1','$apellido2','$nif','$nss','$formacion','$dia','$mes','$año','$cp','$direccion','$provincia','$localidad','$pais','0','$ent','$suc','$dc','$cc','$doca','$docb','$docf','$docss','$doco')";
$result1=mysql_query ($sql1) or die ("Invalid result iempleados");

$sql2 = "INSERT INTO usuarios (user,password,idempresas,trabajadores) VALUES ('$nif','$nif','$ide','1')";
$result2=mysql_query ($sql2) or die ("Invalid result usuarios");


};


if ($tabla=="aempleados"){;

$sql0 = "update empleados set estado='1' where idempleado='".$idc."' and idempresa='".$ide."'";
$result0=mysql_query ($sql0) or die ("Invalid result iclientes");

$falta=$año.'-'.$mes.'-'.$dia;
$sql1 = "INSERT INTO altass (idempleado,idempresa,idafiliaciones,grupo,tcontrato,tjornada,fjornada,nhoras,diaalta,mesalta,añoalta,fechaalta,diabaja,mesbaja,añobaja,pprueba,csalariales,vacaciones,clausulas,c_t) VALUES ('$idc','$ide','$rama','$grupo','$tcontrato','$tjornada','$fjornada','$nhoras','$dia','$mes','$año','$falta','0','0','0','$pprueba','$csalariales','$vacaciones','$clausulas','$idc_t')";
$result1=mysql_query ($sql1) or die ("Invalid result altass");


$fecha=$año."-".$mes."-".$dia;

$sql2 = "INSERT INTO precios (idempleado,idempresa,preciobruto,mejorasvoluntarias,antiguedad,turnicidad,nocturnidad,asistencia,fecha,transporte,prendas,locomocion,irpf) VALUES ('$idc','$ide','$salariobase','$mejorasvoluntarias','$antiguedad','$turnicidad','$nocturnidad','$asistencia','$fecha','$plustrabajo','$prendastrabajo','$gastosloc','$irpf')";
$result2=mysql_query ($sql2) or die ("Invalid result precios");


};

if ($tabla=="bempleados"){;

$fbaja=$año.'-'.$mes.'-'.$dia;

$sql1 = "UPDATE altass SET diabaja='".$dia."', mesbaja='".$mes."', añobaja='".$año."', fechabaja='".$fbaja."', tbaja='".$tipo."' where id='".$ida."' and idempresa='".$ide."' and idempleado='".$idc."'";
$result1=mysql_query ($sql1) or die ("Invalid result altass");


$sql2 = "UPDATE empleados SET estado='0' where idempresa='".$ide."' and idempleado='".$idc."' and id='".$id."'";
$result2=mysql_query ($sql2) or die ("Invalid result empleados");


};

if ($tabla=="msalarios"){;

$fecha=$año."-".$mes."-".$dia;

$sql2 = "INSERT INTO precios (idempleado,idempresa,preciobruto,mejorasvoluntarias,antiguedad,turnicidad,nocturnidad,asistencia,fecha,transporte,prendas,locomocion,irpf) VALUES ('$idc','$ide','$salariobase','$mejorasvoluntarias','$antiguedad','$turnicidad','$nocturnidad','$asistencia','$fecha','$plustrabajo','$prendastrabajo','$gastosloc','$irpf')";
$result2=mysql_query ($sql2) or die ("Invalid result precios");


};


if ($tabla=="idclientes"){;

$sql1 = "INSERT INTO clientes (idclientes,nombre,nif,cp,domicilio,provincia,localidad,ent,suc,dc,ncuenta,fvigor,idempresas,tiva) VALUES ('$idc','$cliente','$nif','$cp','$direccion','$provincia','$localidad','$ent','$suc','$dc','$ncuenta','$fvigor','$ide','$tiva')";
$result1=mysql_query ($sql1) or die ("Invalid result iclientes");

$sql2 = "INSERT INTO tiva (idclientes,fecha,idempresas,tiva) VALUES ('$idc','$fvigor','$ide','$tiva')";
$result2=mysql_query ($sql2) or die ("Invalid result tiva");
};

if ($tabla=="idexistencias"){;
$sql1 = "INSERT INTO existencias (idexist,idproveedor,idempresas,nombre,caracteristicas,propio) VALUES ('$idc','$proveedor','$ide','$existencia','$caract','$propio')";
$result1=mysql_query ($sql1) or die ("Invalid result idexistencias");
};

if ($tabla=="idexistenciasr"){;
$sql1 = "INSERT INTO existenciasr (idexist,idproveedor,idempresas,nombre,caracteristicas,propio) VALUES ('$idc','$proveedor','$ide','$existencia','$caract','$propio')";
$result1=mysql_query ($sql1) or die ("Invalid result idexistenciasr");
};

if ($tabla=="idexistenciash"){;
$sql1 = "INSERT INTO existenciash (idexist,idproveedor,idempresas,nombre,caracteristicas,propio) VALUES ('$idc','$proveedor','$ide','$existencia','$caract','$propio')";
$result1=mysql_query ($sql1) or die ("Invalid result idexistenciash");
};


if ($tabla=="ipuntcont"){;

for ($i=0;$i<$cantpuntcont;$i++){;
$sql1 = "INSERT INTO puntcont (idempresas,idclientes,idpuntcont,descripcion) VALUES ('$ide','$idclientes','$i','$punt[$i]')";
$result1=mysql_query ($sql1) or die ("Invalid result ipuntcont");
};
};



if ($tabla=="idproveedores"){;

$sql1 = "INSERT INTO proveedores (idproveedores,nombre,nif,cp,domicilio,provincia,localidad,ent,suc,dc,ncuenta,fvigor,idempresas,tgastos) VALUES ('$idc','$proveedor','$nif','$cp','$direccion','$provincia','$localidad','$ent','$suc','$dc','$ncuenta','$fvigor','$ide','$tgastos')";
$result1=mysql_query ($sql1) or die ("Invalid result iproveedores");

};




if ($tablas=="modificar"){;

if ($datos=="modpublid"){;
if ($list=='a'){;
$sql0="update destinatario set ";
};
if ($list=='c'){;
$sql0="update propuestas set ";
};
if ($list=='e'){;
$sql0="update empresaspub set ";
};
if ($list=='f'){;
$sql0="update callejero set ";
};
$sql1="where id='".$id."'";
};

if ($datos=="modclientes"){;
$sql0="update clientes set ";
$sql1="where idclientes='".$idclientes."' and idempresas='".$ide."'";
};
if ($datos=="modempleados"){;
$sql0="update empleados set ";
$sql1="where idempleado='".$idc."' and idempresa='".$ide."'";
};
if ($datos=="modexist"){;
$sql0="update existencias set ";
$sql1="where idexist='".$idexist."' and idempresas='".$ide."'";
};
if ($datos=="modproveedores"){;
$sql0="update proveedores set ";
$sql1="where idproveedores='".$idproveedores."' and idempresas='".$ide."'";
};


if ($contacto1!=$contacto){;
$sqla="contacto='".$contacto1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result caract");
};



if ($caract1!=$caract){;
$sqla="caracteristicas='".$caract1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result caract");
};

if ($nombre1!=$nombre){;
$sqla="nombre='".$nombre1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result nombre");
};

if ($apellido11!=$apellido1){;
$sqla="1apellido='".$apellido11."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result apellido1");
};

if ($apellido21!=$apellido2){;
$sqla="2apellido='".$apellido21."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result apellido2");
};

if ($estado1!=$estado){;
$sqla="estado='".$estado1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result estado");
};

if ($correomal1!=$correomal){;
$sqla="correomal='".$correomal1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result estado");
};

if ($piscinanue!=$piscina1){;
$sqla="piscina='".$piscinanue."' ";
$sql=$sql0.$sqla.$sql1;
//echo $sql;
$resultd=mysql_query ($sql) or die ("Invalid result piscina");
};


if ($edificacionnue!=$edificacion){;
$sqla="edificacion='".$edificacionnue."' ";
$sql=$sql0.$sqla.$sql1;
echo $sql;
$resultd=mysql_query ($sql) or die ("Invalid result piscina");
};


if ($nif1!=$nif){;
$sqla="nif='".$nif1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result nif");
};

if ($tiva1!=$tiva){;
$sqla="tiva='".$tiva1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result tiva");
$sql0="update clientes set ";
$sql1="where idclientes='".$idclientes."' and idempresas='".$ide."'";

$sql2 = "INSERT INTO tiva (idclientes,fecha,idempresas,tiva) VALUES ('$idclientes','$fiva','$ide','$tiva1')";
$result2=mysql_query ($sql2) or die ("Invalid result tiva"); 
};

if ($tgastos1!=$tgastos){;
$sqla="tgastos='".$tgastos1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result tgastos");
};

if ($dia1!=$dia){;
$sqla="dia='".$dia1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result dia");
};

if ($mes1!=$mes){;
$sqla="mes='".$mes1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result mes");
};

if ($año1!=$año){;
$sqla="año='".$año1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result año");
};

if ($nss1!=$nss){;
$sqla="nss='".$nss1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result nss");
};

if ($cp1!=$cp){;
$sqla="cp='".$cp1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result cp");
};

if ($domicilio1!=$domicilio){;
$sqla="domicilio='".$domicilio1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result domicilio");
};

if ($localidad1!=$localidad){;
$sqla="localidad='".$localidad1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result localidad");
};

if ($provincia1!=$provincia){;
$sqla="provincia='".$provincia1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result provincia");
};

if ($tele1n!=$tele1){;
$sqla="tele1='".$tele1n."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result tele1");
};

if ($tele2n!=$tele2){;
$sqla="tele2='".$tele2n."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result tele2");
};

if ($faxa1!=$faxa){;
$sqla="fax='".$faxa1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result fax");
};

if ($email1n!=$email1){;
$sqla="email1='".$email1n."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result email1");
};

if ($email2n!=$email2){;
$sqla="email2='".$email2n."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result email2");
};


if ($ent1!=$ent){;
$sqla="ent='".$ent1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result ent");
};

if ($suc1!=$suc){;
$sqla="suc='".$suc1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result suc");
};

if ($dc1!=$dc){;
$sqla="dc='".$dc1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result dc");
};

if ($ncuenta1!=$ncuenta){;
$sqla="ncuenta='".$ncuenta1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result ncuenta");
};

if ($fvigor1!=$fvigor){;
$sqla="fvigor='".$fvigor1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result fvigor");
};

if ($fotocarneta1!=null){;

if ($fotocarneta1!=$fotocarneta){;
$file = explode(".",$fotocarneta1_name);
$rf=$ide.'-'.$idc.'-fa';
$doc=$rf.".".$file[1];
$path="../img/emp/";
copy($fotocarneta1,$path.$doc);
$sqla="fotocarneta='".$doc."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result fotocarneta");
};
};

if ($fotocarnetb1!=null){;
if ($fotocarnetb1!=$fotocarnetb){;
$file = explode(".",$fotocarnetb1_name);
$rf=$ide.'-'.$idc.'-fb';
$doc=$rf.".".$file[1];
$path="../img/emp/";
copy($fotocarnetb1,$path.$doc);
$sqla="fotocarnetb='".$doc."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result fotocarnetb");
};
};

if ($fotoss1!=null){;
if ($fotoss1!=$fotoss){;
$file = explode(".",$fotoss1_name);
$rf=$ide.'-'.$idc.'-fs';
$doc=$rf.".".$file[1];
$path="../img/emp/";
copy($fotoss1,$path.$doc);
$sqla="fotoss='".$doc."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result fotoss");
};
};

if ($fotootro1!=null){;
if ($fotootro1!=$fotootro){;
$file = explode(".",$fotootro1_name);
$rf=$ide.'-'.$idc.'-fo';
$doc=$rf.".".$file[1];
$path="../img/emp/";
copy($fotootro1,$path.$doc);
$sqla="fotootro='".$doc."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result fotootro");
};
};

if ($foto1!=null){;
if ($foto1!=$foto){;
$file = explode(".",$foto1_name);
$rf=$ide.'-'.$idc.'-f';
$doc=$rf.".".$file[1];
$path="../img/emp/";
copy($foto1,$path.$doc);
$sqla="foto='".$doc."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result foto");
};
};


if ($file1!=null){;
if ($file1!=$file){;
$foto1 = explode(".",$file1_name);
$rf=$ide.'-'.$nombre1.'-f';
$doc=strtolower($rf).".".strtolower($foto1[1]);
$path="../img/prescon/";
copy($file1,$path.$doc);
$sqla="fotocliente='".$doc."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result foto");
};
};




};

if ($tablas=="modfacturas"){;

if ($cobrado==1){;
$fechaa=$año."-".$mes."-".$dia;
}else{;
$fechaa="0000-00-00";
};

$sql0="update facturas set ";
$sqla="cobrado='".$cobrado."', fechacobrado='".$fechaa."' ";
$sql1="where nfactura='".$nfactura."' and idempresas='".$ide."'";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");

$sql4="select idcliente, obs, total from facturas where idempresas='".$ide."' and nfactura='".$nfactura."'"; 
$result4=mysql_query ($sql4) or die ("Invalid result4");
$obs=mysql_result($result4,0,'obs');
$total=mysql_result($result4,0,'total');
$idcliente=mysql_result($result4,0,'idcliente');
$idclientep=$idcliente;
$h=strlen($idclientep);

for ($u=0;$u<($codcontab-$h);$u++){;
$idclientep='0'.$idclientep;
};
$fechaa=$año."-".$mes."-".$dia;

include('contabilidad/sqlcontabilidad.php');

$sql21="select idasiento from asientos where idempresas='".$ide."' order by idasiento desc";
$result21=mysql_query ($sql21) or die ("Invalid result categoria");
$idasiento=mysql_result($result21,0,'idasiento');
if ($idasiento!=null){;
$idasiento=$idasiento+1;
}else{;
$idasiento=1;
};

$sql22="select subcuenta from cuentas where";
switch ($formap){;
case 1:$sql22.=" cuenta='430'";break;
case 2:$sql22.=" cuenta='431'";break;
};
$sql22.=" and subcuenta like '%".$idclientep."'  and idempresa='".$ide."'";
$result22=mysql_query ($sql22) or die ("Invalid result22");
$ccli=mysql_result($result22,0,'subcuenta');

$sql23="select subcuenta from cuentas where cuenta='669' and idempresa='".$ide."'";
$result23=mysql_query ($sql23) or die ("Invalid result23");
$cdeb=mysql_result($result23,0,'subcuenta');

$cban=$ingreso;

if ($cobrado==1){;

$sql11="insert into asientos (idasiento,idempresas,fecha,año,debe,haber,categoria,obs) 
values ('$idasiento','$ide','$fechaa','$año','','$total','$ccli','$obs')";
$result11=mysql_query ($sql11) or die ("Invalid result11");

$sql12="insert into asientos (idasiento,idempresas,fecha,año,debe,haber,categoria,obs) 
values ('$idasiento','$ide','$fechaa','$año','$total','','$cban','$obs')";
$result12=mysql_query ($sql12) or die ("Invalid result12");


}else{;

$total2=$total+$gastosdevolucion;

$sql11="insert into asientos (idasiento,idempresas,fecha,año,debe,haber,categoria,obs) 
values ('$idasiento','$ide','$fechaa','$año','$total','','$ccli','$obs')";
$result11=mysql_query ($sql11) or die ("Invalid result11");

$sql12="insert into asientos (idasiento,idempresas,fecha,año,debe,haber,categoria,obs) 
values ('$idasiento','$ide','$fechaa','$año','','$total2','$cban','$obs')";
$result12=mysql_query ($sql12) or die ("Invalid result12");

$sql13="insert into asientos (idasiento,idempresas,fecha,año,debe,haber,categoria,obs) 
values ('$idasiento','$ide','$fechaa','$año','$gastosdevolucion','','$cdeb','$obs')";
$result132=mysql_query ($sql13) or die ("Invalid result12");

};


};



if ($tablas=="modfrecibidas"){;
$sql0="update frecibidas set ";
$sqla="pagado='".$cobrado."' ";
$sql1="where idfr='".$idfr."' and idempresa='".$ide."'";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");

$fechaa=$año."-".$mes."-".$dia;
$total=$subt+$iva;
$obs="pago del documento ".$idfr;

include('contabilidad/sqlcontabilidad.php');

$sql21="select idasiento from asientos where idempresas='".$ide."' order by idasiento desc";
$result21=mysql_query ($sql21) or die ("Invalid result categoria");
$idasiento=mysql_result($result21,0,'idasiento');
if ($idasiento!=null){;
$idasiento=$idasiento+1;
}else{;
$idasiento=1;
};


$sql22="select subcuenta from cuentas where";
/*switch ($formap){;
case 1:$sql22.=" cuenta='400'";break;
case 2:$sql22.=" cuenta='401'";break;
};
*/
$sql22.=" cuenta='401'";
$sql22.=" and idempresa='".$ide."'";
$result22=mysql_query ($sql22) or die ("Invalid result22");
$cpro=mysql_result($result22,0,'subcuenta');

$sql23="select subcuenta from cuentas where cuenta='669' and idempresa='".$ide."'";
$result23=mysql_query ($sql23) or die ("Invalid result23");
$cdeb=mysql_result($result23,0,'subcuenta');

$cban=$ingreso;


if ($cobrado==1){;

$sql11="insert into asientos (idasiento,idempresas,fecha,año,debe,haber,categoria,obs) 
values ('$idasiento','$ide','$fechaa','$año','$total','','$cpro','$obs')";
$result11=mysql_query ($sql11) or die ("Invalid result11");

$sql12="insert into asientos (idasiento,idempresas,fecha,año,debe,haber,categoria,obs) 
values ('$idasiento','$ide','$fechaa','$año','','$total','$cban','$obs')";
$result12=mysql_query ($sql12) or die ("Invalid result12");


}else{;

$total2=$total-$gastosdevolucion;
$obs="devolución del documento ".$idfr;

$sql11="insert into asientos (idasiento,idempresas,fecha,año,debe,haber,categoria,obs) 
values ('$idasiento','$ide','$fechaa','$año','','$total','$cpro','$obs')";
$result11=mysql_query ($sql11) or die ("Invalid result11");

$sql12="insert into asientos (idasiento,idempresas,fecha,año,debe,haber,categoria,obs) 
values ('$idasiento','$ide','$fechaa','$año','$total2','','$cban','$obs')";
$result12=mysql_query ($sql12) or die ("Invalid result12");

$sql13="insert into asientos (idasiento,idempresas,fecha,año,debe,haber,categoria,obs) 
values ('$idasiento','$ide','$fechaa','$año','$gastosdevolucion','','$cdeb','$obs')";
$result132=mysql_query ($sql13) or die ("Invalid result12");

};



};


if ($tabla=="idpresucon"){;

if ($fotocliente!=null){;
$file = explode(".",$fotocliente_name);
$rf=$ide.'-'.$cliente.'-'.$año;
$doca=$rf.".".$file[1];
$path="./img/prescon/";
copy($fotocliente,$path.$doca);
};



$sql1 = "INSERT INTO propuestas (idempresa,idu,cliente,domicilio,cp,provincia,fotocliente) VALUES ('$ide','$idu','$cliente','$domicilio','$cp','$provincia','$doca')";
$result1=mysql_query ($sql1) or die ("Invalid result propuestas");



};


if ($tabla=="cuadrante"){;

for($j=1;$j<$dias+1;$j++){;
if ($empleados[$j]<>' '){;
$sql0="insert into cuadrante (fecha,turno,horas,idcomunidad,idempleado) values";
$sql1="('$fecha[$j]','$turno','$horas','$idcomunidad','$empleados[$j]')";
$sql=$sql0.$sql1;
echo $sql;
$resultd=mysql_query ($sql) or die ("Invalid result");
};
};
};


if ($tabla=="mcuadrante"){;
if ($nueempleados=="b"){;
$sql="delete from cuadrante where fecha='".$fecha."' and idcomunidad='".$idcomunidad."' and turno='".$turno."' and idempleado='".$antempleado."'";
$resultd=mysql_query ($sql) or die ("Invalid result");
}else{;
$sql0="update cuadrante set ";
$sql1="where fecha='".$fecha."' and idcomunidad='".$idcomunidad."' and turno='".$turno."'";
//if ($nueempleados!=$antempleado){;
$sqla="idempleado='".$nueempleados."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
//};
};
};
?>



LOS DATOS HAN SIDO INTRODUCCIDOS<p>

<? switch($tabla){
case icomunidad: echo "<a href='idivision.php?idc=$idc'>Introducir las divisiones</a><p>";break;
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

<a href="inicio.php" target="_parent">Volver a menu</a>
</body>
</html>