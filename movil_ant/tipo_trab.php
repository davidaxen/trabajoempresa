<?
include('bbdd.php');
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