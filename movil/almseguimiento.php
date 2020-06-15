<?php 
include('bbdd.php');


$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-almseguimiento-";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 



if($lon!=""){
	$lon1=strtok($lon,",");
	$lon2=strtok(",");
	$lon=$lon1.".".$lon2;
}

if($lat!=""){
	$lat1=strtok($lat,",");
	$lat2=strtok(",");
	$lat=$lat1.".".$lat2;
}

$dia1=strtok($dia,"/");
$dia2=strtok("/");
$dia3=strtok("/");
$diaa=$dia3."-".$dia2."-".$dia1;

$sql1a = "SELECT MAX(CAST(idronda AS UNSIGNED)) AS idronda FROM almseguimiento";
//echo $sql1a;
$result1a=mysqli_query($conn,$sql1a) or die ("Invalid result sql1a");
$row=mysqli_num_rows($result1a);
$resultado1a=mysqli_fetch_array($result1a);
$idronda=$resultado1a['idronda'];
echo "idronda antes ".$idronda."<br>";

if($cont==0){
	echo "entra en cont == 0<br>";
	if($row!=0){
		echo "entra en row distinto de 0<br>";
		$idronda = $idronda + 1;
		echo "idronda despues ".$idronda."<br>";
	}else{
		$idronda = 1;
	}
}


$sql1 = "INSERT INTO almseguimiento (`idempresas`, `idempleado`, `idcliente`, `idronda`, `dia`, `hora`, `lat`, `lon`) VALUES ('".$idempresa."', '".$idempleado."', '".$idcomunidad."', '".$idronda."', '".$diaa."', '".$hora."', '".$lat."', '".$lon."')";
$result1=mysqli_query($conn,$sql1) or die ("Invalid result1");
echo $sql1;
?>
