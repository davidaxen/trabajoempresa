<?
$sql="select * from empleados where nif='".$user."' and idempresa='".$ide."'";
$result=mysql_query ($sql) or die ("Invalid result menuinforme");
$e1=mysql_result($result,0,'entrada');
$e2=mysql_result($result,0,'incidencia');
$e3=mysql_result($result,0,'mensajes');
$e4=mysql_result($result,0,'alarmas');
$e5=mysql_result($result,0,'accdiarias');

$e6=mysql_result($result,0,'accmantenimiento');

$e7=mysql_result($result,0,'niveles');

$e8=mysql_result($result,0,'productos');

$e9=mysql_result($result,0,'revision');

$e10=mysql_result($result,0,'trabajo');
?>

<li><a>TRABAJADOR</a>
		
				<ul>
		<li><a href="trabajador/cuadrante.php" target="principal">CUADRANTE</a></li>		      <?if ($e1==1){;?><li><a href="trabajador/entrada.php" target="principal">ENTRADA / SALIDA</a></li><?};?>
		<?if ($e3==1){;?><li><a href="trabajador/mensaje.php" target="principal">MENSAJE</a></li><?};?>

				</ul>
</li>