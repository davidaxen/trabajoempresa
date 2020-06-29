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

include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">LISTADO <?php  echo strtoupper($nc);?> DE TRABAJO DE EMPLEADOS</p></div>
<div class="contenido">
<?php 
if ($estadoe==null) {;
$enviar='datos';
$estadoe='1';
};
if ($enviar==null){;?>
<form action="ljempleados.php" method="post" name="form2">
Estado <select name="estado">
<option value="1">Alta
<option value="0">Baja
</select>
<input class="envio" type="submit" value="enviar" name="enviar">
</form>

<?php }else{;?>

<table><tr><td><?php include ('../js/busqueda.php');?></td>
<?php if ($estadoe==1){;?>
<td width="150px" align="center"><a href="ljempleados2.php?estadoe=0&enviar=datos">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/iconlis.png" width="20" height="20" /></div></div><br/>
Listado <?php  echo strtoupper($nc);?> de Trabajo de Empleados<br/> en <b style="color:red">Baja</b></span>
</a></td>
<?php }else{;?>
<td width="150px" align="center"><a href="ljempleados2.php?estadoe=1&enviar=datos">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/iconlis.png" width="20" height="20" /></div></div><br/>
Listado <?php  echo strtoupper($nc);?> de Trabajo de Empleados<br/> en <b style="color:green">Alta</b></span>
</a></td>
<?php };?>
</tr>
</table>


<?php 

$sql="SELECT * from empleados where idempresa='".$ide."' and estado='".$estadoe."' order by idempleado asc"; 
//echo $sql;
$result=$conn->query($sql);

/*$result=mysqli_query($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
?>


<table class="table-bordered table pull-right" id="mytable">
<?php  
/*for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$idempleado=$rowmos['idempleado'];
$nombre=$rowmos['nombre'];
$apellido1=$rowmos['1apellido'];
$apellido2=$rowmos['2apellido'];
$nif=$rowmos['nif'];
$estado=$rowmos['estado'];
$nempl=$nombre.", ".$apellido1." ".$apellido2;
?>
<tr class="menor1">
<td><?php  echo $idempleado;?></td>
<td><?php  echo strtoupper($nempl);?></td>
<td><?php  echo $nif;?></td>
<td>
<?php if ($estado=='0'){?><font color="red">Baja<?php }else{;?><font color="green">Alta<?php };?></font></td>
<td>
<a href="jorempleados.php?idempleado=<?php  echo $idempleado;?>"><img src="../img/plus.png" alt="modificar" border=0 width=20></a>
<a href="ljorempleados.php?idempleado=<?php  echo $idempleado;?>"><img src="../img/pencil.png" alt="modificar" border=0 width=20></a>
</td>
</tr>
<?php };?>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

</div>
<?php };?>
<?php }else{;
include ('../cierre.php');
 };?>

