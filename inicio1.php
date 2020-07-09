<?php 
include('bbdd.php');
//print_r($_COOKIE);

if ($com=='comprobacion'){
	


$sql="select * from usuarios where user='".$gente."' and password='".$part."'";
//echo $sql;
//echo hash('sha512',$part);

$result=$conn->query($sql);
$resultados=$result->fetchAll();

/*$result=mysqli_query ($conn, $sql) or die ("Invalid result sql");
$resultados = mysqli_fetch_array ($result);*/
				
$sql56="select * from proyectos where idproyectos='".$idpr."'";
//echo $sql56;



$result56=$conn->query($sql56);
$resultados56=$result56->fetchAll();
/*$result56=mysqli_query ($conn, $sql56) or die ("Invalid result sql56");
$resultados56 = mysqli_fetch_array ($result56);*/
$imgpr=$resultados56[0]['logo'];
$dprueba=$resultados56[0]['diasprueba'];
$nomproyectos=$resultados56[0]['nombre'];
$ct=$resultados56[0]['colorfondo'];
				
				setcookie("imgpr",$imgpr);
				$estado=$resultados[0]['estado'];
				$tusuario=$resultados[0]['tusuario'];
				$idempresacontrol=$resultados[0]['idempresas'];				
			
				$rgpd=$resultados[0]['rgpd'];
				$avisolegal=$resultados[0]['avisolegal'];

$sqlc="select * from empresas where idempresas='".$idempresacontrol."'";
//echo $sql;
//echo hash('sha512',$part);


$resultc=$conn->query($sqlc);
$resultadosc=$resultc->fetchAll();
/*$resultc=mysqli_query ($conn, $sqlc) or die ("Invalid result sql");
$resultadosc = mysqli_fetch_array ($resultc);*/
$malta=$resultadosc[0]['mesalta'];
$yalta=$resultadosc[0]['yearalta'];
$dalta=$resultadosc[0]['diaalta'];

$fhoy=time();				
$flimite=mktime(0,0,0,$malta,$dalta+$dprueba,$yalta);

if (($estado==2) and ($fhoy>$flimite)){
				setcookie("idempresacontrol",$idempresacontrol);
				setcookie("tusuario",$tusuario);
				$pag='indexpruebasuperada.php'; 
				//echo $pag;

				include_once($pag);

}else{

				
				if (($rgpd!=1) or ($avisolegal!=1)){;
				$pag='indexpruebadatos.php'; 
				//echo $pag;

				include_once($pag);
					}else{
				
if ($tusuario==1){;
$pag1="inicio1.php";

setcookie("pag1",$pag1);
}; 			
				$clivpunt=$resultados[0]['idcliente'];
				
				$idu=$resultados[0]['id'];
				
				
				$sql10="select * from visitas where usuario='".$gente."' order by dia desc,hora desc"; 

				$result10=$conn->query($sql10);
				$resultados10=$result10->fetch();

				$result10row=$conn->query($sql10);
				$fetchAll10=$result10row->fetchAll();
				$row10=count($fetchAll10);

				if($row10==0){
			      	$dia1="Bienvenido";
					$hora1="";

			    }else{
			    	/*foreach ($conn->query($sql) as $resultados10fila) {
			          	$dia1=$resultados10fila['dia'];
						$hora1=$resultados10fila['hora'];
						etcookie("dia1",$dia1);
						setcookie("hora1",$hora1);
			         }*/

					$dia1=$resultados10['dia'];
					$hora1=$resultados10['hora'];
					setcookie("dia1",$dia1);
					setcookie("hora1",$hora1);
				}
				/*$result10=mysqli_query ($conn, $sql10) or die ("Invalid result empresas 10");
				$resultados10 = mysqli_fetch_array ($result10);*/
				//$row10=mysqli_num_rows($result10);

				/*if ($row10==0){;
				$dia1="Bienvenido";
				$hora1="";
				}else{;
				$dia1=$resultados10['dia'];
				$hora1=$resultados10['hora'];
				setcookie("dia1",$dia1);
				setcookie("hora1",$hora1);
				};*/
				
				
				$pag='indexprueba'.$modulo.'.php'; 
				//echo $pag;
				include_once($pag);

};
	
	};		
	
/*$colum=$result->getColumnMeta(1);		
var_dump($colum['name']);*/
}else{;

include ('cierre.php');
};?>