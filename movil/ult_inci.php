<?php 
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ult_inci";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 


$valores=$idcomunidad;

$sql10="SELECT * from clientes where idempresas='".$idempresa."' and idclientesprin='".$idcomunidad."'"; 
$result10=mysqli_query($conn,$sql10) or die ("Invalid result");
$row10=mysqli_num_rows($result10);
if ($row10>0){
for($ja=0;$ja<$row10;$ja++){;
mysqli_data_seek($result10, $ja);
$resultado10=mysqli_fetch_array($result10);
	$idclientes=$resultado10['idclientes'];
$valores=$valores.','.$idclientes;
};
}



$sql1 = "SELECT dia,hora,texto,imagen,idpiscina from almpcinci where idempresas='".$idempresa."' and  idpiscina in (".$valores.") order by id desc limit ".$valor.", 5";
$result1=mysqli_query($conn,$sql1) or die ("Invalid result icarnet");
$row=mysqli_num_rows($result1);
if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
mysqli_data_seek($result1, $j);
$resultado1=mysqli_fetch_array($result1);
	$idclientes=$resultado1['idpiscina'];

$dia=$resultado1['dia'];
$hora=$resultado1['hora'];
$texto=$resultado1['texto'];
$imagen=$resultado1['imagen'];

if ($idclientes!=$idcomunidad){
$sql11="SELECT * from clientes where idempresas='".$idempresa."' and idclientes='".$idclientes."'"; 
$result11=mysqli_query($conn,$sql11) or die ("Invalid result");
$resultado11=mysqli_fetch_array($result11);
$nombre=$resultado11['nombre'];
$texto=strtoupper($nombre)." - ".$texto;
};


$total=$dia."#".$hora."#".$texto."#".$imagen."<.>";
$rep=$rep.$total;
}

}


echo ($rep);







?>
