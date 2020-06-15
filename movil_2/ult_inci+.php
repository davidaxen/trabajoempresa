<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ult_inci+";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 


$sql1 = "SELECT id,dia,hora,asunto,texto from almpcinci where idempresas='".$idempresa."' and  idpiscina='".$idcomunidad."' and plus='1' order by id desc limit ".$valor.", 5";
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
$row=mysql_affected_rows();
if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
$id=mysql_result($result1,$j,'id');
$dia=mysql_result($result1,$j,'dia');
$hora=mysql_result($result1,$j,'hora');
$texto=mysql_result($result1,$j,'texto');
$asunto=mysql_result($result1,$j,'asunto');
$total=$dia."#".$hora."#".$asunto."#".$texto."#".$id."<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
