<?php 
$fechai=date("Y-m-d", mktime(0, 0, 0, 1, 1, $y3));
$fechaf=date("Y-m-d", mktime(0, 0, 0, 1, 0, $y3+1));

$sql="SELECT * from almpc where idempresas='".$ide."' and idpccat='".$idpccat."' and dia between '".$fechai."' and '".$fechaf."'";
if ($idpunt!='todos'){
$sql.=" and idpcsubcat='".$idpunt."'";
};
if ($idclientes!="todos"){;
$sql.=" and idpiscina='".$idclientes."'";
}else{;
$sql.=" order by idpiscina asc, idempleado asc";
};
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);
?>
<?php include ('../../js/busqueda.php');?>

<table class="table-bordered table pull-right" id="mytable" cellspacing="0" style="width: 100%;">

<thead>
<tr class="subenc">
<?php if ($idclientes=="todos"){;?>
<td>Cliente</td>
<?php };?>


<td>Dia</td><td>Hora</td><td>Empleado</td><td>Servicio</td></tr>
</thead>
<?php 

for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$fecha_b=$resultado['dia'];
$hora=$resultado['hora'];
$idempleadot=$resultado['idempleado'];
$idclientest=$resultado['idpiscina'];
$idpcsubcat=$resultado['idpcsubcat'];
$lon=$resultado['lon'];
$lat=$resultado['lat'];
$yt=fmod($i,2);

if ($idempleadot!=$idempleadop){
$controlhoraentrada=0;
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
$horaa=$hora;
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

?>

<?php if ($yt==0){;?><tr class="mpar"><?php };?> 
<?php if ($yt==1){;?><tr class="mimpar"><?php };?>

<?php 
if ($idclientes=="todos"){;
$sqlempl="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientest."'";
//echo $sql;
$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
$resultadoempl=mysqli_fetch_array($resultempl);
$nombrec=$resultadoempl['nombre'];
if ($idclientest==1){;
$nombrec='Teletrabajo';
};

?>


<td><?php  echo $nombrec;?></td>

<?php };?>



<td><?php  echo $fecha_b;?></td>
<td><?php  echo $hora;?></td>

<td>
<?php 
$sql10="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleadot."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result1");
$resultado10=mysqli_fetch_array($result10);
$nombre=$resultado10['nombre'];
$papellido=$resultado10['1apellido'];
$sapellido=$resultado10['2apellido'];
$nempleado=$nombre.', '.$papellido.' '.$sapellido;
?>
<?php  echo $nempleado;?>
</td>


<td>
<?php 
$sqlsub="SELECT * from puntservicios where idempresas='".$ide."' and idpcsubcat='".$idpcsubcat."' and idpccat='".$idpccat."' ";
//echo $sqlsub;
$resultsub=mysqli_query ($conn,$sqlsub) or die ("Invalid result0");
$resultadosub=mysqli_fetch_array($resultsub);
$subcategoria=$resultadosub['subcategoria'];
?>
<?php  echo $subcategoria;?>
</td>

<?php if (($idpcsubcat==2) and ($idempleadot==$idempleadop) and ($difhoras!='0:0')){;?>
<td><?php  echo $difhoras;?></td>
<?php }else{;?>
<td>&nbsp;</td>
<?php };
$idempleadop=$idempleadot;
?>
<td><a href="/portada_n/mapa.php?lon=<?php  echo $lon;?>&lat=<?php  echo $lat;?>&nombrecom=<?php  echo $nombrec;?>&nombretrab=<?php  echo $nempleado;?>">
<img src="/img/modificar.gif">
</a></td>
</tr>
<?php };?>
</table>