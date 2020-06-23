<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');

include('../../estilo/acordeon.php');

//$valores = array();
?>

<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE PUNTOS DE <?php  echo strtoupper($nc);?> DE PUESTOS DE TRABAJO<br/> QUE YA TIENEN ELEGIDO ALG&Uacute;N PUNTO</p></div>
<div class="contenido">
<p>&nbsp;</p>
<?php

if(!isset($idclientes)){
	$idclientes=null;
}

if ($idclientes==null){;?>
<!--
<table><tr><td><?php include ('../../js/busqueda.php');?></td>
</tr></table>
-->

<div class="main">
<span class="caja2">Puntos Globales</span>

<a href="ipuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Creaci&oacute;n<br/>Puntos Globales
</span>
</a>

<a href="mpuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/pencil.png" width="30" height="30" />
</div>
</div>
<br/>Modificaci&oacute;n<br/>Puntos Globales
</span>
</a>


<span class="caja2">Puntos para Puestos de Trabajo</span>
<a href="ipuntconti.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconpoint.png" width="30" height="30" />
</div>
</div>
<br/>Elecci&oacute;n de Puntos<br/>Puestos de Trabajo
</span>
</a>

</div>

Nombre del Puesto de Trabajo

<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and estado='1'";
$sql.=" and accdiarias='1'";
$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$fetchAll=$result->fetchAll();
$row=count($fetchAll);
//var_dump($sql);


/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/?>
<?php
if ($row>10){;
$yu=1;
}else{;
$yu=2;
};
?>

<div style="column-count:<?php echo $yu;?>">
<?php
foreach($resultmos as $rowmos){
	$idclientes=$rowmos['idclientes'];
	$nombre=$rowmos['nombre'];


	$sql2="SELECT * from codservicios where idempresas='".$ide."' and idclientes='".$idclientes."' and idpccat='".$idpccat."'";
	//var_dump($idclientes);
	//var_dump($sql2);
	$result2=$conn->query($sql2);
	$result2mos1=$conn->query($sql2);
	$result2mos2=$conn->query($sql2);
	$fetchAll2=$result2->fetchAll();
	$row2=count($fetchAll2);
	//var_dump($row2);



/*for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];
$nombre=$resultado['nombre'];

$sql2="SELECT * from codservicios where idempresas='".$ide."' and idclientes='".$idclientes."' and idpccat='".$idpccat."'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);*/
?>
<input type="hidden" name="idcliens" value="<?php  echo $idclientes;?>">
<?php

if($row2!=0){

	//$result2222=$result2->fetchAll();
	//print_r($result2222);

//if ($row2!=0){;?>

<div class="accordion" style="width:400px;height:20px;padding:5px">
<img src="../../img/iconos/datos_personales.png" width="20px" style="vertical-align:middle;">  <?php  echo strtoupper($nombre);?>
</div>
<div class="panel">
<table><tr><td>




<table>
<?php

foreach($result2mos1 as $row2mos){
	$bloque[]=$row2mos['idpcsubcat'];

}

/*for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2, $t);
$resultado2=mysqli_fetch_array($result2);
$bloque[]=$resultado2['idpcsubcat'];
};*/

foreach($result2mos2 as $row2mos){
	//$bloque[]=$row2['idpcsubcat'];


	/*for ($t=0;$t<$row2;$t++){;
	mysqli_data_seek($result2, $t);
	$resultado2=mysqli_fetch_array($result2);*/
	unset($bqn);
	$j=0;
	$idpcsubcat=$row2mos['idpcsubcat'];
	$activo=$row2mos['activo'];
	$bloquen=$bloque;
	$bloquen[]=$idpcsubcat;
	$valores=array_unique($bloquen);
	//var_dump($valores);

	$sql3="SELECT * from puntservicios where idempresas='".$ide."' and idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."'"; 
	$result3=$conn->query($sql3);
	$resultado3=$result3->fetch();
	//var_dump($sql3);


	/*$result3=mysqli_query ($conn,$sql3) or die ("Invalid result3");
	$resultado3=mysqli_fetch_array($result3);*/
	$subcategoria=$resultado3['subcategoria'];
	?>

	<tr><td><?php echo strtoupper($subcategoria);?></td>
		<td><?php echo $resultado3['subcategoria']; ?></td><td>
	<?php if ($activo==0){;?>No<?php };?>
	<?php if ($activo==1){;?>Si<?php };?>
	</td><td>

	<a href="modpuntconti.php?idclientes=<?php echo $idclientes;?>&idpcsubcat=<?php echo $idpcsubcat;?>&activo=<?php echo $activo;?>

	<?php
	$j=0;
	for ($k=0;$k<count($bloque);$k++){;
		if ($valores[$k]!=null){;
			if ($valores[$k]!=$idpcsubcat){;
				$bqn[$j]=$valores[$k];
	?>
	&bloque[<?php echo $j?>]=<?php echo $bqn[$j];?>
	<?php 
			$j=$j+1;
			};
		};
	};
	?>

	">
	<img src="../../img/pencil.png" width="25x" border=0></a>

	</td></tr>

<?php //aqui for
};?>
</table>

</td>

<td>
<form action="modpuntconti2.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<?php
unset($bqn);
//$bqn = array();

for ($ij=0;$ij<count($bloque);$ij++){;
if ($valores[$ij]!=null){;
$bqn[$ij]=$valores[$ij];
?>
<input type="hidden" name="bloque[]" value="<?php  echo $bqn[$ij];?>">
<?php 
};
};

	$sql4="SELECT count(id) as t from puntservicios where idempresas='".$ide."' and idpccat='".$idpccat."' and activo='1'"; 
	$result4=$conn->query($sql4);
	$resultado4=$result4->fetch();

/*$result4=mysqli_query ($conn,$sql4) or die ("Invalid result4");
$resultado4=mysqli_fetch_array($result4);*/
$cantp=$resultado4['t'];
$cantp=$cantp-count($bqn);

?>
<table><tr>
<td><select name="cantpuntcont">
<option value="todos">Todos
<?php  for ($ty=0;$ty<$cantp;$ty++){;
$tg=$ty+1;?>
<option value="<?php  echo $tg;?>"><?php  echo strtoupper($tg);?>
<?php };?>
</select></td><td><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</td></tr></table>
</div>

<?php //aqui if
};?>
<?php //aqui for
};?>
</div>

<?php  include ('../../js/acordeonjs.php');?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>


<?php };?>



</div>
</div>

<?php } else {;

include('../../cierre.php');

};?>

