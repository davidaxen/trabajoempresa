<?php  
include('bbdd.php');

if ($ide!=null){;

include('../portada_n/cabecera2.php');
 include('../estilo/acordeon.php'); 
?>


<div id="main">
<div class="titulo">
<p class="enc">MI CUENTA</p>
</div>
<div class="contenido"  style="padding-left:10px">


<style>
a {text-decoration:none}
a hover: {text-decoration:none}
		
</style>

<form action="intro2.php" method="post" enctype="multipart/form-data" name="formulario" id="formulario">
<input type="hidden" name="tablas" value="modificar">
<input type="hidden" name="subtabla" value="portadapg">
<input type="hidden" name="idcm" value="20">

<div class="accordion">
<img src="../img/iconos/titulos.png" width="32px" style="vertical-align:middle;"> Paginas de Portada
</div>
<div class="panel" style="display:block;">

<table>
<?php 
$sql33="select * from portadapag where idempresa='".$idempresas."'";

$result33=$conn->query($sql33);
$mostrar33=$conn->query($sql33);
$fetchAll33=$result33->fetchAll();
$row33=count($fetchAll33);

//$result33=mysqli_query ($conn,$sql33) or die ("Invalid result232");
//$row33=mysqli_num_rows($result33);

$sql34="select * from paginapor";

$result34=$conn->query($sql34);
$mostrar34=$conn->query($sql34);
$fetchAll34=$result34->fetchAll();
$row34=count($fetchAll34);

//$result34=mysqli_query ($conn,$sql34) or die ("Invalid result232");
//$row34=mysqli_num_rows($result34);




if ($row33==0){;
for ($j=0;$j<7;$j++){;
$u=$j+1;
echo "<input type='hidden' name='portadapaga[$j]' value=''>";
echo "<tr><td>Pagina $u</td><td><select name='portadapag[$j]'>";
echo "<option value=''>Elige una</option>";

foreach ($mostrar34 as $row) {

//for ($t=0;$t<$row34;$t++){;

//mysqli_data_seek($result34,$t);
//$resultado34=mysqli_fetch_array($result34);
$titulopor=$row['titulo'];
$idpagpor=$row['idpag'];
echo "<option value='$idpagpor'>$titulopor</option>";
};

echo "</select>";

};

}else{

$u = 0;

//var_dump($row33);

foreach ($mostrar33 as $row) {

$u = $u + 1;

//for ($j=0;$j<7;$j++){;
//$u=$row+1;
//mysqli_data_seek($result33,$j);
//$resultado33=mysqli_fetch_array($result33);
$idpag=$row['idpag'];
$idppag=$row['idportada'];
echo "<input type='hidden' name='portadapaga[$j]' value='$idpag'>";
echo "<input type='hidden' name='idportadapaga[$j]' value='$idppag'>";
echo "<tr><td>Pagina $u</td><td><select name='portadapag[$j]'>";
echo "<option value=''>Elige una</option>";

foreach ($mostrar34 as $row34) {

//for ($t=0;$t<$row34;$t++){;
//mysqli_data_seek($result34,$t);
//$resultado34=$result->fetch();
//$resultado34=mysqli_fetch_array($result34);
$titulopor=$row34['titulo'];
$idpagpor=$row34['idpag'];

//var_dump($titulopor);

echo "<option value='$idpagpor'";
if ($idpag==$idpagpor){;
echo " selected ";
};
echo ">$titulopor</option>";
};

echo "</select></td></tr>";

};


};

?>

</table>
</div>


<button class="accordion">
<img src="../img/iconos/enviar.png" width="32px" style="vertical-align:middle;">  Enviar
</button>


</form>
</div>
<?php  include ('../js/acordeonjs.php');?>

</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>
