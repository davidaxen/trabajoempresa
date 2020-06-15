<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ult_rev_inci";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 

$sql1 = "SELECT id,dia,hora,idronda,texto, img from almpcronda where idempresas='".$idempresa."' and  idcliente='".$idcomunidad."' and texto not like '' order by id desc limit ".$valor.", 5";
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
$row=mysql_affected_rows();
if ($row==0){
	$rep=0;}else{
	
for($j=0;$j<$row;$j++){;$id=mysql_result($result1,$j,'id');
$texto=mysql_result($result1,$j,'id');
$dia=mysql_result($result1,$j,'dia');$hora=mysql_result($result1,$j,'hora');
$idronda=mysql_result($result1,$j,'idronda');
$texto=mysql_result($result1,$j,'texto');
$imagen=mysql_result($result1,$j,'img');

$sql10 = "SELECT descripcion from puntcont where idempresas='".$idempresa."' and  idclientes='".$idcomunidad."' and idpuntcont='".$idronda."'";$result10=mysql_query ($sql10) or die ("Invalid result icarnet");
$ronda=mysql_result($result10,0,'descripcion');
$total=$id."#".$dia."#".$hora."#".$ronda."#".$texto."#".$imagen."<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
