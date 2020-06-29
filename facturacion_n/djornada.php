<?php  
include('bbdd.php');

if ($ide!=null){;

$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";
$result31=$conn->query($sql31);
$resultado31=$result31->fetch();

/*$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);*/
$nc=$resultado31['jornadas'];

$sql32="select * from menuserviciosimg where idempresa='".$ide."'";
$result32=$conn->query($sql32);
$resultado32=$result32->fetch();

/*$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);*/
$ic=$resultado32['jornadas'];

$sql33="select * from menuadministracionnombre where idempresa='".$ide."'";
$result33=$conn->query($sql33);
$resultado33=$result33->fetch();

/*$result33=mysqli_query ($conn,$sql33) or die ("Invalid result menucontabilidad");
$resultado33=mysqli_fetch_array($result33);*/
$ncn[]=$resultado33['clientes'];
$ncn[]=$resultado33['empleados'];

include('../portada_n/cabecera2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES CON <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">


<div class="main">
<?php if ($dat=="h"){;?>
<a href="ljclientes2.php">
<span class="caja2">Jornadas de <br/><div style="font-size:20px"><?php  echo strtoupper($ncn[0]);?></div></span>
</a>
<!--
<a href="jclientes.php">
<span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Alta de Jornadas</span></a>
<a href="mjclientes.php">
<span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/pencil.png" width="30" height="30" />
</div>
</div>
<br/>Modificación de Jornadas</span></a>

<a href="ljclientes.php"><span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Listado de Jornadas</span></a>
-->
</div>


<div class="main">
<a href="ljempleados2.php">
<span class="caja2">Jornadas de <br/><div style="font-size:20px"><?php  echo strtoupper($ncn[1]);?></div></span></a>

<!--
<a href="jempleados.php">
<span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Alta de Jornadas</span>
</a>

<a href="mjempleados.php">
<span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/pencil.png" width="30" height="30" />
</div>
</div>
<br/>Modificación de Jornadas</span></a>


<a href="ljempleados2.php"><span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Listado de Jornadas</span></a>

-->


<?php };?>

<?php if ($dat=="i"){;?>
<?php if($idtrab==0){;?>
<a href="ljretclientes.php"><span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Listado de Retrasos <br/>Puesto</span></a>
<?php };?>

<?php if($idtrab==0){;?>
<a href="ljretempleados.php">
<?php }else{;?>
<a href="ljorretempleados.php?idempleado=<?php  echo $idtrab;?>">
<?php };?>
<span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Listado de Retrasos <br/>Empleado</span></a>

<?php  };?>
</div>


</div>
</div>

<?php }else{;
include ('../cierre.php');
 };?>


