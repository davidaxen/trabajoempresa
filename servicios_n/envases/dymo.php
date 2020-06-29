<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>


<div id="main">
<div class="titulo">
<p class="enc">ETIQUETAS DYMO PARA <?php  echo strtoupper($nc);?><br/><?php  echo $idenvases;?></p></div>
<div class="contenido">
<p>&nbsp;</p>
<table>
<tr class="menor1">
<td>Etiquetas S0722370 - 99012 ( 89 mm x 36 mm )</td>
<td><a href="pdfcontpiscd.php?idenvases=<?php  echo $idenvases;?>&pis=g" target="_blank"><img src="../../img/dymo.png" alt="modificar" border=0 width=20></a>
</td>
</tr>

<tr class="menor1">
<td>Etiquetas S0722540 ( 57 mm x 32 mm )</td>
<td><a href="pdfcontpiscd1.php?idenvases=<?php  echo $idenvases;?>&pis=g" target="_blank"><img src="../../img/dymo.png" alt="modificar" border=0 width=20></a>
</td>
</tr>

<tr class="menor1">
<td>Etiquetas S0929120 ( 25 mm x 25 mm )</td>
<td><a href="pdfcontpiscd2.php?idenvases=<?php  echo $idenvases;?>&pis=g" target="_blank"><img src="../../img/dymo.png" alt="modificar" border=0 width=20></a>
</td>
</tr>

</table>
</div>
</div>
<?php } else {;
include ('../../cierre.php');
 };?>