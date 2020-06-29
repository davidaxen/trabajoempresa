<?php 
include('bbdd.php');

include('../portada_n/cab_repr2.php');?>

<div id="main">
<div class="titulo">
<p class="enc">LISTADO DE EMPRESAS</p>
</div>
<div class="contenido">

<?
$sql="select * from empresas where nifrepresentante='".$nifrep."' and estado>0";
$result=mysql_query ($sql) or die ("Invalid result 0");
$row=mysql_affected_rows();
?>

<table>
<tr class="enctab">
<td>Nº Empresa</td><td>Empresa</td><td>NIF</td><td>Domicilio</td><td>C.P.</td><td>&nbsp;</td></tr>

<?
for ($j=0;$j<$row;$j++){;

$idempresas=mysql_result($result,$j,'idempresas');
$nombre=mysql_result($result,$j,'nombre');
$nif=mysql_result($result,$j,'nif');
$domicilio=mysql_result($result,$j,'domicilio');
$cp=mysql_result($result,$j,'cp');


?>
<tr class="dattab">
<td><?=strtoupper($idempresas);?></td>
<td><?=strtoupper($nombre);?></td>
<td><?=strtoupper($nif);?></td>
<td><?=strtoupper($domicilio);?></td>
<td><?=strtoupper($cp);?></td>

<td><a href="../inicio1.php?ide=<?=$idempresas;?>&user=<?=$user;?>&pass=<?=$pass;?>" target="_blank">
<img src="../img/modificar.gif" width="25px"></a>
</td>
</tr>
<?};?>
</div>

</div>
