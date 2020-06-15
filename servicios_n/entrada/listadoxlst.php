<?php  
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=entrada-salida.xls");
header("Pragma: no-cache");
header("Expires: 0");

include('bbdd.php');
$idpccat=1;

if ($idcliente!='todos'){;
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombre=$resultado1['nombre'];
};


if ($idempleado!='Todos'){;
$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'";
//echo $sql;
$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;
};




echo "<table border=0 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<td rowspan='3' colspan='2'>";
echo "</td>";
echo "<td colspan='4'><b>INFORME DE ENTRADA / SALIDA</b></td></tr>";
echo "<tr><td colspan='2'>Nombre de la empresa</td><td>";
echo $nemp;
echo "</td></tr>";

if ($idclientes!='todos'){;
echo "<tr><td colspan='2'>Datos del Puesto de Trabajo</td><td>";
echo $nombre;
echo "</td></tr>";
};

if ($idempleado!='Todos'){;
echo "<tr><td colspan='2'>Datos del Empleado</td><td>";
echo $nempleado;
echo "</td></tr>";
};
echo "<tr><td colspan='2'>&nbsp;</td><td>&nbsp;</td></tr>";




$fechai=date("Y/m/d", mktime(0, 0, 0, $mi, $di, $yi));
$fechaf=date("Y/m/d", mktime(0, 0, 0, $mf, $df, $yf));



$sql="SELECT * from almpc where idempresas='".$ide."'  and idpccat='".$idpccat."'";

switch($tipo){
	case "dia": $sql.=" and dia='".$fechai."'";break;
	default : $sql.=" and dia  between '".$fechai."' and '".$fechaf."'";break;
};

if ($idclientes!='todos'){;
$sql.=" and idpiscina='".$idclientes."'";
};

if ($idempleado!='Todos'){;
$sql.=" and idempleado='".$idempleado."'";
};

if ($idclientes!=null){;
$sql.=" order by idpiscina asc, idempleado asc";
}else{;
$sql.=" order by idempleado asc, idpiscina asc";
};



$sql="SELECT * from almpc where idempresas='".$ide."' and idpccat='".$idpccat."'";

switch($tipo){
	case "dia": $sql.=" and dia='".$fechai."'";break;
	default : $sql.=" and dia  between '".$fechai."' and '".$fechaf."'";break;
};

if ($idclientes!='todos'){;
$sql.=" and idpiscina='".$idclientes."'";
};
$sql.=" order by idpiscina asc, idempleado asc";

//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);

$j=0;

for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);

$idpcsubcat=$resultado['idpcsubcat'];
$fecha_b=$resultado['dia'];
$idempleado=$resultado['idempleado'];
$idclientes=$resultado['idpiscina'];

if ( ($idempleadot!=$idempleado) or ($idclientest!=$idclientes) ) {
	if ($idpcsubcat==1){
$valores[$j]['idempleadot']=$idempleado;
$valores[$j]['idclientest']=$idclientes;
$valores[$j]['fechaent']=$fecha_b;
$valores[$j]['horaent']=$resultado['hora'];
$valores[$j]['lonent']=$resultado['lon'];
$valores[$j]['latent']=$resultado['lat'];

$fecha_bt=$fecha_b;
$idempleadot=$idempleado;
$idclientest=$idclientes;
}
}else{
if ($idpcsubcat==2){
$valores[$j]['fechasal']=$fecha_b;
$valores[$j]['horasal']=$resultado['hora'];
$valores[$j]['lonsal']=$resultado['lon'];
$valores[$j]['latsal']=$resultado['lat'];
$j=$j+1;
$fecha_bt=0;
$idempleadot=0;
$idclientest=0;
}

}



};














echo "<tr>";
if ($idclientes=='todos'){;
echo "<td><b>Cliente</b></td>";
};
if ($idempleado=='Todos'){;
echo "<td><b>Empleado</b></td>";
};
echo "<td><b>Entrada</b></td>";
echo "<td><b>Salida</b></td>";
echo "<td><b>Horas Trabajadas</b></td>";
echo "</tr>";

for ($t=0;$t<count($valores);$t++){;

$idclientest=$valores[$t]['idclientest'];

$sqlempl="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientest."'";
//echo $sql;
$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);
$nombrec=$resultadoempl['nombre'];

$idempleadot=$valores[$t]['idempleadot'];
$sql10="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleadot."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result1");
$resultado10=mysqli_fetch_array($result10);
$nombre=$resultado10['nombre'];
$papellido=$resultado10['1apellido'];
$sapellido=$resultado10['2apellido'];
$nempleado=$nombre.', '.$papellido.' '.$sapellido;


$controldiaentrada=$valores[$t]['fechaent'];
$controlhoraentrada=$valores[$t]['horaent'];
$controldiasalida=$valores[$t]['fechasal'];
$controlhorasalida=$valores[$t]['horasal'];

$dia1=explode ("-",$controldiaentrada);
$dia2=explode ("-",$controldiasalida);
       $YDesde=$dia1[0];
       $MDesde=$dia1[1];
       $DDesde=$dia1[2];      
       $YHasta=$dia2[0];
       $MHasta=$dia2[1];
       $DHasta=$dia2[2];
$hora1 = explode(":",$controlhoraentrada);
$hora2 = explode(":", $controlhorasalida);
       $HoraDesde=$hora1[0];
       $MinutoDesde=$hora1[1];
       $HoraHasta=$hora2[0];
       $MinutoHasta=$hora2[1];
       
$anterior=mktime($HoraDesde,$MinutoDesde,0,$MDesde,$DDesde,$YDesde);
$actual=mktime($HoraHasta,$MinutoHasta,0,$MHasta,$DHasta,$YHasta);
$diferencia=$actual-$anterior;

    
       $TotHorasTrab=intval($diferencia / 3600);
       $RestaHoras=($diferencia - ($TotHorasTrab*3600) );
       $TotMinTrab=intval($RestaHoras/60);
if ($TotMinTrab<10){;
$TotMinTrab='0'.$TotMinTrab;
};


$controlhora=$TotHorasTrab;
$controlmin=$TotMinTrab;

$controlhoratotal=$controlhoratotal+$controlhora;
$controlmintotal=$controlmintotal+$controlmin;

$difhoras =$controlhora.":".$controlmin;

echo "<tr>";
echo "<td>".$nombrec."</td>";
echo "<td>".$nempleado."</td>";
echo "<td>".$controldiaentrada." - ".$controlhoraentrada."</td>";
echo "<td>".$controldiasalida." - ".$controlhorasalida."</td>";
if ($difhoras>=0){;
echo "<td>".$difhoras."</td>";
}else{;
echo "<td></td>";
}

echo "</tr>";
};

echo "</table>";



?>