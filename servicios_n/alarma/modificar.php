<?php 

$dnum=strlen($dnue);
for($j=$dnum;$j<2;$j++){;
$dnue='0'.$dnue;
};
$mnum=strlen($mnue);
for($j=$mnum;$j<2;$j++){;
$mnue='0'.$mnue;
};



$hnum=strlen($hnue);
for($j=$hnum;$j<2;$j++){;
$hnue='0'.$hnue;
};
$minnum=strlen($minnue);
for($j=$minnum;$j<2;$j++){;
$minnue='0'.$minnue;
};
$segnum=strlen($segnue);
for($j=$segnum;$j<2;$j++){;
$segnue='0'.$segnue;
};

$fechanue=$ynue.'-'.$mnue.'-'.$dnue;


// cambiar portada
$nombrecampo=array('dia','d','m','y','h','min','seg','mensaje');
$valoractual=array($fechaant,$dant,$mant,$yant,$hant,$minant,$segant,$mensajeant);
$valornuevo=array($fechanue,$dnue,$mnue,$ynue,$hnue,$minnue,$segnue,$mensajenue);
$tablas=array('alarma');

/*
print_r($nombrecampo);
echo "1<br>";
print_r($valoractual);
echo "2<br>";
print_r($valornuevo);
echo "3<br>";
print_r($tablas);
echo "4<br>";
*/

$tjy=0;


for ($yh=$tjy;$yh<count($tablas);$yh++){;


$sql00="update ".$tablas[$yh]." set ";
$sql01="where id=:idalarma";

for ($j=0;$j<count($nombrecampo);$j++){;
//echo ($nombrecampo[$t].'-'.$valoractual[$t].'-'.$valornuevo[$t].'<br>');

if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."=:valornuevo ";
$sql=$sql00.$sqla.$sql01;
//echo ($sql.'<br>');
	$temporal1 = $conn->prepare($sql);
	$temporal1->bindParam(':idalarma', $idalarma);
	$temporal1->bindParam(':valornuevo', $valornuevo[$j]);
	$temporal1->execute();

//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
};

};

};



?>