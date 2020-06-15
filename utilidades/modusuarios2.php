<html>
<head>
<title>Listado de Usuarios</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('../bbdd/sqlfacturacion.php');
?>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">MODIFICACION DE USUARIOS</td></tr>

</table>



<?
if ($ide!=null){;

$sql0="update usuarios set";
$sql1="where idempresas='".$ide."' and user='".$user1."'";

$valor1=array ('trabajadores','verpuntcont','facturacion','empleados','contabilidad','utilidades','existencias','personalizado','datoslateral');
$valor2=array ($trabant,$verpant,$factant,$emplant,$contant,$utilant,$exisant,$persant,$datoant);
$valor3=array ($trab,$verp,$fact,$empl,$cont,$util,$exis,$pers,$dato);

for ($k=0;$k<count($valor1);$k++){;
if ($valor2[$k]!=$valor3[$k]){;
$sqla=" ".$valor1[$k]."='".$valor3[$k]."' ";
$sql=$sql0.$sqla.$sql1;
//echo $sql;
$resultd=mysql_query ($sql) or die ("Invalid result caract");
};

};




?>
<form method="post" action="modusuarios3.php">
<input type="hidden" name="user1" value="<?=$user1;?>">
<table><tr class="subenc"><td>Cod Usuario</td><td><?=$user1;?></td></tr></table>



<?if ($fact!=0){;
$sql="SELECT * from menufacturacion where idempresa='".$ide."' and user='".$user1."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
$campfact= array ('clientes','proveedores','facturas','albaran','facturasrecibidas','hacienda','banco');
if($row!=0){;
for($j=0;$j<count($campfact);$j++){;
$datofactant[$j]=mysql_result($result,0,$campfact[$j]);?>
<input type="hidden" name="campfact[<?=$j;?>]" value="<?=$campfact[$j];?>">
<input type="hidden" name="datofactant[<?=$j;?>]" value="<?=$datofactant[$j];?>">
<?};
};?>

<table>
<tr><td><b>Menu Facturacion</b></td></tr>
</table>
<table>
<tr><td>Acciones\Apartados</td><td>Clientes</td><td>Proveedores</td><td>Facturacion</td><td>Albaran</td><td>Facturas recibidas</td><td>Hacienda</td><td>Banco</td></tr>
<tr><td>Inactivo</td>
<?for($j=0;$j<count($campfact);$j++){;?>
<td><input type="radio" name="datofactact[<?=$j;?>]" value="0" <?if ($datofactant[$j]==0){;?>checked<?}?>></td>
<?};?>
</tr>
<tr><td>Activo</td>
<?for($j=0;$j<count($campfact);$j++){;?>
<td><input type="radio" name="datofactact[<?=$j;?>]" value="1" <?if ($datofactant[$j]==1){;?>checked<?}?>></td>
<?};?>
</tr>
</table>
<table>
<tr><td><u>Tipos de Facturas</u></td></tr>
</table>

<?
$campfact2= array ('facturasa','facturasb','facturasc','facturasd');
for($j=0;$j<count($campfact2);$j++){;
$datofact2ant[$j]=mysql_result($result,0,$campfact2[$j]);?>
<input type="hidden" name="campfact2[<?=$j;?>]" value="<?=$campfact2[$j];?>">
<input type="hidden" name="datofact2ant[<?=$j;?>]" value="<?=$datofact2ant[$j];?>">
<?};?>

<table>
<tr><td>Acciones\Apartados</td><td>Grupal</td><td>Por Producto</td><td>Para Alquiler</td><td>Personales</td></tr>
<tr><td>Inactivo</td>
<?for($j=0;$j<count($campfact2);$j++){;?>
<td><input type="radio" name="datofact2act[<?=$j;?>]" value="0" <?if ($datofact2ant[$j]==0){;?>checked<?}?>></td>
<?};?>
<tr><td>Activo</td>
<?for($j=0;$j<count($campfact2);$j++){;?>
<td><input type="radio" name="datofact2act[<?=$j;?>]" value="1" <?if ($datofact2ant[$j]==1){;?>checked<?}?>></td>
<?};?>
</table>
<?};?>


<?if ($empl!=0){;
$sql="SELECT * from menuempleados where idempresa='".$ide."' and user='".$user1."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
$campempl= array ('empleado','recibos','anticipos','nominas','liquidacion','ficheros','certificados','irpf','segsocial','vacaciones','cuadrantes','ropa');
if($row!=0){;
for($j=0;$j<count($campempl);$j++){;
$datoemplant[$j]=mysql_result($result,0,$campempl[$j]);?>
<input type="hidden" name="campempl[<?=$j;?>]" value="<?=$campempl[$j];?>">
<input type="hidden" name="datoemplant[<?=$j;?>]" value="<?=$datoemplant[$j];?>">
<?};
};?>

<table>
<tr><td><b>Menu Empleados</b></td></tr>
</table>
<table>
<tr><td>Acciones\Apartados</td>
<td>Empleado</td><td>Recibos</td><td>Anticipos</td><td>Nominas</td>
<td>Liquid</td><td>Ficheros</td><td>Certif</td><td>IRPF</td>
<td>Seg Social</td><td>Vacac</td><td>Cuadrantes</td><td>Ropa</td>
</tr>
<tr><td>Inactivo</td>
<?for($j=0;$j<count($campempl);$j++){;?>
<td><input type="radio" name="datoemplact[<?=$j;?>]" value="0" <?if ($datoemplant[$j]==0){;?>checked<?}?>></td>
<?};?>
</tr>
<tr><td>Activo</td>
<?for($j=0;$j<count($campempl);$j++){;?>
<td><input type="radio" name="datoemplact[<?=$j;?>]" value="1" <?if ($datoemplant[$j]==1){;?>checked<?}?>></td>
<?};?>
</tr>
<?};?>



<?if ($cont!=0){;
$sql="SELECT * from menucontabilidad where idempresa='".$ide."' and user='".$user1."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
$campcont= array ('cobros','pagos','recibos','asientos','listados','informes');
if($row!=0){;
for($j=0;$j<count($campcont);$j++){;
$datocontant[$j]=mysql_result($result,0,$campcont[$j]);?>
<input type="hidden" name="campcont[<?=$j;?>]" value="<?=$campcont[$j];?>">
<input type="hidden" name="datocontant[<?=$j;?>]" value="<?=$datocontant[$j];?>">
<?};
};?>

<table>
<tr><td><b>Menu Contabilidad</b></td></tr>
</table>
<table>
<tr><td>Acciones\Apartados</td>
<td>Cobros</td><td>Pagos</td><td>Recibos</td><td>Asientos</td>
<td>Listados</td><td>Informes</td>
</tr>
<tr><td>Inactivo</td>
<?for($j=0;$j<count($campcont);$j++){;?>
<td><input type="radio" name="datocontact[<?=$j;?>]" value="0" <?if ($datocontant[$j]==0){;?>checked<?}?>></td>
<?};?>
</tr>
<tr><td>Activo</td>
<?for($j=0;$j<count($campcont);$j++){;?>
<td><input type="radio" name="datocontact[<?=$j;?>]" value="1" <?if ($datocontant[$j]==1){;?>checked<?}?>></td>
<?};?>
</tr>
<?};?>



<?if ($util!=0){;
$sql="SELECT * from menuutilidades where idempresa='".$ide."' and user='".$user1."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
$camputil= array ('fax','etiquetas','sobres','calendariolaboral','publicidad','usuarios');
if($row!=0){;
for($j=0;$j<count($camputil);$j++){;
$datoutilant[$j]=mysql_result($result,0,$camputil[$j]);?>
<input type="hidden" name="camputil[<?=$j;?>]" value="<?=$camputil[$j];?>">
<input type="hidden" name="datoutilant[<?=$j;?>]" value="<?=$datoutilant[$j];?>">
<?};
};?>

<table>
<tr><td><b>Menu Utilidades</b></td></tr>
</table>
<table>
<tr><td>Acciones\Apartados</td>
<td>Fax</td><td>Etiquetas</td><td>Sobres</td><td>Calendario Laboral</td>
<td>Publicidad</td><td>Usuarios</td>
</tr>
<tr><td>Inactivo</td>
<?for($j=0;$j<count($camputil);$j++){;?>
<td><input type="radio" name="datoutilact[<?=$j;?>]" value="0" <?if ($datoutilant[$j]==0){;?>checked<?}?>></td>
<?};?>
</tr>
<tr><td>Activo</td>
<?for($j=0;$j<count($camputil);$j++){;?>
<td><input type="radio" name="datoutilact[<?=$j;?>]" value="1" <?if ($datoutilant[$j]==1){;?>checked<?}?>></td>
<?};?>

</tr>
<?};?>


<?if ($exis!=0){;
$sql="SELECT * from menuexistencias where idempresa='".$ide."' and user='".$user1."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
$campexis= array ('materiales','herramientas','vestuario');
if($row!=0){;
for($j=0;$j<count($campexis);$j++){;
$datoexisant[$j]=mysql_result($result,0,$campexis[$j]);?>
<input type="hidden" name="campexis[<?=$j;?>]" value="<?=$campexis[$j];?>">
<input type="hidden" name="datoexisant[<?=$j;?>]" value="<?=$datoexisant[$j];?>">
<?};
};?>

<table>
<tr><td><b>Menu Existencias</b></td></tr>
</table>
<table>
<tr><td>Acciones\Apartados</td>
<td>Materiales</td><td>Herramientas</td><td>Vestuario</td>
</tr>
<tr><td>Inactivo</td>
<?for($j=0;$j<count($campexis);$j++){;?>
<td><input type="radio" name="datoexisact[<?=$j;?>]" value="0" <?if ($datoexisant[$j]==0){;?>checked<?}?>></td>
<?};?>
</tr>
<tr><td>Activo</td>
<?for($j=0;$j<count($campexis);$j++){;?>
<td><input type="radio" name="datoexisact[<?=$j;?>]" value="1" <?if ($datoexisant[$j]==1){;?>checked<?}?>></td>
<?};?>
</tr>
<?};?>


<?if ($pers!=0){;
$sql="SELECT * from menupersonalizados where idempresa='".$ide."' and user='".$user1."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
$camppers= array ('documentos','piscinas','pcontrol','carnet','contratos','asignacion','candidatos','precios','presupuesto','datos');
if($row!=0){;
for($j=0;$j<count($camppers);$j++){;
$datopersant[$j]=mysql_result($result,0,$camppers[$j]);?>
<input type="hidden" name="camppers[<?=$j;?>]" value="<?=$camppers[$j];?>">
<input type="hidden" name="datopersant[<?=$j;?>]" value="<?=$datopersant[$j];?>">
<?};
};?>

<table>
<tr><td><b>Menu Personalzados</b></td></tr>
</table>
<table>
<tr><td>Acciones\Apartados</td>
<td>Documentos</td><td>Piscinas</td><td>Puntos Control</td>
<td>Carnet</td><td>Contratos</td><td>Asignacion</td>
<td>Candidatos</td><td>Precios</td><td>Presupuestos</td><td>Datos</td>
</tr>
<tr><td>Inactivo</td>
<?for($j=0;$j<count($camppers);$j++){;?>
<td><input type="radio" name="datopersact[<?=$j;?>]" value="0" <?if ($datopersant[$j]==0){;?>checked<?}?>></td>
<?};?>
</tr>
<tr><td>Activo</td>
<?for($j=0;$j<count($camppers);$j++){;?>
<td><input type="radio" name="datopersact[<?=$j;?>]" value="1" <?if ($datopersant[$j]==1){;?>checked<?}?>></td>
<?};?>
</tr>
<?};?>





<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
</table>



<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://facturacion.piscisol.com">aquí</a>

<?};?>
</body>
</html>





