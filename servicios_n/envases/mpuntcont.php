<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">


<?php 
if ($enviar==null){;
?>
<form action="mpuntcont.php" method="post">
<table>
<tr><td>Codigos de Envases</td><td><input type="number" name="valor1"></td><td><input type="number" name="valor2"></td></tr>
<!--<tr><td>Numero de Rellenados</td><td><input type="number" name="numrell"></td></tr>-->
<tr><td>Estado</td><td><select name="estado"><option value=""></option><option value="0">Baja</option><option value="1">Alta</option></select></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php }else{;?>


<?php 
$sql2="SELECT * from envases where idempresas='".$ide."'"; 
if ($estado!=""){;
$sql2.=" and estado='".$estado."'";
};
if (($valor1!="") and ($valor2!="")){;
$sql2.=" and idenvases between '".$valor1."' and '".$valor2."'";
}else{;
if ($valor1!=""){;
$sql2.=" and idenvases='".$valor1."'";
};
};
$result2=$conn->query($sql2);
$result2mos=$conn->query($sql2);
$row2=$result2->fetchColumn();

/*$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);*/

if ($row2!=0){;?>
<table>
<tr class="enca"><td>Codigo Envase</td><td>Vida Util</td><td>Num de rellenados</td><td>Activo</td><td>Opcion</td></tr>
<?php  
/*for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2, $t);
$resultado2=mysqli_fetch_array($result2);*/
foreach ($result2mos as $row2mos) {
$idenvases=$row2mos['idenvases'];
$vutil=$row2mos['rellenados'];
$activo=$row2mos['estado'];

$sql22="SELECT count(id) as numre from almenvases where idempresas='".$ide."' and idenvases='".$idenvases."' and tipocliente='1'";
$result22=$conn->query($sql22);
$resultado22=$result22->fetch();
/*$result22=mysqli_query ($conn,$sql22) or die ("Invalid result");
$resultado22=mysqli_fetch_array($result22);*/
$numre=$resultado22['numre'];
?>
<tr><td><?php  echo $idenvases;?></td><td><?php  echo $vutil;?></td><td><?php  echo $numre;?></td>
<td>
<?php if ($activo==1){;?>Si<?php }else{;?>No<?php };?>
</td>
<td><a href="modpuntcont.php?enviar=enviar&idenvases=<?php  echo $idenvases;?>"><img src="../../img/modificar.gif"></a></td></tr>
<?php };?>
</table>


<?php };?>


<?php };?>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>