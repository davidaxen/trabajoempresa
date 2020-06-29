<?
//extract($_GET);
extract($_COOKIE);
//extract($_POST);

if ($com=='comprobacion'){;

?>
<? include('portada_n/cabecera.php');?>

<!--
<div class="colocacion centro">

</div>
-->

<div class="colocacion derecha">

<!-- arriba  -->
<div class="posicion t0 l0 w800 h60">
<? include('portada_n/portada2.php');?>
</div>

<div class="posicion t0 l905 w246 h60">
<? include('logo2.php');?>
</div>


<!-- medio -->
<div class="posicion t65 l0 w555 h250">
<center class="enc2">Ultimas Entradas</center>
<iframe  style="border:0" name="arriba" src="portada_n/ultimasentradas.php" width="550" height="230" scrolling="auto"></iframe>
</div>

<div class="posicion t65 l565 w555 h250">
<center class="enc2">Ultimas Incidencias</center>
<iframe  style="border:0" name="arriba" src="portada_n/ultimasincidencias.php" width="550" height="230" scrolling="auto"></iframe>
</div>

<!-- abajo -->
<div class="posicion t320 l0 w246 h140">

<iframe style="border:0" name="abajo" src="utilidades_n/1a2.php" width="390" height="330" scrolling="no"></iframe>
</div>

<div class="posicion t320 l250 w900 h140">
<center class="enc2">Puesto sin Personal</center>
<iframe style="border:0" name="abajo" src="portada_n/ultimasalarmas.php" width="390" height="330" scrolling="no"></iframe>
</div>










   		


</div>
    

	



hola
</body>

</html>
<?}else{;?>
<html>
<head>
<title>
SMARTCBC - PROGRAMA DE GESTION DE PERSONAL Y TRABAJO - 
</title>
<link rel="stylesheet" href="estilo/estilo.css">
</head>
<body>
<img src="/img/smartcbc_logo.png" height=80>
<p> </p>
<center>No tiene permisos para acceder a la pagina de native</center>
<a href="https://www.nativecbc.com">Ir al inicio</a>

</body>

</html>
<?};?>