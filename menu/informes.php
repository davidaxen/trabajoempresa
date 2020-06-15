<?
$sql="select * from menuinforme where user='".$user."' and idempresa='".$ide."'";
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
$e11=mysql_result($result,0,'siniestro');
$e12=mysql_result($result,0,'control');
?>

<li><a>INFORMES</a>
		
				<ul>
				      <?if ($e1=='1'){;?><li><a href="servicios/entrada/infpuntcont.php" target="principal">ENTRADA / SALIDA</a></li><?};?>
		<?if ($e2=='1'){;?><li><a href="servicios/incidencia/infpuntcont.php" target="principal">INCIDENCIA</a></li><?};?>
		<?if ($e3=='1'){;?><li><a href="servicios/mensaje/infpuntcont.php" target="principal">MENSAJE</a></li><?};?>		
		<?if ($e4=='1'){;?><li><a href="servicios/alarma/infpuntcont.php" target="principal">ALARMA</a></li><?};?>
		<?if ($e5=='1'){;?><li><a href="servicios/accdiarias/infpuntcont.php" target="principal">ACCIONES DIARIAS</a></li><?};?>		<?if ($e6=='1'){;?><li><a href="servicios/accmantenimiento/infpuntcont.php" target="principal">ACCIONES MANTENIMIENTO</a></li><?};?>
		<?if ($e7=='1'){;?><li><a href="servicios/niveles/infpuntcont.php" target="principal">NIVELES</a></li><?};?>	
		<?if ($e8=='1'){;?><li><a href="servicios/productos/infpuntcont.php" target="principal">PRODUCTOS</a></li><?};?>
		<?if ($e9=='1'){;?><li><a href="servicios/pcontrol/infpuntcont.php" target="principal">PUNTOS DE CONTROL</a></li><?};?>
		<?if ($e10=='1'){;?><li><a href="servicios/trabajo/infpuntcont.php" target="principal">TRABAJO</a></li><?};?>
		<?if ($e11=='1'){;?><li><a href="servicios/siniestro/infpuntcont.php" target="principal">SINIESTRO</a></li><?};?>		
		<?if ($e12=='1'){;?><li><a href="servicios/control/infpuntcont.php" target="principal">CONTROL</a></li><?};?>	
		<li><a href="servicios/uso/infpuntcont.php" target="principal">USO</a></li>
		<li><a href="servicios/empleados/infpuntcont.php" target="principal">EMPLEADOS</a></li>

				</ul>
</li>