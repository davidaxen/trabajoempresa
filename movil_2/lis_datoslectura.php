<?
include('bbdd.php');


$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-lis_datoslectura";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 


$sql1 = "SELECT * from codservicios where idempresas='".$idempresa."' and  idclientes='".$idclientes."' and  idpccat='10' order by idpcsubcat asc";
$result1=mysql_query ($sql1) or die ("Invalid result icarnet2");
$row=mysql_affected_rows();
if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
$idpccat=mysql_result($result1,$j,'idpccat');
$idpcsubcat=mysql_result($result1,$j,'idpcsubcat');
$sql11 = "SELECT * from puntservicios where idempresas='".$idempresa."' and  idpccat='10' and  idpcsubcat='".$idpcsubcat."'";
$result11=mysql_query ($sql11) or die ("Invalid result icarnet2");
$nombre=mysql_result($result11,0,'subcategoria');
$total=$idpccat."#".$idpcsubcat."#".$nombre;

$sql12 = "SELECT * from almpc where idempresas='".$idempresa."' and  idpiscina='".$idclientes."' and  idpccat='10' and idpcsubcat='".$idpcsubcat."' and idpuntomed='".$idpuntolectura."' order by dia desc limit 0,5";
$result12=mysql_query ($sql12) or die ("Invalid result icarnet2");
$row12=mysql_affected_rows();

for($jt=0;$jt<5;$jt++){;

if (($row12==0) or ($jt>=$row12)) {;
$cantidad='0';
$total.="#";
$total.=$cantidad;
}else{;
$cantidad=mysql_result($result12,$jt,'cantidad');
$total.="#";
$total.=$cantidad;
};

};

$total.="<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
