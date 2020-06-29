		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
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

<li><a href="#">Herramientas</a>
		
				<ul>
						<li><a href="/facturacion_n/djornada.php">Jornadas</a>
         		   		<!--
         		   		<ul>
         		   			<li><a href="/facturacion_n/jclientes.php">Alta</a></li>
         		   			<li><a href="/facturacion_n/mjclientes.php">Modificación</a></li>
									<li><a href="/facturacion_n/ljclientes.php">Listado</a></li>
         		   		</ul>
								-->
         		   </li>	
		<?if ($e11=='1'){;?><li><a href="/servicios_n/cuadrante/cuadrante.php">Cuadrante</a></li><?};?>

		<li><a href="/servicios_n/incidencia/infpuntcont.php">Incidencias</a></li>
		<li><a href="/servicios_n/mensaje/dmensaje.php">Mensajes</a>
		<!--
				<ul>
				<li><a href="/servicios_n/mensaje/dpuntcont.php">Creación</a></li>	
				<li><a href="/servicios_n/mensaje/infpuntcont1.php">Seguimiento</a></li>	
				<li><a href="/servicios_n/mensaje/infpuntcont.php">Enviados a Trabajador</a></li>
				<li><a href="/servicios_n/mensaje/infpuntcont2.php">Enviados por Fecha</a></li>
				</ul>		
		-->
			</li>	
		<li><a href="/servicios_n/informe/infpuntcont.php">Informes</a></li>
         		   

				</ul>
</li>