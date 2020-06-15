<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES CON LOS PUNTOS DE  <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php if ($dat=="h"){;?>
<div class="main">
<span class="caja2">Puntos Globales</span>

<a href="ipuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Creación<br/>Puntos Globales
</span>
</a>

<a href="mpuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/pencil.png" width="30" height="30" />
</div>
</div>
<br/>Modificación<br/>Puntos Globales
</span>
</a>


<span class="caja2">Puntos para Puestos de Trabajo</span>
<a href="ipuntconti.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconpoint.png" width="30" height="30" />
</div>
</div>
<br/>Elección de Puntos<br/>Puestos de Trabajo
</span>
</a>

<a href="mpuntconti.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/pencil.png" width="30" height="30" />
</div>
</div>
<br/>Modificación de Puntos<br/>Puestos de Trabajo
</span>
</a>

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
<br/>Ver de Informe
</span>
</a>
</span>
</div>
<?php };?>

</div>
</div>

<?php } else {;

include('../../cierre.php');

};?>
