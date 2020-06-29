<?php 
include('bbdd.php');
?>
<?php if ($ide!=null){;?>
<?php  include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">ARCHIVOS ENVIADOS A GESTORES</p></div>
<div class="contenido">



<?php 

if ($datos!='datos'){;
?>

<table>
<form method="post" action="lgestoresa.php">
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Clientes</td><td><select name="estado">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?php 
}else{;

$sql="SELECT * from gestores where idempresa='".$ide."' and estado='".$estado."'"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$row=mysqli_affected_rows();
?>
<table>
<tr class="subenc"><td>Nº Gestor</td><td>Nombre del Gestor</td><td>Persona de Contacto</td><td>Telefono 1</td><td>Telefono 2</td><td>Fax</td><td>Direccion</td><td>C.P.</td><td>E.mail</td><td>Opcion</td></tr>
<?php  for ($i=0; $i<$row; $i++){;?>
<tr class="menor1">
<td><?php $idgestor=mysqli_result($result,$i,'idgestor');?><?php  echo $idgestor;?></td>
<td><?php $nombre=mysqli_result($result,$i,'nombregestor');?><?php  echo $nombre;?></td>
<td><?php $percontacto=mysqli_result($result,$i,'percontacto');?><?php  echo $percontacto;?></td>
<td><?php $tele1=mysqli_result($result,$i,'telefono1');?><?php  echo $tele1;?></td>
<td><?php $tele2=mysqli_result($result,$i,'telefono2');?><?php  echo $tele2;?></td>
<td><?php $fax=mysqli_result($result,$i,'fax');?><?php  echo $fax;?></td>
<td><?php $direccion=mysqli_result($result,$i,'direccion');?><?php  echo $direccion;?></td>
<td><?php $cp=mysqli_result($result,$i,'cp');?><?php  echo $cp;?></td>
<td><?php $emailn=mysqli_result($result,$i,'email');?><?php  echo $emailn;?></td>
<td><a href="lgestorescla.php?idgestor=<?php  echo $idgestor;?>"><img src="../img/icono-usuarios.gif" border=0 width=25></a></td>
</tr>
<?php };?>
</table>

<?php };?>

<?php }else{;
include ('../cierre.php');
 };?>

