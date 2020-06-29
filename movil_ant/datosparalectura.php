<?
include('bbdd.php');


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

$sql12 = "SELECT * from almpc where idempresas='".$idempresa."' and  idpiscina='".$idclientes."' and  idpccat='10' and idpcsubcat='".$idpcsubcat."' and idpuntomed='".$idpuntolectura."' order by dia desc limit 0,5";
$result12=mysql_query ($sql12) or die ("Invalid result icarnet2");
$row12=mysql_affected_rows();
if ($row12==0){;
$cantidad='0';
$dia='sin lectura';
}else{;
$cantidad=mysql_result($result12,$jt,'cantidad');
$dia=mysql_result($result12,$jt,'dia');
};
$total=$idpccat."#".$idpcsubcat."#".$nombre."#".$cantidad."#".$dia."<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
