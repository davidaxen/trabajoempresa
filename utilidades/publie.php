<html>
<head>
<title>Acciones de Publicidad</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('../bbdd/sqlfacturacion.php');
?>

<?if ($ide!=null){;?>

<?if ($list==null){;?>
<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">ENVIO DE CAMPAÑAS DE PUBLICIDAD</td></tr>
</table>
<form action="publie.php" method="post" enctype="multipart/form-data">
<table>
<tr><td>Destinatarios</td><td><select name="list"><option value="a">Administrador<option value="c">Comunidades de Vecinos<option value="e">Empresas</select>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>

</form>

<?}else{;?>

<script>
function ComponerLista(depto, fabr, prod){
fabr.disabled=true;
prod.lenght=0;
SeleccionarEmpleados (depto, prod);
fabr.disabled=false;
}

function SeleccionarEmpleados (depto, prod){
var o;
prod.disabled=true;
prod.length=0;
<?
if ($list=='a'){;
$sql2="SELECT * from destinatario where estado='1' and email1!='' and correomal='0'";
};

if ($list=='c'){;
$sql2="SELECT * from propuestas ";
};

if ($list=='e'){;
$sql2="SELECT * from empresaspub where estado='1' and email1!='' and correomal='0'";
};


$result2=mysql_query ($sql2) or die ("Invalid result");


?>
o=document.createElement("OPTION");
o.value="todos";
o.text="Todos";
prod.options.add(o);
<?while ($empl = mysql_fetch_array($result2)){;?>
if (depto == "<?=$empl['cp']?>"){
o=document.createElement("OPTION");
o.value="<?=$empl['id'];?>";
o.text="<?=$empl['nombre'];?>";
prod.options.add(o);
}
<?};?>
prod.disabled=false;
}
</script>
<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">ENVIO DE CAMPAÑAS DE PUBLICIDAD</td></tr>
</table>
<?if ($list=='a'){;?>
<form action="correo3.php" method="post" enctype="multipart/form-data">
<?$sql="SELECT distinct(cp) from destinatario where estado='1' order by cp asc"; ?>
<?};?>
<?if ($list=='c'){;?>
<form action="/publi/pdfpubli.php" method="post" enctype="multipart/form-data">
<?$sql="SELECT distinct(cp) from propuestas order by cp asc"; ?>
<?};?>
<?if ($list=='e'){;?>
<form action="correo3.php" method="post" enctype="multipart/form-data">
<?$sql="SELECT distinct(cp) from empresaspub where estado='1' order by cp asc"; ?>
<?};?>

<?
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();

$sql1="SELECT * from publi where idempresa='".$ide."'and estado='1' order by id desc"; 
$result1=mysql_query ($sql1) or die ("Invalid result");
$row1=mysql_affected_rows();
?>
<input type="hidden" name="list" value="<?=$list;?>">
<input type="hidden" name="dato" value="<?=$ide;?>">
<table>
<tr><td>Codigo Postal</td><td><select name="cp[]" multiple="multiple">
<option value="todos">Todos
<?for($j=0;$j<$row;$j++){;?>
<?$cp=mysql_result($result,$j,'cp');?>
<option value="<?=$cp;?>"><?=$cp;?>
<?};?></select>
<select name="cp1" onChange= "ComponerLista(this.value, cp1, dest)">
<?for($j=0;$j<$row;$j++){;?>
<?$cp=mysql_result($result,$j,'cp');?>
<option value="<?=$cp;?>"><?=$cp;?>
<?};?>
</select>
</td></tr>

<tr><td>Destinatario</td>
<td><select name="dest">
<option value="todos">Todos
</td></tr>

<tr><td>Campaña</td><td><select name="camp">
<?for($j=0;$j<$row1;$j++){;?>
<?$id=mysql_result($result1,$j,'id');?>
<?$titulo=mysql_result($result1,$j,'titulo');?>
<?$año=mysql_result($result1,$j,'año');?>
<option value="<?=$id;?>"><?=$titulo;?>-<?=$año;?>
<?};?>
</td></tr>

<tr><td>Documento a Enviar</td>
<td><select name="forma">
<option value="publi">Publicidad
<option value="dossier">Dossier
</td></tr>
<?if ($row1!=0){;?>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
<?};?>
</table>



<?};?>

<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://facturacion.piscisol.com">aquí</a>

<?};?>




















