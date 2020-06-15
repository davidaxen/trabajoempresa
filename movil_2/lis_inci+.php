<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="lis_inci+-".$valores1."-lis_inci+";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1 = mysql_query($sql1) or die ("Invalid result datos"); 



$sql10 = "SELECT * from almpcinci where idempresas='".$idempresa."' and id='".$idincidencia."'";
//echo $sql10."prueba";
$result10 = mysql_query ($sql10) or die ("Invalid result incid");
$row10 = mysql_affected_rows();


if ($row10==0){


$rep=0;
	}else{
	
for($j=0;$j<$row10;$j++){;
$id=mysql_result($result10,$j,'id');
$dia=mysql_result($result10,$j,'dia');
$hora=mysql_result($result10,$j,'hora');
$texto=mysql_result($result10,$j,'texto');
$asunto=mysql_result($result10,$j,'asunto');
$idproveedor=mysql_result($result10,$j,'idproveedor');

$sql11 = "SELECT * from proveedores where idempresas='".$idempresa."' and  idproveedor='".$idproveedor."'";
//echo $sql11;
$result11=mysql_query ($sql11) or die ("Invalid result proveedor");
$nombreproveedor=mysql_result($result11,0,'nombre');
$telproveedor=mysql_result($result11,0,'telefono');

$sql12 = "SELECT * from imginciplus where idempresa='".$idempresa."' and  idsiniestro='".$idincidencia."'";
$result12=mysql_query ($sql12) or die ("Invalid result imag");
$row12=mysql_affected_rows();

if($row12==0){
$imagenes="";
}else{
$imagenes="(";
for($ty=0;$ty>$row12;$ty++) {;
$img=mysql_result($result12,$ty,'imgsiniestro');
$imagenes.=$img."<?>";
	};
$imagenes.=")";
}

$total=$id."#".$dia."#".$hora."#".$asunto."#".$texto."#".$nombreproveedor."#".$telproveedor."#".$imagenes."<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
