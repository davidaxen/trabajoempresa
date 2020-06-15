<?
/*include('bbdd.php');*/

$sql1="select * from usuarios where user='".$user."' and password='".$pass."'"; 
//echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result empresas 1");

$admi=mysql_result($result1,0,'administracion');
$serv=mysql_result($result1,0,'servicios');
$info=mysql_result($result1,0,'informes');
$docu=mysql_result($result1,0,'documentacion');
$trab=mysql_result($result1,0,'trabajador');
$cli=mysql_result($result1,0,'cliente');
$ges=mysql_result($result1,0,'gestor');
?>
   <ul id="nav">
<!-- ADMINISTRACION --><?if ($admi=="1"){?><? include('administrar.php');?><?};?><!-- FIN ADMINISTRACION -->
<!-- SERVICIOS --><?if ($serv=="1"){?><? include('generador.php');?><?};?><!-- FIN SERVICIOS -->	
<!-- DOCUMENTACION --><?if ($docu=="1"){?><?/* include('documentacion.php');*/?><?};?><!-- FIN DOCUMENTACION -->	
<!-- HERRAMIENTAS --><?if ($info=="1"){?><? include('herramientas.php');?><?};?><!-- FIN HERRAMIENTAS -->
<!-- MI CUENTA --><?if ($info=="1"){?><? include('micuenta.php');?><?};?><!-- FIN MI CUENTA -->
<!-- AYUDA --><?if ($info=="1"){?><? include('ayuda.php');?><?};?><!-- FIN AYUDA -->
<!-- TRABAJADORES --><?if ($trab=="1"){?><? include('trabajador.php');?><?};?><!-- FIN TRABAJADORES -->
<!-- CLIENTES --><?if ($cli=="1"){?><? include('clientes.php');?><?};?><!-- FIN CLIENTES -->	
<!-- GESTORES --><?if ($ges=="1"){?><? include('gestores.php');?><?};?><!-- FIN GESTORES -->	
</ul>
