<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INFORMES DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">


<?php 
if ($enviar==null){;
?>
<form action="infpuntcont.php" method="post">
<table>
<tr><td>Codigos de Envases</td><td><input type="number" name="valor1"></td><td><input type="number" name="valor2"></td></tr>
<tr><td>Estado</td><td><select name="estado"><option value=""></option><option value="0">Baja</option><option value="1">Alta</option></select></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<form action="infpuntcont2.php" method="post">
<table>
<tr><td>Numero de Rellenados</td><td><input type="number" name="numrell"></td></tr>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>

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
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);

if ($row2!=0){?>
	<table>
	<tr class="enca"><td>Codigo Envase</td><td>Vida Util</td><td>Num de rellenados</td><td>Activo</td><td>Codigos</td></tr>

		<?php  for ($t=0;$t<$row2;$t++){
		mysqli_data_seek($result2,$t);		
		$resultado2=mysqli_fetch_array($result2);
		$idenvases=$resultado2['idenvases'];
		$vutil=$resultado2['rellenados'];
		$activo=$resultado2['estado'];

		$sql22="SELECT count(id) as numre from almenvases where idempresas='".$ide."' and idenvases='".$idenvases."' and tipocliente='1'"; 
		//echo $sql22;
		$result22=mysqli_query ($conn,$sql22) or die ("Invalid result");
		$resultado22=mysqli_fetch_array($result22);
		$numre=$resultado22['numre'];
		?>

		<?php 
		/*
		switch($combinacion){;
		case '1': {; break;
		case '2': if($numre>$numrell){; break;
		case '3': if($numre>=$numrell){; break;
		case '4': if($numre<$numrell){;  break;
		case '5': if($numre<=$numrell){; break;
		};
		*/
		//$codi=$numre.$combinacion.$numrell;
		//echo $codi;

		$condicion = false;
		if($combinacion=="=="){
			if($numre==$numrell){
				$condicion = true;
			}
		}else if($combinacion==">"){
			if($numre>$numrell){
				$condicion = true;
			}
		}else if($combinacion==">="){
			if($numre>=$numrell){
				$condicion = true;
			}
		}else if($combinacion=="<"){
			if($numre<$numrell){
				$condicion = true;
			}
		}else if($combinacion=="<="){
			if($numre<=$numrell){
				$condicion = true;
			}
		}

		if($condicion){
			?>
			<tr><td><?php  echo $idenvases;?></td><td><?php  echo $vutil;?></td><td><?php  echo $numre;?></td>
			<td>
			<?php if ($activo==1){
				?>Si<?php 
			}else{
				?>No<?php 
			}
			?></td><td><a href="dymo.php?enviar=enviar&idenvases=<?php  echo $idenvases;?>"><img src="../../img/dymo.png" width="25px"></a></td></tr>
		
		<?php }?>
	<?php }?>
	</table>
<?php }?>


<?php };?>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>