<?php 
include('bbdd.php');
include('../yo.php');
include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCION DE DATOS</p></div>
<div class="contenido">

<?php  
//echo 'Entrada en la pagina intro2';

$mal = 0;
$datos = 1;

if ($tabla=="idclientes"){;
if ($nif!=null){;

if ($idc>10){;

$sql0="select idclientes from clientes where idempresas='".$ide."' and idclientes='".$idc."'";
$result0=$conn->query($sql0);
$result0mos=$conn->query($sql0);
$num_rows=$result0->fetchAll();
$row=count($num_rows);


/*$result0=mysqli_query($conn,$sql0) or die ("Invalid result clientes");
$row=mysqli_affected_rows();*/

if ($row==0){;

$sql1 = "INSERT INTO clientes (idclientes,nombre,nif,cp,domicilio,provincia,localidad,idempresas,estado,tipo,
entrada,incidencia,mensaje,alarma,accdiarias,accmantenimiento,niveles,productos,revision,trabajo,siniestro,control,mediciones,ruta,envases,incidenciasplus,seguimiento) 
VALUES ('$idc','$cliente','$nif','$cp','$direccion','$provincia','$localidad','$ide','1','$tipo',
'$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]','$datos[11]','$datos[12]','$datos[15]','$datos[16]','$datos[17]','$datos[18]')";
//echo $sql1;
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result iclientes");

$passnif=substr($nemp,0,4).substr($nif,0,4);

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($passnif, METHOD, $key, 0, $iv);
			$passnif=base64_encode($output);



$sql2 = "INSERT INTO usuarios (user,password,idempresas,idcliente,cliente) VALUES ('$nif','$passnif','$ide','$idc','1')";
$result2=$conn->exec($sql2);
//$result2=mysqli_query($conn,$sql2) or die ("Invalid result usuarios");

$sql1 = "INSERT INTO codservicios (idempresas,idclientes,idpccat,idpcsubcat,activo) VALUES ('$ide','$idc','1','1','1')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ipuntcont3");

$sql1 = "INSERT INTO codservicios (idempresas,idclientes,idpccat,idpcsubcat,activo) VALUES ('$ide','$idc','1','2','1')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ipuntcont2");

}else{;
$mal="4";
};

}else{;
$mal="3";
};

}else{;

$mal="1";
};



};









if ($tabla=="idgestores"){;

if ($tele1!=null){;
$usergnue='g'.$ide.$idc;

$sql1 = "INSERT INTO gestores (idgestor,idempresa,nombregestor,percontacto,telefono1,telefono2,fax,direccion,cp,email,user) 
VALUES ('$idc','$ide','$gestor','$percontacto','$tele1','$tele2','$fax1','$direccion','$cp','$emailn','$usergnue')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result igestores");
//echo $sql1;


$idg=$idc;
$tedt1740=strlen($idg);
if ($tedt1740<4){;
for($rord=0;$rord<(4-$tedt1740);$rord++){;
$idg='0'.$idg;
};
};

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($tele1, METHOD, $key, 0, $iv);
			$tele1=base64_encode($output);

$sql2 = "INSERT INTO usuarios (user,password,idempresas,idgestor,gestor,tusuario,modulo) VALUES ('$usergnue','$tele1','$ide','$idc','1','4','40')";
$result2=$conn->exec($sql2);
//$result2=mysqli_query($conn,$sql2) or die ("Invalid result usuarios");

}else{;
$mal="2";
};


};


if ($tabla=="idvecinos"){;

if (($emailn!=null) and ($referencia!=null)){;


$sql1 = "INSERT INTO vecinos (idvecino,idempresa,nombre,referencia,telefono1,telefono2,fax,direccion,cp,email,incidencia,jornada) 
VALUES ('$idc','$ide','$nombrevec','$referencia','$tele1','$tele2','$fax1','$direccion','$cp','$emailn','$incidenciat','$jornadat')";
//echo $sql1;
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ivecinos");
//print_r($idclientevec);
if (count($idclientevec)>0){;
for ($jt=0;$jt<count($idclientevec);$jt++){;
$sql10 = "INSERT INTO vecinoscom (idvecino,idempresa,idcliente) 
VALUES ('$idc','$ide','$idclientevec[$jt]')";
//echo $sql10;
$result10=$conn->exec($sql10);
//$result10=mysqli_query($conn,$sql10) or die ("Invalid result vecinoscom");

};
};

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($referencia, METHOD, $key, 0, $iv);
			$pass1=base64_encode($output);

$sql2 = "INSERT INTO usuarios (user,password,idempresas,idvecino,vecino,tusuario,modulo) VALUES ('$referencia','$pass1','$ide','$idc','1','5','41')";
//echo $sql2;
$result2=$conn->exec($sql2);
//$result2=mysqli_query($conn,$sql2) or die ("Invalid result usuarios");

}else{;
$mal="2";
};


};



if ($tabla=="modificar"){;


if ($datostab=="modclientes"){;
//echo 'hola';
$sql00="update clientes set ";
$sql01="where idclientes='".$idclientes."' and idempresas='".$ide."'";
};
/*
if ($datostab=="modgestores"){;
$sql00="update gestores set ";
$sql01="where idgestor='".$idgestor."' and idempresa='".$ide."'";
};
*/
$nombrecampo=array('caracteristicas','nombre','1apellido','2apellido','estado','nif','tiva','tgastos','dia','mes','año',
'nss','cp','domicilio','localidad','provincia','tele1','tele2','fax','email1','email2',
'ent','suc','dc','ncuenta','fvigor','idgestor','codigo','idclientesprin',
'entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento');

$valoractual=array($caract,$nombre,$apellido1,$apellido2,$estadocli,$nif,$tiva,$tgastos,$diac,$mesc,$añoc,
$nss,$cp,$domicilio,$localidad,$provincia,$tele1,$tele2,$faxa,$email1,$email2,
$ent,$suc,$dc,$ncuenta,$fvigor,$idgestor,$codigolis,$idclientesprin,
$datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9],$datos[10],$datos[11],$datos[12],$datos[13],$datos[14],$datos[15],$datos[16],$datos[17],$datos[18]);


$valornuevo=array($caract1,$nombre1,$apellido11,$apellido21,$estadocli1,$nif1,$tiva1,$tgastos1,$diac1,$mesc1,$añoc1,
$nss1,$cp1,$domicilio1,$localidad1,$provincia1,$tele1n,$tele2n,$faxa1,$email1n,$email2n,
$ent1,$suc1,$dc1,$ncuenta1,$fvigor1,$idgestor1,$codigolis1,$idclientesprin1,
$datos1[0],$datos1[1],$datos1[2],$datos1[3],$datos1[4],$datos1[5],$datos1[6],$datos1[7],$datos1[8],$datos1[9],$datos1[10],$datos1[11],$datos1[12],$datos1[13],$datos1[14],$datos1[15],$datos1[16],$datos1[17],$datos1[18]);


//echo (count($nombrecampo));
for ($j=0;$j<count($nombrecampo);$j++){;
	if ($nombrecampo[$j]=="estado"){;
	//echo "estado";
	  if ($valoractual[$j]!=$valornuevo[$j]){;
		if ($valornuevo[$j]=="1"){;
			$sql10="select liccli from empresas where idempresas='".$ide."'"; 
			$result10=$conn->query($sql10);
			$resultado10=$result10->fetch();
			$liccli=$resultado10['liccli'];

			/*$result10=mysqli_query($conn,$sql10) or die ("Invalid result lic");
			$liccli=mysqli_result($result10,0,'liccli');*/
			$sql10="select count(idclientes) as tot from clientes where idempresas='".$ide."' and estado='1'"; 
			$result10=$conn->query($sql10);
			$resultado10=$result10->fetch();
			$liccli=$resultado10['tot'];

			/*$result10=mysqli_query($conn,$sql10) or die ("Invalid result empleados");
			$tota=mysqli_result($result10,0,'tot');*/
				if ($liccli>$tota){;
					$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
					$sql25=$sql00.$sqla.$sql01;
					$resultd=$conn->query($sql25);
					//$resultd=mysqli_query($conn,$sql25) or die ("Invalid result est ".$nombrecampo[$j]." ");
				}else{;
					$datos=23;
				};
		}else{;
		$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
		$sql25=$sql00.$sqla.$sql01;
		$resultd=$conn->query($sql25);
		//$resultd=mysqli_query($conn,$sql25) or die ("Invalid result ".$nombrecampo[$j]." ");
	   };
	  };
}else{;
	if ($valoractual[$j]!=$valornuevo[$j]){;
		$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
		$sql25=$sql00.$sqla.$sql01;
//echo ($sql25);
		$resultd=$conn->query($sql25);
		//$resultd=mysqli_query($conn,$sql25) or die ("Invalid result ".$nombrecampo[$j]." ");

		};
};

};

//echo count($altaqr);

for ($lqr=2;$lqr<6;$lqr++){
	if ($altaqr[$lqr]==0){
			if($datosqr1[$lqr]!=null){
			$sqlqr = "INSERT INTO codigo (idempresas,idclientes,idpccat,activo) VALUES ('$ide','$idclientes','$lqr','$datosqr1[$lqr]')";
			//echo $sqlqr;
			$resultqr=$conn->exec($sqlqr);
			//$resultqr=mysqli_query($conn,$sqlqr) or die ("Invalid result datosqr");
			}
		}else{
				if ($datosqr[$lqr]!=$datosqr1[$lqr]){
					$sql0qr="update codigo set ";
					$sql1qr="where idclientes='".$idclientes."' and idempresas='".$ide."' and idpccat='".$lqr."'";
					$sqlaqr="activo='".$datosqr1[$lqr]."' ";
					$sqlqr=$sql0qr.$sqlaqr.$sql1qr;
					//echo $sqlqr;
					$resultqr=$conn->exec($sqlqr);
					//$resultqr=mysqli_query($conn,$sqlqr) or die ("Invalid result datos qr mod");
					};
		
			};



	
	}








};

if ($tabla=="jorclientes"){;

if ($diasfd=='d'){;
$turnofd='2';
}else{;
$turnofd='1';
};
$year=date("Y");

$sql="select * from festivospais where pais='".$idpais."' and year='".$year."'";
$result=$conn->query($sql);

/*$result=mysqli_query($conn,$sql) or die ("Invalid result dfclientes sele");
$row=mysqli_num_rows($result);
for ($jl=0;$jl<$row;$jl++){;
mysqli_data_seek($result, $jl);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$fechad=$rowmos['fecha'];


if ($turnofd=='2'){;

$sql1 = "INSERT INTO jornadas 
(idempresas,idempleados,turno,horent,margenent,horsal,margensal,finicio,ffin,lun,mar,mie,jue,vie,sab,dom) 
VALUES ('$ide','$idempleado','$turnofd','0','0','0','0','$fechad','$fechad','1','1','1','1','1','1','1')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ijornadas");

}else{;

for($h=0;$h<3;$h++){;
if ($horaentdf[$h]!=null){;
$sql1 = "INSERT INTO jornadas 
(idempresas,idempleados,turno,horent,margenent,horsal,margensal,finicio,ffin,lun,mar,mie,jue,vie,sab,dom) 
VALUES ('$ide','$idempleado','$turnofd','$horentdf[$h]','$margenentdf[$h]','$horsaldf[$h]','$margensaldf[$h]','$fechad','$fechad','1','1','1','1','1','1','1')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ijornadas");
};
};

};


};

$sql="select * from festivoscomunidad where pais='".$idpais."' and comunidad='".$idcomunidad."' and year='".$year."'";
/*$result=mysqli_query($conn,$sql) or die ("Invalid result dfclientes sele");
$row=mysqli_num_rows($result);
for ($jl=0;$jl<$row;$jl++){;
mysqli_data_seek($result, $jl);
$resultado=mysqli_fetch_array($result);*/
$result=$conn->query($sql);
foreach ($result as $rowmos) {
$fechad=$rowmos['fecha'];

if ($turnofd=='2'){;

$sql1 = "INSERT INTO jornadas 
(idempresas,idempleados,turno,horent,margenent,horsal,margensal,finicio,ffin,lun,mar,mie,jue,vie,sab,dom) 
VALUES ('$ide','$idempleado','$turnofd','0','0','0','0','$fechad','$fechad','1','1','1','1','1','1','1')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ijornadas");

}else{;

for($h=0;$h<3;$h++){;
if ($horaentdf[$h]!=null){;
$sql1 = "INSERT INTO jornadas 
(idempresas,idempleados,turno,horent,margenent,horsal,margensal,finicio,ffin,lun,mar,mie,jue,vie,sab,dom) 
VALUES ('$ide','$idempleado','$turnofd','$horentdf[$h]','$margenentdf[$h]','$horsaldf[$h]','$margensaldf[$h]','$fechad','$fechad','1','1','1','1','1','1','1')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ijornadas");
};
};

};


};




$sql="select * from festivosmunicipios where idpais='".$idpais."' and idprovincia='".$idprovincia."' and idmunicipio='".$idlocalidad."' and year='".$year."'";
$result=$conn->query($sql);

/*$result=mysqli_query($conn,$sql) or die ("Invalid result dfclientes sele");
$row=mysqli_num_rows($result);
for ($jl=0;$jl<$row;$jl++){;
mysqli_data_seek($result, $jl);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$fechad=$rowmos['fecha'];

if ($turnofd=='2'){;

$sql1 = "INSERT INTO jornadas 
(idempresas,idempleados,turno,horent,margenent,horsal,margensal,finicio,ffin,lun,mar,mie,jue,vie,sab,dom) 
VALUES ('$ide','$idempleado','$turnofd','0','0','0','0','$fechad','$fechad','1','1','1','1','1','1','1')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ijornadas");

}else{;

for($h=0;$h<3;$h++){;
if ($horaentdf[$h]!=null){;
$sql1 = "INSERT INTO jornadas 
(idempresas,idempleados,turno,horent,margenent,horsal,margensal,finicio,ffin,lun,mar,mie,jue,vie,sab,dom) 
VALUES ('$ide','$idempleado','$turnofd','$horentdf[$h]','$margenentdf[$h]','$horsaldf[$h]','$margensaldf[$h]','$fechad','$fechad','1','1','1','1','1','1','1')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ijornadas");
};
};

};

};

for ($j=0;$j<21;$j++){;

if(($fi[$j]!=null) and ($ff[$j]!=null) and ($hor[$j]!=null)){;
$sql1 = "INSERT INTO jornadas 
(idempresas,idclientes,horario,margen,finicio,ffin,lun,mar,mie,jue,vie,sab,dom) 
VALUES ('$ide','$idclientes','$hor[$j]','$margen[$j]','$fi[$j]','$ff[$j]','$lun[$j]','$mar[$j]','$mie[$j]','$jue[$j]','$vie[$j]','$sab[$j]','$dom[$j]')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ijornadas");
//echo $sql1;
};

};

};





if ($tabla=="modjorclientes"){;

$sql00="update jornadas set ";
$sql01="where idclientes='".$idclientes."' and idempresas='".$ide."'";
$nombrecampo=array('horario','margen','finicio','ffin','lun','mar','mie','jue','vie','sab','dom'); 

for ($j=0;$j<$valor;$j++){;
$valoractual=array($hor[$j],$margen[$j],$fi[$j],$ff[$j],$lun[$j],$mar[$j],$mie[$j],$jue[$j],$vie[$j],$sab[$j],$dom[$j]);
$valornuevo=array($hor1[$j],$margen1[$j],$fi1[$j],$ff1[$j],$lun1[$j],$mar1[$j],$mie1[$j],$jue1[$j],$vie1[$j],$sab1[$j],$dom1[$j]);

$sql02=" and id='".$idjor[$j]."'";
for ($t=0;$t<count($nombrecampo);$t++){;
	if ($valoractual[$t]!=$valornuevo[$t]){;
		$sqla=$nombrecampo[$t]."='".$valornuevo[$t]."' ";
		$sql25=$sql00.$sqla.$sql01.$sql02;
//echo ($sql25);
		$resultd=$conn->exec($sql25);	
		//$resultd=mysqli_query($conn,$sql25) or die ("Invalid result ".$nombrecampo[$j]." ");
};
};

};

};


if ($tabla=="jorempleados"){;

if ($diasfd=='d'){;
$turnofd='2';
}else{;
$turnofd='1';
};
$year=date("Y");

$sql="select * from festivospais where pais='".$idpais."' and year='".$year."'";
//echo $sql;
$result=$conn->query($sql);

/*$result=mysqli_query($conn,$sql) or die ("Invalid result dfclientes sele");
$row=mysqli_num_rows($result);
for ($jl=0;$jl<$row;$jl++){;
mysqli_data_seek($result, $jl);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$fechad=$rowmos['fecha'];

if ($turnofd=='2'){;

$sql1 = "INSERT INTO jorempleados 
(idempresas,idempleados,turno,horent,margenent,horsal,margensal,finicio,ffin,lun,mar,mie,jue,vie,sab,dom) 
VALUES ('$ide','$idempleado','$turnofd','0','0','0','0','$fechad','$fechad','1','1','1','1','1','1','1')";
$result1=$conn->exec($sql1);	
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ijornadas");

}else{;

for($h=0;$h<3;$h++){;
if ($horaentdf[$h]!=null){;
$sql1 = "INSERT INTO jorempleados 
(idempresas,idempleados,turno,horent,margenent,horsal,margensal,finicio,ffin,lun,mar,mie,jue,vie,sab,dom) 
VALUES ('$ide','$idempleado','$turnofd','$horentdf[$h]','$margenentdf[$h]','$horsaldf[$h]','$margensaldf[$h]','$fechad','$fechad','1','1','1','1','1','1','1')";
$result1=$conn->exec($sql1);	
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ijornadas");
};
};

};

};


$sql="select * from festivoscomunidad where pais='".$idpais."' and comunidad='".$idcomunidad."' and year='".$year."'";
//echo $sql;
$result=$conn->query($sql);

/*$result=mysqli_query($conn,$sql) or die ("Invalid result dfclientes sele");
$row=mysqli_num_rows($result);
for ($jl=0;$jl<$row;$jl++){;
mysqli_data_seek($result, $jl);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$fechad=$rowmos['fecha'];
if ($turnofd=='2'){;

$sql1 = "INSERT INTO jorempleados 
(idempresas,idempleados,turno,horent,margenent,horsal,margensal,finicio,ffin,lun,mar,mie,jue,vie,sab,dom) 
VALUES ('$ide','$idempleado','$turnofd','0','0','0','0','$fechad','$fechad','1','1','1','1','1','1','1')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ijornadas");

}else{;

for($h=0;$h<3;$h++){;
if ($horaentdf[$h]!=null){;
$sql1 = "INSERT INTO jorempleados 
(idempresas,idempleados,turno,horent,margenent,horsal,margensal,finicio,ffin,lun,mar,mie,jue,vie,sab,dom) 
VALUES ('$ide','$idempleado','$turnofd','$horentdf[$h]','$margenentdf[$h]','$horsaldf[$h]','$margensaldf[$h]','$fechad','$fechad','1','1','1','1','1','1','1')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ijornadas");
};
};

};
};

$sql="select * from festivosmunicipios where idpais='".$idpais."' and idprovincia='".$idprovincia."' and idmunicipio='".$idlocalidad."' and year='".$year."'";
//echo $sql;
$result=$conn->query($sql);

/*$result=mysqli_query($conn,$sql) or die ("Invalid result dfclientes sele");
$row=mysqli_num_rows($result);
for ($jl=0;$jl<$row;$jl++){;
mysqli_data_seek($result, $jl);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$fechad=$rowmos['fecha'];
if ($turnofd=='2'){;

$sql1 = "INSERT INTO jorempleados 
(idempresas,idempleados,turno,horent,margenent,horsal,margensal,finicio,ffin,lun,mar,mie,jue,vie,sab,dom) 
VALUES ('$ide','$idempleado','$turnofd','0','0','0','0','$fechad','$fechad','1','1','1','1','1','1','1')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ijornadas");

}else{;

for($h=0;$h<3;$h++){;
if ($horaentdf[$h]!=null){;
$sql1 = "INSERT INTO jorempleados 
(idempresas,idempleados,turno,horent,margenent,horsal,margensal,finicio,ffin,lun,mar,mie,jue,vie,sab,dom) 
VALUES ('$ide','$idempleado','$turnofd','$horentdf[$h]','$margenentdf[$h]','$horsaldf[$h]','$margensaldf[$h]','$fechad','$fechad','1','1','1','1','1','1','1')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ijornadas");
};
};

};
};



for ($j=0;$j<21;$j++){;

if(($fi[$j]!=null) and ($ff[$j]!=null)){;
$sql1 = "INSERT INTO jorempleados 
(idempresas,idempleados,turno,horent,margenent,horsal,margensal,finicio,ffin,lun,mar,mie,jue,vie,sab,dom) 
VALUES ('$ide','$idempleado','$turno[$j]','$horent[$j]','$margenent[$j]','$horsal[$j]','$margensal[$j]','$fi[$j]','$ff[$j]','$lun[$j]','$mar[$j]','$mie[$j]','$jue[$j]','$vie[$j]','$sab[$j]','$dom[$j]')";
$result1=$conn->exec($sql1);
//$result1=mysqli_query($conn,$sql1) or die ("Invalid result ijornadas");
//echo $sql1;
};

};

};


if ($tabla=="modjorempleados"){;

$sql00="update jorempleados set ";
$sql01="where idempleados='".$idempleado."' and idempresas='".$ide."'";
$nombrecampo=array('turno','horent','margenent','horsal','margensal','finicio','ffin','lun','mar','mie','jue','vie','sab','dom'); 
$j=$valor;
//for ($j=0;$j<$valor;$j++){;
$valoractual=array($turno[$j],$horent[$j],$margenent[$j],$horsal[$j],$margensal[$j],$fi[$j],$ff[$j],$lun[$j],$mar[$j],$mie[$j],$jue[$j],$vie[$j],$sab[$j],$dom[$j]);
$valornuevo=array($turno1[$j],$horent1[$j],$margenent1[$j],$horsal1[$j],$margensal1[$j],$fi1[$j],$ff1[$j],$lun1[$j],$mar1[$j],$mie1[$j],$jue1[$j],$vie1[$j],$sab1[$j],$dom1[$j]);

$sql02=" and id='".$idjor[$j]."'";
for ($t=0;$t<count($nombrecampo);$t++){;
	if ($valoractual[$t]!=$valornuevo[$t]){;
		$sqla=$nombrecampo[$t]."='".$valornuevo[$t]."' ";
		$sql25=$sql00.$sqla.$sql01.$sql02;
		//echo ($sql25);
		$result1=$conn->exec($sql1);		
		//$resultd=mysqli_query($conn,$sql25) or die ("Invalid result ".$nombrecampo[$t]." ");
};
};
//};

};




if ($tabla=="borrar"){;
$sql02="DELETE FROM jornadas WHERE id = '".$id."'";
$resultd=$conn->exec($sql02);
//$resultd=mysqli_query($conn,$sql02) or die ("Invalid result jornadas ");
};

if ($tabla=="borrarempl"){;
$sql02="DELETE FROM jorempleados WHERE id = '".$id."'";
$resultd=$conn->exec($sql02);
//$resultd=mysqli_query($conn,$sql02) or die ("Invalid result jornadas ");
};



?>



<?php
if ($mal!=0){;
switch ($mal){;
case 1: $valor="Tienes que poner un NIF";break;
case 2: $valor="Tienes que poner un Telefono 1";break;
case 3: $valor="El valor del codigo cliente debe de ser mayor que 10";break;
case 4: $valor="El valor del codigo cliente ya esta asignado a otro cliente";break;
case 5: $valor="Tienes que poner una referencia o el email";break;
};

?>
<?php  echo $valor;?><br>
<img alt="volver" border="0" src="../img/arrow_cycle.png" onclick="history.go(-2)">
<?php 
}else{; 
?>
<?php 

if ($datos==23){;?>
<table>
<tr><td class="enc">Ya ha utilizado todas las licencias contratadas</td></tr>
<tr><td class="enc">Póngase en contacto con su comercial</td></tr>
</table><br>
EL RESTO DE DATOS HAN SIDO MODIFICADOS<p><?php }else{;?>
LOS DATOS HAN SIDO INTRODUCCIDOS<p><?php };?>

<?php 
switch($tabla){
	
case 'idclientes':
if ($datos[4]==1){;
echo "<a href='../servicios_n/accdiarias/ipuntconti.php'>Alta de Puntos de Tareas Habituales de los Puestos de Trabajo</a><p>";
};
if ($datos[5]==1){;
echo "<a href='../servicios_n/accmantenimiento/ipuntconti.php'>Alta de Puntos de Tareas Adicionales de los Puestos de Trabajo</a><p>";
};
if ($datos[6]==1){;
echo "<a href='../servicios_n/niveles/ipuntconti.php'>Alta de Parametros en los Puestos de Trabajo</a><p>";
};
if ($datos[7]==1){;
echo "<a href='../servicios_n/productos/ipuntconti.php'>Alta de Puntos de Existencias de los Puestos de Trabajo</a><p>";
};
if ($datos[8]==1){;
echo "<a href='../servicios_n/pcontrol/ipuntcont.php'>Alta de Circuitos</a><p>";
};
if ($datos[12]==1){;
echo "<a href='../servicios_n/mediciones/ipuntconti.php'>Alta de Puntos de Mediciones de los Puestos de Trabajo</a><p>";
};	
break;
	

};

?>

<a href="/inicio_n.php">Volver a menu</a>

<?php };?>
</div>
