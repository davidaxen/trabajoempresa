<?php 
include('bbdd.php');

include ('yo.php');


$ip=$_SERVER['REMOTE_ADDR'];
$dt=date("Y-m-d",time());
$tm=date("G:i:s",time());

if(isset($img)==false) {
$img=null;
}	

if($img==null){;
$sql55 = "INSERT INTO visitas (usuario,dia,hora,ip) VALUES ('$user','$dt','$tm','$ip')";
$result55=$conn->exec($sql55);
//$result55=mysqli_query ($conn, $sql55) or die ("Invalid result user");
};

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($pass, METHOD, $key, 0, $iv);
			$pass=base64_encode($output);


$sql="select * from usuarios where user='".$user."' and password='".$pass."'";
//echo $sql;

$result=$conn->query($sql);
$resultados=$result->fetchAll();

/*$result=mysqli_query ($conn, $sql) or die ("Invalid result idempresas");
$resultados = mysqli_fetch_array ($result);*/
	$idusuario=$resultados[0]['id'];
	$estado=$resultados[0]['estado'];
	$validar=$resultados[0]['validar'];
	$valor=$resultados[0]['idempresas'];
	$idpr=$resultados[0]['idpr'];
	$idcliente=$resultados[0]['idcliente'];
	$idempleados=$resultados[0]['idempleados'];
	$idgestor=$resultados[0]['idgestor'];
	$idrepresentante=$resultados[0]['idrepresentante'];
	$tusuario=$resultados[0]['tusuario'];
	$modulo=$resultados[0]['modulo'];
	$ide=$valor;
				
				setcookie("idusuario",$idusuario);
				setcookie("gente",$user);
				setcookie("part",$pass);
				setcookie("com","comprobacion");
				setcookie("idpr",$idpr);
				setcookie("ide",$ide);				
				setcookie("validar",$validar);
				setcookie("idempleados",$idempleados);
				setcookie("idgestor",$idgestor);
				setcookie("idcliente",$idcliente);
				setcookie("idrepresentante",$idrepresentante);
				setcookie("estado",$estado);
				setcookie("idtrab",$idempleados);
				setcookie("idcli",$idcliente);
				setcookie("idges",$idgestor);
				
	$sql1="select * from empresas where idempresas='".$ide."'"; 
	//echo $sql1;

	$result1=$conn->query($sql1);
	$resultados1=$result1->fetchAll();

	/*$result1=mysqli_query ($conn, $sql1) or die ("Invalid result sql1 ");
	$resultados1 = mysqli_fetch_array ($result1);*/
				$nemp=$resultados1[0]['nombre'];
				$img=$resultados1[0]['logotipo'];
				$imgpeq=$resultados1[0]['logotipopeq'];
				$firma=$resultados1[0]['firma'];
				$imgpl=$resultados1[0]['plantilla'];
				$plantillasobre=$resultados1[0]['plantillasobre'];
				$plantillacarnet=$resultados1[0]['plantillacarnet'];
				$plantilla=$resultados1[0]['plantilla'];
				$imghoja1=$resultados1[0]['imghoja1'];
				$imghoja2=$resultados1[0]['imghoja2'];
				$ico=$resultados1[0]['ico'];
				$colorarriba=$resultados1[0]['colorarriba'];
				$colorlateral=$resultados1[0]['colorlateral'];
				$colorcentral=$resultados1[0]['colorcentral'];
				
				setcookie("nemp",$nemp);
				setcookie("img",$img);
				setcookie("imgpeq",$imgpeq);
				setcookie("firma",$firma);
				setcookie("imgpl",$imgpl);
				setcookie("plantillasobre",$plantillasobre);
				setcookie("plantillacarnet",$plantillacarnet);
				setcookie("plantilla",$plantilla);
				setcookie("imghoja1",$imghoja1);
				setcookie("imghoja2",$imghoja2);				
				setcookie("ico",$ico);
				setcookie("colorarriba",$colorarriba);
				setcookie("colorlateral",$colorlateral);				
				setcookie("colorcentral",$colorcentral);	
				
				$email=$resultados1[0]['email'];
				$emailadmin=$resultados1[0]['emailadmin'];
				$web=$resultados1[0]['web'];
				if ($web==''){;
				$web='http://www.smartcbc.com';
				};
					setcookie("web",$web);			



switch($tusuario){;
case 0: $pag1="inicio0.php";$pag2="inicio0.php";setcookie("modulo",$modulo);setcookie("pag1",$pag1);setcookie("pag2",$pag2);break;
case 1: $pag1="inicio1.php";$pag2="inicio2.php";setcookie("modulo",$modulo);setcookie("pag1",$pag1);setcookie("pag2",$pag2);break;
case 2: $pag1="inicio1.php";$pag2="inicio2.php";setcookie("modulo",$modulo);setcookie("pag1",$pag1);setcookie("pag2",$pag2);break;
case 3: $pag1="inicio1.php";$pag2="inicio1.php";setcookie("modulo",$modulo);setcookie("pag1",$pag1);setcookie("pag2",$pag2);break;
case 4: $pag1="inicio1.php";$pag2="inicio1.php";setcookie("modulo",$modulo);setcookie("pag1",$pag1);setcookie("pag2",$pag2);break;
default: $pag1="estamos1.php";break;
};
/*
case 2: $pag1="inicio1c.php";$pag2="inicio2c.php";setcookie("modulo",$modulo);setcookie("pag1c",$pag1);setcookie("pag2c",$pag2);break;
case 3: $pag1="inicio1e.php";$pag2="inicio2e.php";setcookie("modulo",$modulo);setcookie("pag1e",$pag1);setcookie("pag2e",$pag2);break;
case 4: $pag1="inicio1g.php";$pag2="inicio2g.php";setcookie("modulo",$modulo);setcookie("pag1g",$pag1);setcookie("pag2g",$pag2);break;
case 5: $pag1="inicio1r.php";$pag2="inicio2r.php";setcookie("modulorep",$modulo);setcookie("pag1r",$pag1);setcookie("pag2r",$pag2);break;
*/	


	
switch($estado){;
case 0: 	$donde='index.php';break;
case 1:  $donde=$pag1;break;
case 2:  $donde=$pag2;break;
};


header( "Location: " . $donde );

?>