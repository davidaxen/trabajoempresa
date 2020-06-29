
<?php  
include('bbdd.php');

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
$nc=$resultado31['gestores'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
$ic=$resultado32['gestores'];

 include('../portada_n/cabecera2.php');?>


<div id="main">
<p class="enc">INTRODUCCI&OacuteN DE <?php  echo strtoupper($nc);?></p>



<?php 

if(!isset($idc)){
	$idc=null;
}

if ($idc==null){;
?>

<form action="igestores.php" method="post" name="form2">
<table>
<input type="hidden" name="idc" value="3">

<tr><td class="tit">Nombre de <?php  echo ucfirst($nc);?></td><td><input type="text" name="gestor" size="80"></td></tr>
<tr><td class="tit">Persona de Contacto</td><td><input type="text" name="percontacto" size="80"></td></tr>
<tr><td class="tit">Dirección</td><td><input type="text" name="direccion" size="80"></td></tr>
<tr><td class="tit">Código Postal</td><td><input type="text" name="cp" maxlength="5" size="6"></td></tr>
<tr><td class="tit">Telefono 1</td><td><input type="text" name="tele1" maxlength="9" size="10"></td></tr>
<tr><td class="tit">Telefono 2</td><td><input type="text" name="tele2" maxlength="9" size="10"></td></tr>
<tr><td class="tit">Fax</td><td><input type="text" name="fax1" maxlength="9" size="10"></td></tr>
<tr><td class="tit">E-mail</td><td><input type="text" name="emailn" size="80"></td></tr>





<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php } else {;?>
<?php 

$sql="select idgestor from gestores where idempresa='".$ide."' order by idgestor desc"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result clientes");
$row=mysqli_num_rows($result);
?>
<form action="intro2.php" method="post">
<table>
<input type="hidden" name="tabla" value="idgestores">


<?php 
If ($row==0){;
$idc=10;
}else{;
$resultado=mysqli_fetch_array($result);
$idc=$resultado['idgestor'];
$idc=$idc+1;
};
?>
<tr><td class="tit">Codigo del <?php  echo strtoupper($nc);?></td><td><input type="hidden" name="idc" value="<?php  echo $idc;?>"><?php  echo $idc;?></td></tr>
<tr><td class="tit">Nombre del <?php  echo strtoupper($nc);?></td><td><input type="hidden" name="gestor" value="<?php  echo $gestor;?>"><?php  echo $gestor;?></td></tr>
<tr><td class="tit">Persona de Contacto</td><td><input type="hidden" name="percontacto" value="<?php  echo $percontacto;?>"><?php  echo $percontacto;?></td></tr>
<tr><td class="tit">Dirección</td><td><input type="hidden" name="direccion" value="<?php  echo $direccion;?>"><?php  echo $direccion;?></td></tr>
<tr><td class="tit">Código Postal</td><td><input type="hidden" name="cp" value="<?php  echo $cp;?>"><?php  echo $cp;?></td></tr>
<tr><td class="tit">Telefono 1</td><td><input type="hidden" name="tele1" value="<?php  echo $tele1;?>"><?php  echo $tele1;?></td></tr>
<tr><td class="tit">Telefono 2</td><td><input type="hidden" name="tele2" value="<?php  echo $tele2;?>"><?php  echo $tele2;?></td></tr>
<tr><td class="tit">Fax</td><td><input type="hidden" name="fax1" value="<?php  echo $fax1;?>"><?php  echo $fax1;?></td></tr>
<tr><td class="tit">E-mail</td><td><input type="hidden" name="emailn" value="<?php  echo $emailn;?>"><?php  echo $emailn;?></td></tr>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>


<?php };?>
</div>