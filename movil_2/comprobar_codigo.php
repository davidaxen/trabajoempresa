<?
include('bbdd.php');
/*
$var3=array_keys(",",$_GET);
$val3=array_values($_GET);
$vat=implode(",",$var)
*/
//$gt=var_export($_GET);
//print_r ($var3);

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-comprobar_codigo-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 



//$sql="SELECT estado,codigo from clientes where idempresas='".$idempresa."' and idclientes='".$idcomunidad."'";
$sql="SELECT * from codigo where idempresas='".$idempresa."' and idclientes='".$idcomunidad."' and idpccat='".$idpccat."'";
$result=mysql_query ($sql) or die ("Invalid result datosempl");
$row=mysql_affected_rows();
if($row==1){;
//$estado=mysql_result($result,0,'estado');
//$codigo=mysql_result($result,0,'codigo');
$codigo=mysql_result($result,0,'activo');
$rep=$codigo;
}else{;
$rep="1";
	};
echo ($rep);

?>
