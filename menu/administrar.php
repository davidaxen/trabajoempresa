		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
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

<li><a href="#">Administrar</a>
		
				<ul>
				      <?if ($e4=='1'){;?>          
				      <li><a href="/administracion_n/dempresa.php">Empresas</a>
    	
						<!--				      
				      <ul>							
				      <li><a href="/administracion_n/iempresa.php">Alta</a></li>							
				      <li><a href="/administracion_n/mempresa.php">Modificación</a></li>							
				      <li><a href="/administracion_n/lempresa.php">Listado</a></li>						
				      </ul>         
				      -->
				      </li>		
				      <?};?>
		


        <?if ($e1=='1'){;?>          
        <li><a href="/facturacion_n/dclientes.php">Puestos de Trabajo</a>
        <!--
         		   <ul>
         		   <li><a href="/facturacion_n/iclientes.php">Alta</a></li>							
         		   <li><a href="/facturacion_n/mclientes.php">Modificación</a></li>							
         		   <li><a href="/facturacion_n/lclientes.php">Listado</a></li>	
         		   <li><a href="/facturacion_n/contpisc.php">Códigos</a></li>	
         		   <li><a href="#">Jornadas</a>
         		   		<ul>
         		   			<li><a href="/facturacion_n/jclientes.php">Alta</a></li>
         		   			<li><a href="/facturacion_n/mjclientes.php">Modificación</a></li>
									<li><a href="/facturacion_n/ljclientes.php">Listado</a></li>
         		   		</ul>
         		   </li>	
         		   					
         		   </ul>  
         		   -->        
         		   </li>		
         		   <?};?>      
      <?if ($e2=='1'){;?>          
      <li><a href="/empleados_n/dtrabajadores.php">Empleados</a>
       	
      <!--
      <ul>							
      <li><a href="/empleados_n/iempleados.php">Alta</a></li>							
      <li><a href="/empleados_n/mempleados.php">Modificación</a></li>							
      <li><a href="/empleados_n/lempleados.php">Listado</a></li>
      <li><a href="/empleados_n/lempleados.php?tipo=alta&estado=1&ano=todos&smart=si">Códigos</a></li>	
      </ul>
      -->          
      </li>		
      <?};?>
	      
      <?if ($e3=='1'){;?>          
      <li><a href="/facturacion_n/dgestores.php">Gestores</a> 
	         	
<!--      
      <ul>							
      <li><a href="/facturacion_n/igestores.php">Alta</a></li>							
      <li><a href="/facturacion_n/mgestores.php">Modificación</a></li>							
      <li><a href="/facturacion_n/lgestores.php">Listado</a></li>						
      </ul>          
-->
      </li>		
      <?};?>
	      
      <?if ($e5=='5'){;?>
      <li><a href="/administracion_n/modempresa2.php?idempresas=<?=$ide;?>">EMPRESA</a></li>
      <?};?>
      
      <?if ($e6=='1'){;?>          
      <li><a href="/administracion_n/dusuario.php">Administradores</a>
	         	
<!--      
      <ul>							
      <li><a href="/administracion_n/iusuario.php">Crear</a></li>							
      <li><a href="/administracion_n/musuario.php">Modificación</a></li>							
      <li><a href="/administracion_n/lusuario.php">Listado</a></li>						
      </ul>          
-->    
      </li>		
      <?};?>		
      <?if ($e7=='1'){;?>
      <li><a href="/administracion_n/visitas.php">Visita</a></li>
      <?};?>

</ul></li>