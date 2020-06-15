<?
$sql="select * from menuadministracion where user='".$user."' and idempresa='".$ide."'";
$result=mysql_query ($sql) or die ("Invalid result menuempleados");
$e1=mysql_result($result,0,'clientes');
$e2=mysql_result($result,0,'empleados');
$e3=mysql_result($result,0,'gestores');
$e4=mysql_result($result,0,'empresas');
$e5=mysql_result($result,0,'empresa');

$e6=mysql_result($result,0,'usuario');

$e7=mysql_result($result,0,'visita');
?>

<li><a>ADMINISTRACION</a>
		
				<ul>
				      <?if ($e4=='1'){;?>          <li><a>EMPRESAS >></a> 		         	<ul>							<li><a href="administracion/iempresa.php" target="principal">ALTA</a></li>							<li><a href="administracion/mempresa.php" target="principal">MODIFICACION</a></li>							<li><a href="administracion/lempresa.php" target="principal">LISTADO</a></li>						</ul>          </li>		<?};?>
		


        <?if ($e1=='1'){;?>          <li><a>PUESTOS DE TRABAJO >></a> 		         	<ul>							<li><a href="facturacion/iclientes.php" target="principal">ALTA</a></li>							<li><a href="facturacion/mclientes.php" target="principal">MODIFICACION</a></li>							<li><a href="facturacion/lclientes.php" target="principal">LISTADO</a></li>						</ul>          </li>		<?};?>      
      <?if ($e2=='1'){;?>          <li><a>EMPLEADOS >></a> 		         	<ul>							<li><a href="empleados/iempleados.php" target="principal">ALTA</a></li>							<li><a href="empleados/mempleados.php" target="principal">MODIFICACION</a></li>							<li><a href="empleados/lempleados.php" target="principal">LISTADO</a></li>						</ul>          </li>		<?};?>
	      
      <?if ($e3=='1'){;?>          <li><a>GESTORES >></a> 		         	<ul>							<li><a href="facturacion/igestores.php" target="principal">ALTA</a></li>							<li><a href="facturacion/mgestores.php" target="principal">MODIFICACION</a></li>							<li><a href="facturacion/lgestores.php" target="principal">LISTADO</a></li>						</ul>          </li>		<?};?>
	      
      <?if ($e5=='1'){;?>
      <li><a href="administracion/modempresa2.php?idempresas=<?=$ide;?>" target="principal">EMPRESA</a></li>
      <?};?>
      
      <?if ($e6=='1'){;?>          <li><a>USUARIO >></a> 		         	<ul>							<li><a href="administracion/iusuario.php" target="principal">ALTA</a></li>							<li><a href="administracion/musuario.php" target="principal">MODIFICACION</a></li>							<li><a href="administracion/lusuario.php" target="principal">LISTADO</a></li>						</ul>          </li>		<?};?>		
      <?if ($e7=='1'){;?>
      <li><a href="administracion/visitas.php" target="principal">VISITA</a></li>
      <?};?>

</ul></li>