<html>
<head>
<title>Listado de Clientes</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('../bbdd/sqlfacturacion.php');
?>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td class="enc">LISTADO DE CAMPA�AS</td></tr>

</table>



<?
if ($ide!=null){;
if ($datos!='datos'){;
?>

<table>
<form method="post" action="publiclis.php">
<input type="hidden" name="datos" value="datos">
<tr><td>A�o</td><td><input type="text" name="a�o"></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
<?
}else{;

$sql="SELECT * from publi where idempresa='".$ide."' and a�o='".$a�o."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();
?>
<table>
<tr class="subenc"><td>Titulo</td><td>Imagen</td><td>Documento PDF</td></tr>
<? for ($i=0; $i<$row; $i++){;?>
<tr class="menor1">
<td><?$titulo=mysql_result($result,$i,'titulo');?><?=$titulo;?></td>
<td><?$campa�a=mysql_result($result,$i,'campa�a');?><?=$campa�a;?></td>
<td><?$documento=mysql_result($result,$i,'documento');?><?=$documento;?></td>
</tr>
<?};?>
</table>

<?};?>

<?} else {;?>

Por favor, no tiene acceso a esta opci�n,<br>
vuelva a la p�gina inicial pinchando <a href="http://facturacion.piscisol.com">aqu�</a>

<?};?>
</body>
</html>