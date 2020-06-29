<?
include('bbdd.php');
//$idemprempl=ltrim ( substr($cod,2,3), "0");
//$idempl=ltrim ( substr($cod,6,3), "0");
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
