<?php

$server = "localhost";
$username="root";
$password="";
$dbname ="bbddsmartcbc";

//$conn = new mysqli($server, $username, $password, $dbname);

try{

	$conn = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql="select * from usuarios";
	$temp=$conn->query($sql);
	$result=$temp->fetchAll();

}catch(PDOException $e){
	echo "Error al conectar a la BBDD: " . $e->getMessage();
}

//$sql = "SELECT * FROM usuarios";
//$result = $conn->query($sql);

/*if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["user"] . $row["pass"] . "<br>";
    }
}else {
    echo "More posts coming soon!";
}*/

$conn=null;
?>
<?
/*
date_default_timezone_set('Europe/Madrid');
$dbh=mysqli_connect ("185.50.44.146", "bbddsmartcbc", "Jas170174#") or die ('I cannot connect to the database because: ' . mysqli_connect_error());
mysql_select_db ("bbddsmartcbc");
mysql_query("SET CHARACTER SET latin1");
mysql_query("SET NAMES latin1");
extract($_COOKIE);
extract($_POST);
extract($_GET);
*/
//localhost:3306
?>