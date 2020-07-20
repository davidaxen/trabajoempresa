<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE RUTAS</p></div>
<div class="contenido">

<script type="text/javascript" language="JavaScript">
<!--
//R = hexToR("#FFFFFF");
//G = hexToG("#FFFFFF");
//B = hexToB("#FFFFFF");

function hexToR(h) { return parseInt((cutHex(h)).substring(0,2),16) }
function hexToG(h) { return parseInt((cutHex(h)).substring(2,4),16) }
function hexToB(h) { return parseInt((cutHex(h)).substring(4,6),16) }
function cutHex(h) { return (h.charAt(0)=="#") ? h.substring(1,7) : h}

function setBgColorById(id,sColor) {
 var elem;
 if (document.getElementById) {
  if (elem=document.getElementById(id)) {
   if (elem.style) elem.style.backgroundColor=sColor;
  }
 }
}

//-->
</script>

<?php 

if ($enviar==null){

$sql2="SELECT * from ruta where idempresas=:ide order by idruta asc"; 
$result2=$conn->prepare($sql2);
$result2->bindParam(':ide', $ide);
$result2->execute();
$row2=count($result2->fetchAll());

$result2mos=$conn->prepare($sql2);
$result2mos->bindParam(':ide', $ide);
$result2mos->execute();


/*$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);*/

if ($row2!=0){ ?>
<table><tr><td>Tienes las siguientes rutas introducidas:</td></tr></table>
<table>
<tr class="enca"><td>Cod. Ruta</td><td>Nombre</td><td>Activo</td><td>Opcion</td></tr>
<?php 
/*for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2, $t);
$resultado2=mysqli_fetch_array($result2);*/
$t=0;
foreach ($result2mos as $row2mos) {
$idruta=$row2mos['idruta'];
$nombreruta=$row2mos['nombreruta'];
$activo=$row2mos['estado'];
if ($t==$row2-1){
$ultpunto=$idruta;
};
?>
<tr><td><?php  echo $idruta;?></td><td><?php  echo $nombreruta;?></td>
<td>
<?php if ($activo==1){;?>Si<?php }else{;?>No<?php };?>
</td>
<td><a href="mpuntcont.php?enviar=enviar&idruta=<?php echo $idruta;?>"><img src="../../img/modificar.gif"></a></td></tr>
<?php 
$t=$t+1;
};?>
</table>
<img alt="volver" border="0" src="../../img/arrow_cycle.png" onclick="history.back()">

<?php }else{;?>

No tienes dado de alta ningún punto

<?php };?>
<?php } else {;?>
<?php 
$sql3="SELECT * from ruta where idempresas=:ide and idruta=:idruta";
$result3=$conn->prepare($sql3);
$result3->bindParam(':ide', $ide);
$result3->bindParam(':idruta', $idruta);
$result3->execute();
$resultado3=$result3->fetch();

/*$result3=mysqli_query ($conn,$sql3) or die ("Invalid result 3");
$resultado3=mysqli_fetch_array($result3);*/
$idruta=$resultado3['idruta'];
$nombreruta=$resultado3['nombreruta'];
$activo=$resultado3['estado'];
$lun=$resultado3['lun'];
$mar=$resultado3['mar'];
$mie=$resultado3['mie'];
$jue=$resultado3['jue'];
$vie=$resultado3['vie'];
$sab=$resultado3['sab'];
$dom=$resultado3['dom'];
$idempleado=$resultado3['idempleado'];
?>

<form action="intro2.php" method="post" name=rgb>


<table>

<input type="hidden" name="tabla" value="mpuntcont">
<input type="hidden" name="idruta" value="<?php  echo $idruta;?>">
<input type="hidden" name="punt" value="<?php  echo $nombreruta;?>">
<input type="hidden" name="activo" value="<?php  echo $activo;?>">
<input type="hidden" name="lun" value="<?php  echo $lun;?>">
<input type="hidden" name="mar" value="<?php  echo $mar;?>">
<input type="hidden" name="mie" value="<?php  echo $mie;?>">
<input type="hidden" name="jue" value="<?php  echo $jue;?>">
<input type="hidden" name="vie" value="<?php  echo $vie;?>">
<input type="hidden" name="sab" value="<?php  echo $sab;?>">
<input type="hidden" name="dom" value="<?php  echo $dom;?>">
<input type="hidden" name="idempleado" value="<?php  echo $idempleado;?>">


<tr><td>Nombre de Ruta</td>
<td>Estado</td>
<td>Empleado</td>
<td>
<table>
<tr><td colspan="7">Dia de la Semana</td></tr>
<tr>
<td>Lu.</td>
<td>Ma.</td>
<td>Mi.</td>
<td>Ju.</td>
<td>Vi.</td>
<td>Sa.</td>
<td>Do.</td>
</tr>
</table>
</td>

</tr>

<tr>
<td><input type="text" name="puntn" value="<?php  echo $nombreruta;?>" size="30"></td>

<td><select name="activon">
<option value="1" <?php if ($activo==1){;?>selected<?php };?> >Si
<option value="0" <?php if ($activo==0){;?>selected<?php };?> >No
</td>

<td>


<?php 
$sql="SELECT * from empleados where idempresa=:ide and estado='1'"; 
/*$sql.=" and estado='1'";*/
$result=$conn->prepare($sql);
$result->bindParam(':ide', $ide);
$result->execute();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);*/
?>
<select name="idempleadon">
<option value=""></option>
<?php 
/*for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$idempl=$rowmos['idempleado'];
$nombre=$rowmos['nombre'];
$priape=$rowmos['1apellido'];
$segape=$rowmos['2apellido'];
?>
<option value="<?php  echo $idempl;?>"  <?php if ($idempleado==$idempl){;?>selected<?php };?>  ><?php  echo $nombre;?>, <?php  echo $priape;?> <?php  echo $segape;?>
<?php };?>
</select></td>




<td>
<table>
<tr>
<td><input type="checkbox" value="1" name="lunn" <?php if ($lun=='1'){;?>checked<?php };?> ></td>
<td><input type="checkbox" value="1" name="marn" <?php if ($mar=='1'){;?>checked<?php };?> ></td>
<td><input type="checkbox" value="1" name="mien" <?php if ($mie=='1'){;?>checked<?php };?> ></td>
<td><input type="checkbox" value="1" name="juen" <?php if ($jue=='1'){;?>checked<?php };?> ></td>
<td><input type="checkbox" value="1" name="vien" <?php if ($vie=='1'){;?>checked<?php };?> ></td>
<td><input type="checkbox" value="1" name="sabn" <?php if ($sab=='1'){;?>checked<?php };?> ></td>
<td><input type="checkbox" value="1" name="domn" <?php if ($dom=='1'){;?>checked<?php };?> ></td>
</tr>
</table>
</td> 
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php 
$sql21="SELECT * from clienteruta where idempresas=:ide and idruta=:idruta";
$result21=$conn->prepare($sql21);
$result21->bindParam(':ide', $ide);
$result21->bindParam(':idruta', $idruta);
$result21->execute();
$row21=count($result21->fetchAll());

$result21mos=$conn->prepare($sql21);
$result21mos->bindParam(':ide', $ide);
$result21mos->bindParam(':idruta', $idruta);
$result21mos->execute();
/*$result21=mysqli_query ($conn,$sql21) or die ("Invalid result");
$row21=mysqli_num_rows($result21);*/

if ($row21==0){;
?>
No tienes ning&uacuten cliente asignado, pincha <a href="apuntcont.php"> aqui </a> para asignar clientes
<?php 
}else{;
?>
<table>
<tr><td colspan="2">Clientes dentro de Ruta</td></tr>
<?php 
/*for ($ty=0;$ty<$row21;$ty++){
mysqli_data_seek($result21, $ty);
$resultado21=mysqli_fetch_array($result21);*/
foreach ($result21 as $row21mos) {
$idclientes=$row21mos['idclientes'];

$sql23="SELECT * from clientes where idempresas=:ide and idclientes=:idclientes";
$result23=$conn->prepare($sql23);
$result23->bindParam(':ide', $ide);
$result23->bindParam(':idclientes', $idclientes);
$result23->execute();
$resultado23=$result23->fetch();
/*$result23=mysqli_query ($conn,$sql23) or die ("Invalid result");
$resultado23=mysqli_fetch_array($result23);*/
$nombre=$resultado23['nombre'];
?>
<tr>
<td><?php  echo $nombre;?></td>
<td><a href="intro2.php?tabla=borrar&idclientes=<?php  echo $idclientes;?>&idruta=<?php  echo $idruta;?>"><img src="../../img/papelera.gif" width="25px"></a></td>
</tr>

<?php };?>
</table>
 Pincha <a href="apuntcont.php"> aqui </a> para asignar m&aacutes clientes
<?php };?>

<?php };?>



</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>