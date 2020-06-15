<?
include('bbdd.php');

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
