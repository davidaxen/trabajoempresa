<?
$sql="select * from menuservicios where user='".$user."' and idempresa='".$ide."'";
$result=mysql_query ($sql) or die ("Invalid result menuinforme");
$e1=mysql_result($result,0,'entrada');
$e2=mysql_result($result,0,'incidencia');
$e3=mysql_result($result,0,'mensaje');
$e4=mysql_result($result,0,'alarma');
$e5=mysql_result($result,0,'accdiarias');

$e6=mysql_result($result,0,'accmantenimiento');

$e7=mysql_result($result,0,'niveles');

$e8=mysql_result($result,0,'productos');

$e9=mysql_result($result,0,'revision');

$e10=mysql_result($result,0,'trabajo');

$e11=mysql_result($result,0,'cuadrante');
$e12=mysql_result($result,0,'siniestro');
$e13=mysql_result($result,0,'control');
?>

<li><a>SERVICIOS</a>
		
				<ul>
				      <!--<?if ($e1=='1'){;?><li><a href="servicios/entrada/dpuntcont.php" target="principal">ENTRADA / SALIDA</a></li><?};?>-->
		<!--<?if ($e2=='1'){;?><li><a href="servicios/incidencia.php" target="principal">INCIDENCIA</a></li><?};?>-->
		<?if ($e3=='1'){;?><li><a href="servicios/mensaje/dpuntcont.php" target="principal">MENSAJE</a></li><?};?>		
		<?if ($e4=='1'){;?><li><a href="servicios/alarma/dpuntcont.php" target="principal">ALARMA</a></li><?};?>
		<?if ($e5=='1'){;?><li><a href="servicios/accdiarias/dpuntcont.php" target="principal">ACCIONES DIARIAS</a></li><?};?>		<?if ($e6=='1'){;?><li><a href="servicios/accmantenimiento/dpuntcont.php" target="principal">ACCIONES MANTENIMIENTO</a></li><?};?>
		<?if ($e7=='1'){;?><li><a href="servicios/niveles/dpuntcont.php" target="principal">NIVELES</a></li><?};?>	
		<?if ($e8=='1'){;?><li><a href="servicios/productos/dpuntcont.php" target="principal">PRODUCTOS</a></li><?};?>
		<?if ($e9=='1'){;?><li><a href="servicios/pcontrol/dpuntcont.php" target="principal">PUNTOS DE CONTROL</a></li><?};?>
		<?if ($e10=='1'){;?><li><a href="servicios/trabajo/dpuntcont.php" target="principal">TRABAJO</a></li><?};?>
		<?if ($e11=='1'){;?><li><a href="servicios/cuadrante/cuadrante.php" target="principal">CUADRANTE</a></li><?};?>
		<?if ($e12=='1'){;?><li><a href="servicios/siniestro/dpuntcont.php" target="principal">REPARACIONES / SINIESTROS</a></li><?};?>		
		<?if ($e13=='1'){;?><li><a href="servicios/control/dpuntcont.php" target="principal">CONTROL DE ACCESO</a></li><?};?>
				</ul>
</li>