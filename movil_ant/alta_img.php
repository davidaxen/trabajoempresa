<?
include('bbdd.php');

$sql="SELECT logotipo,plantillamovil,color from empresas where idempresas='".$cod."'";
//echo $sql;
$result=mysql_query ($sql) or die ("Invalid result datosempl");
$row=mysql_affected_rows();
if($row==1){;
$logotipo=mysql_result($result,0,'logotipo');
$pmovil=mysql_result($result,0,'plantillamovil');
$color=mysql_result($result,0,'color');
$rep=$logotipo.";".$pmovil.";".$color;
}else{;
$rep="error";
	};
echo ($rep);	
?>
