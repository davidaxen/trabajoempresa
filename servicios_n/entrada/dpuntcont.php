<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES CON LOS PUNTOS <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php if ($dat=="h"){?>
<div class="main">
<span class="caja2">Puntos Entrada y salidas</span>

<a href="ipuntconti.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconpoint.png" width="30" height="30" />
</div>
</div>
<br/>Elección de Puntos</span>
</a>
<!--</div>
-->
<?php }?>


<?php if ($dat=="i"){?>
<div class="main">
<span class="caja2">Informe</span>
<?php if ($idtrab==0){;?>
<a href="infpuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Ver de Informe<br/>Puestos de Trabajo</span>
</a>
<?php };?>
<?php if ($idcli==0){;?>
<a href="infpuntconte.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Ver de Informe<br/>Empleados</span>
</a>
<?php };?>
</div>
<?php };?>


</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>