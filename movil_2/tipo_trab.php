<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-tipo_trab";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 

$idemprempl=ltrim ( substr($trab,1,4), "0");
$idempl=ltrim ( substr($trab,5,4), "0");
$tipotrab=ltrim ( substr($trab,9,3), "0");

if(($tipotrab==8) or ($tipotrab==10)) {;
$rep=$tipotrab;
}else{;
$rep="error";
};
echo ($rep);

?>