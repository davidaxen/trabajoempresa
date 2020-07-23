
<?php  
include('bbdd.php');


$sql31="select * from menuadministracionnombre where idempresa=:ide";

$result31=$conn->prepare($sql31);
$result31->bindParam(':ide',$ide);
$result31->execute();
$resultado31=$result31->fetch();

//$result31=$conn->query($sql31);
//$resultado31=$result31->fetch();
//$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
//$resultado31=mysqli_fetch_array($result31);
$nc=$resultado31['vecinos'];

$sql32="select * from menuadministracionimg where idempresa=:ide";

$result32=$conn->prepare($sql32);
$result32->bindParam(':ide',$ide);
$result32->execute();
$resultado32=$result32->fetch();
//$result32=$conn->query($sql32);
//$resultado32=$result32->fetch();
//$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);
$ic=$resultado32['vecinos'];

 include('../portada_n/cabecera2.php');?>


<div id="main">
<p class="enc">INTRODUCCI&OacuteN DE <?php  echo strtoupper($nc);?></p>



<?php 
if ($idc==null){


$sql33="select * from clientes where idempresas=:ide and estado='1'";

$result33=$conn->prepare($sql33);
$result33->bindParam(':ide',$ide);
$result33->execute();
$resultado33=$result33->fetch();

//$result33=$conn->query($sql33);
//$result33mos=$conn->query($sql33);

//$fetchAll33=$result33->fetchAll();
//$row33=count($fetchAll33);

//$result33=mysqli_query($conn,$sql33) or die ("Invalid result clientes");
//$row33=mysqli_num_rows($result33);


?>

<form action="ivecinos.php" method="post" name="form2">
<table>
<input type="hidden" name="idc" value="3">

<tr><td class="tit">Nombre del <?php  echo strtoupper($nc);?></td><td><input type="text" name="nombrevec" size="80"></td></tr>
<tr><td class="tit">Referencia</td><td><input type="text" name="referencia" size="80"></td></tr>
<tr><td class="tit">Dirección</td><td><input type="text" name="direccion" size="80"></td></tr>
<tr><td class="tit">Código Postal</td><td><input type="text" name="cp" maxlength="5" size="6"></td></tr>
<tr><td class="tit">Telefono 1</td><td><input type="text" name="tele1" maxlength="9" size="10"></td></tr>
<tr><td class="tit">Telefono 2</td><td><input type="text" name="tele2" maxlength="9" size="10"></td></tr>
<tr><td class="tit">Fax</td><td><input type="text" name="fax1" maxlength="9" size="10"></td></tr>
<tr><td class="tit">E-mail</td><td><input type="text" name="emailn" size="80"></td></tr>
<tr><td colspan="2">Envio de correos electronicos</td></tr>
<tr><td>Incidencias Urgentes</td><td>Retrasos de Jornada</td></tr>
<tr><td class="tit">
<input type="checkbox" name="incidenciat" value="1">
</td><td>
<input type="checkbox" name="jornadat" value="1">
</td></tr>

<tr><td class="tit">Comunidad</td>
<td><select name="idclientevec[]" multiple="multiple">
<option value="">Elige una o varias Comunidad
<?php 

foreach ($result33  as $row) {

//for($t=0;$t<$row33;$t++){;
//mysqli_data_seek($result33,$t);
//$resultado33=mysqli_fetch_array($result33);
$idclientevec=$row['idclientes'];
$nombrevec=$row['nombre'];
?>
<option value="<?php echo $idclientevec;?>"><?php echo $nombrevec;?></option>
<?php };?>

</td>
</tr>


<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php }else{?>
<?php 

$sql="select idvecino from vecinos where idempresa=:ide order by idvecino desc";

$result=$conn->prepare($sql);
$result->bindParam(':ide',$ide);
$result->execute();
$resultado31=$result->fetch();
//$result=$conn->query($sql);
//$fetchAll=$result->fetchAll();
//$row=count($fetchAll);

//$result=mysqli_query($conn,$sql) or die ("Invalid result clientes");
//$row=mysqli_num_rows($result);
?>
<form action="intro2.php" method="post">
<table>
<input type="hidden" name="tabla" value="idvecinos">


<?php 
if ($row==0){
$idc=10;
}else{
//$resultado=mysqli_fetch_array($result);
$idc=$resultado['idvecino'];
$idc=$idc+1;
}
?>
<tr><td class="tit">Codigo del <?php  echo strtoupper($nc);?></td><td><input type="hidden" name="idc" value="<?php  echo $idc;?>"><?php  echo $idc;?></td></tr>
<tr><td class="tit">Nombre del <?php  echo strtoupper($nc);?></td><td><input type="hidden" name="nombrevec" value="<?php  echo $nombrevec;?>"><?php  echo $nombrevec;?></td></tr>
<tr><td class="tit">Referencia</td><td><input type="hidden" name="referencia" value="<?php  echo $referencia;?>"><?php  echo $referencia;?></td></tr>
<tr><td class="tit">Dirección</td><td><input type="hidden" name="direccion" value="<?php  echo $direccion;?>"><?php  echo $direccion;?></td></tr>
<tr><td class="tit">Código Postal</td><td><input type="hidden" name="cp" value="<?php  echo $cp;?>"><?php  echo $cp;?></td></tr>
<tr><td class="tit">Telefono 1</td><td><input type="hidden" name="tele1" value="<?php  echo $tele1;?>"><?php  echo $tele1;?></td></tr>
<tr><td class="tit">Telefono 2</td><td><input type="hidden" name="tele2" value="<?php  echo $tele2;?>"><?php  echo $tele2;?></td></tr>
<tr><td class="tit">Fax</td><td><input type="hidden" name="fax1" value="<?php  echo $fax1;?>"><?php  echo $fax1;?></td></tr>
<tr><td class="tit">E-mail</td><td><input type="hidden" name="emailn" value="<?php  echo $emailn;?>"><?php  echo $emailn;?></td></tr>
<tr><td class="tit">Comunidad</td><td>
<?php

if(is_array($idclientevec)){

for ($hy=0;$hy<count($idclientevec);$hy++){
?>
<input type="hidden" name="idclientevec[]" value="<?php  echo $idclientevec[$hy];?>">
<?php
}
} else{
	$idclientes = 0;
}


?>
<?php 

if(is_array($idclientevec)){
	if (count($idclientevec)>1){
		echo "Ha seleccionado varias comunidades";
	}else{
 		echo $idclientevec[0];
}
} else {
	$idclientes = 0;
}


?>


</td></tr>
<tr><td>Incidencias Urgentes</td><td>Retrasos de Jornada</td></tr>
<input type="hidden" name="incidenciat" value="<?php  echo $incidenciat;?>">
<input type="hidden" name="jornadat" value="<?php  echo $jornadat;?>">
<tr><td class="tit">
<input type="checkbox" name="incidenciatt" value="1" <?php if($incidenciat==1){?>checked<?php } ?> disable>
</td><td>
<input type="checkbox" name="jornadatt" value="1" <?php if($jornadat==1){?>checked<?php } ?> disable>
</td></tr>

<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>
<?php }?>
</div>