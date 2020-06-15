<?
include('bbdd.php');

$sql12 = "SELECT * from siniestros where idempresa='".$idempresa."' and  idempleado='".$idempleado."' and terminado='1'";
//echo $sql12;
$result12=mysql_query ($sql12) or die ("Invalid result icarnet 1");
$row12=mysql_affected_rows();
$row2=ceil($row12/5);

$sql1 = "SELECT * from siniestros where idempresa='".$idempresa."' and  idempleado='".$idempleado."' and terminado='1' order by diaasignacion asc, horaasignacion asc, id desc limit ".$valor.", 5";
//echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result icarnet 2");
$row=mysql_affected_rows();


if ($row==0){;
	$rep=0;
	
	}else{;
	
for($j=0;$j<$row;$j++){;
$id=mysql_result($result1,$j,'idsiniestro');
$contacto=mysql_result($result1,$j,'contacto');
$telefono=mysql_result($result1,$j,'telefono');
$dir=mysql_result($result1,$j,'direccion');
$cp=mysql_result($result1,$j,'cp');
$loc=mysql_result($result1,$j,'localidad');
$pro=mysql_result($result1,$j,'provincia');
$email=mysql_result($result1,$j,'email');
$diaasig=mysql_result($result1,$j,'diaasignacion');
$horaasig=mysql_result($result1,$j,'horaasignacion');
$desc=mysql_result($result1,$j,'descripcion');
$texto=$dir.' '.$cp.' '.$loc.' '.$pro;
$total=$id."#".$contacto."#".$telefono."#".$texto."#".$desc."#".$email."#".$diaasig."#".$horaasig."#".$row2."<.>";
$rep=$rep.$total;
};

};


echo ($rep);

?>
