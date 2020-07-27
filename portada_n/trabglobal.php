<?php   
include('bbdd.php');
/*
$fecha=$_GET["fecha"];
$idpccat=$_GET["idpccat"];
*/
$año= strtok($fecha, '-');
$mes= strtok('-');
$dia= strtok('-');
$diaa=$dia-1;
$diap=$dia+1;
$fechac=$dia.'/'.$mes.'/'.$año;


$fechaa=date("Y-m-d", mktime(0, 0, 0, $mes, $diaa, $año));
$fechap=date("Y-m-d", mktime(0, 0, 0, $mes, $diap, $año));
//$fechap=$año.'-'.$mes.'-'.$diap;

$mesa=str_split($mes);
if ($mesa[0]==0){;
$mes=$mesa[1];
};


$sql01="SELECT * from categorias where idpccat=:idpccat"; 

$result01=$conn->prepare($sql01);
$result01->bindParam(':idpccat', $idpccat);
$result01->execute();
$resultado01=$result01->fetch();
//$result01=mysqli_query ($conn,$sql01) or die ("Invalid result 1");
//$resultado01 = mysqli_fetch_array ($result01);
$categoria=$resultado01['nombre'];


if ($idpccat=='6'){;
$sql1a="SELECT * from almpcronda where dia=:fecha and idronda='c' and idempresas=:ide order by idempresas,idcliente,dia,hora"; 

$result1a=$conn->prepare($sql1a);
$result1a->bindParam(':fecha', $fecha);
$result1a->bindParam(':ide', $ide);
$result1a->execute();
$fetchAll1a=$result1a->fetchAll();
$row1a=count($fetchAll1a);

//$result1a=mysqli_query ($conn,$sql1a) or die ("Invalid result 1a");
//$row1a=mysqli_num_rows($result1a);
}else{;
$sql1a="SELECT * from almpc where dia=:fecha and idempresas=:ide and idpccat=:idpccat order by id,idempleado"; 
//echo $sql1a;

$result1a=$conn->prepare($sql1a);
$result1a->bindParam(':fecha', $fecha);
$result1a->bindParam(':ide', $ide);
$result1a->bindParam(':idpccat', $idpccat);
$result1a->execute();
$fetchAll1a=$result1a->fetchAll();
$row1a=count($fetchAll1a);

//$result1a=mysqli_query ($conn,$sql1a) or die ("Invalid result 1a");
//$row1a=mysqli_num_rows($result1a);
};
?>

<?php 
if ($ide!=null){;
?>
<?php  include('../portada_n/cabecera2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">
<a href="trabglobal.php?fecha=<?php  echo $fechaa;?>&idpccat=<?php  echo $idpccat;?>"><img src="../img/minor-event-icon.png" width="20px"></a>
<?php  echo $categoria;?>, el dia: <?php  echo $fechac;?>
<a href="trabglobal.php?fecha=<?php  echo $fechap;?>&idpccat=<?php  echo $idpccat;?>"><img src="../img/add-event-icon.png"  width="20px"></a>
</p>

</div>
<div class="contenido">

<table  id="tablestyle" class="tablesorter">
<thead>
<?php if ($idpccat=='6'){;?>
<tr class="subenc6">
<th>Puesto de Trabajo</th>
<th>Hora</th>
</tr>
</thead>
<tbody>
<?php 

foreach ($result1a as $row) {

//for ($j=0;$j<$row1a;$j++){;
//mysqli_data_seek($result1a,$j);
//$resultado1a = mysqli_fetch_array ($result1a);
$idclientes=$row['idcliente'];
$hora=$row['hora'];
$idpronda=$row['id'];

$sql11="SELECT * from clientes where idclientes=:idclientes and idempresas=:ide"; 
if ($idcli!=0){;
	$sql11.=" and nif=:gente";

	$result11=$conn->prepare($sql11);
	$result11->bindParam(':idclientes', $idclientes);
	$result11->bindParam(':ide', $ide);
	$result11->bindParam(':gente', $gente);
	$result11->execute();
	$resultado11=$result11->fetch();

	$result11row=$conn->prepare($sql11);
	$result11row->bindParam(':idclientes', $idclientes);
	$result11row->bindParam(':ide', $ide);
	$result11row->bindParam(':gente', $gente);
	$result11row->execute();
	$fetchAll11=$result11row->fetchAll();
	$row11=count($fetchAll11);
}else{

	$result11=$conn->prepare($sql11);
	$result11->bindParam(':idclientes', $idclientes);
	$result11->bindParam(':ide', $ide);
	$result11->execute();
	$resultado11=$result11->fetch();

	$result11row=$conn->prepare($sql11);
	$result11row->bindParam(':idclientes', $idclientes);
	$result11row->bindParam(':ide', $ide);
	$result11row->execute();
	$fetchAll11=$result11row->fetchAll();
	$row11=count($fetchAll11);
}




//$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
//$row11=mysqli_num_rows($result11);
//$resultado11 = mysqli_fetch_array ($result11);
$nombrecom=$resultado11['nombre'];

 if ($row11==1){;?>

<tr class="subenc7">
<td><?php  echo strtoupper($nombrecom);?></td>
<td>
<a href="../servicios_n/pcontrol/ipcdhora.php?idpcronda=<?php  echo $idpronda;?>&hora=<?php  echo $hora;?>&d=<?php  echo $dia;?>&m=<?php  echo $mes;?>&y=<?php  echo $año;?>&idclientes=<?php  echo $idclientes;?>&ide=<?php  echo $ide;?>">
<?php  echo strtoupper($hora);?>
</a></td>
</tr>
<?php 
};
};?>
</tbody>
</table>


<?php }else{;?>
<tr class="subenc6">
<th>Personal</th>
<th>Telefonos</th>
<th>Puesto de Trabajo</th>
<th>Hora</th><th>Tipo</th>
<?php if (($idpccat=='2') or ($idpccat=='5') ){;?>
<th>Cantidad</th>
<?php };?>

<th>Mapa</th>
</tr>
</thead>

<tbody>
<?php 

foreach ($result1a as $row) {

//for ($j=0;$j<$row1a;$j++){;
//mysqli_data_seek($result1a,$j);
//$resultado1a = mysqli_fetch_array ($result1a);
$idempleado=$row['idempleado'];
$idpiscina=$row['idpiscina'];
$hora=$row['hora'];
$idpcsubcat=$row['idpcsubcat'];
$tiempo=$row['tiempo'];
$lat=$row['lat'];
$lon=$row['lon'];
$cantidad=$row['cantidad'];
$otro=$row['otro'];

$sql12="SELECT * from puntservicios where idpccat=:idpccat and idpcsubcat=:idpcsubcat and idempresas=:ide"; 
//echo $sql12;

$result12=$conn->prepare($sql12);
$result12->bindParam(':idpccat', $idpccat);
$result12->bindParam(':idpcsubcat', $idpcsubcat);
$result12->bindParam(':ide', $ide);
$result12->execute();
$resultado12=$result12->fetch();

//$result12=mysqli_query ($conn,$sql12) or die ("Invalid result 10");
//$resultado12 = mysqli_fetch_array ($result12);
$subcategoria=$resultado12['subcategoria'];


$sql10="SELECT * from empleados where idempleado=:idempleado and idempresa=:ide";

$result10=$conn->prepare($sql10);
$result10->bindParam(':idempleado', $idempleado);
$result10->bindParam(':ide', $ide);
$result10->execute();
$resultado10=$result10->fetch();

//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
//$resultado10 = mysqli_fetch_array ($result10);
$nombre=$resultado10['nombre'];
$priape=$resultado10['1apellido'];
$segape=$resultado10['2apellido'];
$tele1=$resultado10['tele1'];
$tele2=$resultado10['tele2'];
$nombretrab=$nombre.' '.$priape.' '.$segape;

$sql11="SELECT * from clientes where idclientes=:idpiscina and idempresas=:ide"; 
if ($idcli!=0){;
	$sql11.=" and nif=:gente";

	$result11=$conn->prepare($sql11);
	$result11->bindParam(':idpiscina', $idpiscina);
	$result11->bindParam(':ide', $ide);
	$result11->bindParam(':gente', $gente);
	$result11->execute();
	$resultado11=$result11->fetch();

	$result11row=$conn->prepare($sql11);
	$result11row->bindParam(':idpiscina', $idpiscina);
	$result11row->bindParam(':ide', $ide);
	$result11row->execute();
	$fetchAll11=$result11row->fetchAll();
	$row11=count($fetchAll11);
}else{
	$result11=$conn->prepare($sql11);
	$result11->bindParam(':idpiscina', $idpiscina);
	$result11->bindParam(':ide', $ide);
	$result11->execute();
	$resultado11=$result11->fetch();

	$result11row=$conn->prepare($sql11);
	$result11row->bindParam(':idpiscina', $idpiscina);
	$result11row->bindParam(':ide', $ide);
	$result11row->execute();
	$fetchAll11=$result11row->fetchAll();
	$row11=count($fetchAll11);

}


//$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
//$row11=mysqli_num_rows($result11);
//$resultado11 = mysqli_fetch_array ($result11);
$nombrecom=$resultado11['nombre'];

 if ($row11==1){;
?>
<tr class="subenc7"><td><?php  echo strtoupper($nombretrab);?></td>
<td><?php  echo strtoupper($tele1);?><br><?php  echo strtoupper($tele2);?></td>
<td><?php  echo strtoupper($nombrecom);?></td><td><?php  echo strtoupper($hora);?></td>
<td>
<?php if (($idpccat=='5') and ($idpcsubcat=='0') ){;?>
<?php  echo strtoupper($subcategoria);?><br />
<?php  echo strtoupper($otro);?>
<?php }else{;?>
<?php  echo strtoupper($subcategoria);?>
<?php };?>
</td>

<?php if (($idpccat=='2') or ($idpccat=='5') ){;?>
<td><?php  echo strtoupper($cantidad);?></td>
<?php };?>

<td><a href="mapa.php?lon=<?php  echo $lon;?>&lat=<?php  echo $lat;?>&nombrecom=<?php  echo $nombrecom;?>&nombretrab=<?php  echo $nombretrab;?>"><img src="../img/modificar.gif"></a></td></tr>
<?php 
};
};?>
</tbody>
</table>
<?php };?>

</div>
</div>

<?php }else{;
include ('../cierre.php');
 };?>


