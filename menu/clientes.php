<?
$sql="select * from clientes where idclientes='".$idcli."' and idempresas='".$ide."'";
$result=mysql_query ($sql) or die ("Invalid result menuinforme");
$e1=mysql_result($result,0,'entrada');
$e2=mysql_result($result,0,'incidencia');
//$e3=mysql_result($result,0,'mensaje');
//$e4=mysql_result($result,0,'alarma');
$e5=mysql_result($result,0,'accdiarias');

$e6=mysql_result($result,0,'accmantenimiento');

$e7=mysql_result($result,0,'niveles');

$e8=mysql_result($result,0,'productos');

$e9=mysql_result($result,0,'revision');

$e10=mysql_result($result,0,'trabajo');
?>

<li><a>CLIENTES</a>
		
				<ul>
				      <?if ($e1=='1'){;?><li><a href="clientes/entrada.php" target="principal">ENTRADA / SALIDA</a></li><?};?>
		<?if ($e2=='1'){;?><li><a href="clientes/incidencia.php" target="principal">INCIDENCIA</a></li><?};?>
		<?if ($e3=='1'){;?><li><a href="clientes/mensaje.php" target="principal">MENSAJE</a></li><?};?>		
		<?if ($e4=='1'){;?><li><a href="clientes/alarma.php" target="principal">ALARMA</a></li><?};?>
		<?if ($e5=='1'){;?><li><a href="clientes/acc_diarias.php" target="principal">ACCIONES DIARIAS</a></li><?};?>		<?if ($e6=='1'){;?><li><a href="clientes/acc_mantenimiento.php" target="principal">ACCIONES MANTENIMIENTO</a></li><?};?>
		<?if ($e7=='1'){;?><li><a href="clientes/niveles.php" target="principal">NIVELES</a></li><?};?>	
		<?if ($e8=='1'){;?><li><a href="clientes/productos.php" target="principal">PRODUCTOS</a></li><?};?>
		<?if ($e9=='1'){;?><li><a href="clientes/revision.php" target="principal">REVISION</a></li><?};?>
		<?if ($e10=='1'){;?><li><a href="clientes/trabajo.php" target="principal">TRABAJO</a></li><?};?>
		

				</ul>
</li>