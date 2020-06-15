<?php  
include('bbdd.php');
$idpccat=1;

if ($ide!=null){;

 include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE ENTRADA / SALIDA POR EMPLEADO</p></div>
<div class="contenido">
<?php 
switch($tipo){
	case "dia": include("infdial.php");break;
	case "mes": include("infmesl.php");break;
	case "anual": include("infanuall.php");break;
	case "entre": include("infentrel.php");break;
};
?>

<?php } else {;
include ('../../cierre.php');
 };?>