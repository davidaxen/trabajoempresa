<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ACCIONES DE <?php  echo strtoupper($nc);?></p></div>
<div class="contenido">


<div id="main">
<span><a href="acuadrante.php">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/plus.png" width="30" height="30" />
</div>
</div>
<br/>Alta de Datos</a></span>
<span><a href="mcuadrante.php">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/pencil.png" width="30" height="30" />
</div>
</div>
<br/>Modificación de Datos</a></span>
<span><a href="lcuadranteemp.php">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Listado por Empleados</a></span>
<span><a href="lcuadrantecom.php">
<div style="position:relative">
<img src="../../img/<?php  echo $ic;?>" width="64px">
<div style="position:absolute; top:0;right:0;">
<img border="0"  src="../../img/iconlis.png" width="30" height="30" />
</div>
</div>
<br/>Listado por Comunidad</a></span>
</div>


</div>
</div>

<?php } else {;

include('../../cierre.php');
};?>