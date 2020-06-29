<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-comprobar_estado-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 




$sql="SELECT estado from clientes where idempresas='".$idempresa."' and idclientes='".$idcomunidad."'";
$result=mysql_query ($sql) or die ("Invalid result datosempl");
$row=mysql_affected_rows();
if($row==1){;
$estado=mysql_result($result,0,'estado');
$rep=$estado;
}else{;
$rep="0";
	};
echo ($rep);

?>
