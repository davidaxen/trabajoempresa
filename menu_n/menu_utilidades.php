<?php
include('bbdd.php');

if ($ide!=null){;

 include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">UTILIDADES</p></div>
<div class="contenido">

<?php 
$sql="select * from menuutilidades where user='".$user."' and idempresa='".$ide."'";
$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menucontabilidad");
$c[1]=mysqli_result($result,0,'fax');
$c[2]=mysqli_result($result,0,'etiquetas');
$c[3]=mysqli_result($result,0,'sobres');
$c[4]=mysqli_result($result,0,'calendariolaboral');
$c[5]=mysqli_result($result,0,'publicidad');
$c[6]=mysqli_result($result,0,'gpubli');
$nc[6]=mysqli_result($result31,0,'usuarios');

$sql31="select * from menuutilidadesnombre where idempresa='".$ide."'";
$result31=mysqli_query ($conn,$conn,$sql31) or die ("Invalid result menucontabilidad");
$nc[1]=mysqli_result($result31,0,'fax');
$nc[2]=mysqli_result($result31,0,'etiquetas');
$nc[3]=mysqli_result($result31,0,'sobres');
$nc[4]=mysqli_result($result31,0,'calendariolaboral');
$nc[5]=mysqli_result($result31,0,'publicidad');
$nc[6]=mysqli_result($result31,0,'gpubli');
$nc[7]=mysqli_result($result31,0,'usuarios');

$sql32="select * from menuutilidadesimg where idempresa='".$ide."'";
$result32=mysqli_query ($conn,$conn,$sql32) or die ("Invalid result menucontabilidad");
$ic[1]=mysqli_result($result32,0,'fax');
$ic[2]=mysqli_result($result32,0,'etiquetas');
$ic[3]=mysqli_result($result32,0,'sobres');
$ic[4]=mysqli_result($result32,0,'calendariolaboral');
$ic[5]=mysqli_result($result32,0,'publicidad');
$ic[6]=mysqli_result($result32,0,'gpubli');
$ic[7]=mysqli_result($result32,0,'usuarios');

$sql33="select * from menuutilidadesenlace where idempresa='".$ide."'";
$result33=mysqli_query ($conn,$conn,$sql33) or die ("Invalid result menucontabilidad");
$enc[1]=mysqli_result($result33,0,'fax');
$enc[2]=mysqli_result($result33,0,'etiquetas');
$enc[3]=mysqli_result($result33,0,'sobres');
$enc[4]=mysqli_result($result33,0,'calendariolaboral');
$enc[5]=mysqli_result($result33,0,'publicidad');
$enc[6]=mysqli_result($result33,0,'gpubli');
$enc[7]=mysqli_result($result33,0,'usuarios');





?>

<div id="main">
<?php  for ($j=1;$j<count($c)+1;$j++){;
if ($c[$j]=='1'){;?><span id="caja"><a href="<?php  echo $enc[$j];?>">
<img src="../img/<?php  echo $ic[$j];?>" width="64px"><br/>
<?php  echo $nc[$j];?></a></span>
<?php };
 };?>


</div>
</div>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>