<?
$ronda=mysql_result($result1,0,'revision');
$nivel=mysql_result($result1,0,'niveles');
$diar=mysql_result($result1,0,'accdiarias');
$mant=mysql_result($result1,0,'accmantenimiento');
$prod=mysql_result($result1,0,'productos');
$inci=mysql_result($result1,0,'incidencia');

$mens=mysql_result($result1,0,'mensaje');

$alar=mysql_result($result1,0,'alarma');
$trab=mysql_result($result1,0,'trabajo');
$sini=mysql_result($result1,0,'siniestro');
$acce=mysql_result($result1,0,'control');
$medi=mysql_result($result1,0,'mediciones');
$ruta=mysql_result($result1,0,'ruta');
$enva=mysql_result($result1,0,'envases');
$incimas=mysql_result($result1,0,'incidenciasplus');
$segui=mysql_result($result1,0,'seguimiento');
$total=$ronda.';'.$nivel.';'.$diar.';'.$mant.';'.$prod.';'.$inci.';'.$mens.';'.$alar.';'.$trab.';'.$sini.';'.$acce.';'.$medi.';'.$ruta.';'.$enva.';'.$incimas.';'.$segui;
?>