<?php  
include('bbdd.php');

if ($ide!=null){;

$sql31="select * from menuserviciosnombre where idempresa=:ide";
$result31=$conn->prepare($sql31);
$result31->bindParam(':ide', $ide);
$result31->execute();
$resultado31=$result31->fetch();

/*$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);*/
$nc=$resultado31['jornadas'];

$sql32="select * from menuserviciosimg where idempresa=:ide";
$result32=$conn->prepare($sql32);
$result32->bindParam(':ide', $ide);
$result32->execute();
$resultado32=$result32->fetch();

/*$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);*/
$ic=$resultado32['jornadas'];

include('../portada_n/cabecera2.php');?>



<div id="main">
<div class="titulo">
<p class="enc">LISTADO <?php  echo strtoupper($nc);?> DE TRABAJO DE PUESTOS DE TRABAJO</p></div>
<div class="contenido">

<?php 

$sql="SELECT * from clientes where idempresas=:ide and idclientes=:idclientes";
$result=$conn->prepare($sql);
$result->bindParam(':ide', $ide);
$result->bindParam(':idclientes', $idclientes);
$result->execute();
$resultado=$result->fetch();

/*$result=mysqli_query($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
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
$result12->bindParam(':ide', $ide);
$result12->bindParam(':idclientes', $idclientes);
$result12->execute();

/*$result12=mysqli_query($conn,$sql12) or die ("Invalid result");
$row12=mysqli_num_rows($result12);
for ($j=0;$j<$row12;$j++){;
mysqli_data_seek($result12, $j);
$resultado12=mysqli_fetch_array($result12);*/
foreach ($result12 as $row12mos) {
$fi=$row12mos['finicio'];
$ff=$row12mos['ffin'];
$hor=$row12mos['horario'];
$margen=$row12mos['margen'];
$lun=$row12mos['lun'];
$mar=$row12mos['mar'];
$mie=$row12mos['mie'];
$jue=$row12mos['jue'];
$vie=$row12mos['vie'];
$sab=$row12mos['sab'];
$dom=$row12mos['dom'];
?>



<tr>
<td><input type="hidden" name="fi[<?php  echo $j;?>]" value="<?php  echo $fi;?>" size="11" maxlength="10"  placeholder="2015/01/01"><?php  echo $fi;?></td>
<td><input type="hidden" name="ff[<?php  echo $j;?>]" value="<?php  echo $ff;?>" size="11" maxlength="10"  placeholder="2015/12/31"><?php  echo $ff;?></td>
<!--<td>
<select name="turno[<?php  echo $j;?>]">
<option value="1">Mañana
<option value="2">Tarde
<option value="3">Noche
</select>
</td>-->
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


<!--
<tr>
<td colspan="4">
<input class="envio" type="submit" name="Enviar" value="Enviar"></td>
</tr>
</form>
-->
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
