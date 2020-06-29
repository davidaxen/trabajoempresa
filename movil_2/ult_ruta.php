<?
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
$result1=mysql_query($sql1) or die ("Invalid result datos"); 





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

$result1=mysql_query ($sql1) or die ("Invalid result icarnet1");
//echo $sql1;
$row=mysql_affected_rows();
//echo $row;

if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;

$idruta=mysql_result($result1,$j,'idruta');
$nombreruta=mysql_result($result1,$j,'nombreruta');
//$total=$nombreruta."#".$idruta;


$sql10 = "SELECT nombre, clientes.idclientes from clienteruta, clientes where clienteruta.idempresas='".$idempresa."' and idruta='".$idruta."'";
$sql10 .=" and clientes.idempresas=clienteruta.idempresas and clientes.idclientes=clienteruta.idclientes";
//echo $sql10;
$result10=mysql_query ($sql10) or die ("Invalid result icarnet10");



$row10=mysql_affected_rows();

//echo $row10;


for($ji=0;$ji<$row10;$ji++){;

$nombrecliente=mysql_result($result10,$ji,'nombre');
$idcliente=mysql_result($result10,$ji,'clientes.idclientes');

$sql11 = "SELECT * from almpc where idempresas='".$idempresa."' and idempleado='".$idempleado."' and idpiscina='".$idcliente."' and dia='".$diah."'";
//echo $sql11;



$result11=mysql_query ($sql11) or die ("Invalid result icarnet11");
$row11=mysql_affected_rows();
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
