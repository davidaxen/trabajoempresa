<?php
include('bbdd.php');

if ($ide!=null){;
 include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">HERRAMIENTAS</p></div>
<div class="contenido">

<?php 

if (isset($_REQUEST['user'])) {
	$user = $_REQUEST['user'];
}else{
	$user = "prueba";
}

$sql="select * from menuservicios where user='".$user."' and idempresa='".$ide."'";


$result=$conn->query($sql);
$resultado=$result->fetch();


//$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menucontabilidad");
$c[1]=$resultado['cuadrante'];
$c[2]=$resultado['jornadas'];
$c[3]=$resultado['incidencia'];
$c[4]=$resultado['informes'];
$c[5]=$resultado['mensaje'];


$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";

$result31=$conn->query($sql31);
$resultado31=$result31->fetch();

//$result31=mysqli_query ($conn,$conn,$sql31) or die ("Invalid result menucontabilidad");
$nc[1]=$resultado31['cuadrante'];
$nc[2]=$resultado31['jornadas'];
$nc[3]=$resultado31['incidencia'];
$nc[4]=$resultado31['informes'];
$nc[5]=$resultado31['mensaje'];

$sql32="select * from menuserviciosimg where idempresa='".$ide."'";

$result32=$conn->query($sql32);
$resultado32=$result32->fetch();

//$result32=mysqli_query ($conn,$conn,$sql32) or die ("Invalid result menucontabilidad");
$ic[1]=$resultado32['cuadrante'];
$ic[2]=$resultado32['jornadas'];
$ic[3]=$resultado32['incidencia'];
$ic[4]=$resultado32['informes'];
$ic[5]=$resultado32['mensaje'];


$sql33="select * from menuserviciosenlace where idempresa='".$ide."'";

$result33=$conn->query($sql33);
$resultado33=$result33->fetch();

//$result33=mysqli_query ($conn,$conn,$sql33) or die ("Invalid result menucontabilidad");
$enc[1]=$resultado33['cuadrante'];
$enc[2]=$resultado33['jornadas'];
$enc[3]=$resultado33['incidencia'];
$enc[4]=$resultado33['informes'];
$enc[5]=$resultado33['mensaje'];


?>

<div id="main">
<?php  for ($j=1;$j<count($c)+1;$j++){;
if ($c[$j]=='1'){;?>
<span id="caja"><a href="<?php  echo $enc[$j];?>"><img src="../img/<?php  echo $ic[$j];?>" width="64px"><br/>
<?php  echo $nc[$j];?></a></span>
<?php };
 };?>


</div>
</div>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>