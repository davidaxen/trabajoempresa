<?php  
include('bbdd.php');
$idpccat=1;
if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE ENTRADA / SALIDA</p></div>
<div class="contenido">

<?php 
switch($tipo){
	case "dia": include("infdia.php");break;
	case "mes": include("infmes.php");break;
	case "anual": include("infanual.php");break;
	case "entre": include("infentre.php");break;
};
?>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>
