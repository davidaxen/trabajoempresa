<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-puntolectura";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 


$sql1 = "SELECT * from puntoslectura where idempresas='".$idempresa."' and  idclientes='".$idclientes."' order by idpuntoslectura asc";
$result1=mysql_query ($sql1) or die ("Invalid result icarnet2");
$row=mysql_affected_rows();
if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
$id=mysql_result($result1,$j,'idpuntoslectura');
$nombre=mysql_result($result1,$j,'nombre');
$total=$id."#".$nombre."<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
