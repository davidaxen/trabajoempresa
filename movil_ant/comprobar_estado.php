<?
include('bbdd.php');
$sql="SELECT estado,codigo from clientes where idempresas='".$idempresa."' and idclientes='".$idcomunidad."'";
$result=mysql_query ($sql) or die ("Invalid result datosempl");
$row=mysql_affected_rows();
if($row==1){;
$estado=mysql_result($result,0,'estado');
$codigo=mysql_result($result,0,'codigo');
$rep=$estado;
}else{;
$rep="0";
	};
echo ($rep);

?>
