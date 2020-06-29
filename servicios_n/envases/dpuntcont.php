<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES CON LOS <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">


<?php if ($dat=="h"){;?>
<div class="main">
<span class="caja2">Acciones</span>
<a href="ipuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/plus.png" width="30" height="30" />
</div>
</div>

<br/>Alta de <?php  echo $nc;?></span></a>
<a href="mpuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/pencil.png" width="30" height="30" />
</div>
</div>

<br/>Modificación de <?php  echo $nc;?></span></a>

<a href="lpuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconqr.png" width="30" height="30" />
</div>
</div>

<br/>Listado y Códigos de <?php  echo $nc;?></span></a>
<!--</div>-->
<?php };?>


<?php if ($dat=="i"){;?>
<div id="main">
<span class="caja2">Informe</span>

<a href="infpuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Ver de Informe</span></a>
</span>
</div>
<?php };?>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>
