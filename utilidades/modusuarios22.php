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
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">LISTADO DE USUARIOS</td></tr>

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
echo $sql;
//$resultd=mysql_query ($sql) or die ("Invalid result caract");
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
if($row!=0){;
$clie=mysql_result($result,0,'clientes');
$prov=mysql_result($result,0,'proveedores');
$fact1=mysql_result($result,0,'facturas');
$facta=mysql_result($result,0,'facturasa');
$factb=mysql_result($result,0,'facturasb');
$factc=mysql_result($result,0,'facturasc');
$factd=mysql_result($result,0,'facturasd');
$alba=mysql_result($result,0,'albaran');
$frec=mysql_result($result,0,'facturasrecibidas');
$haci=mysql_result($result,0,'hacienda');
$banc=mysql_result($result,0,'banco');
};?>
<input type="hidden" name="clieant" value="<?=$clie;?>">
<input type="hidden" name="provant" value="<?=$prov;?>">
<input type="hidden" name="fact1ant" value="<?=$fact1;?>">
<input type="hidden" name="factaant" value="<?=$facta;?>">
<input type="hidden" name="factbant" value="<?=$factb;?>">
<input type="hidden" name="factcant" value="<?=$factc;?>">
<input type="hidden" name="factdant" value="<?=$factd;?>">
<input type="hidden" name="albaant" value="<?=$alba;?>">
<input type="hidden" name="frecant" value="<?=$frec;?>">
<input type="hidden" name="haciant" value="<?=$haci;?>">
<input type="hidden" name="bancant" value="<?=$banc;?>">
<table>
<tr><td><b>Menu Facturacion</b></td></tr>
</table>
<table>
<tr><td>Acciones\Apartados</td><td>Clientes</td><td>Proveedores</td><td>Facturacion</td><td>Albaran</td><td>Facturas recibidas</td><td>Hacienda</td><td>Banco</td></tr>
<tr><td>Inactivo</td>
<td><input type="radio" name="clie" value="0" <?if ($clie==0){;?>checked<?}?>></td>
<td><input type="radio" name="prov" value="0" <?if ($prov==0){;?>checked<?}?>></td>
<td><input type="radio" name="fact1" value="0" <?if ($fact1==0){;?>checked<?}?>></td>
<td><input type="radio" name="alba" value="0" <?if ($alba==0){;?>checked<?}?>></td>
<td><input type="radio" name="frec" value="0" <?if ($frec==0){;?>checked<?}?>></td>
<td><input type="radio" name="haci" value="0" <?if ($haci==0){;?>checked<?}?>></td>
<td><input type="radio" name="banc" value="0" <?if ($banc==0){;?>checked<?}?>></td></tr>
<tr><td>Activo</td>
<td><input type="radio" name="clie" value="0" <?if ($clie==1){;?>checked<?}?>></td>
<td><input type="radio" name="prov" value="0" <?if ($prov==1){;?>checked<?}?>></td>
<td><input type="radio" name="fact1" value="0" <?if ($fact1==1){;?>checked<?}?>></td>
<td><input type="radio" name="alba" value="0" <?if ($alba==1){;?>checked<?}?>></td>
<td><input type="radio" name="frec" value="0" <?if ($frec==1){;?>checked<?}?>></td>
<td><input type="radio" name="haci" value="0" <?if ($haci==1){;?>checked<?}?>></td>
<td><input type="radio" name="banc" value="0" <?if ($banc==1){;?>checked<?}?>></td></tr>
<?};?>



<?if ($empl!=0){;
$sql="SELECT * from menuempleados where idempresa='".$ide."' and user='".$user1."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
if($row!=0){;
$empl1=mysql_result($result,0,'empleado');
$reci=mysql_result($result,0,'recibos');
$anti=mysql_result($result,0,'anticipos');
$nomi=mysql_result($result,0,'nominas');
$liqu=mysql_result($result,0,'liquidacion');
$fich=mysql_result($result,0,'ficheros');
$cert=mysql_result($result,0,'certificados');
$irpf=mysql_result($result,0,'irpf');
$segs=mysql_result($result,0,'segsocial');
$vaca=mysql_result($result,0,'vacaciones');
$cuad=mysql_result($result,0,'cuadrantes');
$ropa=mysql_result($result,0,'ropa');
};?>
<input type="hidden" name="empl1ant" value="<?=$empl1;?>">
<input type="hidden" name="reciant" value="<?=$reci;?>">
<input type="hidden" name="antiant" value="<?=$anti;?>">
<input type="hidden" name="nomiant" value="<?=$nomi;?>">
<input type="hidden" name="liquant" value="<?=$liqu;?>">
<input type="hidden" name="fichant" value="<?=$fich;?>">
<input type="hidden" name="certant" value="<?=$cert;?>">
<input type="hidden" name="irpfant" value="<?=$irpf;?>">
<input type="hidden" name="segsant" value="<?=$segs;?>">
<input type="hidden" name="vacaant" value="<?=$vaca;?>">
<input type="hidden" name="cuadant" value="<?=$cuad;?>">
<input type="hidden" name="ropaant" value="<?=$ropa;?>">
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
<td><input type="radio" name="empl1" value="0" <?if ($empl1==0){;?>checked<?}?>></td>
<td><input type="radio" name="reci" value="0" <?if ($reci==0){;?>checked<?}?>></td>
<td><input type="radio" name="anti" value="0" <?if ($anti==0){;?>checked<?}?>></td>
<td><input type="radio" name="nomi" value="0" <?if ($nomi==0){;?>checked<?}?>></td>
<td><input type="radio" name="liqu" value="0" <?if ($liqu==0){;?>checked<?}?>></td>
<td><input type="radio" name="fich" value="0" <?if ($fich==0){;?>checked<?}?>></td>
<td><input type="radio" name="cert" value="0" <?if ($cert==0){;?>checked<?}?>></td>
<td><input type="radio" name="irpf" value="0" <?if ($irpf==0){;?>checked<?}?>></td>
<td><input type="radio" name="segs" value="0" <?if ($segs==0){;?>checked<?}?>></td>
<td><input type="radio" name="vaca" value="0" <?if ($vaca==0){;?>checked<?}?>></td>
<td><input type="radio" name="cuad" value="0" <?if ($cuad==0){;?>checked<?}?>></td>
<td><input type="radio" name="ropa" value="0" <?if ($ropa==0){;?>checked<?}?>></td>
</tr>
<tr><td>Activo</td>
<td><input type="radio" name="empl1" value="1" <?if ($empl1==1){;?>checked<?}?>></td>
<td><input type="radio" name="reci" value="1" <?if ($reci==1){;?>checked<?}?>></td>
<td><input type="radio" name="anti" value="1" <?if ($anti==1){;?>checked<?}?>></td>
<td><input type="radio" name="nomi" value="1" <?if ($nomi==1){;?>checked<?}?>></td>
<td><input type="radio" name="liqu" value="1" <?if ($liqu==1){;?>checked<?}?>></td>
<td><input type="radio" name="fich" value="1" <?if ($fich==1){;?>checked<?}?>></td>
<td><input type="radio" name="cert" value="1" <?if ($cert==1){;?>checked<?}?>></td>
<td><input type="radio" name="irpf" value="1" <?if ($irpf==1){;?>checked<?}?>></td>
<td><input type="radio" name="segs" value="1" <?if ($segs==1){;?>checked<?}?>></td>
<td><input type="radio" name="vaca" value="1" <?if ($vaca==1){;?>checked<?}?>></td>
<td><input type="radio" name="cuad" value="1" <?if ($cuad==1){;?>checked<?}?>></td>
<td><input type="radio" name="ropa" value="1" <?if ($ropa==1){;?>checked<?}?>></td>

</tr>
<?};?>



<?if ($cont!=0){;
$sql="SELECT * from menucontabilidad where idempresa='".$ide."' and user='".$user1."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
if($row!=0){;
$cobr=mysql_result($result,0,'cobros');
$pago=mysql_result($result,0,'pagos');
$recic=mysql_result($result,0,'recibos');
$asie=mysql_result($result,0,'asientos');
$list=mysql_result($result,0,'listados');
$info=mysql_result($result,0,'informes');
};?>
<input type="hidden" name="cobrant" value="<?=$cobr;?>">
<input type="hidden" name="pagoant" value="<?=$pago;?>">
<input type="hidden" name="recicant" value="<?=$recic;?>">
<input type="hidden" name="asieant" value="<?=$asie;?>">
<input type="hidden" name="listant" value="<?=$list;?>">
<input type="hidden" name="infoant" value="<?=$info;?>">
<table>
<tr><td><b>Menu Contabilidad</b></td></tr>
</table>
<table>
<tr><td>Acciones\Apartados</td>
<td>Cobros</td><td>Pagos</td><td>Recibos</td><td>Asientos</td>
<td>Listados</td><td>Informes</td>
</tr>
<tr><td>Inactivo</td>
<td><input type="radio" name="cobr" value="0" <?if ($cobr==0){;?>checked<?}?>></td>
<td><input type="radio" name="pago" value="0" <?if ($pago==0){;?>checked<?}?>></td>
<td><input type="radio" name="recic" value="0" <?if ($recic==0){;?>checked<?}?>></td>
<td><input type="radio" name="asie" value="0" <?if ($asie==0){;?>checked<?}?>></td>
<td><input type="radio" name="list" value="0" <?if ($list==0){;?>checked<?}?>></td>
<td><input type="radio" name="info" value="0" <?if ($info==0){;?>checked<?}?>></td>
</tr>
<tr><td>Activo</td>
<td><input type="radio" name="cobr" value="1" <?if ($cobr==1){;?>checked<?}?>></td>
<td><input type="radio" name="pago" value="1" <?if ($pago==1){;?>checked<?}?>></td>
<td><input type="radio" name="recic" value="1" <?if ($recic==1){;?>checked<?}?>></td>
<td><input type="radio" name="asie" value="1" <?if ($asie==1){;?>checked<?}?>></td>
<td><input type="radio" name="list" value="1" <?if ($list==1){;?>checked<?}?>></td>
<td><input type="radio" name="info" value="1" <?if ($info==1){;?>checked<?}?>></td>

</tr>
<?};?>



<?if ($util!=0){;
$sql="SELECT * from menuutilidades where idempresa='".$ide."' and user='".$user1."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
if($row!=0){;
$fax=mysql_result($result,0,'fax');
$etiq=mysql_result($result,0,'etiquetas');
$sobr=mysql_result($result,0,'sobres');
$cale=mysql_result($result,0,'calendariolaboral');
$publ=mysql_result($result,0,'publicidad');
$usua=mysql_result($result,0,'usuarios');
};?>
<input type="hidden" name="faxant" value="<?=$fax;?>">
<input type="hidden" name="etiqant" value="<?=$etiq;?>">
<input type="hidden" name="sobrant" value="<?=$sobr;?>">
<input type="hidden" name="caleant" value="<?=$cale;?>">
<input type="hidden" name="publant" value="<?=$publ;?>">
<input type="hidden" name="usuaant" value="<?=$usua;?>">
<table>
<tr><td><b>Menu Utilidades</b></td></tr>
</table>
<table>
<tr><td>Acciones\Apartados</td>
<td>Fax</td><td>Etiquetas</td><td>Sobres</td><td>Calendario Laboral</td>
<td>Publicidad</td><td>Usuarios</td>
</tr>
<tr><td>Inactivo</td>
<td><input type="radio" name="fax" value="0" <?if ($fax==0){;?>checked<?}?>></td>
<td><input type="radio" name="etiq" value="0" <?if ($etiq==0){;?>checked<?}?>></td>
<td><input type="radio" name="sobr" value="0" <?if ($sobr==0){;?>checked<?}?>></td>
<td><input type="radio" name="cale" value="0" <?if ($cale==0){;?>checked<?}?>></td>
<td><input type="radio" name="publ" value="0" <?if ($publ==0){;?>checked<?}?>></td>
<td><input type="radio" name="usua" value="0" <?if ($usua==0){;?>checked<?}?>></td>
</tr>
<tr><td>Activo</td>
<td><input type="radio" name="fax" value="1" <?if ($fax==1){;?>checked<?}?>></td>
<td><input type="radio" name="etiq" value="1" <?if ($etiq==1){;?>checked<?}?>></td>
<td><input type="radio" name="sobr" value="1" <?if ($sobr==1){;?>checked<?}?>></td>
<td><input type="radio" name="cale" value="1" <?if ($cale==1){;?>checked<?}?>></td>
<td><input type="radio" name="publ" value="1" <?if ($publ==1){;?>checked<?}?>></td>
<td><input type="radio" name="usua" value="1" <?if ($usua==1){;?>checked<?}?>></td>

</tr>
<?};?>


<?if ($exis!=0){;
$sql="SELECT * from menuexistencias where idempresa='".$ide."' and user='".$user1."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
if($row!=0){;
$mate=mysql_result($result,0,'materiales');
$herr=mysql_result($result,0,'herramientas');
$vest=mysql_result($result,0,'vestuario');
};?>
<input type="hidden" name="mateant" value="<?=$mate;?>">
<input type="hidden" name="herrant" value="<?=$herr;?>">
<input type="hidden" name="vestant" value="<?=$vest;?>">
<table>
<tr><td><b>Menu Existencias</b></td></tr>
</table>
<table>
<tr><td>Acciones\Apartados</td>
<td>Materiales</td><td>Herramientas</td><td>Vestuario</td>
</tr>
<tr><td>Inactivo</td>
<td><input type="radio" name="mate" value="0" <?if ($mate==0){;?>checked<?}?>></td>
<td><input type="radio" name="herr" value="0" <?if ($herr==0){;?>checked<?}?>></td>
<td><input type="radio" name="vest" value="0" <?if ($vest==0){;?>checked<?}?>></td>
</tr>
<tr><td>Activo</td>
<td><input type="radio" name="mate" value="1" <?if ($mate==1){;?>checked<?}?>></td>
<td><input type="radio" name="herr" value="1" <?if ($herr==1){;?>checked<?}?>></td>
<td><input type="radio" name="vest" value="1" <?if ($vest==1){;?>checked<?}?>></td>
</tr>
<?};?>


<?if ($pers!=0){;
$sql="SELECT * from menupersonalizados where idempresa='".$ide."' and user='".$user1."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
if($row!=0){;
$docu=mysql_result($result,0,'documentos');
$pisc=mysql_result($result,0,'piscinas');
$pcon=mysql_result($result,0,'pcontrol');
$carn=mysql_result($result,0,'carnet');
$cont1=mysql_result($result,0,'contratos');
$asig=mysql_result($result,0,'asignacion');
$cand=mysql_result($result,0,'candidatos');
$prec=mysql_result($result,0,'precios');
$pres=mysql_result($result,0,'presupuestos');
$dato1=mysql_result($result,0,'datos');
};?>
<input type="hidden" name="docuant" value="<?=$docu;?>">
<input type="hidden" name="piscant" value="<?=$pisc;?>">
<input type="hidden" name="pconant" value="<?=$pcon;?>">
<input type="hidden" name="carnant" value="<?=$carn;?>">
<input type="hidden" name="cont1ant" value="<?=$cont1;?>">
<input type="hidden" name="asigant" value="<?=$asig;?>">
<input type="hidden" name="candant" value="<?=$cand;?>">
<input type="hidden" name="precant" value="<?=$prec;?>">
<input type="hidden" name="presant" value="<?=$pres;?>">
<input type="hidden" name="dato1ant" value="<?=$dato1;?>">
<table>
<tr><td><b>Menu Personalzados</b></td></tr>
</table>
<table>
<tr><td>Acciones\Apartados</td>
<td>Materiales</td><td>Herramientas</td><td>Vestuario</td>
</tr>
<tr><td>Inactivo</td>
<td><input type="radio" name="docu" value="0" <?if ($docu==0){;?>checked<?}?>></td>
<td><input type="radio" name="pisc" value="0" <?if ($pisc==0){;?>checked<?}?>></td>
<td><input type="radio" name="pcon" value="0" <?if ($pcon==0){;?>checked<?}?>></td>
<td><input type="radio" name="carn" value="0" <?if ($carn==0){;?>checked<?}?>></td>
<td><input type="radio" name="cont1" value="0" <?if ($cont1==0){;?>checked<?}?>></td>
<td><input type="radio" name="asig" value="0" <?if ($asig==0){;?>checked<?}?>></td>
<td><input type="radio" name="cand" value="0" <?if ($cand==0){;?>checked<?}?>></td>
<td><input type="radio" name="prec" value="0" <?if ($prec==0){;?>checked<?}?>></td>
<td><input type="radio" name="pres1" value="0" <?if ($pres1==0){;?>checked<?}?>></td>
<td><input type="radio" name="dato1" value="0" <?if ($dato1==0){;?>checked<?}?>></td>
</tr>
<tr><td>Activo</td>
<td><input type="radio" name="docu" value="1" <?if ($docu==1){;?>checked<?}?>></td>
<td><input type="radio" name="pisc" value="1" <?if ($pisc==1){;?>checked<?}?>></td>
<td><input type="radio" name="pcon" value="1" <?if ($pcon==1){;?>checked<?}?>></td>
<td><input type="radio" name="carn" value="1" <?if ($carn==1){;?>checked<?}?>></td>
<td><input type="radio" name="cont1" value="1" <?if ($cont1==1){;?>checked<?}?>></td>
<td><input type="radio" name="asig" value="1" <?if ($asig==1){;?>checked<?}?>></td>
<td><input type="radio" name="cand" value="1" <?if ($cand==1){;?>checked<?}?>></td>
<td><input type="radio" name="prec" value="1" <?if ($prec==1){;?>checked<?}?>></td>
<td><input type="radio" name="pres" value="1" <?if ($pres==1){;?>checked<?}?>></td>
<td><input type="radio" name="dato1" value="1" <?if ($dato1==1){;?>checked<?}?>></td>
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





