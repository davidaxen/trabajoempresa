<html>
<?if ($com=="comprobacion"){;?>
<?php 
include('../bbdd/sqlfacturacion.php');
?>
<head>
<title>Visualización de Facturas Emitidas</title>
<link rel="stylesheet" href="../estilo/estilo.css">

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
$sql2="SELECT * from propuestas where idempresa='".$ide."' order by nombre asc";
$result2=mysql_query ($sql2) or die ("Invalid result 2");
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

</head>



<body>
<table>
<tr><td><img src="../img/<?=$img;?>" width="300" height="81"></td>
<td><font face="Tahoma" size="5">Creación de sobres</font></td></tr>
</table>
<?
$sql0="select idclientes,nombre from clientes where idempresas='".$ide."'";
$result0=mysql_query ($sql0) or die ("Invalid result0");
$row0=mysql_affected_rows();
?>

<form action="pdfsobres.php" method="post">
<table>
<tr><td>&nbsp;</td>
<td><font face="Tahoma" size="5">Clientes</font></td></tr>
</table>
<table>
<tr><td>Nombre de Clientes</td><td>
<select name="clientes">
<option value="0">En blanco
<option value="todos">Todos
<? for ($j=0; $j<$row0; $j++){;?>
<?$idp=mysql_result($result0,$j,idclientes);?>
<?$nombrep=mysql_result($result0,$j,nombre);?>
<option value="<?=$idp?>"><?=$nombrep?>
<?};?>
</select></td></tr>
<tr><td>Tipo de Sobre</td>
<td><select name="tipo">
<option value="sdl">Sobre DL- 110 x 220
<option value="sc6">Sobre C6- 114 x 162
<option value="sc5">Sobre C5- 162 x 229
<option value="scl">Sobre Clasico- 145 x 200
</select>
</td></tr>
</table>
<input class="envio" type="submit" name="enviar" value="enviar">
</form>
<?if ($ide==10){;?>
<?
$sql1="select * from propuestas where idempresa='".$ide."'";
$result1=mysql_query ($sql1) or die ("Invalid result0");
$row1=mysql_affected_rows();
?>
<?
$sql2="select cp from propuestas where idempresa='".$ide."' group by cp";
$result2=mysql_query ($sql2) or die ("Invalid result0");
$row2=mysql_affected_rows();
?>

<?};?>




<table>
<tr><td>&nbsp;</td>
<td><font face="Tahoma" size="5">Posibles clientes</font></td></tr>
</table>


<form action="pdfsobres.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="tabla" value="propuesta">
<?$sql="SELECT distinct(cp) from propuestas where idempresa='".$ide."' order by cp asc"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();

$sql1="SELECT * from publi where idempresa='".$ide."' order by id desc"; 
$result1=mysql_query ($sql1) or die ("Invalid result");
$row1=mysql_affected_rows();
?>

<input type="hidden" name="dato" value="<?=$ide;?>">
<table>
<tr><td>Codigo Postal</td><td><select name="cp" onChange= "ComponerLista(this.value, cp, propuesta)">
<option value="0">En blanco
<option value="todos">Todos
<?for($j=0;$j<$row;$j++){;?>
<?$cp=mysql_result($result,$j,'cp');?>
<option value="<?=$cp;?>"><?=$cp;?>
<?};?>
</td></tr>

<tr><td>Destinatario</td>
<td><select name="propuesta">
<option value="todos">Todos
</td></tr>

<tr><td>Tipo de Sobre</td>
<td><select name="tipo">
<option value="sdl">Sobre DL- 110 x 220
<option value="sc6">Sobre C6- 114 x 162
<option value="sc5">Sobre C5- 162 x 229
<option value="scl">Sobre Clasico- 145 x 200
</select>
</td></tr>

<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>




<?
}else{;
?>

Por favor pulse en inicio para volver a la página inicial<br>
<a href="index.html">Inicio</a>
<?};?>

</body>
</html>







