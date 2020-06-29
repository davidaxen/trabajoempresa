<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-lis_acc_diarias";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 


$sql1 = "SELECT * from codservicios where idempresas='".$idempresa."' and  idclientes='".$idclientes."' and  idpccat='3' and activo='1' order by idpcsubcat asc";
$result1=mysql_query ($sql1) or die ("Invalid result icarnet2");
$row=mysql_affected_rows();
if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
$idpccat=mysql_result($result1,$j,'idpccat');
$idpcsubcat=mysql_result($result1,$j,'idpcsubcat');
$sql11 = "SELECT * from puntservicios where idempresas='".$idempresa."' and  idpccat='3' and  idpcsubcat='".$idpcsubcat."'";
$result11=mysql_query ($sql11) or die ("Invalid result icarnet2");
$nombre=mysql_result($result11,0,'subcategoria');
$total=$idpccat."#".$idpcsubcat."#".strtoupper($nombre);

$total.="<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
