<?php  
include('bbdd.php');

include('../portada_n/cabecera2.php');

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
switch($tipo){
case 1: $nc=$resultado31['clientes'];break;
case 2: $nc=$resultado31['puestos'];break;
}
$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
switch($tipo){
case 1: $ic=$resultado32['clientes'];break;
case 2: $ic=$resultado32['puestos'];break;
};

?>



<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCI&OacuteN DE <?php  echo strtoupper($nc);?> DESDE FICHERO</p></div>
<div class="contenido">


<?php 
if ($idct==null){;?>
Estructura del fichero csv que debes de crear:

<table>
<tr>
<td class="tit">Nombre del Puesto de Trabajo</td>
<td class="tit">NIF</td><td>
<td class="tit">Direcci&oacuten</td>
<td class="tit">C&oacutedigo Postal</td>
<td class="tit">Localidad</td>
<td class="tit">Provincia</td>
<?php 
$dat2=array('entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento');
$dat=array('mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento');

$sql10="select * from servicios where idempresa='".$ide."'"; 
$result10=mysqli_query($conn,$sql10) or die ("Invalid result clientes");
$resultado10=mysqli_fetch_array($result10);

$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";
$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
?>


<?php for ($t=0;$t<count($dat);$t++){;?>

<?php 
$dgtt=$resultado10[$dat[$t]];
$sernom=$resultado31[$dat[$t]];
if ($dgtt==1){;
?>
<td class="tit"><?php  echo $sernom;?></td>



<?php };?>

<?php };?>
</tr>
</table>

*NOTA:<br/> 
Los campos en negrita deben de ser rellenados con valores 0 (si no quieres) y 1 (si lo quieres) para cada uno de los clientes
<p>&nbsp;</p>
<p>&nbsp;</p>

<div class="outer-container">
  <form action="fclientes.php" method="post"
      name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
      <input type="hidden" value="1" name="idct">
    <div>
      <label>Elija Archivo Excel</label>
      <input type="file" name="file"
              id="file" accept=".csv">
      <button type="submit" id="submit" name="import"
              class="btn-submit">Importar Registros</button>
    </div>
  </form>
</div>



<p>&nbsp;</p>


<?php } else {;?>



<?php 
 
 
    if(isset($_POST['import']))
    {
        //Aquí es donde seleccionamos nuestro csv
         $fname = $_FILES['file']['name'];
         echo 'Cargando nombre del archivo: '.$fname.' <br>';
         $chk_ext = explode(".",$fname);
 
         if(strtolower(end($chk_ext)) == "csv")
         {
             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['file']['tmp_name'];
             $handle = fopen($filename, "r");
 
             while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
             {
               //Insertamos los datos con los valores...
                $sql = "INSERT into prueba (texto) values('$data[0]')";
                mysqli_query($sql) or die('Error: '.mysqli_error());
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
             echo "Importación exitosa!";
         }
         else
         {
            //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             
//ver si esta separado por " , "
             echo "Archivo invalido!";
         }
         }

 
?>


<p>&nbsp;</p>

<?php };?>

