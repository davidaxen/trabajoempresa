<?
include('bbdd.php');


$sql1 = "SELECT * from clientes where idempresas='".$idempresa."' order by idclientes asc";
$result1=mysql_query ($sql1) or die ("Invalid result icarnet2");
$row=mysql_affected_rows();
if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
$idclientes=mysql_result($result1,$j,'idclientes');
$nombre=mysql_result($result1,$j,'nombre');
$total=$idpccat."#"$nombre;

$total.="<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
