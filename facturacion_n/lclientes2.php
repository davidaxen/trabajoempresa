<?php  
include('bbdd.php');

if ($ide!=null){;

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";

$result31=$conn->query($sql31);
$resultado31=$result31->fetch();
//$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
//$resultado31=mysqli_fetch_array($result31);
switch($tipo){
case 1: $nc=$resultado31['clientes'];break;
case 2: $nc=$resultado31['puestos'];break;
}


$sql32="select * from menuadministracionimg where idempresa='".$ide."'";

$result32=$conn->query($sql32);
$resultado32=$result32->fetch();

//$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);
switch($tipo){
case 1: $ic=$resultado32['clientes'];break;
case 2: $ic=$resultado32['puestos'];break;
};

include('../portada_n/cabecera2.php');?>

<style>
tr:nth-child(even) {
  background-color: #f2f2f2;
}
/*
tr:nth-child(odd) {
  background-color: #fff;
}
*/
</style>
<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE <?php  echo strtoupper($nc);?>
<?php 
switch ($estadoe){;
case 1: echo " ALTA";break;
case 0:echo " BAJA";break;
default: "";break;
}
?>

</p>
</div>
<div class="contenido">


<?php if ($datos!='datos'){;?>
<form method="post" action="lclientes.php">
<table>
<input type="hidden" name="datos" value="datos">
<input type="hidden" name="tipo" value="<?php  echo $tipo;?>">
<tr><td>Estado de Puestos de Trabajo</td><td><select name="estadoe">
<option value=0>Baja<option value=1 selected>Alta
<?php 
if ($idpr=='5'){;
echo "<option value=3>Traspaso";
};
?>
</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
</table>
<?php 
}else{;

$sql="SELECT * from clientes where idempresas='".$ide."' and estado='".$estadoe."' and tipo='".$tipo."'";

$result=$conn->query($sql);

//$result=mysqli_query($conn,$sql) or die ("Invalid result");
//$row=mysqli_num_rows($result);
?>
<table><tr><td><?php include ('../js/busqueda.php');?></td>

<?php if ($estadoe==1){;?>
<td width="150px" align="center"><a href="lclientes2.php?tipo=<?php  echo $tipo;?>&estadoe=0&datos=datos">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/iconlis.png" width="20" height="20" /></div></div><br/>Listado de <?php  echo strtoupper($nc);?><br/> en <b style="color:red">Baja</b></span>
</a></td>
<?php }else{;?>
<td width="150px" align="center"><a href="lclientes2.php?tipo=<?php  echo $tipo;?>&estadoe=1&datos=datos">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/iconlis.png" width="20" height="20" /></div></div><br/>Listado de <?php  echo strtoupper($nc);?><br/> en <b style="color:green">Alta</b></span>
</a></td>
<?php };?>


<td width="150px" align="center"><a href="iclientes.php?tipo=<?php  echo $tipo;?>">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/plus.png" width="20" height="20" /></div></div><br/>Alta de<br/><?php  echo strtoupper($nc);?></span>
</a></td>

<td width="150px" align="center"><a href="fclientes.php?tipo=<?php  echo $tipo;?>">
<span class="caja"><div style="position:relative"><img src="../img/<?php  echo $ic;?>" width="44px">
<div style="position:absolute; top:0;right:0;"><img border="0"  src="../img/plus.png" width="20" height="20" /></div></div><br/>Alta de <?php  echo strtoupper($nc);?> por Fichero</span>
</a></td>
</tr>
</table>


<a href="pdfcartt.php?dato=todo">Carta para todos los clientes</a><br/>


<table class="table-bordered table pull-right" id="mytable">
<thead>
<tr class="enctab"><td>Nº Cliente</td><td>Nombre Cliente</td><td>NIF</td><td width="110px">Doc.</td>
<?php 
$dat=array('entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento');


$sql10="select * from servicios where idempresa='".$ide."'"; 

$result10=$conn->query($sql10);
$resultado10=$result10->fetch();

//$result10=mysqli_query($conn,$sql10) or die ("Invalid result clientes");
//$resultado10=mysqli_fetch_array($result10);

$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";

$result31=$conn->query($sql31);
$resultado31=$result31->fetch();

//$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
//$resultado31=mysqli_fetch_array($result31);

$sql32="select * from menuserviciosimg where idempresa='".$ide."'";

$result32=$conn->query($sql32);
$resultado32=$result32->fetch();

//$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);


for ($rt=0;$rt<count($dat);$rt++){;
$valoref=$resultado10[$dat[$rt]];
$serimg=$resultado32[$dat[$rt]];
$sernom=$resultado31[$dat[$rt]];
if ($valoref=='1'){;?>
<td class="tit"><img src="../img/<?php  echo $serimg;?>" width="25px">&nbsp;<?php  echo $sernom;?></td>

<?php };
};
?>

</tr>
</thead>
<?php 


foreach ($result as $row) {
	$idclientes=$row['idclientes'];
	$nombre=$row['nombre'];
	$nif=$row['nif'];	

//for ($i=0; $i<$row; $i++){;
//mysqli_data_seek($result,$i);
//$resultado=mysqli_fetch_array($result);
//$idclientes=$resultado['idclientes'];
//$nombre=$resultado['nombre'];
//$nif=$resultado['nif'];
?>
<tr class="dattab">
<td><?php  echo $idclientes;?></td>
<td><?php  echo strtoupper($nombre);?></td>
<td><?php  echo strtoupper($nif);?></td>
<td>
<a href="pdfcartt.php?dato=<?php  echo $nif;?>" target="_blank"><img src="../img/iconlis.png" border=0 width="25px" title="carta"></a>
<a href="modclientes.php?idclientes=<?php  echo $idclientes;?>&tipo=<?php  echo $tipo;?>"><img src="../img/pencil.png" border=0 width="25px" title="modificar"></a>
<a href="pdfcontpisc.php?idclientes=<?php  echo $idclientes;?>&pis=g" target="_blank"><img src="../img/iconqr.png" border=0 width="25px" title="codigos qr folio"></a>
<a href="dymo.php?idclientes=<?php  echo $idclientes;?>&pis=g&nomcli=<?php  echo $nombre;?>"><img src="../img/dymo.png" border=0 width="25px" title="codigos qr etiquetas"></a>
</td>
<?php 
for ($rt=0;$rt<count($dat);$rt++){;
$valoref=$resultado10[$dat[$rt]];
if ($valoref=='1'){;?>
<td align="center">
<?php $valortg=$resultado[$dat[$rt]];?>
<input type="radio" name="<?php  echo $dat[$rt];?>[<?php  echo $i;?>]" value="1" <?php if ($valortg==1){;?>checked="checked"<?php };?>  disabled>
</td>
<?php };
};
?>

</tr>


<?php };?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

</div>
</div>


<?php };?>

<?php }else{;
include ('../cierre.php');
 };?>

