<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES CON <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">

<?php if ($dat=="h"){?>
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
<br/>Crear <?php  echo $nc;?></span></a>
<a href="apuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Asignar Clientes a <?php  echo $nc;?></span></a>
<a href="epuntcont.php">
<span class="caja">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Asignar Empleados a <?php  echo $nc;?></span></a>
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
<img border="0"  src="../../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Listado de <?php  echo $nc;?></span></a>


<!--</div>-->
<?php };?>
<?php if ($dat=="i"){?>
<div class="main">
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
<?php };?>

</div>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>
