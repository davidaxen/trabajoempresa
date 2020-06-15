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
<p class="enc">MODIFICAR <?php  echo strtoupper($nc);?> DE TRABAJO DE EMPLEADOS</p></div>
<div class="contenido">

<?php 

$sql="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
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
<td class="tit">Codigo de Empleado</td><td><b><?php  echo $idempleado;?></b></td>
<td class="tit">Nombre del Empleado</td>
<td ><b><?php  echo strtoupper($nempl);?></b></td></tr>
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
<tr><td colspan="7">Dia Trabajo</td></tr>
<tr><td>Lun</td><td>Mar</td><td>Mie</td><td>Jue</td><td>Vie</td><td>Sab</td><td>Dom</td></tr>
</table>
<td>Opciones</td>
</tr>

<?php 

$sql12="SELECT * from jorempleados where idempresas='".$ide."' and idempleados='".$idempleado."' order by finicio asc, id asc"; 
$result12=mysqli_query($conn,$sql12) or die ("Invalid result");
$row12=mysqli_num_rows($result12);
?>

<?php 
for ($j=0;$j<$row12;$j++){;
mysqli_data_seek($result12, $j);
$resultado12=mysqli_fetch_array($result12);

$idjor=$resultado12['id'];
$fi=$resultado12['finicio'];
$ff=$resultado12['ffin'];
$turno=$resultado12['turno'];
$horent=$resultado12['horent'];
$margenent=$resultado12['margenent'];
$horsal=$resultado12['horsal'];
$margensal=$resultado12['margensal'];
$lun=$resultado12['lun'];
$mar=$resultado12['mar'];
$mie=$resultado12['mie'];
$jue=$resultado12['jue'];
$vie=$resultado12['vie'];
$sab=$resultado12['sab'];
$dom=$resultado12['dom'];
?>
<form action="intro2.php" method="get" name="form2">
<input type="hidden" name="tablas" value="modjorempleados">
<input type="hidden" name="idempleado" value="<?php  echo $idempleado;?>">
<input type="hidden" name="valor" value="<?php  echo $j;?>">
<input type="hidden" name="idjor[<?php  echo $j;?>]" value="<?php  echo $idjor;?>">
<input type="hidden" name="fi[<?php  echo $j;?>]" value="<?php  echo $fi;?>">
<input type="hidden" name="ff[<?php  echo $j;?>]" value="<?php  echo $ff;?>">
<input type="hidden" name="turno[<?php  echo $j;?>]" value="<?php  echo $turno;?>">
<input type="hidden" name="horent[<?php  echo $j;?>]"  value="<?php  echo $horent;?>">
<input type="hidden" name="margenent[<?php  echo $j;?>]"  value="<?php  echo $margenent;?>">
<input type="hidden" name="horsal[<?php  echo $j;?>]"  value="<?php  echo $horsal;?>">
<input type="hidden" name="margensal[<?php  echo $j;?>]"  value="<?php  echo $margensal;?>">
<input type="hidden" name="lun[<?php  echo $j;?>]"  value="<?php  echo $lun;?>">
<input type="hidden" name="mar[<?php  echo $j;?>]"  value="<?php  echo $mar;?>">
<input type="hidden" name="mie[<?php  echo $j;?>]"  value="<?php  echo $mie;?>">
<input type="hidden" name="jue[<?php  echo $j;?>]"  value="<?php  echo $jue;?>">
<input type="hidden" name="vie[<?php  echo $j;?>]"  value="<?php  echo $vie;?>">
<input type="hidden" name="sab[<?php  echo $j;?>]"  value="<?php  echo $sab;?>">
<input type="hidden" name="dom[<?php  echo $j;?>]"  value="<?php  echo $dom;?>">
<tr>
<td>
<input type="date" name="fi1[<?php  echo $j;?>]" value="<?php  echo $fi;?>" size="11" maxlength="10"  placeholder="2015/01/01">
</td>
<td>
<input type="date" name="ff1[<?php  echo $j;?>]" value="<?php  echo $ff;?>" size="11" maxlength="10"  placeholder="2015/01/01"></td>
<td>
<select name="turno1[<?php  echo $j;?>]">
<option value="1" <?php if ($turno==1){;?>selected<?php };?> >Activo
<option value="2" <?php if ($turno==2){;?>selected<?php };?> >Vacaciones
<option value="3" <?php if ($turno==3){;?>selected<?php };?> >Baja
</select>
</td>
<td><input type="text" name="horent1[<?php  echo $j;?>]"  value="<?php  echo $horent;?>" size="9" maxlength="8"  placeholder="15:00"></td>
<td><input type="text" name="margenent1[<?php  echo $j;?>]"  value="<?php  echo $margenent;?>" size="9" maxlength="8"  placeholder="00:05"></td>
<td><input type="text" name="horsal1[<?php  echo $j;?>]"  value="<?php  echo $horsal;?>" size="9" maxlength="8"  placeholder="15:00"></td>
<td><input type="text" name="margensal1[<?php  echo $j;?>]"  value="<?php  echo $margensal;?>" size="9" maxlength="8"  placeholder="00:05"></td>


<td>
<table>
<tr>
<td><input type="checkbox" value="1" name="lun1[<?php  echo $j;?>]" <?php if ($lun==1){;?>checked<?php };?> ></td>
<td><input type="checkbox" value="1" name="mar1[<?php  echo $j;?>]" <?php if ($mar==1){;?>checked<?php };?> ></td>
<td><input type="checkbox" value="1" name="mie1[<?php  echo $j;?>]" <?php if ($mie==1){;?>checked<?php };?> ></td>
<td><input type="checkbox" value="1" name="jue1[<?php  echo $j;?>]" <?php if ($jue==1){;?>checked<?php };?> ></td>
<td><input type="checkbox" value="1" name="vie1[<?php  echo $j;?>]" <?php if ($vie==1){;?>checked<?php };?> ></td>
<td><input type="checkbox" value="1" name="sab1[<?php  echo $j;?>]" <?php if ($sab==1){;?>checked<?php };?> ></td>
<td><input type="checkbox" value="1" name="dom1[<?php  echo $j;?>]" <?php if ($dom==1){;?>checked<?php };?> ></td>
</tr>
</table>
</td>
<td><a href="intro2.php?tablas=borrarempl&id=<?php  echo $idjor;?>"><img src="../img/papelera.png" width="25px"></a>
  <input type="image" src="../img/pencil.png" alt="Submit" width="25" height="25">

<!--<input class="envio" type="submit" name="Enviar" value="Enviar">-->

</td>


</tr>
</form>
<?php };?>




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
