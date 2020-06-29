<?php 
include('bbdd.php');
//$idemprempl=ltrim ( substr($cod,2,3), "0");
//$idempl=ltrim ( substr($cod,6,3), "0");

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-alta_inicial-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 





$sql="SELECT logotipo from empresas where idempresas='".$cod."'";
//echo $sql;
$result=mysqli_query($conn,$sql) or die ("Invalid result datosempl");
$row=mysqli_num_rows($result);
if($row==1){;
$resultado=mysqli_fetch_array($result);
$logotipo=$resultado['logotipo'];
$rep=$logotipo;
}else{;
$rep="error";
	};
echo ($rep);	
?>