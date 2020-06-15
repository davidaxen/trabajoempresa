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
?>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">LISTADO DE DESTINATARIOS</td></tr>
<tr><td class="enc"><?=$titulo;?></td></tr>
</table>



<?if ($ide!=null){;?>
<table>
<?
$sql="SELECT * from ";
switch ($list){;
case 'a': $sql.="destinatario";break;
case 'c': $sql.="propuestas";break;
case 'e': $sql.="empresaspub";break;
case 'f': $sql.="callejero";break;
};
$sql.=" where id='".$num."'"; 


$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
?>
<?if ($list=='c'){;?>
<tr class="subenc"><td>Nombre</td><td>Direccion</td><td>C.P.</td><td>Localidad</td><td>Provincia</td><td>Foto</td></tr>
<? for ($i=0; $i<$row; $i++){;?>
<tr class="menor1">
<td><?$nombre=mysql_result($result,$i,'nombre');?><?=$nombre;?></td>
<td><?$direccion=mysql_result($result,$i,'domicilio');?><?=$direccion;?></td>
<td><?$cp=mysql_result($result,$i,'cp');?><?=$cp;?></td>
<td><?$localidad=mysql_result($result,$i,'localidad');?><?=$localidad;?></td>
<td><?$provincia=mysql_result($result,$i,'provincia');?><?=$provincia;?></td>
<td><?$foto=mysql_result($result,$i,'fotocliente');?><?if ($foto==''){;?>No<?}else{;?>


<img src="../img/prescon/<?=$foto;?>" width="525" onmouseover="this.width=200;this.height=200;"  onmouseout="this.width=25;this.height=25;">


<?};?></td>
</tr>
<?};?>
<?}else{;?>
<tr class="subenc">
<?if ($list=='a'){;?><td>Num Coleg</td><?};?>
<?if ($list=='e'){;?><td>Pers. Contacto</td><?};?>
<?if ($list!='f'){;?>
<td>Nombre</td><td>Direccion</td><td>Telefono 1</td><td>Telefono 2</td><td>Fax</td><td>C.P.</td><td>E-mail 1</td><td>E-mail 2</td></tr>
<?};?>
<?if ($list=='f'){;?><td>Nombre de la Calle</td><td>C.P.</td><?};?>
<? for ($i=0; $i<$row; $i++){;?>
<tr class="menor1">

<?if ($list=='a'){;?><td><?$numcoleg=mysql_result($result,$i,'numcoleg');?><?=$numcoleg;?></td><?};?>
<?if ($list=='e'){;?><td><?$contacto=mysql_result($result,$i,'contacto');?><?=$contacto;?></td><?};?>
<?if ($list!='f'){;?>
<td><?$nombre=mysql_result($result,$i,'nombre');?><?=$nombre;?></td>
<td><?$direccion=mysql_result($result,$i,'domicilio');?><?=$direccion;?></td>
<td><?$tele1=mysql_result($result,$i,'tele1');?><?=$tele1;?></td>
<td><?$tele2=mysql_result($result,$i,'tele2');?><?=$tele2;?></td>
<td><?$fax=mysql_result($result,$i,'fax');?><?=$fax;?></td>
<td><?$cp=mysql_result($result,$i,'cp');?><?=$cp;?></td>
<td><?$email1=mysql_result($result,$i,'email1');?><?=trim($email1);?></td>
<td><?$email2=mysql_result($result,$i,'email2');?><?=$email2;?></td>
<?};?>

<?if ($list=='f'){;?>
<td>
<?$cdtvia=mysql_result($result,$i,'cdtvia');?><?=$cdtvia;?> 
<?$dspart=mysql_result($result,$i,'dspart');?><?=$dspart;?> 
<?$dsvial=mysql_result($result,$i,'dsvial');?><?=$dsvial;?>, 
<?$numero=mysql_result($result,$i,'numero');?><?=$numero;?>
</td>
<td><?$cp=mysql_result($result,$i,'cp');?><?=$cp;?></td>
<?};?>

</tr>
<?};?>
<?};?>
</table>

<table>
<tr>
<td width=20%><a href="notasalta.php?list=<?=$list;?>&id=<?=$num;?>"><img src="../img/notas.jpg" alt="insertar notas" border=0 width=50%></a></td>
<td width=20%><a href="reunionalta.php?list=<?=$list;?>&id=<?=$num;?>"><img src="../img/calendario.png" alt="insertar reuniones" border=0 width=50%></a></td>
<td width=20%><a href="notasver.php?list=<?=$list;?>&id=<?=$num;?>"><img src="../img/vernotas.jpg" alt="ver notas" border=0 width=50%></a></td>
<td width=20%><a href="publie2.php?list=<?=$list;?>&id=<?=$num;?>&cp=<?=$cp;?>"><img src="../img/enviarcorreo.jpg" alt="enviar correos" border=0 width=50%></a></td>
<td width=20%><a href="modpublid.php?list=<?=$list;?>&id=<?=$num;?>"><img src="../img/icono-usuarios.gif" alt="modificar" border=0 width=50></a></td>
<td width=20%><a href="pdfetipubli.php?list=<?=$list;?>&id=<?=$num;?>"><img src="../img/dymo.jpg" alt="etiquetas" border=0 width=50></a></td>
</tr>
</table>


<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://facturacion.piscisol.com">aquí</a>

<?};?>
</body>
</html>