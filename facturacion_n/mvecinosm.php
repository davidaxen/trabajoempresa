
<?php  
include('bbdd.php');
?>
<?php 
if ($ide!=null){;

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
$nc=$resultado31['vecinos'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
$ic=$resultado32['vecinos'];

include('../portada_n/cabecera2.php');
?>


<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php 
if ($enviar==null){;


$sql="SELECT * from vecinos where idempresa='".$ide."' and idvecino='".$idvecino."'"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$idvecino=$resultado['idvecino'];
$nombre=$resultado['nombre'];
$referencia=$resultado['referencia'];
$tele1=$resultado['telefono1'];
$tele2=$resultado['telefono2'];
$fax=$resultado['fax'];
$direccion=$resultado['direccion'];
$cp=$resultado['cp'];
$emailn=$resultado['email'];
$idclientevec=$resultado['idcliente'];
$incidenciat=$resultado['incidencia'];
$jornadat=$resultado['jornada'];
$estadot=$resultado['estado'];
?>

<form action="mvecinosm.php" method="post" name="form2">
<table>


<input type="hidden" name="idvecino" value="<?php  echo $idvecino;?>">
<input type="hidden" name="nombrevec" value="<?php  echo $nombre;?>">
<input type="hidden" name="referencia" value="<?php  echo $referencia;?>">
<input type="hidden" name="direccion" value="<?php  echo $direccion;?>">
<input type="hidden" name="cp" value="<?php  echo $cp;?>">

<input type="hidden" name="tele1" value="<?php  echo $tele1;?>">
<input type="hidden" name="tele2" value="<?php  echo $tele2;?>">
<input type="hidden" name="fax1" value="<?php  echo $fax;?>">
<input type="hidden" name="emailn" value="<?php  echo $emailn;?>">
<input type="hidden" name="idclientevec" value="<?php  echo $idclientevec;?>">
<input type="hidden" name="incidenciat" value="<?php  echo $incidenciat;?>">
<input type="hidden" name="jornadat" value="<?php  echo $jornadat;?>">
<input type="hidden" name="estadot" value="<?php  echo $estadot;?>">

<tr><td class="tit">Nombre del <?php  echo strtoupper($nc);?></td><td><input type="text" name="nombrevecnue" value="<?php  echo $nombre;?>"></td></tr>
<tr><td class="tit">Referencia</td><td><input type="text" name="referencianue" value="<?php  echo $referencia;?>"></td></tr>
<tr><td class="tit">Dirección</td><td><input type="text" name="direccionnue" value="<?php  echo $direccion;?>"></td></tr>
<tr><td class="tit">Código Postal</td><td><input type="text" name="cpnue" maxlength="5" value="<?php  echo $cp;?>"></td></tr>
<tr><td class="tit">Telefono 1</td><td><input type="text" name="tele1nue" value="<?php  echo $tele1;?>"></td></tr>
<tr><td class="tit">Telefono 2</td><td><input type="text" name="tele2nue" maxlength="9" value="<?php  echo $tele2;?>"></td></tr>
<tr><td class="tit">Fax</td><td><input type="text" name="fax1nue" maxlength="9" value="<?php  echo $fax;?>"></td></tr>
<tr><td class="tit">E-mail</td><td><input type="text" name="emailnnue" value="<?php  echo $emailn;?>"></td></tr>
<tr><td class="tit">Estado</td><td>
<select name="estadotnue">
<option value="0" <?php if ($estadot==0){;?>selected<?};?> >Baja
<option value="1" <?php if ($estadot==1){;?>selected<?};?> >Alta
</select>
</td></tr>
<tr><td class="tit">Comunidad</td><td><select name="idclientevecnue[]" multiple="multiple">
<?php
$sql33="select * from clientes where idempresas='".$ide."'";
//echo $sql33;
$result33=mysqli_query($conn,$sql33) or die ("Invalid result clientes");
$row33=mysqli_num_rows($result33);
?>

<option value="">Elige una o varias Comunidad</option>
<?php 
for($t=0;$t<$row33;$t++){;
mysqli_data_seek($result33,$t);
$resultado33=mysqli_fetch_array($result33);
$idclientevec2=$resultado33['idclientes'];
$nombrevec2=$resultado33['nombre'];
?>
<option value="<?php echo $idclientevec2;?>"
<?php
if ($idclientevec==$idclientevec2){;?> selected <?php };?> ><?php echo $nombrevec2;?></option>
<?php };?>
</select></td></tr>
<tr><td colspan="2">Envio de correos electronicos</td></tr>
<tr><td>Incidencias Urgentes</td><td>Retrasos de Jornada</td></tr>
<tr><td class="tit">
<input type="checkbox" name="incidenciatnue" value="1" <?php if($incidenciat==1){;?>checked<?};?> >
</td><td>
<input type="checkbox" name="jornadatnue" value="1" <?php if($jornadat==1){;?>checked<?};?> >
</td></tr>

<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php } else {;?>
<?php 


$sql0="update vecinos set ";
$sql1="where idvecino='".$idvecino."' and idempresa='".$ide."' ";


$datosnue=array($nombrevecnue,$referencianue,$direccionnue,$cpnue,$tele1nue,$tele2nue,$fax1nue,$emailnnue,$incidenciatnue,$jornadatnue,$estadotnue);
$datos=array($nombrevec,$referencia,$direccion,$cp,$tele1,$tele2,$fax1,$emailn,$incidenciat,$jornadat,$estadot);
$bbdd=array('nombre','referencia','direccion','cp','telefono1','telefono2','fax','email','incidencia','jornada','estado');

for ($i=0;$i<count($datosnue);$i++){

if ($datosnue[$i]!=$datos[$i]){;
$sqla="$bbdd[$i]='".$datosnue[$i]."' ";
$sql=$sql0.$sqla.$sql1;
//echo $sql;
$resultd=mysqli_query($conn,$sql) or die ("Invalid result");
};

};

if (count($idclientevecnue)>0){;
$sql4="DELETE FROM vecinoscom where idvecino='".$idvecino."' and idempresa='".$ide."' ";
$result4=mysqli_query($conn,$sql4) or die ("Invalid result vecinoscom delete");

for ($jt=0;$jt<count($idclientevecnue);$jt++){;
$sql22 = "INSERT INTO vecinoscom (idvecino,idempresa,idcliente) VALUES ('$idvecino','$ide','$idclientevecnue[$jt]')";
//echo $sql2;
$result22=mysqli_query($conn,$sql22) or die ("Invalid result vecinoscom");
};


};





if ($referencia==''){;

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($referencianue, METHOD, $key, 0, $iv);
			$pass1=base64_encode($output);

$sql2 = "INSERT INTO usuarios (user,password,idempresas,idvecino,vecino,tusuario,modulo) VALUES ('$referencianue','$pass1','$ide','$idc','1','5','41')";
//echo $sql2;
$result2=mysqli_query($conn,$sql2) or die ("Invalid result usuarios");




$sql00 = "INSERT INTO usuarios (user,password,idempresas,idvecino,vecino,iente,gestor,trabajador,documentacion,validar,estado) 
VALUES ('$referencianue','$tele1','$ide','0','0','$idgestor','0','0','0','0','0','0','0','1','0','0','1','1')";
$result00=mysqli_query($conn,$sql00) or die ("Invalid result user");
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
