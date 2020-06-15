<?php 
include('bbdd.php');
$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_puesto_nue";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 

$sql1="SELECT * from clientes where idempresas='".$idempresa."' and idclientes='".$idcomunidad."'";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result sql1");
$row=mysqli_num_rows($result1);


if($row==1){;
$resultado1=mysqli_fetch_array($result1);
include('servicios2.php');
$rep=$total;
}else{;
$rep="error";
};

echo ($rep);

?>
