<?php  
include('bbdd.php');
$idpccat=1;


if ($ide!=null){;
include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ALTA DE PUNTOS DE ENTRADA / SALIDA</p></div>
<div class="contenido">


<?php 

if(!isset($idclientes)){
	$idclientes=null;
}


if ($idclientes==null){;?>
<?php 

$sql="SELECT * from clientes where idempresas='".$ide."' and entrada='1'";
//$sql.="and entrada='1'";
$result=$conn->query($sql);
$resultrow=$conn->query($sql);
$fetchAll=$resultrow->fetchAll();

if (count($fetchAll)!=0) {
	foreach($result as $row){

		$idclientes=$row['idclientes'];
		$sql2="SELECT * from codservicios where idempresas='".$ide."' and idclientes='".$idclientes."' and idpccat='".$idpccat."'"; 
		$result2=$conn->query($sql2);
		
		if ($result2->fetchColumn()==0) {
			$clientes[]=$idclientes;
		}else{
			$clientes[] = $idclientes;
		}
	}

}

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
if ($row!=0){;
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idclientes=$resultado['idclientes'];

$sql2="SELECT * from codservicios where idempresas='".$ide."' and idclientes='".$idclientes."' and idpccat='".$idpccat."'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result2");
//echo $sql2;
$row2=mysqli_num_rows($result2);
if ($row2==0){;
	$clientes[]=$idclientes;
}else{
	$clientes[] = $idclientes;

};
};
};*/

if (count($clientes)!=0){;
?>
<form action="ipuntconti.php" method="post">
<table>
<tr><td>Nombre del Puesto de Trabajo</td><td>
<select name="idclientes">
<option value="todos">Todos
<?php 
//print_r($clientes);

for ($h=0;$h<count($clientes);$h++){;
$sql3="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$clientes[$h]."'";
$result3=$conn->query($sql3);
$resultado3=$result3->fetch();

/*$result3=mysqli_query ($conn,$sql3) or die ("Invalid result3");
$resultado3=mysqli_fetch_array($result3);*/
$nombre=$resultado3['nombre'];
?>
<option value="<?php  echo $clientes[$h];?>"><?php  echo $nombre;?>
<?php };?>
</select></td></tr>
<?php 
$sql4="SELECT count(id) as t from puntservicios where idempresas='".$ide."' and idpccat='".$idpccat."' and activo='1'";
$result4=$conn->query($sql4);
$resultado4=$result4->fetch();

/*$result4=mysqli_query ($conn,$sql4) or die ("Invalid result4");
$resultado4=mysqli_fetch_array($result4);*/
$cantp=$resultado4['t'];
?>
<tr><td>Cantidad de Puntos</td>
<td><select name="cantpuntcont">
<option value="todos">Todos
<?php  for ($ty=0;$ty<$cantp;$ty++){;
$tg=$ty+1;?>
<option value="<?php  echo $tg;?>"><?php  echo $tg;?>
<?php };?>


</select></td>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php }else{;?>
No tiene puestos de trabajo sin asignar puntos
<?php };?>


<?php } else {;?>

<form action="intro2.php" method="post">
<table>
<input type="hidden" name="tabla" value="ipuntconti">
<input type="hidden" name="cantpuntcont" value="<?php  echo $cantpuntcont;?>">
<tr><td>Datos del Puesto de Trabajo</td><td>
<input type="hidden" name="idclientes" value="<?php  echo $idclientes;?>">
<?php 
if ($idclientes!="todos"){;
$sql="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'";
$result=$conn->query($sql);
$resultado=$result->fetch();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
$idclientes=$resultado['idclientes'];
$nombre=$resultado['nombre'];
?>
<?php  echo $nombre;?>
<?php }else{;?>
<?php  echo strtoupper($idclientes);?>
<?php };?>

</td></tr>


<?php if ($cantpuntcont=='todos'){;
$sql2="SELECT * from puntservicios where idempresas='".$ide."' and idpccat='".$idpccat."' and activo='1' order by idpcsubcat asc";
$result2=$conn->query($sql2);
/*$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);*/

foreach($result2 as $row2){
		$idpcsubcat=$row2['idpcsubcat'];
		$subcategoria=$row2['subcategoria'];

/*for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2,$t);
$resultado2=mysqli_fetch_array($result2);
$idpcsubcat=$resultado2['idpcsubcat'];
$subcategoria=$resultado2['subcategoria'];*/
?>
<tr><td colspan="2"><input type="hidden" name="punt[<?php  echo $t?>]" value="<?php  echo $idpcsubcat;?>"><?php  echo $subcategoria;?></td></tr>
<?php };?>
<?php }else{;?>


<?php 
for ($i=0;$i<$cantpuntcont;$i++){;?>
<tr><td>Punto</td><td>
<?php 
$sql2="SELECT * from puntservicios where idempresas='".$ide."' and idpccat='".$idpccat."' and activo='1' order by idpcsubcat asc";
$result2=$conn->query($sql2);
$result2row=$conn->query($sql2);
$fetchAll2=$result2row->fetchAll();
/*$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$row2=mysqli_num_rows($result2);*/

if(count($fetchAll2)!=0){
//if ($row2!=0){;?>
<select name="punt[<?php  echo $i?>]">
<?php 
	

foreach($result2 as $row2){
		$idpcsubcat=$row2['idpcsubcat'];
		$subcategoria=$row2['subcategoria'];
/*for ($t=0;$t<$row2;$t++){;
mysqli_data_seek($result2,$t);
$resultado2=mysqli_fetch_array($result2);
$idpcsubcat=$resultado2['idpcsubcat'];
$subcategoria=$resultado2['subcategoria'];*/
?>
<option value="<?php  echo $idpcsubcat;?>"><?php  echo $subcategoria;?>
<?php };?>
<?php };?>
</td></tr>
<?php };?>

<?php };?>
<tr><td colspan="2"><input type="submit" class="envio" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php };?>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>