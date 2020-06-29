
<?php  
include('bbdd.php');
?>
<?php 
if ($ide!=null){;

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";

$result31=$conn->query($sql31);
$resultado31=$result31->fetch();

//$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
//$resultado31=mysqli_fetch_array($result31);
//$nc=$resultado31['gestores'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";

$result32=$conn->query($sql32);
$resultado32=$result32->fetch();

//$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);
$ic=$resultado32['gestores'];

include('../portada_n/cabecera2.php');
?>


<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php 
if ($enviar==null){;


$sql="SELECT * from gestores where idempresa='".$ide."' and idgestor='".$idgestora."'"; 

$result=$conn->query($sql);
//$result=mysqli_query($conn,$sql) or die ("Invalid result");
//$resultado=mysqli_fetch_array($result);
$idgestora=$resultado['idgestor'];
$nombre=$resultado['nombregestor'];
$percontacto=$resultado['percontacto'];
$tele1=$resultado['telefono1'];
$tele2=$resultado['telefono2'];
$fax=$resultado['fax'];
$direccion=$resultado['direccion'];
$cp=$resultado['cp'];
$emailn=$resultado['email'];
$userg=$resultado['user'];
?>

<form action="mgestoresm.php" method="post" name="form2">
<table>


<input type="hidden" name="idgestora" value="<?php  echo $idgestor;?>">
<input type="hidden" name="gestor" value="<?php  echo $nombre;?>">
<input type="hidden" name="percontacto" value="<?php  echo $percontacto;?>">
<input type="hidden" name="direccion" value="<?php  echo $direccion;?>">
<input type="hidden" name="cp" value="<?php  echo $cp;?>">

<input type="hidden" name="tele1" value="<?php  echo $tele1;?>">
<input type="hidden" name="tele2" value="<?php  echo $tele2;?>">
<input type="hidden" name="fax1" value="<?php  echo $fax;?>">
<input type="hidden" name="emailn" value="<?php  echo $emailn;?>">
<input type="hidden" name="userg" value="<?php  echo $userg;?>">

<tr><td class="tit">Nombre del <?php  echo strtoupper($nc);?></td><td><input type="text" name="gestornue" value="<?php  echo $nombre;?>"></td></tr>
<tr><td class="tit">Persona de Contacto</td><td><input type="text" name="percontactonue" value="<?php  echo $percontacto;?>"></td></tr>
<tr><td class="tit">Dirección</td><td><input type="text" name="direccionnue" value="<?php  echo $direccion;?>"></td></tr>
<tr><td class="tit">Código Postal</td><td><input type="text" name="cpnue" maxlength="5" value="<?php  echo $cp;?>"></td></tr>
<tr><td class="tit">Telefono 1</td><td><input type="text" name="tele1nue" value="<?php  echo $tele1;?>"></td></tr>
<tr><td class="tit">Telefono 2</td><td><input type="text" name="tele2nue" maxlength="9" value="<?php  echo $tele2;?>"></td></tr>
<tr><td class="tit">Fax</td><td><input type="text" name="fax1nue" maxlength="9" value="<?php  echo $fax;?>"></td></tr>
<tr><td class="tit">E-mail</td><td><input type="text" name="emailnnue" value="<?php  echo $emailn;?>"></td></tr>
<?php if ($userg==''){;
$usergnue='g'.$ide.$idgestora;
?>
<tr><td class="tit">Usuario</td><td><input type="hidden" name="usergnue" value="<?php  echo $usergnue;?>"><?php  echo $usergnue;?></td></tr>
<?php }else{;?>
<tr><td class="tit">Usuario</td><td><input type="hidden" name="usergnue" value="<?php  echo $userg;?>"><?php  echo $userg;?></td></tr>
<?php };?>



<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php } else {;?>
<?php 


$sql0="update gestores set ";
$sql1="where idgestor='".$idgestora."' and idempresa='".$ide."' ";


$datosnue=array($gestornue,$percontactonue,$direccionnue,$cpnue,$tele1nue,$tele2nue,$fax1nue,$emailnnue,$usergnue);
$datos=array($gestor,$percontacto,$direccion,$cp,$tele1,$tele2,$fax1,$emailn,$userg);
$bbdd=array('nombregestor','percontacto','direccion','cp','telefono1','telefono2','fax','email','user');

for ($i=0;$i<count($datosnue);$i++){

if ($datosnue[$i]!=$datos[$i]){;
$sqla="$bbdd[$i]='".$datosnue[$i]."' ";
$sql=$sql0.$sqla.$sql1;
//echo $sql;

$result=$conn->query($sql);

//$resultd=mysqli_query($conn,$sql) or die ("Invalid result");
};

};


if ($userg==''){;
$sql00 = "INSERT INTO usuarios (user,password,idempresas,idcliente,idempleados,idgestor,administracion,servicios,informes,
datoslateral,portada,datoslateral2,cliente,gestor,trabajador,documentacion,validar,estado) 
VALUES ('$usergnue','$tele1','$ide','0','0','$idgestor','0','0','0','0','0','0','0','1','0','0','1','1')";

$result=$conn->query($sql00);

//$result00=mysqli_query($conn,$sql00) or die ("Invalid result user");
};



?>
Datos modificados<br>
<table>
<tr><td class="tit">Codigo del Gestor</td><td><?php  echo $idgestor;?></td></tr>
<tr><td class="tit">Nombre del Gestor</td><td><?php  echo $gestornue;?></td></tr>
<tr><td class="tit">Persona de Contacto</td><td><?php  echo $percontactonue;?></td></tr>
<tr><td class="tit">Dirección</td><td><?php  echo $direccionnue;?></td></tr>
<tr><td class="tit">Código Postal</td><td><?php  echo $cpnue;?></td></tr>
<tr><td class="tit">Telefono 1</td><td><?php  echo $tele1nue;?></td></tr>
<tr><td class="tit">Telefono 2</td><td><?php  echo $tele2nue;?></td></tr>
<tr><td class="tit">Fax</td><td><?php  echo $fax1nue;?></td></tr>
<tr><td class="tit">E-mail</td><td><?php  echo $emailnnue;?></td></tr>
</table>



<?php };?>
</div>
<?php }else{;
include ('../cierre.php');
 };?>
