<?php 
include('bbdd.php');

$campo2=date('N',time());
$diah=date('Y-m-d',time());
$total="";

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ult_ruta";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 





$sql1 = "SELECT * from ruta where idempresas='".$idempresa."' and idempleado='".$idempleado."' and estado='1'";

switch($campo2) {
	case 1: $sql1.="and lun='1'";break;
	case 2: $sql1.="and mar='1'";break;
	case 3: $sql1.="and mie='1'";break;
	case 4: $sql1.="and jue='1'";break;
	case 5: $sql1.="and vie='1'";break;
	case 6: $sql1.="and sab='1'";break;
	case 7: $sql1.="and dom='1'";break;	
	}

$result1=mysqli_query($conn,$sql1) or die ("Invalid result icarnet1");
//echo $sql1;
$row=mysqli_num_rows($result1);
//echo $row;

if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
mysqli_data_seek($result1, $j);
$resultado1=mysqli_fetch_array($result1);
$idruta=$resultado1['idruta'];
$nombreruta=$resultado1['nombreruta'];
//$total=$nombreruta."#".$idruta;


$sql10 = "SELECT nombre, clientes.idclientes from clienteruta, clientes where clienteruta.idempresas='".$idempresa."' and idruta='".$idruta."'";
$sql10 .=" and clientes.idempresas=clienteruta.idempresas and clientes.idclientes=clienteruta.idclientes";
//echo $sql10;
$result10=mysqli_query($conn,$sql10) or die ("Invalid result icarnet10");



$row10=mysqli_num_rows($result10);

//echo $row10;


for($ji=0;$ji<$row10;$ji++){;
mysqli_data_seek($result10, $ji);
$resultado10=mysqli_fetch_array($result10);
$nombrecliente=$resultado10['nombre'];
$idcliente=$resultado10['clientes.idclientes'];

$sql11 = "SELECT * from almpc where idempresas='".$idempresa."' and idempleado='".$idempleado."' and idpiscina='".$idcliente."' and dia='".$diah."'";
//echo $sql11;

$result11=mysqli_query($conn,$sql11) or die ("Invalid result icarnet11");
$row11=mysqli_num_rows($result11);

if($row11==0){;
$visita=0;
}else{;
$visita=1;
};
$total=$total.strtoupper($nombrecliente)."#".$visita."#".$idcliente."<.>";

};

$rep=$rep.$total;
}

}


echo ($rep);

?>
