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



      <?if ($e5=='1'){;?>
      <?if ($estadoemp=='1'){;?>
            <li><a href="/administracion_n/modempresa2.php?idempresas=<?=$ide;?>">Mi Cuenta</a></li>
		<?};?>
		 <?if ($estadoemp=='2'){;?>
            <li><a href="/administracion_n/modempresav2.php?idempresas=<?=$ide;?>">Mi Cuenta</a></li>
      <?};?>

      <?};?>