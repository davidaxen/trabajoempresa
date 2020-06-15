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




echo "<tr>";
echo "<td><b>Dia</b></td>";
echo "<td><b>Hora</b></td>";
if ($idempleado=='Todos'){;
echo "<td><b>Empleado</b></td>";
};
if ($idclientes=='todos'){;
echo "<td><b>Cliente</b></td>";
};
echo "<td><b>Servicio</b></td>";
echo "<td><b>Mapa</b></td>";
echo "<td><b>Tiempo</b></td>";
echo "</tr>";


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


//echo $sql;


$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);



for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idclientest=$resultado['idpiscina'];
$fecha_b=$resultado['dia'];
$hora=$resultado['hora'];
$idempleadot=$resultado['idempleado'];
$idpcsubcat=$resultado['idpcsubcat'];
$tiempo=$resultado['tiempo'];
$lat=$resultado['lat'];
$lon=$resultado['lon'];

echo "<tr class='subenc'><td>";
echo $fecha_b;
echo "</td>";
echo "<td>";
echo $hora;
echo "</td>";

if ($idempleado=='Todos'){;
echo "<td>";
$sqlempl="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleadot."'";
//echo $sql;
$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);
$nombre=$resultadoempl['nombre'];
$apellidop=$resultadoempl['1apellido'];
$apellidos=$resultadoempl['2apellido'];
$nempleado=$nombre.' '.$apellidop.' '.$apellidos;
echo $nempleado;
echo "</td>";
};

if ($idclientes=='todos'){;
echo "<td>";
$sql1="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idclientest."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$nombrec=$resultado1['nombre'];
echo $nombrec;
echo "</td>";
};



echo "<td>";

$sqlsub="SELECT * from puntservicios where idempresas='".$ide."' and idpcsubcat='".$idpcsubcat."' and idpccat='".$idpccat."' ";
//echo $sqlsub;
$resultsub=mysqli_query ($conn,$sqlsub) or die ("Invalid result0");
$resultadosub=mysqli_fetch_array($resultsub);
$subcategoria=$resultadosub['subcategoria'];

echo $subcategoria;
echo "</td>";
echo "<td><a href='http://control.admiservi.com/portada_n/mapa.php?lon=";
echo $lon;
echo "&lat=";
echo $lat;
echo "&nombrecom=";
echo $nombrec;
echo "&nombretrab=";
echo $nempleado;
echo "'>Mapa</a></td>";



if ($idempleadot!=$idempleadop){
$controldiaentrada=0;
$controlhoraentrada=0;
$controldiasalida=0;
$controlhorasalida=0;
};

if ($idpcsubcat==1){;


if ($controldiaentrada!=$fecha_b){
$controlhoraentrada=0;
}

if ($controlhoraentrada==0){;
$controldiaentrada=$fecha_b;
$controlhoraentrada=$hora;



};

}else{

	
if ($controlhorasalida==0){;

$controldiasalida=$fecha_b;
$controlhorasalida=$hora;


if ($controldiaentrada==0){;
$controldiaentrada=$fecha_b;
$horaa=$controlhorasalida;
$controlhoraentrada=$horaa;
};




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

$controlhora=$TotHorasTrab;
$controlmin=$TotMinTrab;

//$controlhora=($controlhorasalida - $controlhoraentrada);
$controlhoratotal=$controlhoratotal+$controlhora;
$controlmintotal=$controlmintotal+$controlmin;

$difhoras =$controlhora.":".$controlmin;

$controldiaentrada=0;
$controldiasalida=0;
$controlhoraentrada=0;
$controlhorasalida=0;
};
};

if (($idpcsubcat==2) and ($idempleadot==$idempleadop) and ($difhoras!='0:0')){;
echo "<td>";
echo $difhoras;
echo "</td>";
}else{;
echo "<td>&nbsp;</td>";
};

$idempleadop=$idempleadot;

/*
echo "<td>";
echo $tiempo;
echo "</td>";
echo "</tr>";
*/

};
?>