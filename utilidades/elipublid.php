<html>
<head>
<title>Albaran</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?if ($id!=null){;?>
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

if ($list=='a'){;
$sql="delete from destinatario"; 
};
if ($list=='c'){;
$sql="delete from propuestas"; 
};
if ($list=='e'){;
$sql="delete from empresaspub"; 
};
if ($list=='f'){;
$sql="delete from callejero"; 
};

$sql.=" where id='".$id."'";

$result=mysql_query ($sql) or die ("Invalid result");




?>
<body>
<table>
<tr><td><img src="../img/<?=$img;?>" width="300" height="81"></td>
<td><font face="Tahoma" size="5">Eliminación de <?=$titulo;?></font></td></tr>
</table>
Datos eliminados de la Base de Datos.<br>
Gracias por utilizar este servicio.
<a href="inicio.php">Inicio</a>
<?}else{;?>
Por favor, introduzca los datos otra vez<br>
<a href="index.html">Inicio</a>
<?};?>
</body>

</html>









