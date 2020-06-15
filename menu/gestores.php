<?/*
$sql="select * from menuinforme where user='".$user."' and idempresa='".$ide."'";
$result=mysql_query ($sql) or die ("Invalid result menuinforme");
$e1=mysql_result($result,0,'entrada');
$e2=mysql_result($result,0,'incidencia');
$e3=mysql_result($result,0,'mensaje');
$e4=mysql_result($result,0,'alarma');
$e5=mysql_result($result,0,'acc_diarias');

$e6=mysql_result($result,0,'acc_mantenimiento');

$e7=mysql_result($result,0,'niveles');

$e8=mysql_result($result,0,'productos');

$e9=mysql_result($result,0,'revision');

$e10=mysql_result($result,0,'trabajo');
*/
$e1="1";
?>

<li><a>GESTORES</a>
		
				<ul>
				      <?if ($e1=='1'){;?><li><a href="gestores/entrada.php" target="principal">ENTRADA / SALIDA</a></li><?};?>
		<?if ($e1=='1'){;?><li><a href="gestores/incidencia.php" target="principal">INCIDENCIA</a></li><?};?>
		<?if ($e2=='1'){;?><li><a href="gestores/mensaje.php" target="principal">MENSAJE</a></li><?};?>		
		<?if ($e2=='1'){;?><li><a href="gestores/alarma.php" target="principal">ALARMA</a></li><?};?>
		<?if ($e1=='1'){;?><li><a href="gestores/acc_diarias.php" target="principal">ACCIONES DIARIAS</a></li><?};?>		<?if ($e1=='1'){;?><li><a href="gestores/acc_mantenimiento.php" target="principal">ACCIONES MANTENIMIENTO</a></li><?};?>
		<?if ($e1=='1'){;?><li><a href="gestores/niveles.php" target="principal">NIVELES</a></li><?};?>	
		<?if ($e1=='1'){;?><li><a href="gestores/productos.php" target="principal">PRODUCTOS</a></li><?};?>
		<?if ($e2=='1'){;?><li><a href="gestores/trabajo.php" target="principal">TRABAJO</a></li><?};?>
		

				</ul>
</li>