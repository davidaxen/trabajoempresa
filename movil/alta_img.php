<?php 
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
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 





$sql="SELECT logotipo,plantillamovil,color from empresas where idempresas='".$cod."'";
//echo $sql;
$result=mysqli_query($conn,$sql) or die ("Invalid result datosempl");
$row=mysqli_num_rows($result);
if($row==1){;
$resultado=mysqli_fetch_array($result);
$logotipo=$resultado['logotipo'];
$pmovil=$resultado['plantillamovil'];
$color=$resultado['color'];

$rep=$logotipo.";".$pmovil.";".$color;

/*
$sql1="SELECT * from menuserviciosimg where idempresa='".$idempresa."'";
$result1=mysqli_query($conn,$sql1) or die ("Invalid result sql1");
$row1=mysqli_num_rows($result);

if($row1==1){;
$entr=$resultado1['entrada');
$inci=$resultado1['incidencia');
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
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 

	
echo ($rep);	
?>