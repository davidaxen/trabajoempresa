<?php 
include('bbdd.php');


$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-lis_datoslectura";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 


$sql1 = "SELECT * from codservicios where idempresas='".$idempresa."' and  idclientes='".$idclientes."' and  idpccat='10' order by idpcsubcat asc";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet2");
$row=mysqli_num_rows($result1);
if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
mysqli_data_seek($result1);
$resultado1=mysqli_fetch_array($result1);
$idpccat=$resultado1['idpccat'];
$idpcsubcat=$resultado1['idpcsubcat'];

$sql11 = "SELECT * from puntservicios where idempresas='".$idempresa."' and  idpccat='10' and  idpcsubcat='".$idpcsubcat."'";
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet2");
$resultado11=mysqli_fetch_array($result11);
$nombre=$resultado11['subcategoria'];
$total=$idpccat."#".$idpcsubcat."#".$nombre;

$sql12 = "SELECT * from almpc where idempresas='".$idempresa."' and  idpiscina='".$idclientes."' and  idpccat='10' and idpcsubcat='".$idpcsubcat."' and idpuntomed='".$idpuntolectura."' order by dia desc limit 0,5";
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result icarnet2");
$row12=mysqli_num_rows($result12);

for($jt=0;$jt<5;$jt++){;

if (($row12==0) or ($jt>=$row12)) {;
$cantidad='0';
$total.="#";
$total.=$cantidad;
}else{;
mysqli_data_seek($result12, $jt);
$resultado12=mysqli_fetch_array($result12);
$cantidad=$resultado12['cantidad'];
$total.="#";
$total.=$cantidad;
};

};

$total.="<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
