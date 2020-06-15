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
$e14=mysql_result($result,0,'mediciones');
?>

<li><a href="#">Generador</a>
		
				<ul>
	   <?if ($e1=='1'){;?><li><a href="/servicios_n/entrada/dpuntcont.php">Entrada/Salida</a></li><?};?>
		<!--<?if ($e2=='1'){;?><li><a href="servicios/incidencia.php" target="principal">INCIDENCIA</a></li><?};?>-->
		<?if ($e5=='1'){;?><li><a href="/servicios_n/accdiarias/dpuntcont.php">Tareas Habituales</a></li><?};?>
		<?if ($e6=='1'){;?><li><a href="/servicios_n/accmantenimiento/dpuntcont.php">Tareas Adicionales</a></li><?};?>	
		<?if ($e4=='1'){;?><li><a href="/servicios_n/alarma/dpuntcont.php">Alarmas</a></li><?};?>
		<?if ($e7=='1'){;?><li><a href="/servicios_n/niveles/dpuntcont.php">Parametros</a></li><?};?>	
		<?if ($e8=='1'){;?><li><a href="/servicios_n/productos/dpuntcont.php">Existencias</a></li><?};?>
		<?if ($e9=='1'){;?><li><a href="/servicios_n/pcontrol/dpuntcont.php">Circuito</a></li><?};?>
		<?if ($e10=='1'){;?><li><a href="/servicios_n/trabajo/dpuntcont.php">Trabajo</a></li><?};?>
		<!--<?if ($e11=='1'){;?><li><a href="/servicios_n/cuadrante/cuadrante.php">Cuadrante</a></li><?};?>-->
		<?if ($e12=='1'){;?><li><a href="/servicios_n/siniestro/dpuntcont.php">Ordenes</a></li><?};?>		
		<?if ($e13=='1'){;?><li><a href="/servicios_n/control/dpuntcont.php">Eventos</a></li><?};?>
      <?if ($e14=='1'){;?><li><a href="/servicios_n/mediciones/dpuntcont.php">Lecturas</a></li><?};?>
				</ul>
</li>