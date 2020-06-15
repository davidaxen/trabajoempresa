<?
include('bbdd.php');
/*
$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon) VALUES ('$idempresa','$idempleado','$idcomunidad','$idcat','$idsubcat','$dia','$hora','$lat','$lon')";
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
*/

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-puesto -";
$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos"); 



$sql1="SELECT * from clientes where idempresas='".$idempresa."' and idclientes='".$idcomunidad."'";
$result1=mysql_query ($sql1) or die ("Invalid result sql1");
$row=mysql_affected_rows();

//$estado=mysql_result($result1,0,'estado');

//if ($estado==1){
if($row==1){;
include('servicios2.php');
$rep1=$total;
}else{;
$rep1="error";
};
//echo $rep1."<br>";
$puest[0]=strtok($rep1,";");
$puest[1]=strtok(";");
$puest[2]=strtok(";");
$puest[3]=strtok(";");
$puest[4]=strtok(";");
$puest[5]=strtok(";");
$puest[6]=strtok(";");
$puest[7]=strtok(";");
$puest[8]=strtok(";");
$puest[9]=strtok(";");
$puest[10]=strtok(";");
$puest[11]=strtok(";");
$puest[12]=strtok(";");
$puest[13]=strtok(";");
$puest[14]=strtok(";");
$puest[15]=strtok(";");

$sql1="SELECT * from empleados where idempresa='".$idempresa."' and idempleado='".$idempleado."'";
//echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result sql1");
$row01=mysql_affected_rows();


if($row01==1){;
include('servicios2.php');
$rep01=$total;
}else{;
$rep01="error";
};
//echo $rep01."<br>";

$empl[0]=strtok($rep01,";");
$empl[1]=strtok(";");
$empl[2]=strtok(";");
$empl[3]=strtok(";");
$empl[4]=strtok(";");
$empl[5]=strtok(";");
$empl[6]=strtok(";");
$empl[7]=strtok(";");
$empl[8]=strtok(";");
$empl[9]=strtok(";");
$empl[10]=strtok(";");
$empl[11]=strtok(";");
$empl[12]=strtok(";");
$empl[13]=strtok(";");
$empl[14]=strtok(";");
$empl[15]=strtok(";");

$rep="";

for ($y=0;$y<16;$y++){;

if($puest[$y]==$empl[$y]){;
if($puest[$y]==""){
$rep.="0;";
}else{
$rep.=$puest[$y].";";
}
}else{
$rep.="0;";	
	};

};

$valores1 = implode(",", array_keys($rep));
$valores1 .="   ";
$valores1 .= implode(",", array_values($rep));


$gt="rep-".$rep."-puesto";
$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysql_query($sql1) or die ("Invalid result datos");

echo ($rep);
 
//}else{
//	include("alta_estado.php");
//	};



?>
