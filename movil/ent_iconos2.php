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



$gt="idempresa-".$valores1."-iconos2-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 


$sql1="SELECT * from menuserviciosimg where idempresa='".$idempresa."'";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result sql1");
$row=mysqli_num_rows($result1);


if($row==1){;
$resultado1=mysqli_fetch_array($result1);
include('servicios2.php');
$entr=$resultado1['entrada'];
$rep=$total.';'.$entr;
}else{;
$rep="error";
};


$gt="rep-".$rep."-iconos2-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 



echo ($rep);

?>
