<?
include('bbdd.php');

if($valor==null){;
$valor=0;
};

$sql1 = "SELECT id,dia,hora,texto,imagen from almpcinci where idempresas='".$idempresa."' and  idpiscina='".$idcomunidad."' and urgente='1' and urgresp='0' order by id desc limit ".$valor.", 5";
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
$imagen=mysql_result($result1,$j,'imagen');
$total=$id."#".$dia."#".$hora."#".$texto."#".$imagen."<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
