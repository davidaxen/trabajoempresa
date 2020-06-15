<?php  
include('bbdd.php');

if ($ide!=null){;

$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";
$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
$nc=$resultado31['jornadas'];

$sql32="select * from menuserviciosimg where idempresa='".$ide."'";
$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
$ic=$resultado32['jornadas'];

include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">MODIFICAR <?php  echo strtoupper($nc);?> DE TRABAJO DE PUESTOS DE TRABAJO</p></div>
<div class="contenido">

<?php 

$sql="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
?>

<form action="intro2.php" method="get" name="form2">
<input type="hidden" name="tablas" value="modjorclientes">
<!--<input type="hidden" name="datos" value="jorclientes">-->
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<table>
<tr>
<td class="tit">Codigo de Puesto de Trabajo</td><td><b><?php  echo $idclientes;?></b></td>
<td class="tit">Nombre del Puesto de Trabajo</td>
<td ><?php $nombre=$resultado['nombre'];?><b><?php  echo $nombre;?></b></td></tr>
</table>


<table>
<tr class="enctab">
<td>Fecha Inicio</td>
<td>Fecha Fin</td>
<!--<td>Turno</td>-->
<td>Horario</td>
<td>Margen</td>
<td>
<table>
<tr><td colspan="7">Dias de Trabajo</td></tr>
<tr><td>Lun</td><td>Mar</td><td>Mie</td><td>Jue</td><td>Vie</td><td>Sab</td><td>Dom</td></tr>
</table>
<td>Opciones</td>
</tr>

<?php 

$sql12="SELECT * from jornadas where idempresas='".$ide."' and idclientes='".$idclientes."' order by finicio asc, horario asc"; 
$result12=mysqli_query($conn,$sql12) or die ("Invalid result");
$row12=mysqli_num_rows($result12);
?>
<input type="hidden" name="valor" value="<?php  echo $row12;?>">
<?php 
for ($j=0;$j<$row12;$j++){;
mysqli_data_seek($result12, $j);
$resultado12=mysqli_fetch_array($result12);

$idjor=$resultado12['id'];
$fi=$resultado12['finicio'];
$ff=$resultado12['ffin'];
$hor=$resultado12['horario'];
$margen=$resultado12['margen'];
$lun=$resultado12['lun'];
$mar=$resultado12['mar'];
$mie=$resultado12['mie'];
$jue=$resultado12['jue'];
$vie=$resultado12['vie'];
$sab=$resultado12['sab'];
$dom=$resultado12['dom'];
?>

<input type="hidden" name="idjor[<?php  echo $j;?>]" value="<?php  echo $idjor;?>">

<tr>
<td><input type="hidden" name="fi[<?php  echo $j;?>]" value="<?php  echo $fi;?>">
<input type="date" name="fi1[<?php  echo $j;?>]" value="<?php  echo $fi;?>" size="11" maxlength="10"  placeholder="2015/01/01">
</td>
<td><input type="hidden" name="ff[<?php  echo $j;?>]" value="<?php  echo $ff;?>">
<input type="date" name="ff1[<?php  echo $j;?>]" value="<?php  echo $ff;?>" size="11" maxlength="10"  placeholder="2015/01/01"></td>
<!--<td>
<select name="turno[<?php  echo $j;?>]">
<option value="1">Mañana
<option value="2">Tarde
<option value="3">Noche
</select>
</td>-->
<td><input type="hidden" name="hor[<?php  echo $j;?>]"  value="<?php  echo $hor;?>">
<input type="text" name="hor1[<?php  echo $j;?>]"  value="<?php  echo $hor;?>" size="9" maxlength="8"  placeholder="15:00"></td>
<td><input type="hidden" name="margen[<?php  echo $j;?>]"  value="<?php  echo $margen;?>">
<input type="text" name="margen1[<?php  echo $j;?>]"  value="<?php  echo $margen;?>" size="9" maxlength="8"  placeholder="00:05"></td>
<td><table>
<tr>
<td><input type="hidden" name="lun[<?php  echo $j;?>]"  value="<?php  echo $lun;?>">
<input type="checkbox" value="1" name="lun1[<?php  echo $j;?>]" <?php if ($lun==1){;?>checked<?php };?> ></td>
<td><input type="hidden" name="mar[<?php  echo $j;?>]"  value="<?php  echo $mar;?>">
<input type="checkbox" value="1" name="mar1[<?php  echo $j;?>]" <?php if ($mar==1){;?>checked<?php };?> ></td>
<td><input type="hidden" name="mie[<?php  echo $j;?>]"  value="<?php  echo $mie;?>">
<input type="checkbox" value="1" name="mie1[<?php  echo $j;?>]" <?php if ($mie==1){;?>checked<?php };?> ></td>
<td><input type="hidden" name="jue[<?php  echo $j;?>]"  value="<?php  echo $jue;?>">
<input type="checkbox" value="1" name="jue1[<?php  echo $j;?>]" <?php if ($jue==1){;?>checked<?php };?> ></td>
<td><input type="hidden" name="vie[<?php  echo $j;?>]"  value="<?php  echo $vie;?>">
<input type="checkbox" value="1" name="vie1[<?php  echo $j;?>]" <?php if ($vie==1){;?>checked<?php };?> ></td>
<td><input type="hidden" name="sab[<?php  echo $j;?>]"  value="<?php  echo $sab;?>">
<input type="checkbox" value="1" name="sab1[<?php  echo $j;?>]" <?php if ($sab==1){;?>checked<?php };?> ></td>
<td><input type="hidden" name="dom[<?php  echo $j;?>]"  value="<?php  echo $dom;?>">
<input type="checkbox" value="1" name="dom1[<?php  echo $j;?>]" <?php if ($dom==1){;?>checked<?php };?> ></td>


</tr>
</table>
</td>
<td><a href="intro2.php?tablas=borrar&id=<?php  echo $idjor;?>"><img src="../img/papelera.gif" width="25px"></a></td>
</tr>

<?php };?>



<tr>
<td colspan="4">
<input class="envio" type="submit" name="Enviar" value="Enviar"></td>
</tr>
</form>

</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>
