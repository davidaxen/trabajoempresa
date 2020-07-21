<?php  
include('bbdd.php');

if ($ide!=null){;

$sql31="select * from menuserviciosnombre where idempresa=:ide";

$result31=$conn->prepare($sql31);
$result31->bindParam(':ide',$ide);
$result31->execute();
$resultado31=$result31->fetch();
//$result31=$conn->query($sql31);
//$resultado31=$result31->fetch();
//$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
//$resultado31=mysqli_fetch_array($result31);
$nc=$resultado31['jornadas'];

$sql32="select * from menuserviciosimg where idempresa=:ide";

$result32=$conn->prepare($sql32);
$result32->bindParam(':ide',$ide);
$result32->execute();
$resultado32=$result32->fetch();
//$result32=$conn->query($sql32);
//$resultado32=$result32->fetch();
//$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);
$ic=$resultado32['jornadas'];

include('../portada_n/cabecera2.php');

include('../estilo/acordeon.php');
?>



<div id="main">
<div class="titulo">
<p class="enc">LISTADO <?php  echo strtoupper($nc);?> DE TRABAJO DE PUESTOS DE TRABAJO</p></div>
<div class="contenido">

<?php 

$sql="SELECT * from clientes where idempresas=:ide and idclientes=:idclientes"; 

$result=$conn->prepare($sql);
$result->bindParam(':ide',$ide);
$result->bindParam(':idclientes',$idclientes);
$result->execute();
$resultado=$result->fetch();
//$result=$conn->query($sql);
//$resultado=$result->fetch();
//$result=mysqli_query($conn,$sql) or die ("Invalid result");
//$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
?>

<!--<form action="intro2.php" method="get" name="form2">-->
<input type="hidden" name="tablas" value="jorclientes">
<!--<input type="hidden" name="datos" value="jorclientes">-->
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<table>
<tr>
<td class="tit">Codigo de Puesto de Trabajo</td><td><?php  echo $idclientes;?></td>
<td class="tit">Nombre del Puesto de Trabajo</td>
<td ><?php  echo $nombre;?></td></tr>
</table>

<div class="accordion">
<img src="../img/iconos/serviciose.png" width="32px" style="vertical-align:middle;"> Listado de Jornada
</div>
<div class="panel">
<table>
<tr class="enctab">
<td>Fecha Inicio</td>
<td>Fecha Fin</td>
<!--<td>Turno</td>-->
<td>Horario</td>
<td>Margen</td>
<td>
<table>
<tr><td colspan="7">Dia de la Semana</td></tr>
<tr><td>Lun</td><td>Mar</td><td>Mie</td><td>Jue</td><td>Vie</td><td>Sab</td><td>Dom</td></tr>
</table>
</tr>

<?php 

$sql12="SELECT * from jornadas where idempresas=:ide and idclientes=:idclientes order by finicio asc, horario asc"; 

$result12=$conn->prepare($sql12);
$result12->bindParam(':ide',$ide);
$result12->bindParam('idclientes',$idclientes);
$result12->execute();

$result12mos=$conn->prepare($sql12);
$result12mos->bindParam(':ide',$ide);
$result12mos->bindParam(':idclientes',$idclientes);
$result12mos->execute();

$resultado12=$result12->fetch();
//$result12=$conn->query($sql12);
//$result12mos=$conn->query($sql12);
//$resultado12=$result12->fetch();

//$result12=mysqli_query($conn,$sql12) or die ("Invalid result");
//$row12=mysqli_num_rows($result12);

foreach ($result12mos as $row) {
	$fi=$row['finicio'];
	$ff=$row['ffin'];
	$hor=$row['horario'];
	$margen=$row['margen'];
	$lun=$row['lun'];
	$mar=$row['mar'];
	$mie=$row['mie'];
	$jue=$row['jue'];
	$vie=$row['vie'];
	$sab=$row['sab'];
	$dom=$row['dom'];

//for ($j=0;$j<$row12;$j++){;
//mysqli_data_seek($result12, $j);
//$resultado12=mysqli_fetch_array($result12);

//$fi=$resultado12['finicio'];
//$ff=$resultado12['ffin'];
//$hor=$resultado12['horario'];
//$margen=$resultado12['margen'];
//$lun=$resultado12['lun'];
//$mar=$resultado12['mar'];
//$mie=$resultado12['mie'];
//$jue=$resultado12['jue'];
//$vie=$resultado12['vie'];
//$sab=$resultado12['sab'];
//$dom=$resultado12['dom'];
?>



<tr>
<td><input type="hidden" name="fi[<?php  echo $j;?>]" value="<?php  echo $fi;?>" size="11" maxlength="10"  placeholder="2015/01/01"><?php  echo $fi;?></td>
<td><input type="hidden" name="ff[<?php  echo $j;?>]" value="<?php  echo $ff;?>" size="11" maxlength="10"  placeholder="2015/12/31"><?php  echo $ff;?></td>
<td><input type="hidden" name="hor[<?php  echo $j;?>]"  value="<?php  echo $hor;?>" size="6" maxlength="5"  placeholder="15:00"><?php  echo $hor;?> </td>
<td><input type="hidden" name="margen[<?php  echo $j;?>]"  value="<?php  echo $margen;?>" size="6" maxlength="5"  placeholder="00:05"><?php  echo $margen;?></td>
<td><table>
<tr>
<td><input type="checkbox" value="1" name="lun[<?php  echo $j;?>]" <?php if ($lun==1){;?>checked<?php };?> disabled ></td>
<td><input type="checkbox" value="1" name="mar[<?php  echo $j;?>]" <?php if ($mar==1){;?>checked<?php };?> disabled ></td>
<td><input type="checkbox" value="1" name="mie[<?php  echo $j;?>]" <?php if ($mie==1){;?>checked<?php };?> disabled ></td>
<td><input type="checkbox" value="1" name="jue[<?php  echo $j;?>]" <?php if ($jue==1){;?>checked<?php };?> disabled ></td>
<td><input type="checkbox" value="1" name="vie[<?php  echo $j;?>]" <?php if ($vie==1){;?>checked<?php };?> disabled ></td>
<td><input type="checkbox" value="1" name="sab[<?php  echo $j;?>]" <?php if ($sab==1){;?>checked<?php };?> disabled ></td>
<td><input type="checkbox" value="1" name="dom[<?php  echo $j;?>]" <?php if ($dom==1){;?>checked<?php };?> disabled ></td>
</tr>
</table>
</td>
</tr>

<?php };?>
</table>
</div>

<div class="accordion">
<img src="../img/iconos/serviciose.png" width="32px" style="vertical-align:middle;"> Listado de Retrasos
</div>
<div class="panel">
<?php include ('../js/busqueda.php');?>

<table class="table-bordered table pull-right" id="mytable">
<tr class="enctab">
<td>Dia</td>
<td>Hora</td>
<td>Dia de la Semana</td>
</tr>
<?php 
$sql14="SELECT * from retrasojor where idempresas=:ide and idclientes=:idclientes order by dia asc, hora asc"; 

$result14=$conn->prepare($sql14);
$result14->bindParam(':ide',$ide);
$result14->bindParam('idclientes',$idclientes);
$result14->execute();

$result14mos=$conn->prepare($sql14);
$result14mos->bindParam(':ide',$ide);
$result14mos->bindParam(':idclientes',$idclientes);
$result14mos->execute();

//$resultado12=$result12->fetch();

//$result14=$conn->query($sql14);
//$result14mos=$conn->query($sql14);

//$result14=mysqli_query($conn,$sql14) or die ("Invalid result");
//$row14=mysqli_num_rows($result14);


foreach ($result14mos as $row) {
	$diaret=$row['dia'];
	$horaret=$row['hora'];
	$dsemanar=$row['dsemana'];	

//for ($j=0;$j<$row14;$j++){;
//mysqli_data_seek($result14, $j);
//$resultado14=mysqli_fetch_array($result14);
//$diaret=$resultado14['dia'];
//$horaret=$resultado14['hora'];
//$dsemanar=$resultado14['dsemana'];
?>
<tr>
<td><?php  echo $diaret;?></td>
<td><?php  echo $horaret;?></td>
<td>
<?php 
switch($dsemanar){;
case 1:$diasemanar='Lunes';break;
case 2:$diasemanar='Martes';break;
case 3:$diasemanar='Miercoles';break;
case 4:$diasemanar='Jueves';break;
case 5:$diasemanar='Viernes';break;
case 6:$diasemanar='Sabado';break;
case 7:$diasemanar='Domingo';break;
};
?>
<?php  echo $diasemanar;?>

</td>
</tr>

<?php };?>
</div>

</div>

<?php  include ('../js/acordeonjs.php');?>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>
