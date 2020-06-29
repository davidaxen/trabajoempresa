<?
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ent_nombre";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 


$sql1="SELECT * from menuserviciosnombre where idempresa='".$idempresa."'";
$result1=mysql_query ($sql1) or die ("Invalid result sql1");
$row=mysql_affected_rows();



if($row==1){;
include('servicios.php');
$entr=mysql_result($result1,0,'entrada');
$rep=$total.';'.$entr;
}else{;
$rep="error";
};

$gt="rep-".$rep."-ent_nombre";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 

echo ($rep);

?>
