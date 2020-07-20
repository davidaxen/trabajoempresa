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

$sql="SELECT * from empleados where idempresa=:ide and idempleado=:idempleado";
$result=$conn->prepare($sql);
$result->bindParam(':ide', $ide);
$result->bindParam(':idempleado', $idempleado);
$result->execute();
$resultado=$result->fetch();

/*$result=mysqli_query($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
$idempleado=$resultado['idempleado'];
$nombre=$resultado['nombre'];
$apellido1=$resultado['1apellido'];
$apellido2=$resultado['2apellido'];
$nif=$resultado['nif'];
$estado=$resultado['estado'];
$nempl=$nombre.", ".$apellido1." ".$apellido2;
?>


<table>
<tr>
<td class="tit">Codigo de Empleado</td><td><?php  echo $idempleado;?></td>
<td class="tit">Nombre del Empleado</td>
<td ><?php  echo strtoupper($nempl);?></td></tr>
</table>

<table>
<tr class="enctab">
<td>Fecha Inicio</td>
<td>Fecha Fin</td>
<td>Turno</td>
<td>Horario Entrada</td>
<td>Margen Entrada</td>
<td>Horario Salida</td>
<td>Margen Salida</td>
<td>
<table>
<tr><td colspan="7">Dia de la Semana</td></tr>
<tr><td>Lun</td><td>Mar</td><td>Mie</td><td>Jue</td><td>Vie</td><td>Sab</td><td>Dom</td></tr>
</table>
</tr>

<?php 

$sql12="SELECT * from jorempleados where idempresas=:ide and idempleados=:idempleado order by finicio asc, id asc";
$result12=$conn->prepare($sql12);
$result12->bindParam(':ide', $ide);
$result12->bindParam(':idempleado', $idempleado);
$result12->execute();

/*$result12=mysqli_query($conn,$sql12) or die ("Invalid result");
$row12=mysqli_num_rows($result12);
for ($j=0;$j<$row12;$j++){;
mysqli_data_seek($result12, $j);
$resultado12=mysqli_fetch_array($result12);*/

foreach ($result12 as $row12mos) {
$idjor=$row12mos['id'];
$fi=$row12mos['finicio'];
$ff=$row12mos['ffin'];
$turno=$row12mos['turno'];
$horent=$row12mos['horent'];
$margenent=$row12mos['margenent'];
$horsal=$row12mos['horsal'];
$margensal=$row12mos['margensal'];
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
<td>
<select name="turno1[<?php  echo $j;?>]">
<option value="1" <?php if ($turno==1){;?>selected<?php };?> >Activo
<option value="2" <?php if ($turno==2){;?>selected<?php };?> >Vacaciones
<option value="3" <?php if ($turno==3){;?>v<?php };?> >Baja
</select>
</td>
<td><input type="text" name="horent1[<?php  echo $j;?>]"  value="<?php  echo $horent;?>" size="9" maxlength="8"  placeholder="15:00"></td>
<td><input type="text" name="margenent1[<?php  echo $j;?>]"  value="<?php  echo $margenent;?>" size="9" maxlength="8"  placeholder="00:05"></td>
<td><input type="text" name="horsal1[<?php  echo $j;?>]"  value="<?php  echo $horsal;?>" size="9" maxlength="8"  placeholder="15:00"></td>
<td><input type="text" name="margensal1[<?php  echo $j;?>]"  value="<?php  echo $margensal;?>" size="9" maxlength="8"  placeholder="00:05"></td>
<td>
<table>
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
