<?php 
include('bbdd.php');

 if ($ide!=null){;
  include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE ARCHIVOS ENVIADOS A GESTORES</p></div>
<div class="contenido">
<?php 
$sql="SELECT * from gestores where idempresa='".$ide."' and idgestor='".$idgestor."'"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result");
?>
<table>
<tr><td>Nombre del Gestor</td><td><?php $nombre=mysqli_result($result,0,'nombregestor');?><?php  echo $nombre;?></td></tr>
<tr><td>Persona de Contacto</td><td><?php $percontacto=mysqli_result($result,0,'percontacto');?><?php  echo $percontacto;?></td></tr>
</table>
<?php 
$sql1="SELECT * from fichero where idempresa='".$ide."' and idgestor='".$idgestor."'"; 
$result1=mysqli_query($conn,$sql1) or die ("Invalid result");
$row=mysqli_affected_rows();
?>
<table>
<tr class="subenc"><td>Nombre de Fichero</td><td>Fecha de envio</td><td>Opcion</td></tr>
<?php  for ($i=0; $i<$row; $i++){;?>
<tr class="menor1">
<td><?php $nomfichero=mysqli_result($result1,$i,'nomfichero');?><?php  echo $nomfichero;?></td>
<td><?php $fcreacion=mysqli_result($result1,$i,'fcreacion');?><?php  echo $fcreacion;?></td>
<?php $carpeta=mysqli_result($result1,$i,'carpeta');
switch ($carpeta){;
case "FAC": $path='FAC';break;
case "CON": $path='../servicios/contrato/CON';break;

};
?>


<td><a href="<?php  echo $path;?>/<?php  echo $nomfichero;?>"><img src="../img/ver.gif" border="0" alt="Visualizar" width=20></a></td>

</tr>
<?php };?>
</table>


</div>
<?php }else{;
include ('../cierre.php');
 };?>
