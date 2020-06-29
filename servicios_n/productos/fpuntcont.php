<?php  
include('bbdd.php');
?>

<?php  include('../../portada_n/cabecera3.php');?>



<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCI&OacuteN <?php  echo strtoupper($nc);?> DESDE FICHERO</p></div>
<div class="contenido">


<?php 
if ($idct==null){;?>
Estructura del fichero csv que debes de crear:

<table>
<tr>
<td class="tit">Nombre</td>

</tr>
</table>

*NOTA:<br/> 
Los campos en negrita deben de ser rellenados con valores 0 (si no quieres) y 1 (si lo quieres) para cada uno de los clientes
<p>&nbsp;</p>
<p>&nbsp;</p>

<div class="outer-container">
  <form action="fpuntcont.php" method="post"
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


$idpccat=5;
         	
$sqlid="SELECT idpcsubcat from puntservicios where idempresas='".$ide."' and idpccat='".$idpccat."' order by idpcsubcat desc";
//echo $sqlid;
$resultid=mysql_query($sqlid);
$row=mysql_affected_rows();
if ($row==0){;
$p=1;
}else{;
$idult=mysql_result($resultid,0,'idpcsubcat');
$p=$idult+1;
};
//echo $idnue;   


      	
               //Insertamos los datos con los valores...
 $sql = "INSERT INTO puntservicios (idempresas,idpccat,idpcsubcat,subcategoria,rellr,rellg,rellb,activo) VALUES ('$ide','$idpccat','$p','$data[0]','ff','ff','ff','1')";
              //echo $sql.'<br>';
               mysql_query($sql) or die('Error: '.mysql_error());
   
               
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

