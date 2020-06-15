<?
include('bbdd.php');

$valores1 ="  GET ";
$valores1 .= implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));
$valores1 .="  POST ";
$valores1 .= implode(",", array_keys($_POST));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_POST));
$valores1 .="  COOKIE ";
$valores1 .= implode(",", array_keys($_COOKIE));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_COOKIE));



$gt="idempresa-".$valores1."-alta_img-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 





$sql="SELECT logotipo,plantillamovil,color from empresas where idempresas='".$cod."'";
//echo $sql;
$result=mysql_query ($sql) or die ("Invalid result datosempl");
$row=mysql_affected_rows();
if($row==1){;
$logotipo=mysql_result($result,0,'logotipo');
$pmovil=mysql_result($result,0,'plantillamovil');
$color=mysql_result($result,0,'color');

$rep=$logotipo.";".$pmovil.";".$color;

/*
$sql1="SELECT * from menuserviciosimg where idempresa='".$idempresa."'";
$result1=mysql_query ($sql1) or die ("Invalid result sql1");
$row1=mysql_affected_rows();

if($row1==1){;
$entr=mysql_result($result1,0,'entrada');
$inci=mysql_result($result1,0,'incidencia');
$rep=$rep.';'.$entr.';'.$inci;
}else{;
$rep="error";
};
*/



}else{;
$rep="error";
	};
	



$gt="rep-".$rep."-alta_img-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 

	
echo ($rep);	
?>
