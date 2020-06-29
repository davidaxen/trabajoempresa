<html>
<head>
<title>Listado de Clientes</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('../bbdd/sqlfacturacion.php');
if ($list=='a'){;
$titulo='ADMINISTRADORES DE FINCAS';
};
if ($list=='c'){;
$titulo='COMUNIDADES DE VECINOS';
};
if ($list=='e'){;
$titulo='EMPRESAS';
};
if ($list=='f'){;
$titulo='CALLEJERO';
};

$hoy=getdate();
$aactual=$hoy[year];

$fechai=date("Y-m-d",mktime(0,0,0,01,01,$aactual));

$fechaf=date("Y-m-d",mktime(0,0,0,12,31,$aactual));

?>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">LISTADO DE DESTINATARIOS</td></tr>
<tr><td class="enc"><?=$titulo;?></td></tr>
</table>



<?if ($ide!=null){;


if ($enviar!="Enviar"){;

$sql="SELECT distinct(cp) from ";
switch ($list){;
case 'a': $sql.="destinatario";break;
case 'c': $sql.="propuestas";break;
case 'e': $sql.="empresaspub";break;
case 'f': $sql.="callejero";break;
};
$sql.=" order by cp asc";

 
 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
?>
<form method="post" action="publidlis.php">
<input type="hidden" name="list" value="<?=$list;?>">
<tr><td>Codigo Postal</td><td><select name="cp[]" multiple="multiple">
<option value="todos">Todos
<?for ($j=0;$j<$row;$j++){;?>
<?$cp=mysql_result($result,$j,'cp');?>
<option value="<?=$cp;?>"><?=$cp;?>
<?};?>
</select>
</td></tr>
<?
if ($list=='a'){;
?>
<tr><td>Estado</td><td>
<select name="estad">
<option value="0">No quiere publicidad</option>
<option value="1" selected>Si quiere publicidad</option>
</select>
</td></tr>
<tr><td>Correo Mal</td><td>
<select name="correom">
<option value="0" selected>Bien</option>
<option value="1">Mal</option>
</select>
</td></tr>
<?
};
?>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>

<?}else{?>


<?
$sql="SELECT * from ";
switch ($list){;
case 'a': $sql.="destinatario";break;
case 'c': $sql.="propuestas";break;
case 'e': $sql.="empresaspub";break;
case 'f': $sql.="callejero";break;
};



if ($cp[0]!="todos"){;
$sql.=" where";

for ($r=0; $r<count($cp);$r++){;
if ($r!=0){;
$cpt .=",";
};
$cpt .="".$cp[$r]."";
};

$sql.=" cp in (".$cpt.")";

if ($list=='a'){;
$sql.=" and";
};

}else{;
if ($list=='a'){;
$sql.=" where";
};
	
	};


if ($list=='a'){;
$sql.=" estado='".$estad."' and correomal='".$correom."'";
};



switch ($list){;
case 'f': $sql.=" order by dsvial asc, numero asc";break;
case 'a': $sql.=" order by email1 asc, numcoleg asc";break;
case 'c': $sql.=" order by nombre asc, id asc";break;
}; 
//echo ($sql);
$result=mysql_query ($sql) or die ("Invalid result");

$row=mysql_affected_rows();
?>
<table border="0">
<?if ($cp[0]!="todos"){;?>
<tr class="enc"><td>Codigo postal</td><td colspan="7"><?=$cpt;?></td></tr>
<?};?>
<tr class="subenc">
<?if ($list=='a'){;?>
<td>Nombre</td>
<?if ($cp[0]=="todos"){;?><td>Cod Postal</td><?};?>
<td>Nº Colegiado</td>
<td>Tele1</td>
<td>Tele2</td>
<td>E-mail</td>
<td>Llamada</td>
<td>Dossier</td>
<?};?>

<?if ($list=='e'){;?>
<td>Nombre</td>
<td>Pers. Contacto</td>
<?if ($cp[0]=="todos"){;?><td>Cod Postal</td><?};?>
<td>Tele1</td>
<td>Tele2</td>
<td>E-mail</td>
<td>Llamada</td>
<td>Dossier</td>
<?};?>

<?if ($list=='c'){;?>
<td>Comunidad</td>
<td>Localidad</td>
<td>Foto</td>
<td>Presupuesto</td>
<?};?>

<?if ($list!='f'){;?>

<?};?>

<td>Opcion</td>
</tr>


<? for ($i=0; $i<$row; $i++){;?>




<?if ($list=='a'){;?>
<tr
<?
$correomal=mysql_result($result,$i,'correomal');
$estado=mysql_result($result,$i,'estado');

if ($correomal==1){;
?>
class="mayor"
<?
}else{;
if ($estado==0){;
?>
class="menor"
<?
}else{;
?>
class="menor1"
<?
};
};
?>
>
<td><?$nombre=mysql_result($result,$i,'nombre');?><?=$nombre;?></td>
<?if ($cp[0]=="todos"){;?><td><?$cp1=mysql_result($result,$i,'cp');?><?=$cp1;?></td><?};?>
<td><?$numcoleg=mysql_result($result,$i,'numcoleg');?><?=$numcoleg;?></td>
<td><?$tele1=mysql_result($result,$i,'tele1');?><?=$tele1;?></td>
<td><?$tele2=mysql_result($result,$i,'tele2');?><?=$tele2;?></td>
<td><?$email1=mysql_result($result,$i,'email1');?><?=trim($email1);?></td>
<?};?>


<?if ($list=='e'){;?>
<tr class="menor1">
<td><?$nombre=mysql_result($result,$i,'nombre');?><?=$nombre;?></td>
<td><?$contacto=mysql_result($result,$i,'contacto');?><?=$contacto;?></td>
<?if ($cp[0]=="todos"){;?><td><?$cp1=mysql_result($result,$i,'cp');?><?=$cp1;?></td><?};?>
<td><?$tele1=mysql_result($result,$i,'tele1');?><?=$tele1;?></td>
<td><?$tele2=mysql_result($result,$i,'tele2');?><?=$tele2;?></td>
<td><?$email1=mysql_result($result,$i,'email1');?><?=trim($email1);?></td>
<?};?>


<?if ($list=='c'){;?>
<tr class="menor1">
<td><?$nombre=mysql_result($result,$i,'nombre');?><?=$nombre;?></td>
<!--<td><?$localidad=mysql_result($result,$i,'localidad');?><?=$localidad;?></td>-->
<td><?$provincia=mysql_result($result,$i,'provincia');?><?=$provincia;?></td>
<td><?$foto=mysql_result($result,$i,'fotocliente');?><?if ($foto==''){;?>No<?}else{;?>

<img src="../img/prescon/<?=$foto;?>" width="50" onmouseover="this.width=200;this.height=200;"  onmouseout="this.width=50;this.height=50;">


<?};?></td>
<?};?>

<?if ($list=='f'){;?>
<td>
<?$cdtvia=mysql_result($result,$i,'cdtvia');?><?=$cdtvia;?> 
<?$dspart=mysql_result($result,$i,'dspart');?><?=$dspart;?> 
<?$dsvial=mysql_result($result,$i,'dsvial');?><?=$dsvial;?>, 
<?$numero=mysql_result($result,$i,'numero');?><?=$numero;?>
</td>
<?};?>

<?$idnom=mysql_result($result,$i,'id');?>




<?if ($list=='c'){;

include('../bbdd/sqlpresupuesto.php');

$sql12="SELECT iddestinatario,tipodestinatario,dia,mes,año,idpresupuesto,id from presupuestos where idempresa='".$ide."' and tipodestinatario='3' and año='".$aactual."' and iddestinatario='".$idnom."' ";
//echo $sql12."<br>";
$result12=mysql_query ($sql12) or die ("Invalid result");
$row12=mysql_affected_rows();
include('../bbdd/sqlfacturacion.php');
if ($row12!=0){
$idconpres=mysql_result($result12,0,'id');	
?>
<td width="25px"><a href="../servicios/presupuestos/pdfpresupuesto.php?idconpres=<?=$idconpres;?>"><img src="../img/ver.gif" width="25"></td>
<?}else{;?>
<td width="25px"><a href="../servicios/presupuestos/apresupuestos2.php?destinatario=3&año=<?=$aactual;?>&iddestinatario=<?=$idnom;?>"><img src="../img/notapres.jpg" width="50"></td>

<?};?>
<?}else{;?>

<?
$sql11="SELECT * from notas where idempresa='".$ide."' and destinatario='".$list."' and idref='".$idnom."' order by id desc"; 
$result11=mysql_query ($sql11) or die ("Invalid result");
$row11=mysql_affected_rows();
if ($row11!=0){;
$estado=mysql_result($result11,0,'estado');
$obs2=mysql_result($result11,0,'observaciones');
switch($estado){;
case 0: $estadolla="disco-negro.png";break;
case 1: $estadolla="disco-rojo.png";break;
case 2: $estadolla="disco-naranja.png";break;
case 3: $estadolla="disco-amarillo.png";break;
case 4: $estadolla="disco-verde.png";break;
case 5: $estadolla="disco-azul.png";break;
};
?>

<td width="25px"><img src="../img/<?=$estadolla;?>" width="25" title="<?=$obs2;?>"></td>

<?}else{;?>
<td width="25px">&nbsp;</td>
<?};?>

<?
$sql10="SELECT * from enviopubli where idempresa='".$ide."' and destinatario='".$list."' and idref='".$idnom."' and tipo='dossier' and dia between '".$fechai."' and '".$fechaf."'"; 
//echo $sql10."<br>";
$result10=mysql_query ($sql10) or die ("Invalid result");
$row10=mysql_affected_rows();
if ($row10!=0){
?>
<td width="25px"><img src="../img/mail.jpg" width="25"></td>
<?}else{;?>
<td width="25px">&nbsp;</td>
<?};?>
<?};?>

<td width="25px">
<a href="publidlis3.php?list=<?=$list;?>&num=<?=$idnom;?>"><img src="../img/icono-usuarios.gif" alt="mas informacion" border=0 width="25"></a>
</td>
<?if ($list=='f'){;?>
<td width=20%><a href="pdfetipubli.php?list=<?=$list;?>&id=<?=$idnom;?>"><img src="../img/dymo.jpg" alt="etiquetas" border=0 width="25"></a></td>
<?};?>
</tr>
<?};?>

</tr>
<?};?>




</table>


<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://facturacion.piscisol.com">aquí</a>

<?};?>
</body>
</html>