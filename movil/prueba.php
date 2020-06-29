<?php 
include('bbdd.php');

$valores=explode('<.>',$partes);

for ($j=0;$j<count($valores)-1;$j++){;
$idsubcat=strtok($valores[$j],';');
$cantidad=strtok(';');
$idotro=strtok(';');
echo "valores ".$j."<br>";
echo "idsubcat ".$idsubcat."<br>";
echo "cantidad ".$cantidad."<br>";
echo "idotro ".$idotro."<br>";
};

echo $valores."<br>";
echo $partes."<br>";
echo $idcomunidad;


?>