<?php  
include('bbdd.php');
 
if ($ide!=null){;

$sql3="select titulo from ayuda where menu='1' and seccion='2' order by subseccion asc";
$result3=mysqli_query($conn,$sql3) or die ("Invalid result menuempleados");
$fila = mysqli_fetch_row($result3);


$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
switch($tipo){
case 1: $nc=$resultado31['clientes'];break;
case 2: $nc=$resultado31['puestos'];break;
}
$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
switch($tipo){
case 1: $ic=$resultado32['clientes'];break;
case 2: $ic=$resultado32['puestos'];break;
};

  include('../portada_n/cabecera2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES CON <?php  echo strtoupper($nc);?>
				      <?php if ($ayuda=='1'){;?>
				      <img src="/img/info-ayuda.png" title="<?php  echo $fila[0];?>">
				      <?php };?> 
</p></div>
<div class="contenido">

<div class="main">

<a href="iclientes.php?tipo=<?php  echo $tipo;?>">
<span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Alta de <?php  echo strtoupper($nc);?>
</span>
</a>

<a href="fclientes.php?tipo=<?php  echo $tipo;?>">
<span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Alta de <?php  echo strtoupper($nc);?> por Fichero</span>
</a>


<a href="mclientes.php?tipo=<?php  echo $tipo;?>">
<span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/pencil.png" width="30" height="30" />
</div>
</div>
<br/>Modificacion de <?php  echo strtoupper($nc);?>
</span>
</a>

<a href="lclientes.php?tipo=<?php  echo $tipo;?>">
<span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Listado de <?php  echo strtoupper($nc);?>
</span>
</a>
<?php if($idpr==5){;?> 
<a href="tclientes.php?tipo=<?php  echo $tipo;?>">
<span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Traspaso de <?php  echo strtoupper($nc);?>
</span>
</a>
<?php };?>

<a href="contpisc.php?tipo=<?php  echo $tipo;?>">
<span class="caja">
<div style="position:relative">
<img src="../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../img/iconqr.png" width="30" height="30" />
</div>
</div>
<br/>Codigos
</span>
</a>



</div>

</div>
</div>

<?php }else{;
include ('../cierre.php');
 };?>
