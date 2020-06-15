<?
include('bbdd.php');



$sql1 = "SELECT dia,hora,texto,imagen from almpcinci where idempresas='".$idempresa."' and  idpiscina='".$idcomunidad."' order by id desc limit ".$valor.", 5";
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
$row=mysql_affected_rows();
if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
$dia=mysql_result($result1,$j,'dia');
$hora=mysql_result($result1,$j,'hora');
$texto=mysql_result($result1,$j,'texto');
$imagen=mysql_result($result1,$j,'imagen');
$total=$dia."#".$hora."#".$texto."#".$imagen."<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
