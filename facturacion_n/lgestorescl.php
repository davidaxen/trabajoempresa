<?php 
include('bbdd.php');

 if ($ide!=null){;
  include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE GESTORES Y CLIENTES QUE GESTIONAN</p></div>
<div class="contenido">
<?php 
$sql="SELECT * from gestores where idempresa='".$ide."' and idgestor='".$idgest."'"; 

$result=$conn->query($sql);
$resultado=$result->fetch();

//$result=mysqli_query($conn,$sql) or die ("Invalid result");
//$resultado=mysqli_fetch_array($result);
?>
<form>
<table>
<tr><td>Nombre del Gestor</td><td><?php $nombre=$resultado['nombregestor'];?><?php  echo $nombre;?></td></tr>
<tr><td>Persona de Contacto</td><td><?php $percontacto=$resultado['percontacto'];?><?php  echo $percontacto;?></td></tr>
</table>
<?php 
$sql1="SELECT * from clientes where idempresas='".$ide."' and idgestor='".$idgest."'";
//echo $sql1;

$result1=$conn->query($sql1);

//$result1=mysqli_query($conn,$sql1) or die ("Invalid result");
//$row=mysqli_num_rows($result1);
?>
<table>
<tr class="enctab"><td>Nº Clientes</td><td>Nombre del Cliente</td><td>Domicilio</td><td>C.P.</td></tr>
<?php  
foreach ($result1 as $row) {
//for ($i=0; $i<$row; $i++){;
//mysqli_data_seek($result1,$i);
//$resultado1=mysqli_fetch_array($result1);
?>
<tr class="dattab">
<td><?php $idclientes=$row['idclientes']?><?php  echo $idclientes;?></td>
<td><?php $nombre=$row['nombre']?><?php  echo $nombre;?></td>
<td><?php $domicilio=$row['domicilio']?><?php  echo $domicilio;?></td>
<td><?php $cp=$row['cp']?><?php  echo $cp;?></td>

</tr>
<?php };?>
</table>
</form>


<?php }else{;
include ('../cierre.php');
 };?>

