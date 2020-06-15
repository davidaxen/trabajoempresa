<?php 
include('bbdd.php');

if ($ide!=null){;


include('../../../portada_n/cabecera4.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES CON <?=strtoupper($nc);?></p></div>
<div class="contenido">

<div id="main">
<span><div class="enctab">Gesti&oacuten de Ordenes</div></span>
<?if ($dat=="h"){;?>
<span><a href="ipuntcont.php">
<div style="position:relative">
<img src="../../../img/<?=$ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Alta de Ordenes</a></span>
<!--
<span><a href="cpuntcont.php">
<div style="position:relative">
<img src="../../img/<?=$ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Cierre de Ordenes</a></span>
-->
<span><a href="mpuntcont.php">
<div style="position:relative">
<img src="../../../img/<?=$ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../../img/pencil.png" width="30" height="30" />
</div>
</div>
<br/>Modificaci&oacuten de Ordenes</a></span>
<?};?>

<?if ($dat=="i"){;?>
<span><a href="lpuntcont.php">
<div style="position:relative">
<img src="../../../img/<?=$ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Listado de Ordenes</a></span>
<?};?>
</div>

<div id="main">
<span><div class="enctab">Asignaci&oacuten y seguimiento de Ordenes</div></span>

<?if ($dat=="h"){;?>
<span><a href="ipuntconti.php">
<div style="position:relative">
<img src="../../../img/<?=$ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Asignaci&oacuten de Ordenes</a></span>

<span><a href="mpuntconti.php">
<div style="position:relative">
<img src="../../../img/<?=$ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../../img/pencil.png" width="30" height="30" />
</div>
</div>
<br/>Modificaci&oacuten de Asignaci&oacuten</a></span>
<?};?>

<?if ($dat=="i"){;?>
<span><a href="lpuntconti.php">
<div style="position:relative">
<img src="../../../img/<?=$ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Listado de Asignaciones</a></span>
<?};?>
</div>



<div id="main">
<span><div class="enctab">Informes</div></span>

<?if ($dat=="h"){;?>
<span><a href="lpuntcont.php">
<div style="position:relative">
<img src="../../../img/<?=$ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Informe</a></span>

<?};?>
</div>

</div>
</div>




<?} else {;?>

Por favor, no tiene acceso a esta opción,<br>
vuelva a la página inicial pinchando <a href="http://www.smartcbc.com">aquí</a>

<?};?>