<?php 
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_nombre";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 


$sql1="SELECT * from menuserviciosnombre where idempresa='".$idempresa."'";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result sql1");
$row=mysqli_num_rows($result1);



if($row==1){;
$resultado1=mysqli_fetch_array($result1);
include('servicios.php');
$entr=$resultado1['entrada'];
$rep=$total.';'.$entr;
}else{;
$rep="error";
};

$gt="rep-".$rep."-ent_nombre";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 

echo ($rep);

?>
