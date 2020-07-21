<?php 
$sql="SELECT * from almpc where idempresas='".$ide."' and idpccat='".$idpccat."' and dia between '".$fechai."' and '".$fechaf."' ";
if ($idclientes!='todos'){;
$sql.=" and idpiscina='".$idclientes."'";
};
$sql.=" order by idpiscina asc, idempleado asc";

//echo $sql;

$result=$conn->query($sql);
$result2mos=$conn->query($sql);
$fetchAll=$result->fetchAll();
$row=count($fetchAll);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
//$row=mysqli_num_rows($result);

$j=0;

foreach ($result2mos as $row) {

//for ($i=0;$i<$row;$i++){;
//mysqli_data_seek($result,$i);
//$resultado=mysqli_fetch_array($result);

$idpcsubcat=$row['idpcsubcat'];
$fecha_b=$row['dia'];
$idempleado=$row['idempleado'];
$idclientes=$row['idpiscina'];

if ( ($idempleadot!=$idempleado) or ($idclientest!=$idclientes) ) {
	if ($idpcsubcat==1){
$valores[$j]['idempleadot']=$idempleado;
$valores[$j]['idclientest']=$idclientes;
$valores[$j]['fechaent']=$fecha_b;
$valores[$j]['horaent']=$row['hora'];
$valores[$j]['lonent']=$row['lon'];
$valores[$j]['latent']=$row['lat'];

$fecha_bt=$fecha_b;
$idempleadot=$idempleado;
$idclientest=$idclientes;
}
}else{
if ($idpcsubcat==2){
$valores[$j]['fechasal']=$fecha_b;
$valores[$j]['horasal']=$row['hora'];
$valores[$j]['lonsal']=$row['lon'];
$valores[$j]['latsal']=$row['lat'];
$j=$j+1;
$fecha_bt=0;
$idempleadot=0;
$idclientest=0;
}

}



};
?>
<?php include ('../../js/busqueda.php');?>

<table class="table-bordered table pull-right" id="mytable" cellspacing="0" style="width: 100%;">

<thead>
 <tr role="row">

<th>Clientes</th><th>Empleados</th><th>Entrada</th><th>Salida</th><th>Horas Trabajadas</th></tr>
</thead>
<tbody>
<?php 
for ($t=0;$t<count($valores);$t++){;

$idclientest=$valores[$t]['idclientest'];

if ($idclientest<10){;
switch($idclientest){;
case '1':$nombrec="Teletrabajo";break;
};
}else{;
$sqlempl="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientest."'";
//echo $sql;
$resultempl=$conn->query($sqlempl);
$resultadoempl=$resultempl->fetch();
//$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result0");
//$resultadoempl=mysqli_fetch_array($resultempl);
$nombrec=$resultadoempl['nombre'];
};

$idempleadot=$valores[$t]['idempleadot'];
$sql10="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleadot."'";

$result10=$conn->query($sql10);
$resultado10=$result10->fetch();
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result1");
//$resultado10=mysqli_fetch_array($result10);
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

$yt=fmod($t,2);
?>

<?php if ($yt==0){;?><tr class="mpar"><?php };?> 
<?php if ($yt==1){;?><tr class="mimpar"><?php };?>
<td><?php  echo $nombrec;?></td><td><?php  echo $nempleado;?></td>
<td><?php  echo $controldiaentrada;?> - <?php  echo $controlhoraentrada;?></td>
<td><?php  echo $controldiasalida;?> - <?php  echo $controlhorasalida;?></td>
<td>
<?php  if ($difhoras>=0){; ?>
<?php  echo $difhoras;?>
<?php };?>
</td>
</tr>
<?php };?>
</tbody>
</table>

