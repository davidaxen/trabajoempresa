<?
$sql="select * from empresas where idempresas='".$ide."'";
$result=mysql_query ($sql) or die ("Invalid result empresas");
$e1=mysql_result($result,0,'revision');
$e2=mysql_result($result,0,'control');
?>

<li><a>DOCUMENTACION</a>
		
 		         	<ul>							
 		         	<li><a href="facturacion/contpisc.php" target="principal">CLIENTES</a></li>							
 		         	<li><a href="empleados/lempleados.php?tipo=alta&estado=1&ano=todos&smart=si" target="principal">EMPLEADOS</a></li>							
 		         	<?if ($e1==1){;?><li><a href="servicios/pcontrol/lpuntcont.php" target="principal">PUNTOS DE CONTROL</a></li><?};?>						
						<?if ($e1==2){;?><li><a href="servicios/control/lpuntcont.php" target="principal">CONTROL</a></li><?};?>						
						</ul>


</li>