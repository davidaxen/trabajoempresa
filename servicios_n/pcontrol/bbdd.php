<?php 
include('../../bbdd/sqlsmartcbc-3.php');
extract($_COOKIE);
extract($_POST);
extract($_GET);

//$idpccat=2;

$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";
$result31=$conn->query($sql31);
$resultado31=$result31->fetch();
$nc=$resultado31['revision'];

$sql32="select * from menuserviciosimg where idempresa='".$ide."'";
$result32=$conn->query($sql32);
$resultado32=$result32->fetch();
$ic=$resultado32['revision'];
?>