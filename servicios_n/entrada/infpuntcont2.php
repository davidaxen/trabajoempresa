<?php  
include('bbdd.php');
$idpccat=1;

if ($ide!=null){;

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
$nc1=$resultado31['clientes'];
$nc2=$resultado31['empleados'];

$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
$ic1=$resultado32['clientes'];
$ic2=$resultado32['empleados'];

include('../../portada_n/cabecera3.php');

?>

<div id="main">
<div class="titulo">
<p class="enc">INFORME DE ENTRADA / SALIDA</p></div>
<div class="contenido">

<style>
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  height:400px;
}
</style>


<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Clientes')"><img src="../../img/<?php echo $ic1;?>" width="25px">&nbsp;<?php echo strtoupper($nc1);?></button>
  <button class="tablinks" onclick="openCity(event, 'Empleados')"><img src="../../img/<?php echo $ic2;?>" width="25px">&nbsp;<?php echo strtoupper($nc2);?></button>
</div>

<div id="Clientes" class="tabcontent">
  <iframe src="infclientes.php"  style="height:400px;width:100%;border:none;"></iframe>
</div>

<div id="Empleados" class="tabcontent">
    <iframe src="infempleados.php"  style="height:400px;width:100%;border:none;"></iframe>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>
