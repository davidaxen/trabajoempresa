<html>
<?if ($com=="comprobacion"){;?>
<head>
<title>Calendario</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('../bbdd/sqlfacturacion.php');
?>


<body>
<table>
<tr><td><img src="../img/<?=$img;?>" width="300" height="81"></td>
<td><font face="Tahoma" size="5">Calendario</font></td></tr>
</table>
<?
$meses=array("Todos","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$lugar=array("Alcobendas","Alcorcón","Alcalá de Henares","Aranjuez","Arganda","Collado Villalba","Colmenar Viejo","Chinchón","Fuenlabrada","Getafe","Leganés","Madrid","Móstoles","Navalcarnero","Pinto","San Lorenzo del Escorial","San Martin de Valdeiglesias","Torrejón de Ardoz","Torrelaguna");
$coor=array("40.32/3.38","40.20/3.50","40.28/3.22","40.01/3.38","40.19/3.26","40.36/3.59","40.39/3.47","40.08/3.26","40.17/3.48","40.18/3.44","40.19/3.46","40.24/3.41","40.20/3.52","40.17/4.01","40.14/3.43","40.35/4.05","40.21/4.24","40.27/3.29","40.50/3.35");
?>
<form action="calensolar1.php" method="post">
<table>
<tr><td>Mes</td><td>
<select name="mes">
<? for ($j=0; $j<13; $j++){;?>
<option value="<?=$j;?>"><?=$meses[$j];?>
<?};?>
</select></td></tr>
<tr><td>Años</td><td>
<select name="año">
<? for ($k=2007; $k<2013; $k++){;?>
<option value="<?=$k;?>"><?=$k;?>
<?};?>
</select></td></tr>
<!--<tr><td>Sitio</td><td>
<select name="sitio">
<? for ($l=0; $l<19; $l++){;?>
<option value="<?=$lugar[$l];?>/<?=$coor[$l];?>"><?=$lugar[$l];?>
<?};?>
</select></td></tr>-->
</table>
<input class="envio" type="submit" name="enviar" value="enviar">
</form>





<?
}else{;
?>

Por favor pulse en inicio para volver a la página inicial<br>
<a href="index.html">Inicio</a>
<?};?>

</body>
</html>