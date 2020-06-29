<?php 

/************************************CONFIG****************************************/

//SETTINGS//
//This code is something you set in the APP so random people cant use it.
$ACCESSKEY="secret";

/************************************CONFIG****************************************/

//these are just in case setting headers forcing it to always expire
//header('Cache-Control: no-cache, must-revalidate');

include('bbdd.php');



//if($_GET['p']==$ACCESSKEY){;

$mimagen=basename( $_GET['imagen']['name']);
$timagen=strtok(basename( $_GET['imagen']['name']), '.');
$tipoimagen=strtok('.');
$mimagen=count($_POST);
$mimagen.='hola';
if ($mimagen!=null){;
$path="../img/";
$path = $path . basename( $_GET['imagen']['name']);
if(move_uploaded_file($_GET['imagen']['tmp_name'], $path)) {;
echo "El archivo ". $path . " ha sido subido";
}else{;
echo "Ha ocurrido un error, trate de nuevo!";
};
};


$sql1 = "INSERT INTO imagen (nombre,metodo) VALUES ('$mimagen','POST')";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");

//};

?>