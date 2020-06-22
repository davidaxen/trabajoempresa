<?php  
include('bbdd.php');
if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE ORDENES</p></div>
<div class="contenido">

<?php 
$sql1="SELECT * from trabajos";
$sql1.=" where idempresa='".$ide."' ";
$sql1.=" and idsiniestro='".$idsiniestro."' ";
//echo $sql1;
$result=$conn->query($sql1);
$resultado=$result->fetch();

/*$result=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado=mysqli_fetch_array($result);*/
$i=0;

$idaseguradora=$resultado['idaseguradora'];
$numsiniestro=$resultado['numsiniestro'];
$contacto=$resultado['contacto'];
$telefono=$resultado['telefono'];
$direccion=$resultado['direccion'];
$localidad=$resultado['localidad'];
$provincia=$resultado['provincia'];
$cp=$resultado['cp'];
$email=$resultado['email'];
$descripcion=$resultado['descripcion'];
$diaapertura=$resultado['diaapertura'];
$horaapertura=$resultado['horaapertura'];
$estado=$resultado['terminado'];
?>


<form action="intro2.php" method="post" name=rgb>
<table>
<input type="hidden" name="tabla" value="modpuntcont">

<input type="hidden" name="idsiniestro" value="<?php  echo $idsiniestro;?>">
<input type="hidden" name="numsiniestro" value="<?php  echo $numsiniestro;?>">
<input type="hidden" name="idaseguradora" value="<?php  echo $idaseguradora;?>">
<input type="hidden" name="pcontacto" value="<?php  echo $contacto;?>">
<input type="hidden" name="telcontacto" value="<?php  echo $telefono;?>">
<input type="hidden" name="descripcion" value="<?php  echo $descripcion;?>">
<input type="hidden" name="diaapertura" value="<?php  echo $diaapertura;?>">
<input type="hidden" name="horaapertura" value="<?php  echo $horaapertura;?>">
<input type="hidden" name="terminado" value="<?php  echo $estado;?>">
<?php 

$a=strtok($diaapertura,"-");
$m=strtok("-");
$d=strtok("-");

$h=strtok($horaapertura,":");

$min=strtok(":");
$seg=strtok(":");

?>


<tr><td>Numero de Siniestro</td><td><input type="text" name="numsiniestro1" value="<?php  echo $numsiniestro;?>"></td></tr>
<tr><td>Puesto de Trabajo</td>
<td>
<?php if ($idclientesinc!=null){;?>
<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and estado='1' and idclientes='".$idclientesinc."'";
$result=$conn->query($sql);
$resultado2=$result->fetch();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado2=mysqli_fetch_array($result);*/
$nombre=$resultado2['nombre'];
$idclientes=$resultado2['idclientes'];
?>
<input type="hidden" name="idaseguradora1" value="<?php  echo $idclientes;?>"><?php  echo $nombre;?>
<?php }else{;?>
<select name="idaseguradora1" id="combobox">
<?php 
$sql="SELECT * from clientes where idempresas='".$ide."' and estado='1' ";
if ($idaseguradora>10){;
$sql.=" and idclientes='".$idaseguradora."'";
};
//echo $sql;
$result2=$conn->query($sql);


/*$result2=mysqli_query ($conn,$sql) or die ("Invalid result");
$row2=mysqli_num_rows($result2);
for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2, $t);
$resultado2=mysqli_fetch_array($result2);*/
foreach ($result2 as $row2mos) {
$nombre=$row2mos['nombre'];
$idclientes=$row2mos['idclientes'];
?><option value="<?php  echo $idclientes;?>"><?php  echo $nombre;?>
<?php };?>
</select>
<?php };?>
</td></tr>


<tr><td>Persona de Contacto</td><td><input type="text" name="pcontacto1" value="<?php  echo $contacto;?>"></td></tr>
<tr><td>Telefono</td><td><input type="text" name="telcontacto1" maxlength="9" value="<?php  echo $telefono;?>"></td></tr>
<tr><td colspan="2">Descripcion</td></tr>
<tr><td colspan="2"><textarea name="descripcion1" cols="50" rows="8"><?php  echo $descripcion;?></textarea></td></tr><tr><td>Dia Apertura</td><td><input type="text" maxlength="2" size="2" name="d" value="<?php  echo $d;?>">-
<input type="text" maxlength="text" name="m" size="2" value="<?php  echo $m;?>">-
<input type="text" maxlength="text" name="a" size="4" value="<?php  echo $a;?>"></td></tr>

<tr><td>Hora Apertura</td><td><input type="text" maxlength="2" name="h" size="2" value="<?php  echo $h;?>">-
<input type="text" maxlength="2" name="min" size="2" value="<?php  echo $min;?>">-
<input type="text" maxlength="2" name="seg" size="2" value="<?php  echo $seg;?>"></td></tr>

<tr><td>Estado</td><td><select name="terminado1">
<option value="0" <?php if ($estado=='0'){;?>selected<?php };?> >Abiertos</option>
<option value="1" <?php if ($estado=='1'){;?>selected<?php };?> >Cerrados</option>
</select>
</td></tr>

<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>