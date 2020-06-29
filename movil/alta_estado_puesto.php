<?php 
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));


$gt="idempresa-".$valores1."-alta_estado_puesto-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 


if ($idempresa==$idempresacom){;

$sql="SELECT estado from clientes where idempresa='".$idempresa."' and estado='1'";

$result=mysqli_query($conn,$sql) or die ("Invalid result datosempl");
$resultado=mysqli_fetch_array($result);
$estado=$resultado['estado'];
if($estado==1){;
$rep=$estado;
}else{;
$rep="error";
	};
	
	
}else{;
$rep="error";
};	
	
	
	
echo ($rep);

?>