<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-lis_clientes";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 


$sql1 = "SELECT * from clientes where idempresas='".$idempresa."' and estado='1' order by idclientes asc";
$result1=mysql_query ($sql1) or die ("Invalid result icarnet2");
$row=mysql_affected_rows();
if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
$idclientes=mysql_result($result1,$j,'idclientes');
$nombre=mysql_result($result1,$j,'nombre');
$total=$idclientes."#".strtoupper($nombre)."<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
