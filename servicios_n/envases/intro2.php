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

$valorult=$valorfinal+1;
for ($i=$valorinicial;$i<$valorult;$i++){;

$sql="SELECT * from envases where idempresas='".$ide."' and idenvases='".$i."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//echo $sql;
$row=mysqli_num_rows($result);
if ($row==0){;
$sql1 = "INSERT INTO envases (idempresas,idenvases,fechaentrada,rellenados,estado) VALUES ('$ide','$i','$fecha','$relleno','1')";
//echo $sql1;
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
}else{;
echo "El c&oacute;digo de envase ".$punt[$i]." ya habia sido introducido.<br/>";
};
};

};

if ($tabla=="ipuntconti"){;


if ($idclientes=='todos'){;

$sql="SELECT * from clientes where idempresas='".$ide."' ";
$sql.="and accdiarias='1'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
//echo $sql;
$row=mysqli_num_rows($result);
if ($row!=0){;
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=myqsli_fetch_array($result);
$idclientes=$resultado['idclientes'];

$sql2="SELECT * from codservicios where idempresas='".$ide."' and idclientes='".$idclientes."' and idpccat='".$idpccat."'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result2");
//echo $sql2;
$row2=mysqli_num_rows($result);
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
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
//echo $sql1;
};
}else{;
$valores=array_unique($punt);
//var_dump($valores);
for ($i=0;$i<count($punt);$i++){;
if ($valores[$i]!=null){;
$sql1 = "INSERT INTO codservicios (idempresas,idclientes,idpccat,idpcsubcat,activo) VALUES ('$ide','$clientes[$j]','$idpccat','$valores[$i]','1')";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont");
//echo $sql1;
};
};
};

};



};



if ($tabla=="mpuntcont"){;

$sql0="update puntservicios set ";
$sql1="where idpcsubcat='".$idpcsubcat."' and idempresas='".$ide."' and idpccat='".$idpccat."'";


$nombrec=array('subcategoria','rellr','rellg','rellb','activo');
$valora=array($subcategoria,$rellr,$rellg,$rellb,$activo);
$valorn=array($subcategorian,$rellrn,$rellgn,$rellbn,$activon);



for ($j=0;$j<count($nombrec);$j++){;
if ($valora[$j]!=$valorn[$j]){;
$sqla=$nombrec[$j]."='".$valorn[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo ($sql.'<br>');
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrec[$j]." ");
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
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrec[$j]." ");
};

};

};


?>



LOS DATOS HAN SIDO INTRODUCCIDOS<p>

<?php  switch($tabla){
case 'ipuntcont': echo "<a href='lpuntcont.php'><img src='../../img/".$ic."' width='50px'><br/>Listado y Codigo de Envases</a><p>";break;

};

?>

<a href="/inicio_n.php" target="_parent">Volver a menu</a>

</div>
</div>

<?php } else {;
include ('../../cierre.php');
 };?>