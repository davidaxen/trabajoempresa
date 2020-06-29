<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ult_inci";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 


$valores=$idcomunidad;

$sql10="SELECT * from clientes where idempresas='".$idempresa."' and idclientesprin='".$idcomunidad."'"; 
$result10=mysql_query ($sql10) or die ("Invalid result");
$row10=mysql_affected_rows();
if ($row10>0){
for($ja=0;$ja<$row10;$ja++){;
	$idclientes=mysql_result($result10,$ja,'idclientes');
$valores=$valores.','.$idclientes;
};
}



$sql1 = "SELECT dia,hora,texto,imagen,idpiscina from almpcinci where idempresas='".$idempresa."' and  idpiscina in (".$valores.") order by id desc limit ".$valor.", 5";
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
$row=mysql_affected_rows();
if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;

	$idclientes=mysql_result($result1,$j,'idpiscina');

$dia=mysql_result($result1,$j,'dia');
$hora=mysql_result($result1,$j,'hora');
$texto=mysql_result($result1,$j,'texto');
$imagen=mysql_result($result1,$j,'imagen');

if ($idclientes!=$idcomunidad){
$sql11="SELECT * from clientes where idempresas='".$idempresa."' and idclientes='".$idclientes."'"; 
$result11=mysql_query ($sql11) or die ("Invalid result");
$nombre=mysql_result($result11,0,'nombre');
$texto=strtoupper($nombre)." - ".$texto;
};


$total=$dia."#".$hora."#".$texto."#".$imagen."<.>";
$rep=$rep.$total;
}

}


echo ($rep);







?>
