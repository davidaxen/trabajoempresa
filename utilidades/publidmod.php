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
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">MODIFICACIÓN DE DESTINATARIOS</td></tr>
<tr><td class="enc"><?=$titulo;?></td></tr>
</table>



<?
if ($ide!=null){;
if ($enviar!="Enviar"){;?>
<?
if ($list=='a'){;
$sql="SELECT distinct(cp) from destinatario"; 
};
if ($list=='c'){;
$sql="SELECT distinct(cp) from propuestas"; 
};
if ($list=='e'){;
$sql="SELECT distinct(cp) from empresaspub"; 
};
if ($list=='f'){;
$sql="SELECT distinct(cp) from callejero"; 
};

$sql.=" order by cp asc";
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
?>
<form method="post" action="publidmod.php">
<input type="hidden" name="list" value="<?=$list;?>">
<tr><td>Codigo Postal</td><td><select name="cp">
<option value="todos">Todos
<?for ($j=0;$j<$row;$j++){;?>
<?$cp=mysql_result($result,$j,'cp');?>
<option value="<?=$cp;?>"><?=$cp;?>
<?};?>
</select>
</td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?}else{?>


<?
if ($list=='a'){;
$sql="SELECT * from destinatario"; 
};
if ($list=='c'){;
$sql="SELECT * from propuestas"; 
};
if ($list=='e'){;
$sql="SELECT * from empresaspub"; 
};
if ($list=='f'){;
$sql="SELECT * from callejero"; 
};

if ($cp!="todos"){;
$sql.=" where cp='".$cp."'";
};

if ($list!='f'){;
$sql.=" order by nombre,cp asc";
}else{
$sql.=" order by dsvial,numero asc";
};
//echo $sql;
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
?>
<table>
<tr class="subenc"><td>Nombre</td><td>Opcion</td></tr>
<? for ($i=0; $i<$row; $i++){;?>
<tr class="menor1">
<?$id=mysql_result($result,$i,'id');?>
<?if ($list!='f'){;?>
<td><?$nombre=mysql_result($result,$i,'nombre');?><?=$nombre;?></td>
<?}else{;?>
<td>
<?$cdtvia=mysql_result($result,$i,'cdtvia');?><?=$cdtvia;?> 
<?$dspart=mysql_result($result,$i,'dspart');?><?=$dspart;?> 
<?$dsvial=mysql_result($result,$i,'dsvial');?><?=$dsvial;?>, 
<?$numero=mysql_result($result,$i,'numero');?><?=$numero;?>
</td>
<?};?>


<td>
<a href="modpublid.php?list=<?=$list;?>&id=<?=$id;?>"><img src="../img/modificar.gif" alt="modificar" border=0 width=20></a>
<a href="elipublid.php?list=<?=$list;?>&id=<?=$id;?>"><img src="../img/papelera.gif" alt="eliminar" border=0 width=20></a>

</td>
</tr>
<?};?>
</table>

<?};?>
<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://facturacion.piscisol.com">aquí</a>

<?};?>
</body>
</html>