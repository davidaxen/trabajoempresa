<?php  
include('bbdd.php');

if ($ide!=null){;

include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCION DE DATOS</p></div>
<div class="contenido">


<?php  

if ($tabla=="ipuntcont"){;


for ($i=0;$i<count($punt);$i++){;
$p=$ultpunto+1+$i;
$sql1 = "INSERT INTO ruta (idempresas,idruta,nombreruta,lun,mar,mie,jue,vie,sab,dom) VALUES ('$ide','$p','$punt[$i]','$lun[$i]','$mar[$i]','$mie[$i]','$jue[$i]','$vie[$i]','$sab[$i]','$dom[$i]')";
//echo $sql1;
$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");

};

};

if ($tabla=="ipuntconti"){;


if ($idclientes=='todos'){;

$sql="SELECT * from clientes where idempresas='".$ide."' ";
$sql.="and accdiarias='1'";
$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$fetchAll=$result->fetchAll();
$row=count($fetchAll);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//echo $sql;
$row=mysqli_num_rows($result);*/
if ($row!=0){;
/*for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($resultmos as $rowmos) {
$idclientes=$rowmos['idclientes'];

$sql2="SELECT * from codservicios where idempresas='".$ide."' and idclientes='".$idclientes."' and idpccat='".$idpccat."'";
$result2=$conn->query($sql2);
$result2mos=$conn->query($sql2);
$fetchAll2=$result2->fetchAll();
$row2=count($fetchAll2);

/*$result2=mysqli_query ($conn,$sql2) or die ("Invalid result2");
//echo $sql2;
$row2=mysqli_num_rows($result2);*/
if ($row2==0){;
$clientes[]=$idclientes;
};
};
};

}else{;
$clientes[]=$idclientes;

};


for ($j=0;$j<count($clientes);$j++){;

if ($cantpuntcont=='todos'){;
for ($i=0;$i<count($punt);$i++){;
$sql1 = "INSERT INTO codservicios (idempresas,idclientes,idpccat,idpcsubcat,activo) VALUES ('$ide','$clientes[$j]','$idpccat','$punt[$i]','1')";
$result1=$conn->exec($sql1);

//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
//echo $sql1;
};
}else{;
$valores=array_unique($punt);
//var_dump($valores);
for ($i=0;$i<count($punt);$i++){;
if ($valores[$i]!=null){;
$sql1 = "INSERT INTO codservicios (idempresas,idclientes,idpccat,idpcsubcat,activo) VALUES ('$ide','$clientes[$j]','$idpccat','$valores[$i]','1')";
$result1=$conn->exec($sql1);

//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
//echo $sql1;
};
};
};

};



};






if ($tabla=="mpuntcont"){;

$sql0="update ruta set ";
$sql1="where idruta='".$idruta."' and idempresas='".$ide."'";


$nombrec=array('nombreruta','idempleado','lun','mar','mie','jue','vie','sab','dom','estado');
$valora=array($punt,$idempleado,$lun,$mar,$mie,$jue,$vie,$sab,$dom,$activo);
$valorn=array($puntn,$idempleadon,$lunn,$marn,$mien,$juen,$vien,$sabn,$domn,$activon);



for ($j=0;$j<count($nombrec);$j++){;
if ($valora[$j]!=$valorn[$j]){;
$sqla=$nombrec[$j]."='".$valorn[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo ($sql.'<br>');
$resultd=$conn->exec($sql);

//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrec[$j]." ");
};

};

};


if ($tabla=="modpuntconti"){;

$sql0="update codservicios set ";
$sql1="where idclientes='".$idclientes."' and idempresas='".$ide."' and idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."'";


$nombrec=array('activo','idpcsubcat');
$valora=array($activo,$idpcsubcat);
$valorn=array($activon,$idpcsubcatn);



for ($j=0;$j<count($nombrec);$j++){;
if ($valora[$j]!=$valorn[$j]){;
$sqla=$nombrec[$j]."='".$valorn[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo ($sql.'<br>');
$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrec[$j]." ");
};

};

};







if ($tablas=="arpuntcont"){;

$sql1 = "INSERT INTO clienteruta (idempresas,idruta,idclientes) 
VALUES ('$ide','$idruta','$idclientes')";
//echo $sql1;
$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");


};

if ($tablas=="erpuntcont"){;

$sql0="update ruta set ";
$sql1="where idruta='".$idruta."' and idempresas='".$ide."'";


$nombrec=array('idempleado');
$valora=array('');
$valorn=array($idempleado);



for ($j=0;$j<count($nombrec);$j++){;
if ($valora[$j]!=$valorn[$j]){;
$sqla=$nombrec[$j]."='".$valorn[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo ($sql.'<br>');
$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrec[$j]." ");
};

};

};



if ($tabla=="borrar"){;

$sql1 = "delete from clienteruta where idempresas='".$ide."' and idruta='".$idruta."' and idclientes='".$idclientes."'";
//echo $sql1;
$result1=$conn->exec($sql1);

//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");



};


?>



LOS DATOS HAN SIDO INTRODUCCIDOS<p>

<?php  switch($tabla){
case 'ipuntcont': 
echo "<table><tr>";
echo "<td><a href='ipuntcont.php'><img src='../../img/".$ic."' width='50px'><br/>Crear más rutas</a></td>";
echo "<td><a href='apuntcont.php'><img src='../../img/".$ic."' width='50px'><br/>Asignar Clientes a Ruta</a></td>";
echo "<td><a href='epuntcont.php'><img src='../../img/".$ic."' width='50px'><br/>Asignar Empleados a Ruta</a></td>";
echo "</tr></table>";
break;

case 'arpuntcont': 
echo "<table><tr>";
echo "<td><a href='ipuntcont.php'><img src='../../img/".$ic."' width='50px'><br/>Crear más rutas</a></td>";
echo "<td><a href='apuntcont.php'><img src='../../img/".$ic."' width='50px'><br/>Asignar Clientes a Ruta</a></td>";
echo "<td><a href='epuntcont.php'><img src='../../img/".$ic."' width='50px'><br/>Asignar Empleados a Ruta</a></td>";
echo "</tr></table>";
break;


case 'erpuntcont': 
echo "<table><tr>";
echo "<td><a href='ipuntcont.php'><img src='../../img/".$ic."' width='50px'><br/>Crear más rutas</a></td>";
echo "<td><a href='apuntcont.php'><img src='../../img/".$ic."' width='50px'><br/>Asignar Clientes a Ruta</a></td>";
echo "<td><a href='epuntcont.php'><img src='../../img/".$ic."' width='50px'><br/>Asignar Empleados a Ruta</a></td>";
echo "</tr></table>";
break;

};

?>

<a href="lpuntcont2.php" target="_parent">Volver a menu</a>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>