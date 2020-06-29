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

$sql1="where idempresa='".$ide."' and user='".$user1."'";

$sql10="update menufacturacion set";
$sql11="update menuempleados set";
$sql12="update menucontabilidad set";
$sql13="update menuutilidades set";
$sql14="update menuexistencias set";
$sql15="update menupersonalizados set";


for ($k=0;$k<count($campfact);$k++){;
if ($datofactant[$k]!=$datofactact[$k]){;
$sqla=" ".$campfact[$k]."='".$datofactact[$k]."' ";
$sql=$sql10.$sqla.$sql1;
echo $sql;
//$resultd=mysql_query ($sql) or die ("Invalid result caract");
};
};

for ($k=0;$k<count($campfact2);$k++){;
if ($datofact2ant[$k]!=$datofact2act[$k]){;
$sqla=" ".$campfact2[$k]."='".$datofact2act[$k]."' ";
$sql=$sql10.$sqla.$sql1;
echo $sql;
//$resultd=mysql_query ($sql) or die ("Invalid result caract");
};
};

for ($k=0;$k<count($campempl);$k++){;
if ($datoemplant[$k]!=$datoemplact[$k]){;
$sqla=" ".$campempl[$k]."='".$datoemplact[$k]."' ";
$sql=$sql11.$sqla.$sql1;
echo $sql;
//$resultd=mysql_query ($sql) or die ("Invalid result caract");
};
};

for ($k=0;$k<count($campcont);$k++){;
if ($datocontant[$k]!=$datocontact[$k]){;
$sqla=" ".$campcont[$k]."='".$datocontact[$k]."' ";
$sql=$sql12.$sqla.$sql1;
echo $sql;
//$resultd=mysql_query ($sql) or die ("Invalid result caract");
};
};

for ($k=0;$k<count($camputil);$k++){;
if ($datoutilant[$k]!=$datoutilact[$k]){;
$sqla=" ".$camputil[$k]."='".$datoutilact[$k]."' ";
$sql=$sql13.$sqla.$sql1;
echo $sql;
//$resultd=mysql_query ($sql) or die ("Invalid result caract");
};
};

for ($k=0;$k<count($campexis);$k++){;
if ($datoexisant[$k]!=$datoexisact[$k]){;
$sqla=" ".$campexis[$k]."='".$datoexisact[$k]."' ";
$sql=$sql14.$sqla.$sql1;
echo $sql;
//$resultd=mysql_query ($sql) or die ("Invalid result caract");
};
};


for ($k=0;$k<count($camppers);$k++){;
if ($datoepersant[$k]!=$datopersact[$k]){;
$sqla=" ".$camppers[$k]."='".$datopersact[$k]."' ";
$sql=$sql15.$sqla.$sql1;
echo $sql;
//$resultd=mysql_query ($sql) or die ("Invalid result caract");
};
};
?>


Datos modificados




<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://facturacion.piscisol.com">aquí</a>

<?};?>
</body>
</html>





