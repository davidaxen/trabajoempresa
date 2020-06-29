<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_pro_qui";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 


$idemprempl=ltrim ( substr($trab,1,4), "0");
$idempl=ltrim ( substr($trab,5,4), "0");

$idemppis=ltrim ( substr($niv,1,3), "0");
$idpis=ltrim ( substr($niv,4,3), "0");
$idcat=ltrim ( substr($niv,7,2), "0");
$idsubcat=ltrim ( substr($niv,9,3), "0");

if ($idcat==5) {;
if($idemprempl=$idemppis){;
$sql="SELECT subcategoria from pcsubcat where idempresas='".$idemprempl."' and idpccat='".$idcat."' and idpcsubcat='".$idsubcat."'";
$result=mysql_query ($sql) or die ("Invalid result datosempl");
$row=mysql_affected_rows();

if($row==1){;
$subcategoria=mysql_result($result,0,'subcategoria');
$total=$subcategoria;
$rep=$total;
}else{;
$rep="error";
	};
}else{;
$rep="error";
};	
}else{;
$rep="error";
};
echo ($rep);
?>
