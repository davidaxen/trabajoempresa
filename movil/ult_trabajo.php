<?php 
include('bbdd.php');

$valores1 = implode(",", array_keys($_GET));
$valores1 .="   ";
$valores1 .= implode(",", array_values($_GET));



$gt="idempresa-".$valores1."-ult_trabajo";

$sql1="INSERT INTO prueba (texto) VALUES ('".$gt."')";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result datos"); 




$sql12 = "SELECT * from trabajos where idempresa='".$idempresa."' and  idempleado='".$idempleado."' and terminado='1'";
//echo $sql12;
$result12=mysqli_query($conn,$sql12) or die ("Invalid result icarnet 1");
$row12=mysqli_num_rows($result12);

$row2=ceil($row12/5);

$sql1 = "SELECT * from trabajos where idempresa='".$idempresa."' and  idempleado='".$idempleado."' and terminado='1' order by diaasignacion desc, horaasignacion desc, id desc limit ".$valor.", 5";
//echo $sql1;
$result1=mysqli_query($conn,$sql1) or die ("Invalid result icarnet 2");
$row=mysqli_num_rows($result1);


if ($row==0){;
	$rep=0;
	
	}else{;
	
for($j=0;$j<$row;$j++){;
mysqli_data_seek($result1, $j);
$resultado1=mysqli_fetch_array($result1);
$id=$resultado1['idsiniestro'];
$contacto=$resultado1['contacto'];
$telefono=$resultado1['telefono'];
$dir=$resultado1['direccion'];
$cp=$resultado1['cp'];
$loc=$resultado1['localidad'];
$pro=$resultado1['provincia'];
$email=$resultado1['email'];
$diaasig=$resultado1['diaasignacion'];
$horaasig=$resultado1['horaasignacion'];
$desc=$resultado1['descripcion'];
$texto=$dir.' '.$cp.' '.$loc.' '.$pro;
$total=$id."#".$contacto."#".$telefono."#".$texto."#".$desc."#".$email."#".$diaasig."#".$horaasig."#".$row2."<.>";
$rep=$rep.$total;
};

};


echo ($rep);

?>
