<?
include('bbdd.php');

/*
$sql12 = "SELECT * from puntoslectura where idempresas='".$idempresa."' and  idclientes='".$idclientes."'";
$result12=mysql_query ($sql12) or die ("Invalid result icarnet1");
$row12=mysql_affected_rows();
$row2=ceil($row12/5);
*/
$sql1 = "SELECT * from puntoslectura where idempresas='".$idempresa."' and  idclientes='".$idclientes."' order by idpuntoslectura asc";
$result1=mysql_query ($sql1) or die ("Invalid result icarnet2");
$row=mysql_affected_rows();
if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
$id=mysql_result($result1,$j,'idpuntoslectura');
$nombre=mysql_result($result1,$j,'nombre');
$total=$id."#".$nombre."<.>";
$rep=$rep.$total;
}}


echo ($rep);

?>
