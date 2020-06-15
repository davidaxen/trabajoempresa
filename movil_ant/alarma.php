<?
include('bbdd.php');

$y1=strtok($dia,'-');
$m1=strtok('-');
$d1=strtok('-')+1;
$dia1=$y1.'-'.$m1.'-'.$d1;

$sql1 = "SELECT * from alarma where idempresas='".$idempresa."' and  idclientes='".$idclientes."' and dia between '".$dia."' and '".$dia1."' order by dia asc, h asc, min asc";
//echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
$row=mysql_affected_rows();

if ($row==0){
	$rep=0;
	}else{
	
for($j=0;$j<$row;$j++){;
$id=mysql_result($result1,$j,'id');
$dia=mysql_result($result1,$j,'dia');
$h=mysql_result($result1,$j,'h');
$min=mysql_result($result1,$j,'min');
$seg=mysql_result($result1,$j,'seg');
$hora=$h.":".$min.":".$seg;
$texto=mysql_result($result1,$j,'mensaje');
$total=$id."#".$dia."#".$hora."#".$texto."<.>";
$rep=$rep.$total;
}}

echo ($rep);
?>