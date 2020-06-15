<?
include('bbdd.php');
//$idemprempl=ltrim ( substr($cod,2,3), "0");
//$idempl=ltrim ( substr($cod,6,3), "0");

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-alta_inicial-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 





$sql="SELECT logotipo from empresas where idempresas='".$cod."'";
//echo $sql;
$result=mysql_query ($sql) or die ("Invalid result datosempl");
$row=mysql_affected_rows();
if($row==1){;
$logotipo=mysql_result($result,0,'logotipo');
$rep=$logotipo;
}else{;
$rep="error";
	};
echo ($rep);	
?>
